"use strict";

/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Lisa DeBona
 */
jQuery(document).ready(function ($) {
  /* Mobile Navigation */
  adjustElements();
  $(window).on('orientationchange resize', function () {
    adjustElements();
  });

  function adjustElements() {
    if ($(window).width() < 768) {
      $('.desktop-navigation .primary-menu-wrap').appendTo('.mobile-navigation');
      $('.banner-top-text .reg-button').prependTo('.home-content');
    } else {
      $('.mobile-navigation .primary-menu-wrap').appendTo('.desktop-navigation');
      $('.home-content .reg-button').prependTo('.banner-top-text .wrapper');
    }
  }

  $(document).on('click', '#mobile-menu-toggle', function () {
    $('body').toggleClass('mobile-menu-open');
    $(this).toggleClass('active');
    $('.mobile-navigation').toggleClass('active');
    $('#overlay').toggleClass('active');
  });
  $(document).on('click', '#overlay', function () {
    $(this).removeClass('active');
    $('body').removeClass('mobile-menu-open');
    $('#mobile-menu-toggle').removeClass('active');
    $('.mobile-navigation').removeClass('active');
  });
  var swiper = new Swiper('#slideshow', {
    effect: 'fade',

    /* "fade", "cube", "coverflow" or "flip" */
    loop: true,
    noSwiping: false,
    simulateTouch: false,
    speed: 1000,
    autoplay: {
      delay: 4000
    }
  });
  /* Smooth Scroll */

  $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (event) {
    // On-page links
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']'); // Does a scroll target exist?

      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function () {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();

          if ($target.is(":focus")) {
            // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable

            $target.focus(); // Set focus again
          }

          ;
        });
      }
    }
  });
  /*
  *
  *	Wow Animation
  *
  ------------------------------------*/

  new WOW().init();
  $(document).on("click", "#toggleMenu", function () {
    $(this).toggleClass('open');
    $('body').toggleClass('open-mobile-menu');
  });
}); // END #####################################    END