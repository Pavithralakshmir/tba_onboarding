<?php
include_once 'includes/php/common_php.php';

$sql = "SELECT * FROM `users` ORDER BY `id` DESC limit 1";
$result = mysqli_query($conn, $sql);
$singleRow = mysqli_fetch_row($result);
$nxt_ecode = $singleRow['1'] + 1;

if (isset($_POST['name'])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $designation = mysqli_real_escape_string($conn, $_POST["designation"]);
    $cemail = mysqli_real_escape_string($conn, $_POST["cemail"]);
    $pemail = mysqli_real_escape_string($conn, $_POST["pemail"]);
    $address1 = mysqli_real_escape_string($conn, $_POST["address1"]);
    $address2 = mysqli_real_escape_string($conn, $_POST["address2"]);
    $fhname = mysqli_real_escape_string($conn, $_POST["fhname"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $uname = mysqli_real_escape_string($conn, $_POST["uname"]);
    $inst = $_POST['inst'];
    $pwd = $_POST['pwd'];
    $team = $_POST['team'];
    $bg = $_POST['bg'];
    $mobile1 = $_POST['mobile1'];
    $mobile2 = $_POST['mobile2'];
    $dob = $_POST['dob'];
    $cdate = date('Y-m-d H:i:s');

    $sql = "INSERT INTO `users`(`ecode`, `fid`, `name`, `designation`, `dob`, `gender`, `bg`, `fhname`, `cemail`, `pemail`, `mobile1`, `mobile2`,`person1`, `person2`, `address1`, `address2`, `qual`, `inst`, `cert`, `aadhar`, `att1`, `pan`, `att2`, `vid`, `att3`, `foldername`, `accnumber`, `bname`, `branch`, `ifsc`, `passbook`, `gs`, `pf`, `esi`, `netsal`, `cdate`, `team`, `role`, `ugroup`, `cip`, `mdate`, `mip`, `username`, `password`, `old_password`, `cby`, `mby`, `doj`, `dor`, `ms`, `uan`, `pfn`, `esin`, `exp`, `fcm_id`)
     VALUES('$nxt_ecode','','$name','$designation','$dob','$gender','$bg','$fhname','$cemail','$pemail','$mobile1','$mobile2','','','$address1','$address2','','$inst','','','','','','','','assets/profiles','','','','','','','','','','$cdate','$team','$role','','$_SERVER[REMOTE_ADDR]','','','$uname','$pwd','','','','','','','','','','','')";
    $res1 = mysqli_query($conn, $sql);

    $sql = "SELECT LAST_INSERT_ID() as `last_insert_id`";
    $res1 = mysqli_query($conn, $sql);
    $last_insert_id = mysqli_fetch_row($result);
    $last_insert_id = $singleRow['0'] + 1;

    $sql2 = "INSERT INTO `tba_users`(`user_name`, `mobile_number`, `personal_mobile`, `old_password`, `password`, `role`, `user_id`, `user_role`, `user_team`, `ugroup`, `otp`, `otp_date`) VALUES ('$uname','$mobile1','$mobile2','','$pwd','$role','$last_insert_id','$role','$team','','','')";
    $res2 = mysqli_query($mysqli_conn, $sql2);
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
      <!--begin::Toolbar-->
      <div class="toolbar" id="kt_toolbar">
                        <!--begin::Container-->
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <!--begin::Title-->
                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add User</h1>
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
                                    <li class="breadcrumb-item text-dark">Add User</li>
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
                                    <h3 class="fs-2hx text-dark mt-8">New User Form</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Top-->
                                <!--begin::Card body-->
                                <div class="card-body pt-8">
                                    <!--begin::Form-->
                                    <form class="form mb-15" method="post" id="add_new_emp">
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
                                                <!--end::Label-->
                                                <label class="required fs-5 fw-bold mb-2">Designation</label>
                                                <!--end::Label-->
                                                <!--end::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="" name="designation" id="designation" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
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
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold mb-2">Company Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="" name="cemail" id="cmail" type="email" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--end::Label-->
                                                <label class="fs-5 fw-bold mb-2">Personal Email</label>
                                                <!--end::Label-->
                                                <!--end::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="" name="pemail" id="pemail" type="email" />
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
                                                <label class="required fs-5 fw-bold mb-2">Mobile No - 1</label>
                                                <!--end::Label-->
                                                <!--end::Input-->
                                                <input type="tel" class="form-control form-control-solid" placeholder="" name="mobile1" id="mobile1" pattern="[6789][0-9]{9}" inputmode="numeric" type="tel" oninput="this.value=this.value.replace(/[^0-9]/g,'');javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" autocomplete="off" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold mb-2">Mobile No - 2</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="" name="mobile2" id="mobile2" pattern="[6789][0-9]{9}" inputmode="numeric" type="tel" oninput="this.value=this.value.replace(/[^0-9]/g,'');javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" autocomplete="off" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-bold mb-2">Blood Group</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="bg" id="bg" data-control="select2" data-placeholder="Select a Bloodgroup..." class="form-select form-select-solid">
                                                    <option value=""></option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--end::Label-->
                                                <label class="fs-5 fw-bold mb-2">Father Name</label>
                                                <!--end::Label-->
                                                <!--end::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="" name="fhname" id="fhname" />
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
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">Team</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="team" id="team" data-control="select2" data-placeholder="Select a Team..." class="form-select form-select-solid">
                                                    <option value=""></option>
                                                    <option value="web developer">Web Developer</option>
                                                    <option value="content developer">Content Developer</option>
                                                    <option value="web designing">Web Designing</option>
                                                    <option value="app developer">App Developer</option>
                                                    <option value="campaign">Campaign</option>
                                                    <option value="SEO">SEO</option>
                                                    <option value="medical billing">Medical Billing</option>
                                                    <option value="HR">HR</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Role</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8 fv-row">
                                                    <!--begin::Options-->
                                                    <div class="d-flex align-items-center mt-3">
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-inline form-check-solid me-5">
                                                            <input class="form-check-input" name="role[]" type="checkbox" value="tl" />
                                                            <span class="fw-bold ps-2 fs-6">TL</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-inline form-check-solid">
                                                            <input class="form-check-input" name="role[]" type="checkbox" value="member" />
                                                            <span class="fw-bold ps-2 fs-6">Member</span>
                                                        </label>
                                                        <!--end::Option-->
                                                        <!--begin::Option-->
                                                        <label class="form-check form-check-inline form-check-solid">
                                                            <input class="form-check-input" name="role[]" type="checkbox" value="supporter" />
                                                            <span class="fw-bold ps-2 fs-6">Supporter</span>
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-3">
                                                    <span>Update Profile</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <!--begin::Image input wrapper-->
                                                <div class="mt-1">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-100px h-100px" style="background-image: url('assets/media/svg/avatars/blank.svg')"></div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Edit-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="inst" accept=".png, .jpg, .jpeg" id="inst" />
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
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!-- end::Label -->
                                                <!-- <label class="required fs-5 fw-bold mb-2">Password</label> -->
                                                <!--end::Label-->
                                                <!--end::Input-->
                                                <!-- <input type="text" class="form-control form-control-solid" placeholder="" name="pwd" id="pwd" /> -->
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
                                            <button type="submit" class="btn btn-primary " id="add_new_emp_submit_button" name="add_new_emp_submit">
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
        var t, e, i;
        i = document.querySelector("#add_new_emp");
        t = document.getElementById("add_new_emp_submit_button")
        $(i.querySelector('[name="position"]')).on("change", function() {
                e.revalidateField("team");
            }),
            $(i.querySelector('[name="dob"]')).flatpickr({
                enableTime: !1,
                dateFormat: "d, M Y"
            });
        (e = FormValidation.formValidation(i, {
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: "Name is required"
                        }
                    }
                },
                designation: {
                    validators: {
                        notEmpty: {
                            message: "Designation is required"
                        }
                    }
                },
                gender: {
                    validators: {
                        notEmpty: {
                            message: "Gender is required"
                        }
                    }
                },
                mobile1: {
                    validators: {
                        notEmpty: {
                            message: "Mobile No is required"
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: "Email address is required"
                        },
                        emailAddress: {
                            message: "The value is not a valid email address"
                        }
                    }
                },
                address1: {
                    validators: {
                        notEmpty: {
                            message: "Address is required"
                        }
                    }
                },
                address2: {
                    validators: {
                        notEmpty: {
                            message: "Permanent  Address is required"
                        }
                    }
                },
                team: {
                    validators: {
                        notEmpty: {
                            message: "Team is required"
                        }
                    }
                },
                inst: {
                    validators: {
                        notEmpty: {
                            message: "Profile required"
                        }
                    }
                },
                "role[]": {
                    validators: {
                        notEmpty: {
                            message: "Role required"
                        }
                    }
                },
                uname: {
                    validators: {
                        notEmpty: {
                            message: "User name required"
                        }
                    }
                },
                pwd: {
                    validators: {
                        notEmpty: {
                            message: "Password required"
                        }
                    }
                },
                dob: {
                    validators: {
                        notEmpty: {
                            message: "DOB is required"
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
    });

    function myFunction() {
        var name = $("#name").val();
        var designation = $("#designation").val();
        var gender = $('input[name=gender]:checked').val();
        var val = [];
        $("input[name='role[]']:checked").each(function() {
            val.push($(this).val());
        });
        var role = val.join(",");
        var dob = $("#dob").val();
        var mobile1 = $("#mobile1").val();
        var mobile2 = $("#mobile2").val();
        var cmail = $("#cmail").val();
        var pemail = $("#pemail").val();
        var address1 = $("#address1").val();
        var address2 = $("#address2").val();
        var bg = $("#bg").val();
        var fhname = $("#fhname").val();
        var uname = $("#uname").val();
        var pwd = $("#pwd").val();
        var team = $("#team").val();
        var inst = $("#inst").val();
        $.ajax({
            type: "post",
            url: "users.php",
            data: {
                inst: inst,
                name: name,
                designation: designation,
                gender: gender,
                dob: dob,
                mobile1: mobile1,
                mobile2: mobile2,
                cemail: cmail,
                pemail: pemail,
                address1: address1,
                address2: address2,
                bg: bg,
                fhname: fhname,
                uname: uname,
                pwd: pwd,
                team: team,
                role: role
            },
            success: function(response) {
                window.location = 'user_group.php';
            },
            error: function() {
                alert('Error occurs!');
            }
        });
    }
</script>

</html>