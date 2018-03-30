$(window).on("load", function() {
	
	var cors = false;
	
			//Detect browser support for CORS
			if ('withCredentials' in new XMLHttpRequest()) {
			    /* supports cross-domain requests */
			    //console.log("CORS supported (XHR)");
			    cors = true;
			}
			else if(typeof XDomainRequest !== "undefined"){
			  //Use IE-specific "CORS" code with XDR
			  //console.log("CORS supported (XDR)");
			  cors = true;
			}else{
			  //Time to retreat with a fallback or polyfill
			  //console.log("No CORS Support!");
			  cors = false;
			}
		
   $(".gridstyle2 .tiltWrapper").each(function() {
		var griditem = $(this);
		
			
			var img = $(this).find("img");
			img.crossOrigin = 'Anonymous';

			
			var imgC = img[0];
			
			if(imgC) {

				var imgSrc = imgC.getAttribute("src");
				//console.log("normal: " + imgSrc);
			} else {
				
				var imgSrc = $(this).find(".heroImageFixedHeight").attr("data-imgurl");

				//console.log("background: " + imgSrc);
			}
			
			if(imgSrc) {

			
			

			var imgN = new Image();

			imgN.crossOrigin = 'Anonymous';
			imgN.src = imgSrc;
			//console.log(imgN);
			imgN.onload = function () {
				//console.log("blah");
			 	var colorThief = new ColorThief();
			 	var color = colorThief.getColor(imgN);

				 var brighter = 100;
				
				var color1 = color[0] + brighter;
				if(color1 > 255) { color1 = 255; }

				var color2 = color[1] + brighter;
				if(color2 > 255) { color2 = 255; }

				var color3 = color[2] + brighter;
				if(color3 > 255) { color3 = 255; }


			 	var newColor = "rgba(" + color1 + ", " +color2+ ", " +color3+ ", 1.0)";
				 var newShadow = "0px 18px 65px rgba(" + color1 + ", " +color2+ ", " +color3+ ", 0.5)"
				 /*console.log("test");
				console.log(newColor);*/
				
			 	$(griditem).find(".author").css("color",newColor);
				$(griditem).find(".tiltPanel .level1").css("box-shadow", newShadow);
			}
		}
			
   });

	if($("#page").hasClass("tiledPosts")) {
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

	


	
});