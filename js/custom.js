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
            url: './register_submit.php',
            type: 'post',
            data: 'name=' + name + '&email=' + email + '&mobail=' + mobail + '&password=' + password,
            success: function (result) {
                if(result=='present'){
                    jQuery('#email_error').html('Email id already present');
                }
                if(result=='ensert'){
                    jQuery('.register_msg p').html('Register Successfull');
                }
            }
        })
    }
}
function user_login(){
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
    if(is_error==''){
        jQuery.ajax({
            url:'./login_submit.php',
            type:'post',
            data:'email='+email+'&password='+password,
            success: function (result) {
                if(result=='worng'){
                    jQuery('.login_msg p').html('Enter Valid Login details');
                }
                if(result=='valid'){
                    window.location.href= window.location.href;
                }
            }
        })
    }
}

function manage_cart(pid,type){
    if(type=='update'){
        var qty=jQuery("#"+pid+"qty").val();
    }else{
        var qty=jQuery("#qty").val();
    }
    jQuery.ajax({
        url:'manage_cart.php',
        type:'post',
        data:'pid='+pid+'&qty='+qty+'&type='+type,
        success:function(result){
            if(type=='update' || type=='remove'){
                window.location.href=window.location.href;
            }
            jQuery('.htc__qua').html(result);
        }
    })
}

function sort_product_drop(cat_id,site_path){
    var sort_product_id=jQuery('#sort_product_id').val();
    window.location.href=site_path+"categories.php?id="+cat_id+"&sort="+sort_product_id;
    // alert (cat_id);
}