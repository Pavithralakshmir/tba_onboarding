<?php
$sql = "SELECT `id`,`type`,`tba_category_id` FROM `tba_service_type` WHERE `is_active` = '0' AND `tba_category_id`='$tba_service_category_id' GROUP BY `type` ORDER BY `position` asc";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $tba_type_id = $row['id'];
    $tba_cat_id = $row['tba_category_id'];
?>
    <!--begin::Activities drawer-->
    <div id="kt_activities<?php echo "ti" . $tba_type_id . "cid" . $tba_cat_id; ?>" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="activities" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '1000px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle=".kt_activities_toggle<?php echo "ti" . $tba_type_id . "cid" . $tba_cat_id; ?>" data-kt-drawer-close="#kt_activities_close">
        <div class="card shadow-none rounded-0">
            <!--begin::Header-->
            <div class="card-header" id="kt_activities_header">
                <h3 class="card-title fw-bolder text-dark"><?php echo $row['type']; ?></h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_activities_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body position-relative" id="kt_activities_body">
                <!--begin::Content-->
                <div id="kt_activities_scroll" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_activities_body" data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer" data-kt-scroll-offset="5px">
                    <!--begin::Post card-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body p-lg-1 pb-lg-0">
                            <!--begin::Layout-->
                            <div class="d-flex flex-column flex-xl-row">
                                <!--begin::Content-->
                                <div class="flex-lg-row-fluid me-xl-15 w-900px">
                                    <?php
                                    $k = 1;
                                    $sql_1 = "SELECT `sd`.`id` as `sd_details`,`sd`.`service_process_status`,`sd`.`service_status`,`sd`.`payment_status`,`ts`.`id`, `ts`.`title`, `ts`.`tba_service_category`, `ts`.`tba_service_type`, `ts`.`description`, `ts`.`price`, `ts`.`price_amt`, `ts`.`remarks`, `ts`.`url`, `ts`.`inst`,`ts`.`cdate`, `ts`.`cby` FROM `tba_services` `ts` LEFT JOIN `subscribers_details` `sd` ON `sd`.`tba_service_id`=`ts`.`id` AND `sd`.`client_id`='$session_id' WHERE `ts`.`is_active` = '0' AND `ts`.`tba_service_category`='$tba_cat_id' AND `ts`.`tba_service_type`='$tba_type_id'";
                                    // $sql_ee1 = "SELECT `p`.`payment_id` as `payment_id`,`sd`.`id` as `sd_details`,`sd`.`service_process_status`,`sd`.`service_status`,`ts`.`id`, `ts`.`title`, `ts`.`tba_service_category`, `ts`.`tba_service_type`, `ts`.`description`, `ts`.`price`, `ts`.`price_amt`, `ts`.`remarks`, `ts`.`url`, `ts`.`inst`,`ts`.`cdate`, `ts`.`cby` FROM `payment` `p`  JOIN `subscribers_details` `sd` RIGHT JOIN `tba_services` `ts` ON `sd`.`tba_service_id`=`ts`.`id` AND `sd`.`client_id`='$session_id' AND  `p`.`service_id`=`sd`.`tba_service_id` AND  `p`.`service_id`=`ts`.`id` AND `p`.`client_id`='$session_id' WHERE `ts`.`is_active` = '0' AND `ts`.`tba_service_category`='$tba_cat_id' AND `ts`.`tba_service_type`='$tba_type_id'";
                                    $result_1 = mysqli_query($conn, $sql_1);
                                    $num = mysqli_num_rows($result_1);
                                    if ($num) {
                                        while ($row_1 = mysqli_fetch_assoc($result_1)) {
                                            $tba_cat_id = $row_1['tba_service_category'];
                                            $tba_type_id = $row_1['tba_service_type'];
                                            $url = $row_1['url'];
                                            $title = $row_1['title'];
                                            $description = $row_1['description'];
                                            $inst = $row_1['inst'];
                                            $remarks = $row_1['remarks'];
                                            $price = $row_1['price'];
                                            $price_amt = $row_1['price_amt'];
                                            $ts_id = $row_1['id'];
                                            $sd_id = $row_1['sd_details'];
                                            $service_status = $row_1['service_status'];
                                            $service_process_status = $row_1['service_process_status'];
                                            $payment_status = $row_1['payment_status'];
                                            $c_mobilenumber = $user_details->mobile1;
                                    ?>
                                            <!--begin::Post content-->
                                            <div class="mb-17">
                                                <!--begin::Wrapper-->
                                                <!--begin::Title-->
                                                <a href="<?php echo $url; ?>" target="_blank" class="text-dark text-hover-primary fs-2 fw-bolder"><?php echo $title; ?>
                                                    <span class="fw-bolder text-muted fs-5 ps-1"><?php echo $remarks; ?></span></a>
                                                <!--end::Title-->
                                                <!--begin::Container-->
                                                <div class="overlay mt-8">
                                                    <!--begin::Image-->
                                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('<?php echo $inst; ?>')"></div>
                                                    <!--end::Image-->
                                                </div>
                                                <!--end::Container-->
                                                <!--end::Wrapper-->
                                                <!--begin::Description-->
                                                <div class="fs-5 fw-bold text-gray-600 text-justify">
                                                    <!--begin::Text-->
                                                    <p class="mb-8"><?php echo htmlspecialchars_decode($description); ?></p>
                                                </div>
                                                <!--end::Description-->
                                                <!--begin::Icons-->
                                                <div class="d-flex text-start">
                                                    <?php if ($_SESSION['ugroup'] == '2') { ?>
                                                        <input type="hidden" id="payurl<?php echo $ts_id; ?>" name="payurl" value="<?php echo PAYPAL_URL; ?>">
                                                        <input type="hidden" id="bn<?php echo $ts_id; ?>" name="business" value="info@codexworld.com">
                                                        <input type="hidden" id="cmd<?php echo $ts_id; ?>" name="cmd" value="_xclick">
                                                        <input type="hidden" id="no_note<?php echo $ts_id; ?>" name="item_name" value="<?php echo $title; ?>">
                                                        <input type="hidden" id="currency_code<?php echo $ts_id; ?>" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
                                                        <input type="hidden" id="return<?php echo $ts_id; ?>" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                                                        <input type="hidden" id="cancel_return<?php echo $ts_id; ?>" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                                                        <!--begin::Icon-->
                                                        <?php
                                                        if ($payment_status == '' && $sd_id == '') { ?>
                                                            <button style="display: <?php echo ($payment_status) ? ('none') : ('block') ?>;" onclick="subscribe_now('<?php echo $ts_id ?>','<?php echo $session_id; ?>','<?php echo $price; ?>','<?php echo $price_amt; ?>','<?php echo $c_mobilenumber; ?>')" class="btn btn-sm btn-primary" id="btn_clk_<?php echo $ts_id ?>"><?php echo ($price == '2') ? ('Send Request') : ('Subscribe'); ?></button><br>
                                                        <?php  } else if ($payment_status == 'not paid'  && $sd_id != '') { ?>
                                                            <button style="display: <?php echo ($payment_status == 'Completed') ? ('none') : ('block') ?>;" onclick="subscribe_now('<?php echo $ts_id ?>','<?php echo $session_id; ?>','<?php echo $price; ?>','<?php echo $price_amt; ?>','<?php echo $c_mobilenumber; ?>')" class="btn btn-sm btn-warning" id="btn_clk_<?php echo $ts_id ?>"><?php echo ($payment_status == 'not paid') ? ('Pay Now') : ($service_process_status) ?></button><br>
                                                        <?php  } ?>
                                                        <button style="display:<?php if ($payment_status != 'not paid' && $sd_id != '') {
                                                                                    echo "block";
                                                                                } else {
                                                                                    echo "none";
                                                                                } ?>" id="btn_clk_txt_<?php echo $ts_id ?>" class="btn btn-outline-success text-capitalize"><?php echo ($service_status == 'requested') ? ('Your request sent.We will connect you soon') : ($service_process_status) ?></button>
                                                        <!--end::Icon-->
                                                    <?php } ?>
                                                </div>
                                                <!--end::Icons-->
                                            </div>
                                            <!--end::Post content-->
                                        <?php
                                            $k++;
                                        }
                                    } else { ?>
                                        <span class="d-flex justify-content-center flex-column text-center mt-15 fw-bolder text-muted fs-5 ps-1">Upcoming Soon</span>
                                    <?php } ?>
                                </div>
                                <!--end::Content-->
                                <!--begin::Sidebar-->
                                <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                                    <!--begin::Catigories-->
                                    <div class="mb-16">
                                        <h4 class="text-black mb-7">Subscribed List</h4>
                                        <?php
                                        if ($_SESSION['ugroup'] == '1') {
                                            $sql4 = "SELECT COUNT(`sd`.`id`) AS `tot_sbscribe`,`sd`.`id` as `sd_details`,`ts`.`id`, `ts`.`title`,`ts`.`tba_service_type`,`ts`.`url`,`sd`.`service_status`,`sd`.`payment_status` FROM `tba_services` `ts` LEFT JOIN `subscribers_details` `sd` ON `sd`.`tba_service_id`=`ts`.`id` WHERE `ts`.`is_active` = '0' AND `ts`.`tba_service_type`='$tba_type_id' GROUP BY `ts`.`id`";
                                        } else {
                                            $sql4 = "SELECT `sd`.`id` as `sd_details`,`ts`.`id`, `ts`.`title`,`ts`.`tba_service_type`,`ts`.`url`,`sd`.`service_status`,`sd`.`payment_status` FROM `tba_services` `ts` LEFT JOIN `subscribers_details` `sd` ON `sd`.`tba_service_id`=`ts`.`id` AND `sd`.`client_id`='$session_id' WHERE `ts`.`is_active` = '0' AND `ts`.`tba_service_type`='$tba_type_id'";
                                        }
                                        $result4 = mysqli_query($conn, $sql4);
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                        ?>
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                                                <!--begin::Text-->
                                                <a href="<?php echo $row4['url'] ?>" class="text-muted text-hover-primary pe-2 text_limit_span"><?php echo $row4['title'] ?></a>
                                                <!--end::Text-->
                                                <?php if ($_SESSION['ugroup'] == '2') { ?>
                                                    <!--begin::Number-->
                                                    <div class="m-0">
                                                        <!--begin::Badges-->
                                                        <div class="badge text-capitalize <?php echo ($row4['payment_status']=='Completed') ? ('badge-light-success') : ('badge-light-danger'); ?>"><?php echo ($row4['payment_status']) ? ($row4['payment_status']) : ('Not Subscribed'); ?></div>
                                                        <!--end::Badges-->
                                                    </div>
                                                    <!--end::Number-->
                                                <?php } else { ?>
                                                    <!--begin::Badges-->
                                                    <div class="badge <?php echo ($row4['tot_sbscribe'] > 0) ? ('badge-light-success') : ('badge-light-danger'); ?>"><?php echo ($row4['tot_sbscribe']) ? ($row4['tot_sbscribe']) : ('0'); ?></div>
                                                    <!--end::Badges-->
                                                <?php } ?>
                                            </div>
                                            <!--end::Item-->
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!--end::Catigories-->
                                </div>
                                <!--end::Sidebar-->
                            </div>
                            <!--end::Layout-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Post card-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Activities drawer-->
<?php } ?>