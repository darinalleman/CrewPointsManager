/*==============================================*/


/*      01 - VARIABLES                          */
/*      02 - PAGE CALCULATIONS                  */
/*      03 - FUNCTION ON DOCUMENT READY         */
/*      04 - FUNCTION ON PAGE LOAD              */
/*      05 - FUNCTION ON PAGE RESIZE            */
/*      06 - FUNCTION ON PAGE SCROLL            */
/*      07 - STICKY HEADER                      */
/*      08 - SWIPER                             */
/*      09 - NAV BAR ICON                       */
/*      10 - DROP DOWN MENU                     */
/*      11 - NUMBER ANIMATION                   */
/*      12 - MENU GOING                         */
/*      13 - CHECK SCROLLING                    */   
/*      14 - ANIMSITION                         */   
/*      15 - LIGHT-BOX                          */   
/* 



*/
/*==============================================*/
$(function() {


  "use strict";

  /*================*/
  /* 01 - VARIABLES */
  /*================*/
  var swipers = [], winW, winH, _isresponsive, xsPoint = 750, smPoint = 974, mdPoint = 1182; 


  //========================
  // 02 - page calculations 
  //========================
  function pageCalculations(){
    winW = $(window).width();
    winH = $(window).height();
  }   
      
  // ===================
  //03 - function on document ready
  //====================
  
  //center all images inside containers
  $('.center-image').each(function(){
    var bgSrc = $(this).attr('src');
    $(this).parent().addClass('background-block').css({'background-image':'url('+bgSrc+')'});
    $(this).hide();
  });

  //Tabs
  var tabFinish = 0;
  $('.nav-tab-item').on('click',  function(){
      var $t = $(this);
      if(tabFinish || $t.hasClass('active')) return false;
      tabFinish = 1;
      $t.closest('.nav-tab').find('.nav-tab-item').removeClass('active');
      $t.addClass('active');
      var index = $t.parent().parent().find('.nav-tab-item').index(this);
      $t.closest('.tab-wrapper').find('.tab-info:visible').fadeOut(500, function(){
          $t.closest('.tab-wrapper').find('.tab-info').eq(index).fadeIn(500, function() {
              tabFinish = 0;
          });
      });
  });    

 


         
    


  // ===================
  // 06 - function on page scroll
  //====================
  $(window).scroll(function () {
        scrollF();
        animate_numbers();
        animate_numbers_2();
        if (!$("body").hasClass("no-scrolling")){checkScrollig();}
    });


    // ===================
    // 07 - Sticky header
    //====================

    var nav = $('header .container');
    var for_con = $('header .for_con');
    var  scrollF = function (){
      if($(window).width() > 991) { 
        if ($(window).scrollTop() > 50) {
             nav.addClass("small-head");
             for_con.addClass("container");
        } else {
            nav.removeClass("small-head");
            for_con.removeClass("container");
        }
      }
      else{
      if ($(window).scrollTop() > 10) {
        nav.addClass("small-head");
        for_con.addClass("container");
      } 
      else {
        nav.removeClass("small-head");
        for_con.removeClass("container");
      }
      }
    };
    




      // ===================
      //08 - SWIPER
      //====================
      function initSwiper(){
        var initIterator = 0;
        $('.swiper-container').each(function(){   
          var $t = $(this);                 
          var index = 'swiper-unique-id-'+initIterator;
          $t.attr('data-init', 'swiper-'+index).addClass('swiper-'+index);
          $t.find('.pagination').addClass('pagination-'+index);
          var loopVar = parseInt($t.attr('data-loop'),10);
          var slidesP = parseInt($t.attr('data-slides-per-view'),10);
          var centeredSlidesVar = ($t.closest('.history').length)?1:0;
          swipers['swiper-'+index] = new Swiper('.swiper-'+index,{
              pagination: '.pagination-'+index,
              loop: loopVar,
              effect: 'fade',
              paginationClickable: true,
              slidesPerView: slidesP,
              calculateHeight: true,
              centeredSlides: centeredSlidesVar,
              onSlideChangeStart: function(swiper){
                    var activeIndex = (loopVar===true)?swiper.activeIndex:swiper.activeLoopIndex;
                    if($t.closest('.w-banner').length){
                        //alert(activeIndex);
                        $('.banner-navigation').removeClass('active-nav');
                        $('.banner-navigation').eq(activeIndex).addClass('active-nav');
                    }
              }
          });
          if(centeredSlidesVar) swipers['swiper-'+index].swipeTo(1,0);
          swipers['swiper-'+index].reInit();
          initIterator++;
        });
      }

      $('.arrow-left').on('click', function(){
          swipers[$(this).parent().attr('data-init')].swipePrev();
      });

      $('.arrow-right').on('click', function(){
          swipers[$(this).parent().attr('data-init')].swipeNext();
      });
      $('.click-left').on('click', function(){
          swipers[$(this).parent().attr('data-init')].swipePrev();
      });

      $('.click-right').on('click', function(){
          swipers[$(this).parent().attr('data-init')].swipeNext();
      });

    // ===================
    //09 - NAV BAR ICON
    //====================

  var toggles = document.querySelectorAll(".cmn-toggle-switch");

  for (var i = toggles.length - 1; i >= 0; i--) {
    var toggle = toggles[i];
    toggleHandler(toggle);
  }
  $("collapsed").on('click', function(){
    $("collapse").css("height","1px");
  });
  function toggleHandler(toggle) {
    toggle.addEventListener( "click", function(e) {
      e.preventDefault();
      (this.classList.contains("active") === true) ? this.classList.remove("active") : this.classList.add("active");
    });
  }

  $(".page-dropdown").hover(function(){
    if ( $(window).width() > 992 ){
        $(this).find(".dopwown-menu").stop().slideToggle();
        
    }
  });
  $(".page-dropdown i").on('click', function(){


  if ( $(this).hasClass("fa-angle-down") ) { 
    $(this).removeClass("fa-angle-down"); 
    $(this).addClass("fa-angle-up");
  }
  else { 
    $(this).removeClass("fa-angle-up"); 
    $(this).addClass("fa-angle-down"); 

  }

    $(this).parent().find(".dopwown-menu").stop().slideToggle();
});
    // ===================
    //10 - DROP DOWN MENU
    //====================
  $(".toggle_nav button").on("click", function(){
          $("nav").stop().slideToggle();
   });

    // ===================
    //11 - NUMBER ANIMATION
    //====================

var animate_numbers = function(){
  if($('#num_animat').length){
    if( $(window).scrollTop() > ( $('#num_animat').offset().top - $(window).height() ))
    {
      var percent_number_step = $.animateNumber.numberStepFactories.append(' %');

      $('.animation-line').each(function(){
        startAnimate($(this));
      });
    }
  }

  function startAnimate(obj){
    var timeAnimatin = 3000;
    var finishNumber = parseInt(obj.data('number'),10);
    
    var foo = obj.parent().parent().find(".after-graph");
    foo.animate({'width':100 - finishNumber+'%'},timeAnimatin);

    obj.animateNumber(
      {
        number: finishNumber,
        easing: 'easeInQuad',

        numberStep: percent_number_step
      },
        timeAnimatin
      );
    
  }
};
var animate_numbers_2 = function(){
  if($('.client-bg').length){
    if( $(window).scrollTop() > ( $('.client-bg').offset().top - $(window).height() ) )
    {

      $('.client-bg h1').each(function(){
        startAnimate($(this));
      });
    }
  }

  function startAnimate(obj){
    var timeAnimatin = 3000;
    var finishNumber = parseInt(obj.data('number'),10);
    var percent_number_step = $.animateNumber.numberStepFactories.append(' ');
    obj.animateNumber(
      {
        number: finishNumber,
        easing: 'easeInQuad',
        numberStep: percent_number_step
      },
        timeAnimatin
      );
    
  }
};
  // ===================
  //12 - MENU GOING
  //====================

  var num_a = 0;
    $('.nav-item a').on('click', function(){
        if($(window).width() < 991)  $(".cmn-toggle-switch").click();
        num_a = $('.nav-item a').index(this);
        if($(window).width() < 991){
          $('body,html').animate({'scrollTop':$('.menu-go').eq(num_a).offset().top - 85},1000);          
        } else{
          $('body,html').animate({'scrollTop':$('.menu-go').eq(num_a).offset().top-70},1000);          
        }

        return false;
    });
    $("footer i").on('click', function(){
      $('body,html').animate({'scrollTop':0},1000);
    });

  // ===================
  //13 - CHECK SCROLLING
  //====================
  function checkScrollig(){
    var winScroll = $(window).scrollTop();
    if($('.menu-go').length){
      $('.menu-go').each(function( index, element ) {
        if($(window).width() < 991){
          if($(this).offset().top<=(winScroll+86) && ($(this).offset().top+$(this).height()) > (winScroll+86) ){
            $('nav a').removeClass('yellow');
            $('nav a').eq(index).addClass('yellow');
            var newHAsh = $(this).attr("id");
            if(window.location.hash != '#'+newHAsh) window.location.hash = newHAsh;
          }
        } else{
          if($(this).offset().top<=(winScroll+75) && ($(this).offset().top+$(this).height()) > (winScroll+75) ){
            $('nav a').removeClass('yellow');
            $('nav a').eq(index).addClass('yellow');
            var newHAsh = $(this).attr("id");
            if(window.location.hash != '#'+newHAsh) window.location.hash = newHAsh;
          }
        }       
      });
    }
  }

    /*=====================*/
    //14 - ANIMSITION    
    /*=====================*/
    if($(".animsition").length){
      $(".animsition").animsition({
    inClass               :   'zoom-in-sm',
    outClass              :   'zoom-out-sm',
    inDuration            :    800,
    outDuration           :    800,
    linkElement           :   '.animsition-link',
       // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
    loading               :    true,
    loadingParentElement  :   'body', 
    loadingClass          :   'animsition-loading',
    unSupportCss          : [ 'animation-duration',
            '-webkit-animation-duration',
            '-o-animation-duration'
          ],
    overlay               :   false,

    overlayClass          :   'animsition-overlay-slide',
    overlayParentElement  :   'body'
     });
    }  

    /*=====================*/
    //15 - LIGHT-BOX    
    /*=====================*/
    
    /*activity indicator functions*/
    var activityIndicatorOn = function(){
        $( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );
    };
    var activityIndicatorOff = function(){
        $( '#imagelightbox-loading' ).remove();
    };
    
    /*close button functions*/
    var closeButtonOn = function(instance){
        $( '<button type="button" id="imagelightbox-close" title="Close"></button>' ).appendTo( 'body' ).on( 'click touchend', function(){ $( this ).remove(); instance.quitImageLightbox(); return false; });
    };
    var closeButtonOff = function(){
        $( '#imagelightbox-close' ).remove();
    };
    
    /*overlay*/
    var overlayOn = function(){$( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );};
    var overlayOff = function(){$( '#imagelightbox-overlay' ).remove();};
    
    /*caption*/
    var captionOff = function(){$( '#imagelightbox-caption' ).remove();};
    var captionOn = function(){
        var description = $( 'a[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"] img' ).attr( 'alt' );
        var author = $( 'a[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"] img' ).attr( 'data-author' );
        if( description.length > 0 && author.length > 0){
          $( '<div id="imagelightbox-caption">' + description + '<span>/</span>' + author +'</div>' ).appendTo( 'body' );
          } else if ( description.length > 0){
            $( '<div id="imagelightbox-caption">' + description +'</div>' ).appendTo( 'body' );
          }
    };

    /*arrows*/
    var arrowsOn = function( instance, selector ){
        var $arrows = $( '<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"><i class="fa fa-chevron-left"></i></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"><i class="fa fa-chevron-right"></i></button>' );
        $arrows.appendTo( 'body' );
        $arrows.on( 'click touchend', function( e )
        {
            e.preventDefault();
            var $this   = $( this ),
                $target = $( selector + '[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"]' ),
                index   = $target.index( selector );
            if( $this.hasClass( 'imagelightbox-arrow-left' ) )
            {
                index = index - 1;
                if( !$( selector ).eq( index ).length )
                    index = $( selector ).length;
            }
            else
            {
                index = index + 1;
                if( !$( selector ).eq( index ).length )
                    index = 0;
            }
            instance.switchImageLightbox( index );
            return false;
        });
    };
    var arrowsOff = function(){$( '.imagelightbox-arrow' ).remove();};  
    if($('.lightbox').length){        
    var selectorG = '.lightbox';        
    var instanceG =$(selectorG).imageLightbox({
        quitOnDocClick: false,
        onStart:        function() {arrowsOn( instanceG, selectorG );overlayOn(); closeButtonOn(instanceG); },
        onEnd:          function() {arrowsOff();captionOff(); overlayOff(); closeButtonOff(); activityIndicatorOff(); },
        onLoadStart:    function() {captionOff(); activityIndicatorOn(); },
        onLoadEnd:      function() {$( '.imagelightbox-arrow' ).css( 'display', 'block' );captionOn(); activityIndicatorOff(); }
    });
	}
	
	if ($('input').length){
	$('input, textarea').placeholder(); 
	}
	
	  //==============================
	  // 05 - function on page resize 
	  //==============================
	  function resizeCall(){
		pageCalculations();
		$('.swiper-container').each(function(){
		  swipers[$(this).attr('data-init')].reInit();
		});
	  }
	  $(window).resize(function(){
		resizeCall();
	  });
	  window.addEventListener("orientationchange", function() {
		resizeCall();
	  }, false); 
	
	  //============================
	  // 04 - function on page load 
	  //============================
	  $(window).load(function(){   
		pageCalculations();
		initSwiper();
		scrollF();
		animate_numbers();
		if (!$("body").hasClass("no-scrolling")){checkScrollig();}
		animate_numbers_2();  
		resizeCall();
	  });

});