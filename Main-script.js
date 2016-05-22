$(document).ready(function(){ 
$(window).bind('scroll', function(){
 if($(window).scrollTop() > 10 ){
 $('.introtext').css({opacity: '0'});
 $('.scrollbutton').css({opacity: '0'}); 
 }

 else{
 $('.introtext').css({opacity: '1'});
 $('.scrollbutton').css({opacity: '1'}); 
 }
 });
});

$(document).ready(function($){
  // browser window scroll (in pixels) after which the "back to top" link is shown
  var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
    offset_opacity = 1200,
    //duration of the top scrolling animation (in ms)
    scroll_top_duration = 700,
    //grab the "back to top" link
    $upwards = $('.up');

  //smooth scroll to main
  $upwards.on('click', function(event){
    event.preventDefault();
    $('body,html').animate({
      scrollTop: $('#header').offset().top-0 ,
      }, scroll_top_duration
    );
  });

});
