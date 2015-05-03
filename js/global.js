jQuery (document ).ready(function($){

/**
 * ----------------------------------------------------------------------------
 *
 *  Mobile Menu Logic
 *
 * ----------------------------------------------------------------------------
 */
 

 var menuWidth = $(".menu").width();
 var totalWidth = 0;
 $(".menu > ul > li").each(function() {
		totalWidth = totalWidth  + $(this).width();
 });
 
  
 function mobileMenu() {
	  
	  var menuWidth = $(".menu").width();
	   /*$(".menu > ul > li").each(function() {
			totalWidth = totalWidth  + $(this).width();
 		});*/
	 
	 console.log(totalWidth + " " + menuWidth);

	 
	 if(totalWidth > menuWidth) {
		 console.log("switch to mobile");
		 $("#site-navigation").css("visibility","hidden");
		 $(".mobileTrigger").show();
		 $(".logoImage").addClass("mobileMenuOn");
	 } else {
		 if(totalWidth == 0) {
			 console.log("switch to mobile");
			 $("#site-navigation").css("visibility","hidden");
			 $(".mobileTrigger").show();
			 $(".logoImage").addClass("mobileMenuOn");
		 } else {
			 console.log("switch to full");
			 $("#site-navigation").css("visibility","visible");
			 $(".mobileTrigger").hide();
			 $(".logoImage").removeClass("mobileMenuOn");
		 }
	 }
}

mobileMenu();

$(window).resize(function() {
	mobileMenu();
});

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