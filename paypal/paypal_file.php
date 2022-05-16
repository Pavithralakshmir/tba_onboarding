<?php
session_start();
$ts_id = $_REQUEST["ts_id"];
$total_amt = $_REQUEST["amt"];
$userid = $CUST_ID = $_REQUEST["cid"];
$mobilenumber = $_REQUEST["mobilenumber"];
$item_number = $_REQUEST["item_number"];
$cmd = $_REQUEST["cmd"];
$no_note = $_REQUEST["no_note"];

include_once 'config.php';
include_once 'dbConnect.php';
// echo "https://www.sandbox.paypal.com/cgi-bin/webscr?business=info@codexworld.com&cmd=_xclick&item_name=".$no_note."&item_number=".$item_number."&amount=".$total_amt."&currency_code=".PAYPAL_CURRENCY."&return=".PAYPAL_RETURN_URL."&cancel_return=".PAYPAL_CANCEL_URL;
// exit;
header(Location: https://www.sandbox.paypal.com/cgi-bin/webscr?business=info@codexworld.com&cmd=_xclick&item_name=<?php echo $no_note?>"&item_number=".$item_number."&amount=".$total_amt."&currency_code=".PAYPAL_CURRENCY."&return=".PAYPAL_RETURN_URL."&cancel_return=".PAYPAL_CANCEL_URL);
// header('Location: "https://www.sandbox.paypal.com/cgi-bin/webscr?business=info@codexworld.com&cmd=_xclick&item_name="<?php echo $no_note; ?>"&item_number="<?php echo $item_number; ?>"&amount="<?php echo $total_amt; ?>"&currency_code="<?php echo PAYPAL_CURRENCY; ?>"&return="<?php echo PAYPAL_RETURN_URL; ?>"&cancel_return="<?php echo PAYPAL_CANCEL_URL; ?>');
