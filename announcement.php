<?php
include_once 'includes/php/common_php.php';

$id =  $idd = '';

$sql = "SELECT * FROM `tba_announcement` where live_date <= CURDATE() and `is_active`='0' and `is_delete`='0' ORDER BY `id` desc";
$active_result = mysqli_query($conn, $sql);
$sql3 = "SELECT * FROM `tba_announcement` where live_date > CURDATE() and `is_active`='0' and `is_delete`='0' ORDER BY `id` desc";
$upcomming_result = mysqli_query($conn, $sql3);
$sql1 = "SELECT * FROM `tba_announcement` where `is_active`='1' and `is_delete`='0' ORDER BY `id` desc";
$inactive_result = mysqli_query($conn, $sql1);
$sql2 = "SELECT * FROM `tba_announcement` where `is_delete`='1' ORDER BY `id` desc";
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container {
            z-index: 999999 !important;
        }
    </style>
    <?php
    include_once 'includes/common_header_links.php';
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
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
                                        <h3 class="fs-2hx text-dark mt-8">Announcement's</h3>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Page title-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center mt-8 gap-2 gap-lg-3">
                                        <a href="add_a_announcement.php"> <button type="button" class="btn btn-primary er w-100 fs-6 px-8 py-4">Create New Announcement</button> </a>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Form-->
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
                                                <div class="col-md-3 col-lg-12 col-xl-3">
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
                                                                        <th class="min-w-150px">Title</th>
                                                                        <th class="min-w-50px">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6">
                                                                    <?php
                                                                    while ($row = mysqli_fetch_assoc($active_result)) {
                                                                        $id = encrypt_decrypt('encrypt', $row['id']);
                                                                        $title = $row['title'];
                                                                        $remark = $row['remark'];
                                                                        $description = $row['description'];
                                                                        $announcement_no = $row['id'];
                                                                        $is_active = $row['is_active'];
                                                                        $is_delete = $row['is_delete'];
                                                                    ?>
                                                                        <!--begin::Table row-->
                                                                        <tr>
                                                                            <td class="fw-bolder">
                                                                                <a class="text-gray-900 text-hover-primary"><?php echo $title; ?></a>
                                                                            </td>
                                                                            <td class="text-end">
                                                                                <a href="<?php echo $announcement_no; ?>" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users<?php echo $announcement_no; ?>">View</a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                        include 'includes/php/announcement_view_modal.php';
                                                                    }
                                                                    ?>
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
                                                <div class="col-md-3 col-lg-12 col-xl-3">
                                                    <!--begin::Col header-->
                                                    <div class="mb-9  mt-4">
                                                        <div class="d-flex flex-stack">
                                                            <div class="fw-bolder fs-4">Upcomming
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
                                                                <!--begin::Menu 1-->
                                                                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_621db37b5c136">
                                                                    <!--begin::Header-->
                                                                    <div class="px-7 py-5">
                                                                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                                                    </div>
                                                                    <!--end::Header-->
                                                                    <!--begin::Menu separator-->
                                                                    <div class="separator border-gray-200"></div>
                                                                    <!--end::Menu separator-->
                                                                    <!--begin::Form-->
                                                                    <div class="px-7 py-5">
                                                                        <!--begin::Input group-->
                                                                        <div class="mb-10">
                                                                            <!--begin::Label-->
                                                                            <label class="form-label fw-bold">Status:</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <div>
                                                                                <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_621db37b5c136" data-allow-clear="true">
                                                                                    <option></option>
                                                                                    <option value="1">Approved</option>
                                                                                    <option value="2">Pending</option>
                                                                                    <option value="2">In Process</option>
                                                                                    <option value="2">Rejected</option>
                                                                                </select>
                                                                            </div>
                                                                            <!--end::Input-->
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="mb-10">
                                                                            <!--begin::Label-->
                                                                            <label class="form-label fw-bold">Member Type:</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Options-->
                                                                            <div class="d-flex">
                                                                                <!--begin::Options-->
                                                                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                                    <input class="form-check-input" type="checkbox" value="1" />
                                                                                    <span class="form-check-label">Author</span>
                                                                                </label>
                                                                                <!--end::Options-->
                                                                                <!--begin::Options-->
                                                                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                                                    <span class="form-check-label">Customer</span>
                                                                                </label>
                                                                                <!--end::Options-->
                                                                            </div>
                                                                            <!--end::Options-->
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="mb-10">
                                                                            <!--begin::Label-->
                                                                            <label class="form-label fw-bold">Notifications:</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Switch-->
                                                                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                                                                <label class="form-check-label">Enabled</label>
                                                                            </div>
                                                                            <!--end::Switch-->
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Actions-->
                                                                        <div class="d-flex justify-content-end">
                                                                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                                                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                                                        </div>
                                                                        <!--end::Actions-->
                                                                    </div>
                                                                    <!--end::Form-->
                                                                </div>
                                                                <!--end::Menu 1-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </div>
                                                        <div class="h-3px w-100 bg-primary"></div>
                                                    </div>
                                                    <!--end::Col header-->
                                                    <!--begin::Card-->
                                                    <div class="card mb-6 mb-xl-9">
                                                        <!--begin::Card body-->
                                                        <div class="card-body  p-0">
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
                                                                <input type="text" data-kt-customer-table-filter_1="search" class="form-control form-control-solid ps-15" placeholder="Search Here" />
                                                            </div>
                                                            <!--end::Search-->
                                                            <!--begin::Table-->
                                                            <table id="kt_customers_table_1" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                                                <!--begin::Table head-->
                                                                <thead class="fs-7 text-gray-400 text-uppercase">
                                                                    <tr>
                                                                        <th class="min-w-150px">Title</th>
                                                                        <th class="min-w-50px">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6">
                                                                    <?php
                                                                    while ($row = mysqli_fetch_assoc($upcomming_result)) {
                                                                        $id = encrypt_decrypt('encrypt', $row['id']);
                                                                        $title = $row['title'];
                                                                        $announcement_no = $row['id'];
                                                                    ?>
                                                                        <!--begin::Table row-->
                                                                        <tr>
                                                                            <td class="fw-bolder">
                                                                                <a href="#" class="text-gray-900 text-hover-primary"><?php echo $title; ?></a>
                                                                            </td>
                                                                            <td class="text-end">
                                                                                <a href="<?php echo $announcement_no; ?>" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users<?php echo $announcement_no; ?>">View</a>
                                                                            </td>
                                                                        </tr>
                                                                        <!--end::Table row-->
                                                                    <?php
                                                                        include 'includes/php/announcement_view_modal.php';
                                                                    }
                                                                    ?>
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
                                                <div class="col-md-3 col-lg-12 col-xl-3">
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
                                                                        <th class="min-w-150px">Title</th>
                                                                        <th class="min-w-50px">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6">
                                                                    <?php
                                                                    while ($row = mysqli_fetch_assoc($inactive_result)) {
                                                                        $id = encrypt_decrypt('encrypt', $row['id']);
                                                                        $title = $row['title'];
                                                                        $announcement_no = $row['id'];
                                                                    ?>
                                                                        <!--begin::Table row-->
                                                                        <tr>
                                                                            <td class="fw-bolder">
                                                                                <a href="#" class="text-gray-900 text-hover-primary">Meeting with customer</a>
                                                                            </td>
                                                                            <td class="text-end">
                                                                                <a href="<?php echo $announcement_no; ?>" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users<?php echo $announcement_no; ?>">View</a>
                                                                            </td>
                                                                        </tr>
                                                                        <!--end::Table row-->
                                                                    <?php
                                                                        include 'includes/php/announcement_view_modal.php';
                                                                    }
                                                                    ?>
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
                                                <div class="col-md-3 col-lg-12 col-xl-3">
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
                                                                        <th class="min-w-150px">Title</th>
                                                                        <th class="min-w-50px">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Table head-->
                                                                <!--begin::Table body-->
                                                                <tbody class="fs-6">
                                                                    <?php
                                                                    while ($row = mysqli_fetch_assoc($inactive_result)) {
                                                                        $id = encrypt_decrypt('encrypt', $row['id']);
                                                                        $title = $row['title'];
                                                                        $announcement_no = $row['id'];
                                                                    ?>
                                                                        <!--begin::Table row-->
                                                                        <tr>
                                                                            <td class="fw-bolder">
                                                                                <a href="#" class="text-gray-900 text-hover-primary">Meeting with customer</a>
                                                                            </td>
                                                                            <td class="text-end">
                                                                                <a href="<?php echo $announcement_no; ?>" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users<?php echo $announcement_no; ?>">View</a>
                                                                            </td>
                                                                        </tr>
                                                                        <!--end::Table row-->
                                                                    <?php
                                                                        include 'includes/php/announcement_view_modal.php';
                                                                    }
                                                                    ?>
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

</body>
<script src="assets/plugins/custom/ckeditor/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
    function deletion(strr) {
        if (strr) {
            var r = confirm("Are You Sure Want To Delete ?");
            if (r == true) {
                window.location = "add_a_announcement.php?" + strr;
            }
        }
    }
</script>

</html>