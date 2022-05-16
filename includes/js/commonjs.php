<script>
    "use strict";
    var KTCareersApply = (function() {
        var t, e, i;
        return {
            init: function() {
                (i = document.querySelector("#add_new_client")),
                (t = document.getElementById("add_new_client_submit_button")),
                $(i.querySelector('[name="dob"]')).flatpickr({
                        enableTime: !1,
                        dateFormat: "d, M Y"
                    }),
                    (e = FormValidation.formValidation(i, {
                        fields: {
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: "Name is required"
                                    }
                                }
                            },
                            gender: {
                                validators: {
                                    notEmpty: {
                                        message: "Gender is required"
                                    }
                                }
                            },
                            mobile1: {
                                validators: {
                                    notEmpty: {
                                        message: "Mobile No is required"
                                    }
                                }
                            },
                            pemail: {
                                validators: {
                                    notEmpty: {
                                        message: "Email address is required"
                                    },
                                    emailAddress: {
                                        message: "The value is not a valid email address"
                                    }
                                }
                            },
                            address1: {
                                validators: {
                                    notEmpty: {
                                        message: "Address is required"
                                    }
                                }
                            },
                            address2: {
                                validators: {
                                    notEmpty: {
                                        message: "Permanent  Address is required"
                                    }
                                }
                            },
                            uname: {
                                validators: {
                                    notEmpty: {
                                        message: "User name required"
                                    }
                                }
                            },
                            pwd: {
                                validators: {
                                    notEmpty: {
                                        message: "Password required"
                                    }
                                }
                            },
                            dob: {
                                validators: {
                                    notEmpty: {
                                        message: "DOB is required"
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
                                        addnewclient()
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


    function addnewclient() {
        var inst = $('#inst').prop('files')[0];
        var name = $("#name").val();
        var gender = $('input[name=gender]:checked').val();
        var dob = $("#dob").val();
        var mobile1 = $("#mobile1").val();
        var mobile2 = $("#mobile2").val();
        var pemail = $("#pemail").val();
        var address1 = $("#address1").val();
        var address2 = $("#address2").val();
        var uname = $("#uname").val();
        var pwd = $("#pwd").val();
        var form_data = new FormData();
        form_data.append('file', document.getElementById("inst").files[0]);
        form_data.append('name', name);
        form_data.append('gender', gender);
        form_data.append('dob', dob);
        form_data.append('mobile1', mobile1);
        form_data.append('mobile2', mobile2);
        form_data.append('pemail', pemail);
        form_data.append('address1', address1);
        form_data.append('address2', address2);
        form_data.append('uname', uname);
        form_data.append('pwd', pwd);
        $.ajax({
            type: "post",
            url: "addusers.php",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                // console.log(response);
                window.location = 'index.php';
            },
            error: function() {
                alert('Error occurs!');
            }
        });
    }











    $(function() {
        var INDEX = 0;
        $("#chat-submit").click(function(e) {
            e.preventDefault();
            var msg = $("#chat-input").val();
            var sender_id = $("#user_id").text();
            if (msg.trim() == '') {
                return false;
            }

            $.ajax({
                type: "post",
                data: {
                    sender_msg: msg,
                    sender_id: sender_id
                },
                success: function(response) {
                    console.log(response);
                    generate_message(msg, 'self');
                    // window.location = 'add_tba_service_category.php';
                },
                error: function() {
                    alert('Error occurs!');
                }
            });


            var buttons = [{
                    name: 'Existing User',
                    value: 'existing'
                },
                {
                    name: 'New User',
                    value: 'new'
                }
            ];
            setTimeout(function() {
                generate_message(msg, 'user');
            }, 1000)

        })

        function generate_button_message(msg, buttons) {
            /* Buttons should be object array 
              [
                {
                  name: 'Existing User',
                  value: 'existing'
                },
                {
                  name: 'New User',
                  value: 'new'
                }
              ]
            */
            INDEX++;
            var btn_obj = buttons.map(function(button) {
                return "              <li class=\"button\"><a href=\"javascript:;\" class=\"btn btn-primary chat-btn\" chat-value=\"" + button.value + "\">" + button.name + "<\/a><\/li>";
            }).join('');
            var str = "";
            str += "<div id='cm-msg-" + INDEX + "' class=\"chat-msg user\">";
            str += "          <span class=\"msg-avatar\">";
            str += "            <img src=\"assets\/media\/avatars\/avatar-1.jpg\">";
            str += "          <\/span>";
            str += "          <div class=\"cm-msg-text\">";
            str += msg;
            str += "          <\/div>";
            str += "          <div class=\"cm-msg-button\">";
            str += "            <ul>";
            str += btn_obj;
            str += "            <\/ul>";
            str += "          <\/div>";
            str += "        <\/div>";
            $(".chat-logs").append(str);
            $("#cm-msg-" + INDEX).hide().fadeIn(300);
            $(".chat-logs").stop().animate({
                scrollTop: $(".chat-logs")[0].scrollHeight
            }, 1000);
            $("#chat-input").attr("disabled", true);
        }

        $(document).delegate(".chat-btn", "click", function() {
            var value = $(this).attr("chat-value");
            var name = $(this).html();
            $("#chat-input").attr("disabled", false);
            generate_message(name, 'self');
        })

        $("#chat-circle").click(function() {
            $("#chat-circle").toggle('scale');
            $(".chat-box").toggle('scale');
        })

        $(".chat-box-toggle").click(function() {
            $("#chat-circle").toggle('scale');
            $(".chat-box").toggle('scale');
        })

    })
</script>