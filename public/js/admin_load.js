/*jslint browser:true, nomen:true, unused:false */
/*global cfg, jQuery */

/**
 * Created by Tien Nguyen on 2015/06/22 07:44.
 */

(function (global, cfg, $)
{
  'use strict';

  // DEFINE ALL FUNCTIONS
  var _func = {},
    formSubmitting = false;

  // Confirmation message on close window
  _func.cfmOnClose = function ()
  {
    var _onBeforeUnload = function (e)
    {
      var confirmationMessage =
        'Nếu bạn đang soạn thảo/cập nhật nội dung, ' +
        'thì nên lưu lại nội dung trước khi chuyển sang trang khác. ' +
        'Nếu không nội dung sẽ bị mất!';

      if (formSubmitting) {
        return;
      }

      (e || global.event).returnValue = confirmationMessage; //Gecko + IE
      return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
    };

    global.onload = function ()
    {
      global.addEventListener('beforeunload', _onBeforeUnload);
    };
  };

  _func.setFormSubmitting = function ()
  {
    formSubmitting = true;
  };

  // Show confirm dialog on delete record
  _func.cfmOnDeleteRecord = function (post_id, post_title, _token)
  {
    var str =
      // @formatter:off
      '<div class="modal fade">' +
        '<div class="modal-dialog">' +
          '<div class="modal-content">' +
            '<div class="modal-header">' +
              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
              '<h4 class="modal-title">Xóa bài viết #' + post_id + '</h4>' +
            '</div>' +
            '<div class="modal-body">' +
              '<p>Bạn muốn xóa bài viết này?</p>' +
              '<p>#<strong>' + post_id + '</strong><br /><strong>' + post_title + '</strong></p>' +
            '</div>' +
            '<div class="modal-footer">' +
              '<form method="POST" action="' + cfg['page_base_url'] + '/@dmin-zone/posts/' + post_id + '" accept-charset="' + cfg['page_charset'] + '">' +
                '<input type="hidden" name="_method" value="DELETE">' +
                '<input type="hidden" name="_token" value="' + _token + '">' +
                '<button type="button" class="btn btn-primary" data-dismiss="modal">Không, đừng xóa</button>' +
                '<button class="btn btn-default">Đồng ý xóa</button>' +
              '</form>' +
            '</div>' +
          '</div>' +
        '</div>' +
      '</div>';
      // @formatter:on

    $(str).on('hidden.bs.modal', function ()
    {
      $(this).remove();
    }).modal();
  };

  // Assign all functions to global object
  global._func = _func;

}(window, cfg, jQuery));
