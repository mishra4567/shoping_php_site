function get_sub_cat(sub_cat_id) {
    var categories_id = jQuery('#categories_id').val();
    // alert(categories_id)
    jQuery.ajax({
        url: 'get_sub_cat.php',
        type: 'post',
        data: 'categories_id=' + categories_id + '&sub_cat_id=' + sub_cat_id,
        success: function (result) {
            jQuery('#sub_categories_id').html(result);
        }
    })
}
// select img
let profilePic = document.getElementById("profilePic");
let InputFile = document.getElementById("input-img");

InputFile.onchange = function () {
    profilePic.src = URL.createObjectURL(InputFile.files[0]);
} 
//multiple Select Img

$('#galleryInput').on('change', function(e) {
    const files = e.target.files;
    const $gallery = $('#gallery');
    const currentItems = $gallery.find('.gallery-item').length;
    const maxItems = 4;

    if (currentItems + files.length > maxItems) {
        alert(`You can only add up to ${maxItems} images. You already have ${currentItems} images.`);
        return;
    }

    $.each(files, function(index, file) {
        addImageToGallery(file, $gallery);
    });
});

function addImageToGallery(file, $gallery) {
    const reader = new FileReader();
    reader.onload = function(event) {
        const $col = $('<div>', {
            class: 'col-md-3 gallery-item'
        });

        const $img = $('<img>', {
            src: event.target.result,
            class: 'my-img-thumbnail',
            'data-toggle': 'modal',
            'data-target': '#imageModal',
            click: function() {
                $('#previewImage').attr('src', $img.attr('src'));
                $('.preview').show();
            }
        });

        const $deleteBtn = $('<button>', {
            class: 'action-btn delete-btn',
            html: '<i class="fas fa-trash-alt"></i>',
            click: function() {
                $col.remove();
            }
        });

        const $editBtn = $('<button>', {
            class: 'action-btn edit-btn',
            html: '<i class="fas fa-edit"></i>',
            click: function() {
                const $editInput = $('<input>', {
                    type: 'file',
                    style: 'display: none;',
                    change: function(e) {
                        const newFile = e.target.files[0];
                        const newReader = new FileReader();
                        newReader.onload = function(newEvent) {
                            $img.attr('src', newEvent.target.result);
                        };
                        newReader.readAsDataURL(newFile);
                    }
                });
                $editInput.click();
            }
        });
        $col.append($img, $deleteBtn, $editBtn);
        $gallery.append($col);
    };
    reader.readAsDataURL(file);
}
// add_more_images
var total_image = 1;
function add_more_images() {
    // alert('fg');
    total_image++;
    var html = '<div class="row" id="add_image_box_' + total_image + '"><div class="col-md-10" ><label for="categories" class="form-control-label">Image</label><input type="file" name="product_images[]" class="form-control input-img" accept="image/jpg, image/png, image/jpeg" required></div><div class="col-md-2"><label for=""></label><button type="button" class="form-control bg-warning text-light" onclick=remove_image("' + total_image + '")>remove</button></div></div>';
    // jQuery('#image_box').after(html);
    jQuery('#image_box').append(html);

}
function remove_image(id) {
    jQuery('#add_image_box_' + id).remove();
}