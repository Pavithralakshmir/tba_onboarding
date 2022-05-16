<?php
session_start();
include_once 'includes/db.php';

$sql = "SELECT * FROM `users` ORDER BY `id` DESC limit 1";
$result = mysqli_query($conn, $sql);
$singleRow = mysqli_fetch_row($result);
$nxt_ecode = $singleRow['1'] + 1;

if (isset($_POST['name'])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $pemail = mysqli_real_escape_string($conn, $_POST["pemail"]);
    $address1 = mysqli_real_escape_string($conn, $_POST["address1"]);
    $address2 = mysqli_real_escape_string($conn, $_POST["address2"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $uname = mysqli_real_escape_string($conn, $_POST["uname"]);
    $pwd = $_POST['pwd'];
    $mobile1 = $_POST['mobile1'];
    $mobile2 = $_POST['mobile2'];
    $dob = $_POST['dob'];
    $cdate = date('Y-m-d H:i:s');
    $img = $_FILES["file"]["name"];
    $tmp = $_FILES["file"]["tmp_name"];
    $errorimg = $_FILES["file"]["error"];

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
    $path = 'gallery/client_profile/'; // upload directory
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    $inst = $img;
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($inst);
        if (move_uploaded_file($tmp, $path)) {
            $sql = "INSERT INTO `users`(`ecode`, `fid`, `name`, `designation`, `dob`, `gender`, `bg`, `fhname`, `cemail`, `pemail`, `mobile1`, `mobile2`,`person1`, `person2`, `address1`, `address2`, `qual`, `inst`, `cert`, `aadhar`, `att1`, `pan`, `att2`, `vid`, `att3`, `foldername`, `accnumber`, `bname`, `branch`, `ifsc`, `passbook`, `gs`, `pf`, `esi`, `netsal`, `cdate`, `team`, `role`, `ugroup`, `cip`, `mdate`, `mip`, `username`, `password`, `old_password`, `cby`, `mby`, `doj`, `dor`, `ms`, `uan`, `pfn`, `esin`, `exp`, `fcm_id`)
            VALUES('$nxt_ecode','','$name','','$dob','$gender','','','','$pemail','$mobile1','$mobile2','','','$address1','$address2','','$path','','','','','','','','assets/profiles','','','','','','','','','','$cdate','','client','5','$_SERVER[REMOTE_ADDR]','','','$uname','$pwd','','','','','','','','','','','')";
            $res1 = mysqli_query($conn, $sql);

            $sql = "SELECT LAST_INSERT_ID() as `last_insert_id`";
            $res1 = mysqli_query($conn, $sql);
            $last_insert_id = mysqli_fetch_row($result);
            $last_insert_id = $singleRow['0'] + 1;
        }
    } else {
        echo 'invalid';
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>TBA - Users</title>
    <meta charset="utf-8" />
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
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div class="flex-column-fluid container-xxl mt-20">
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
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>

</body>
<?php include_once('includes/js/commonjs.php') ?>

</html>