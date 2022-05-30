<?php
include_once 'includes/php/common_php.php';

$edit_category = $id = $edit_type =  $idd = '';

if (isset($_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'])) {
    $encrypt_action = $_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'];
    $action = encrypt_decrypt('decrypt', $encrypt_action);
    $encrypt_id = $_GET['WnAyV3FOdHJ3dkNiMEgrMGxVcytZUT09'];
    $id = encrypt_decrypt('decrypt', $encrypt_id);
    if ($action == 'edit') {
        $sql = "SELECT `id`, `tba_category_id`,`type` FROM `tba_service_type` WHERE `id` ='$id' ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $idd = $row['id'];
            $edit_category = $row['tba_category_id'];
            $edit_type = $row['type'];
        }
    } else if ($action == 'deactive') {
        $sql = "UPDATE `tba_service_type` SET `is_active` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_tba_service_type.php?msg=3");
    } else if ($action == 'active') {
        $sql = "UPDATE `tba_service_type` SET `is_active` = '0' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_tba_service_type.php?msg=3");
    } else if ($action == 'delete') {
        $sql = "UPDATE `tba_service_type` SET `is_delete` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_tba_service_type.php?msg=4");
    }
}

if (isset($_POST['order'])) {
    $id_array = $_POST['order'];
    foreach ($id_array as $key => $value) {
        if ($value) {
            $sql = "UPDATE `tba_service_type` SET `position`='$key' where id='$value'";
            $result = mysqli_query($conn, $sql);
        }
    }
    exit;
}

if (isset($_POST['type'])) {
    $tba_service_category = mysqli_real_escape_string($conn, $_POST["tba_service_category"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $id = $_POST["id"];
    if ($id) {
        $sql6 = "UPDATE `tba_service_type` SET `type`= '$type',`tba_category_id`= '$tba_service_category' WHERE id='$id'";
        $res6 = mysqli_query($conn, $sql6);
        header("Location: add_tba_service_type.php");
    } else {
        $sql5 = "SELECT * FROM `tba_service_type` where `tba_category_id` = '$tba_service_category' AND `type` = '$type'";
        $res5 = mysqli_query($conn, $sql5);
        if (mysqli_num_rows($res5)) {
            $msg = 1;
        } else {
            $sql6 = "INSERT INTO `tba_service_type`(`tba_category_id`,`type`) VALUES ('$tba_service_category','$type')";
            $res6 = mysqli_query($conn, $sql6);
            header("Location: add_tba_service_type.php");
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
                            <div class="card p-4">
                                <!--begin::Card header-->
                                <!--begin::Title-->
                                <h3 class="fs-1hx text-dark mt-8">Create Sub Category</h3>
                                <!--end::Title-->
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body p-0 m-2">
                                    <!--begin::Form-->
                                    <form class="form" role="form" method="POST" enctype="multipart/form-data" id="add_new_type">
                                        <input id="edit_id" type="hidden" value="<?php echo $idd ?>" />
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 mb-2">TBA Service Category</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="tba_service_category" id="tba_service_category" data-control="select2" data-placeholder="Select a Serivice Category..." class="form-select form-select-solid">
                                                        <option value=""></option>
                                                        <?php
                                                        $tba_service_category_sql = "SELECT * FROM `tba_service_category` WHERE `is_active` = '0'";
                                                        $tba_service_category_result = mysqli_query($conn, $tba_service_category_sql);
                                                        while ($row = mysqli_fetch_assoc($tba_service_category_result)) { ?>
                                                            <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $edit_category) {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                                                <?php echo $row['category']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="row">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 mb-2">Add Subcategory</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" name="type" id="type" value="<?php echo $edit_type; ?>" />
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-3 fv-row text-center">
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
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Image">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="inst" accept=".png, .jpg, .jpeg" id="inst" value="<?php echo $edit_inst; ?>" />
                                                            <!-- <input type="hidden" name="inst" /> -->
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Edit-->
                                                        <!--begin::Cancel-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Image">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Image">
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
                                            <div class="col-md-3 fv-row text-center">
                                                <!--begin::Submit-->
                                                <button type="reset" class="btn btn-light btn-active-light-primary m-5">
                                                    <!--begin::Indicator-->
                                                    <span class="indicator-label"><img src="assets/media/icons/clear_icon_1.png"> Clear Field</span>
                                                    <!--end::Indicator-->
                                                </button>
                                                <button type="submit" class="btn btn-primary m-5" id="add_new_type_submit_button" name="add_new_category_submit">
                                                    <!--begin::Indicator-->
                                                    <span class="indicator-label">Create Service</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    <!--end::Indicator-->
                                                </button>
                                                <!--end::Submit-->
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
                            <br>
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Form-->
                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1 fv-row">
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
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 diagnosis_list" id="kt_customers_table">
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                    <th class="min-w-15px text-center">Sl.No</th>
                                                    <th class="min-w-155px text-center">Category</th>
                                                    <th class="min-w-155px">Subcaregory</th>
                                                    <th class="min-w-80px">Status</th>
                                                    <th class="min-w-80px text-center">Actions</th>
                                                    <th class="text-cenetr min-w-1px"></th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600 ui-sortable">
                                                <?php
                                                $i = 1;
                                                $sql = "SELECT * FROM `tba_service_type` where `is_delete`='0' ORDER BY `position` asc";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $id = encrypt_decrypt('encrypt', $row['id']);
                                                ?>
                                                    <tr id="<?php echo $row['id']; ?>">
                                                        <td class="priority">
                                                            <?php echo $i; ?>
                                                        </td>
                                                        <td class="text_limit">
                                                            <?php
                                                            echo $category_name[$row['tba_category_id']];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['type']; ?>
                                                        </td>
                                                        <td>
                                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <?php if ($row['is_active'] == '0') { ?>
                                                                    <a onclick="deactive('<?php echo $action_string . '=' . $deactive_string . '&' . $id_string . '=' . $id; ?>')">
                                                                        <input class="form-check-input" name="is_active" type="checkbox" value="1" <?php echo ($row['is_active'] == '0') ? 'checked' : '' ?>>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a onclick="active('<?php echo $action_string . '=' . $active_string . '&' . $id_string . '=' . $id; ?>')">
                                                                        <input class="form-check-input" name="is_active" type="checkbox" value="0" <?php echo ($row['is_active'] == '1') ? '' : 'checked' ?>>
                                                                    </a>
                                                                <?php } ?>
                                                                <!--end::Input-->
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <a href="add_tba_service_type.php?<?php echo $action_string . '=' . $edit_string . '&' . $id_string . '=' . $id; ?>" class="menu-link px-3"><img src="assets/media/icons/c_edit_icon_1.png"></a>
                                                            <a onclick="deletion('<?php echo $action_string . '=' . $delete_string . '&' . $id_string . '=' . $id; ?>')" class="menu-link px-3" data-kt-customer-table-filter="delete_row"><img src="assets/media/icons/remove_icon_1.png"></a>
                                                        </td>
                                                        <td></td>
                                                    </tr>
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
    <!--end::Main-->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        var t, e, i;
        i = document.querySelector("#add_new_type");
        t = document.getElementById("add_new_type_submit_button");
        (e = FormValidation.formValidation(i, {
            fields: {
                tba_service_category: {
                    validators: {
                        notEmpty: {
                            message: "Category is required"
                        }
                    }
                },
                type: {
                    validators: {
                        notEmpty: {
                            message: "Type is required"
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
        var type = $("#type").val();
        var tba_service_category = $("#tba_service_category").val();
        var id = $("#edit_id").val();
        $.ajax({
            type: "post",
            url: "add_tba_service_type.php",
            data: {
                type: type,
                tba_service_category: tba_service_category,
                id: id
            },
            success: function(response) {
                // console.log(response);
                window.location = 'add_tba_service_type.php';
            },
            error: function() {
                alert('Error occurs!');
            }
        });
    }

    //Helper function to keep table row from collapsing when being sorted               
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        //alert($originals);
        var $helper = tr.clone();
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        return $helper;
    };

    //Make diagnosis table sortable
    $(".diagnosis_list tbody").sortable({
        //alert('hi');
        helper: fixHelperModified,
        stop: function(event, ui) {
            renumber_table('.diagnosis_list')

        }
    }).disableSelection();
    //Renumber table rows
    function renumber_table(tableID) {
        //alert('hi');
        var all = new Array();
        $(tableID + " tr").each(function() {
            var trid = $(this).attr('id'); // table row ID   
            //alert(trid);
            count = $(this).parent().children().index($(this)) + 1;
            $(this).find('.priority').html(count);
            all[count] = trid;
            //alert(JSON.stringify(all));
        });
        $.post("add_tba_service_type.php", {
                order: all
            },
            function(data, status) {
                // alert(data);
                alert(status);
            });
    }


    function deletion(strr) {
        if (strr) {
            var r = confirm("Are You Sure Want To Delete ?");
            if (r == true) {
                window.location = "add_tba_service_type.php?" + strr;
            }
        }
    }

    function active(strr) {
        if (strr) {
            var r = confirm("Are You Sure Want To Active This ?");
            if (r == true) {
                window.location = "add_tba_service_type.php?" + strr;
            }
        }
    }

    function deactive(strr) {
        if (strr) {
            var r = confirm("Are You Sure Want To Deactive This ?");
            if (r == true) {
                window.location = "add_tba_service_type.php?" + strr;
            }
        }
    }
</script>

</html>