/*jslint -W069, strict: true, browser: true, nomen: true */
/*global _hasModule, _tienScope, module, define */

/**
 * Created by Tien Nguyen on 2015/07/09 16:40.
 */

(function (global, factory)
{
    'use strict';

    if (_hasModule) {
        module.exports = factory(global);
    }
    else {
        factory(global);
    }

}(_tienScope, function (global)
{
    'use strict';

    var
        _TienJS = global.TienJS,
        factory = function (TienJS)
        {
            if (!TienJS) {
                throw new Error('Application requires Angular and TienJS. Check out library is missing.');
            }

            var
                appName = TienJS.config['app_name'] + '_admin',
                app = {};


            return app;
        };

    if (typeof define === 'function' && define.amd) {
        define('adminApp', ['tienjs'], function (tienJS)
        {
            return factory(tienJS);
        });
    }
    else {
        return factory(_TienJS);
    }
}));

(function (global)
{
    'use strict';

    var
        TienJS = global.TienJS,
        cfg = TienJS.config,
        $ = global.jQuery;

    // FROALA EDITOR
    if ($.fn.editable) {
        $('.froala').editable({
            key              : 'eQZMe1NJGC1HTMVANU==',
            inlineMode       : false,
            theme            : 'custom',
            buttons          : $.merge(['fullscreen'], $.Editable.DEFAULTS.buttons),
            imageUploadURL   : cfg['page_base_url'] + '/api/_upload_image.py',
            imageUploadParams: {}
        });
    }

    // TINYMCE
    if (global.tinymce) {
        var editor = global.tinymce;

        editor.init({
            language        : 'vi_VN',
            selector        : '.tinymce',
            content_css     : cfg['page_assets_url'] + '/css/ivy-override-tinymce.css',
            mode            : 'textareas',
            preview_styles  : false,
            menubar         : false,
            fontsize_formats: '14px 16px 18px 24px 36px',
            plugins         : [
                'advlist autolink autoresize lists link image charmap preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime table contextmenu paste'
            ],
            toolbar         : 'preview | undo redo | styleselect | formatselect fontsizeselect' +
            ' | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify' +
            ' | bullist numlist outdent indent | link image | fullscreen',
            resize          : false
        });
    }

}(_tienScope));

