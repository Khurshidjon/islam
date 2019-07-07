(function ($) {
	"use strict";
/*--document ready functions--*/
    jQuery(document).ready(function($){
        
        /*----- event counter activation -----*/
        var eventCounter = $('.counter')
            eventCounter.countDown();
        
        /*---- festival masonay activation with image load  ------*/
            var Container =$('.container'); 
                Container.imagesLoaded( function() {
                    var festivarMasonry = $('.festival-masonary').isotope({
                          layoutMode: 'fitRows',
                          itemSelector: '.grid-item'
                        });
                    $(document).on('click','.festival-menu ul li', function() {
                      var filterValue = $(this).attr('data-filter');
                      festivarMasonry.isotope({ filter: filterValue });
                    });
            });
        
        /*---- festival menu active  ------*/
        var portfolioMenu = '.festival-menu ul li';
        $(document).on('click',portfolioMenu,function(){
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
        
        /* counter section activation  */
             var counternumber = $('.count-number strong'); 
                counternumber.counterUp({
                  delay: 20,
                  time: 5000
                });
        
        /*--magnific popup Image Activation--*/
        var imgPopUp =$('.image-popup')
            imgPopUp.magnificPopup({
              
              gallery: {
                enabled: true
              },
              image: {
                titleSrc: 'title'
              },
                type: 'image'
                
        });
        /*magnific popup*/
         var videoPlayBtn = $('.video-play-btn');
         videoPlayBtn.magnificPopup({
             type:'video'
         });
         /*--progressing bar activation start--*/
        var percentageCount = $('#prog-one,#prog-two,#prog-three,#prog-five');
        percentageCount.RobinProgressbar({
            percentage: 70,
            height: '6px',
        });
        
        /*--donator carousel activate--*/
        var donator = $('.donator-carousel');
            donator.owlCarousel({
            loop:true,
            dots:true,
            nav:false,
            center:true,
            autoplay:true,
            responsive : {
              0 : {
                  items: 1
              },
              768 : {
                  items: 1
              },
              960 : {
                  items: 1
              },
              1200 : {
                  items: 1
              },
              1920 : {
                  items: 1
              }
            }
        }); 
        
        /*--Header carousel activate--*/
        var donator = $('.header-carousel-active');
            donator.owlCarousel({
            loop:true,
            nav:false,
            dots:true,
            autoplay:true,
            responsive : {
              0 : {
                  items: 1
              },
              768 : {
                  items: 1
              },
              960 : {
                  items: 1
              },
              1200 : {
                  items: 1
              },
              1920 : {
                  items: 1
              }
            }
        }); 
        
        /*--Product carousel activate--*/
        var product = $('.product-carousel');
            product.owlCarousel({
            loop:true,
            dots:true,
            nav:true,
            navText:['<i class="icofont icofont-simple-left"></i>','<i class="icofont icofont-simple-right"></i>'],
            autoplay:true,
            responsive : {
              0 : {
                  items: 1
              },
              768 : {
                  items: 2
              },
              960 : {
                  items: 3
              },
              1200 : {
                  items: 4
              },
              1920 : {
                  items: 4
              }
            }
        }); 
        
        /*bottom to top*/
        $(document).on('click','.scroll-to-top i',function(){
           $("html,body").animate({
                scrollTop: 0
            }, 1000);
        });
        
        /*active class add and remove*/
        $(document).on('click','.donate-amount li',function(){
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
        
        /*date picker activation*/
        var datepicker = $( "#datepicker" );
            datepicker.datepicker();
        
        /*Image Thumb Handler*/
        $(document).on('click','.single-product-thumb-box img',function(){
            var imgUrl = $(this).attr('src');
            $('.product-main-thumb img').attr('src',imgUrl)
        });
        
        
        /*Range Slider Activation*/
        var rangeSlider = $( "#range" );
        rangeSlider.slider({
            range:true,
            min:100,
            max:1000,
            values:[100,400],
            steps:20,
            slide:function(e,ui){
               $('#min').text(ui.values[0]) 
               $('#max').text(ui.values[1]) 
            }
        });
        
        /*shopping cart quantity increment / descrement*/
       $(document).on('click','#minus',function(){
           var qrt = $('#quant').text();
           qrt--;
           $('#quant').text(qrt);
       });
       $(document).on('click','#plus',function(){
           var qrt = $('#quant').text();
           qrt++;
           $('#quant').text(qrt);
       }); 
        $(document).on('click','#minus_two',function(){
           var qrt = $('#quant_two').text();
           qrt--;
           $('#quant_two').text(qrt);
       });
        $(document).on('click','#plus_two',function(){
           var qrt = $('#quant_two').text();
           qrt++;
           $('#quant_two').text(qrt);
       }); 
        $(document).on('click','#minus_three',function(){
           var qrt = $('#quant_three').text();
           qrt--;
           $('#quant_three').text(qrt);
       });
        $(document).on('click','#plus_three',function(){
           var qrt = $('#quant_three').text();
           qrt++;
           $('#quant_three').text(qrt);
       });
        
        /*add audio player*/
        audiojs.events.ready(function() {
            var as = audiojs.createAll();
        });
        
        /*azan button working*/
        $(document).on('click','#azan-btn',function(e){
           e.preventDefault();
            $('.overlay-bg').addClass('active');
            $('.azan-time').addClass('active');
        });
        $(document).on('click','.overlay-bg.active',function(e){
            $('.overlay-bg').removeClass('active');
            $('.azan-time').removeClass('active');
        });
        
        /*Search Icon working*/
        $(document).on('click','#search-icon',function(e){
            e.preventDefault();
           $('.search-box').addClass('active');
        });
        $(document).on('click','#serach-close-btn',function(e){
            e.preventDefault();
           $('.search-box').removeClass('active');
        });
        
        /*--slick Nav Responsive Navbar activation--*/
         var SlicMenu = $('#main-menu');
         SlicMenu.slicknav();
        
        
    });

/*--window Scroll functions--*/
    $(window).on('scroll', function () {
        
      /*--show and hide scroll to top --*/
         var ScrollTop = $('.scroll-to-top');
        if ($(window).scrollTop() > 500) {
                ScrollTop.fadeIn(1000);
        } else {
                ScrollTop.fadeOut(1000);
       }
        
        /*--sticky menu activation--*/
            var mainMenuTop = $('.navbar-section');
            if ($(window).scrollTop() > 300) {
                mainMenuTop.addClass('nav-fixed');
            } else {
                mainMenuTop.removeClass('nav-fixed');
            }
        
        /*--sticky Mobile menu activation--*/
            var mobileMenuTop = $('.slicknav_menu');
            if ($(window).scrollTop() > 300) {
                mobileMenuTop.addClass('nav-fixed');
            } else {
                mobileMenuTop.removeClass('nav-fixed');
            }
        
    });
           
/*--window load functions--*/
    $(window).on('load',function(){
		
        var preLoder = $(".preloader");
        preLoder.fadeOut(1000);
        
		
    });

}(jQuery));	