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
        $ = global.jQuery;

    function playActivitySlider()
    {
        if ($.fn.owlCarousel) {
            var
                $actImageWrapper = $('#activity-image-wrapper'),
                $actImageSlider = $('#activity-image-slider');

            $actImageSlider.owlCarousel({
                autoPlay: 5000,

                items: 1,

                singleItem: false,
                slideSpeed: 200,

                pagination     : false,
                paginationSpeed: 200,

                rewindNav  : true,
                rewindSpeed: 200,

                lazyLoad   : true,
                navigation : false,
                stopOnHover: true,

                afterInit: function ()
                {
                    $('.cover-image', $actImageWrapper).remove();
                }
            });
        }
    }

    function loadMap(latitude, longitude)
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
            TienJS.log('Google Map load failed.');
        }
    }



    //function playMenuAutoscroll()
    //{
    //    if ($.fn['jcarousel']) {
    //        var
    //            $actMenuWrapper = $('#activity-menu-wrapper'),
    //            $actMenu = $('#activity-menu'),
    //            $actMenuPrev = $('.prev', $actMenuWrapper),
    //            $actMenuNext = $('.next', $actMenuWrapper);
    //
    //        function stopActivityMenu()
    //        {
    //            $actMenu.jcarouselAutoscroll('stop');
    //        }
    //
    //        $actMenu
    //            .jcarousel({
    //                list       : '.overview',
    //                vertical   : true,
    //                wrap       : 'circular',
    //                animation  : {
    //                    duration: 400,
    //                    easing  : 'ease'
    //                },
    //                transitions: Modernizr.csstransitions ? {
    //                    transforms  : Modernizr.csstransforms,
    //                    transforms3d: Modernizr.csstransform3d,
    //                    easing      : 'ease-out'
    //                } : false
    //            })
    //            .jcarouselAutoscroll({
    //                autostart: true,
    //                interval : 3000,
    //                target   : '+=3',
    //                createend: $actMenu.hover(
    //                    function ()
    //                    {
    //                        $actMenu.jcarouselAutoscroll('stop');
    //                    },
    //                    function ()
    //                    {
    //                        $actMenu.jcarouselAutoscroll('start');
    //                    }
    //                )
    //            });
    //        $actMenuPrev.jcarouselControl({
    //            target   : '-=3',
    //            carousel : $actMenu,
    //            createend: $actMenuPrev.hover(
    //                function ()
    //                {
    //                    $actMenu.jcarouselAutoscroll('stop');
    //                },
    //                function ()
    //                {
    //                    $actMenu.jcarouselAutoscroll('start');
    //                }
    //            )
    //        });
    //        $actMenuNext.jcarouselControl({
    //            target   : '+=3',
    //            carousel : $actMenu,
    //            createend: $actMenuNext.hover(
    //                function ()
    //                {
    //                    $actMenu.jcarouselAutoscroll('stop');
    //                },
    //                function ()
    //                {
    //                    $actMenu.jcarouselAutoscroll('start');
    //                }
    //            )
    //        });
    //    }
    //}

    // SLIDER
    playActivitySlider();

    // MAP
    loadMap(10.843628, 106.668256);

    // QUICKMENU
    //playMenuAutoscroll();

}(_tienScope, _tienScope.TienJS));

