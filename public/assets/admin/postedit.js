/**
 * Created by Tien Nguyen on 2015/07/11 01:34.
 */

(function (global, TienJS, $)
{
    'use strict';

    var
        Util = TienJS.Util,
        cfg = TienJS.config,
        _func = global._func;

    // confirm on close window
    _func.cfmOnX = Util.ConfirmDialog.active();

    // display post_avatar image
    var
        postAvatar =  $('#post_avatar').val();

    if (postAvatar.length > 0) {
        $('.post-avatar img').attr('src', cfg['page_getimage'] + '/' + postAvatar);
    }

    /**
     * Post image avatar (in posts.create/posts.edit page).
     *
     * @param input
     */
    _func.postImgAvatar = function (input)
    {
        var onSuccess = function (data, textStatus, jqXHR)
        {
            TienJS.log(data);

            $('#post_avatar').val(data.name);
            $('.post-avatar img').attr('src', data.link);

            _func.resetInput(input);
        };

        _func.ajaxUploadImage(input, {success: onSuccess});
    };

}(_tienScope, _tienScope.TienJS, jQuery));
