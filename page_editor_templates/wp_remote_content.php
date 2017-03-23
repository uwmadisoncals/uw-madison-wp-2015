<?php $url = get_sub_field('source_url');

													$numposts = get_sub_field('number_of_posts');
													$numposts = $numposts + 1;
													$requesturi = $url."/wp-json/wp/v2/posts?per_page=".$numposts;
													
													?>
													

													<div class="remoteContent" data-remoteurl="<?php echo $requesturi ?>">
													
														<div class="loadingWrapper"><div class="loading"></div></div>
													
													</div>
													
													
														
													
