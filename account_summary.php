<?php
include_once 'includes/php/common_php.php';
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

                            <!--begin::Row-->
                            <div class="row gy-5 g-xl-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <!--begin::List Widget 3-->
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body pt-5 m-auto text-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-100px symbol-circle mb-7">
                                                <img src="<?php echo ($user_details->inst) ? ($user_details->inst) : ('assets/media/avatars/avatar-1.png'); ?>" alt="image" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <div class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1 text-uppercase">
                                                <?php echo $user_details->name; ?>
                                                <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2"><?php echo $user_details->ecode; ?></span>
                                            </div>
                                            <!--end::Name-->
                                            <!--begin::Details item-->
                                            <div class="text-gray-600 fw-bolder mt-5 fst-italic">E-Mail ID</div>
                                            <a href="#" class="text-gray-600 text-hover-primary text-break text-center"><?php echo $user_details->pemail; ?></a>
                                            <!--begin::Details item-->
                                            <div class="text-gray-600 fw-bolder mt-5 fst-italic">Contact No</div>
                                            <div class="text-gray-600"><?php echo $user_details->mobile1; ?></div>
                                            <!--begin::Details item-->
                                            <div class="text-gray-600 fw-bolder mt-5 fst-italic">Alternative No</div>
                                            <div class="text-gray-600"><?php echo ($user_details->mobile2) ? ($user_details->mobile2) : ("-"); ?></div>
                                            <!--begin::Details item-->
                                            <div class="text-gray-600 fw-bolder mt-5 fst-italic"> Location</div>
                                            <div class="text-gray-600 text-break text-center">
                                                <?php echo $user_details->address1; ?>
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end:List Widget 3-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9">
                                    <!--begin::Tables Widget 9-->
                                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                                        <!--begin::Header-->
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder fs-3 mb-1">Members Statistics</span>
                                            </h3>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div class="card-body py-3">
                                            <!--begin::Form-->
                                            <form class="form mb-15" method="post" id="add_new_client">
                                                <!--begin::Input group-->
                                                <div class="row mb-5">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-5 fw-bold mb-2">Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="name" id="name" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-5 fw-bold mb-2">Gender</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Option-->
                                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-3" data-kt-button="true">
                                                                    <!--begin::Radio-->
                                                                    <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                        <input class="form-check-input" type="radio" name="gender" value="male">
                                                                    </span>
                                                                    <!--end::Radio-->
                                                                    <!--begin::Info-->
                                                                    <span class="ms-5">
                                                                        <span class="fs-4 fw-bolder text-gray-800 d-block">Male</span>
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
                                                                        <input class="form-check-input" type="radio" name="gender" value="female">
                                                                    </span>
                                                                    <!--end::Radio-->
                                                                    <!--begin::Info-->
                                                                    <span class="ms-5">
                                                                        <span class="fs-4 fw-bolder text-gray-800 d-block">Female</span>
                                                                    </span>
                                                                    <!--end::Info-->
                                                                </label>
                                                                <!--end::Option-->
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col">
                                                                <!--begin::Option-->
                                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-3 active" data-kt-button="true">
                                                                    <!--begin::Radio-->
                                                                    <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                        <input class="form-check-input" type="radio" name="gender" value="others">
                                                                    </span>
                                                                    <!--end::Radio-->
                                                                    <!--begin::Info-->
                                                                    <span class="ms-5">
                                                                        <span class="fs-4 fw-bolder text-gray-800 d-block">Others</span>
                                                                    </span>
                                                                    <!--end::Info-->
                                                                </label>
                                                                <!--end::Option-->
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="row mb-5">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--end::Label-->
                                                        <label class="required fs-5 fw-bold mb-2">DOB</label>
                                                        <!--end::Label-->
                                                        <!--end::Input-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="dob" id="dob" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--end::Label-->
                                                        <label class="required fs-5 fw-bold mb-2">Personal Email</label>
                                                        <!--end::Label-->
                                                        <!--end::Input-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="pemail" id="pemail" type="email" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->
                                                <div class="row mb-5">
                                                    <!--begin::Input group-->
                                                    <div class="col-md-6 fv-row">
                                                        <label class="required fs-5 fw-bold mb-2">Address</label>
                                                        <textarea class="form-control form-control-solid" rows="2" name="address1" id="address1" placeholder=""></textarea>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="col-md-6 fv-row">
                                                        <label class="required fs-5 fw-bold mb-2">Permanent Address</label>
                                                        <textarea class="form-control form-control-solid" rows="2" name="address2" id="address2" placeholder=""></textarea>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--begin::Input group-->
                                                <div class="row mb-5">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-5 fw-bold mb-2">User Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="uname" id="uname" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--end::Label-->
                                                        <label class="required fs-5 fw-bold mb-2">Password</label>
                                                        <!--end::Label-->
                                                        <!--end::Input-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="pwd" id="pwd" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Separator-->
                                                <div class="separator mb-8"></div>
                                                <!--end::Separator-->
                                                <div class="text-center">
                                                    <!--begin::Submit-->
                                                    <button type="submit" class="btn btn-primary " id="add_new_client_submit_button" name="add_new_client_submit">
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
                                        <!--begin::Body-->
                                    </div>
                                    <!--end::Tables Widget 9-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Calendar Widget 1-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Subscriber On Boarding</span>
                                    </h3>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Calendar-->
                                    <h1>Digital Sign Form</h1>
                                    <!--end::Calendar-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Calendar Widget 1-->
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

</html>