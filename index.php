<?php
include_once 'includes/db.php';
$ugroup = '';
if (isset($_POST['email'])) {
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$pwd = $_POST['pwd'];
	$cdate = date('Y-m-d H:i:s');

	$sql = "select * from `users` where BINARY(`pemail`)=BINARY(trim('$email')) AND BINARY(`password`)=BINARY(trim('$pwd'))";
	$result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($sql));
	$num = mysqli_num_rows($result);
	if ($num) {
		while ($row = mysqli_fetch_assoc($result)) {
			$role = $row['role'];
			$teams = $row['team'];
			$session_id = $row['id'];
			$ses_name = $row['username'];
			$ugroup = $row['ugroup'];
		}
		$sql1 = "SELECT  ug.id,ug.ugroup, u.name, u.modify_per,ug.name,ug.designation FROM `users` ug CROSS JOIN `usergroup` u ON ug.ugroup = u.id where u.id='$ugroup' and ug.id=$session_id and ug.role='$role' ";

		$query = mysqli_query($conn, $sql1);
		while ($data = mysqli_fetch_assoc($query)) {
			$ses_designation = $data['designation'];
			$ses_name = $data['name'];
			$ugroup = $data['ugroup'];
		}
		$apps1 = explode(",", $teams);
		$applist = array_map(function ($piece) {
			return (string) $piece;
		}, $apps1);
		$roles1 = explode(",", $role);
		$rolelist = array_map(function ($piece) {
			return (string) $piece;
		}, $roles1);
		session_start();
		$_SESSION['ugroup'] = $ugroup;
		$_SESSION['id'] = $session_id;
		$_SESSION['email'] = $email;
		$_SESSION['role'] = $role;
		$_SESSION['team'] = $teams;
		$_SESSION['name'] = $ses_name;
		$_SESSION['designation'] = $ses_designation;
		$_SESSION['applist'] = $applist;
		$_SESSION['rolelist'] = $rolelist;
		$sql = "INSERT INTO `access_report`(`uname`, `pass`, `page`, `date_time`, `ip`, `success`) VALUES ('$email','$pwd', 'tba_onboard_admin', '$cdate', '$_SERVER[REMOTE_ADDR]', 'YES')";
		$result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error());
		$error = 0;
		echo $error;
		// header("Location: dashboard.php");
	} else {
		$sql = "INSERT INTO `access_report`(`uname`, `pass`, `page`, `date_time`, `ip`, `success`) VALUES ('$email','$pwd', 'tba_onboard_admin', '$cdate', '$_SERVER[REMOTE_ADDR]', 'NO')";
		$result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error());
		$error = 1;
		echo $error;
		// header("Location: index.php");
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
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Post-->
		<div class="post d-flex flex-column-fluid" id="kt_post">
			<!--begin::Container-->
			<div id="kt_content_container" class="container-xxl">
				<!--begin::Card-->
				<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
					<div class="row text-center">
						<div class="col-md-6 login_ui p-10 d-md-block d-none">
							<img src="assets/media/icons/bg_img/login_bg_1.png" class="m-auto text-center">
						</div>
						<div class="col-md-6 card">
							<div class="row">
								<div class="image-input-wrapper w-250px h-50px text-end m-5" style="background-image: url(assets/media/icons/bg_img/login_logo_bg_3.png)"></div>
								<div class="text-center">
									<img src="assets/media/icons/bg_img/login_bg_2.png" class="h-200px" style="width: inherit;">
								</div>
							</div>
							<div class="p-10">
								<!--begin::Label-->
								<label class="row form-label fs-6 fw-bolder text-black">User Name</label>
								<!--end::Label-->
								<input type="text" class="fv-row profile_form_control mb-8" name="email" id="email" value="" />
								<!--begin::Label-->
								<label class="row form-label fs-6 fw-bolder text-black">Password</label>
								<!--end::Label-->
								<input type="password" class="fv-row profile_form_control mb-8" name="password" id="pwd" value="" />
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack mb-2">
									<!--begin::Label-->
									<div class="form-check form-check-sm form-check-custom form-check-solid">
										<input class="form-check-input me-2" type="checkbox" value="1">
										<label class="form-label text-gray fs-6 mb-0">Remember</label>
									</div>
									<!--end::Label-->
									<!--begin::Link-->
									<a href="passwordreset.php" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<div class="text-center m-5">
									<!--begin::Submit button-->
									<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-info w-150px mb-5" style="background-color: #4A51AF;">
										<span class="indicator-label">Login</span>
										<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
									<!--end::Submit button-->
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!--end::Card-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
	</div>
	<!--end::Content-->
</body>
<script>
	"use strict";
	var KTSigninGeneral = (function() {
		var t, e, i;
		return {
			init: function() {
				(t = document.querySelector("#kt_sign_in_form")),
				(e = document.querySelector("#kt_sign_in_submit")),
				(i = FormValidation.formValidation(t, {
					fields: {
						email: {
							validators: {
								notEmpty: {
									message: "Email address is required"
								},
								emailAddress: {
									message: "The value is not a valid email address"
								}
							}
						},
						password: {
							validators: {
								notEmpty: {
									message: "The password is required"
								}
							}
						},
					},
					plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						bootstrap: new FormValidation.plugins.Bootstrap5({
							rowSelector: ".fv-row"
						})
					},
				})),
				e.addEventListener("click", function(n) {
					n.preventDefault(),
						i.validate().then(function(i) {
							"Valid" == i
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
								});
						});
				});
			},
		};
	})();
	KTUtil.onDOMContentLoaded(function() {
		KTSigninGeneral.init();
	});

	function myFunction() {
		var email = $("#email").val();
		var pwd = $("#pwd").val();
		$.ajax({
			type: "post",
			url: "index.php",
			data: {
				email: email,
				pwd: pwd
			},
			success: function(response) {
				console.log(response);
				if (response != '1') {
					window.location = 'dashboard.php';
				} else {
					Swal.fire({
						text: "Invalid Username and Password, please enter valid Username and Password.",
						icon: "error",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						},
					});
				}
			},
			error: function() {
				alert('Error occurs!');
			}
		});
	}
</script>

</html>