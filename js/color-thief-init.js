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
		
	if($("#page").hasClass("tiledPosts")) {
		$(".grid-item").each(function() {

			var griditem = $(this);

			var img = $(this).find("img");
			img.crossOrigin = 'Anonymous';

			
			var imgC = img[0];
			

			var imgSrc = imgC.getAttribute("src");
			
			

			/*var colorThief = new ColorThief();
			var color = colorThief.getColor(imgSrc);*/
			
			

			var imgN = new Image();
			imgN.onload = function () {
			 	var colorThief = new ColorThief();
			 	var color = colorThief.getColor(imgN);
			 	var newColor = "rgba(" + color[0] + ", " +color[1]+ ", " +color[2]+ ", 1.0)";

			 	$(griditem).find("h2").css("color",newColor);
			}
			
			imgN.crossOrigin = 'Anonymous';
			imgN.src = imgSrc;

			
			
			
			
		});
	}
	
});