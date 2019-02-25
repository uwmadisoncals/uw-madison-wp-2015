<?php $url = get_sub_field('remote_url');
        $category = get_sub_field('category_id');
		$offset = get_sub_field('offset_post');
		$hideauthor = get_sub_field('hideauthor');
		$hidecat = get_sub_field('hidecat');
		$hidedate = get_sub_field('hidedate');
		$hideexcerpt = get_sub_field('hide_excerpt');






		$numposts = 1;
		if($category == "") {
			$requesturi = $url."/wp-json/wp/v2/posts?per_page=1&_embed";
		} else {
			$requesturi = $url."/wp-json/wp/v2/posts?per_page=1&_embed&categories=".$category;
		} ?>

		<?php if($offset != "") {
			$requesturi = $requesturi."&offset=".$offset;
		}
		//echo $requesturi;
		?>





				<div class="grid-item2col highlightremoteContent <?php if($hideauthor == "1") { echo "hideauthor"; } ?> <?php if($hidecat == "1") { echo "hidecat"; } ?> <?php if($hidedate == "1") { echo "hidedate"; } ?> <?php if($hideexcerpt == "1") { echo "hideexcerpt"; } ?>" data-remoteurl="<?php echo $requesturi ?>">

				<div class="loadingWrapper"><div class="loading"></div></div>


				<div class="tiltWrapper custom custom2col" data-maxangle="3" data-tiltdepth="70">

					<a href="#" class="tiltAction remotePost"><?php the_title(); ?></a>

					<?php $deptname = get_field('meta_title'); if($deptname && $styleoptions == 'photocaption') { ?>
						<div class="deptname"><?php echo $deptname; ?></div>
					<?php } ?>

					<div class="<?php if($styleoptions != 'photocaption') { echo "tiltPanel"; } ?>">

						<div class="plane level1">
							<div class="reflection">
								<svg width="130px" height="130px" viewBox="0 0 130 130" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
									<!-- Generator: Sketch 3.3.3 (12072) - http://www.bohemiancoding.com/sketch -->
									<title>glare</title>
									<desc>Created with Sketch.</desc>
									<defs>
										<radialGradient cx="50%" cy="50%" fx="50%" fy="50%" r="50%" id="radialGradient-1">
											<stop stop-color="#FFFFFF" stop-opacity="0.458786232" offset="0%"></stop>
											<stop stop-color="#FFFFFF" stop-opacity="0" offset="100%"></stop>
										</radialGradient>
									</defs>
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
										<g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-426.000000, -322.000000)" fill="url(#radialGradient-1)">
											<circle id="glare" sketch:type="MSShapeGroup" cx="491" cy="387" r="65"></circle>
										</g>
									</g>
								</svg>
							</div>




							<div class="backgroundImageSample">
								<div class="cardStyles"><svg width="381px" height="379px" viewBox="0 0 381 379" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
			<!-- Generator: Sketch 3.4.2 (15855) - http://www.bohemiancoding.com/sketch -->
			<title>card_styles</title>
			<desc>Created with Sketch.</desc>
			<defs>
				<linearGradient x1="42.1905898%" y1="41.6499891%" x2="54.3044576%" y2="71.7731228%" id="linearGradient-1">
					<stop stop-color="#686868" stop-opacity="0.395833333" offset="0%"></stop>
					<stop stop-color="#545454" stop-opacity="0.658203125" offset="100%"></stop>
				</linearGradient>
				<linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-2">
					<stop stop-color="#FFFFFF" stop-opacity="0" offset="0%"></stop>
					<stop stop-color="#FFFFFF" stop-opacity="0.255151721" offset="100%"></stop>
				</linearGradient>
			</defs>
			<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
				<g id="card_styles" sketch:type="MSLayerGroup">
					<g id="Page-1" sketch:type="MSShapeGroup">
						<g id="Desktop-HD">
							<g id="card_styles">
								<path d="M0.953125,378.058594 L0.953125,246.631883 L316.628906,341.71875 L0.953125,378.058594 L0.953125,378.058594 Z" id="Path-2" opacity="0.75886194" fill="url(#linearGradient-1)"></path>
								<path d="M0.500197037,377.763682 L380.500197,377.763682 L380.500197,296 L0.500197037,377.763682 L0.500197037,377.763682 Z" id="Path-1" fill="#FFFFFF"></path>
								<path d="M380.500197,275.894531 L380.500197,0.0606841001 L1.13333794,0.0606841001 L0.500197037,155.734375 L380.500197,275.894531 Z" id="Path-3" opacity="0.45598181" fill="url(#linearGradient-2)"></path>
							</g>
						</g>
					</g>
				</g>
			</g>
		</svg></div>

							</div>

							<div class="heroGradient"></div>



<div class="heroImageBlur"><div class="heroImageBlurInner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg); background-size: cover; background-position: center center; "></div></div>

										<?php if($columnstyle == "fixedheight") { ?>
										<div class="heroImageFixedHeight" data-imgurl="<?php echo catch_that_thumbnail(); ?>" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg); background-size: cover; background-position: center center; "></div>
										<?php } else { ?>
										<img alt=" " class="mediaImg" src="<?php echo get_template_directory_uri(); ?>/images/default_blog_img.svg">
											<?php } ?>





							</div>


						</div>
						<div class="textContent">
						<div>
							<div class="middleImageSample">
								<div class="whiteContent">
									<div class="dateposted"></div>
									<div class="numericdate">Ymd Time</div>
									<div class="category"></div>

									<h2>Title</h2>
									<div class="author"></div>
									<div class="excerpt"></div>



								</div>

							</div>
						</div>
					</div>
					</div>

				</div>
