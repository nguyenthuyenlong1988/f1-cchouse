/*jslint -W069, strict: true, browser: true, nomen: true */
/*global _hasModule, _tienScope, module, define */

/**
 * Created by Tien Nguyen on 2015/07/09 16:30.
 */

(function (global)
{
    'use strict';

    var $ = global.jQuery;

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

    // QUICKMENU
    //playMenuAutoscroll();

}(_tienScope));

