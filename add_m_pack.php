<?php
include_once 'includes/php/common_php.php';

$id =  $edit_id = $edit_pack_name = $edit_price = $edit_currency = $edit_validity_count = $edit_pack_for = $edit_features = '';

if (isset($_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'])) {
    $encrypt_action = $_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'];
    $action = encrypt_decrypt('decrypt', $encrypt_action);
    $encrypt_id = $_GET['WnAyV3FOdHJ3dkNiMEgrMGxVcytZUT09'];
    $id = encrypt_decrypt('decrypt', $encrypt_id);
    if ($action == 'edit') {
        $sql = "SELECT `id`, `pack_name`,`price`, `currency`, `validity_count`, `pack_for`, `features` FROM `tba_pack_details` WHERE `id` ='$id' ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $edit_id = $row['id'];
            $edit_pack_name = $row['pack_name'];
            $edit_price = $row['price'];
            $edit_currency = $row['currency'];
            $edit_validity_count = $row['validity_count'];
            $edit_pack_for = $row['pack_for'];
            $edit_features = $row['features'];
        }
    } else if ($action == 'deactive') {
        $sql = "UPDATE `tba_pack_details` SET `is_active` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_m_pack.php?msg=3");
    } else if ($action == 'active') {
        $sql = "UPDATE `tba_pack_details` SET `is_active` = '0' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_m_pack.php?msg=3");
    } else if ($action == 'delete') {
        $sql = "UPDATE `tba_pack_details` SET `is_delete` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_m_pack.php?msg=4");
    }
}

if (isset($_POST['pack_name'])) {
    $pack_name = mysqli_real_escape_string($conn, $_POST["pack_name"]);
    $currency = mysqli_real_escape_string($conn, $_POST["currency"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $validity_count = mysqli_real_escape_string($conn, $_POST["validity_count"]);
    $features = mysqli_real_escape_string($conn, $_POST["features"]);
    $id = $_POST["id"];
    $cdate = date('Y-m-d H:i:s');
    $cby = $user_details->name;
    if ($id) {
        $sql6 = "UPDATE `tba_pack_details` SET `pack_name`= '$pack_name',`price`= '$price',`currency`= '$currency',`validity_count`= '$validity_count',`pack_for`= '$pack_for',`features`= '$features',`mdate`='$cdate', `mip`='$_SERVER[REMOTE_ADDR]', `mby`='$cby' WHERE id='$id'";
        $res6 = mysqli_query($conn, $sql6);
        header("Location: add_m_pack.php");
    } else {
        $sql5 = "SELECT * FROM `tba_pack_details` where `pack_name` = '$pack_name'";
        $res5 = mysqli_query($conn, $sql5);
        if (mysqli_num_rows($res5)) {
            $msg = 1;
        } else {
            $sql6 = "INSERT INTO `tba_pack_details`(`pack_name`, `price`, `currency`, `validity_count`, `pack_for`, `features`,`cdate`, `cip`, `cby`) 
            VALUES ('$pack_name','$price','$currency','$validity_count','$pack_for','$features','$cdate','$_SERVER[REMOTE_ADDR]','$cby')";
            $res6 = mysqli_query($conn, $sql6);
            header("Location: add_m_pack.php");
        }
    }
}

$sql = "SELECT * FROM `tba_pack_details` where `is_active`='0' and `is_delete`='0' ORDER BY `id` desc";
$active_result = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM `tba_pack_details` where `is_active`='1' and `is_delete`='0' ORDER BY `id` desc";
$inactive_result = mysqli_query($conn, $sql1);
$sql2 = "SELECT * FROM `tba_pack_details` where `is_delete`='1' ORDER BY `id` desc";
$delete_result = mysqli_query($conn, $sql2);
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
                                <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                                    <!--begin::Page title-->
                                    <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                        <!--begin::Title-->
                                        <h3 class="fs-2hx text-dark mt-8">TBA Pack Details</h3>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Page title-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center mt-8 gap-2 gap-lg-3">
                                        <button type="button" class="btn btn-primary er w-100 fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_add_pack">Create New Pack</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Form-->
                                    <!--begin::Modals-->
                                    <!--begin::Modal - Pack - Add-->
                                    <div class="modal fade" id="kt_modal_add_pack" tabindex="-1" aria-hidden="true">
                                        <!--begin::Modal dialog-->
                                        <div class="modal-dialog modal-dialog-centered mw-950px">
                                            <!--begin::Modal content-->
                                            <div class="modal-content">
                                                <!--begin::Form-->
                                                <form class="form" id="kt_modal_add_pack_form" role="form" method="POST" enctype="multipart/form-data">
                                                <input id="edit_id" type="hidden" value="<?php echo $edit_id ?>" />
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header" id="kt_modal_add_pack_header">
                                                        <!--begin::Modal title-->
                                                        <h2 class="fw-bolder m-auto">Add a Pack</h2>
                                                        <!--end::Modal title-->
                                                        <!--begin::Close-->
                                                        <div id="kt_modal_add_pack_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                            <span class="svg-icon svg-icon-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--end::Modal header-->
                                                    <!--begin::Modal body-->
                                                    <div class="modal-body py-10 px-lg-17">
                                                        <!--begin::Scroll-->
                                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_pack_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_pack_header" data-kt-scroll-wrappers="#kt_modal_add_pack_scroll" data-kt-scroll-offset="300px">
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="required fs-6 fw-bold mb-2">Pack Name</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" class="form-control form-control-solid pack_name" id="pack_name" placeholder="" name="pack_name" value="<?php echo $edit_pack_name; ?>" />
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="row mb-15">
                                                                <!--begin::Col-->
                                                                <div class="col-md-6 fv-row">
                                                                    <!--begin::Label-->
                                                                    <label class="required fs-5 fw-bold mb-2">Pack Currency Details</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <div class="row">
                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 fv-row">
                                                                            <select name="currency" id="currency" data-control="select2" data-placeholder="Currency Code" class="form-select form-select-solid">
                                                                                <option value=""></option>
                                                                                <option value="USD" <?php echo ($edit_currency == 'USD') ? 'selected' : '';?>>$ - USD</option>
                                                                                <option value="AUD" <?php echo ($edit_currency == 'AUD') ? 'selected' : '';?>>$ - AUD</option>
                                                                                <option value="CNY" <?php echo ($edit_currency == 'CNY') ? 'selected' : '';?>>¥ - CNY</option>
                                                                                <option value="CRC" <?php echo ($edit_currency == 'CRC') ? 'selected' : '';?>>₡ - CRC</option>
                                                                                <option value="EUR" <?php echo ($edit_currency == 'EUR') ? 'selected' : '';?>>€ - EUR</option>
                                                                                <option value="INR" <?php echo ($edit_currency == 'INR') ? 'selected' : '';?>>₹ - INR</option>
                                                                            </select>
                                                                        </div>
                                                                        <!--end::Col-->
                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 fv-row">
                                                                            <input type="text" class="form-control form-control-solid price" placeholder="Price" name="price" id="Price" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'');javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" autocomplete="off"  value="<?php echo $edit_price; ?>"/>
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
                                                                            <input type="text" class="form-control form-control-solid validity_count" placeholder="Validity Count" name="validity_count" id="validity_count" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'');javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" autocomplete="off" value="<?php echo $edit_validity_count; ?>" />
                                                                        </div>
                                                                        <!--end::Col-->
                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 fv-row">
                                                                            <select name="pack_for" id="pack_for" placeholder="Pack For" class="form-select form-select-solid">
                                                                                <option value="">Pack For</option>
                                                                                <option value="day" <?php echo ($edit_pack_for == 'day') ? 'selected' : '';?>>Days</option>
                                                                                <option value="month" <?php echo ($edit_pack_for == 'month') ? 'selected' : '';?>>Month(s)</option>
                                                                                <option value="year" <?php echo ($edit_pack_for == 'year') ? 'selected' : '';?>>Year(s)</option>
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
                                                            <div class="fv-row mb-15">
                                                                <!--begin::Label-->
                                                                <label class="required fs-6 fw-bold mb-2">Features</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <textarea class="form-control form-control-solid" rows="2" name="features" id="features" placeholder=""><?php echo $edit_features; ?></textarea>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--end::Scroll-->
                                                        </div>
                                                    </div>
                                                    <!--end::Modal body-->
                                                    <!--begin::Modal footer-->
                                                    <div class="modal-footer flex-center">
                                                        <!--begin::Button-->
                                                        <button type="reset" id="kt_modal_add_pack_cancel" class="btn btn-light me-3">Discard</button>
                                                        <!--end::Button-->
                                                        <!--begin::Button-->
                                                        <button type="submit" id="kt_modal_add_pack_submit" class="btn btn-primary">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                        <!--end::Button-->
                                                    </div>
                                                    <!--end::Modal footer-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Modal - Pack - Add-->
                                    <!--end::Form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <br>
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="text-center">
                                    <!--begin::Title-->
                                    <!-- <h3 class="fs-2hx text-dark mt-8">Edit And Delete TBA Service Category</h3> -->
                                    <!--end::Title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::content-->
                                    <!--begin::Tab Content-->
                                    <div class="tab-content">
                                        <!--begin::Tab pane-->
                                        <div id="kt_project_targets_card_pane" class="tab-pane fade show active">
                                            <!--begin::Row-->
                                            <div class="row g-9">
                                                <!--begin::Col-->
                                                <div class="col-md-4 col-lg-12 col-xl-4">
                                                    <!--begin::Col header-->
                                                    <div class="mb-9 mt-4">
                                                        <div class="d-flex flex-stack">
                                                            <div class="fw-bolder fs-4">Active
                                                                <span class="fs-6 text-gray-400 ms-2">3</span>
                                                            </div>
                                                            <!--begin::Menu-->
                                                            <div>
                                                                <button type="button" class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                                                <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                                <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                                <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                            </div>
                                                            <!--end::Menu-->
                                                        </div>
                                                        <div class="h-3px w-100 bg-success"></div>
                                                    </div>
                                                    <!--end::Col header-->
                                                    <!--begin::Card-->
                                                    <div class="card mb-6 mb-xl-9">
                                                        <!--begin::Card body-->
                                                        <div class="card-body p-0">
                                                            <!--begin::Search-->
                                                            <div class="d-flex align-items-center position-relative my-1 col-md-12 fv-row">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid ps-15" placeholder="Search Here" />
                                                            </div>
                                                            <!--end::Search-->
                                                            <!--begin::Table-->
                                                            <table id="kt_customers_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                                                <!--begin::Table head-->
                                                                <thead class="fs-7 text-gray-400 text-uppercase">
                                                                    <tr>
                                                                        <th class="min-w-150px">Pack Name</th>
                                                                        <th class="min-w-50px">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6">
                                                                    <!--begin::Table row-->
                                                                    <?php 
                                                                    while ($row = mysqli_fetch_assoc($active_result)){
                                                                        $id = encrypt_decrypt('encrypt', $row['id']);
                                                                        $pack_name = $row['pack_name'];
                                                                        $pack_id = $row['id'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="fw-bolder">
                                                                            <a href="#" class="text-gray-900 text-hover-primary"><?php echo $pack_name; ?></a>
                                                                        </td>
                                                                        <td class="text-end">
                                                                            <a href="<?php echo $pack_id; ?>" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">View</a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    <!--end::Table row-->
                                                                </tbody>
                                                                <!--end::Table body-->
                                                            </table>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Card body-->
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-4 col-lg-12 col-xl-4">
                                                    <!--begin::Col header-->
                                                    <div class="mb-9 mt-4">
                                                        <div class="d-flex flex-stack">
                                                            <div class="fw-bolder fs-4">Inactive
                                                                <span class="fs-6 text-gray-400 ms-2">2</span>
                                                            </div>
                                                            <!--begin::Menu-->
                                                            <div>
                                                                <button type="button" class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                                                <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                                <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                                <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                            </div>
                                                            <!--end::Menu-->
                                                        </div>
                                                        <div class="h-3px w-100 bg-warning"></div>
                                                    </div>
                                                    <!--end::Col header-->
                                                    <!--begin::Card-->
                                                    <div class="card mb-6 mb-xl-9">
                                                        <!--begin::Card body-->
                                                        <div class="card-body p-0">
                                                            <!--begin::Search-->
                                                            <div class="d-flex align-items-center position-relative my-1 col-md-12 fv-row">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <input type="text" data-kt-customer-table-filter_2="search" class="form-control form-control-solid ps-15" placeholder="Search Here" />
                                                            </div>
                                                            <!--end::Search-->
                                                            <!--begin::Table-->
                                                            <table id="kt_customers_table_2" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                                                <!--begin::Table head-->
                                                                <thead class="fs-7 text-gray-400 text-uppercase">
                                                                    <tr>
                                                                        <th class="min-w-150px">Pack Name</th>
                                                                        <th class="min-w-50px">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6">
                                                                    <!--begin::Table row-->
                                                                    <?php 
                                                                    while ($row = mysqli_fetch_assoc($inactive_result)){
                                                                        $id = encrypt_decrypt('encrypt', $row['id']);
                                                                        $pack_name = $row['pack_name'];
                                                                        $pack_id = $row['id'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="fw-bolder">
                                                                            <a href="#" class="text-gray-900 text-hover-primary"><?php echo $pack_name; ?></a>
                                                                        </td>
                                                                        <td class="text-end">
                                                                            <a href="<?php echo $pack_id; ?>" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">View</a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    <!--end::Table row-->
                                                                </tbody>
                                                                <!--end::Table body-->
                                                            </table>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Card body-->
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-4 col-lg-12 col-xl-4">
                                                    <!--begin::Col header-->
                                                    <div class="mb-9  mt-4">
                                                        <div class="d-flex flex-stack">
                                                            <div class="fw-bolder fs-4">Deleted
                                                                <span class="fs-6 text-gray-400 ms-2">4</span>
                                                            </div>
                                                            <!--begin::Menu-->
                                                            <div>
                                                                <button type="button" class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                                                <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                                <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                                <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                            </div>
                                                            <!--end::Menu-->
                                                        </div>
                                                        <div class="h-3px w-100 bg-danger"></div>
                                                    </div>
                                                    <!--end::Col header-->
                                                    <!--begin::Card-->
                                                    <div class="card mb-6 mb-xl-9">
                                                        <!--begin::Card body-->
                                                        <div class="card-body p-0">
                                                            <!--begin::Search-->
                                                            <div class="d-flex align-items-center position-relative my-1 col-md-12 fv-row">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <input type="text" data-kt-customer-table-filter_3="search" class="form-control form-control-solid ps-15" placeholder="Search Here" />
                                                            </div>
                                                            <!--end::Search-->
                                                            <!--begin::Table-->
                                                            <table id="kt_customers_table_3" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                                                <!--begin::Table head-->
                                                                <thead class="fs-7 text-gray-400 text-uppercase">
                                                                    <tr>
                                                                        <th class="min-w-150px">Pack Name</th>
                                                                        <th class="min-w-50px">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6">
                                                                    <!--begin::Table row-->
                                                                    <?php 
                                                                    while ($row = mysqli_fetch_assoc($delete_result)){
                                                                        $id = encrypt_decrypt('encrypt', $row['id']);
                                                                        $pack_name = $row['pack_name'];
                                                                        $pack_id = $row['id'];
                                                                    ?>
                                                                    <tr>
                                                                        <td class="fw-bolder">
                                                                            <a href="#" class="text-gray-900 text-hover-primary"><?php echo $pack_name; ?></a>
                                                                        </td>
                                                                        <td class="text-end">
                                                                            <a href="<?php echo $pack_id; ?>" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">View</a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    <!--end::Table row-->
                                                                </tbody>
                                                                <!--end::Table body-->
                                                            </table>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Card body-->
                                                    </div>
                                                    <!--end::Card-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Tab pane-->
                                    </div>
                                    <!--end::Tab Content-->
                                    <!--end::content-->
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
    	<!--begin::Modal - View Users-->
        <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header pb-0 border-0 justify-content-end">
												<!--begin::Close-->
												<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--begin::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
												<!--begin::Heading-->
												<div class="text-center mb-13">
													<!--begin::Title-->
													<h1 class="mb-3">Browse Users</h1>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="text-muted fw-bold fs-5">If you need more info, please check out our 
													<a href="#" class="link-primary fw-bolder">Users Directory</a>.</div>
													<!--end::Description-->
												</div>
												<!--end::Heading-->
												<!--begin::Users-->
												<div class="mb-15">
													<!--begin::List-->
													<div class="mh-375px scroll-y me-n7 pe-7">
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Emma Smith 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Art Director</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">smith@kpmg.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$23,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Melody Macy 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Marketing Analytic</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">melody@altbox.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$50,500</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="../../assets/media/avatars/300-1.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Max Smith 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Software Enginer</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">max@kt.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$75,900</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="../../assets/media/avatars/300-5.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Sean Bean 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Web Developer</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">sean@dellito.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$10,500</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="../../assets/media/avatars/300-25.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Brian Cox 
																	<span class="badge badge-light fs-8 fw-bold ms-2">UI/UX Designer</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">brian@exchange.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$20,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-warning text-warning fw-bold">C</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Mikaela Collins 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Head Of Marketing</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">mik@pex.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$9,300</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="../../assets/media/avatars/300-9.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Francis Mitcham 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Software Arcitect</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">f.mit@kpmg.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$15,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Olivia Wild 
																	<span class="badge badge-light fs-8 fw-bold ms-2">System Admin</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">olivia@corpmail.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$23,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Neil Owen 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Account Manager</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">owen.neil@gmail.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$45,800</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="../../assets/media/avatars/300-23.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Dan Wilson 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Web Desinger</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">dam@consilting.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$90,500</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Emma Bold 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Corporate Finance</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">emma@intenso.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$5,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<img alt="Pic" src="../../assets/media/avatars/300-12.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Ana Crown 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Customer Relationship</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">ana.cf@limtel.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$70,000</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
														<!--begin::User-->
														<div class="d-flex flex-stack py-5">
															<!--begin::Details-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-35px symbol-circle">
																	<span class="symbol-label bg-light-info text-info fw-bold">A</span>
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="ms-6">
																	<!--begin::Name-->
																	<a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Robert Doe 
																	<span class="badge badge-light fs-8 fw-bold ms-2">Marketing Executive</span></a>
																	<!--end::Name-->
																	<!--begin::Email-->
																	<div class="fw-bold text-muted">robert@benko.com</div>
																	<!--end::Email-->
																</div>
																<!--end::Details-->
															</div>
															<!--end::Details-->
															<!--begin::Stats-->
															<div class="d-flex">
																<!--begin::Sales-->
																<div class="text-end">
																	<div class="fs-5 fw-bolder text-dark">$45,500</div>
																	<div class="fs-7 text-muted">Sales</div>
																</div>
																<!--end::Sales-->
															</div>
															<!--end::Stats-->
														</div>
														<!--end::User-->
													</div>
													<!--end::List-->
												</div>
												<!--end::Users-->
												<!--begin::Notice-->
												<div class="d-flex justify-content-between">
													<!--begin::Label-->
													<div class="fw-bold">
														<label class="fs-6">Adding Users by Team Members</label>
														<div class="fs-7 text-muted">If you need more info, please check budget planning</div>
													</div>
													<!--end::Label-->
													<!--begin::Switch-->
													<label class="form-check form-switch form-check-custom form-check-solid">
														<input class="form-check-input" type="checkbox" value="" checked="checked" />
														<span class="form-check-label fw-bold text-muted">Allowed</span>
													</label>
													<!--end::Switch-->
												</div>
												<!--end::Notice-->
											</div>
											<!--end::Modal body-->
										</div>
										<!--end::Modal content-->
									</div>
									<!--end::Modal dialog-->
								</div>
								<!--end::Modal - View Users-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    "use strict";
    var KTModalCustomersAdd = (function() {
        var t, e, o, n, r, i;
        return {
            init: function() {
                (i = new bootstrap.Modal(document.querySelector("#kt_modal_add_pack"))),
                (r = document.querySelector("#kt_modal_add_pack_form")),
                (t = r.querySelector("#kt_modal_add_pack_submit")),
                (e = r.querySelector("#kt_modal_add_pack_cancel")),
                (o = r.querySelector("#kt_modal_add_pack_close")),
                (n = FormValidation.formValidation(r, {
                    fields: {
                        pack_name: {
                            validators: {
                                notEmpty: {
                                    message: "Pack name is required"
                                }
                            }
                        },
                        currency: {
                            validators: {
                                notEmpty: {
                                    message: "currency is required"
                                }
                            }
                        },
                        price: {
                            validators: {
                                notEmpty: {
                                    message: "Price is required"
                                }
                            }
                        },
                        validity_count: {
                            validators: {
                                notEmpty: {
                                    message: "Validity count is required"
                                }
                            }
                        },
                        pack_for: {
                            validators: {
                                notEmpty: {
                                    message: "Pack for is required"
                                }
                            }
                        },
                        features: {
                            validators: {
                                notEmpty: {
                                    message: "Features is required"
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
                })),
                $(r.querySelector('[name="currency"]')).on("change", function() {
                        n.revalidateField("currency");
                    }),
                    $(r.querySelector('[name="pack_for"]')).on("change", function() {
                        n.revalidateField("pack_for");
                    }),
                    t.addEventListener("click", function(e) {
                        e.preventDefault(),
                            n &&
                            n.validate().then(function(e) {
                                console.log("validated!"),
                                    "Valid" == e ?
                                    (
                                        myFunction()

                                    ) : Swal.fire({
                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        },
                                    });
                            });
                    }),
                    e.addEventListener("click", function(t) {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Are you sure you would like to cancel?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, cancel it!",
                                cancelButtonText: "No, return",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                    cancelButton: "btn btn-active-light"
                                },
                            }).then(function(t) {
                                t.value ?
                                    (r.reset(), i.hide()) :
                                    "cancel" === t.dismiss && Swal.fire({
                                        text: "Your form has not been cancelled!.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                            });
                    }),
                    o.addEventListener("click", function(t) {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Are you sure you would like to cancel?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, cancel it!",
                                cancelButtonText: "No, return",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                    cancelButton: "btn btn-active-light"
                                },
                            }).then(function(t) {
                                t.value ?
                                    (r.reset(), i.hide()) :
                                    "cancel" === t.dismiss && Swal.fire({
                                        text: "Your form has not been cancelled!.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                            });
                    });
            },
        };
    })();
    KTUtil.onDOMContentLoaded(function() {
        KTModalCustomersAdd.init();
    });

    function myFunction() {
        var pack_name = $("#pack_name").val();
        var currency = $("#currency").val();
        var price = $("#price").val();
        var validity_count = $("#validity_count").val();
        var features = $("#features").val();
        var id = $("#edit_id").val();
        $.ajax({
            type: "post",
            url: "add_m_pack.php",
            data: {
                pack_name: pack_name,
                currency: currency,
                price: price,
                validity_count: validity_count,
                features: features,
                id: id
            },
            success: function(response) {
                // console.log(response);
                window.location = 'add_m_pack.php';
            },
            error: function() {
                alert('Error occurs!');
            }
        });
    }
</script>

</html>