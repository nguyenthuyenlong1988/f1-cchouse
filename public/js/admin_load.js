/**
 * Created by Tien Nguyen on 2015/06/22 07:44.
 */

function get_editor_content() {
  var content = tinyMCE.get('content').getContent();
  alert(content);
}
