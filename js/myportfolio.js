$(function() {

  var error = false;
// Remove class name 'error' from input textarea
  $("input,textarea").focus(function() {
    $(this).removeClass("error");
    error = false;
  });

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
        $('header').css('background', 'rgba(248,248,255,' + rgba);
    });
  }

});

