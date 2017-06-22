<?php $url = get_sub_field('source_url');
		$categories = get_sub_field('source_categories');

													$numposts = get_sub_field('number_of_posts');
													$numposts = $numposts + 1;
													if($categories == "") {
														$requesturi = $url."/wp-json/wp/v2/posts?per_page=".$numposts;
													} else {
														$requesturi = $url."/wp-json/wp/v2/posts?per_page=".$numposts."&categories=".$categories;
													}
													//$requesturi = $url."/wp-json/wp/v2/posts?per_page=".$numposts."&categories=".$categories;
													//console.log($requesturi);
													?>
													

													<div class="remoteContent" data-remoteurl="<?php echo $requesturi ?>">
													
														<div class="loadingWrapper"><div class="loading"></div></div>
													
													</div>
													
													
														
													
