function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.excel-upload-wrap').hide();

      $('.file-upload-excel').attr(e.target.result);
      $('.file-upload-content').show();

      $('.excel-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.excel-upload-wrap').show();
}
$('.excel-upload-wrap').bind('dragover', function () {
        $('.excel-upload-wrap').addClass('excel-dropping');
    });
    $('.excel-upload-wrap').bind('dragleave', function () {
        $('.excel-upload-wrap').removeClass('excel-dropping');
});