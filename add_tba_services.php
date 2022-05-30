<?php
include_once 'includes/php/common_php.php';

$tba_service_category_sql = "SELECT * FROM `tba_service_category` WHERE `is_active` = '0'";
$tba_service_category_result = mysqli_query($conn, $tba_service_category_sql);

$idd = $edit_title = $edit_tba_service_category = $edit_tba_service_type = $edit_description = $edit_price = $edit_price_amt = $edit_remarks = $edit_url = $edit_inst = '';
$id =  $edit_id = $edit_pack_name = $edit_price = $edit_currency = $edit_validity_count = $edit_pack_for = $edit_features = $edit_deliverables = '';
if (isset($_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'])) {
    $encrypt_action = $_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'];
    $action = encrypt_decrypt('decrypt', $encrypt_action);
    $encrypt_id = $_GET['WnAyV3FOdHJ3dkNiMEgrMGxVcytZUT09'];
    $id = encrypt_decrypt('decrypt', $encrypt_id);
    if ($action == 'edit') {
        $sql = "SELECT `id`, `title`, `tba_service_category`, `tba_service_type`, `description`, `price`, `price_amt`, `remarks`, `url`, `inst` FROM `tba_services` WHERE `id` ='$id' ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $idd = $row['id'];
            $edit_title = $row['title'];
            $edit_tba_service_category = $row['tba_service_category'];
            $edit_tba_service_type = $row['tba_service_type'];
            $edit_description = $row['description'];
            $edit_price = $row['price'];
            $edit_price_amt = $row['price_amt'];
            $edit_remarks = $row['remarks'];
            $edit_url = $row['url'];
            $edit_inst = $row['inst'];
        }
    } else if ($action == 'deactive') {
        $sql = "UPDATE `usermodules` SET `status` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE `usermodules` SET `status` = '1' where `parent`='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_tba_services.php?msg=3");
    } else if ($action == 'active') {
        $sql = "UPDATE `tba_services` SET `status` = '0' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_tba_services.php?msg=3");
    } else if ($action == 'delete') {
        $sql = "UPDATE `tba_services` SET `is_active` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_tba_services.php?msg=4");
    }
}

if (isset($_POST['cat_id'])) {
    $cat_id = $_POST['cat_id'];
    $edit_tba_service_type = $_POST['edit_tba_service_type'];
    $tba_service_type_sql = "SELECT * FROM `tba_service_type` where `tba_category_id`='$cat_id' order by `type` asc";
    $tba_service_type_result = mysqli_query($conn, $tba_service_type_sql);
    while ($row = mysqli_fetch_assoc($tba_service_type_result)) {
        $tba_service_type_id = $row['id'];
        $type = $row['type'];
?>
        <option value=""></option>
        <option value="<?php echo $tba_service_type_id; ?>" <?php if ($tba_service_type_id == $edit_tba_service_type) {
                                                                echo "selected";
                                                            } ?>><?php echo $type; ?></option>
<?php
    }
    exit;
}

if (isset($_POST['feature_id'])) {
    $imp = implode(',',$_POST['feature_id']);
    $child_sql = "SELECT DISTINCT deliverable,id FROM tba_deliverables WHERE features_id IN (".$imp.")";
    $tba_service_deliverables_result = mysqli_query($conn, $child_sql);
    while ($row4 = mysqli_fetch_assoc($tba_service_deliverables_result)) {
        $tba_service_deliverable_id = $row4['id'];
        $deliverable = $row4['deliverable'];
?>
        <option value=""></option>
        <option value="<?php echo $tba_service_deliverable_id; ?>"><?php echo $deliverable; ?></option>
<?php
    }
    exit;
}

$sql = "SELECT * FROM `users` ORDER BY `id` DESC limit 1";
$result = mysqli_query($conn, $sql);
$singleRow = mysqli_fetch_row($result);
$nxt_ecode = $singleRow['1'] + 1;

if (isset($_POST['title'])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $description =  $_POST['description'];
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $price_amt = mysqli_real_escape_string($conn, $_POST["price_amt"]);
    $remarks = mysqli_real_escape_string($conn, $_POST["remarks"]);
    $url = mysqli_real_escape_string($conn, $_POST["url"]);
    $tba_service_category = $_POST['tba_service_category'];
    $tba_service_type = $_POST['tba_service_type'];
    $post_id = $_POST['post_id'];
    $cdate = date('Y-m-d H:i:s');
    $cby = $user_details->name;
    $img = $_FILES["file"]["name"];
    $tmp = $_FILES["file"]["tmp_name"];
    $errorimg = $_FILES["file"]["error"];

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
    $path = 'gallery/images/'; // upload directory
    if ($post_id) {
        if ($edit_inst == $img) {
            $sql_update = "UPDATE `tba_services` SET  `title`='$title',`tba_service_category`='$tba_service_category',`tba_service_type`='$tba_service_type',`description`='$description',`price`='$price',`price_amt`='$price_amt',`remarks`='$remarks',`url`='$url',`inst`='$edit_inst',`mdate`='$cdate',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$cby' WHERE `id`='$post_id'";
            $res1 = mysqli_query($conn, $sql_update);
        } else {
            if (!empty($_POST['tba_service_category']) || !empty($_POST['tba_service_type']) || $_FILES['file']) {
                $img = $_FILES['file']['name'];
                $tmp = $_FILES['file']['tmp_name'];
                $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                // $inst = rand(1000, 1000000) . $img;
                $inst = $img;
                if (in_array($ext, $valid_extensions)) {
                    $path = $path . strtolower($inst);
                    if (move_uploaded_file($tmp, $path)) {
                        $sql_update = "UPDATE `tba_services` SET  `title`='$title',`tba_service_category`='$tba_service_category',`tba_service_type`='$tba_service_type',`description`='$description',`price`='$price',`price_amt`='$price_amt',`remarks`='$remarks',`url`='$url',`inst`='$path',`mdate`='$cdate',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$cby' WHERE `id`='$post_id'";
                        $res1 = mysqli_query($conn, $sql_update);
                    }
                } else {
                    echo 'invalid';
                }
            }
        }
    } else {
        if (!empty($_POST['tba_service_category']) || !empty($_POST['tba_service_type']) || $_FILES['file']) {
            $img = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            // $inst = rand(1000, 1000000) . $img;
            $inst = $img;
            if (in_array($ext, $valid_extensions)) {
                $path = $path . strtolower($inst);
                if (move_uploaded_file($tmp, $path)) {
                    $sql = "INSERT INTO `tba_services`(`title`, `tba_service_category`, `tba_service_type`, `description`, `price`, `price_amt`, `remarks`, `url`, `inst`, `cdate`, `cby`, `cip`) 
                    VALUES 
                    ('$title','$tba_service_category','$tba_service_type','$description','$price','$price_amt','$remarks','$url','$path','$cdate','$cby','$_SERVER[REMOTE_ADDR]')";
                    $res1 = mysqli_query($conn, $sql);
                }
            } else {
                echo 'invalid';
            }
        }
    }
    exit;
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
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
                                    <h3 class="fs-2hx text-dark mt-8">New TBA Services</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Top-->
                                <!--begin::Card body-->
                                <div class="card-body pt-8">
                                    <!--begin::Form-->
                                    <form class="form mb-15" method="post" id="add_new_tba_serveice">
                                        <input type="hidden" id="edit_tba_service_type" value="<?php echo $edit_tba_service_type; ?>" />
                                        <input type="hidden" id="post_id" value="<?php echo $idd; ?>" />
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">TBA Service Category</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <!--begin::Input-->
                                                <select name="tba_service_category" id="tba_service_category" data-control="select2" data-placeholder="Select a Serivice Category..." class="form-select form-select-solid">
                                                    <option value=""></option>
                                                    <?php while ($row = mysqli_fetch_assoc($tba_service_category_result)) { ?>
                                                        <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $edit_tba_service_category) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                                            <?php echo $row['category']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <!--end::Input-->
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--end::Label-->
                                                <label class="required fs-5 fw-bold mb-2">TBA Service Subcategory</label>
                                                <!--end::Label-->
                                                <!--end::Input-->
                                                <select name="tba_service_type" id="tba_service_type" data-control="select2" data-placeholder="Select a Serivice Type..." class="form-select form-select-solid">
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div id="features_details_div"></div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-5">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Title</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="" name="title" id="title" value="<?php echo $edit_title; ?>" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-5">
                                            <label class="fs-5 fw-bold mb-2">Description</label>
                                            <!--begin::Input-->
                                            <textarea class="ckeditor" name="description" id="description"><?php echo htmlspecialchars($edit_description); ?></textarea>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-5">
                                            <!--begin::Input group-->
                                            <label class="required fs-5 fw-bold mb-2">Remarks</label>
                                            <textarea class="form-control form-control-solid" rows="5" name="remarks" id="remarks" placeholder=""><?php echo htmlspecialchars($edit_remarks); ?></textarea>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-5">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Price Type</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-3" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input price" type="radio" name="price" value="1" <?php if ($edit_price == '1') {
                                                                                                                                            echo "checked";
                                                                                                                                        } else if ($edit_price == '') {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">Fixed</span>
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
                                                            <input class="form-check-input price" type="radio" name="price" value="3" <?php if ($edit_price == '3') {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">Pack</span>
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
                                                            <input class="form-check-input price" type="radio" name="price" value="2" <?php if ($edit_price == '2') {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                        </span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
                                                            <span class="fs-4 fw-bolder text-gray-800 d-block">Custom</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <div class="fv-row mb-7 new_task" id="price_div">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Price & Validity Details</label>
                                            <!--end::Label-->
                                            <div class="task_append p-4" id="task_append1" style="border-style: dotted;">
                                                <!--begin::Input group-->
                                                <div class="row mb-7 pack_name_div">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold mb-2">Pack Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid pack_name" id="pack_name_1" placeholder="" name="pack_name[]" value="<?php echo $edit_pack_name; ?>" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 mt-9 fv-row">
                                                        <div class="remove float-end" id="fieldclose">
                                                            <button class="btn btn-outline-danger py-2 remove_field" type="button"><i class="fas fa-minus-circle add_icon"></i> Remove</button>
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="row mb-7">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-5 fw-bold mb-2">Pack Currency Details</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-md-6 fv-row">
                                                                <select name="currency[]" id="currency_1" data-control="select2" data-placeholder="Currency Code" class="form-control form-select form-select-solid select2-list currency select_dd">
                                                                    <option value="USD" <?php echo ($edit_currency == 'USD') ? 'selected' : ''; ?>>$ - USD</option>
                                                                    <option value="AUD" <?php echo ($edit_currency == 'AUD') ? 'selected' : ''; ?>>$ - AUD</option>
                                                                    <option value="CNY" <?php echo ($edit_currency == 'CNY') ? 'selected' : ''; ?>>¥ - CNY</option>
                                                                    <option value="CRC" <?php echo ($edit_currency == 'CRC') ? 'selected' : ''; ?>>₡ - CRC</option>
                                                                    <option value="EUR" <?php echo ($edit_currency == 'EUR') ? 'selected' : ''; ?>>€ - EUR</option>
                                                                    <option value="INR" <?php echo ($edit_currency == 'INR') ? 'selected' : ''; ?>>₹ - INR</option>
                                                                </select>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-md-6 fv-row">
                                                                <input type="text" class="form-control form-control-solid price" placeholder="Price" name="price[]" id="Price_1" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'');javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" autocomplete="off" value="<?php echo $edit_price; ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-5 fw-bold mb-2">Pack validity Details</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-md-6 fv-row">
                                                                <input type="text" class="form-control form-control-solid validity_count" placeholder="Validity Count" name="validity_count[]" id="validity_count_1" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'');javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" autocomplete="off" value="<?php echo $edit_validity_count; ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-md-6 fv-row">
                                                                <select name="pack_for[]" id="pack_for_1" placeholder="Pack For" class="form-select form-select-solid">
                                                                    <option value="">Pack For</option>
                                                                    <option value="day" <?php echo ($edit_pack_for == 'day') ? 'selected' : ''; ?>>Days</option>
                                                                    <option value="month" <?php echo ($edit_pack_for == 'month') ? 'selected' : ''; ?>>Month(s)</option>
                                                                    <option value="year" <?php echo ($edit_pack_for == 'year') ? 'selected' : ''; ?>>Year(s)</option>
                                                                </select>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="row mb-7">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold mb-2">Features</label>
                                                        <!--end::Label-->
                                                        <select name="select_features[]" class="form-select form-select-solid select2-list select_dd select_features" multiple>
                                                            <?php
                                                            $features_sql = "SELECT * FROM `tba_features` WHERE `is_delete` = '0'";
                                                            $features_result = mysqli_query($conn, $features_sql);
                                                            while ($row = mysqli_fetch_assoc($features_result)) { ?>
                                                                <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $edit_features) {
                                                                                                                echo "selected";
                                                                                                            } ?>>
                                                                    <?php echo $row['features']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-bold mb-2">Deliverables</label>
                                                        <!--end::Label-->
                                                        <select name="select_deliverables[]" data-control="select2" data-placeholder="Select a Deliverables..." class="form-select form-select-solid select2-list selectdeliverables select_dd" multiple>
                                                         
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="row float-end">
                                            <button class="btn btn-primary py-2 add_field_button" type="button" name="new"><i class="fas fa-plus add_icon"></i> Add New Pack</button>
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="row mt-5 mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold mb-2">URL</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="url" class="form-control form-control-solid" placeholder="" name="url" id="url" value="<?php echo  $edit_url; ?>" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold mb-5">
                                                    <span>Update Thumbnail Image</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <!--begin::Image input wrapper-->
                                                <div class="mt-1">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-100px h-100px" style="background-image: <?php if ($edit_inst) {
                                                                                                                                        echo "url('" . $edit_inst . "')";
                                                                                                                                    } else {
                                                                                                                                        echo "url('assets/media/svg/avatars/blank.svg')";
                                                                                                                                    } ?> "></div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Edit-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="inst" accept=".png, .jpg, .jpeg" id="inst" value="<?php echo $edit_inst; ?>" />
                                                            <!-- <input type="hidden" name="inst" /> -->
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Edit-->
                                                        <!--begin::Cancel-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                            <i class="bi bi-x-circle fs-2"></i>
                                                        </span>
                                                        <!--end::Remove-->
                                                    </div>
                                                    <!--end::Image input-->
                                                </div>
                                                <!--end::Image input wrapper-->
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--begin::Separator-->
                                        <div class="separator mb-8"></div>
                                        <!--end::Separator-->
                                        <div class="text-center">
                                            <!--begin::Submit-->
                                            <button type="submit" class="btn btn-success " id="add_new_tba_serveice_submit_button" name="add_new_tba_serveice_submit">
                                                <!--begin::Indicator-->
                                                <span class="indicator-label">Save Now</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                <!--end::Indicator-->
                                            </button>
                                            <!--end::Submit-->
                                        </div>
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
<script>
    $(document).ready(function() {
        getcattype();
        getradiovalue();
        $(".select2-list").select2();
        $('.select2-list').select2({
            width: '100%',
            placeholder: "Select an Option",
            allowClear: true,
            tags: true
        });
        var t, e, i;
        i = document.querySelector("#add_new_tba_serveice");
        t = document.getElementById("add_new_tba_serveice_submit_button");
        $(i.querySelector('[name="tba_service_category"]')).on("change", function() {
                e.revalidateField("tba_service_category");
            }),
            $(i.querySelector('[name="tba_service_type"]')).on("change", function() {
                e.revalidateField("tba_service_type");
            }),
            (e = FormValidation.formValidation(i, {
                fields: {
                    tba_service_type: {
                        validators: {
                            notEmpty: {
                                message: "TBA Service sub category is required"
                            }
                        }
                    },
                    tba_service_category: {
                        validators: {
                            notEmpty: {
                                message: "TBA Service Category is required"
                            }
                        }
                    },
                    title: {
                        validators: {
                            notEmpty: {
                                message: "Title is required"
                            }
                        }
                    },
                    remarks: {
                        validators: {
                            notEmpty: {
                                message: "Remarks is required"
                            }
                        }
                    },
                    price: {
                        validators: {
                            notEmpty: {
                                message: "Price type  is required"
                            }
                        }
                    },
                    price_amt: {
                        validators: {
                            notEmpty: {
                                message: "Price amount is required"
                            }
                        }
                    },
                    inst: {
                        validators: {
                            notEmpty: {
                                message: "Thumbnail Image is required"
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
        // $("#tba_service_type").attr('disabled', 'disabled');
        $("#tba_service_category").on('change', function() {
            getcattype();
        });
        $(".select_features").change(function(event) {
            var id_name = $(this).val();
            getdeliverables(id_name);
        });
        remove_option_show();
        $(".price").on('change', function() {
            getradiovalue();
        });
    });
</script>
<script src="assets/plugins/custom/ckeditor/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
    function getradiovalue() {
        var radioValue = $("input[name='price']:checked").val();
        if (radioValue == '1') {
            $("#price_div").show();
            $(".add_field_button").hide();
            $(".pack_name_div").hide();
            $(".pack_name").val("-");
        } else if (radioValue == '3') {
            $(".pack_name_div").show();
            $(".pack_name").val("");
            $(".add_field_button").show();
            $("#price_div").show();
        } else if (radioValue.value == '2') {
            $("#price_div").hide();
            $("#price_amt").val('0');
        } else {
            $("#price_div").hide();
        }
    }

    function getcattype() {
        var cat_id = $("#tba_service_category").val();
        var edit_tba_service_type = $("#edit_tba_service_type").val();
        // $("#tba_service_type").removeAttr('disabled');
        $.post('add_tba_services.php', {
                cat_id: cat_id,
                edit_tba_service_type: edit_tba_service_type
            },
            function(data, status) {
                $("#tba_service_type").html(data);
            });
    }

    function myFunction() {
        CKEDITOR.replace('description');
        var inst = $('#inst').prop('files')[0];
        var post_id = $("#post_id").val();
        var title = $("#title").val();
        var description = CKEDITOR.instances["description"].getData();
        var price = $('input[name=price]:checked').val();
        var price_amt = $("#price_amt").val();
        var inst = $("#inst").val();
        var url = $("#url").val();
        var remarks = $("#remarks").val();
        var tba_service_category = $("#tba_service_category").val();
        var tba_service_type = $("#tba_service_type").val();
        var pack_name = $(".pack_name").val();
        var currency = $(".currency").val();
        var price = $(".price").val();
        var select_features = $(".select_features").val();
        var select_deliverables = $(".select_deliverables").val();
        var form_data = new FormData();
        form_data.append('file', document.getElementById("inst").files[0]);
        form_data.append('title', title);
        form_data.append('post_id', post_id);
        form_data.append('description', description);
        form_data.append('price', price);
        form_data.append('price_amt', price_amt);
        form_data.append('url', url);
        form_data.append('remarks', remarks);
        form_data.append('tba_service_category', tba_service_category);
        form_data.append('tba_service_type', tba_service_type);
        $.ajax({
            type: "post",
            url: "add_tba_services.php",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                // console.log(response);
                // window.location = 'list_tba_service.php';
            },
            error: function() {
                alert('Error occurs!');
            }
        });
    }

    function  getdeliverables(id_name){
        var feature_id = id_name;
        $.post('add_tba_services.php', {
            feature_id: feature_id,
            },
            function(data, status) {
                $(".selectdeliverables").html(data);
            });
    }

    function remove_option_show() {
        removeItems = $('.task_append').length;
        if (removeItems > 1) {
            $('.remove').show();
        } else {
            $('.remove').hide();
        }
    }

    function checkdub() {
        $('.divc').remove();
        $.each($('.task_append'), function(index1, item1) {
            var iss = $(this);
            var count = 0;
            var select_project = $(this).find(".select1").val();
            var input_task = $.trim($(this).find(".pack_name").val());
            var con_pro_task = select_project + input_task.toString().toLowerCase();
            console.log('firsteach :' + con_pro_task);
            $.each($('.task_append').not(iss), function(index2, item2) {
                count = $('.divc').size();
                var select_project1 = $(this).find(".select1").val();
                var input_task1 = $.trim($(this).find(".task").val());
                var con_pro_task1 = select_project1 + input_task1.toString().toLowerCase();
                if (input_task !== '' && input_task1 !== '') {
                    if (con_pro_task == con_pro_task1) {
                        console.log('secound:' + con_pro_task1);
                        if (count > 2) {
                            $(this).find('.pack_name').parent().find(".divc").remove();
                        }
                        $(this).find(".pack_name").parent().append('<span style="color:red" class="divc"> Task Name  Exist </span> ');
                    }
                }
            });
        });
    }
</script>

<script>
    $(document).on('click', ".add_field_button", function() {
        $("#fieldclose").show();
        $('.task_append:last').clone().find("select").val("").end().find("input:text").val("").end().find('span').text(' ').end().appendTo('.new_task:last').find('.temp').remove();
        var id = $(".task_append:last").prop("id").replace("task_append", "");
        var id1 = parseInt(id) + 1; // Declare new id ++1
        var final = $(".task_append:last").attr('id', "task_append" + id1); // added id
        var id2 = $(".select2-list:last").prop("id").replace("select_features", "");
        var id3 = parseInt(id2) + 1; // Declare new id ++1
        // var final1 = $(".select_features:last").attr('id', "select_features" + id3); // added id
        // $('#select_features'+ id3).removeClass('select2-hidden-accessible');
        $('.select2-list').removeClass('select2-hidden-accessible');
        $('.select2-list').select2();
        var last = $(final).attr('id');
        remove_option_show();
    });

    $(document).on("click", "#fieldclose", function(e) {
        e.preventDefault();
        var n = $(this).parent('div').parent('div').parent('div').remove();
        remove_option_show();
        checkdub();
    });

    $(document).on('blur keyup ', '.pack_name', function() {
        checkdub();
    });
</script>
</html>