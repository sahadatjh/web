var image_up_route = $('#image_up').val();

CKEDITOR.replace( 'details_conent', {
    filebrowserUploadUrl: image_up_route,
    filebrowserUploadMethod: 'form',
});