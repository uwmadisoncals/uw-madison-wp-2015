jQuery (document ).ready(function($){

/**
 * ----------------------------------------------------------------------------
 *
 *  Detect for IE and apply body class.
 *
 * ----------------------------------------------------------------------------
 */

function getInternetExplorerVersion()
{
  var rv = -1;
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  else if (navigator.appName == 'Netscape')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}


//If its IE, place "IE" and IE version number class on body tag
if(getInternetExplorerVersion() != "-1") {
	var bodyClass = "IE" + getInternetExplorerVersion();
	$("body").addClass("IE").addClass(bodyClass);
}


/**
 * ----------------------------------------------------------------------------
 *
 *  Apply fast click polyfill for mobile browsers
 *
 * ----------------------------------------------------------------------------
 */
 
FastClick.attach(document.body);

/**
 * ----------------------------------------------------------------------------
 *
 *  Detect Browser and Mobile and apply it as a class to the body element
 *
 * ----------------------------------------------------------------------------
 */
 
var browser = BrowserDetect.browser;


$("body").addClass(browser);

var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
};

var mobileBrowser = isMobile.any();  //will return true of false

if( mobileBrowser ) {
    $('body').addClass("mobile");
}


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
   
   if(mobileBrowser) {
	   $(".site-header").css("top","0px").css("position","fixed");
	   
	   if(st > headerHeight) {
		   $(".site-header").addClass("red");
	   } else {
		   $(".site-header").removeClass("red");
	   }
	   
   } else { 
   
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
 $(".site-navigation-container .menu > ul > li, .site-navigation-container ul.menu > li").each(function() {
		totalWidth = totalWidth  + $(this).width();
		//console.log(totalWidth);
 });
 
  
 function mobileMenu() {
	  var windowWidth = $(window).width();
	  var menuWidth = $(".site-navigation-container .menu").width();
	  //console.log(menuWidth);
	   /*$(".menu > ul > li").each(function() {
			totalWidth = totalWidth  + $(this).width();
 		});*/
	 
	 //console.log(totalWidth + " " + menuWidth);

	 if(windowWidth < 600) {
		$("#site-navigation").css("visibility","hidden").css("height","0px");
		$(".mobileTrigger").addClass("shown");
		$(".logoImage").addClass("mobileMenuOn");
		$(".site-header").addClass("mobileOn");
		$("body").addClass("mobileNavOn");
	 } else {
	 
		 if(totalWidth > menuWidth) {
			 //console.log("switch to mobile");
			 $("#site-navigation").css("visibility","hidden").css("height","0px");
			 $(".mobileTrigger").addClass("shown");
			 $(".logoImage").addClass("mobileMenuOn");
			 $(".site-header").addClass("mobileOn");
			 $("body").addClass("mobileNavOn");
		 } else {
			 if(totalWidth == 0) {
				 //console.log("switch to mobile");
				 $("#site-navigation").css("visibility","hidden").css("height","0px");
				 $(".mobileTrigger").addClass("shown");
				 $(".logoImage").addClass("mobileMenuOn");
				 $(".site-header").addClass("mobileOn");
				 $("body").addClass("mobileNavOn");
			 } else {
				 //console.log("switch to full");
				 $("#site-navigation").css("visibility","visible").css("height","auto");
				 $(".mobileTrigger").removeClass("shown");
				 $(".logoImage").removeClass("mobileMenuOn");
				 $(".site-header").removeClass("mobileOn");
				 $("body").removeClass("mobileNavOn");
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


$(".mobileMenu li.page_item_has_children > a").click(function(e) {
	e.preventDefault();
	e.stopPropagation();
	
	var subItems = $(this).next().html();
	var clickedLinkTitle = $(this).text() + " Overview";
	var clickedLinkHref = $(this).attr("href");
	
	var overviewLink = "<li><a href='"+clickedLinkHref+"'>"+clickedLinkTitle+"</a></li>";
	var backLink = '<li class="subLevel1Back"><a href="#"><span><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,128.4 319.7,96 160,256 160,256 160,256 319.7,416 352,383.6 224.7,256 "/></svg></span> Back</a></li>';
	
	
	$(".mobileMenu .subLevel1").html(subItems).prepend(overviewLink).prepend(backLink).addClass("visible");
	
	$(".mobileMenu .subLevel1Back > a").click(function(b) {
		b.preventDefault();
		b.stopPropagation();
		
		$(".mobileMenu .subLevel1").removeClass("visible");
	});
	
	$(".mobileMenu .subLevel1 li.page_item_has_children > a").click(function(c) {
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
			
			$(".mobileMenu .subLevel2").removeClass("visible");
		});
		
	});
	
});


/**
 * ----------------------------------------------------------------------------
 *
 *  Sidebar menu logic additions
 *
 * ----------------------------------------------------------------------------
 */

$(".sidebar_menu.expanded .current_link").closest(".children").prev().addClass("immediateParent");




/**
 * ----------------------------------------------------------------------------
 *
 *  Setup Hero Image Carousel for Home Page
 *
 * ----------------------------------------------------------------------------
 */
 
	/*$(".owl-carousel").owlCarousel({
		items: 1,
		nav:true,
		loop: true,
		dots: true
	});*/
	
	$('.main-gallery').flickity({
	  // options
	  cellAlign: 'left',
	  contain: true,
	  wrapAround: true
	});
	



/**
 * ----------------------------------------------------------------------------
 *
 *  Setup Isotope for Tiles Homepage Layout
 *
 * ----------------------------------------------------------------------------
 */
 
 	
	/*$('.tilesWrapper').isotope({
	  
	  masonry: {
	  	
    	columnWidth: '.tile-sizer',
    	gutter: '.gutter-sizer'
  		},
  		
	  itemSelector: '.tile-item',
	  percentPosition: true
	});*/
	
	
	

  var $grid = $('.grid').isotope({
    itemSelector: '.grid-item',
    percentPosition: true,
    masonry: {
      columnWidth: '.grid-sizer',
      gutter: '.gutter-sizer'
     
    }
  });
  
  $grid.imagesLoaded().progress( function() {
	  $grid.isotope('layout');
	});



/**
 * ----------------------------------------------------------------------------
 *
 *  3D Tiles logic
 *
 * ----------------------------------------------------------------------------
 */

 

  var lastScrollTop = 0;
  var lastScrollLeft = 0;
  var scrollTimeout;

  /*$(window).scroll(function() {

    var st = $(this).scrollTop();
    var sl = $(this).scrollLeft();

    if (sl > lastScrollLeft) {
      $(".tiltWrapper").each(function() {

        var rotateelem = $(this).find(".tiltPanel");

        var maxdeg = $(this).attr("data-maxangle");

        if (!maxdeg) {
          //default to 10deg throw when no max angle is defined in attribute.
          var maxdeg = 10;
        }
        
        
        var tiltdepth = $(this).closest(".tiltWrapper").attr("data-tiltdepth");
    
	    if (!tiltdepth) {
			
	      //default to 10deg throw when no max angle is defined in attribute.
	      var tiltdepth = 70;
	    }

        var rotation = "transform: rotateY(-" + maxdeg + "deg); transform-origin: center center 80px; transition: 0.7s transform; -webkit-transform: rotateY(-" + maxdeg + "deg); -webkit-transition: 0.7s transform;";
        $(rotateelem).attr("style", rotation);
      });
    } else {
      $(".tiltWrapper").each(function() {

        var rotateelem = $(this).find(".tiltPanel");

        var maxdeg = $(this).attr("data-maxangle");

        if (!maxdeg) {
          //default to 10deg throw when no max angle is defined in attribute.
          var maxdeg = 10;
        }

        var rotation = "transform: rotateY(" + maxdeg + "deg); transform-origin: center center 80px; transition: 0.7s transform; -webkit-transform: rotateY(" + maxdeg + "deg); -webkit-transition: 0.7s transform;";
        $(rotateelem).attr("style", rotation);
      });
    }

    if (st > lastScrollTop) {
      // downscroll code

      $(".tiltWrapper").each(function() {

        var rotateelem = $(this).find(".tiltPanel");

        var maxdeg = $(this).attr("data-maxangle");

        if (!maxdeg) {
          //default to 10deg throw when no max angle is defined in attribute.
          var maxdeg = 10;
        }

        //console.log("scrolling down");
        var rotation = "transform: rotateX(" + maxdeg + "deg); transition: 0.7s transform; -webkit-transform: rotateX(" + maxdeg + "deg); -webkit-transition: 0.7s transform;";
        $(rotateelem).attr("style", rotation);
      });
    } else if (st < lastScrollTop) {
      // upscroll code
      clearTimeout(scrollTimeout);

      $(".tiltWrapper").each(function() {

        var rotateelem = $(this).find(".tiltPanel");

        var maxdeg = $(this).attr("data-maxangle");

        if (!maxdeg) {
          //default to 10deg throw when no max angle is defined in attribute.
          var maxdeg = 10;
        }

        var rotation = "transform: rotateX(-" + maxdeg + "deg); transition: 0.7s transform; -webkit-transform: rotateX(-" + maxdeg + "deg); -webkit-transition: 0.7s transform;";
        $(rotateelem).attr("style", rotation);
      });

    }

    lastScrollTop = st;

    clearTimeout($.data(this, 'scrollTimer'));
    $.data(this, 'scrollTimer', setTimeout(function() {

      $(".tiltWrapper").each(function() {
        var rotateelem = $(this).find(".tiltPanel");
        var rotation = "transform: rotateX(0deg) rotateY(0deg); transition: 0.8s transform; -webkit-transform: rotateX(0deg) rotateY(0deg); -webkit-transition: 0.8s transform;";
        $(rotateelem).attr("style", rotation);
      });
    }, 100));

  });*/

  $("a.tiltAction").mousedown(function(event) {
    var elem = $(this).closest(".tiltWrapper");
    $(elem).addClass("pressed");
  });

  $("a.tiltAction").mouseup(function(event) {
    var elem = $(this).closest(".tiltWrapper");
    $(elem).removeClass("pressed");
  });

  $("a.tiltAction").mouseout(function(event) {
    var reflectionelem = $(this).next().find(".reflection");
    $(reflectionelem).css("opacity", "0");
  });

  $("a.tiltAction").mousemove(function(event) {
    var wrapperelem = $(this).closest(".tiltWrapper");
    
    $(wrapperelem).css("z-index","10");
    
    var rotateelem = $(this).next(".tiltPanel");
    var reflectionelem = $(this).next().find(".reflection");

    
    var tiltdepth = $(this).closest(".tiltWrapper").attr("data-tiltdepth");
    
    if (!tiltdepth) {
		
      //default to 10deg throw when no max angle is defined in attribute.
      var tiltdepth = 70;
    }
    
    
    var maxdeg = $(this).closest(".tiltWrapper").attr("data-maxangle");

    if (!maxdeg) {

      //default to 10deg throw when no max angle is defined in attribute.
      var maxdeg = 10;
    }

    var elemoffset = $(this).offset();
    var elemwidth = $(this).width();
    var elemheight = $(this).height();

    var cursorX = event.pageX - elemoffset.left;
    var cursorY = event.pageY - elemoffset.top;

    if (cursorX < (elemwidth / 2)) {
      var perX = (cursorX / (elemwidth / 2)) - 1;
      var opacityX = 1 - (cursorX / (elemwidth / 2));
      var degX = Math.floor(maxdeg * perX);
      var refX = elemwidth - cursorX;

    } else {
      var perX = 1 - (cursorX / (elemwidth / 2));
      var opacityX = (cursorX / (elemwidth / 2)) - 1;
      var degX = Math.floor(-(maxdeg * perX));
      var refX = elemwidth - cursorX;
    }

    if (cursorY < (elemheight / 2)) {
      var perY = 1 - (cursorY / (elemheight / 2));
      var degY = Math.floor(maxdeg * perY);
      var refY = elemheight - cursorY;
    } else {
      var perY = (cursorY / (elemheight / 2)) - 1;
      var degY = Math.floor(-(maxdeg * perY));
      var refY = elemheight - cursorY;
    }

    var rotation = "transform: rotateX(" + degY + "deg) rotateY(" + degX + "deg); -webkit-transform: rotateX(" + degY + "deg) rotateY(" + degX + "deg); transform-origin: center center 0px"+tiltdepth+"px; -webkit-transform-origin: center center "+tiltdepth+"px;";
    $(rotateelem).attr("style", rotation);

    var reflection = "transform: translate(" + refX + "px, " + refY + "px); -webkit-transform: translate(" + refX + "px, " + refY + "px); opacity: " + opacityX + ";";
    $(reflectionelem).attr("style", reflection);

  });

  $("a.tiltAction").mouseout(function() {
    var rotateelem = $(this).next(".tiltPanel");
    
    var wrapperelem = $(this).closest(".tiltWrapper");
    
    var tiltdepth = $(this).closest(".tiltWrapper").attr("data-tiltdepth");
    
    if (!tiltdepth) {
	   
      //default to 10deg throw when no max angle is defined in attribute.
      var tiltdepth = 70;
    }
    
    $(wrapperelem).css("z-index","");
	if(browser == "Firefox") {
		var rotation = "transform: rotateX(0deg) rotateY(0deg); transform-origin: center center "+tiltdepth+"px; transition: 0s transform; -webkit-transform: rotateX(0deg) rotateY(0deg); -webkit-transition: 0s transform; -webkit-transform-origin: center center "+tiltdepth+"px;";
	} else {
		var rotation = "transform: rotateX(0deg) rotateY(0deg); transform-origin: center center "+tiltdepth+"px; transition: 1.0s transform; -webkit-transform: rotateX(0deg) rotateY(0deg); -webkit-transition: 1.0s transform; -webkit-transform-origin: center center "+tiltdepth+"px;";
	}
    
    $(rotateelem).attr("style", rotation);
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
			$("#ajaxResults").attr("style","").html("");
			$("input[name='s']").val("");
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
 *  Search AJAX Logic
 *
 * ----------------------------------------------------------------------------
 */	
 	var searchUiHeight = $(".searchUI").height();
 	var remainingHeight = $(window).height();
 	var resultsMinHeight = remainingHeight - searchUiHeight;
 	var bodyHeight = $("body").height();

 	$(".searchUI form.search-form").submit(function(e) {
	 	e.preventDefault();
	 	
	 	var searchTerm = $(this).find("input[name='s']").val();
	 	var fixedSearchTerm = searchTerm.split(' ').join('+');
	 	var searchUrl = templateUrl + "/?s=" + fixedSearchTerm + " #main";
	 	
	 	$(".searchUI").addClass("searching");
		 	
	 	
	 	
	 	$( "#ajaxResults" ).load( searchUrl, function() {
		  //completed loading results
		  $("#ajaxResults").css("height",resultsMinHeight);
		  $(".searchUI").removeClass("searching");
		  
		  setTimeout(function() {
			  window.scrollTo(0, 0);
			  $("#ajaxResults").css("height","auto");
			  $(".searchUI").css("position","absolute");
		  },500);
		});
 	});
 	
 	$(window).resize(function() {
	 	searchUiHeight = $(".searchUI").height();
	 	remainingHeight = $(window).height();
 		resultsMinHeight = remainingHeight - searchUiHeight;
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
		//used on pages
		if ($(".sidebar_menu")[0]){
			$("#content").addClass("has_nav"); 
		} else {
			$("#content").removeClass("has_nav"); 
		}
		
		
		//used on posts
		if ($(".post-content .widget-area")[0]) {
			$(".content-area").addClass("span-66 right_margin"); 
		} else {
			$(".content-area").removeClass("span-66 right_margin"); 
		}
		
		
	}
	   
	setContentWidth();
	
	
/**
 * ----------------------------------------------------------------------------
 *
 *  wrap widget-area for styles
 *
 * ----------------------------------------------------------------------------
 */	
 	$( ".widget-area ul li a" ).each(function( index ) {
		$(this).wrapInner( "<span class='nav_text'></span>");
	});
});




