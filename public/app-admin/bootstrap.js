/*jslint -W069, strict: true, browser: true, nomen: true */
/*global _hasModule, _tienScope, module, define */

/**
 * Created by Tien Nguyen on 2015/07/16 02:36.
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
        _goog = global.goog,
        _angular = global.angular,
        _TienJS = global.TienJS,
        factory = function (goog, angular, TienJS)
        {
            if (!goog || !angular || !TienJS) {
                throw Error('Application has not base.js');
            }

            var nhathieunhi = global['nhathieunhi'];

            if (!nhathieunhi) {
                throw Error('NhaThieuNhi application is not exist.');
            }

            // kick app nhathieunhi :)
            return nhathieunhi['admin'].start();
        };

    if (typeof define === 'function' && define.amd) {
        define('adminApp', ['angular', 'tienjs'], function (angular, TienJS)
        {
            return factory(_goog, angular, TienJS);
        });
    }
    else {
        return factory(_goog, _angular, _TienJS);
    }

}));
