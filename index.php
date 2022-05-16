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
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/metronic8/demo1/assets/media/illustrations/sketchy-1/14.png">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<a class="mb-12">
					<img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
				</a>
				<!--end::Logo-->
				<!--begin::Wrapper-->
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto" style="border-style: groove;">
					<!--begin::Form-->
					<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
						<!--begin::Heading-->
						<div class="text-center mb-10">
							<!--begin::Title-->
							<h1 class="text-dark mb-3">Sign In to TBA onboard</h1>
							<!--end::Title-->
							<!--begin::Link-->
							<div class="text-gray-400 fw-bold fs-4">New Here?
								<a href="addusers.php" class="link-primary fw-bolder">Create an Account</a>
							</div>
							<!--end::Link-->
						</div>
						<!--begin::Heading-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="form-label fs-6 fw-bolder text-dark">Email</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-lg form-control-solid" type="text" name="email" id="email" autocomplete="off" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack mb-2">
								<!--begin::Label-->
								<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
								<!--end::Label-->
								<!--begin::Link-->
								<a href="passwordreset.php" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
								<!--end::Link-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Input-->
							<input class="form-control form-control-lg form-control-solid" type="password" name="password" id="pwd" autocomplete="off" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Actions-->
						<div class="text-center">
							<!--begin::Submit button-->
							<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
								<span class="indicator-label">Continue</span>
								<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<!--end::Submit button-->
							<!--begin::Separator-->
							<div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
							<!--end::Separator-->
							<!--begin::Google link-->
							<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
								<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a>
							<!--end::Google link-->
							<!--begin::Google link-->
							<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
								<img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continue with Facebook</a>
							<!--end::Google link-->
							<!--begin::Google link-->
							<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
								<img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Continue with Apple</a>
							<!--end::Google link-->
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
			<?php include_once ('includes/footer.php'); ?>
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
	<!--end::Root-->
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
					window.location='dashboard.php';
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