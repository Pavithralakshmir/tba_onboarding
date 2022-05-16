<?php
include_once 'includes/php/common_php.php';
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>TBA - List TBA Services</title>
    <meta charset="utf-8" />
    <meta name="description" content="Infinity Hub is a Digital Marketing Agency in the Philippines that focuses on SEO, Social Media, Digital Advertising, Web and Mobile applications." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="TBA - Onboarding Tool" />
    <meta property="og:url" content="https://infinityhub.com" />
    <meta property="og:site_name" content="TBA | Onboarding Tool" />
    <?php
    include_once 'includes/common.php';
    ?>
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
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
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <!--begin::Container-->
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <!--begin::Title-->
                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Request Message List</h1>
                                <!--end::Title-->
                                <!--begin::Separator-->
                                <span class="h-20px border-gray-300 border-start mx-4"></span>
                                <!--end::Separator-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="index.php" class="text-muted text-hover-primary">Home</a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-dark">Request Message List</li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Top-->
                                <div class="text-center">
                                    <!--begin::Title-->
                                    <h3 class="fs-2hx text-dark mt-8">Send Replay to Request Message</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Top-->
                                <!--begin::Card body-->
                                <div class="card-body pt-8">
                                    <!--begin::Form-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="w-10px pe-2">
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                                        </div>
                                                    </th>
                                                    <th class="min-w-15px text-center">SlNo</th>
                                                    <th class="min-w-80px text-center">Actions</th>
                                                    <th class="min-w-125px">Client Name / Email</th>
                                                    <th class="min-w-125px">Message</th>
                                                    <th class="min-w-125px">Send Date</th>
                                                    <th class="text-cenetr min-w-70px">Status</th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600 ui-sortable">
                                                <?php
                                                $i = 1;
                                                $sql = "SELECT `id`, `sender_id`, `sender_msg`, `sent_at`, `replay_by`, `replay_msg`, `replay_at`,`is_viewed` FROM `chat_bot` WHERE `is_viewed` = '1' ORDER BY `id` ASC";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $id = encrypt_decrypt('encrypt', $row['id']);
                                                ?>
                                                    <tr id="<?php echo $row['id']; ?>">
                                                        <!--begin::Checkbox-->
                                                        <td>
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                        <td class="priority">
                                                            <?php echo $i; ?>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="add_tba_services.php?<?php echo $action_string . '=' . $edit_string . '&' . $id_string . '=' . $id; ?>" class="menu-link px-3">Edit</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer<?php echo $row['id']; ?>">View</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $users_name[$row['sender_id']] . " /<br>" . $loginmail[$row['sender_id']];
                                                            ?>
                                                        </td>
                                                        <td class="text_limit">
                                                            <?php echo $row['sender_msg']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo date("d/m/Y", strtotime($row['sent_at'])); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($row['is_viewed'] != '1') ? ('Not View') : ('Viewed'); ?>
                                                        </td>
                                                    </tr>
                                                    <!--begin::Modals-->
                                                    <!--begin::Modal - Customers - Add-->
                                                    <div class="modal fade" id="kt_modal_add_customer<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                                        <!--begin::Modal dialog-->
                                                        <div class="modal-dialog modal-dialog-centered mw-750px">
                                                            <!--begin::Modal content-->
                                                            <div class="modal-content">
                                                                <!--begin::Form-->
                                                                <form class="form" action="#" id="kt_modal_add_customer_form" data-kt-redirect="list.html">
                                                                    <!--begin::Modal header-->
                                                                    <div class="modal-header" id="kt_modal_add_customer_header">
                                                                        <!--begin::Modal title-->
                                                                        <h2 class="fw-bolder text-left text-dark">
                                                                            <?php
                                                                            echo $users_name[$row['sender_id']] . " / " . $loginmail[$row['sender_id']];
                                                                            ?>
                                                                        </h2>
                                                                        <p class="text-gray"> <?php echo date("d/m/Y", strtotime($row['sent_at'])); ?></p>
                                                                        <!--end::Modal title-->
                                                                    </div>
                                                                    <!--end::Modal header-->
                                                                    <!--begin::Modal body-->
                                                                    <div class="modal-body py-2 px-lg-8">
                                                                        <!--begin::Scroll-->
                                                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                                                                            <b>Request Message</b>
                                                                            <p class="text-gray text-justify"> <?php echo $row['sender_msg']; ?></p>
                                                                            <!--begin::Form-->
                                                                            <form class="form mb-15" role="form" method="POST" enctype="multipart/form-data" id="Send_replay">
                                                                                <input id="edit_id" type="hidden" value="<?php echo $idd ?>" />
                                                                                <!--begin::Input group-->
                                                                                <div class="row mb-5">
                                                                                    <!--begin::Col-->
                                                                                    <div class="col-md-6 fv-row">
                                                                                        <!--begin::Label-->
                                                                                        <label class="required fs-5 fw-bold mb-2">Replay Message</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <textarea class="form-control form-control-solid" rows="5" name="replay" id="replay" placeholder=""><?php echo $row['replay_msg']; ?></textarea>
                                                                                        <!--end::Input-->
                                                                                    </div>
                                                                                    <!--end::Col-->
                                                                                    <!--begin::Col-->
                                                                                    <div class="col-md-6 fv-row">
                                                                                        <div class="text-center pt-8">
                                                                                            <!--begin::Submit-->
                                                                                            <button type="reset" class="btn btn-warning">
                                                                                                <!--begin::Indicator-->
                                                                                                <span class="indicator-label">Cancle</span>
                                                                                                <!--end::Indicator-->
                                                                                            </button>
                                                                                            <button type="submit" class="btn btn-success" id="Send_replay_submit_button" name="Send_replay_submit">
                                                                                                <!--begin::Indicator-->
                                                                                                <span class="indicator-label">Send Now</span>
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
                                                                        <!--end::Scroll-->
                                                                    </div>
                                                                    <!--end::Modal body-->
                                                                </form>
                                                                <!--end::Form-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Modal - Customers - Add-->
                                                    <!--end::Modals-->
                                                <?php
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
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
</body>

</html>