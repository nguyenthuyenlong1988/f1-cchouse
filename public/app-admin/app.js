/*jslint -W069, strict: true, browser: true, nomen: true */
/*global _hasModule, _tienScope, module, define */

/**
 * Created by Tien Nguyen on 2015/07/16 02:13.
 */

(function (global, _goog, angular, TienJS)
{
    'use strict';

    var
        doc = global.document,
        config = TienJS.config,
        appNamespace = config['app_name'] + '.admin',
        appLocation = '/app-admin',
        appConfig = [
            '$urlRouterProvider',
            '$stateProvider',
            '$locationProvider',
            function ($urlRouterProvider, $stateProvider, $locationProvider)
            {
                // For any unmatched url, redirect to /
                $urlRouterProvider.otherwise('/');

                // Set up the states

                $locationProvider
                    .html5Mode(true)
                    .hashPrefix('!');
            }],
        app = angular.module(
            appNamespace,
            [
                'ui.router',
                appNamespace + '.testmodule'
            ]
        ),
        resolveDep = function (path)
        {
            return '../../../../..' + appLocation + '/' + path;
        },
        start = function ()
        {
            angular.bootstrap(doc, [app.name]);

            return app;
        };

    app.config(appConfig);

    // binding path and namespace
    _goog.addDependency(resolveDep('testmodule.js'), [appNamespace + '.testmodule'], []);

    // define namespace for application
    _goog.provide(appNamespace);

    // require dependencies
    _goog.require(appNamespace + '.testmodule');

    // Code
    app.run(['$rootScope', function ($rootScope)
    {
    }]);

    // Ensures the symbol will be visible after compiler renaming.
    _goog.exportSymbol(appNamespace + '.start', start);

}(_tienScope, _tienScope.goog, _tienScope.angular, _tienScope.TienJS));
