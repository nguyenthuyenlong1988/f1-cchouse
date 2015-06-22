/**
 * Created by Tien Nguyen on 2015/06/22 07:39.
 */

(function ($) {

  $(function () {

    // SUMMERNOTE

    $('.summernote').summernote();

    // TINYMCE
    tinymce.init({
      selector: ".tinymce",
      plugins: [
        "advlist autolink autoresize lists link image charmap preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime table contextmenu paste"
      ],
      toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });

  });

})(jQuery);
