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
        $sql = "UPDATE `tba_service_type` SET `status` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE `tba_service_type` SET `status` = '1' where `parent`='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_tba_service_type.php?msg=3");
    } else if ($action == 'active') {
        $sql = "UPDATE `tba_service_type` SET `status` = '0' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_tba_service_type.php?msg=3");
    } else if ($action == 'delete') {
        $sql = "UPDATE `tba_service_type` SET `is_active` = '1' where id='$id'";
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
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <!--begin::Container-->
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <!--begin::Title-->
                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add TBA Service Type</h1>
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
                                    <li class="breadcrumb-item text-dark">Add TBA Service Type</li>
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
                                <!--begin::Card header-->
                                <div class="text-center">
                                    <!--begin::Title-->
                                    <h3 class="fs-2hx text-dark mt-8">Add TBA Service Type Form</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Form-->
                                    <form class="form mb-15" role="form" method="POST" enctype="multipart/form-data" id="add_new_type">
                                        <input id="edit_id" type="hidden" value="<?php echo $idd ?>" />
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">TBA Service Category</label>
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
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">Add Type</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="" name="type" id="type" value="<?php echo $edit_type; ?>" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <div class="text-center pt-8">
                                            <!--begin::Submit-->
                                            <button type="reset" class="btn btn-warning">
                                                <!--begin::Indicator-->
                                                <span class="indicator-label">Cancle</span>
                                                <!--end::Indicator-->
                                            </button>
                                            <button type="submit" class="btn btn-success" id="add_new_type_submit_button" name="add_new_category_submit">
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
                            <br>
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="text-center">
                                    <!--begin::Title-->
                                    <h3 class="fs-2hx text-dark mt-8">Edit And Delete TBA Service Type</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-8">
                                    <!--begin::Form-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1 col-md-4 fv-row">
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
                                                    <th class="min-w-15px text-center">SlNo</th>
                                                    <th class="min-w-80px text-center">Actions</th>
                                                    <th class="min-w-125px">Category</th>
                                                    <th class="min-w-125px">Type</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-cenetr min-w-70px"></th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600 ui-sortable">
                                                <?php
                                                $i = 1;
                                                $sql = "SELECT * FROM `tba_service_type` where `is_active`='0' ORDER BY `position` asc";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $id = encrypt_decrypt('encrypt', $row['id']);
                                                ?>
                                                    <tr id="<?php echo $row['id']; ?>">
                                                        <td class="priority">
                                                            <?php echo $i; ?>
                                                        </td>
                                                        <td>
                                                            <a href="add_tba_service_type.php?<?php echo $action_string . '=' . $edit_string . '&' . $id_string . '=' . $id; ?>" class="menu-link px-3">Edit</a>
                                                            <a onclick="deletion('<?php echo $action_string . '=' . $delete_string . '&' . $id_string . '=' . $id; ?>')" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                                                        </td>
                                                        <td class="text_limit">
                                                            <?php
                                                            echo $category_name[$row['tba_category_id']];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['type']; ?>
                                                        </td>
                                                        <td></td>
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
</script>

</html>