<?php
include_once 'includes/php/common_php.php';

$edit_features = $id =  $idd = '';
if (isset($_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'])) {
    $encrypt_action = $_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'];
    $action = encrypt_decrypt('decrypt', $encrypt_action);
    $encrypt_id = $_GET['WnAyV3FOdHJ3dkNiMEgrMGxVcytZUT09'];
    $id = encrypt_decrypt('decrypt', $encrypt_id);
    if ($action == 'edit') {
        $sql = "SELECT `id`, `features` FROM `tba_features` WHERE `id` ='$id' ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $idd = $row['id'];
            $edit_features = $row['features'];
        }
    } else if ($action == 'deactive') {
        $sql = "UPDATE `tba_features` SET `status` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_m_features.php?msg=3");
    } else if ($action == 'active') {
        $sql = "UPDATE `tba_features` SET `status` = '0' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_m_features.php?msg=3");
    } else if ($action == 'delete') {
        $sql = "UPDATE `tba_features` SET `is_delete` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_m_features.php?msg=4");
    }
}

if (isset($_POST['order'])) {
    $id_array = $_POST['order'];
    foreach ($id_array as $key => $value) {
        if ($value) {
            $sql = "UPDATE `tba_features` SET `position`='$key' where id='$value'";
            $result = mysqli_query($conn, $sql);
        }
    }
    exit;
}

if (isset($_POST['features'])) {
    $features = mysqli_real_escape_string($conn, $_POST["features"]);
    $id = $_POST["id"];
    if ($id) {
        $sql6 = "UPDATE `tba_features` SET `features`= '$features' WHERE id='$id'";
        $res6 = mysqli_query($conn, $sql6);
        header("Location: add_m_features.php");
    } else {
        $sql5 = "SELECT * FROM `tba_features` where `features` = '$features'";
        $res5 = mysqli_query($conn, $sql5);
        if (mysqli_num_rows($res5)) {
            $msg = 1;
        } else {
            $sql6 = "INSERT INTO `tba_features`(`features`) VALUES ('$features')";
            $res6 = mysqli_query($conn, $sql6);
            header("Location: add_m_features.php");
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
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="text-center">
                                    <!--begin::Title-->
                                    <h3 class="fs-2hx text-dark mt-8">Add TBA Service features Form</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Form-->
                                    <form class="form mb-15" role="form" method="POST" enctype="multipart/form-data" id="add_new_features">
                                        <input id="edit_id" type="hidden" value="<?php echo $idd ?>" />
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">Add Features</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="" name="features" id="features" value="<?php echo $edit_features; ?>" />
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
                                                    <button type="submit" class="btn btn-success" id="add_new_features_submit_button" name="add_new_features_submit">
                                                        <!--begin::Indicator-->
                                                        <span class="indicator-label">Save Now</span>
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
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <br>
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="text-center">
                                    <!--begin::Title-->
                                    <h3 class="fs-2hx text-dark mt-8">Edit And Delete TBA Service features</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Card header-->
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
                                                <th class="w-15px">SlNo</th>
                                                <th class="min-w-125px">Actions</th>
                                                <th class="min-w-125px">features</th>
                                                <th class="min-w-125px"></th>
                                                <th class="text-cenetr min-w-70px"></th>
                                                <th class="text-cenetr min-w-70px"></th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600 ui-sortable">
                                            <?php
                                            $i = 1;
                                            $sql = "SELECT * FROM `tba_features` where `is_delete`='0' ORDER BY `position` asc";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id = encrypt_decrypt('encrypt', $row['id']);
                                            ?>
                                                <tr id="<?php echo $row['id']; ?>">
                                                    <!--begin::Name=-->
                                                    <td class="priority">
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <!--end::Name=-->
                                                    <!--begin::Action=-->
                                                    <td>
                                                        <a href="add_m_features.php?<?php echo $action_string . '=' . $edit_string . '&' . $id_string . '=' . $id; ?>" class="menu-link px-3">Edit</a>
                                                        <a onclick="deletion('<?php echo $action_string . '=' . $delete_string . '&' . $id_string . '=' . $id; ?>')" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                                                    </td>
                                                    <!--end::Action=-->
                                                    <!--begin::Company=-->
                                                    <td>
                                                        <?php
                                                        echo $row['features'];
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <!--end::Company=-->
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
        i = document.querySelector("#add_new_features");
        t = document.getElementById("add_new_features_submit_button");
        (e = FormValidation.formValidation(i, {
            fields: {
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
        var features = $("#features").val();
        var id = $("#edit_id").val();
        $.ajax({
            type: "post",
            url: "add_m_features.php",
            data: {
                features: features,
                id: id
            },
            success: function(response) {
                // console.log(response);
                window.location = 'add_m_features.php';
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
        $.post("add_m_features.php", {
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
                window.location = "add_m_features.php?" + strr;
            }
        }
    }
</script>

</html>