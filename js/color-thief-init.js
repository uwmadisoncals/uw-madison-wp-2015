$(window).on("load", function() {
		
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
			};
			imgN.crossOrigin = 'Anonymous';
			imgN.src = imgSrc;

			
			
			
			
		});
	}
	
});