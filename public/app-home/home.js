/**
 * Created by Tien Nguyen on 2015/07/19 08:28.
 */

(function (global, TienJS)
{
    'use strict';

    var
        $ = global.jQuery;

    function playActivitySlider()
    {
        if ($.fn.owlCarousel) {
            var
                $actImageWrapper = $('#activity-image-wrapper'),
                $actImageSlider = $('#activity-image-slider'),
                _callback_onInitialized = function ()
                {
                    $('.cover-image', $actImageWrapper).remove();
                };

            $actImageSlider.owlCarousel({
                // Core

                autoplay          : true,
                autoplayTimeout   : 5e3,
                autoplayHoverPause: true,
                autoHeight        : false,
                loop              : true,

                // Speed

                autoplaySpeed : 2e2,
                dragEndSpeed  : 2e2,
                goToFirstSpeed: 2e3,

                pullDrag: false,

                // Nav

                nav    : false,
                navText: ['<div class="set-middle"><div class="set-cell"><i class="fa fa-angle-left"></i></div></div>', '<div class="set-middle"><div class="set-cell"><i class="fa fa-angle-right"></i></div></div>'],

                // Items

                items            : 1,
                itemsDesktop     : [1199, 1],
                itemsDesktopSmall: [980, 1],
                itemsTablet      : [768, 1],
                itemsTabletSmall : [568, 1],
                itemsMobile      : [479, 1],

                // Events

                onInitialized: _callback_onInitialized
            });

            //$actImageSlider.owlCarousel({
            //    autoPlay: 5000,
            //
            //    items: 1,
            //
            //    singleItem: false,
            //    slideSpeed: 200,
            //
            //    pagination     : false,
            //    paginationSpeed: 200,
            //
            //    rewindNav  : true,
            //    rewindSpeed: 200,
            //
            //    stagePadding: 50,
            //
            //    lazyLoad   : true,
            //    navigation : false,
            //    stopOnHover: true,
            //
            //    afterInit: function ()
            //    {
            //        $('.cover-image', $actImageWrapper).remove();
            //    }
            //});
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

}(_tienScope, _tienScope.TienJS));
