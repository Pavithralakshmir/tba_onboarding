<?php
include_once 'includes/php/common_php.php';
$edit_title = $id =  $idd = $edit_description = $edit_remark = $edit_to_whom = $edit_live_date = $edit_last_date_type = $edit_last_date = '';
$edit_to_whom = array();
if (isset($_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'])) {
    $encrypt_action = $_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'];
    $action = encrypt_decrypt('decrypt', $encrypt_action);
    $encrypt_id = $_GET['WnAyV3FOdHJ3dkNiMEgrMGxVcytZUT09'];
    $id = encrypt_decrypt('decrypt', $encrypt_id);
    if ($action == 'edit') {
        $sql = "SELECT `id`,`title`,`description`,`remark`,`to_whom`,`live_date`,`last_date_type`,`last_date` FROM `tba_announcement` WHERE `id` ='$id' ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $idd = $row['id'];
            $edit_title = $row['title'];
            $edit_description = $row['description'];
            $edit_remark = $row['remark'];
            $edit_to_whom = explode(",", $row['to_whom']);
            $edit_live_date = date("d-m-Y", strtotime($row["live_date"]));
            $edit_last_date_type = $row['last_date_type'];
            $edit_last_date = date("d-m-Y", strtotime($row["last_date"]));
        }
    } else if ($action == 'deactive') {
        $sql = "UPDATE `tba_announcement` SET `is_active` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: announcement.php?msg=3");
    } else if ($action == 'active') {
        $sql = "UPDATE `tba_announcement` SET `is_active` = '0' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: announcement.php?msg=3");
    } else if ($action == 'delete') {
        $sql = "UPDATE `tba_announcement` SET `is_delete` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: announcement.php?msg=4");
    }
}

if (isset($_POST['n_title'])) {
    $n_title = mysqli_real_escape_string($conn, $_POST["n_title"]);
    $n_remark = mysqli_real_escape_string($conn, $_POST["n_remark"]);
    $n_description = $_POST['n_description'];
    $lastdatetype = mysqli_real_escape_string($conn, $_POST["lastdatetype"]);
    $lastdate = date("Y-m-d", strtotime($_POST["last_date"]));
    $live_date = date("Y-m-d", strtotime($_POST["live_date"]));
    $towhom = mysqli_real_escape_string($conn, $_POST["towhom"]);
    $cdate = date('Y-m-d H:i:s');
    $cby = $user_details->name;
    $id = $_POST["id"];
    if ($id) {
        $sql6 = "UPDATE `tba_announcement` SET `title`= '$n_title',`description`='$n_description',`remark`='$n_remark',`to_whom`='$towhom',`live_date`='$live_date',`last_date_type`='$lastdatetype',`last_date`='$lastdate',`mdate`='$cdate',`mby`='$cby',`mip`='$_SERVER[REMOTE_ADDR]' WHERE id='$id'";
        $res6 = mysqli_query($conn, $sql6);
        header("Location: announcement.php");
    } else {
        $sql5 = "SELECT * FROM `tba_announcement` where `title` = '$n_title'";
        $res5 = mysqli_query($conn, $sql5);
        if (mysqli_num_rows($res5)) {
            $msg = 1;
        } else {
            $sql6 = "INSERT INTO `tba_announcement`(`title`, `remark`, `description`, `to_whom`, `live_date`,`last_date_type`, `last_date`,`cdate`, `cby`, `cip`) VALUES ('$n_title','$n_remark','$n_description','$towhom','$live_date','$lastdatetype','$lastdate','$cdate','$cby','$_SERVER[REMOTE_ADDR]')";
            $res6 = mysqli_query($conn, $sql6);
            header("Location: announcement.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TBA - Onboarding Tool</title>
    <meta charset="utf-8" />
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="Infinity Hub is a Digital Marketing Agency in the Philippines that focuses on SEO, Social Media, Digital Advertising, Web and Mobile applications." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="TBA - Onboarding Tool" />
    <meta property="og:url" content="https://infinityhub.com" />
    <meta property="og:site_name" content="TBA | Onboarding Tool" />
    <?php
    include_once 'includes/common_header_links.php';
    ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".select2-list").select2();
            $('.select2-list').select2({
                width: '100%',
                placeholder: "Select an Option",
                allowClear: true,
                tags: true,
            });
        });
        $(function() {
            $("#live_date").datepicker({
                minDate: 0,
                dateFormat: 'dd-mm-yy'
            });
            $("#datepicker").datepicker({
                dateFormat: 'dd-mm-yy'
            });
        });
    </script>
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <p id="user_id" style="display:none;"><?php echo $session_id; ?></p>
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <?php
            include_once 'includes/menu.php';
            ?>
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php
                include_once 'includes/header.php';
                ?>
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Top-->
                                <div class="text-center">
                                    <!--begin::Title-->
                                    <h3 class="fs-2hx text-dark mt-8">New Announcement</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Top-->
                                <!--begin::Card body-->
                                <div class="card-body pt-8">
                                    <!--begin::Form-->
                                    <form class="form mb-15" role="form" method="POST" enctype="multipart/form-data" id="add_announcement">
                                        <input id="edit_id" type="hidden" value="<?php echo $idd ?>" />
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold mb-2">Title</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid n_title" id="n_title" placeholder="" name="n_title" value="<?php echo $edit_title; ?>" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold mb-2">Remark</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid n_remark" id="n_remark" placeholder="" name="n_remark" value="<?php echo $edit_remark; ?>" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-15">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold mb-2">Description</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea class="ckeditor n_description" name="n_description" id="n_description"><?php echo $edit_description; ?></textarea>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-15">
                                            <label class="required fs-6 fw-bold">Announceent Live Date</label>
                                            <!--begin::Input-->
                                            <div class="position-relative d-flex align-items-center">
                                                <!-- begin::Icon -->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
                                                        <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
                                                        <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Icon-->
                                                <!--begin::Datepicker-->
                                                <input class="form-control form-control-solid ps-12 live_date" placeholder="Select a date" id="live_date" name="live_date" value="<?php echo ($edit_live_date) ? $edit_live_date : date("d-m-Y"); ?>" />
                                                <!--end::Datepicker-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-15">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Announcement End Date</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-3" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input lastdatetype" type="radio" name="lastdatetype" value="1" <?php if ($edit_last_date_type == '1') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">Yes</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-3" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input lastdatetype" type="radio" name="lastdatetype" value="2" <?php if ($edit_last_date_type == '2') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">No</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col m-auto" id="last_date_div">
                                                    <label class="required fs-6 fw-bold">End Date</label>
                                                    <!--begin::Input-->
                                                    <div class="position-relative d-flex align-items-center">
                                                        <!-- begin::Icon -->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                        <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
                                                                <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
                                                                <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--end::Icon-->
                                                        <!--begin::Datepicker-->
                                                        <input class="form-control form-control-solid ps-12 datepicker" placeholder="Select a date" id="datepicker" name="last_date" value="<?php echo ($edit_last_date_type == '1') ? $edit_last_date : date("d-m-Y"); ?>" />
                                                        <!--end::Datepicker-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-15">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold mb-2">Team</label>
                                            <!--end::Label-->
                                            <select name="towhom[]" id="towhom" class="form-select form-select-solid select2-list select_dd towhom" multiple aria-readonly="true">
                                                <option value=""></option>
                                                <?php
                                                $sql = "select * from team where `is_active`='0' and `is_delete`='0'";
                                                $querys = mysqli_query($conn, $sql);
                                                while ($rows = mysqli_fetch_assoc($querys)) {
                                                ?>
                                                    <option value="<?php echo $rows['id']; ?>" <?php
                                                                                                if (in_array($rows['id'], $edit_to_whom)) {
                                                                                                    echo "selected";
                                                                                                }
                                                                                                ?>>
                                                        <?php echo $rows['team_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <div class="text-center pt-8">
                                                <!--begin::Submit-->
                                                <button type="reset" class="btn btn-warning">
                                                    <!--begin::Indicator-->
                                                    <span class="indicator-label">Cancle</span>
                                                    <!--end::Indicator-->
                                                </button>
                                                <button type="submit" class="btn btn-success" id="add_announcement_submit_button" name="add_announcement_submit">
                                                    <!--begin::Indicator-->
                                                    <span class="indicator-label">Save Now</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    <!--end::Indicator-->
                                                </button>
                                                <!--end::Submit-->
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->
            <?php
            include_once 'includes/footer.php'; ?>
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="assets/plugins/custom/ckeditor/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        getradiovalue();
        var t, e, i;
        i = document.querySelector("#add_announcement");
        t = document.getElementById("add_announcement_submit_button");
        $(i.querySelector('[name="towhom"]')).on("change", function() {
                e.revalidateField("towhom");
            }),
            (e = FormValidation.formValidation(i, {
                fields: {
                    n_title: {
                        validators: {
                            notEmpty: {
                                message: "Tittle name is required"
                            }
                        }
                    },
                    n_remark: {
                        validators: {
                            notEmpty: {
                                message: "Remark is required"
                            }
                        }
                    },
                    lastdatetype: {
                        validators: {
                            notEmpty: {
                                message: "Announcement end date type is required"
                            }
                        }
                    },
                    last_date: {
                        validators: {
                            notEmpty: {
                                message: "Announcement end date for is required"
                            }
                        }
                    },
                    towhom: {
                        validators: {
                            notEmpty: {
                                message: "Team is required"
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                },
            }));
        t.addEventListener("click", function(i) {
            i.preventDefault(),
                e &&
                e.validate().then(function(e) {
                    "Valid" == e
                        ?
                        (
                            myFunction()
                        ) :
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        }).then(function(t) {
                            KTUtil.scrollTop();
                        });
                })
        });
        $(".lastdatetype").on('change', function() {
            getradiovalue();
        });
    });

    function myFunction() {
        var n_title = $("#n_title").val();
        var n_remark = $("#n_remark").val();
        var n_description = CKEDITOR.instances["n_description"].getData();
        var lastdatetype = $('input[name=lastdatetype]:checked').val();
        var last_date = $("#datepicker").val();
        var live_date = $("#live_date").val();
        var towhom = $("#towhom").val();
        var id = $("#edit_id").val();
        var blkstr = [];
        $.each(towhom, function(idx2, val2) {
            var str = val2;
            blkstr.push(str);
        });
        var towhom = blkstr.join(",");
        $.ajax({
            type: "post",
            url: "add_a_announcement.php",
            data: {
                n_title: n_title,
                n_remark: n_remark,
                n_description: n_description,
                lastdatetype: lastdatetype,
                last_date: last_date,
                live_date: live_date,
                towhom: towhom,
                id: id
            },
            success: function(response) {
                // console.log(response);
                window.location = 'announcement.php';
            },
            error: function() {
                alert('Error occurs!');
            }
        });
    }

    function getradiovalue() {
        var radioValue = $("input[name='lastdatetype']:checked").val();
        if (radioValue == '1') {
            $("#last_date_div").show();
            // $("#datepicker").val('');
        } else if (radioValue == '2') {
            $("#last_date_div").hide();
            $("#datepicker").val('0000-00-00');
        } else {
            $("#last_date_div").hide();
        }
    }
</script>

</html>