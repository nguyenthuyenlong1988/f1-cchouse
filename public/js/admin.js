/*jslint browser:true, nomen:true, unused:false */
/*global cfg, jQuery, tinyMCE */

/**
 * Created by Tien Nguyen on 2015/06/22 07:39.
 */

(function ($) {

  $(function () {

    // FROALA EDITOR
    $('.froala').editable({inlineMode: false, theme: 'custom', key: 'eQZMe1NJGC1HTMVANU=='});

    // TINYMCE
    tinymce.init({
      language : 'vi_VN',
      selector: '.tinymce',
      content_css : cfg['page_assets_url'] + '/css/ivy-override-tinymce.css',
      mode: 'textareas',
      preview_styles: false,
      menubar: false,
      fontsize_formats: '14px 16px 18px 24px 36px',
      plugins: [
        'advlist autolink autoresize lists link image charmap preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime table contextmenu paste'
      ],
      toolbar: 'preview | undo redo | styleselect | formatselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fullscreen',
      resize: false
    });

  });

})(jQuery);