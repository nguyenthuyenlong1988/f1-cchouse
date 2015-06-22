(function (global, Modernizr, $) {
  'use strict';

  var
    $activityImageWrapper = $('#activity-image-wrapper'),
    $activityImageSlider = $('#activity-image-slider'),

    $activityMenuWrapper = $('#activity-menu-wrapper'),
    $activityMenu = $('#activity-menu'),
    $activityMenuPrev = $('.prev', $activityMenuWrapper),
    $activityMenuNext = $('.next', $activityMenuWrapper);

  // Slider
  $activityImageSlider.owlCarousel({
    autoPlay: 5000,

    singleItem: true,
    slideSpeed: 200,

    pagination: false,
    paginationSpeed: 200,

    rewindNav: true,
    rewindSpeed: 200,

    lazyLoad: true,
    navigation: false,
    stopOnHover: true,

    afterInit: function () {
      $('.cover-image', $activityImageWrapper).remove();
    }
  });

  // Quick Menu
  $activityMenu
    .jcarousel({
      list: '.overview',
      vertical: true,
      wrap: 'circular',
      animation: {
        duration: 400,
        easing: 'ease'
      },
      transitions: Modernizr.csstransitions ? {
        transforms: Modernizr.csstransforms,
        transforms3d: Modernizr.csstransform3d,
        easing: 'ease-out'
      } : false
    })
    .jcarouselAutoscroll({
      autostart: true,
      interval: 3000,
      target: '+=3',
      createend: $activityMenu.hover(
        function () {
          $activityMenu.jcarouselAutoscroll('stop');
        },
        function () {
          $activityMenu.jcarouselAutoscroll('start');
        }
      )
    });
  $activityMenuPrev.jcarouselControl({
    target: '-=3',
    carousel: $activityMenu,
    createend: $activityMenuPrev.hover(
      function () {
        $activityMenu.jcarouselAutoscroll('stop');
      },
      function () {
        $activityMenu.jcarouselAutoscroll('start');
      }
    )
  });
  $activityMenuNext.jcarouselControl({
    target: '+=3',
    carousel: $activityMenu,
    createend: $activityMenuNext.hover(
      function () {
        $activityMenu.jcarouselAutoscroll('stop');
      },
      function () {
        $activityMenu.jcarouselAutoscroll('start');
      }
    )
  });

  function stopActivityMenu() {
    $activityMenu.jcarouselAutoscroll('stop');
  }

}(window, Modernizr, jQuery));

