/*jslint -W069, strict: true, browser: true, nomen: true */
/*global _hasModule, _tienScope, module, define */

/**
 * Created by Tien Nguyen on 2015/07/09 16:30.
 */

(function (global, TienJS)
{
    'use strict';

    var
        doc = global.document,
        google = global['google'],
        $ = global.jQuery,
        _func = global._func;

    function _loadMap(latitude, longitude)
    {
        if (google && google.maps) {
            var
                myLatlng = new google.maps.LatLng(latitude, longitude);

            var
                mapCanvas = doc.getElementById('google-map'),
                mapOptions = {
                    mapTypeId  : google.maps.MapTypeId.ROADMAP,
                    center     : myLatlng,
                    scrollwheel: false,
                    zoom       : 12
                },
                map = new google.maps.Map(mapCanvas, mapOptions);

            new google.maps.Marker({
                map      : map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position : myLatlng
            });

            google.maps.event.addDomListener(window, 'resize', function ()
            {
                map.setCenter(myLatlng);
            });
        }
        else {
            TienJS.log('Google Map has not been loaded.');
        }
    }
    _func.loadMap = _loadMap;

    function _playCarousel(rootName, listName)
    {
        if ($.fn.jcarousel) {
            var $carousel = $(rootName);

            if ($.fn.jcarouselAutoscroll) {
                $carousel.on('jcarousel:createend', function (e, carousel)
                {
                    var self = $(this);
                    self.hover(
                        function ()
                        {
                            self.jcarouselAutoscroll('stop');
                        },
                        function ()
                        {
                            self.jcarouselAutoscroll('start');
                        }
                    );
                });
            }

            $carousel.jcarousel({
                list       : listName,
                vertical   : true,
                wrap       : 'circular',
                animation  : {
                    duration: 500,
                    easing  : 'linear'
                }
                ,
                transitions: (Modernizr && Modernizr.csstransitions) ? {
                    transforms  : Modernizr.csstransforms,
                    transforms3d: Modernizr.csstransform3d,
                    easing      : 'ease-in-out'
                } : false
            });

            if ($.fn.jcarouselAutoscroll) {
                $carousel.jcarouselAutoscroll({
                    autostart: true,
                    interval : 2000,
                    target   : '+=2'
                });

            }
        }
        else {
            TienJS.log('jCarousel has not been loaded.');
        }
    }
    _func.playCarousel = _playCarousel;

    // MAP
    _loadMap(10.843628, 106.668256);

}(_tienScope, _tienScope.TienJS));
