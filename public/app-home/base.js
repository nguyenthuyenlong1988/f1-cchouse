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
        google = global['google'];

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

    // MAP
    loadMap(10.843628, 106.668256);

}(_tienScope, _tienScope.TienJS));

