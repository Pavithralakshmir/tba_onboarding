<?php
include_once 'includes/php/common_php.php';
// Include configuration file 
include_once 'paypal/config.php';

// Include database connection file 
include_once 'paypal/dbConnect.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $action_id = ($_POST['action'] == 'subscribed') ? ('1') : ('2');
    $action_date = ($_POST['action'] == 'subscribed') ? ('`subscribed_date`') : ('`requested_date`');
    $client_id = $_POST['client_id'];
    $ts_id = $_POST['ts_id'];
    $price = $_POST['price'];
    $cby = $user_details->name;
    $sql5 = "SELECT  `tba_service_id`,`client_id`,`tba_service_id`,`subscribed_date` FROM `subscribers_details` WHERE `tba_service_id`=' $ts_id' && `client_id` = '$client_id'";
    $result5 = mysqli_query($conn, $sql5);
    if (mysqli_num_rows($result5) == '0') {
        $sql = "INSERT INTO `subscribers_details`(`is_request`,`client_id`, `tba_service_id`, $action_date, `service_status`,`service_process_status`,`payment_status`, `cdate`, `cby`, `cip`) 
        VALUES 
        ('$action_id','$client_id','$ts_id','$datetime',' $action','$action','not paid','$datetime','$cby','$_SERVER[REMOTE_ADDR]')";
    } else {
        $sql = "UPDATE `subscribers_details` SET `is_request`='$action_id',`service_process_status`='$action',`service_status`= '$action',`mdate`='$datetime',`mip`='$_SERVER[REMOTE_ADDR]',`mby`='$cby' WHERE `tba_service_id`='$ts_id' AND `client_id`='$client_id'";
    }
    $res1 = mysqli_query($conn, $sql);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TBA - TBA Services</title>
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
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <!--begin::About card-->
                        <?php
                        // $sql1 = "SELECT `tba_category_id` FROM `tba_service_type` WHERE `is_active` = '0' GROUP BY `tba_category_id`  ORDER BY `position` asc";
                        $sql1 = "SELECT `id` FROM `tba_service_category` WHERE `is_active` = '0' ORDER BY `position` asc";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $tba_service_category_id = $row1['id'];
                        ?>
                            <div class="card">
                                <!--begin::Body-->
                                <div class="card-body p-lg-7">
                                    <!--begin::Team-->
                                    <!--begin::Heading-->
                                    <div class="mb-10">
                                        <!--begin::Title-->
                                        <h3 class="fw-bolder text-dark mb-5"><?php echo $category_name[$tba_service_category_id]; ?>
                                            <span class="float-end">
                                                <!--begin::Button-->
                                                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev<?php echo $tba_service_category_id; ?>">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                                                    <span class="svg-icon svg-icon-3x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                                <!--end::Button-->
                                                <!--begin::Button-->
                                                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next<?php echo $tba_service_category_id; ?>">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                    <span class="svg-icon svg-icon-3x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                                <!--end::Button-->
                                            </span>
                                        </h3>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Slider-->
                                    <div class="tns">
                                        <!--begin::Wrapper-->
                                        <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="true" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev<?php echo $tba_service_category_id; ?>" data-tns-next-button="#kt_team_slider_next<?php echo $tba_service_category_id; ?>" data-tns-responsive="{1200: {items: 4}, 992: {items: 3}}">
                                            <?php
                                            $sql = "SELECT `id`,`type`,`tba_category_id` FROM `tba_service_type` WHERE `is_active` = '0' AND `tba_category_id`='$tba_service_category_id' GROUP BY `type` ORDER BY `position` asc";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result)) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $tba_type_id = $row['id'];
                                                    $tba_cat_id = $row['tba_category_id'];
                                            ?>
                                                    <!--begin::Item-->
                                                    <div class="text-center tba_dashboard_card">
                                                        <div class="card-values">
                                                            <!--begin::Photo-->
                                                            <div class="octagon mx-auto d-flex w-200px h-130px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/icons/service_icons/grp_<?php echo "0.png"; ?>')"></div>
                                                            <!--end::Photo-->
                                                            <!--begin::Person-->
                                                            <div class="mb-0">
                                                                <!--begin::Name-->
                                                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-3"><?php echo $row['type']; ?></a>
                                                                <!--end::Name-->
                                                                <!--begin::Position-->
                                                                <div class="text-muted fs-6 fw-bold mt-1 mb-4">
                                                                    <div class="text-center">
                                                                        <!--begin::Drawer toggle-->
                                                                        <button type="button" class="kt_activities_toggle<?php echo "ti" . $tba_type_id . "cid" . $tba_cat_id; ?>" btn btn-lg btn-light btn-active-light-dark" onclick="kt_activities_toggle('<?php echo $tba_type_id; ?>','<?php echo $tba_cat_id; ?>')" style="border-radius:50px;background: white;border-color: #a1a5b7;padding:3px 10px;">
                                                                            <span class="indicator-label">View More</span>
                                                                        </button>
                                                                        <!--end::Drawer toggle-->
                                                                    </div>
                                                                </div>
                                                                <!--begin::Position-->
                                                            </div>
                                                            <!--end::Person-->
                                                        </div>
                                                    </div>
                                                    <!--end::Item-->
                                                <?php
                                                }
                                            } else { ?>
                                               <span class="d-flex justify-content-center flex-column text-center fw-bolder text-muted fs-5 ps-1">Upcoming Soon</span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Slider-->
                                    <!--end::Team-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <br>
                        <?php
                            include 'includes/php/right_model.php';
                        }
                        ?>
                        <!--end::About card-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Content-->
                <?php
                include_once 'includes/footer.php';
                ?>

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
</body>
<script>
    function subscribe_now(ts_id, client_id, price, tba_service_price_amt, c_mobilenumber) {
        var payurl = $("#payurl" + ts_id).val();
        var bn = $("#bn" + ts_id).val();
        var cmd = $("#cmd" + ts_id).val();
        var title = $("#no_note" + ts_id).val();
        var currency_code = $("#currency_code" + ts_id).val();
        var return_url = $("#return" + ts_id).val();
        var cancel_return = $("#cancel_return" + ts_id).val();
        if (price == '2') {
            var action = "requested";
            var msg = 'Your request sent.We will connect you soon';
            var redir_file = "";
        }
        if (price == '1') {
            var action = "subscribed";
            var msg = 'Subscribed';
            var redir_file = payurl + "?business=info@codexworld.com&cmd=" + cmd + "&item_name=" + title + "&lc=" + client_id + "&item_number=" + ts_id + "&amount=" + tba_service_price_amt + "&currency_code=" + currency_code + "&return=" + return_url + "&cancel_return=" + cancel_return;
            // var redir_file = "paypal/paypal_file.php?ts_id='" + ts_id + '&amt=' + tba_service_price_amt + '&cid=' + client_id + '&mobilenumber=' + c_mobilenumber + '&cmd=' + cmd + '&no_note=' + no_note + '&bn=' + bn + '&item_number=' + item_number;
        }
        $.ajax({
            type: "post",
            url: "tba_services.php",
            data: {
                ts_id: ts_id,
                client_id: client_id,
                price: price,
                action: action,
            },
            success: function(response) {
                console.log(response);
                $('#btn_clk_' + ts_id).hide();
                $('#btn_clk_txt_' + ts_id).text(msg);
                $('#btn_clk_txt_' + ts_id).show();
                if (price == '1') {
                    window.location = redir_file
                };
            },
            error: function() {
                alert('Error occurs!');
            }
        });

    }

    function kt_activities_toggle(type_id, cat_id) {
        $('.kt_activities_toggleti' + type_id + "cid" + cat_id).click(function() {
            $(this).toggle();
        });
    }
</script>

</html>