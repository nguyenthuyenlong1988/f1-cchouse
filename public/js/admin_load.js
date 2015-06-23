/*jslint browser:true, nomen:true, unused:false */
/*global cfg, jQuery, tinyMCE */

/**
 * Created by Tien Nguyen on 2015/06/22 07:44.
 */

//function get_editor(name)
//{
//  return tinyMCE.get(name);
//}
//
//function get_editor_content(name)
//{
//  var data = get_editor(name).getContent();
//  alert(data);
//}
//
//function set_editor_content(name, data)
//{
//  get_editor(name).setContent(data);
//}

function dlg_post_delete(post_id, post_title, _token)
{
  (function ($)
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

  }(jQuery));
}
