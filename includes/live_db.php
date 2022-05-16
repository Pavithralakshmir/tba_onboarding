<?php
//error_reporting(0);
ini_set("display_errors", 0);
// ini_set('display_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Kolkata");
$datetime = date('Y-m-d-H:i:s');
$cdate = date('Y-m-d H:i:s');
// echo date('Y-m-d-h:i:s');exit;
$date = date('Y-m-d');
$dates = date('d-m-y');
// $date = substr($date,0,-13);
// $conn = new mysqli("127.0.0.1", "root", "", "tba_onboard");
// $mysqli_conn = new mysqli("127.0.0.1", "root", "", "tba_users");
$conn = new mysqli("localhost", "pack1234_tba_onboard_user", "c&i+cdN(-m{6", "pack1234_tba_onboard");
$mysqli_conn = new mysqli("localhost", "pack1234_tba_users_user", "Hb,(7*}C~KPc", "pack1234_tba_users");
$folder_depth = substr_count($_SERVER["PHP_SELF"], "/");

if ($folder_depth == false)
    $folder_depth = 1;
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'No One Can Hack Me'; //This is my secret key
    $secret_iv = 'If You Have Dare Touch Me'; //This is my secret key
    // hash
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
mysqli_query($conn, "set character_set_client='utf8'");
mysqli_query($conn, "set character_set_results='utf8'");
mysqli_query($conn, "set collation_connection='utf8mb4_general_ci'");
?>