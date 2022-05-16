<?php

if (isset($_POST['r_id'])) {
    $r_id = $_POST['r_id'];
    $nxt_r_id = $r_id + 1;
    if($nxt_r_id == '3'){
        $service_process_status ="Approved";
    }elseif($nxt_r_id == '4'){
        $service_process_status ="Assigned";
    }elseif($nxt_r_id == '5'){
        $service_process_status ="Processing";
    }elseif($nxt_r_id == '6'){
        $service_process_status ="Deployed";
    }elseif($nxt_r_id == '7'){
        $service_process_status ="Under Reviewed";
    }else{
        $service_process_status ="Cloesd";
    }
    $c_id = $_POST['c_id'];
    $sd_id = $_POST['sd_id'];
    $approved_by = $user_details->name;
    $approved_date = $datetime;
    if ($r_id == '1' || $r_id == '2') {
        $sql = "UPDATE `subscribers_details` SET `service_approved_by`='$approved_by',`service_process_status`='$service_process_status',`service_approved_date`='$approved_date',`is_request`='3' WHERE `id`='$sd_id'";
    } else {
        $sql = "UPDATE `subscribers_details` SET `is_request`='$nxt_r_id',`service_process_status`='$service_process_status' WHERE `id`='$sd_id'";
    }
    $res1 = mysqli_query($conn, $sql);
    exit;
}

if (isset($_POST['filter_date'])) {
    $sd_status = $_POST['sd_status'];
    $filter_date = $_POST['filter_date'];
    $filter_date = explode('-', $filter_date);
    $startdate = date("Y-m-d", strtotime($filter_date[0]));
    $enddate = date("Y-m-d", strtotime($filter_date[1]));
    if ($file_name == 'requested_services') {
        $dateselect = "AND Date(`sd`.`requested_date`) BETWEEN '$startdate' AND '$enddate' ";
        $sd_status = ($sd_status > 0) ? ("AND `sd`.`is_request`=" . $sd_status) : ("AND 1");
    } else if ($file_name == 'subscribed_service') {
        $dateselect = "AND Date(`sd`.`subscribed_date`) BETWEEN '$startdate' AND '$enddate' ";
        $sd_status = ($sd_status > 0) ? ("AND `sd`.`is_request`=" . $sd_status) : ("AND 1");
    } else {
        $dateselect = "1";
        $sd_status =  "1";
    }
    $sql_1 = "SELECT `sd`.`client_id`,`ts`.`id` as `ts_id`,`ts`.`tba_service_category`,`ts`.`tba_service_type`,`ts`.`url`,`ts`.`title`,`sd`.`id` as `sd_id`,`sd`.`service_status`,`sd`.`requested_date`,`sd`.`is_request`,`sd`.`service_process_status` FROM `tba_services` `ts`JOIN `subscribers_details` `sd` ON `ts`.`id` = `sd`.`tba_service_id` WHERE `ts`.`is_active`='0'  $sd_status $dateselect";
    $result_1 = mysqli_query($conn, $sql_1);
    if (mysqli_num_rows($result_1)) {
?>
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="p-0 w-15px">S.No</th>
                        <th class="p-0 min-w-50px text-center">Action</th>
                        <th class="p-0 w-100px">Client Name / Id</th>
                        <th class="p-0 w-15px text-center">Service id</th>
                        <th class="p-0 min-w-50px text-center">Category / Type</th>
                        <th class="p-0 min-w-250px text-center" style="width: unset;">Title</th>
                        <th class="p-0 min-w-25px text-center">Requested Date</th>
                        <th class="p-0 min-w-25px text-center">Status</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                    <?php
                    $i = 1;
                    while ($row_1 = mysqli_fetch_assoc($result_1)) {
                        $req_date = $row_1['requested_date'];
                        $is_request = $row_1['is_request'];
                    ?>
                        <tr id="<?php echo $row_1['ts_id']; ?>">
                            <td class="priority">
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <button class="btn <?php echo ($is_request == '8') ? ('text-success') : ('btn-success') ?> p-2" <?php if($is_request != '8'){ echo 'onclick="chanage_sd_status('.$row_1['sd_id'].','.$row_1['client_id'].','.$is_request.');"';} ?>>
                                    <?php if (($is_request == '2') || ($is_request == '1')) {
                                        echo "To be Approve";
                                    } else if ($is_request == '3') {
                                        echo "To be Assign";
                                    } else if ($is_request == '4') {
                                        echo "To be Progress";
                                    } else if ($is_request == '5') {
                                        echo "To be Deployed";
                                    } else if ($is_request == '6') {
                                        echo "To be Under Review";
                                    } else if ($is_request == '7') {
                                        echo "To be Close";
                                    }else{
                                        echo "closed";
                                    }
                                    ?>
                                </button>
                            </td>
                            <td><?php echo $row_1['client_id'] . " /<br> " . $users_name[$row_1['client_id']]; ?></td>
                            <td><?php echo $row_1['ts_id']; ?></td>
                            <td><?php echo $category_name[$row_1['tba_service_category']] . " /<br>" . $type_name[$row_1['tba_service_type']]; ?></td>
                            <td><?php echo $row_1['title']; ?></td>
                            <td><?php echo date("d-m-Y H:i:s", strtotime($req_date)); ?></td>
                            <td class="text-capitalize">
                                <div class="badge <?php echo ($row_1['service_process_status']) ? ('badge-light-success') : ('badge-light-danger'); ?>">
                                    <?php echo ($row_1['service_process_status']) ? ($row_1['service_process_status']) : ($row_1['service_status']); ?>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    } ?>
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
    <?php
    } else { ?>
        <span class="fw-bolder mb-2 text-dark">No Data</span>
<?php }
    exit;
}
