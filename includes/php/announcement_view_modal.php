<!--begin::Modal - View Users-->
<div class="modal fade" id="kt_modal_view_users<?php echo $announcement_no; ?>" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Heading-->
                <div class="text-center mb-13">
                    <!--begin::Title-->
                    <h1 class="mb-3"><?php echo $title; ?></h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-bold fs-5"><?php echo $remark; ?>.</div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                <!--begin::Users-->
                <div class="mb-15">
                    <!--begin::List-->
                    <?php echo $description; ?>
                    <!--end::List-->
                </div>
                <!--end::Users-->
                <!--begin::Notice-->
                <div class="d-flex justify-content-between">
                    <!--begin::Label-->
                    <div class="text-center">
                        <a href="add_a_announcement.php?<?php echo $action_string . '=' . $edit_string . '&' . $id_string . '=' . $id; ?>" class="btn btn-sm btn-info">Edit</a>
                        <?php
                        if ($is_active == '1') {
                        ?>
                            <a href="add_a_announcement.php?<?php echo $action_string . '=' . $deactive_string . '&' . $id_string . '=' . $id; ?>" class="btn btn-sm btn-success">Active</a>
                        <?php } else { ?>
                            <a href="add_a_announcement.php?<?php echo $action_string . '=' . $active_string . '&' . $id_string . '=' . $id; ?>" class="btn btn-sm btn-warning">Inctive</a>
                        <?php }
                        if ($is_delete == '0') { ?>
                            <a onclick="deletion('<?php echo $action_string . '=' . $delete_string . '&' . $id_string . '=' . $id; ?>')" class="btn btn-sm btn-danger">Delete</a>
                        <?php } ?>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Notice-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - View Users-->