jQuery (document ).ready(function($){

/**
 * ----------------------------------------------------------------------------
 *
 *  Setup Hero Image Carousel for Home Page
 *
 * ----------------------------------------------------------------------------
 */
 
	$(".owl-carousel").owlCarousel({
		items: 1,
		nav:true,
		loop: true,
		dots: true
	});
	
	
/**
 * ----------------------------------------------------------------------------
 *
 *  Assign header menu controls
 *
 * ----------------------------------------------------------------------------
 */
 
	$(".youruwTrigger").click(function(e) {
		e.preventDefault();
		
		$(".youruwmenu").toggleClass("visible");
		
	});
	
	$(".searchTrigger, .searchClose").click(function(e) {
		e.preventDefault();
		
		$(".searchUI").toggleClass("visible").attr("aria-hidden","false");
		$("#page").toggleClass("blur");
		$(".searchResultsOverlay").toggleClass("visible").attr("aria-hidden","false");
		
	});

 
/**
 * ----------------------------------------------------------------------------
 *
 *  Default Page Height
 *
 * ----------------------------------------------------------------------------
 */
 	function setPageHeight(){
	 	var wH = $(window).height();
		var fH = $("footer").height();
		var hH = $("header").height();
	 
	 	$(".site-main").css("min-height",wH-(hH));
	 }
	 
	 //call once on pageload
	 setPageHeight();
	 
	 $( window ).resize(function() {
	 	setPageHeight();
	 });
});