<?php
// Include configuration file 
include_once 'config.php';

// Include database connection file 
include_once '../includes/db.php';
include_once 'dbConnect.php';
session_start();
if (isset($_SESSION['id'])) {
    $ugroup = $_SESSION['ugroup'];
    $foldername = 'dashboard';
    $url = $_SERVER['REQUEST_URI'];
    $session_id = $_SESSION['id'];
} else {
    header("Location: index.php");
}
$user_details = "SELECT `name`,`pemail`,`mobile1`,`ecode`,`inst` FROM `users` where `id`='$session_id'";
$user_result = mysqli_query($conn, $user_details);
$user_details = mysqli_fetch_object($user_result);
// If transaction data is available in the URL 
if (!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])) {
    // Get transaction information from URL 
    $unique_number = 'tba_onboard' . uniqid(0, FALSE);
    $order_id = $unique_number;
    $client_id = $_SESSION['id'];
    $phonenumber = $user_details->mobile1;
    $amount = $_GET['amt'];
    $paymentmode = $_GET['txn_type'];
    $txn_date = $_GET['payment_date'];
    $currency = $_GET['mc_currency'];
    $payment_status = $_GET['payment_status'];
    $paymentmode = $_GET['payment_type'];

    $payer_email = $_GET['payer_email'];
    $payer_id = $_GET['payer_id'];
    $payer_status = $_GET['payer_status'];
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
    $address_name = $_GET['address_name'];
    $address_street = $_GET['address_street'];
    $address_city = $_GET['address_city'];
    $address_country_code = $_GET['address_country_code'];
    $residence_country = $_GET['residence_country'];
    $mc_fee = $_GET['mc_fee'];
    $mc_gross = $_GET['mc_gross'];
    $protection_eligibility = $_GET['protection_eligibility'];
    $payment_fee = $_GET['payment_fee'];
    $handling_amount = $_GET['handling_amount'];
    $shipping = $_GET['shipping'];
    $receiver_id = $_GET['receiver_id'];
    $notify_version = $_GET['notify_version'];
    $verify_sign = $_GET['verify_sign'];
    $notify_version = $_GET['notify_version'];

    $cdate = date('Y-m-d H:i:s');
    $cby = $user_details->name;

    $item_number = $_GET['item_number'];
    $txn_id = $_GET['tx'];
    $payment_gross = $_GET['payment_gross'];
    $currency_code = $_GET['cc'];
    $payment_status = $_GET['st'];
    // Get product info from the database 
    $productResult = $db->query("SELECT * FROM tba_services WHERE id = " . $item_number);
    $productRow = $productResult->fetch_assoc();

    // Check if transaction data exists with the same TXN ID. 
    $prevPaymentResult = $db->query("SELECT * FROM payment WHERE txn_id = '" . $txn_id . "'");

    if ($prevPaymentResult->num_rows > 0) {
        $paymentRow = $prevPaymentResult->fetch_assoc();
        $payment_id = $paymentRow['payment_id'];
        $payment_gross = $paymentRow['payment_gross'];
        $payment_status = $paymentRow['status'];
        $sql = "UPDATE `subscribers_details` SET `payment_status`='$payment_status',`payment_date`='$txn_date',`payment_id`= $payment_id,`mdate`='$datetime',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$cby' WHERE `tba_service_id`='$item_number' AND `client_id`='$client_id'";
        $res1 = mysqli_query($conn, $sql);
    } else {
        // Insert tansaction data into the database 
        $insert = $db->query("INSERT INTO payment(`client_id`, `phonenumber`, `service_id`, `order_id`, `amount`, `residence_country`, `txn_id`, `txn_amt`, `paymentmode`, `currency`, `txn_date`, `status`, `mc_fee`, `protection_eligibility`, `payment_fee`, `handling_amount`, `shipping`, `payment_gross`, `receiver_id`, `notify_version`, `verify_sign`, `ts_id`, `payer_email`, `payer_id`, `payer_status`, `first_name`, `last_name`, `address_name`, `address_street`, `address_city`, `address_country_code`, `inv_url`, `cby`, `cdate`, `cip`) VALUES('$client_id','$phonenumber','$item_number','$order_id','$amount','$residence_country','$txn_id','$amount','$paymentmode','$currency','$txn_date','$payment_status','$mc_fee','$protection_eligibility','$payment_fee','$handling_amount','$shipping','$payment_gross','$receiver_id','$notify_version','$verify_sign','$item_number','$payer_email','$payer_id','$payment_status','$first_name','$last_name','$address_name','$address_street','$address_city','$address_country_code','','$cby','$cdate','$_SERVER[REMOTE_ADDR]')");
        $payment_id = $db->insert_id;

        $sql = "UPDATE `subscribers_details` SET `payment_status`='$payment_status',`payment_date`='$txn_date',`payment_id`= $payment_id,`mdate`='$datetime',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$cby' WHERE `tba_service_id`='$item_number' AND `client_id`='$client_id'";
        $res1 = mysqli_query($conn, $sql);
    }
}
?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Onboarding Payments </title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style type="text/css">
        body {
            background: #f2f2f2;
        }

        .payment {
            border: 1px solid #f2f2f2;
            height: 520px;
            border-radius: 20px;
            background: #fff;
        }

        .payment_header {
            background: #28a745;
            padding: 20px;
            border-radius: 20px 20px 0px 0px;

        }

        .check {
            margin: 0px auto;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            background: #fff;
            text-align: center;
        }

        .check i {
            vertical-align: middle;
            line-height: 50px;
            font-size: 30px;
        }

        .times {
            margin: 0px auto;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            background: #fff;
            text-align: center;
        }

        .times i {
            vertical-align: middle;
            line-height: 50px;
            font-size: 30px;
        }

        .content {
            text-align: center;
        }

        .content h1 {
            font-size: 25px;
            padding-top: 25px;
            padding-bottom: 15px;
        }

        .content a {
            width: 200px;
            height: 35px;
            color: #fff;
            border-radius: 30px;
            padding: 5px 10px;
            background: #007bff;
            transition: all ease-in-out 0.3s;
        }

        .content a:hover {
            text-decoration: none;
            background: #28a745;
            color: #fff;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="payment">
                    <div class="payment_header" style="background-color: <?php echo (!empty($payment_id)) ? ('#28a745') : ('#ca1a1a') ?>;">
                        <?php if (!empty($payment_id)) { ?>
                            <div class="check"><i class="fa fa-check" aria-hidden="true" style="color: #28a745;"></i></div>
                        <?php } else { ?>
                            <div class="times"><i class="fa fa-times" aria-hidden="true" style="color: #ca1a1a;"></i></div>
                        <?php } ?>
                    </div>
                    <div class="content container">
                        <div class="status">
                            <?php if (!empty($payment_id)) { ?>
                                <h1 class="success">Your Payment has been Successful</h1>

                                <h4>Payment Information</h4>
                                <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
                                <p><b>Transaction ID:</b> <?php echo $txn_id; ?></p>
                                <p><b>Paid Amount:</b> <?php echo $payment_gross; ?></p>
                                <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>

                                <h4>Product Information</h4>
                                <p><b>Name:</b> <?php echo $productRow['title']; ?></p>
                            <?php } else { ?>
                                <h1 class="error">Your Payment has Failed</h1>
                            <?php } ?>
                        </div>
                        <a href="../dashboard.php" class="btn-link">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>