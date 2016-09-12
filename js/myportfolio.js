$(function() {
  // fadeInUp
  var $window           = $(window),
      win_height_padded = $window.height() * 1.1;      
  // revealOnScroll2, fadeInUp2, Portfolio 2nd column 
  var $window2          = $(window),
      win_height_padded2 = $window.height() * 1.1;  
  // revealOnScroll3, fadeInUp3 Portfolio 3rd column
  var $window3          = $(window),
      win_height_padded3 = $window.height() * 1.1;  
  // revealOnScrollBar, fadeInLeft
  var $window4          = $(window),
      win_height_padded4 = $window.height() * 1.1;  
  // revealOnScrollBar2, fadeInLeft2
  var $window5          = $(window),
      win_height_padded5 = $window.height() * 1.1; 
  // revealOnScrollBar3, fadeInLeft3
  var $window6          = $(window),
      win_height_padded6 = $window.height() * 1.1;
  // isTouch           = Modernizr.touch;  
      
  var error = false;

// Remove class name 'error' from input textarea
  // $("input,textarea").focus(function() {
  //   $(this).removeClass("error");
  //   error = false;
  // });

// Click settings on email icon to scroll down to contact form
  $('.email').click(function(e) {
    if($(window).width() > 640)
    {
      e.preventDefault(); 
      $("html, body").animate({ scrollTop: $(document).height() }, "slow");
    }
  });
  

// Parallax settings for header top
  if($(window).width() > 640)
  {
    var headerHeight = $('header').height();

    $(document).scroll(function() {
      var pos = $(document).scrollTop();

        var parallax = parseInt(pos * -0.4) + 'px';
        var rgba     = (pos / headerHeight) * 0.4;

        $('.profile').css('margin-top', parallax);
        $('header').css('background', 'rgba(245,245,255,' + rgba);
    });
  }

// reveal text when screen area within viewport *working
 // $(window).scroll(function () {
  //     $('.animation').each(function () {
  //       var imagePos = $(this).offset().top;
  //       var imageHeight = $(this).height();
  //       var topOfWindow = $(window).scrollTop();

  //       if (imagePos < topOfWindow + imageHeight && 
  //           imagePos + imageHeight > topOfWindow) {
  //           $(this).addClass("fadeInLeft");
  //       } else {
  //           $(this).removeClass("fadeInLeft");
  //       }
  //   });
  // });

// revealOnScroll class
  $window.on("scroll", revealOnScroll);
  function revealOnScroll() {
      // var scrolled = $window.scrollTop();
      var scrolled = $window.scrollTop();
      var animate = 'fadeInUp';

      $(".revealOnScroll:not(.animate)").each(function () {    
      // $(".revealOnScroll:not(.fadeInLeft)").each(function () {
        var $this = $(this), offsetTop = $this.offset().top;

        if (scrolled + win_height_padded > offsetTop) {
            if ($this.data('timeout')) {
                window.setTimeout(function() {
                    $this.addClass(animate);
                    // $this.addClass('fadeInLeft ' + $this.data('animation fadeInLeft'));
                }, parseInt($this.data('timeout'),10));
            } else {
                $this.addClass(animate);
                // $this.addClass('fadeInLeft ' + $this.data('animation fadeInLeft'));
            }
        }
      });

      $(".revealOnScroll.fadeInUp").each(function (index) {
          var $this = $(this), offsetTop = $this.offset().top;
          if (scrolled + win_height_padded < offsetTop) {
              $(this).removeClass(animate);
              $this.addClass("fadeOutDown");
          } 
      });
  }
  revealOnScroll();

// revealOnScroll2 class
$window.on("scroll", revealOnScroll2);
  function revealOnScroll2() {
      var scrolled2 = $window.scrollTop();
      var animate2 = 'fadeInUp2';

      $(".revealOnScroll2:not(.animate2)").each(function () {    
        var $this = $(this), offsetTop2 = $this.offset().top;

        if (scrolled2 + win_height_padded2 > offsetTop2) {
            if ($this.data('timeout')) {
                window.setTimeout(function() {
                    $this.addClass(animate2);
                }, parseInt($this2.data('timeout'),10));
            } else {
                $this.addClass(animate2);
            }
        }
      });

      $(".revealOnScroll2.fadeInUp2").each(function (index) {
          var $this = $(this), offsetTop2 = $this.offset().top;        
          if (scrolled2 + win_height_padded2 < offsetTop2) {          
              $(this).removeClass(animate2);
              $this.addClass("fadeOutDown2");
          } 
      });
  }
  revealOnScroll2();

// revealOnScroll3 class
$window.on("scroll", revealOnScroll3);
  function revealOnScroll3() {
      var scrolled3 = $window.scrollTop();
      var animate3 = 'fadeInUp3';

      $(".revealOnScroll3:not(.animate3)").each(function () {    
        var $this = $(this), offsetTop3 = $this.offset().top;

        if (scrolled3 + win_height_padded3 > offsetTop3) {
            if ($this.data('timeout')) {
                window.setTimeout(function() {
                    $this.addClass(animate3);
                }, parseInt($this3.data('timeout'),10));
            } else {
                $this.addClass(animate3);
            }
        }
      });

      $(".revealOnScroll3.fadeInUp3").each(function (index) {
          var $this = $(this), offsetTop3 = $this.offset().top;
          if (scrolled3 + win_height_padded3 < offsetTop3) {
              $(this).removeClass(animate3);
              $this.addClass("fadeOutDown3");
          } 
      });
  }
  revealOnScroll3();

// revealOnScrollBar class
$window.on("scroll", revealOnScrollBar);
  function revealOnScrollBar() {
      var scrolled4 = $window.scrollTop();
      var animate4 = 'fadeInLeft';

      $(".revealOnScrollBar:not(.animate4)").each(function () {          // $(".revealOnScroll:not(.fadeInLeft)").each(function () {
        var $this = $(this), offsetTop4 = $this.offset().top;

        if (scrolled4 + win_height_padded4 > offsetTop4) {
            if ($this.data('timeout')) {
                window.setTimeout(function() {
                    $this.addClass(animate4);
                }, parseInt($this4.data('timeout'),10));
            } else {
                $this.addClass(animate4);
            }
        }
      });

      $(".revealOnScrollBar.fadeInLeft").each(function (index) {
          var $this = $(this), offsetTop4 = $this.offset().top;
          if (scrolled4 + win_height_padded4 < offsetTop4) {
              $(this).removeClass(animate4);
              $this.addClass("fadeOutLeft");
          } 
      });
  }
  revealOnScrollBar();

// revealOnScrollBar2 class
$window.on("scroll", revealOnScrollBar2);
  function revealOnScrollBar2() {
      var scrolled5 = $window.scrollTop();
      var animate5 = 'fadeInLeft2';

      $(".revealOnScrollBar2:not(.animate5)").each(function () {          // $(".revealOnScroll:not(.fadeInLeft)").each(function () {
        var $this = $(this), offsetTop5 = $this.offset().top;

        if (scrolled5 + win_height_padded5 > offsetTop5) {
            if ($this.data('timeout')) {
                window.setTimeout(function() {
                    $this.addClass(animate5);
                }, parseInt($this5.data('timeout'),10));
            } else {
                $this.addClass(animate5);
            }
        }
      });

      $(".revealOnScrollBar2.fadeInLeft2").each(function (index) {
          var $this = $(this), offsetTop5 = $this.offset().top;
          if (scrolled5 + win_height_padded5 < offsetTop5) {
              $(this).removeClass(animate5);
              $this.addClass("fadeOutLeft2");
          } 
      });
  }
  revealOnScrollBar2();

// revealOnScrollBar3 class
$window.on("scroll", revealOnScrollBar3);
  function revealOnScrollBar3() {
      var scrolled6 = $window.scrollTop();
      var animate6 = 'fadeInLeft3';

      $(".revealOnScrollBar3:not(.animate6)").each(function () {          // $(".revealOnScroll:not(.fadeInLeft)").each(function () {
        $(this).removeClass("fadeOutLeft3");
        var $this = $(this), offsetTop6 = $this.offset().top;

        if (scrolled6 + win_height_padded6 > offsetTop6) {
            if ($this.data('timeout')) {
                window.setTimeout(function() {
                    
                    $this.addClass(animate6);
                }, parseInt($this6.data('timeout'),10));
            } else {
                $this.addClass(animate6);
            }
        }
      });

      $(".revealOnScrollBar3.fadeInLeft3").each(function (index) {
          var $this = $(this), offsetTop6 = $this.offset().top;
          if (scrolled6 + win_height_padded6 < offsetTop6) {
              $(this).removeClass(animate6);
              $this.addClass("fadeOutLeft3");
          } 
      });
  }
  revealOnScrollBar3();
});
