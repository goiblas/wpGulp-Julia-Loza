'use strict';

$(window).ready(function () {

    setTimeout(function() {

        // add class run-initial
        $('body').addClass('run-initial');

        // delay & fadeOut
        $('#preloader').fadeOut('slow');
        $('body').css({ 'overflow-y': 'visible' });

        // delary & remove class run-initial
    }, 1000);

    if (typeof WOW == 'function') {
        new WOW().init();
    }
});

$(document).ready(function () {

    // porfolio lightbox
    $('.jl-gallery').lightGallery({
        thumbnail: true,
        download: false,
        pager: true
    });


    // porfolio carousel
    var dragging = false;
    $('.carousel-cell img').on('click', function (e) {
        if (dragging) {
            e.preventDefault();
            e.stopPropagation();
        }
    });
    
    var $carousel = $('.carousel-wrap').flickity({
        prevNextButtons: false,
        pageDots: false
    });

    $('.carousel-wrap').on('dragStart', function(){
        dragging = true;
    })
    $('.carousel-wrap').on('dragEnd', function(){
        setTimeout(function() {
            dragging = false;
        });
    })


    $carousel.on('cellSelect', function (e) {
        e.stopPropagation();
        $('.cBtn-previous').prop('disabled', false);
        $('.cBtn-next').prop('disabled', false);
        if (cData.selectedIndex === 0)
            $('.cBtn-previous').prop('disabled', true);
        if (cData.selectedIndex === cData.cells.length - 1)
            $('.cBtn-next').prop('disabled', true);
    })

    var cData = $carousel.data('flickity');

    $('.cBtn-previous').on('click', function () {
        $carousel.flickity('previous');
    });

    $('.cBtn-next').on('click', function () {
        $carousel.flickity('next');
    });

    // contact form

    $('.wpcf7-response-output').on('click', function(){
        $(this).fadeOut(300);
    });
    $('.wpcf7-text').each(handlerInputState);
    $('.wpcf7-textarea').each(handlerInputState);

    function handlerInputState() {
        var $this = $(this);
        var $parent = $this.parents('.cInput');

        $this.on('focus', function (e) {
            $parent.addClass('focus');
        });

        $this.on('blur', function (e) {
            $parent.removeClass('focus');

            if ($this.val().trim() == '') {
                $parent.addClass('empty');
            } else {
                $parent.removeClass('empty');
            }
        });
    }
});

    // google maps
var map, marker;
var coords = { lat: 42.460302719808254, lng: -2.4496596925903313 };
var coordsMap = { lat: 42.4563046, lng: -2.4554841 };
var linkGoogleMaps = 'https://www.google.es/maps/place/Julia+Loza+Sainz+Estudio+de+decoraci%C3%B3n+dise%C3%B1o/@42.4623187,-2.4495087,15z/data=!4m2!3m1!1s0x0:0x5cd4eb0cd3f7036d?sa=X&ved=0ahUKEwjDlp71wPfXAhXM1RoKHY0dCzAQ_BIIeTAP';

function initMap() {
    var currentCoordsMap = coordsMap;
    if ($(document).width() < 970) {
        currentCoordsMap = coords;
    }
    map = new google.maps.Map(document.getElementById('map'), {
        center: currentCoordsMap,
        zoom: 16,
        gestureHandling: 'greedy',
        scrollwheel: false,
        disableDefaultUI: true,
        styles: [
            {
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#212121"
                    }
                ]
            },
            {
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#2e2e2e"
                    }
                ]
            },
            {
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "weight": 1
                    }
                ]
            },
            {
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#2a2a2a"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#757575"
                    }
                ]
            },
            {
                "featureType": "administrative.country",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#9e9e9e"
                    }
                ]
            },
            {
                "featureType": "administrative.land_parcel",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "administrative.locality",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#bdbdbd"
                    }
                ]
            },
            {
                "featureType": "landscape.natural.landcover",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "color": "#2d2d2d"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                    }
                ]
            },
            {
                "featureType": "poi.business",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#181818"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#2d2d2d"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#616161"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "color": "#1b1b1b"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#2a2a2a"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#8a8a8a"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#373737"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#3c3c3c"
                    }
                ]
            },
            {
                "featureType": "road.highway.controlled_access",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#4e4e4e"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#616161"
                    }
                ]
            },
            {
                "featureType": "transit",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#757575"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#000000"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#282828"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#3d3d3d"
                    }
                ]
            }
        ]
    });
    marker = new google.maps.Marker({
        position: coords,
        map: map,
        title: 'Julia Loza'
    });

    marker.addListener('click', function () {
        window.open(linkGoogleMaps, '_blank');
    });
}



