<?php
include_once("./inc/connection.inc.php");
include_once("./inc/function.inc.php");
include_once("./top-inc.php");
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?PHP
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
                            <span class="breadcrumb-item active">Profile</span>
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
                            <h2 class="title__line--6">Profile</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <form id="login-form" method="post">
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="name" id="name" placeholder="Your Name*" value="<?php echo $_SESSION['USER_NAME'] ?>" style="width:100%">
                                </div>
                                <span class="field_error" id="name_error"></span>
                            </div>

                            <div class="contact-btn">
                                <button type="button" onclick="update_profile()" class="fv-btn" id="btn_submit">Update</button>
                            </div>
                        </form>
                        <div class="form-output login_msg">
                            <p class="form-messege field_error"></p>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="contact-title">
                            <h2 class="title__line--6">Chenge Password</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <form method="post" id="frmPassword">
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="password" name="current_password" id="current_password" placeholder="Your Current Password*" style="width:100%">
                                </div>
                                <span class="field_error" id="current_password_error"></span>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="password" name="new_password" id="new_password" placeholder="Your New Password*" style="width:100%">
                                </div>
                                <span class="field_error" id="new_password_error"></span>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="password" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm New Password*" style="width:100%">
                                </div>
                                <span class="field_error" id="confirm_new_password_error"></span>
                            </div>

                            <div class="contact-btn">
                                <button type="button" onclick="update_password()" class="fv-btn" id="btn_update_password">Update</button>
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