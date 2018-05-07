/**
 * ----------------------------------------------------------------------------
 *
 *  Preloader Cover
 *
 * ----------------------------------------------------------------------------
 */

$(window).on("load", function() {
  //remove the load cover once images are loaded.
  $(".loadCover").fadeOut(300);
});

jQuery(document).ready(function($) {
  /**
   * ----------------------------------------------------------------------------
   *
   *  Detect for IE and apply body class.
   *
   * ----------------------------------------------------------------------------
   */

  function getInternetExplorerVersion() {
    var rv = -1;
    if (navigator.appName == "Microsoft Internet Explorer") {
      var ua = navigator.userAgent;
      var re = new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");
      if (re.exec(ua) != null) rv = parseFloat(RegExp.$1);
    } else if (navigator.appName == "Netscape") {
      var ua = navigator.userAgent;
      var re = new RegExp("Trident/.*rv:([0-9]{1,}[.0-9]{0,})");
      if (re.exec(ua) != null) rv = parseFloat(RegExp.$1);
    }
    return rv;
  }

  //If its IE, place "IE" and IE version number class on body tag
  if (getInternetExplorerVersion() != "-1") {
    var bodyClass = "IE" + getInternetExplorerVersion();
    $("body")
      .addClass("IE")
      .addClass(bodyClass);
  }

  /**
   *
   *
   * 	Directory Filter Scripts
   *
   *
   */

  //Regular Expression Search Filter Auto Complete
  $(".directorys").keyup(function() {
    var filter = $(this).val(),
      count = 0;
    $(this).attr("value", filter);

    var searchinput = $(this);

    var resultscounted = 0;

    $(searchinput)
      .closest(".directoryWrapper")
      .find(".directoryListing:first li")
      .each(function() {
        if (
          $(this)
            .text()
            .search(new RegExp(filter, "i")) < 0
        ) {
          $(this).addClass("hidden");
          $(this).removeClass("visible");
        } else {
          $(this).removeClass("hidden");
          $(this).addClass("visible");

          $(".filtered .visible").each(function(index) {
            $(this).attr("data-counted", resultscounted);
            resultscounted = resultscounted + 1;
          });

          count++;
        }
      });
  });

  $(".directorygroups").keyup(function() {
    var filter = $(this).val(),
      count = 0;
    $(this).attr("value", filter);

    var searchinput = $(this);

    var resultscounted = 0;

    $(searchinput)
      .closest(".directoryWrapper")
      .find(".accordion_wrapper .accordion_row")
      .each(function() {
        if (
          $(this)
            .find(".accordion_title")
            .text()
            .search(new RegExp(filter, "i")) < 0
        ) {
          $(this).addClass("hidden");
          $(this).removeClass("visible");
        } else {
          $(this).removeClass("hidden");
          $(this).addClass("visible");

          $(".filtered .visible").each(function(index) {
            $(this).attr("data-counted", resultscounted);
            resultscounted = resultscounted + 1;
          });

          count++;
        }
      });
  });

  $(".contentfilters").keyup(function() {
    var filter = $(this).val(),
      count = 0;
    $(this).attr("value", filter);

    var searchinput = $(this);

    var resultscounted = 0;

    $(searchinput)
      .closest(".contentFilterWrapper")
      .find(".contentListing li, .contentListing p, .contentListing > div")
      .each(function() {
        if (
          $(this)
            .text()
            .search(new RegExp(filter, "i")) < 0
        ) {
          $(this).addClass("hidden");
          $(this).removeClass("visible");
        } else {
          $(this).removeClass("hidden");
          $(this).addClass("visible");

          $(".filtered .visible").each(function(index) {
            $(this).attr("data-counted", resultscounted);
            resultscounted = resultscounted + 1;
          });

          count++;
        }
      });
  });

  /**
   * ----------------------------------------------------------------------------
   *
   *  Documentation Page Theme AJAX Logic
   *
   * ----------------------------------------------------------------------------
   */

  $(".docs_sidebar > ul > li.page_item_has_children").each(function() {
    //var licontainschildren = $(this).closest("li");
    //console.log(licontainschildren);

    //if(licontainschildren == true) {
    $(this).prepend("<button>+</button>");
    //}
  });

  $(".docs_sidebar > ul > li button").click(function() {
    //console.log("clicked");
    $(this).toggleClass("active");
    $(this)
      .parent()
      .find(".children")
      .toggle();
  });

  $(".documentationSideBar a").click(function(e) {
    e.preventDefault();

    var linkhref = $(this).attr("href");
    linkhref = linkhref + " #docContent > *";

    $(".docLoadBar").css("width", "20%");

    var newLoadedHtml = $(this).attr("href");

    //if ( history.pushState ) {
    History.pushState(null, newLoadedHtml, newLoadedHtml);
    //}

    /*$( "#docContent" ).load( linkhref, function() {
console.log("called load click");
		document.title = $("#docContent .entry-title").text();
		//alert( "Load was performed." );
		//console.log("grabbed it");
		$(".docLoadBar").css("width", "100%");

		setTimeout(function() {
			$(".docLoadBar").css("opacity", "0");
		},500);

		setTimeout(function() {
			$(".docLoadBar").css("width", "0%");

		},1000);

		setTimeout(function() {

			$(".docLoadBar").css("opacity", "1");
		},1500);
	});*/
  });

  if ($("#page").hasClass("documentationSection")) {
    window.onpopstate = function(event) {
      //alert("location: " + document.location + ", state: " + JSON.stringify(event.state));
      //console.log(document.location);

      var linkhref = document.location.href;
      linkhref = linkhref + " #docContent > *";

      $("#docContent").load(linkhref, function() {
        console.log("called load pop");
        document.title = $("#docContent .entry-title").text();
        //alert( "Load was performed." );
        //console.log("grabbed it");
        $(".docLoadBar").css("width", "100%");

        setTimeout(function() {
          $(".docLoadBar").css("opacity", "0");
        }, 500);

        setTimeout(function() {
          $(".docLoadBar").css("width", "0%");
        }, 1000);

        setTimeout(function() {
          $(".docLoadBar").css("opacity", "1");
        }, 1500);
      });
    };
  }
  //if ( history.pushState ) {
  /*History.adapter.bind(window, "statechange", function() {
        //menuLink.removeClass("active");
        //$("a[href='" + History.getState().title + "']").addClass("active");
        $('.documentationSection #docContent').load(document.location.href, function(responseText) {
            document.title = $(responseText).filter("title").text();
        });
    });*/
  //}

  /**
   * ----------------------------------------------------------------------------
   *
   *  Dynamic Logo Text Sizing  **BETA** Currently Inactive
   *
   * ----------------------------------------------------------------------------
   */
  /*var adjust2;
 var adjust;
 var newfontsize;
 var currentfontsize = $(".mainTitle").css("font-size");

 var fontfirsttime = true;

 function adjustTitleSize() {


	 //currentfontsize = $(".mainTitle").css("font-size");
	 //console.log(currentfontsize);
	 //currentfontsize = String(currentfontsize);

	 if(fontfirsttime) {
		 //console.log(currentfontsize);
	 	currentfontsize = currentfontsize.substring(0, currentfontsize.length - 2);

	 }
	 var newfontsize = currentfontsize - 1;
	 $(".mainTitle").css("font-size",newfontsize);


	 var titleContainer = $(".mainTitle").height();


	 //console.log(titleContainer);

	 $(".mainTitle").css("font-size",newfontsize);
		 setTimeout(function() {
			 titleContainer = $(".mainTitle").width();

			 if(titleContainer > 50) {
				 fontfirsttime = false;
				 adjustTitleSize();
			 } else {
				 console.log("all set!");
			 }


		 },50);
		 currentfontsize = newfontsize;
		 //console.log(newfontsize);
		fontfirsttime = false;

 }



adjustTitleSize();

adjust = setInterval(adjustTitleSize(), 5000);*/

  (function($) {
    $.fn.textfill = function(options) {
      var fontSize = options.maxFontPixels;
      var ourText = $("span:visible:first", this);
      var maxHeight = $(this).height();
      var maxWidth = $(this).width();
      var textHeight;
      var textWidth;

      do {
        ourText.css("font-size", fontSize);
        textHeight = ourText.height();
        textWidth = ourText.width();
        fontSize = fontSize - 1;
        //console.log("maxheight: " + maxHeight + "  maxWidth: " + maxWidth + "  textHeight: " + textHeight + "  textWidth: " + textWidth);
      } while (
        (textHeight > maxHeight || textWidth > maxWidth) &&
        fontSize > 3
      );
      return this;
    };
  })(jQuery);

  setTimeout(function() {
    $(".primaryTitle").textfill({ maxFontPixels: 26 });
    $(".subTitle").textfill({ maxFontPixels: 12 });
  }, 100);

  $(window).resize(function() {
    $(".primaryTitle").textfill({ maxFontPixels: 26 });
    $(".subTitle").textfill({ maxFontPixels: 12 });
  });

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
   *  Button Pressed GUI Actions
   *
   * ----------------------------------------------------------------------------
   */

  $("a.button").mousedown(function() {
    $(this).addClass("pressed");
  });

  $("a.button").mouseup(function() {
    $(this).removeClass("pressed");
  });

  /*
 * ----------------------------------------------------------------------------
 *
 * String formatting
 *
 * ----------------------------------------------------------------------------
 */

  $(".phone").text(function(i, text) {
    return text.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
  });

  /**
   * ----------------------------------------------------------------------------
   *
   *  Remote Content scripting
   *
   * ----------------------------------------------------------------------------
   */

  function evaluateColor() {
    var cors = false;

    //Detect browser support for CORS
    if ("withCredentials" in new XMLHttpRequest()) {
      /* supports cross-domain requests */
      //console.log("CORS supported (XHR)");
      cors = true;
    } else if (typeof XDomainRequest !== "undefined") {
      //Use IE-specific "CORS" code with XDR
      //console.log("CORS supported (XDR)");
      cors = true;
    } else {
      //Time to retreat with a fallback or polyfill
      //console.log("No CORS Support!");
      cors = false;
    }

    $(".gridstyle2 .tiltWrapper").each(function() {
      var griditem = $(this);

      var img = $(this).find("img");
      img.crossOrigin = "Anonymous";

      var imgC = img[0];

      if (imgC) {
        var imgSrc = imgC.getAttribute("src");
        //console.log("normal: " + imgSrc);
      } else {
        var imgSrc = $(this)
          .find(".heroImageFixedHeight")
          .attr("data-imgurl");

        //console.log("background: " + imgSrc);
      }

      if (imgSrc) {
        var imgN = new Image();

        imgN.crossOrigin = "Anonymous";
        imgN.src = imgSrc;
        //console.log(imgN);
        imgN.onload = function() {
          //console.log("blah");
          var colorThief = new ColorThief();
          var color = colorThief.getColor(imgN);

          var brighter = 100;

          var color1 = color[0] + brighter;
          if (color1 > 255) {
            color1 = 255;
          }

          var color2 = color[1] + brighter;
          if (color2 > 255) {
            color2 = 255;
          }

          var color3 = color[2] + brighter;
          if (color3 > 255) {
            color3 = 255;
          }

          var newColor =
            "rgba(" + color1 + ", " + color2 + ", " + color3 + ", 1.0)";
          var newShadow =
            "0px 18px 65px rgba(" +
            color1 +
            ", " +
            color2 +
            ", " +
            color3 +
            ", 0.5)";
          /*console.log("test");
				console.log(newColor);*/

          $(griditem)
            .find(".author, .category")
            .css("color", newColor);
          $(griditem)
            .find(".tiltPanel .level1")
            .css("box-shadow", newShadow);
        };
      }
    });

    if ($("#page").hasClass("tiledPosts")) {
      /*$(".grid-item").each(function() {

			var griditem = $(this);

			var img = $(this).find("img");
			img.crossOrigin = 'Anonymous';


			var imgC = img[0];


			var imgSrc = imgC.getAttribute("src");






			var imgN = new Image();
			imgN.onload = function () {
			 	var colorThief = new ColorThief();
			 	var color = colorThief.getColor(imgN);
			 	var newColor = "rgba(" + color[0] + ", " +color[1]+ ", " +color[2]+ ", 1.0)";

			 	$(griditem).find("h2").css("color",newColor);
			}

			imgN.crossOrigin = 'Anonymous';
			imgN.src = imgSrc;





		});*/
    }
  }

  var remotecount = 0;

  $(".remoteContent").each(function() {
    remotecount = remotecount + 1;

    var spinner = $(this).find(".loadingWrapper");
    var remoteelem = "remotelocation" + remotecount;
    $(this).addClass(remoteelem);
    var remoteurl = $(this).attr("data-remoteurl");

    //console.log(remoteurl);

    $.ajax({
      url: remoteurl,
      success: function(data) {
        $(spinner).hide();
        var post = data.shift(); // The data is an array of posts. Grab the first one.
        //console.log(data);

        $(data).each(function() {
          //console.log(this.title.rendered);

          var postdate = new Date(this.date);

          var newrow = "<div class='row'><a href='";
          newrow = newrow + this.link;
          newrow = newrow + "'>" + this.title.rendered + "</a>";

          newrow = newrow + "<p>" + this.excerpt.rendered + "</p>";

          newrow =
            newrow +
            "<div class='date'>" +
            (postdate.getMonth() + 1) +
            "/" +
            postdate.getDate() +
            "/" +
            postdate.getFullYear() +
            "</div>";
          $("." + remoteelem).append(newrow);
        });

        $(".remotePost").attr("href", post.link);
        $(".remotePost #quote-title").text(post.title.rendered);
        $("#quote-content").html(post.excerpt.rendered);

        // If the Source is available, use it. Otherwise hide it.
        if (
          typeof post.custom_meta !== "undefined" &&
          typeof post.custom_meta.Source !== "undefined"
        ) {
          $("#quote-source").html("Source:" + post.custom_meta.Source);
        } else {
          $("#quote-source").text("");
        }
      },
      cache: true
    });
  });

  var highlightedremotecount = 0;

  $(".highlightremoteContent").each(function() {
    var elemcontainer = $(this);
    highlightedremotecount = highlightedremotecount + 1;

    var spinner = $(this).find(".loadingWrapper");
    var remoteelem = "highlightedremotelocation" + highlightedremotecount;

    $(this).addClass(remoteelem);
    var remoteurl = $(this).attr("data-remoteurl");
    //console.log(remoteurl);

    $.ajax({
      url: remoteurl,
      success: function(data) {
        $(spinner).hide();
        var post = data.shift(); // The data is an array of posts. Grab the first one.
        //onsole.log(remoteelem);

        var remoteDate = new Date(post.date);

        var m_names = new Array(
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December"
        );

        var day = remoteDate.getDate();
        var curr_date = remoteDate.getDate();
        var monthIndex = remoteDate.getMonth();
        var year = remoteDate.getFullYear();

        var sup = "";
        if (curr_date == 1 || curr_date == 21 || curr_date == 31) {
          sup = "st";
        } else if (curr_date == 2 || curr_date == 22) {
          sup = "nd";
        } else if (curr_date == 3 || curr_date == 23) {
          sup = "rd";
        } else {
          sup = "th";
        }

        $(elemcontainer)
          .find(".remotePost")
          .attr("href", post.link);
        $(elemcontainer)
          .find(".whiteContent h2")
          .html(post.title.rendered);
        $(elemcontainer)
          .find(".whiteContent .excerpt")
          .html(post.excerpt.rendered);
        $(elemcontainer)
          .find(".whiteContent .numericdate")
          .text(year + "" + monthIndex + "" + day);
        $(elemcontainer)
          .find(".whiteContent .dateposted")
          .text(m_names[monthIndex] + " " + curr_date + sup + ", " + year);

        var authorurl = post._links["author"][0].href;
        var mediaurl = post._links["wp:featuredmedia"][0].href;

        var categoryurl =
          "https://ecals.cals.wisc.edu/wp-json/wp/v2/categories/" +
          post.categories[0];
        //console.log(categoryurl);

        //pull featured media
        $.ajax({
          url: mediaurl,
          success: function(mediadata) {
            var mediareadyurl = mediadata.guid.rendered;
            //onsole.log(mediareadyurl);
            var bgimg =
              "background: url(" +
              mediadata.media_details.sizes.medium_large.source_url +
              ") no-repeat; background-size: cover; background-position: center center; ";

            $(elemcontainer)
              .find(".mediaImg")
              .attr(
                "src",
                mediadata.media_details.sizes.medium_large.source_url
              );
            //$(elemcontainer).find(".mediaImg").attr("src",mediadata.guid.rendered);
            $(elemcontainer)
              .find(".heroImageBlurInner")
              .attr("style", bgimg);
            $(elemcontainer)
              .find(".heroImageFixedHeight")
              .attr("style", bgimg);
          },

          complete: function() {
            setTimeout(function() {
              $grid.isotope("layout");
              $grid2col.isotope("layout");
              $grid3col.isotope("layout");
              evaluateColor();
            }, 200);
          },
          cache: true
        });

        //pull author
        $.ajax({
          url: authorurl,
          success: function(authordata) {
            //onsole.log(mediareadyurl);
            //var bgimg = "background: url("+mediareadyurl+") no-repeat; background-size: cover; background-position: center center; ";

            $(elemcontainer)
              .find(".author")
              .text("By " + authordata.name);

            //$(elemcontainer).find(".mediaImg").attr("src",mediadata.guid.rendered);
            //$(elemcontainer).find(".heroImageBlurInner").attr("style",bgimg);
            //$(elemcontainer).find(".heroImageFixedHeight").attr("style",bgimg);
          },

          complete: function() {
            //all done
          },
          cache: true
        });

        //console.log(categoryurl);

        //pull category
        $.ajax({
          url: categoryurl,
          success: function(catdata) {
            $(elemcontainer)
              .find(".category")
              .text(catdata.name);
          },

          complete: function() {
            //all done
          },
          cache: true
        });
      },
      cache: true
    });
  });

  var heroremotecount = 0;
  $(".remoteHero").each(function() {
    var elemcontainer = $(this);
    heroremotecount = heroremotecount + 1;

    var spinner = $(this).find(".loadingWrapper");
    var remoteelem = "heroremotelocation" + heroremotecount;

    $(this).addClass(remoteelem);
    var remoteurl = $(this).attr("data-remoteurl");

    var headersize = $(this).attr("data-headersize");
    //console.log(remoteurl);

    $.ajax({
      url: remoteurl,
      success: function(data) {
        $(spinner).hide();
        var post = data.shift(); // The data is an array of posts. Grab the first one.
        //onsole.log(remoteelem);

        var remoteDate = new Date(post.date);

        var m_names = new Array(
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December"
        );

        var day = remoteDate.getDate();
        var curr_date = remoteDate.getDate();
        var monthIndex = remoteDate.getMonth();
        var year = remoteDate.getFullYear();

        var sup = "";
        if (curr_date == 1 || curr_date == 21 || curr_date == 31) {
          sup = "st";
        } else if (curr_date == 2 || curr_date == 22) {
          sup = "nd";
        } else if (curr_date == 3 || curr_date == 23) {
          sup = "rd";
        } else {
          sup = "th";
        }

        $(elemcontainer)
          .find(".heroHeading")
          .attr("href", post.link);
        $(elemcontainer)
          .find(".heroHeading h1")
          .html(post.title.rendered);
        //$(elemcontainer).find( '.whiteContent .excerpt' ).html( post.excerpt.rendered );
        //$(elemcontainer).find(".whiteContent .numericdate").text(year +""+ monthIndex +""+ day);
        //$(elemcontainer).find(".whiteContent .dateposted").text(m_names[monthIndex] +" "+ curr_date + sup +", " + year);

        var authorurl = post._links["author"][0].href;
        var mediaurl = post._links["wp:featuredmedia"][0].href;

        var categoryurl =
          "https://ecals.cals.wisc.edu/wp-json/wp/v2/categories/" +
          post.categories[0];
        //console.log(categoryurl);

        //pull featured media
        $.ajax({
          url: mediaurl,
          success: function(mediadata) {
            var mediareadyurl = mediadata.guid.rendered;
            //onsole.log(mediareadyurl);
            var bgimg =
              "background: url(" +
              mediadata.media_details.sizes.large.source_url +
              ") no-repeat; background-size: cover; background-position: center center; min-height:" +
              headersize +
              "px; ";

            //console.log($(elemcontainer).html());
            $(elemcontainer).attr("style", bgimg);
            //$(elemcontainer).find(".mediaImg").attr("src",mediadata.guid.rendered);
            //$(elemcontainer).find(".heroImageBlurInner").attr("style",bgimg);
            //$(elemcontainer).find(".heroImageFixedHeight").attr("style",bgimg);
          },

          complete: function() {
            setTimeout(function() {
              $grid.isotope("layout");
              $grid2col.isotope("layout");
              $grid3col.isotope("layout");
              evaluateColor();
            }, 200);
          },
          cache: true
        });

        //pull author
        $.ajax({
          url: authorurl,
          success: function(authordata) {
            //onsole.log(mediareadyurl);
            //var bgimg = "background: url("+mediareadyurl+") no-repeat; background-size: cover; background-position: center center; ";

            $(elemcontainer)
              .find(".author")
              .text("By " + authordata.name);

            //$(elemcontainer).find(".mediaImg").attr("src",mediadata.guid.rendered);
            //$(elemcontainer).find(".heroImageBlurInner").attr("style",bgimg);
            //$(elemcontainer).find(".heroImageFixedHeight").attr("style",bgimg);
          },

          complete: function() {
            //all done
          },
          cache: true
        });

        //console.log(categoryurl);

        //pull category
        $.ajax({
          url: categoryurl,
          success: function(catdata) {
            $(elemcontainer)
              .find(".category")
              .text(catdata.name);
          },

          complete: function() {
            //all done
          },
          cache: true
        });
      },
      cache: true
    });
  });

  /**
   * --------------------------------------------------
   *
   *  Setup Facstaff pages
   *
   * --------------------------------------------------
   */

  $(
    "body.parent-pageid-1560, body.parent-pageid-1562, body.parent-pageid-58602"
  )
    .find(".entry-content link")
    .remove();

  $(
    "body.parent-pageid-1560 .entry-content > p, body.parent-pageid-1562 .entry-content > p, body.parent-pageid-58602 .entry-content > p"
  ).remove();

  $(
    "body.parent-pageid-1560 .entry-content #main a, body.parent-pageid-1562 .entry-content #main a, body.parent-pageid-58602 .entry-content #main a"
  ).each(function() {
    var item = $(this);
    var itemext = $(this).attr("href");

    itemext = itemext.replace(/\.[^/.]+$/, "");

    $(item).attr("href", itemext);
  });

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
      return (
        isMobile.Android() ||
        isMobile.BlackBerry() ||
        isMobile.iOS() ||
        isMobile.Opera() ||
        isMobile.Windows()
      );
    }
  };

  var mobileBrowser = isMobile.any(); //will return true of false

  if (mobileBrowser) {
    $("body").addClass("mobile");
  }

  /**
   * ----------------------------------------------------------------------------
   *
   *  Sticky header when scrolling up
   *
   * ----------------------------------------------------------------------------
   */

  /*var lastScrollTop = 0;

var rightHandNav = $("#page").hasClass("rightHandNav");

$(window).scroll(function(event){
   var st = $(this).scrollTop();
   var header = $(".site-header").offset().top;
   var headerHeight = $(".site-header").height();
   var navHeight = $("#site-navigation").height();
   var navPos = $("#site-navigation").offset().top;
   var mobileOn = $(".site-header").hasClass("mobileOn");
   var brandingHeight = $(".site-branding").height();
   var searchUWHeight = $(".search-youruw").height();
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
			      if(rightHandNav) {
				      $(".site-header").addClass("sticky").css("top","-"+searchUWHeight+"px");
				  } else {
					  $(".site-header").addClass("sticky").css("top","-"+brandingHeight+"px");
				  }

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
});*/

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

    $(
      ".main-navigation ul li ul.children, .main-navigation ul li ul.sub-menu"
    ).hide();

    $(".uwresources .menu ul.sub-menu").removeClass("visible");
  });

  $(".uwresources .menu li.menu-item-has-children").each(function() {
    var resourcescount = 0;
    var liparent = $(this);
    var submenu = $(this).find(".sub-menu");
    var submenuli = $(this).find(".sub-menu li");

    $(submenuli).each(function() {
      resourcescount = resourcescount + 1;
    });

    if (resourcescount > 8) {
      $(submenu).addClass("two-column");
    }
    $(liparent).attr("data-items", resourcescount);

    resourcescount = 0;
  });

  /**
   * ----------------------------------------------------------------------------
   *
   *  Ajax Page Loading  **Experimental**
   *
   * ----------------------------------------------------------------------------
   */

  /*
function get_hostname(url) {
    var m = url.match(/^http:\/\/[^/]+/);
    return m ? m[0] : null;
}


$("a").click(function(e) {
	console.log("clicked");

	var url = $(this).attr("href");
	var domain = get_hostname(url) + "/";

	var currentSite = $(location).attr('href');


	if(currentSite == domain) {
		if($("body").hasClass("home")) {
			e.preventDefault();
			console.log("ajax call");
			var urltoload = url + " #content";

			$("#content, .featuredPage").fadeOut(300);
			$(".featureHeader > .main-gallery").slideUp(300);
			$("body").removeClass("home").addClass("page");

			$( "#result" ).load( urltoload, function() {

			  $("#result").fadeIn(300);
			  $("#result #content").addClass("has_nav");
			  window.history.pushState("string", "Title", url);
			});
		}
	}
});

*/

  /**
   * ----------------------------------------------------------------------------
   *
   *  Sidebar Menu Classes
   *
   * ----------------------------------------------------------------------------
   */

  if ($("#page").hasClass("lineSidebar")) {
    $(".sidebar_menu.expanded .current_link")
      .next("ul.children")
      .addClass("currentSub");
  }

  /**
   * ----------------------------------------------------------------------------
   *
   *  Mobile Menu Logic
   *
   * ----------------------------------------------------------------------------
   */

  function mobileMenuRightHand() {
    var windowWidth = $(window).width();
    var menuWidth = $(".site-navigation-container").width() - 30;

    //console.log("menu: " + menuWidth);
    /*$(".menu > ul > li").each(function() {
				totalWidth = totalWidth  + $(this).width();
	 		});*/

    if (windowWidth < 600) {
      $("#site-navigation")
        .css("visibility", "hidden")
        .css("height", "0px");
      $(".mobileTrigger").addClass("shown");
      $(".logoImage").addClass("mobileMenuOn");
      $(".site-header").addClass("mobileOn");
      $("body").addClass("mobileNavOn");
      //console.log("less than 600");
    } else {
      //console.log("greater than 600");

      //console.log(totalWidth + " " + menuWidth);
      if (totalWidth > menuWidth) {
        //console.log("switch to mobile");
        $("#site-navigation")
          .css("visibility", "hidden")
          .css("height", "0px");
        $(".mobileTrigger").addClass("shown");
        $(".logoImage").addClass("mobileMenuOn");
        $(".site-header").addClass("mobileOn");
        $("body").addClass("mobileNavOn");
      } else {
        if (totalWidth == 0) {
          //console.log("switch to mobile");
          $("#site-navigation")
            .css("visibility", "hidden")
            .css("height", "0px");
          $(".mobileTrigger").addClass("shown");
          $(".logoImage").addClass("mobileMenuOn");
          $(".site-header").addClass("mobileOn");
          $("body").addClass("mobileNavOn");
        } else {
          //console.log("switch to full");
          $("#site-navigation")
            .css("visibility", "visible")
            .css("height", "auto");
          $(".mobileTrigger").removeClass("shown");
          $(".logoImage").removeClass("mobileMenuOn");
          $(".site-header").removeClass("mobileOn");
          $("body").removeClass("mobileNavOn");
        }
      }
    }
  }

  function mobileMenu() {
    var windowWidth = $(window).width();
    var menuWidth = $(".site-navigation-container .menu").width();
    //console.log(menuWidth);
    /*$(".menu > ul > li").each(function() {
				totalWidth = totalWidth  + $(this).width();
	 		});*/

    //console.log(totalWidth + " " + menuWidth);

    if (windowWidth < 600) {
      $("#site-navigation")
        .css("visibility", "hidden")
        .css("height", "0px");
      $(".mobileTrigger").addClass("shown");
      $(".logoImage").addClass("mobileMenuOn");
      $(".site-header").addClass("mobileOn");
      $("body").addClass("mobileNavOn");
      //console.log("less than 600");
    } else {
      //console.log("greater than 600");

      //console.log(totalWidth + " " + menuWidth);
      if (totalWidth > menuWidth) {
        //console.log("switch to mobile");
        $("#site-navigation")
          .css("visibility", "hidden")
          .css("height", "0px");
        $(".mobileTrigger").addClass("shown");
        $(".logoImage").addClass("mobileMenuOn");
        $(".site-header").addClass("mobileOn");
        $("body").addClass("mobileNavOn");
      } else {
        if (totalWidth == 0) {
          //console.log("switch to mobile");
          $("#site-navigation")
            .css("visibility", "hidden")
            .css("height", "0px");
          $(".mobileTrigger").addClass("shown");
          $(".logoImage").addClass("mobileMenuOn");
          $(".site-header").addClass("mobileOn");
          $("body").addClass("mobileNavOn");
        } else {
          //console.log("switch to full");
          $("#site-navigation")
            .css("visibility", "visible")
            .css("height", "auto");
          $(".mobileTrigger").removeClass("shown");
          $(".logoImage").removeClass("mobileMenuOn");
          $(".site-header").removeClass("mobileOn");
          $("body").removeClass("mobileNavOn");
        }
      }
    }
  }

  if ($("#page").hasClass("rightHandNav")) {
    //console.log("right hand nav");
    var menuWidth = $(".site-navigation-container").width();

    var totalWidth = 0;
    $(
      ".site-navigation-container .menu > ul > li, .site-navigation-container ul.menu > li"
    ).each(function() {
      totalWidth = totalWidth + $(this).width();
      //console.log(totalWidth);
    });

    mobileMenuRightHand();

    $(window).resize(function() {
      mobileMenuRightHand();
    });
  } else {
    //console.log("not right hand nav");
    var menuWidth = $(".site-navigation-container .menu").width();
    var totalWidth = 0;
    $(
      ".site-navigation-container .menu > ul > li, .site-navigation-container ul.menu > li"
    ).each(function() {
      totalWidth = totalWidth + $(this).width();
      //console.log(totalWidth);
    });

    mobileMenu();

    $(window).resize(function() {
      mobileMenu();
    });
  }

  $(".mobileTrigger, .menuOverlay").click(function(e) {
    e.preventDefault();

    $(".mobileMenu").toggleClass("mobileMenuShown");
    $(".menuOverlay").toggleClass("mobileMenuShown");
    $("#page").toggleClass("blur");
  });

  $(
    ".mobileMenu li.page_item_has_children > a, .mobileMenu li.menu-item-has-children > a"
  ).click(function(e) {
    e.preventDefault();
    e.stopPropagation();

    var subItems = $(this)
      .next()
      .html();
    var clickedLinkTitle = $(this).text() + " Overview";
    var clickedLinkHref = $(this).attr("href");

    var overviewLink =
      "<li><a href='" + clickedLinkHref + "'>" + clickedLinkTitle + "</a></li>";
    var backLink =
      '<li class="subLevel1Back"><a href="#"><span><svg height="512px"  style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,128.4 319.7,96 160,256 160,256 160,256 319.7,416 352,383.6 224.7,256 "/></svg></span> Back</a></li>';

    $(".mobileMenu .subLevel1")
      .html(subItems)
      .prepend(overviewLink)
      .prepend(backLink)
      .addClass("visible");

    $(".mobileMenu .subLevel1Back > a").click(function(b) {
      b.preventDefault();
      b.stopPropagation();

      $(".mobileMenu .subLevel1").removeClass("visible");
    });

    $(
      ".mobileMenu .subLevel1 li.page_item_has_children > a, .mobileMenu .subLevel1 li.menu-item-has-children > a"
    ).click(function(c) {
      c.preventDefault();
      c.stopPropagation();

      var subItems = $(this)
        .next()
        .html();
      var clickedLinkTitle = $(this).text() + " Overview";
      var clickedLinkHref = $(this).attr("href");

      var overviewLink =
        "<li><a href='" +
        clickedLinkHref +
        "'>" +
        clickedLinkTitle +
        "</a></li>";
      var backLink =
        '<li class="subLevel2Back"><a href="#"><span><svg height="512px"  style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,128.4 319.7,96 160,256 160,256 160,256 319.7,416 352,383.6 224.7,256 "/></svg></span> Back</a></li>';

      $(".mobileMenu .subLevel2")
        .html(subItems)
        .prepend(overviewLink)
        .prepend(backLink)
        .addClass("visible");

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

  $(".sidebar_menu.expanded .current_link")
    .closest(".children")
    .prev()
    .addClass("immediateParent");

  /**
   * ----------------------------------------------------------------------------
   *
   *  Setup Hero Image Carousel for Home Page
   *
   * ----------------------------------------------------------------------------
   */

  $(".main-gallery").flickity({
    // options
    cellAlign: "left",
    contain: true,
    wrapAround: true,
    sync: ".gallery-b"
  });

  /*$('.gallery-b').flickity();*/
  $(".gallery-b").flickity({
    // options
    cellAlign: "left",
    contain: true,
    wrapAround: true
  });

  /**
   * ----------------------------------------------------------------------------
   *
   *  Setup Advanced Page Editor Scripts
   *
   * ----------------------------------------------------------------------------
   */

  function apeEditor() {
    var zoom = detectZoom.zoom();
    var device = detectZoom.device();

    //console.log(zoom, device);

    $(".gridstyle2 .grid-item2col").each(function() {
      var item = $(this).find(".tiltWrapper");

      var svg = $(this).find(".highlightContentBlur");

      var svginner = $(this).find(".heroImageBlur");

      var containerHeight = $(item).height();
      var containerWidth = $(item).width();

      containerHeight = containerHeight * zoom * device;
      containerWidth = containerWidth * zoom * device;
      //console.log(containerHeight);
      $(svg).height(containerHeight);
      $(svginner).width(containerWidth);
    });
  }

  //Check on page load.
  apeEditor();

  //delay check in case scripts are delayed
  setTimeout(function() {
    apeEditor();
  }, 500);

  //check on window resize.
  $(window).resize(function() {
    apeEditor();
  });

  /**
   * ----------------------------------------------------------------------------
   *
   *  Accordion Logic
   *
   * ----------------------------------------------------------------------------
   */

  function convertToSlug(Text) {
    return Text.toLowerCase()
      .replace(/[^\w ]+/g, "")
      .replace(/ +/g, "-");
  }
  var hash = location.hash;

  $(".accordion_title").each(function() {
    $(this).attr("href", "#" + convertToSlug($(this).text()));

    var checkhash = $(this).attr("href");
    if (hash == checkhash) {
      //alert('hey');
      var link = $(this);
      var symbol = $(this).find(".symbol");
      var thiscontent = $(this).next(".accordion_content");

      $(link).addClass("open");
      $(symbol).text("-");
      $(thiscontent).slideDown();
    }
  });

  $(".accordion_title").click(function(e) {
    e.preventDefault();

    var link = $(this);
    var symbol = $(this).find(".symbol");
    var thiscontent = $(this).next(".accordion_content");
    var thisrow = $(this).closest(".accordion_row");
    var wrapper = $(this).closest(".accordion_wrapper");

    if ($(link).hasClass("open")) {
      $(wrapper)
        .find(".accordion_content")
        .slideUp();
      $(wrapper)
        .find(".accordion_title")
        .removeClass("open")
        .find(".symbol")
        .text("+");
    } else {
      //location.hash = convertToSlug($(link).text());
      var hash = "#" + convertToSlug($(link).text());
      history.pushState({}, "", hash);
      //$(link).text();
      $(wrapper)
        .find(".accordion_content")
        .slideUp();
      $(wrapper)
        .find(".accordion_title")
        .removeClass("open")
        .find(".symbol")
        .text("+");
      $(link).addClass("open");
      $(symbol).text("-");
      $(thiscontent).slideDown();
    }
  });

  /*$(window).bind('hashchange',function(event){


    $(".accordion_title").each(function() {
		$(this).attr("href", "#"+convertToSlug($(this).text()));

		var link = $(this);
			var symbol = $(this).find(".symbol");
			var thiscontent = $(this).next(".accordion_content");
			var wrapper = $(this).closest(".accordion_wrapper");

			$(wrapper).find(".accordion_content").slideUp();
			$(wrapper).find(".accordion_title").removeClass("open").find(".symbol").text("+");

		var changehash = location.hash;
		var checkhash = $(this).attr("href");
		if(changehash == checkhash) {




			$(link).addClass("open");
			$(symbol).text("-");
			$(thiscontent).slideDown();
		}
	});
});*/

  /*
*
*	Page Builder scroll effects
*
*/
  $(window).scroll(function() {
    if ($(".social_wrapper").visible(true)) {
      $(".social_wrapper").addClass("animate");
    } else {
      $(".social_wrapper").removeClass("animate");
    }

    /*$(".flex-5050").each(function() {
		var flex5050 = $(this);

		if($(flex5050).visible(true)) {
			$(flex5050).find(".flex-leftCol, .flex-rightCol").addClass("animate");
		}
	});*/
  });

  /**
   * ----------------------------------------------------------------------------
   *
   *  Setup Isotope for Tiles Homepage Layout
   *
   * ----------------------------------------------------------------------------
   */

  $(".home .advancedPageEditorGroup > div")
    .first()
    .find(".flex-row")
    .addClass("top-row");

  var $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    percentPosition: true,
    masonry: {
      columnWidth: ".grid-sizer",
      gutter: ".gutter-sizer"
    }
  });

  var $grid2col = $(".gridtwocol").isotope({
    itemSelector: ".grid-item2col",
    percentPosition: true,
    stamp: ".stamp",
    getSortData: {
      date: ".numericdate" // text from querySelector
    },
    sortBy: "date",
    sortAscending: false,
    masonry: {
      columnWidth: ".grid-sizer2col",
      gutter: ".gutter-sizer2col"
    }
  });

  var $grid3col = $(".gridthreecol").isotope({
    itemSelector: ".grid-item3col",
    percentPosition: true,
    stamp: ".stamp",
    getSortData: {
      date: ".numericdate" // text from querySelector
    },
    sortBy: "date",
    sortAscending: false,
    masonry: {
      columnWidth: ".grid-sizer3col",
      gutter: ".gutter-sizer3col"
    }
  });

  $grid.imagesLoaded().progress(function() {
    $grid.isotope("layout");
  });

  $grid2col.imagesLoaded().progress(function() {
    $grid2col.isotope("layout");
  });

  $grid3col.imagesLoaded().progress(function() {
    $grid3col.isotope("layout");
  });

  /*$(window).resize(function() {
	 $grid.isotope('layout');

  });*/

  /**
   * ----------------------------------------------------------------------------
   *
   *  Color Theif Logic
   *
   * ----------------------------------------------------------------------------
   */

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

  $(window).load(function() {
    $(".tiltWrapper").each(function() {
      if (
        $(this)
          .find(".thumbCheck")
          .hasClass("noThumb")
      ) {
        $(this)
          .closest(".tiltWrapper")
          .addClass("noThumb");
      } else {
        $(this)
          .closest(".tiltWrapper")
          .removeClass("noThumb");
      }
    });

    $grid.imagesLoaded().progress(function() {
      $grid.isotope("layout");
    });

    $grid2col.imagesLoaded().progress(function() {
      $grid2col.isotope("layout");
    });

    $grid3col.imagesLoaded().progress(function() {
      $grid3col.isotope("layout");
    });
  });

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
    var reflectionelem = $(this)
      .next()
      .find(".reflection");
    $(reflectionelem).css("opacity", "0");

    var elem = $(this).closest(".tiltWrapper");
    $(elem).removeClass("hovered");
  });

  $("a.tiltAction").mousemove(function(event) {
    var wrapperelem = $(this).closest(".tiltWrapper");

    $(wrapperelem)
      .css("z-index", "10")
      .addClass("hovered");

    var rotateelem = $(this).next(".tiltPanel");
    var reflectionelem = $(this)
      .next()
      .find(".reflection");

    var tiltdepth = $(this)
      .closest(".tiltWrapper")
      .attr("data-tiltdepth");

    if (!tiltdepth) {
      //default to 10deg throw when no max angle is defined in attribute.
      var tiltdepth = 70;
    }

    var maxdeg = $(this)
      .closest(".tiltWrapper")
      .attr("data-maxangle");

    if (!maxdeg) {
      //default to 10deg throw when no max angle is defined in attribute.
      var maxdeg = 10;
    }

    var elemoffset = $(this).offset();
    var elemwidth = $(this).width();
    var elemheight = $(this).height();

    var cursorX = event.pageX - elemoffset.left;
    var cursorY = event.pageY - elemoffset.top;

    if (cursorX < elemwidth / 2) {
      var perX = cursorX / (elemwidth / 2) - 1;
      var opacityX = 1 - cursorX / (elemwidth / 2);
      var degX = Math.floor(maxdeg * perX);
      var refX = elemwidth - cursorX;
    } else {
      var perX = 1 - cursorX / (elemwidth / 2);
      var opacityX = cursorX / (elemwidth / 2) - 1;
      var degX = Math.floor(-(maxdeg * perX));
      var refX = elemwidth - cursorX;
    }

    if (cursorY < elemheight / 2) {
      var perY = 1 - cursorY / (elemheight / 2);
      var degY = Math.floor(maxdeg * perY);
      var refY = elemheight - cursorY;
    } else {
      var perY = cursorY / (elemheight / 2) - 1;
      var degY = Math.floor(-(maxdeg * perY));
      var refY = elemheight - cursorY;
    }

    var rotation =
      "transform: rotateX(" +
      degY +
      "deg) rotateY(" +
      degX +
      "deg); transform-origin: center center " +
      tiltdepth +
      "px; -webkit-transform: rotateX(" +
      degY +
      "deg) rotateY(" +
      degX +
      "deg); -webkit-transform-origin: center center " +
      tiltdepth +
      "px;";
    $(rotateelem).attr("style", rotation);

    var reflection =
      "transform: translate(" +
      refX +
      "px, " +
      refY +
      "px); -webkit-transform: translate(" +
      refX +
      "px, " +
      refY +
      "px); opacity: " +
      opacityX +
      ";";
    $(reflectionelem).attr("style", reflection);
  });

  $("a.tiltAction").mouseout(function() {
    var rotateelem = $(this).next(".tiltPanel");

    var wrapperelem = $(this).closest(".tiltWrapper");

    var tiltdepth = $(this)
      .closest(".tiltWrapper")
      .attr("data-tiltdepth");

    if (!tiltdepth) {
      //default to 10deg throw when no max angle is defined in attribute.
      var tiltdepth = 70;
    }

    $(wrapperelem).css("z-index", "");

    if (browser == "Firefox") {
      var rotation =
        "transform: rotateX(0deg) rotateY(0deg); transform-origin: center center " +
        tiltdepth +
        "px; transition: 0.0s transform; -webkit-transform: rotateX(0deg) rotateY(0deg); -webkit-transition: 0.0s transform; -webkit-transform-origin: center center " +
        tiltdepth +
        "px;";
    } else {
      var rotation =
        "transform: rotateX(0deg) rotateY(0deg); transform-origin: center center " +
        tiltdepth +
        "px; transition: 1.0s transform; -webkit-transform: rotateX(0deg) rotateY(0deg); -webkit-transition: 1.0s transform; -webkit-transform-origin: center center " +
        tiltdepth +
        "px;";
    }

    $(rotateelem).attr("style", rotation);
  });

  $(".fundraising_link").mouseover(function() {
    $(this)
      .closest(".fundraising_wrapper")
      .addClass("hover");
  });

  $(".fundraising_link").mouseout(function() {
    $(this)
      .closest(".fundraising_wrapper")
      .removeClass("hover");
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

  $(".uwresources .menu > li.menu-item-has-children > a").click(function(e) {
    e.preventDefault();
    e.stopPropagation();
    //console.log("hit!");
    var thissub = $(this).next();

    $(".uwresources .menu ul.sub-menu").removeClass("visible");
    $(thissub).toggleClass("visible");
  });

  var searchVisible = false;

  $(".searchTrigger, .searchClose, .searchResultsOverlay").click(function(e) {
    e.preventDefault();

    if (searchVisible) {
      $("#ajaxResults")
        .attr("style", "")
        .html("");
      $("input[name='s']").val("");
      $(".searchUI")
        .toggleClass("visible")
        .attr("aria-hidden", "true");
      $("#page").toggleClass("blur");
      $(".searchResultsOverlay")
        .toggleClass("visible")
        .attr("aria-hidden", "true");
      setTimeout(function() {
        $(".searchUI input.search-field").blur();
      }, 100);

      searchVisible = false;
    } else {
      $(".searchUI")
        .toggleClass("visible")
        .attr("aria-hidden", "false");
      $("#page").toggleClass("blur");
      $(".searchResultsOverlay")
        .toggleClass("visible")
        .attr("aria-hidden", "false");
      setTimeout(function() {
        $(".searchUI input.search-field").focus();
      }, 500);

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
  //console.log('check');

  var searchUiHeight = $(".searchUI").height();
  var remainingHeight = $(window).height();
  var resultsMinHeight = remainingHeight - searchUiHeight;
  var bodyHeight = $("body").height();

  var searchdelay;
  var searchok = true;

  function directorySearch(value) {
    //var value = $(".search-form #s, #gsc-i-id1").val();
    //var elem = $(".search-form #s, .gsc-input");
    console.log("function run with value: " + value);

    if (value.length > 2) {
      $.ajax({
        url: "https://www.wisc.edu/directories/json/?jsonp=?",
        type: "GET",
        dataType: "json",
        data: {
          name: value,
          division: "COLLEGE OF AGRICULTURAL & LIFE SCIENCES"
        },
        success: function(data, textStatus, XMLHttpRequest) {
          var output = "";
          //console.log(data);
          if (data !== null) {
            if (data["count"] == 0) {
              if (data["errors"][0]) {
                if (data["errors"][0]["code"] == 4) {
                  //Too many results
                  output = "";
                }
              } else {
                output = "No Directory Matches";
              }
            } else {
              peoplecount = data["count"];

              output += "<ul>";
              $.each(data["records"], function(index, record) {
                for (j = 0; j < record["titles"].length; j++) {
                  if (
                    record["titles"][j]["division"] ==
                    "COLLEGE OF AGRICULTURAL & LIFE SCIENCES"
                  ) {
                    output +=
                      '<li class=""><a href="http://www.wisc.edu/directories/person.php?name=' +
                      record["fullName"] +
                      '" target="_blank">' +
                      '<div class="person_name"><strong>' +
                      record["fullName"] +
                      "</strong></div>";

                    if (record["emails"][0] != "") {
                      output +=
                        '<div class="person_email">' +
                        "" +
                        record["emails"][0] +
                        "" +
                        "</div>";
                    }

                    if (record["phones"][0] != "") {
                      output +=
                        '<div class="person_phone">' +
                        record["phones"][0] +
                        "</div>";
                    }

                    /* if(record["titles"][j]["title"]){
                                                                            output+='<div class="person_title"><strong>Title: </strong>'
                                                                                        + record["titles"][j]["title"] +
                                                                                    '</div>';
                                                                        }

                                                                        if(record["titles"][j]["department"]){
                                                                            output+='<div class="person_department"><strong>Dept: </strong>'
                                                                                        + record["titles"][j]["department"] +
                                                                                    '</div>';
                                                                        }*/

                    output += "</a>" + "</li>";
                  }
                }
              });

              output += "</ul>";
            }
          }

          console.log("output to sidebar: " + output);
          $("#cals_uwds_search_results").html(output);
          //$(".filtered .directory").html(output);
          //console.log(XMLHttpRequest);
        },
        error: function() {
          $("#cals_uwds_search_results").html("Data could not be retrieved.");
        }
      });
    }
  }

  directorySearch($(".search-form #s, input#gsc-i-id1").val());

  var findinput = setInterval(function() {
    if ($("input#gsc-i-id1")) {
      console.log("found input");
      clearInterval(findinput);

      $(".search-form #s, input#gsc-i-id1").keyup(function() {
        var valtosend = $(this).val();
        console.log("onkeyup send: " + valtosend);
        directorySearch(valtosend);
      });
    }
  }, 1000);

  function runSearch() {
    var searchTerm = $(".search-form #s").val();
    var fixedSearchTerm = searchTerm.split(" ").join("+");
    var searchUrl = templateUrl + "/?s=" + fixedSearchTerm + " #main";
    var historyUrl = templateUrl + "/?s=" + fixedSearchTerm;

    console.log(historyUrl);

    History.pushState(null, historyUrl, historyUrl);

    $(".searchUI").addClass("searching");

    $("#ajaxResults").load(searchUrl, function() {
      //completed loading results
      $("#ajaxResults").css("height", resultsMinHeight);
      $(".searchUI").removeClass("searching");

      setTimeout(function() {
        window.scrollTo(0, 0);
        $("#ajaxResults").css("height", "auto");
        $(".searchUI").css("position", "absolute");
      }, 500);
    });
  }

  $(".searchUI form.search-form.nogcse").submit(function(e) {
    e.preventDefault();

    var searchTerm = $(this)
      .find("input[name='s']")
      .val();
    var fixedSearchTerm = searchTerm.split(" ").join("+");
    var searchUrl = templateUrl + "/?s=" + fixedSearchTerm + " #main";
    var historyUrl = templateUrl + "/?s=" + fixedSearchTerm;

    console.log(historyUrl);

    History.pushState(null, historyUrl, historyUrl);

    $(".searchUI").addClass("searching");

    $("#ajaxResults").load(searchUrl, function() {
      //completed loading results
      $("#ajaxResults").css("height", resultsMinHeight);
      $(".searchUI").removeClass("searching");

      setTimeout(function() {
        window.scrollTo(0, 0);
        $("#ajaxResults").css("height", "auto");
        $(".searchUI").css("position", "absolute");
      }, 500);
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
  function setPageHeight() {
    var wH = $(window).height();
    var fH = $("footer").height();
    var hH = $("header").height();

    $(".site-main").css("min-height", wH - hH);
  }

  //call once on pageload
  setPageHeight();

  $(window).resize(function() {
    setPageHeight();
  });

  /**
   * ----------------------------------------------------------------------------
   *
   *  Spotlight image resizing
   *
   * ----------------------------------------------------------------------------
   */
  $(".box").each(function() {
    //set size
    var th = $(this).height(), //box height
      tw = $(this).width(), //box width
      im = $(this).children("img"), //image
      ih = im.height(), //inital image height
      iw = im.width(); //initial image width
    if (ih > iw) {
      //if portrait

      im.addClass("ww").removeClass("wh"); //set width 100%
    } else {
      //if landscape

      im.addClass("wh").removeClass("ww"); //set height 100%
    }
    //set offset
    var nh = im.height(), //new image height
      nw = im.width(), //new image width
      hd = (nh - th) / 2, //half dif img/box height
      wd = (nw - tw) / 2; //half dif img/box width
    if (nh < nw) {
      //if portrait

      im.css({ marginLeft: "-" + wd + "px", marginTop: 0 }); //offset left
    } else {
      //if landscape

      im.css({ marginTop: "-" + hd + "px", marginLeft: 0 }); //offset top
    }
  });

  /**
   * ----------------------------------------------------------------------------
   *
   *  Set the width of a page depending on if there is a side nav
   *
   * ----------------------------------------------------------------------------
   */

  function setContentWidth() {
    var sidebarNav = false;
    var sidebarWidget = false;
    var hiddenSideBarFlag = false;

    //used on pages
    if ($(".sidebar_menu div.noSideBarMenuItems")[0]) {
      sidebarNav = false;
    } else {
      sidebarNav = true;
    }

    if ($(".spotlight .widget-area")[0] || $(".page-widget-sidebar")[0]) {
      sidebarWidget = true;
    } else {
      sidebarWidget = false;
    }

    if ($("#page").hasClass("hiddenSidebar")) {
      hiddenSideBarFlag = true;
    } else {
      hiddenSideBarFlag = false;
    }

    if (sidebarWidget || sidebarNav) {
      if (hiddenSideBarFlag == true) {
        $("#content").removeClass("has_nav");
      } else {
        $("#content").addClass("has_nav");
      }
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
  $(".widget-area ul li a").each(function(index) {
    $(this).wrapInner("<span class='nav_text'></span>");
  });

  /**
   * ----------------------------------------------------------------------------
   *
   *  blur sizing
   *
   * If the page does has a transparent header,
   * then calculate how tall the blur should be.
   * (The +30 accounts for a negative margin)
   *
   * ----------------------------------------------------------------------------
   */
  function topBlurMeasure() {
    if ($("#page").hasClass("photoHeader")) {
      if ($("body").hasClass("home")) {
        var mastheadSize = $("#masthead").height();
        var topBlur = "padding-top:" + (mastheadSize + 30) + "px;";
        $(".heroOverlay").attr("style", topBlur);
      }
    }
    setTimeout(topBlurMeasure, 500);
  }

  $(window).on("load", function() {
    topBlurMeasure();
  });
  $(window).resize(function() {
    topBlurMeasure();
  });

  /**
   * ----------------------------------------------------------------------------
   *
   *  blur scroll effect for homepage
   *
   * ----------------------------------------------------------------------------
   */

  /*if($("body").hasClass("home")) {
	 	if($("#page").hasClass("visibleSlides")) {
		 	$(window).scroll(function() {
			 	var galleryHeight = $(".main-gallery").height();
			 	var scrollTop = $(window).scrollTop();
			 	var galleryCutOff = galleryHeight * .4;

			 	if((scrollTop > (galleryHeight - galleryCutOff)) && (scrollTop < (galleryHeight +galleryCutOff))) {

				 	var percentageBlur = (scrollTop/(galleryHeight-galleryCutOff)-1);
				 	var blurValue = percentageBlur * 15;
				 	var blurStr = "filter: blur("+blurValue+"px); -webkit-filter: blur("+blurValue+"px)";

				 	$(".featureHeader").attr("style",blurStr);
			 	} else {
				 	var blurStr = "filter: blur(0px); -webkit-filter: blur(0px)";
				 	$(".featureHeader").attr("style",blurStr);
			 	}
		 	});

	 	}
 	}



 	if($("body").hasClass("page")) {
	 	if($("#primary").hasClass("heroImage")) {
		 	$(window).scroll(function() {
			 	var galleryHeight = $(".heroWatermark").height();
			 	var scrollTop = $(window).scrollTop();
			 	var galleryCutOff = galleryHeight * .4;

			 	if((scrollTop < galleryHeight)) {

				 	var percentageBlur = ((galleryHeight/scrollTop)-1);
				 	var blurValue = percentageBlur;
				 	var blurStr = "opacity: "+blurValue+"; -webkit-opacity: "+blurValue+"; ";

				 	$(".heroWatermark").attr("style",blurStr);
			 	} else {
				 	var blurStr = "opacity: 0; -webkit-opacity: 0;";
				 	$(".heroWatermark").attr("style",blurStr);
			 	}
		 	});

	 	}
 	}*/

  /**
   * ----------------------------------------------------------------------------
   *
   *  Drop Down Menu Click Events
   *
   * ----------------------------------------------------------------------------
   */

  $(".dropdownEnabled ul > li a").each(function() {
    var elem = $(this);
    var href = $(this).attr("href");
    var text = $(this).text();
    text = text + " Overview";
    var menuitem = $(this).next();
    var prevli = $(this).parent();

    var item = "<li><a href='" + href + "'>" + text + "</a><li>";
    var arrow =
      '<span class="arrow"><svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path class="lines" d="M14.83 16.42l9.17 9.17 9.17-9.17 2.83 2.83-12 12-12-12z"/><path d="M0-.75h48v48h-48z" fill="none"/></svg></span>';

    if ($(menuitem).hasClass("children") || $(menuitem).hasClass("sub-menu")) {
      if ($(prevli).hasClass("page_item")) {
        $(menuitem).prepend(item);
      }

      $(elem)
        .addClass("arrowOn")
        .append(arrow);
    }
  });

  $(
    ".dropdownEnabled .sub-menu a.arrowOn .arrow, .dropdownEnabled .children a.arrowOn .arrow"
  ).hide();

  $(".dropdownEnabled ul li a").click(function(e) {
    var elem = $(this);

    if (
      $(elem)
        .closest("ul")
        .hasClass("sub-menu") ||
      $(elem)
        .closest("ul")
        .hasClass("children")
    ) {
    } else {
      if (
        $(elem)
          .closest("li")
          .hasClass("page_item_has_children") ||
        $(elem)
          .closest("li")
          .hasClass("menu-item-has-children")
      ) {
        e.preventDefault();
        e.stopPropagation();

        $(".dropdownEnabled ul.children, .dropdownEnabled ul.sub-menu").hide();

        $(this)
          .next(".children")
          .show();
        $(this)
          .next(".sub-menu")
          .show();
      } else {
        //follow link normally
      }
    }
  });
});
