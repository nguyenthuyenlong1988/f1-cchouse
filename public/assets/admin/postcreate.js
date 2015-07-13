/**
 * Created by Tien Nguyen on 2015/07/11 03:30.
 */

(function (global, TienJS, $)
{
    'use strict';

    var
        Util = TienJS.Util,
        _func = global._func;

    // confirm on close window
    _func.cfmOnX = Util.ConfirmDialog.active();

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
