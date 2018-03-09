'use strict';

$(window).ready(function () {

    setTimeout(function() {

        // add class run-initial
        $('body').addClass('run-initial');

        // delay & fadeOut
        $('#preloader').delay(1000).fadeOut('slow');
        $('body').delay(1050).css({ 'overflow-y': 'visible' });

        // delary & remove class run-initial
    }, 1000);


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


});

