<!--begin::Modal - Upload File-->
<div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form mb-1" role="form" method="POST" enctype="multipart/form-data" id="kt_modal_upload_form">
                <input id="user_session_id" type="hidden" value="<?php echo $session_id ?>" />
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder m-auto">Sign Here</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body pt-10 pb-15 px-lg-7">
                    <!--begin::Row-->
                    <div class="row mb-15 signRow" id="signRow1">
                        <!--begin::Col-->
                        <div class="col-xl-8">
                            <img src="<?php echo ($user_details->dg_sign_1) ? $user_details->dg_sign_1 : ""; ?>" id="exsiting_sign1">
                            <canvas id="" width="400" height="150" class="newsign" style="display:<?php echo ($user_details->dg_sign_1) ? "none" : ""; ?>"></canvas>
                            <textarea style="display:none;" name="sign1" class="form-control form-control-solid sig-dataUrl" id="" rows="5"><?php echo $user_details->dg_sign_1; ?></textarea>
                            <img id="" style="display:none; background-color: aliceblue;" class="sig-image" src="" alt="Your signature will go here!" />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <div class="d-block justify-content-end py-0 px-0 m-auto">
                                <button type="button" class="btn btn-outline-info btn-active-info py-1 sig-submitBtn" id="" name="document_1_sign_save" style="display:<?php echo ($user_details->dg_sign_1) ? "none" : ""; ?>">Save</button>
                                <button type="button" class="btn btn-outline-warning btn-active-warning py-1" id="editbtn1" name="document_1_sign_edit" style="display:<?php echo ($user_details->dg_sign_1) ? "" : "none"; ?>">Edit</button>
                                <button type="button" class="btn btn-outline-danger btn-active-danger py-1 mt-1 me-2 sig-clearBtn" id="" style="display:<?php echo ($user_details->dg_sign_1) ? "none" : ""; ?>">Clear</button>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-4 mb-15">
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <div class="image-input image-input-outline d-inline">
                                <label class="btn btn-primary rounded-pill p-2 w-150px" data-kt-image-input-action="change">
                                    Choose File
                                    <!--begin::Inputs-->
                                    <input type="file" name="imag" accept=".png, .jpg, .jpeg" id="imag" class="input-img" />
                                    <input type="hidden" name="sign_1_remove" />
                                    <!--end::Inputs-->
                                </label>
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-8">
                            <!--begin::Col-->
                            <div class="d-flex align-items-center">
                                <!--begin::file input-->
                                <input type="hidden" value="<?php echo ($user_details->up_img_sign_1) ? $user_details->up_img_sign_1 : ""; ?>" id="preview_img_d">
                                <img id="ImgPreview" src="<?php echo ($user_details->up_img_sign_1) ? $user_details->up_img_sign_1 : ""; ?>" class="preview1" style="<?php echo ($user_details->up_img_sign_1) ? "width:15%" : ""; ?>;" />
                                <button type="button" class="btn btn-sm btn-icon btn-active-color-danger m-auto btn-rmv1" id="removeImage1" style="<?php echo ($user_details->up_img_sign_1) ? "display:inline" : "display:none"; ?>;">
                                    <img src="assets/media/icons/delete_icon_1.png" class="btn-rmv1" style="<?php echo ($user_details->up_img_sign_1) ? "display:inline" : ""; ?>;">
                                </button>
                                <!--begin::file input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row mb-4">
                        <div class="d-flex justify-content-center py-0 px-0">
                            <button type="submit" class="btn btn-primary rounded-pill" id="kyc_sign_submit_button" name="kyc_sign_submit">Submit</button>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Modal body-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - Upload File-->