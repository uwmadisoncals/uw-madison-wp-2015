<?php
		$url = "";
		$categories = "";
		$tags = "";
		$posttype = "";
		$numposts = 0;
		$feedstyle = "defaultstyle";

		$url = get_sub_field('source_url');
		$categories = get_sub_field('source_categories');
		$tags = get_sub_field('source_tags');
		$posttype = get_sub_field('post_type');
		$feedstyle = get_sub_field('feed_style');



		//echo 'post type is:['.$posttype.']; ';
		//echo 'categories is:['.$categories.']; ';
		//echo 'tags is:['.$tags.']; ';

		$numposts = get_sub_field('number_of_posts');

		if($categories == "" && $tags == "" && $posttype == "") {
			$requesturi = $url."/wp-json/wp/v2/posts?per_page=".$numposts;
		} else {
			if($tags != "") {
				$tagsuri = "&tags=".$tags;
			} else {
				$tagsuri = "";
			}

			if($categories != "") {
				$categoriesuri = "&categories=".$categories;
			} else {
				$categoriesuri = "";
			}

			if($posttype != "") {
				$requesturi = $url."/wp-json/wp/v2/".$posttype."?per_page=".$numposts.$categoriesuri.$tagsuri;
			} else {
				$requesturi = $url."/wp-json/wp/v2/posts?per_page=".$numposts.$categoriesuri.$tagsuri;
				$posttype = "";
			}

		}

?>


	<div class="remoteContent <?php echo $feedstyle; ?>" data-remoteurl="<?php echo $requesturi ?>">

		<div class="loadingWrapper"><div class="loading"></div></div>

	</div>




