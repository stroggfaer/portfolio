jQuery(document).ready(function () {

});

// Чекбокс пометить;
$(document).on('click','.js-checkbox-column',function(){
    loading('show');
    $.post(window.location.href,{checkboxColumn:true,id:$(this).val(),status: $(this).filter(':checked').length},function(html){
        $('.checkbox-column').html($(html).find('.checkbox-column').html());
        loading('hide');
    });
    return false;
});

// Удалить изображения;
function delete_images(image_id,id) {
    if (!confirm("Удалить?")) return false;
    loading('show');
    $.post('/admin/ajax-backend/images-delete',{'deleteImages':true,'image_id':image_id,'id':id},function(response){
        $("div.images-all").html(response);
        loading('hide');
    });
    return false;
}

// Обложка привью для карточкки;
function cover_images(image_id,id) {
    loading('show');
    $.post('/admin/ajax-backend/cover-images',{'coverImages':true,'image_id':image_id,'id':id},function(response){
        $("div.images-all").html(response).toggle;
        loading('hide');
    });
    return false;
}

// Прелоадер;
function loading(name) {
    if(name === 'show') {
        $("#loadAjax").show();
        $(".load-contents").css('opacity','0.50');
    }else if(name === 'hide') {
        $("#loadAjax").hide();
        $(".load-contents").css('opacity','100');
    }
}
function loading_content(name) {
    if(name === 'show') {
        $(".load-content").show();
    }else if(name === 'hide') {
        $(".load-content").hide();
    }
}