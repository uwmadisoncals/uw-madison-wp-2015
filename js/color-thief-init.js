$(window).on("load", function() {
		
	if($("#page").hasClass("tiledPosts")) {
		$(".grid-item").each(function() {
			var img = $(this).find("img");
			img.crossOrigin = 'Anonymous';
			var imgC = img[0];
			
			

			var colorThief = new ColorThief();
			var color = colorThief.getColor(imgC);
			
			var newColor = "rgba(" + color[0] + ", " +color[1]+ ", " +color[2]+ ", 1.0)";
			
			$(this).find("h2").css("color",newColor);
		});
	}
	
});