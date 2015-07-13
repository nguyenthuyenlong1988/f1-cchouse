/*jslint browser:true, nomen:true */
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
    _func.cfmOnDeletePost = function (post_id, post_title, _token)
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
                            '<form method="POST" action="' + cfg.page_base_url + '/@dmin-zone/posts/' + post_id + '" accept-charset="' + cfg.page_charset + '">' +
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

    _func.postResetInput = function (el)
    {
        _func.resetInput(el);
        $('#post_avatar').val('');
        $('.post-avatar img').attr('src', 'img/blank.gif');
    };

    // Post image avatar (in posts.create/posts.edit page)
    _func.postImgAvatar = function (input)
    {
        var onSuccess = function (data, textStatus, jqXHR)
        {
            cfg.js_debug ? console.log(data) : void(0);

            $('#post_avatar').val(data.name);
            $('.post-avatar img').attr('src', data.link);

            _func.resetInput(input);
        };

        _func.ajaxUploadImage(input, {success: onSuccess});
    };

    // Reset HTML input[text] and input[file] control
    _func.resetInput = function (el)
    {
        var $el = $(el);
        $el.wrap('<form>').closest('form').get(0).reset();
        $el.unwrap();
    };

    // Ajax upload image
    _func.ajaxUploadImage = function (input, options)
    {
        if (!global.FormData) {
            console.log('Your browser is not support File API.');
            return;
        }

        var _options = options || {},
            formData = new FormData();

        formData.append('file', input.files[0]);

        $.ajax({
            url        : cfg.api_url + '/_upload_image.py',
            type       : 'POST',
            data       : formData,
            dataType   : 'json',
            cache      : false,
            processData: false,
            contentType: false,
            success    : _options.success || null,
            error      : function (jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
            }
        });
    };

    // Assign all functions to global object
    global._func = _func;

}(window, cfg, jQuery));
