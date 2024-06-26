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
							<span class="breadcrumb-item active">Forgot Password</span>
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
							<h2 class="title__line--6">Forgot Password</h2>
						</div>
					</div>
					<div class="col-xs-12">
						<form id="login-form" method="post">
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
								</div>
								<span class="field_error" id="email_error"></span>
							</div>
							
							<div class="contact-btn">
								<button type="button" onclick="forgot_password()" class="fv-btn" id="btn_submit">Submit</button>
							</div>
						</form>
						<div class="form-output login_msg">
							<p class="form-messege field_error"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
<!-- End Contact Area -->
<!-- End Banner Area -->
<!-- Start Footer Area -->

<?php include_once("./footer-inc.php") ?>