<?php
include_once('../includes/db.php');
$querystring = '';
// PayPal settings
$paypal_email = 'sb-6443lz15098786@business.example.com';
$return_url = 'payment_successful.php';
$cancel_url = 'payment_canceled.php';
$notify_url = 'paypal_config.php';
// Include Functions
include("functions.php");
$ts_id = $_REQUEST["ts_id"];
$total_amt = $_REQUEST["amt"];
$userid = $CUST_ID = $_REQUEST["cid"];
$mobilenumber = $_REQUEST["mobilenumber"];
$item_number = $_REQUEST["item_number"];
$cmd = $_REQUEST["cmd"];
$lc = $_REQUEST["lc"];
$currency_code = $_REQUEST["currency_code"];
$first_name = $_REQUEST["first_name"];
$last_name = $_REQUEST["last_name"];
$payer_email = $_REQUEST["payer_email"];

// $ts_id = '1';
// $total_amt = '1';
// $userid = $CUST_ID = '4';
// $mobilenumber = '9797979797';

$unique_number = 'tba_onboard' . uniqid(0, FALSE);
$ORDER_ID = $unique_number;
// Check if paypal request or response
if (!isset($_REQUEST["txn_id"]) && !isset($_REQUEST["txn_type"])) {
   // Firstly Append paypal account to querystring
    $querystring .= "?business=" . urlencode($paypal_email) . "&";

    // Append amount& currency (£) to quersytring so it cannot be edited in html

    //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
    $querystring .= "item_number=" . urlencode($item_number) . "&";
    $querystring .= "ts_id=" . urlencode($ts_id) . "&";
    $querystring .= "total_amt=" . urlencode($total_amt) . "&";
    $querystring .= "userid=" . urlencode($userid) . "&";
    $querystring .= "mobilenumber=" . urlencode($mobilenumber) . "&";
    $querystring .= "item_number=" . urlencode($ts_id) . "&";

    //loop for posted values and append to querystring
    foreach ($_REQUEST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $querystring .= "$key=$value&";
    }

    // Append paypal return addresses
    $querystring .= "return=" . urlencode(stripslashes($return_url)) . "&";
    $querystring .= "cancel_return=" . urlencode(stripslashes($cancel_url)) . "&";
    $querystring .= "notify_url=" . urlencode($notify_url);
    // Append querystring with custom field
    // $querystring .= "&custom=".USERID;
    // Redirect to paypal IPN
    
    header('location:https://www.sandbox.paypal.com/cgi-bin/webscr' . $querystring);
    // header('location:https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_sb-payment&paykey=sb-6443lz15098786'.$querystring);
    exit();
} else {

    // Response from Paypal

    // read the post from PayPal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    foreach ($_REQUEST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
        $req .= "&$key=$value";
    }

    // assign posted variables to local variables
    $data['ts_id']            = $_REQUEST['ts_id'];
    $data['item_number']         = $_REQUEST['item_number'];
    $data['item_name']         = 'Service';
    $data['payment_status']     = $_REQUEST['payment_status'];
    $data['payment_amount']     = $_REQUEST['mc_gross'];
    $data['payment_currency']    = $_REQUEST['mc_currency'];
    $data['txn_id']                = $_REQUEST['txn_id'];
    $data['receiver_email']     = $_REQUEST['receiver_email'];
    $data['payer_email']         = $_REQUEST['payer_email'];
    $data['custom']             = $_REQUEST['custom'];

    // post back to PayPal system to validate
    $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

    $fp = fsockopen('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

    if (!$fp) {
        // HTTP ERROR
    } else {

        fputs($fp, $header . $req);
        while (!feof($fp)) {
            $res = fgets($fp, 1024);
            if (strcmp($res, "VERIFIED") == 0) {

                // Used for debugging
                //@mail("you@youremail.com", "PAYPAL DEBUGGING", "Verified Response<br />data = <pre>".print_r($post, true)."</pre>");

                // Validate payment (Check unique txnid & correct price)
                $valid_txnid = check_txnid($data['txn_id']);
                $valid_price = check_price($data['payment_amount'], $data['ts_id']);
                // PAYMENT VALIDATED & VERIFIED!
                if ($valid_txnid && $valid_price) {
                    $orderid = updatePayments($data);
                    if ($orderid) {
                        // Payment has been made & successfully inserted into the Database
                        // $sql = "UPDATE `payment` SET `order_id` = '$orderid' where `id` = '$_GET[lastid]' ";
                        // $result = mysqli_query($conn, $sql);
                    } else {
                        // Error inserting into DB
                        // E-mail admin or alert user
                    }
                } else {
                    // Payment made but data has been changed
                    // E-mail admin or alert user
                }
            } else if (strcmp($res, "INVALID") == 0) {

                // PAYMENT INVALID & INVESTIGATE MANUALY! 
                // E-mail admin or alert user

                // Used for debugging
                //@mail("you@youremail.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
            }
        }
        fclose($fp);
    }
}
