(function($) {
//this is where we apply opacity to the arrow
$(window).scroll( function(){

  //get scroll position
  var topWindow = $(window).scrollTop();
  //multipl by 1.5 so the arrow will become transparent half-way up the page
  var topWindow = topWindow * 3;
  
  //get height of window
  var windowHeight = $(window).height();
      
  //set position as percentage of how far the user has scrolled 
  var position = topWindow / windowHeight;
  //invert the percentage
  position = 1 - position;

  //define arrow opacity as based on how far up the page the user has scrolled
  //no scrolling = 1, half-way up the page = 0
  $('.arrow-wrap').css('opacity', position);

});


$(window).on('scroll', function() {
  $('.scroll-arrow-indicator').each(function(index, value) {
    if ( $(this).hasClass( "element-visible" ) ) {
      // do nothing
    } else {
      triggerpoint = $(window).height() * .8 + $(window).scrollTop();
      counterElement = $(this).offset().top;
      
      if  (counterElement < triggerpoint) {
        scrollVar = (triggerpoint - counterElement);
        console.log(100/scrollVar);
        $(this).css("opacity", (10 / scrollVar) - .05 );
      }
    };
  });
});




//Code stolen from css-tricks for smooth scrolling:
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
jQuery('.map').click(function(){
  jQuery('.acf-map').css({pointerEvents:'all'});
});

jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 2000
            });
        });

})(jQuery);