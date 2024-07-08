function user_register() {
    jQuery('.field_error').html('');
    var name = jQuery("#name").val();
    var email = jQuery("#email").val();
    var mobail = jQuery("#mobail").val();
    var password = jQuery("#password").val();
    var is_error = '';
    if (name == "") {
        jQuery('#name_error').html('Please enter name');
        is_error = 'Yes';
        // alert ('Please enter name');
    } else if (email == "") {
        jQuery('#email_error').html('Please enter email');
        is_error = 'Yes';
        // alert ('Please enter email');
    } else if (mobail == "") {
        jQuery('#mobail_error').html('Please enter mobail');
        is_error = 'Yes';
        // alert ('Please enter mobail');
    } else if (password == "") {
        jQuery('#password_error').html('Please enter password');
        is_error = 'Yes';
        // alert ('Please enter password');
    }
    if (is_error == '') {
        jQuery.ajax({
            url: 'register_submit.php',
            type: 'post',
            data: 'name=' + name + '&email=' + email + '&mobail=' + mobail + '&password=' + password,
            success: function (result) {
                result=result.trim();
                if (result == 'present') {
                    jQuery('#email_error').html('Email id already present');
                }
                if (result == 'mobail_present') {
                    jQuery('#mobail_error').html('Mobail number already present');
                }
                if (result == 'ensert') {
                    jQuery('.register_msg p').html('Register Successfull');
                }
            }
        })
    }
}
function user_login() {
    jQuery('.field_error').html('');
    var email = jQuery("#login_email").val();
    var password = jQuery("#login_password").val();
    var is_error = '';
    if (email == "") {
        jQuery('#login_email_error').html('Please enter email');
        is_error = 'Yes';
        // alert ('Please enter email');
    } else if (password == "") {
        jQuery('#login_password_error').html('Please enter password');
        is_error = 'Yes';
        // alert ('Please enter password');
    }
    if (is_error == '') {
        jQuery.ajax({
            url: 'login_submit.php',
            type: 'post',
            data: 'email=' + email + '&password=' + password,
            success: function (result) {
                result=result.trim();
                if (result == 'worng') {
                    jQuery('.login_msg p').html('Enter Valid Login details');
                }
                if (result == 'valid') {
                    window.location.href = window.location.href;
                }
            }
        })
    }
}

function manage_cart(pid, type) {
    if (type == 'update') {
        var qty = jQuery("#" + pid + "qty").val();
    } else {
        var qty = jQuery("#qty").val();
    }
    jQuery.ajax({
        url: 'manage_cart.php',
        type: 'post',
        data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
        success: function (result) {
            result=result.trim();
            if (type == 'update' || type == 'remove') {
                window.location.href = window.location.href;
            }
            if (result == 'not_avaliable') {
                alert('Qty not avaliable');
            } else {
                jQuery('.htc__qua').html(result);
            }
        }
    })
}

function sort_product_drop(cat_id, site_path) {
    var sort_product_id = jQuery('#sort_product_id').val();
    window.location.href = site_path + "categories.php?id=" + cat_id + "&sort=" + sort_product_id;
    // alert (cat_id);
}

function wishlist_manage(pid, type) {
    jQuery.ajax({
        url: 'wishlist_manage.php',
        type: 'post',
        data: 'pid=' + pid + '&type=' + type,
        success: function (result) {
            result=result.trim();
            if (result == 'not_login') {
                window.location.href = 'login.php';
            } else {
                jQuery('.htc__wishlist').html(result)
            }
        }
    })
}
// email verification
function email_sent_otp() {
    jQuery('#email_error').html('');
    var email = jQuery('#email').val();
    if (email == '') {
        jQuery('#email_error').html('Please enter email id');
    } else {
        jQuery('.email_sent_otp').html('Please Wait...');
        jQuery('.email_sent_otp').attr('disabled', true);
        jQuery('.email_sent_otp')
        jQuery.ajax({
            url: 'send_otp.php',
            type: 'post',
            data: 'email=' + email + '&type=email',
            success: function (result) {
                if (result == 'done') {
                    jQuery('#email').attr('disabled', true);
                    jQuery('.email_verify_otp').show();
                    jQuery('.email_sent_otp').hide();
                } else if (result == 'present') {
                    jQuery('.email_sent_otp').html('Send OTP');
                    jQuery('.email_sent_otp').attr('disabled', false);

                    jQuery('#email_error').html('Email id already exist');
                } else {
                    jQuery('.email_sent_otp').html('Send OTP');
                    jQuery('.email_sent_otp').attr('disabled', false);
                    jQuery('#email_error').html('Please try after sometime');
                }
            }
        });

    }
}
function email_verify_otp() {
    jQuery('#email_error').html('');
    var email_otp = jQuery('#email_otp').val();
    if (email_otp == '') {
        jQuery('#email_error').html('Please enter otp');
    } else {
        jQuery.ajax({
            url: 'check_otp.php',
            type: 'post',
            data: 'otp=' + email_otp + '&type=email',
            success: function (result) {
                if (result == 'done') {
                    jQuery('.email_verify_otp').hide();
                    jQuery('#email_otp_result').html('Email id verified')
                    jQuery('#is_email_verified').val('1');
                    if (jQuery('#is_mobail_verified').val() == 1) {
                        jQuery('#btn_register').attr('disabled', false);
                    }
                    // jQuery('#email').attr('disabled', true);
                    // jQuery('.email_verify_otp').show();
                    // jQuery('.email_sent_otp').hide();
                } else {
                    jQuery('#email_error').html('Please enter valid OTP');
                }
            }
        });
        // jQuery('.email_verify_otp').hide();
        // jQuery('#email_otp_result').html('Email id verified')
    }
}

// mobail verification
function mobail_sent_otp() {
    jQuery('#mobail_error').html('');
    var mobail = jQuery('#mobail').val();
    if (mobail == '') {
        jQuery('#mobail_error').html('Please enter mobail number');
    } else {
        jQuery('.mobail_sent_otp').html('Please Wait...');
        jQuery('.mobail_sent_otp').attr('disabled', true);
        jQuery('.mobail_sent_otp')
        jQuery.ajax({
            url: 'send_otp.php',
            type: 'post',
            data: 'mobail=' + mobail + '&type=mobail',
            success: function (result) {
                if (result == 'done') {
                    jQuery('#mobail').attr('disabled', true);
                    jQuery('.mobail_verify_otp').show();
                    jQuery('.mobail_sent_otp').hide();
                } else if (result == 'mobail_present') {
                    jQuery('.mobail_sent_otp').html('Send OTP');
                    jQuery('.mobail_sent_otp').attr('disabled', false);

                    jQuery('#mobail_error').html('mobail number already exist');
                } else {
                    jQuery('.mobail_sent_otp').html('Send OTP');
                    jQuery('.mobail_sent_otp').attr('disabled', false);
                    jQuery('#mobail_error').html('Please try after sometime');
                }
            }
        });

    }
}
function mobail_verify_otp() {
    jQuery('#mobail_error').html('');
    var mobail_otp = jQuery('#mobail_otp').val();
    if (mobail_otp == '') {
        jQuery('#mobail_error').html('Please enter otp');
    } else {
        jQuery.ajax({
            url: 'check_otp.php',
            type: 'post',
            data: 'otp=' + mobail_otp + '&type=mobail',
            success: function (result) {
                if (result == 'done') {
                    jQuery('.mobail_verify_otp').hide();
                    jQuery('#mobail_otp_result').html('mobail number verified')
                    jQuery('#is_mobail_verified').val('1');
                    if (jQuery('#is_email_verified').val() == 1) {
                        jQuery('#btn_register').attr('disabled', false);
                    }
                } else {
                    jQuery('#mobail_error').html('Please enter valid OTP');
                }
            }
        });
    }
}
// forgot password

function forgot_password() {
    jQuery('#email_error').html('');
    var email = jQuery('#email').val();
    if (email == '') {
        jQuery('#email_error').html('Please enter email id');
    } else {
        jQuery('#btn_submit').html('Please wait...');
        jQuery('#btn_submit').attr('disabled', true);
        jQuery.ajax({
            url: 'forgot_password_submit.php',
            type: 'post',
            data: 'email=' + email,
            success: function (result) {
                jQuery('#email').val('');
                jQuery('#email_error').html(result);
                jQuery('#btn_submit').html('Submit');
                jQuery('#btn_submit').attr('disabled', false);
            }
        })
    }
}
// Update Profile
function update_profile() {
    jQuery('.field_error').html('');
    var name = jQuery('#name').val();
    if (name == '') {
        jQuery('#name_error').html('Please enter your name');
    } else {
        jQuery('#btn_submit').html('Please wait...');
        jQuery('#btn_submit').attr('disabled', true);
        jQuery.ajax({
            url: 'update_profile.php',
            type: 'post',
            data: 'name=' + name,
            success: function (result) {
                jQuery('#name_error').html(result);
                jQuery('#btn_submit').html('Update');
                jQuery('#btn_submit').attr('disabled', false);
            }
        })
    }
}
// Update Profile Password
function update_password() {
    jQuery('.field_error').html('');
    var current_password = jQuery('#current_password').val();
    var new_password = jQuery('#new_password').val();
    var confirm_new_password = jQuery('#confirm_new_password').val();
    var is_error = '';

    if (current_password == '') {
        jQuery('#current_password_error').html('Please enter current password');
        is_error = 'yes';
    } if (new_password == '') {
        jQuery('#new_password_error').html('Please enter new password');
        is_error = 'yes';
    } if (confirm_new_password == '') {
        jQuery('#confirm_new_password_error').html('Please enter confirm new password');
        is_error = 'yes';
    }
    if (new_password != '' && confirm_new_password != '' && new_password != confirm_new_password) {
        jQuery('#confirm_new_password_error').html('Please enter same password');
        is_error = 'yes';
    }
    if (is_error == '') {
        jQuery('#btn_update_password').html('Please wait...');
        jQuery('#btn_update_password').attr('disabled', true);
        jQuery.ajax({
            url: 'update_password.php',
            type: 'post',
            data: 'current_password=' + current_password + '&new_password=' + new_password,
            success: function (result) {
                jQuery('#current_password_error').html(result);
                jQuery('#btn_update_password').html('Update');
                jQuery('#btn_update_password').attr('disabled', false);
                jQuery('#frmPassword')[0].reset();
            }
        })
    }
}
//coupon section
function set_coupon(){
    var coupon_str=jQuery('#coupon_str').val();
    // alert(coupon_str);
    if(coupon_str!=''){
        jQuery('#coupon_result').html('');
        jQuery.ajax({
            url:'set_coupon.php',
            type:'post',
            data:'coupon_str='+coupon_str,
            success:function(result){
                var data=jQuery.parseJSON(result);
                // console.log(data.is_error);
                if(data.is_error=='yes'){
                    jQuery('#coupon_box').hide();
                    jQuery('#coupon_result').html(data.dd);
                    jQuery('#order_total_price').html(data.result);
                }
                if(data.is_error=='no'){
                    jQuery('#coupon_box').show();
                    jQuery('#coupon_price').html(data.dd);
                    jQuery('#order_total_price').html(data.result);
                }
            }
        })
    }
}