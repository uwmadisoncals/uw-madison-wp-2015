jQuery (document ).ready(function($){


/**
 * ----------------------------------------------------------------------------
 *
 *  Sticky header when scrolling up
 *
 * ----------------------------------------------------------------------------
 */
 
var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   var header = $(".site-header").offset().top;
   var headerHeight = $(".site-header").height();
   var navHeight = $("#site-navigation").height();
   var navPos = $("#site-navigation").offset().top;
   var mobileOn = $(".site-header").hasClass("mobileOn");
   var brandingHeight = $(".site-branding").height();
   //brandingHeight = "-" + brandingHeight;
   var headerPlacement = st - headerHeight;
   
   if (st > lastScrollTop){
       // downscroll code
       
       header = $(".site-header").offset().top;
       $(".site-header").css("top",header).removeClass("sticky");
       
       
       
       if(st > (header+headerHeight)) {
       	$(".site-header").css("top",headerPlacement);
       	//console.log(headerPlacement);
       }
   } else {
      // upscroll code
      
      if(!mobileOn) {
	      if(st <= navPos) {
		      $(".site-header").addClass("sticky").css("top","-100px");
	      }
      } else {
	      if(st <= header) {
		  		$(".site-header").addClass("sticky").css("top","0px");
      		}
      }
      
      
   }
   
   if(st > headerHeight) {
	   $(".site-header").addClass("red");
   } else {
	   $(".site-header").removeClass("red");
   }
   
   if(!mobileOn) {
	   if(st < brandingHeight) {
	   		$(".site-header").removeClass("red").removeClass("sticky").css("top","0px");
   		}
	} else {
		if(st < 1) {
		$(".site-header").removeClass("red").removeClass("sticky").css("top","0px");
   		}
	}
   
   
    
   lastScrollTop = st;
});
	
	
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
		$("#site-navigation").css("visibility","hidden").css("height","0px");
		$(".mobileTrigger").show();
		$(".logoImage").addClass("mobileMenuOn");
		$(".site-header").addClass("mobileOn");
	 } else {
	 
		 if(totalWidth > menuWidth) {
			 //console.log("switch to mobile");
			 $("#site-navigation").css("visibility","hidden").css("height","0px");
			 $(".mobileTrigger").show();
			 $(".logoImage").addClass("mobileMenuOn");
			 $(".site-header").addClass("mobileOn");
		 } else {
			 if(totalWidth == 0) {
				 //console.log("switch to mobile");
				 $("#site-navigation").css("visibility","hidden").css("height","0px");
				 $(".mobileTrigger").show();
				 $(".logoImage").addClass("mobileMenuOn");
				 $(".site-header").addClass("mobileOn");
			 } else {
				 //console.log("switch to full");
				 $("#site-navigation").css("visibility","visible").css("height","auto");
				 $(".mobileTrigger").hide();
				 $(".logoImage").removeClass("mobileMenuOn");
				 $(".site-header").removeClass("mobileOn");
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
	
	var searchVisible = false;
	
	$(".searchTrigger, .searchClose, .searchResultsOverlay").click(function(e) {
		e.preventDefault();
		
		if(searchVisible) {
			$(".searchUI").toggleClass("visible").attr("aria-hidden","true");
			$("#page").toggleClass("blur");
			$(".searchResultsOverlay").toggleClass("visible").attr("aria-hidden","true");
			setTimeout(function() {
				$(".searchUI input.search-field").blur();
			},100);
			
			searchVisible = false;
		} else {
			
			$(".searchUI").toggleClass("visible").attr("aria-hidden","false");
			$("#page").toggleClass("blur");
			$(".searchResultsOverlay").toggleClass("visible").attr("aria-hidden","false");
			setTimeout(function() {
				$(".searchUI input.search-field").focus();
			},500);
			
			searchVisible = true;
		}
		
		
		
		
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
	
	
/**
 * ----------------------------------------------------------------------------
 *
 *  Set the width of a page depending on if there is a side nav
 *
 * ----------------------------------------------------------------------------
 */	
	
	function setContentWidth(){
		if ($(".sidebar_menu")[0]){
			$("#content").addClass("has_nav"); 
		} else {
			$("#content").removeClass("has_nav"); 
		}
	}
	   
	setContentWidth();

});



