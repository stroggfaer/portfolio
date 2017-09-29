
// Удалить изображения;
function delete_images(image_id,id) {
    $.post('/admin/ajax-backend/images-delete',{'deleteImages':true,'image_id':image_id,'id':id},function(response){
        $("div.images-all").html(response);
    });
    return false;
}

// Обложка привью для карточкки;
function cover_images(image_id,id) {
    $.post('/admin/ajax-backend/cover-images',{'coverImages':true,'image_id':image_id,'id':id},function(response){
        $("div.images-all").html(response).toggle;
    });
    return false;
}
