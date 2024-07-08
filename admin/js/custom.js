function get_sub_cat(sub_cat_id){
    var categories_id=jQuery('#categories_id').val();
    // alert(categories_id)
    jQuery.ajax({
        url:'get_sub_cat.php',
        type:'post',
        data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
        success:function(result){
            jQuery('#sub_categories_id').html(result);
        }
    })
}
// select img
let profilePic=document.getElementById("profilePic");
let InputFile=document.getElementById("input-img");

InputFile.onchange=function(){
    profilePic.src=URL.createObjectURL(InputFile.files[0]);
}
