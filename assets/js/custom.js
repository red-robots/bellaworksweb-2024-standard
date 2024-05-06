"use strict";

/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 */

// window.onload = function(){
//   //hide the preloader
//   setTimeout(function(){
//     document.getElementById("preloader").style.display = "none";
//     document.body.classList.add("preloader-off");
//   },2000);

// }

jQuery(document).ready(function ($) {
  // $("li.menu-item-has-children").hover(
  //        function() { $('.sub-menu', this).fadeIn(300);
  //        },
  //        function() { $('.sub-menu', this).fadeOut(300);
  //    });

  function displayWord() {
    var words = document.getElementsByClassName("togglezz");
    var wordCounter = 0;
    setInterval(updateWord, 2000);
    function updateWord() {
      if (wordCounter >= words.length) wordCounter = 0;
      for (var i = 0; i < words.length; i++) {
        words[i].classList.remove('activezz');
      }
      words[wordCounter].classList.add('activezz');
      wordCounter++;
    }
  }
  displayWord();

  /*
  		FAQ dropdowns
  __________________________________________
  */
  $('.question').click(function () {
    $(this).next('.answer').slideToggle(500);
    $(this).toggleClass('close');
  });
  var siteNav = $('header.wp-block-template-part .wp-block-navigation__responsive-container').html();
  $('<div class="mobileNavigation"><button class="closeMobileNav"><span class="sr-only">Close Menu</span></button>' + siteNav + '</div>').insertAfter('header.wp-block-template-part');
  $('header.wp-block-template-part button[aria-label="Open menu"]').append('<span class="bar"><span></span></span>');
  $('header.wp-block-template-part button[aria-label="Open menu"]').on('click', function (e) {
    e.preventDefault();
    $('.mobileNavigation').addClass('active');
  });
  $(document).on('click', '.closeMobileNav', function (e) {
    e.preventDefault();
    $('.mobileNavigation').addClass('fadeInUp');
    setTimeout(function () {
      $('.mobileNavigation').removeClass('active fadeInUp');
    }, 200);
  });

  // AOS.init({
  //   duration: 1000,
  //   delay: 2000,
  //   once: true,
  //   mirror: true
  // });
  AOS.init({
    easing: 'ease-out-back',
    duration: 1000,
    delay: 1000
  });

  //$('header.wp-block-template-part').attr('data-aos','fade-down');

  homerow1_adjust();
  $(window).on('resize', function () {
    homerow1_adjust();
  });
  function homerow1_adjust() {
    if ($('.homeSection1 .column.left h2').length) {
      var homeColLeft = $('.homeSection1 .leftTitle').height();
      if ($('.homeSection1 .column.right h2').length) {
        $('.homeSection1 .column.right .wp-block-group').css('height', homeColLeft + 'px');
      }
      $('.homeSection1 .column.left h2 strong').each(function () {
        $(this).attr('data-aos', 'fade-right');
      });
    }
    if ($('.homeSection1 .column.right h2').length) {
      var homeColRightH2Width = $('.homeSection1 .column.right h2').width();
      var homeColRightH2Height = $('.homeSection1 .column.right .wp-block-group').height() + 30;
      if ($('.homeSection1 .column.right .wp-block-button').length) {
        $('.homeSection1 .column.right .wp-block-buttons').css('margin-top', homeColRightH2Height + 'px');
        $('.homeSection1 .column.right .wp-block-buttons').each(function () {
          if ($(this).find('.inner-wrapper').length == 0) {
            $(this).wrapInner('<div class="inner-wrapper" style="width:' + homeColRightH2Width + 'px"></div>');
          }
        });
      }
    }
  }
  if ($('.ourWorkGallery .wp-block-gallery figure').length) {
    $('.ourWorkGallery .wp-block-gallery figure').each(function () {
      $(this).wrapInner('<div class="inner"></div>');
      if ($(this).find('img').length) {
        var src = $(this).find('img').attr('src');
        if (src.includes('placeholder.png')) {
          $(this).addClass('blank-image');
        }
      }
    });
    $('.ourWorkGallery .wp-block-gallery .wp-block-image').not('.blank-image').last().prev().addClass('before-last');
    $('.ourWorkGallery .wp-block-gallery .wp-block-image').not('.blank-image').last().addClass('last');
    $('.ourWorkGallery .wp-block-gallery .wp-block-image').not('.blank-image').each(function (k) {
      var ctr = k + 1;
      $(this).addClass('wp-block-image-' + ctr);
    });
  }
  if ($('.partnersImages.wp-block-gallery  .wp-block-image').length) {
    $('.partnersImages.wp-block-gallery .wp-block-image').each(function () {
      if ($(this).find('img.helper').length == 0) {
        $(this).append('<img src="' + assetDir + '/images/square-helper.png" alt="" class="helper" />');
      }
    });
  }
  if ($('.ourPartners .wp-block-gallery .wp-block-image').length) {
    $('.ourPartners .wp-block-gallery .wp-block-image').each(function () {
      $(this).wrapInner('<div class="inner"></div>');
    });
  }

  // if( $('.stepsColumn').length ) {
  //   $('<div class="stepsContent"><div class="stepsInner"></div></div>').insertAfter('.stepsColumn');
  //   $('.stepsColumn .wp-block-column').each(function(){
  // 	$(this).wrapInner('<div class="wrap"><div class="flex"></div></div>');
  // 	$(this).appendTo('.stepsInner');
  //   });
  //   $('.stepsContent .wp-block-column').last().addClass('last');
  // }
});