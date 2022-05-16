<?php
include_once 'includes/php/common_php.php';
$url = $uname = $id = $idd = $msg = $parent = $aaaper = $edit_id = '';

if (isset($_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'])) {
    $encrypt_action = $_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'];
    $action = encrypt_decrypt('decrypt', $encrypt_action);
    $encrypt_id = $_GET['WnAyV3FOdHJ3dkNiMEgrMGxVcytZUT09'];
    $id = encrypt_decrypt('decrypt', $encrypt_id);
    // echo $id;exit;
    if ($action == 'edit') {
        $sql = "select * from `usergroup` where id='$id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $edit_id = $row['id'];
            $uname = $row['name'];
            $aaaper = explode(",", $row['access_per']);
            //print_r($aaaper);      
        }
    } else if ($action == 'delete') {
        $sql = "DELETE FROM `usergroup` where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: user_group.php?msg=4");
    }
}

if (isset($_POST['name'])) {
    $mname = $_POST['name'];
    $acc_per = $_POST['acc_per'];
    $edit_id = $_POST['edit_id'];
    $cdate = date('Y-m-d H:i:s');
    $cby = $user_details->name;
    if ($edit_id) {
        $sql = "UPDATE `usergroup` SET `name`='$mname',`access_per`='$acc_per',`mdate`='$cdate',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$cby' WHERE `id`='$edit_id'";
    } else {
        $sql = "INSERT INTO `usergroup`(`name`, `access_per`,`cdate`, `cby`, `cip`) VALUES ('$mname','$acc_per','$cdate','$cby','$_SERVER[REMOTE_ADDR]')";
    }
    $res1 = mysqli_query($conn, $sql);
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
  <!--begin::Card-->
  <div class="card">
                        <!--begin::Card header-->
                        <div class="text-center">
                            <!--begin::Title-->
                            <h3 class="fs-2hx text-dark mt-8">Enable Permission</h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Form-->
                            <form class="form mb-15" role="form" method="POST" enctype="multipart/form-data" id="add_enable_role">
                                <input type="hidden" id="edit_id" value="<?php echo $edit_id; ?>">
                                <!--begin::Input group-->
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Add User Group Name </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="name" id="name" value="<?php echo ($uname) ? ($uname) : (''); ?>" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Access Permission</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <!--begin::Option-->
                                        <select id="acc_per" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="acc_per[]" multiple="multiple">
                                            <option></option>
                                            <?php
                                            $sql4 = "SELECT * FROM `usermodules` WHERE status = 0 order by position asc";
                                            $res4 = mysqli_query($conn, $sql4);
                                            while ($row4 = mysqli_fetch_assoc($res4)) {
                                                $menu_array[$row4['parent']][$row4['id']] = $row4['mname'];
                                            }

                                            //                                                            print_r($menu_array);
                                            //                                                            $menu_array[$row4['parent']][] = array("id" => $row4['id'], "name" => $row4['mname'], "submenu" => $row4['submenu']);
                                            foreach ($menu_array[0] as $key => $value) {
                                            ?>
                                                <optgroup label="<?php echo $value; ?>">
                                                    <option value="<?php echo $key; ?>" <?php
                                                                                        if ($id) {
                                                                                            if (in_array($key, $aaaper)) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        }
                                                                                        ?>><?php echo $value; ?></option>
                                                    <?php
                                                    if (!empty($menu_array[$key])) {
                                                        foreach ($menu_array[$key] as $key1 => $value1) {
                                                    ?>
                                                            <option value="<?php echo $key1; ?>" <?php
                                                                                                    if ($id) {
                                                                                                        if (in_array($key1, $aaaper)) {
                                                                                                            echo 'selected';
                                                                                                        }
                                                                                                    }
                                                                                                    ?>><?php echo $value1; ?></option>
                                                            <?php
                                                            if (array_key_exists($key1, $menu_array)) {
                                                                foreach ($menu_array[$key1] as $key2 => $value2) {
                                                            ?>
                                                                    <option value="<?php echo $key2; ?>" <?php
                                                                                                            if ($id) {
                                                                                                                if (in_array($key2, $aaaper)) {
                                                                                                                    echo 'selected';
                                                                                                                }
                                                                                                            }
                                                                                                            ?>><?php echo $value1 . ' => ' . $value2; ?></option>
                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </optgroup>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <!--end::Option-->
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <div class="text-center">
                                    <!--begin::Submit-->
                                    <button type="submit" class="btn btn-success" id="add_enable_role_submit_button" name="add_enable_role_submit">
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
                            <h3 class="fs-2hx text-dark mt-8">Edit And Delete User Group</h3>
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
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-15px text-center">SlNo</th>
                                        <th class="min-w-80px text-center">Actions</th>
                                        <th class="min-w-125px">Name</th>
                                        <th class="min-w-125px">Access PerMissions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600 ui-sortable">
                                    <?php
                                    $i = 1;
                                    $sql2 = "SELECT * FROM `usermodules`";
                                    $res2 = mysqli_query($conn, $sql2);
                                    while ($row2 = mysqli_fetch_assoc($res2)) {
                                        $id = $row2['id'];
                                        $murl = $row2['url'];
                                        $getname[$row2['id']] = $row2['mname'];
                                    }
                                    $sql = "select if(r.`ugroup`, 'yes', 'no') as exist,u.`id`,u.name,u.access_per from `usergroup` u LEFT JOIN users r on u.id=r.ugroup group by u.`id`";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = encrypt_decrypt('encrypt', $row['id']);
                                        $name = $row['name'];
                                        $acper = $row['access_per'];
                                        $aaper = explode(",", $acper);
                                        $exist = $row['exist']
                                    ?>
                                        <tr id="<?php echo $row['id']; ?>">
                                            <!--begin::Name=-->
                                            <td class="priority">
                                                <?php echo $i; ?>
                                            </td>
                                            <!--end::Name=-->
                                            <!--begin::Action=-->
                                            <td>
                                                <!--begin::Menu-->
                                                <a href="user_group.php?<?php echo $action_string . '=' . $edit_string . '&' . $id_string . '=' . $id; ?>" class="menu-link px-3">Edit</a>
                                                <a onclick="deletion('<?php echo $action_string . '=' . $delete_string . '&' . $id_string . '=' . $id; ?>')" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                                                <!--end::Menu-->
                                            </td>
                                            <!--end::Action=-->
                                            <!--begin::Company=-->
                                            <td>
                                                <?php
                                                echo $name;
                                                ?>
                                            </td>
                                            <!--end::Company=-->
                                            <td>
                                                <?php
                                                foreach ($aaper as $value) {
                                                    if ($value) {
                                                        echo $getname[$value] . ',';
                                                    }
                                                }
                                                ?>
                                            </td>
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
        "use strict";
        var KTCareersApply = (function() {
            var t, e, i;
            return {
                init: function() {
                    (i = document.querySelector("#add_enable_role")),
                    (t = document.getElementById("add_enable_role_submit_button")),
                    (e = FormValidation.formValidation(i, {
                        fields: {
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: "Name is required"
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
                    t.addEventListener("click", function(i) {
                        i.preventDefault(),
                            e &&
                            e.validate().then(function(e) {
                                "Valid" == e
                                    ?
                                    (
                                        add_enable_role()
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
                },
            };
        })();
        KTUtil.onDOMContentLoaded(function() {
            KTCareersApply.init();
        });


        function add_enable_role() {
            var name = $("#name").val();
            var acc_per_list = $('select#acc_per').val();
            var edit_id = $("#edit_id").val();
            var form_data = new FormData();
            form_data.append('name', name);
            form_data.append('acc_per', acc_per_list);
            form_data.append('edit_id', edit_id);
            $.ajax({
                type: "post",
                url: "user_group.php",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    // console.log(response);
                    window.location = 'user_group.php';
                },
                error: function() {
                    alert('Error occurs!');
                }
            });
        }
    });

    function deletion(strr) {
        if (strr) {
            var r = confirm("Are You Sure Want To Delete ?");
            if (r == true) {
                window.location = "user_group.php?" + strr;
            }
        }
    }
</script>
</html>