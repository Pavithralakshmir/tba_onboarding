<?php
include_once 'includes/php/common_php.php';
if (isset($_GET['req_m'])) {
    $support_msg = $_GET['req_m'];
    $viewed_id = ($support_msg != 'Request') ? ("`is_viewed` = '1'") : ("`is_viewed` = '0'");
    $i = 1;
    $sql = "SELECT `id`, `sender_id`, `sender_msg`, `sent_at`, `replay_by`, `replay_msg`, `replay_at`,`is_viewed` FROM `chat_bot` WHERE $viewed_id ORDER BY `id` ASC";
    $result = mysqli_query($conn, $sql);
} else {
    header("Location: supports_msgs.php?req_m=request");
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
                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><?php echo $support_msg; ?> Message List</h1>
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
                                    <li class="breadcrumb-item text-dark"><?php echo $support_msg; ?> Message List</li>
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
                            <form class="form mb-15" method="post">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Top-->
                                    <div class="text-center">
                                        <!--begin::Title-->
                                        <!-- <h3 class="fs-2hx text-dark mt-8">Send Replay to Request Message</h3> -->
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
                                                                <a href="add_tba_services.php?<?php echo $action_string . '=' . $edit_string . '&' . $id_string . '=' . $id; ?>" class="menu-link px-3">Edit</a>
                                                                <button type="button" class="btn btn-primary" onclick="view_req_msgs('<?php echo $row['id']; ?>')">View</button>
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
                            </form>
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
    function view_req_msgs(val) {
        var req_id = val;
        $.ajax({
            type: "POST",
            url: "request_msgs.php",
            data: {
                'req_idsss': req_id,
            },
            dataType: "json",
            success: function(response) {
               console.log(response);
            },
            error: function(a, b, c) {
              alert(a);
            }
        });
    }
</script>
</html>