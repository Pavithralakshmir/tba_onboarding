 <!--begin::Footer-->
 <div class="footer py-4 d-flex flex-lg-column" id="kt_footer" style="background: unset;">
     <!--begin::Container-->
     <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
             <!--begin::Menu-->
         <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
             <?php if ($ugroup == '2') { ?>
                 <div id="chat-circle" class="btn btn-raised">
                     <div id="chat-overlay"></div>
                     <i class="material-icons" style="font-size: 2rem;color: white;margin: -9px -9px 0px;">comment</i>
                 </div>
                 <div class="chat-box">
                     <div class="chat-box-header">
                         Ask Me Anything
                         <span class="chat-box-toggle"><i class="material-icons">close</i></span>
                     </div>
                     <div class="chat-box-body">
                         <div class="chat-box-overlay">
                         </div>
                         <div class="chat-logs">
                             <div id="cm-msg" class="chat-msg user">
                                 <span class="msg-avatar">
                                     <img src="assets/media/avatars/avatar-1.png">
                                 </span>
                                 <div class="cm-msg-text">Got any questions? I'm happy to help.</div>
                             </div>
                             <?php
                                while ($data4 = mysqli_fetch_assoc($de4)) {
                                    $sender_msg = $data4['sender_msg'];
                                    $replay_msg = $data4['replay_msg'];
                                ?>
                                     <div id="cm-msg-1" class="chat-msg <?php echo ($sender_msg) ? ("self") : (""); ?>">
                                         <span class="msg-avatar"><img src="<?php echo ($sender_msg) ? ("assets/media/avatars/avatar-1.png") : (""); ?>"> </span>
                                         <div class="cm-msg-text"><?php echo ($sender_msg != '') ? ($sender_msg) : (''); ?> </div>
                                     </div>
                                     <div id="cm-msg-1" class="chat-msg <?php echo ($replay_msg) ? ("user") : (""); ?>">
                                         <span class="msg-avatar"><img src="<?php echo ($replay_msg) ? ("assets/media/avatars/avatar-1.png") : (""); ?>"> </span>
                                         <div class="cm-msg-text"><?php echo ($replay_msg != '') ? ($replay_msg) : (''); ?> </div>
                                     </div>
                             <?php 
                                } ?>
                         </div>
                     </div>
                     <div class="chat-input">
                         <form>
                             <input type="text" id="chat-input" placeholder="Send a message..." />
                             <button type="submit" class="chat-submit" id="chat-submit"><i class="material-icons">send</i></button>
                         </form>
                     </div>
                 </div>
             <?php } ?>
         </ul>
         <!--end::Menu-->
     </div>
     <!--end::Container-->
 </div>
 <!--end::Footer-->

 <!--begin::livechat-->

 <!--end::livechat-->


 <!--begin::Scrolltop-->
 <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
     <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
     <span class="svg-icon">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
             <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
             <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
         </svg>
     </span>
     <!--end::Svg Icon-->
 </div>
 <!--end::Scrolltop-->