$ = jQuery;

$(function() {
    // Handler for .ready() called.
    console.log('senorcoders ready');
  $('.homeCarousel').carousel({
    interval: false
}); 
    $('#offerCarousel').on('slide.bs.carousel', function (result) {
    $('#homeCarousel').carousel(result.to);

})

  

  
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    mouseDrag: false,
    autoPlay: true,
    touchDrag: false,    
    responsive:{
        0:{
            items:1,
            nav:false,
            dots:true,
            slideBy: 4,
        },
        600:{
            items:2,
            nav:false,
            dots:true,
            slideBy: 4,
        },
        1000:{
            items:3,
            nav:false,
            dots:true,
            slideBy: 4
        }
    }
});
});


$(document).ready(function() {
  	jQuery(document).scroll(function(){
    	if (jQuery(document).scrollTop()>300) {
    		jQuery('.lower-header').addClass("menu-scroll");
        jQuery('.top-header').css('display', 'none');
    	}
    	else{
    		jQuery('.lower-header').removeClass("menu-scroll");
        jQuery('.top-header').css('display', 'block');
    	}
	});
  
  

});

