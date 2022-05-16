<?php
session_start();
include_once 'includes/db.php';
if (isset($_SESSION['id'])) {
    $ugroup = $_SESSION['ugroup'];
    $foldername = 'dashboard';
    $url = $_SERVER['REQUEST_URI'];
    $session_id = $_SESSION['id'];
} else {
    header("Location: index.php");
}

$REQUEST_URI = explode('/', $_SERVER['REQUEST_URI']);
$current_file = end($REQUEST_URI);
$file_name = strstr($current_file, '.php', true);

$id_string = encrypt_decrypt("encrypt", "id");
$action_string = encrypt_decrypt("encrypt", "action");
$edit_string = encrypt_decrypt("encrypt", "edit");
$active_string = encrypt_decrypt("encrypt", "active");
$deactive_string = encrypt_decrypt("encrypt", "deactive");
$delete_string = encrypt_decrypt("encrypt", "delete");

$sql = "SELECT `name` FROM `usergroup` where `id`='$ugroup'";
$sql_result = mysqli_query($conn, $sql);
$user_role_name = mysqli_fetch_object($sql_result);

$user_details = "SELECT `name`,`pemail`,`mobile1`,`mobile2`,`address1`,`ecode`,`inst` FROM `users` where `id`='$session_id'";
$user_result = mysqli_query($conn, $user_details);
$user_details = mysqli_fetch_object($user_result);
// print_r($_SESSION);exit;
$ch2 = "SELECT `id`,`category` FROM `tba_service_category`";
$de2 = mysqli_query($conn, $ch2);
while ($data2 = mysqli_fetch_assoc($de2)) {
	$category_name[$data2['id']] = $data2['category'];
}
$ch3 = "SELECT `id`,`type` FROM `tba_service_type`";
$de3 = mysqli_query($conn, $ch3);
while ($data3 = mysqli_fetch_assoc($de3)) {
	$type_name[$data3['id']] = $data3['type'];
}

$ch4 = "SELECT `id`, `sender_id`, `sender_msg`, `sent_at`, `replay_by`, `replay_msg`, `replay_at` FROM `chat_bot` WHERE `sender_id`='$session_id' ORDER BY `sent_at` ASC";
$de4 = mysqli_query($conn, $ch4);

$ch5 = "SELECT `id`,`name`,`pemail` FROM `users`";
$de5 = mysqli_query($conn, $ch5);
while ($data5 = mysqli_fetch_assoc($de5)) {
	$users_name[$data5['id']] = $data5['name'];
	$loginmail[$data5['id']] = $data5['pemail'];
}

if(isset($_POST['sender_msg'])){
    $sender_msg = $_POST['sender_msg'];
    $sender_id = $_POST['sender_id'];
    $sql6 = "INSERT INTO `chat_bot`(`sender_id`, `sender_msg`, `sent_at`,`sent_ip`) VALUES ('$sender_id','$sender_msg','$datetime','$_SERVER[REMOTE_ADDR]')";
    $res6 = mysqli_query($conn, $sql6);
    exit;
}
