

// Wrap IIFE around your code
(function($, document, window, viewport ){

  var itemChecker = function(idx, ele){  
      if (viewport.is("xs")) {
          var swiper = new Swiper('.slider-1', {
            breakpoints: {
                320: {
                  slidesOffsetAfter: 5,
                },
                375: {
                  slidesOffsetAfter: -50,
                },
                414: {
                  slidesOffsetAfter: -90,
                },

              },
              slidesPerView: 2,
              lazyLoading: true,
              width: 280,
              slidesOffsetBefore: 0,
              spaceBetween: 5,
              freeMode: false,
              // loop: true,
          });            
          var swiper = new Swiper('.slider-2 ', {
            breakpoints: {
                320: {
                  slidesOffsetAfter: 5,
                },
                375: {
                  slidesOffsetAfter: -50,
                },
                414: {
                  slidesOffsetAfter: -90,
                }
              },              
              slidesPerView: 1,
              lazyLoading: true,
              width: '280',
              slidesOffsetBefore: -5,
              spaceBetween: 0,
              freeMode: false,
              // loop: true,
          });
          var swiper = new Swiper('.slider-3 ', {        
              slidesPerView: 3,
              lazyLoading: true,
              width: 280,
              slidesOffsetBefore: 0,
              spaceBetween: 15,
              // loop: true
          });
          var swiper = new Swiper('.slider-4 ', {
              slidesPerView: 'auto',
              lazyLoading: true,
              width: 280,
              slidesOffsetBefore: 0,
            //   spaceBetween: 15,
            //   loop: true,ss
          });
          var swiper = new Swiper('.slider-5 ', {
            slidesPerView: 'auto',
            lazyLoading: true,
            width: 280,
            slidesOffsetBefore: 0,
          //   spaceBetween: 15,
          //   loop: true,ss
        });
          var swiper = new Swiper('.slider-6 ', {
              slidesPerView: 3,
              lazyLoading: true,
              width: 280,
              slidesOffsetBefore: 15,
              spaceBetween: 15,
              // loop: true,
          }); 
          var swiper = new Swiper('.slider-8 ', {
            breakpoints: {
                320: {
                  slidesOffsetAfter: 5,
                },
                375: {
                  slidesOffsetAfter: -50,
                },
                414: {
                  slidesOffsetAfter: -90,
                }
              },              
              slidesPerView: 1,
              lazyLoading: true,
              width: '280',
              slidesOffsetBefore: 0,
              spaceBetween: 0,
              freeMode: false,
              // loop: true,
          });                    
      }
      if (viewport.is("sm")) {
      }
      if (viewport.is("md")) {   
        var mySwiper = new Swiper('.slider-8', {
          slidesPerView: 2,
          // centeredSlides: true,
          keyboardControl: true,
          autoplay: false,
          // spaceBetween: 20,
          // freeMode: true,
          // loop: false,
          lazyLoading: true,
          // pagination: '.swiper-pagination',

        });       
      }                
      if (viewport.is("lg")) {
        
      }
      if (viewport.is("xl")) {    
          // var swiper = new Swiper(' .slider-2' , {
          //     lazyLoading: true,
          //     width: 160,
          //     slidesOffsetBefore: -5,
          //     // loop: true,
          // });   
          var swiper = new Swiper('.slider-3 ', {        
              slidesPerView: 6,
              lazyLoading: true,
              slidesOffsetBefore: 0,
              // loop: true
          });
          var swiper = new Swiper(' .slider-5' , {
              lazyLoading: true,
              width: 80,
              // slidesOffsetBefore: -5,
              spaceBetween: 20,
              // loop: true,
          });               
          var swiper = new Swiper(' .slider-6' , {
              lazyLoading: true,
              width: 80,
              // slidesOffsetBefore: -5,
              spaceBetween: 20,
              // loop: true,
          });      
          var mySwipers = new Swiper('.swiper-7', {
            slidesPerView: 1,
            // centeredSlides: true,
            keyboardControl: true,
            autoplay: false,
            // spaceBetween: 20,
            // freeMode: true,
            // loop: false,
            lazyLoading: true,
            // pagination: '.swiper-pagination',
            paginationClickable: true,
            spaceBetweenSlides: 0,
            slidesOffsetBefore : 0,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'
          });  
          var mySwiper = new Swiper('.slider-8', {
            slidesPerView: 4,
            // centeredSlides: true,
            keyboardControl: true,
            autoplay: false,
            // spaceBetween: 20,
            // freeMode: true,
            // loop: false,
            lazyLoading: true,
            // pagination: '.swiper-pagination',

          });       

          // $('.sliderTujuh').click(function() { 
          //   alert('click');
          //   console.log(this);
          //   $(this).dblclick(); 
          // });
          $('.sliderTujuh').on('click', function(e) {
            // mySwiper.init()
            // alert('a');
            var paneTarget = $(e.target).attr('data-target');
            // console.log(paneTarget);
            var $thePane = $('.tab-pane' + paneTarget);
            // console.log($thePane);
            var paneIndex = $thePane.index();
            // console.log(paneIndex);
            if ($thePane.find('.swiper-container').length > 0) {
              setTimeout(function () {
                mySwipers[paneIndex].init();      
              }, 100);
              
              // console.log($thePane);
            }
          });
          // $('.sliderTujuh').on("click",function(){ 
          //    reinitializeSwiper(swiper);
          // });

          // function reinitializeSwiper(swiper) {
          //     setTimeout(function () {
          //         mySwipers.update();       
          //     }, 400);
          // }    
      }
  }

  $(document).ready(function() {
      itemChecker();
      console.log('Current breakpoint:', viewport.current());
  });
  $(window).resize(
      viewport.changed(function(){
          itemChecker();
          console.log('Current breakpoint:', viewport.current());
      })
  ); 
})(jQuery, document, window, ResponsiveBootstrapToolkit);


  

  $('.nav-tabs').on('shown.bs.tab', function(e) {
    $('a:first').addClass('active') // Select first tab
  });

  $('ul.pagination li:first-child span').html('<i class="icon-chevron-left"></>');
  $('ul.pagination li:last-child span').html('<i class="icon-chevron-right"></>');
  $('ul.pagination li:first-child a').html('<i class="icon-chevron-left"></>');
  $('ul.pagination li:last-child a').html('<i class="icon-chevron-right"></>');


