/*jslint -W069, strict: true, browser: true, nomen: true */
/*global _hasModule, _tienScope, module, define */

/**
 * Created by Tien Nguyen on 2015/07/09 20:31.
 */

(function (global)
{
    'use strict';

    var
        $ = global.jQuery;

    $(function ()
    {

        // TOOLTIP
        $('[data-tooltip]').tooltip({animation: false});

    });

}(_tienScope));
