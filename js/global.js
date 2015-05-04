jQuery (document ).ready(function($){
	
	
/**
 * ----------------------------------------------------------------------------
 *
 *  Hide Menus When clicking elsewhere
 *
 * ----------------------------------------------------------------------------
 */

$(window).click(function(e) {
	
	
	//close your uw menu
	$(".youruwmenu").removeClass("visible");
	
});



/**
 * ----------------------------------------------------------------------------
 *
 *  Mobile Menu Logic
 *
 * ----------------------------------------------------------------------------
 */
 

 var menuWidth = $(".site-navigation-container .menu").width();
 var totalWidth = 0;
 $(".site-navigation-container .menu > ul > li").each(function() {
		totalWidth = totalWidth  + $(this).width();
 });
 
  
 function mobileMenu() {
	  var windowWidth = $(window).width();
	  var menuWidth = $(".site-navigation-container .menu").width();
	   /*$(".menu > ul > li").each(function() {
			totalWidth = totalWidth  + $(this).width();
 		});*/
	 
	 //console.log(totalWidth + " " + menuWidth);

	 if(windowWidth < 600) {
		$("#site-navigation").css("visibility","hidden");
		$(".mobileTrigger").show();
		$(".logoImage").addClass("mobileMenuOn");
	 } else {
	 
		 if(totalWidth > menuWidth) {
			 //console.log("switch to mobile");
			 $("#site-navigation").css("visibility","hidden");
			 $(".mobileTrigger").show();
			 $(".logoImage").addClass("mobileMenuOn");
		 } else {
			 if(totalWidth == 0) {
				 //console.log("switch to mobile");
				 $("#site-navigation").css("visibility","hidden");
				 $(".mobileTrigger").show();
				 $(".logoImage").addClass("mobileMenuOn");
			 } else {
				 //console.log("switch to full");
				 $("#site-navigation").css("visibility","visible");
				 $(".mobileTrigger").hide();
				 $(".logoImage").removeClass("mobileMenuOn");
			 }
		 }
	 
	 }
}

mobileMenu();

$(window).resize(function() {
	mobileMenu();
});

$(".mobileTrigger, .menuOverlay").click(function(e) {
	e.preventDefault();
	
	$(".mobileMenu").toggleClass("mobileMenuShown");
	$(".menuOverlay").toggleClass("mobileMenuShown");
	$("#page").toggleClass("blur");
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
		e.stopPropagation();
		
		$(".youruwmenu").toggleClass("visible");
		
	});
	
	$(".searchTrigger, .searchClose, .searchResultsOverlay").click(function(e) {
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
	 
	 
	 
/**
 * ----------------------------------------------------------------------------
 *
 *  Spotlight image resizing
 *
 * ----------------------------------------------------------------------------
 */
	$('.box').each(function() {
	    //set size
	    var th = $(this).height(),//box height
	        tw = $(this).width(),//box width
	        im = $(this).children('img'),//image
	        ih = im.height(),//inital image height
	        iw = im.width();//initial image width
	    if (ih>iw) {//if portrait
		    
	        im.addClass('ww').removeClass('wh');//set width 100%
	    } else {//if landscape
		    
	        im.addClass('wh').removeClass('ww');//set height 100%
	    }
	    //set offset
	    var nh = im.height(),//new image height
	        nw = im.width(),//new image width
	        hd = (nh-th)/2,//half dif img/box height
	        wd = (nw-tw)/2;//half dif img/box width
	    if (nh<nw) {//if portrait
		    
	        im.css({marginLeft: '-'+wd+'px', marginTop: 0});//offset left
	    } else {//if landscape
		    
	        im.css({marginTop: '-'+hd+'px', marginLeft: 0});//offset top
	    }
	});

});