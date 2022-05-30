<?php
include_once 'includes/php/common_php.php';

$edit_team_name = $edit_team_member = $id =  $idd = '';
$edit_team_member = array();

if (isset($_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'])) {
    $encrypt_action = $_GET['Tmd3ZFVwaCtxWmNsYU1UODJWaUYxUT09'];
    $action = encrypt_decrypt('decrypt', $encrypt_action);
    $encrypt_id = $_GET['WnAyV3FOdHJ3dkNiMEgrMGxVcytZUT09'];
    $id = encrypt_decrypt('decrypt', $encrypt_id);
    if ($action == 'edit') {
        $sql = "SELECT `id`, `team_name`,`team_members` FROM `team` WHERE `id` ='$id' ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $idd = $row['id'];
            $edit_team_name = $row['team_name'];
            $edit_team_member = explode(",", $row['team_members']);
        }
    } else if ($action == 'deactive') {
        $sql = "UPDATE `team` SET `is_active` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_m_team.php?msg=3");
    } else if ($action == 'active') {
        $sql = "UPDATE `team` SET `is_active` = '0' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_m_team.php?msg=3");
    } else if ($action == 'delete') {
        $sql = "UPDATE `team` SET `is_delete` = '1' where id='$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: add_m_team.php?msg=4");
    }
}

if (isset($_POST['order'])) {
    $id_array = $_POST['order'];
    foreach ($id_array as $key => $value) {
        if ($value) {
            $sql = "UPDATE `team` SET `position`='$key' where id='$value'";
            $result = mysqli_query($conn, $sql);
        }
    }
    exit;
}

if (isset($_POST['team_name'])) {
    $team_name = mysqli_real_escape_string($conn, $_POST["team_name"]);
    $team_member = mysqli_real_escape_string($conn, $_POST["team_member"]);
    $id = $_POST["id"];
    $cdate = date('Y-m-d H:i:s');
    $cby = $user_details->name;
    $id = $_POST["id"];
    if ($id) {
        $sql6 = "UPDATE `team` SET `team_name`= '$team_name',`team_members`= '$team_member',`mdate`='$cdate',`mby`='$cby',`mip`='$_SERVER[REMOTE_ADDR]' WHERE id='$id'";
        $res6 = mysqli_query($conn, $sql6);
        header("Location: add_m_team.php");
    } else {
        $sql5 = "SELECT * FROM `team` where `team_name` = '$team_name'";
        $res5 = mysqli_query($conn, $sql5);
        if (mysqli_num_rows($res5)) {
            $msg = 1;
        } else {
            $sql6 = "INSERT INTO `team`(`team_name`,`team_members`) VALUES ('$team_name','$team_member','$cdate','$cby','$_SERVER[REMOTE_ADDR]')";
            $res6 = mysqli_query($conn, $sql6);
            header("Location: add_m_team.php");
        }
    }
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"> </script>
    <script>
        $(document).ready(function() {
            $(".select2-list").select2();
            $('.select2-list').select2({
                width: '100%',
                placeholder: "Select an Option",
                allowClear: true,
                tags: true,
            });
            $('#kt_customers_table').DataTable();
        });
    </script>
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
                                    <h3 class="fs-2hx text-dark mt-8">Add TBA Service team Form</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Form-->
                                    <form class="form mb-15" role="form" method="POST" enctype="multipart/form-data" id="add_new_team">
                                        <input id="edit_id" type="hidden" value="<?php echo $idd ?>" />
                                        <!--begin::Input group-->
                                        <div class="row mb-5">
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">Team Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Team Name Here" name="team_name" id="team_name" value="<?php echo $edit_team_name; ?>" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">Add team member</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="team_member[]" id="team_member" class="form-select form-select-solid select2-list select_dd towhom" multiple aria-readonly="true">
                                                    <option value=""></option>
                                                    <?php
                                                    $sql = "select * from users";
                                                    $querys = mysqli_query($conn, $sql);
                                                    while ($rows = mysqli_fetch_assoc($querys)) {
                                                    ?>
                                                        <option value="<?php echo $rows['id']; ?>" <?php
                                                                                                    if (in_array($rows['id'], $edit_team_member)) {
                                                                                                        echo "selected";
                                                                                                    }
                                                                                                    ?>>
                                                            <?php echo $rows['name'] . "-" . $rows['mobile1'] . "-" . $rows['pemail']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <div class="text-center pt-8">
                                                    <!--begin::Submit-->
                                                    <a href="add_m_team.php">
                                                        <button type="button" class="btn btn-warning">
                                                            <!--begin::Indicator-->
                                                            <span class="indicator-label">Cancle</span>
                                                            <!--end::Indicator-->
                                                        </button>
                                                    </a>
                                                    <button type="submit" class="btn btn-success" id="add_new_team_submit_button" name="add_new_team_submit">
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
                                    <h3 class="fs-2hx text-dark mt-8">Edit And Delete TBA Service team</h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Search-->
                                    <!-- <div class="d-flex align-items-center position-relative my-1 col-md-4 fv-row"> -->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <!-- <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                            </svg> -->
                                        <!-- </span> -->
                                        <!--end::Svg Icon-->
                                        <!-- <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid ps-15" placeholder="Search Here" />
                                    </div> -->
                                    <!--end::Search-->
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 diagnosis_list" id="kt_customers_table">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-15px">SlNo</th>
                                                <th class="min-w-125px">Actions</th>
                                                <th class="min-w-125px">Team Name</th>
                                                <th class="min-w-145px text-center">Team members</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600 ui-sortable">
                                            <?php
                                            $i = 1;
                                            $sql = "SELECT * FROM `team` where `is_delete`='0' ORDER BY `position` asc";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id = encrypt_decrypt('encrypt', $row['id']);
                                                $team_members = explode(',', $row['team_members']);
                                            ?>
                                                <tr id="<?php echo $row['id']; ?>">
                                                    <!--begin::Name=-->
                                                    <td class="priority">
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <!--end::Name=-->
                                                    <!--begin::Action=-->
                                                    <td>
                                                        <a href="add_m_team.php?<?php echo $action_string . '=' . $edit_string . '&' . $id_string . '=' . $id; ?>" class="menu-link px-3">Edit</a>
                                                        <a onclick="deletion('<?php echo $action_string . '=' . $delete_string . '&' . $id_string . '=' . $id; ?>')" class="menu-link px-3 text-danger" data-kt-customer-table-filter="delete_row">Delete</a>
                                                        <?php if ($row['is_active'] == '0') { ?>
                                                            <a href="add_m_team.php?<?php echo $action_string . '=' . $deactive_string . '&' . $id_string . '=' . $id; ?>" class="menu-link px-3 text-warning">Inacive</a>
                                                        <?php } else { ?>
                                                            <a href="add_m_team.php?<?php echo $action_string . '=' . $active_string . '&' . $id_string . '=' . $id; ?>" class="menu-link px-3 text-success">Active</a>
                                                        <?php } ?>
                                                    </td>
                                                    <!--end::Action=-->
                                                    <!--begin::Company=-->
                                                    <td>
                                                        <?php
                                                        echo $row['team_name'];
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        foreach ($team_members as $member_id) {
                                                            echo $users_name[$member_id] . "-" . $loginmobile[$member_id] . "-" . $loginmail[$member_id] . "<br>";
                                                        }
                                                        ?>
                                                    </td>
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
        i = document.querySelector("#add_new_team");
        t = document.getElementById("add_new_team_submit_button");
        (e = FormValidation.formValidation(i, {
            fields: {
                team_name: {
                    validators: {
                        notEmpty: {
                            message: "Team is required"
                        }
                    }
                },
                team_member: {
                    validators: {
                        notEmpty: {
                            message: "Team member is required"
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
        var team_name = $("#team_name").val();
        var team_member = $("#team_member").val();
        var id = $("#edit_id").val();
        var blkstr = [];
        $.each(team_member, function(idx2, val2) {
            var str = val2;
            blkstr.push(str);
        });
        var team_member = blkstr.join(",");
        $.ajax({
            type: "post",
            url: "add_m_team.php",
            data: {
                team_name: team_name,
                team_member: team_member,
                id: id
            },
            success: function(response) {
                // console.log(response);
                window.location = 'add_m_team.php';
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
        $.post("add_m_team.php", {
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
                window.location = "add_m_team.php?" + strr;
            }
        }
    }
</script>

</html>