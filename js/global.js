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
		      $(".site-header").addClass("sticky").css("top","-"+brandingHeight+"px");
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
	$(".youruwmenu, .subLevel1, .subLevel2").removeClass("visible");
	
	
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


$("li.page_item_has_children > a").click(function(e) {
	e.preventDefault();
	e.stopPropagation();
	
	var subItems = $(this).next().html();
	var clickedLinkTitle = $(this).text() + " Overview";
	var clickedLinkHref = $(this).attr("href");
	
	var overviewLink = "<li><a href='"+clickedLinkHref+"'>"+clickedLinkTitle+"</a></li>";
	var backLink = '<li class="subLevel1Back"><a href="#"><span><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,128.4 319.7,96 160,256 160,256 160,256 319.7,416 352,383.6 224.7,256 "/></svg></span> Back</a></li>';
	
	
	$(".mobileMenu .subLevel1").html(subItems).prepend(overviewLink).prepend(backLink).addClass("visible");
	
	$(".subLevel1Back > a").click(function(b) {
		b.preventDefault();
		b.stopPropagation();
		
		console.log("hit a");
		$(".mobileMenu .subLevel1").removeClass("visible");
	});
	
	$(".subLevel1 li.page_item_has_children > a").click(function(c) {
		c.preventDefault();
		c.stopPropagation();
		
		var subItems = $(this).next().html();
		var clickedLinkTitle = $(this).text() + " Overview";
		var clickedLinkHref = $(this).attr("href");
		
		var overviewLink = "<li><a href='"+clickedLinkHref+"'>"+clickedLinkTitle+"</a></li>";
		var backLink = '<li class="subLevel2Back"><a href="#"><span><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,128.4 319.7,96 160,256 160,256 160,256 319.7,416 352,383.6 224.7,256 "/></svg></span> Back</a></li>';
		
		
		$(".mobileMenu .subLevel2").html(subItems).prepend(overviewLink).prepend(backLink).addClass("visible");
		
		$(".subLevel2Back > a").click(function(b) {
			b.preventDefault();
			b.stopPropagation();
			
			console.log("hit b");
			$(".mobileMenu .subLevel2").removeClass("visible");
		});
		
	});
	
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



