<?php
/* 
 * PayPal and database configuration 
 */

// PayPal configuration 
define('PAYPAL_ID', 'sb-6443lz15098786@business.example.com');
// define('PAYPAL_ID', 'sb-dczgy15255726@business.example.com');
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 

// define('PAYPAL_RETURN_URL', 'https://onboardingtool.tba.ai/new_ui/paypal/payment_successful.php');
// define('PAYPAL_CANCEL_URL', 'https://onboardingtool.tba.ai/new_ui/paypal/payment_canceled.php');
// define('PAYPAL_NOTIFY_URL', 'https://onboardingtool.tba.ai/new_ui/paypal/ipn.php');
define('PAYPAL_RETURN_URL', 'http://localhost/tba_onboard_tool/paypal/payment_successful.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/tba_onboard_tool/paypal/payment_canceled.php');
define('PAYPAL_NOTIFY_URL', 'http://localhost/tba_onboard_tool/new_ui/paypal/ipn.php');
define('PAYPAL_CURRENCY', 'USD');

// Database configuration 
// include_once('../includes/db.php');
// define('DB_HOST', '127.0.0.1'); 
// define('DB_USERNAME', 'pack1234_tba_onboard_user'); 
// define('DB_PASSWORD', 'c&i+cdN(-m{6'); 
// define('DB_NAME', 'pack1234_tba_onboard'); 

define('DB_HOST', '127.0.0.1'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'tba_onboard'); 


// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true) ? "https://www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");


