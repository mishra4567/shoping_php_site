<?php
include_once("./inc/connection.inc.php");
include_once("./inc/function.inc.php");
include_once("./top-inc.php");
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == 'yes') {
?>
	<script>
		window.location.href = 'index.php';
	</script>
<?php
}
?>
<!-- End Offset Wrapper -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
	<div class="ht__bradcaump__wrap">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bradcaump__inner">
						<nav class="bradcaump-inner">
							<a class="breadcrumb-item" href="index.php">Home</a>
							<span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
							<span class="breadcrumb-item active">Login/Register</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="contact-form-wrap mt--60">
					<div class="col-xs-12">
						<div class="contact-title">
							<h2 class="title__line--6">Login</h2>
						</div>
					</div>
					<div class="col-xs-12">
						<form id="login-form" method="post">
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
								</div>
								<span class="field_error" id="login_email_error"></span>
							</div>
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
								</div>
								<span class="field_error" id="login_password_error"></span>
							</div>

							<div class="contact-btn">
								<button type="button" onclick="user_login()" class="fv-btn">Login</button>
							</div>
						</form>
						<div class="form-output login_msg">
							<p class="form-messege field_error"></p>
						</div>
					</div>
				</div>

			</div>


			<div class="col-md-6">
				<div class="contact-form-wrap mt--60">
					<div class="col-xs-12">
						<div class="contact-title">
							<h2 class="title__line--6">Register</h2>
						</div>
					</div>
					<div class="col-xs-12">
						<form id="register-form" method="post">
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
								</div>
								<span class="field_error" id="name_error"></span>
							</div>
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="text" name="email" id="email" placeholder="Your Email*" style="width:45%">
                                    <button type="button" class="fv-btn height_60px email_sent_otp" onclick="email_sent_otp()">Send otp</button>
									
									<input type="text" class="email_verify_otp" id="email_otp" placeholder="OTP*" style="width:45%">
									<button type="button" class="fv-btn height_60px email_verify_otp" onclick="email_verify_otp()">Verify otp</button>
								
                                    <span id="email_otp_result"></span>
								</div>
								<span class="field_error" id="email_error"></span>
							</div>
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="text" name="mobail" id="mobail" placeholder="Your Mobile*" style="width:50%">

									<button type="button" class="fv-btn height_60px mobail_sent_otp" onclick="mobail_sent_otp()">Send otp</button>
									
									<input type="text" class="mobail_verify_otp" id="mobail_otp" placeholder="OTP*" style="width:50%">
									<button type="button" class="fv-btn height_60px mobail_verify_otp" onclick="mobail_verify_otp()">Verify otp</button>
								
                                    <span id="mobail_otp_result"></span>
									</div>
								<span class="field_error" id="mobail_error"></span>
							</div>
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
								</div>
								<span class="field_error" id="password_error"></span>
							</div>

							<div class="contact-btn">
								<button type="button" class="fv-btn" id="btn_register" onclick="user_register()" disabled>Register</button>
							</div>
						</form>
						<div class="form-output register_msg">
							<p class="form-messege field_error"></p>
						</div>
					</div>
				</div>

			</div>

		</div>
</section>
<input class="is_verified" type="textbox" name="" id="is_email_verified">
<input class="is_verified" type="textbox" name="" id="is_mobail_verified">
<!-- End Contact Area -->
<!-- End Banner Area -->
<!-- Start Footer Area -->

<?php include_once("./footer-inc.php") ?>