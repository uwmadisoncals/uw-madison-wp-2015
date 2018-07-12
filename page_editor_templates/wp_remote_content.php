<?php
		$url = "";
		$categories = "";
		$tags = "";
		$posttype = "";
		$numposts = 0;
		$numquery = 0;
		$feedstyle = "defaultstyle";
		$apiparams = "";

		$url = get_sub_field('source_url');
		$categories = get_sub_field('source_categories');
		$tags = get_sub_field('source_tags');
		$posttype = get_sub_field('post_type');
		$feedstyle = get_sub_field('feed_style');
		$apiparams = get_sub_field('api_params');



		//echo 'post type is:['.$posttype.']; ';
		//echo 'categories is:['.$categories.']; ';
		//echo 'tags is:['.$tags.']; ';

		if($posttype == "meetings") {
			$numposts = 100;
			$numquery = get_sub_field('number_of_posts');
		} else {
			$numposts = get_sub_field('number_of_posts') + 1;
		}



		if($categories == "" && $tags == "" && $posttype == "") {
			$requesturi = $url."/wp-json/wp/v2/posts?per_page=".$numposts.$apiparams;
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
				$requesturi = $url."/wp-json/wp/v2/".$posttype."?per_page=".$numposts.$categoriesuri.$tagsuri.$apiparams;
			} else {
				$requesturi = $url."/wp-json/wp/v2/posts?per_page=".$numposts.$categoriesuri.$tagsuri.$apiparams;
				$posttype = "";
			}

		}

?>

<style>
	.eventsstyle {
		position: relative;
		padding-left: 27px;
	}

	.eventsstyle svg {
		height: 1rem;
		position: absolute;
		left: 0px;
		top: 6px;
	}

	.eventsstyle svg path {
		fill: rgba(0,0,0,0.4);
	}

	.eventsstyle div {
		line-height: 1.3;
	}
</style>

	<div class="remoteContent <?php echo $feedstyle; ?>" data-remoteurl="<?php echo $requesturi ?>" data-remotenum="<?php echo $numquery ?>">

		<div class="loadingWrapper"><div class="loading"></div></div>

	</div>




