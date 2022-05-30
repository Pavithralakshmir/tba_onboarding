<?php
include_once 'includes/php/common_php.php';
$id = '';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $user_session_id = $session_id;
    $mdate = date('Y-m-d H:i:s');
    $mby = $user_details->name;
    if ($action == 'acckyc') {
        $doc_1 = $_POST['doc_1'];
        if (!empty($_FILES['doc_1']['name'])) {
            $file1 = "userid_" . $user_session_id . "_doc1_" . rand(1000, 100000) . "-" . $_FILES['doc_1']['name'];
            $file_loc1 = $_FILES['doc_1']['tmp_name'];
            $folder1 = "gallery/client_kyc_files/doc_1/document_1/";
            $filename1 = strtolower($file1);
            $finalfile1 = str_replace(' ', '-', $filename1);
            move_uploaded_file($file_loc1, $folder1 . $finalfile1);
            $finalfile1 =  $folder1 . $finalfile1;
        }
        $sql = "UPDATE `users` SET  `kyc_doc_1`='$finalfile1',`mdate`='$mdate',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$mby' WHERE `id`=$user_session_id";
        $result = mysqli_query($conn, $sql);
        header("Location: account_summary.php");
    } else if ($action == 'remove_doc_1') {
        $doc_1 = $_POST['exsiting_doc_1_file'];
        unlink($doc_1);
        $sql = "UPDATE `users` SET  `kyc_doc_1`='',`mdate`='$mdate',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$mby' WHERE `id`=$user_session_id";
        $result = mysqli_query($conn, $sql);
        header("Location: account_summary.php");
    }
    exit;
}

if (isset($_POST['fname'])) {
    $name = mysqli_real_escape_string($conn, $_POST["fname"]);
    $fhame = mysqli_real_escape_string($conn, $_POST["lname"]);
    $pemail = mysqli_real_escape_string($conn, $_POST["email"]);
    $address1 = mysqli_real_escape_string($conn, $_POST["address1"]);
    $address2 = mysqli_real_escape_string($conn, $_POST["address2"]);
    $uname = mysqli_real_escape_string($conn, $_POST["uname"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $pincode = $_POST['pincode'];
    $mobile1 = $_POST['mobile1'];
    $mobile2 = $_POST['mobile2'];
    $id = $_POST['id'];
    $mdate = date('Y-m-d H:i:s');
    $mby = $user_details->name;
    $img = $_FILES["file"]["name"];
    $tmp = $_FILES["file"]["tmp_name"];
    $errorimg = $_FILES["file"]["error"];

    $valid_extensions = array('jpeg', 'jpg', 'png', 'bmp'); // valid extensions
    $path = 'gallery/client_profile/'; // upload directory
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    $inst = $img;
    if (isset($inst)) {
        if (in_array($ext, $valid_extensions)) {
            $path = $path . strtolower($inst);
            if (move_uploaded_file($tmp, $path)) {
                $sql6 = "UPDATE `users` SET `name`= '$name',`fhname`= '$fhame',`pemail`= '$pemail',`address1`= '$address1',`address2`= '$address2',`mobile1`= '$mobile1',`mobile2`= '$mobile2',`city`= '$city',`pincode`= '$pincode',`inst`= '$path',`username`= '$uname',`mdate`='$mdate',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$mby' WHERE id='$id'";
                echo $sql6;
                $res6 = mysqli_query($conn, $sql6);
            }
        } else {
            echo 'invalid';
        }
    } else {
        $sql6 = "UPDATE `users` SET `name`= '$name',`fhname`= '$fhame',`pemail`= '$pemail',`address1`= '$address1',`address2`= '$address2',`mobile1`= '$mobile1',`mobile2`= '$mobile2',`city`= '$city',`pincode`= '$pincode',`username`= '$uname',`mdate`='$mdate',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$mby' WHERE id='$id'";
        $res6 = mysqli_query($conn, $sql6);
    }
    exit;
}

if (isset($_POST['sign1'])) {
    $user_session_id = $session_id;
    $ImgPreview = $_POST['ImgPreview'];
    $exsiting_sign1 = $_POST['exsiting_sign1'];
    $sign1 = $_POST['sign1'];
    $signimage1 = $_POST['signimage1'];
    $mdate = date('Y-m-d H:i:s');
    $mby = $user_details->name;
    if (!empty($_FILES['imag']['name']) && empty($ImgPreview)) {
        $file1 = "userid_" . $user_session_id . "_sign1-" . rand(1000, 100000) . "-" . $_FILES['imag']['name'];
        $file_loc1 = $_FILES['imag']['tmp_name'];
        $folder1 = "gallery/client_kyc_files/doc_1/signature_1/";
        $filename1 = strtolower($file1);
        $finalfile1 = str_replace(' ', '-', $filename1);
        move_uploaded_file($file_loc1, $folder1 . $finalfile1);
        $finalfile1 =  $folder1 . $finalfile1;
    } else {
        if (!empty($ImgPreview)) {
            $finalfile1 = $ImgPreview;
        } else {
            echo "file not selected";
        }
    }
    if (!empty($_POST['sign1']) && empty($exsiting_sign1)) {
        $signatureFileName1 = "userid_" . $user_session_id . '_dg_sign_1-' . uniqid() . '.png';
        $sign1 = str_replace('data:image/png;base64,', '', $sign1);
        $sign1 = str_replace(' ', '+', $sign1);
        $data1 = base64_decode($sign1);
        $file1 = 'gallery/client_kyc_files/doc_1/signature_1/' . $signatureFileName1;
        file_put_contents($file1, $data1);
        // unlink($signatureFileName1);
    } else {
        if (!empty($exsiting_sign1)) {
            $file1 = $exsiting_sign1;
        }
    }
    // UPDATE `users` SET `kyc_doc_1`='[value-20]',`kyc_doc_2`='[value-21]',`kyc_doc_3`='[value-22]',`kyc_doc_4`='[value-23]',`dg_sign_1`='[value-25]',`dg_sign_2`='[value-26]',`dg_sign_3`='[value-27]',`dg_sign_4`='[value-28]',`up_img_sign_1`='[value-29]',`up_img_sign_2`='[value-30]',`up_img_sign_3`='[value-31]',`up_img_sign_4`='[value-32]',`mdate`='[value-38]',`mip`='[value-39]',`mby`='[value-45]' WHERE 
    $sql = "UPDATE `users` SET  `dg_sign_1`='$file1',`up_img_sign_1`='$finalfile1',`mdate`='$mdate',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$mby' WHERE `id`=$user_session_id";
    $result = mysqli_query($conn, $sql);
    header("Location: account_summary.php");
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
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
                                    <div class="card card-xl-stretch min-h-100 mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body pt-5 m-auto text-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-100px symbol-circle mt-12 mb-7">
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
                                    <!--begin::Card-->
                                    <div class="card">
                                        <!--begin::Form-->
                                        <form class="form mb-1" role="form" method="POST" enctype="multipart/form-data" id="acc_profile_update">
                                            <input id="edit_id" type="hidden" value="<?php echo $session_id ?>" />
                                            <!--begin::Card body-->
                                            <div class="card-body p-4">
                                                <!--begin::Row-->
                                                <div class="row mb-4">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-5 m-auto">
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline d-inline p-4" data-kt-image-input="true" style="background-image: url('../../assets/media/svg/avatars/blank.svg')">
                                                            <div class="d-inline">
                                                                <!--begin::Preview existing avatar-->
                                                                <div class="image-input-wrapper symbol symbol-100px symbol-circle w-125px h-125px bgi-position-center" style="background-size: 100%; background-image: url('<?php echo ($user_details->inst) ? ($user_details->inst) : ('assets/media/avatars/avatar-1.png'); ?>')"></div>
                                                                <!--end::Preview existing avatar-->
                                                                <!--begin::Label-->
                                                                <div class="d-inline" style="top: auto;">
                                                                    <label class="btn btn-primary me-2 w-150px p-2" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Profile">
                                                                        Upload Photo
                                                                        <!--begin::Inputs-->
                                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" id="inst" />
                                                                        <input type="hidden" name="avatar_remove" />
                                                                        <!--end::Inputs-->
                                                                    </label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Cancel-->
                                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                                        <i class="bi bi-x fs-2"></i>
                                                                    </span>
                                                                    <!--end::Cancel-->
                                                                    <!--begin::Remove-->
                                                                    <span class="btn btn-light btn-active-light-primary me-2 w-150px" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Profile">
                                                                        Delete <img src="assets/media/icons/delete_icon_1.png">
                                                                    </span>
                                                                </div>
                                                                <!--end::Remove-->
                                                            </div>
                                                        </div>
                                                        <!--end::Image input-->
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-7 fv-row">
                                                        <img src="assets/media/icons/bg_img/acc_bg_img_1.png" width="100%">
                                                        <div class="centered_text">
                                                            W3Schools is optimized for learning and training. Examples might be simplified to improve reading and learning. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content.
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <div class="row mb-4">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-4">
                                                                <div class="required  fs-6 fw-bold mt-2 mb-3">First Name</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-8 fv-row">
                                                                <input type="text" class="profile_form_control" name="fname" id="fname" value="<?php echo $user_details->name; ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-4">
                                                                <div class="fs-6 fw-bold mt-2 mb-3">Last Name</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-8 fv-row">
                                                                <input type="text" class="profile_form_control" name="lname" id="lname" value="<?php echo $user_details->fhname; ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <div class="row mb-4">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-4">
                                                                <div class="required  fs-6 fw-bold mt-2 mb-3">User Name</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-8 fv-row">
                                                                <input type="text" class="profile_form_control" name="uname" id="uname" value="<?php echo $user_details->username; ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-4">
                                                                <div class="required  fs-7 fw-bold mt-2 mb-3">Addressline-1</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-8 fv-row">
                                                                <input type="text" class="profile_form_control" name="address1" id="address1" value="<?php echo ($user_details->address1) ? ($user_details->address1) : ("-"); ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <div class="row mb-4">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-4">
                                                                <div class="required fs-7 fw-bold mt-2 mb-3">Addressline - 2</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-8 fv-row">
                                                                <input type="text" class="profile_form_control" name="address2" id="address2" value="<?php echo ($user_details->address2) ? ($user_details->address2) : ("-"); ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-4">
                                                                <div class="fs-6 fw-bold mt-2 mb-3">City</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-8 fv-row">
                                                                <input type="text" class="profile_form_control" name="city" id="city" value="<?php echo ($user_details->city) ? ($user_details->city) : ("-"); ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <div class="row mb-4">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-4">
                                                                <div class="fs-6 fw-bold mt-2 mb-3">Pincode</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-8 fv-row">
                                                                <input type="text" class="profile_form_control" name="pincode" id="pincode" value="<?php echo ($user_details->pincode) ? ($user_details->pincode) : ("-"); ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-4">
                                                                <div class="required fs-6 fw-bold mt-2 mb-3">Email id</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-8 fv-row">
                                                                <input type="email" class="profile_form_control" name="email" id="email" value="<?php echo ($user_details->pemail) ? ($user_details->pemail) : ("-"); ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <div class="row mb-4">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-4">
                                                                <div class="required fs-6 fw-bold mt-2 mb-3">Phone No</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-8 fv-row">
                                                                <input type="text" class="profile_form_control" name="mobile1" id="mobile1" pattern="[6789][0-9]{9}" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'');javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" autocomplete="off" value="<?php echo ($user_details->mobile1) ? ($user_details->mobile1) : ("-"); ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-xl-4">
                                                                <div class="required fs-7 fw-bold mt-2 mb-3">Alternative No</div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="col-xl-8 fv-row">
                                                                <input type="text" class="profile_form_control" name="mobile2" id="mobile2" pattern="[6789][0-9]{9}" inputmode="numeric" oninput="this.value=this.value.replace(/[^0-9]/g,'');javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" autocomplete="off" value="<?php echo ($user_details->mobile2) ? ($user_details->mobile2) : ("-"); ?>" />
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <div class="d-flex justify-content-end py-0 px-0">
                                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2 rounded-pill">Cancle</button>
                                                    <button type="submit" class="btn btn-primary rounded-pill" id="acc_profile_update_submit_button" name="acc_profile_update_submit">Publish</button>
                                                </div>
                                            </div>
                                            <!--end::Card body-->
                                        </form>
                                        <!--end:Form-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Calendar Widget 1-->
                            <div class="card mt-5">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <h1 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Subscriber On Boarding</span>
                                    </h1>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Content-->
                                    <form class="form mb-1" role="form" method="POST" enctype="multipart/form-data" id="acc_kyc">
                                        <!--begin::Row-->
                                        <div class="row mb-4">
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-4">
                                                        <div class="fs-6 fw-bold mt-2 mb-3">Document-1</div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-8 fv-row">
                                                        <div class="image-input image-input-outline d-inline ">
                                                            <label class="btn btn-primary rounded-pill p-2 w-150px" data-kt-image-input-action="change">
                                                                Choose File
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="doc_1" accept=".pdf, .doc, .docx" id="doc_1" />
                                                                <input type="hidden" name="doc_1_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <!--begin::Col-->
                                                <div class="d-flex align-items-center selectfile_div">
                                                    <!--begin::file input-->
                                                    <?php if (($user_details->kyc_doc_1 != '') || ($user_details->kyc_doc_1 != '')) {
                                                        $file_name = explode('/', $user_details->kyc_doc_1) ?>
                                                        <div class="selectfile_text" style="width: auto;" id="exsiting_doc_1_file_div">
                                                            <input type="hidden" id="exsiting_doc_1_file_db" value="<?php echo $user_details->kyc_doc_1; ?>">
                                                            <p id="exsiting_doc_1_file" style="font-size:initial"><a href="<?php echo ($user_details->kyc_doc_1); ?>" target="_blank"><?php echo ($user_details->kyc_doc_1) ? $file_name[4] : ""; ?></a>
                                                                <button type="button" class="btn btn-sm btn-icon btn-active-color-danger m-auto btn-rmv1" id="delete_doc1" style="<?php echo ($user_details->kyc_doc_1) ? "display:inline" : "display:none"; ?>;">
                                                                    <img src="assets/media/icons/delete_icon_1.png" class="btn-rmv1" style="<?php echo ($user_details->kyc_doc_1) ? "display:inline" : ""; ?>;">
                                                                </button>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="selectfile_text" id="files-names"></div>
                                                    <?php } ?>
                                                    <!--begin::file input-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-4">
                                                        <div class="fs-6 fw-bold mt-2 mb-3">Sign</div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-8 fv-row">
                                                        <?php
                                                        if (($user_details->dg_sign_1 != '') || ($user_details->up_img_sign_1 != '')) { ?>
                                                            <!--begin::Image input-->
                                                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true">
                                                                <!--begin::Preview existing avatar-->
                                                                <div class="image-input-wrapper w-150px h-50px" style="background-image: url(<?php echo ($user_details->up_img_sign_1) ? $user_details->up_img_sign_1 : $user_details->dg_sign_1; ?>)"></div>
                                                                <!--end::Preview existing avatar-->
                                                                <!--begin::Digital signature model-->
                                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="modal" data-bs-target="#kt_modal_upload">
                                                                    <img src="assets/media/icons/edit_icon_1.png">
                                                                </label>
                                                                <!--end::Digital signature model-->
                                                            </div>
                                                            <!--end::Image input-->
                                                        <?php } else { ?>
                                                            <!--begin::Button-->
                                                            <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_upload">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->Digital signature
                                                            </button>
                                                            <!--end::Button-->
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-4">
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-4">
                                                        <div class="fs-6 fw-bold mt-2 mb-3">Document-2</div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-8 fv-row">
                                                        <div class="image-input image-input-outline d-inline ">
                                                            <label class="btn btn-primary rounded-pill p-2 w-150px" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Upload Document - 1">
                                                                Choose File
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="avatar" accept=".pdf, .doc, .docx" id="doc_2" />
                                                                <input type="hidden" name="Doc1_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <!--begin::Col-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                                    <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="black" />
                                                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <a href="#" class="text-gray-800 text-hover-primary">api-keys.html</a>
                                                    <button type="button" class="btn btn-sm btn-icon btn-active-color-danger m-auto" data-kt-element="remove-item">
                                                        <img src="assets/media/icons/delete_icon_1.png">
                                                    </button>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-4">
                                                        <div class="fs-6 fw-bold mt-2 mb-3">Sign</div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-8 fv-row">
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="">
                                                            <!--begin::Preview existing avatar-->
                                                            <div class="image-input-wrapper w-150px h-50px" style="background-image: url(assets/media/icons/bg_img/acc_bg_img_1.png)"></div>
                                                            <!--end::Preview existing avatar-->
                                                            <!--begin::Label-->
                                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                                <img src="assets/media/icons/edit_icon_1.png">
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="avatar_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Cancel-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Cancel-->
                                                            <!--begin::Remove-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Remove-->
                                                        </div>
                                                        <!--end::Image input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-4">
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-4">
                                                        <div class="fs-6 fw-bold mt-2 mb-3">Document-3</div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-8 fv-row">
                                                        <div class="image-input image-input-outline d-inline ">
                                                            <label class="btn btn-primary rounded-pill p-2 w-150px" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Upload Document - 1">
                                                                Choose File
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="avatar" accept=".pdf, .doc, .docx" id="doc_3" />
                                                                <input type="hidden" name="Doc1_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <!--begin::Col-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                                    <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="black" />
                                                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <a href="#" class="text-gray-800 text-hover-primary">api-keys.html</a>
                                                    <button type="button" class="btn btn-sm btn-icon btn-active-color-danger m-auto" data-kt-element="remove-item">
                                                        <img src="assets/media/icons/delete_icon_1.png">
                                                    </button>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-4">
                                                        <div class="fs-6 fw-bold mt-2 mb-3">Sign</div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-8 fv-row">
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="">
                                                            <!--begin::Preview existing avatar-->
                                                            <div class="image-input-wrapper w-150px h-50px" style="background-image: url(assets/media/icons/bg_img/acc_bg_img_1.png)"></div>
                                                            <!--end::Preview existing avatar-->
                                                            <!--begin::Label-->
                                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Edit Sign">
                                                                <img src="assets/media/icons/edit_icon_1.png">
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="avatar_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Cancel-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Sign">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Cancel-->
                                                            <!--begin::Remove-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Sign">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>
                                                            <!--end::Remove-->
                                                        </div>
                                                        <!--end::Image input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-4">
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-4">
                                                        <div class="fs-6 fw-bold mt-2 mb-3">Document-4</div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-8 fv-row">
                                                        <div class="image-input image-input-outline d-inline ">
                                                            <label class="btn btn-primary rounded-pill p-2 w-150px" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Upload Document - 1">
                                                                Choose File
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="avatar" accept=".pdf, .doc, .docx" id="doc_4" />
                                                                <input type="hidden" name="Doc1_remove" />
                                                                <!--end::Inputs-->
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <!--begin::Col-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                                                    <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="black" />
                                                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <a href="#" class="text-gray-800 text-hover-primary">api-keys-1.html</a>
                                                    <button type="button" class="btn btn-sm btn-icon btn-active-color-danger m-auto" data-kt-element="remove-item">
                                                        <img src="assets/media/icons/delete_icon_1.png">
                                                    </button>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-4">
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-xl-4">
                                                        <div class="fs-6 fw-bold mt-2 mb-3">Sign</div>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-xl-8 fv-row">
                                                        <!--begin::Button-->
                                                        <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->Digital signature
                                                        </button>
                                                        <!--end::Button-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <div class="d-flex justify-content-center py-2 px-0">
                                            <button type="submit" class="btn btn-primary rounded-pill" id="acc_kyc_submit_button" name="acc_kyc_submit">Submit</button>
                                        </div>
                                        <!--end::Content-->
                                    </form>
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
    <?php include 'includes/php/accountsummary_digitalsign_modal.php' ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        var t, e, i;
        i = document.querySelector("#acc_profile_update");
        t = document.getElementById("acc_profile_update_submit_button");
        (e = FormValidation.formValidation(i, {
            fields: {
                fname: {
                    validators: {
                        notEmpty: {
                            message: "First Name is required"
                        }
                    }
                },
                lname: {
                    validators: {
                        notEmpty: {
                            message: "Last Name is required"
                        }
                    }
                },
                uname: {
                    validators: {
                        notEmpty: {
                            message: "username is required"
                        }
                    }
                },
                mobile1: {
                    validators: {
                        notEmpty: {
                            message: "Phoneno is required"
                        }
                    }
                },
                mobile2: {
                    validators: {
                        notEmpty: {
                            message: "Alternative no is required"
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: "Emailid is required"
                        }
                    }
                },
                address1: {
                    validators: {
                        notEmpty: {
                            message: "Address1 is required"
                        }
                    }
                },
                address2: {
                    validators: {
                        notEmpty: {
                            message: "Address2 is required"
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


        var q, u, v;
        v = document.querySelector("#acc_kyc");
        q = document.getElementById("acc_kyc_submit_button");
        (u = FormValidation.formValidation(i, {
            fields: {
                doc_1: {
                    validators: {
                        notEmpty: {
                            message: "First Name is required"
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
        q.addEventListener("click", function(v) {
            v.preventDefault(),
                u &&
                u.validate().then(function(u) {
                    "Valid" == u
                        ?
                        (
                            acckyc()
                        ) :
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        }).then(function(q) {
                            KTUtil.scrollTop();
                        });
                })
        });
    });

    function acckyc() {
        var file_data = $('#doc_1').prop('files')[0];
        var form_data = new FormData();
        form_data.append('doc_1', document.getElementById("doc_1").files[0]);
        form_data.append('action', "acckyc");
        $.ajax({
            type: "POST",
            url: "account_summary.php",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                // console.log(data);
                window.location = 'account_summary.php';
            },
            error: function() {
                alert('Error occurs!');
            }
        });
    }

    function myFunction() {
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var uname = $("#uname").val();
        var address1 = $("#address1").val();
        var address2 = $("#address2").val();
        var city = $("#city").val();
        var pincode = $("#pincode").val();
        var mobile1 = $("#mobile1").val();
        var mobile2 = $("#mobile2").val();
        var email = $("#email").val();
        var inst = $("#inst").val();
        var id = $("#edit_id").val();
        $.ajax({
            type: "post",
            url: "account_summary.php",
            data: {
                fname: fname,
                lname: lname,
                uname: uname,
                address1: address1,
                address2: address2,
                mobile1: mobile1,
                mobile2: mobile2,
                email: email,
                city: city,
                pincode: pincode,
                inst: inst,
                id: id
            },
            success: function(response) {
                // console.log(response);
                window.location = 'account_summary.php';
            },
            error: function() {
                alert('Error occurs!');
            }
        });
    }

    $("#kyc_sign_submit_button").on('click', function(e) {
        var ImgPreview = $("#preview_img_d").val();
        var exsiting_sign1 = $("#exsiting_sign1").attr('src');
        var sign1 = $("#sig-dataUrl0").val();
        var signimage1 = $('#imag').prop('files')[0];
        var form_data = new FormData();
        form_data.append('sign1', sign1);
        form_data.append('ImgPreview', ImgPreview);
        form_data.append('exsiting_sign1', exsiting_sign1);
        form_data.append('signimage1', document.getElementById("imag").files[0]);
        $.ajax({
            type: "post",
            url: "account_summary.php",
            data: form_data,
            success: function(response) {
                console.log(response);
                // window.location = 'account_summary.php';
            },
            error: function() {
                alert('Error occurs!');
            }
        });
    });


    // signature pad script
    (function($) {
        $('.signRow').each(function() {
            // make dynamic pad id  
            $(this).find('canvas').attr('id', 'signPad' + $(this).index());
            var padId = $(this).find('canvas').attr('id');

            // make dynamic submit BTN id  
            $(this).find('.sig-submitBtn').attr('id', 'sig-submitBtn' + $(this).index());
            var padSubmitId = $(this).find('.sig-submitBtn').attr('id');

            // make dynamic clear BTN id  
            $(this).find('.sig-clearBtn').attr('id', 'sig-clearBtn' + $(this).index());
            var padClearId = $(this).find('.sig-clearBtn').attr('id');

            // make dynamic data url id  
            $(this).find('.sig-dataUrl').attr('id', 'sig-dataUrl' + $(this).index());
            var padDataUrlId = $(this).find('.sig-dataUrl').attr('id');

            // make dynamic img id  
            $(this).find('.sig-image').attr('id', 'sig-image' + $(this).index());
            var padImageId = $(this).find('.sig-image').attr('id');

            window.requestAnimFrame = (function(callback) {
                return window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.oRequestAnimationFrame ||
                    window.msRequestAnimaitonFrame ||
                    function(callback) {
                        window.setTimeout(callback, 1000 / 60);
                    };
            })();

            var canvas = document.getElementById(padId);
            var ctx = canvas.getContext("2d");
            ctx.strokeStyle = "#222222";
            ctx.lineWidth = 4;

            var drawing = false;
            var mousePos = {
                x: 0,
                y: 0
            };
            var lastPos = mousePos;

            canvas.addEventListener("mousedown", function(e) {
                drawing = true;
                lastPos = getMousePos(canvas, e);
            }, false);

            canvas.addEventListener("mouseup", function(e) {
                drawing = false;
            }, false);

            canvas.addEventListener("mousemove", function(e) {
                mousePos = getMousePos(canvas, e);
            }, false);

            // Add touch event support for mobile
            canvas.addEventListener("touchstart", function(e) {

            }, false);

            canvas.addEventListener("touchmove", function(e) {
                var touch = e.touches[0];
                var me = new MouseEvent("mousemove", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(me);
            }, false);

            canvas.addEventListener("touchstart", function(e) {
                mousePos = getTouchPos(canvas, e);
                var touch = e.touches[0];
                var me = new MouseEvent("mousedown", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(me);
            }, false);

            canvas.addEventListener("touchend", function(e) {
                var me = new MouseEvent("mouseup", {});
                canvas.dispatchEvent(me);
            }, false);

            function getMousePos(canvasDom, mouseEvent) {
                var rect = canvasDom.getBoundingClientRect();
                return {
                    x: mouseEvent.clientX - rect.left,
                    y: mouseEvent.clientY - rect.top
                }
            }

            function getTouchPos(canvasDom, touchEvent) {
                var rect = canvasDom.getBoundingClientRect();
                return {
                    x: touchEvent.touches[0].clientX - rect.left,
                    y: touchEvent.touches[0].clientY - rect.top
                }
            }

            function renderCanvas() {
                if (drawing) {
                    ctx.moveTo(lastPos.x, lastPos.y);
                    ctx.lineTo(mousePos.x, mousePos.y);
                    ctx.stroke();
                    lastPos = mousePos;
                }
            }

            // Prevent scrolling when touching the canvas
            document.body.addEventListener("touchstart", function(e) {
                if (e.target == canvas) {
                    e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchend", function(e) {
                if (e.target == canvas) {
                    e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchmove", function(e) {
                if (e.target == canvas) {
                    e.preventDefault();
                }
            }, false);

            (function drawLoop() {
                requestAnimFrame(drawLoop);
                renderCanvas();
            })();

            function clearCanvas() {
                canvas.width = canvas.width;
            }

            // Set up the UI
            var sigText = document.getElementById(padDataUrlId);
            var sigImage = document.getElementById(padImageId);
            var clearBtn = document.getElementById(padClearId);
            var submitBtn = document.getElementById(padSubmitId);

            clearBtn.addEventListener("click", function(e) {
                clearCanvas();
                sigImage.setAttribute("src", "");
            }, false);

            submitBtn.addEventListener("click", function(e) {
                var dataUrl = canvas.toDataURL();
                sigText.innerHTML = dataUrl;
                sigImage.setAttribute("src", dataUrl);
                save_signature_funvtion();
            }, false);

        }); // each function  end
    })(jQuery);

    function save_signature_funvtion() {
        $("#sig-submitBtn0").click(function() {
            $("#sig-image0").show();
            $("#editbtn1").show();
            $("#sig-submitBtn0").hide();
            $("#signPad0").hide();
            $("#sig-clearBtn0").hide();
        });
    }
    $("#editbtn1").click(function() {
        $("#sig-image0").hide();
        $("#exsiting_sign1").hide();
        $("#editbtn1").hide();
        $("#newsign").show();
        $("#signPad0").show();
        $("#sig-clearBtn0").show();
        $("#sig-submitBtn0").show();
    });

    function readURL(input, imgControlName) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(imgControlName).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imag").change(function() {
        // add your logic to decide which image control you'll use
        var imgControlName = "#ImgPreview";
        readURL(this, imgControlName);
        $('.preview1').addClass('it');
        $('.btn-rmv1').addClass('rmv');
    });

    $("#delete_doc1").click(function(e) {
        e.preventDefault();
        $("#exsiting_doc_1_file").text("");
        var exsiting_doc_1_file = $("#exsiting_doc_1_file_db").val();
        var form_data = new FormData();
        form_data.append('doc_1',exsiting_doc_1_file);
        form_data.append('action', "remove_doc_1");
        $.ajax({
            type: "post",
            url: "account_summary.php",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                // console.log(response);
                window.location = 'account_summary.php';
            },
            error: function() {
                alert('Error occurs!');
            }
        });

    });

    $("#removeImage1").click(function(e) {
        e.preventDefault();
        $("#imag").val("");
        $("#ImgPreview").attr("src", "");
        $('.preview1').removeClass('it');
        $('.btn-rmv1').removeClass('rmv');
    });
    const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
    $("#doc_1").on('change', function(e) {
        for (var i = 0; i < this.files.length; i++) {
            let fileBloc = $('<span/>', {
                    class: 'd-flex'
                }),
                fileName = $('<span/>', {
                    class: 'name m-auto',
                    text: this.files.item(i).name
                });
            fileBloc.append(fileName).append('<img src="assets/media/icons/delete_icon_1.png" class="m-auto file-delete" id="delete_doc_1">');
            $("#files-names").append(fileBloc);
        };
        // Ajout des fichiers dans l'objet DataTransfer
        for (let file of this.files) {
            dt.items.add(file);
        }
        // Mise à jour des fichiers de l'input file après ajout
        this.files = dt.files;

        // EventListener pour le bouton de suppression créé
        $('img.file-delete').click(function() {
            let name = $(this).next('span.name').text();
            // Supprimer l'affichage du nom de fichier
            $(this).parent().remove();
            for (let i = 0; i < dt.items.length; i++) {
                // Correspondance du fichier et du nom
                if (name === dt.items[i].getAsFile().name) {
                    // Suppression du fichier dans l'objet DataTransfer
                    dt.items.remove(i);
                    continue;
                }
            }
            // Mise à jour des fichiers de l'input file après suppression
            document.getElementById('doc_1').files = dt.files;
        });
    });
</script>

</html>