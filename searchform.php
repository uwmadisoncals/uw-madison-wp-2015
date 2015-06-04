<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label class="searchLabel">
	<div class="searchFormIcon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="-296 387 19 19" enable-background="new -296 387 19 19" xml:space="preserve">
<g id="circle2">
	<circle fill="#AAAAAA" cx="-286.6" cy="396.4" r="8.9"/>
</g>
<g id="circle">
	<circle fill="#117DBA" cx="-286.5" cy="396.5" r="9.5"/>
</g>
<g id="glass" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
	<g id="Page-1" sketch:type="MSPage">
		<g id="Desktop-HD-Alt" transform="translate(-1242.000000, -34.000000)" sketch:type="MSArtboardGroup">
			<g id="satellite-nav" transform="translate(1141.000000, 26.000000)" sketch:type="MSLayerGroup">
				
					<g id="_x31_427843142_x5F_common_x5F_search_x5F_lookup_x5F_" transform="translate(101.000000, 8.000000)" sketch:type="MSShapeGroup">
					<g id="miu">
						<g id="common_search_lookup_glyph">
							<path fill="#FFFFFF" d="M-282,399.9l-2.6-2.6c0.4-0.6,0.6-1.3,0.6-2c0-1.9-1.6-3.5-3.5-3.5s-3.5,1.6-3.5,3.5s1.6,3.5,3.5,3.5
								c0.7,0,1.4-0.2,2-0.6l0,0l2.6,2.6c0,0,0.1,0,0.2,0l0.7-0.7C-282,400-282,400-282,399.9z M-287.5,398c-1.5,0-2.7-1.2-2.7-2.7
								s1.2-2.7,2.7-2.7s2.7,1.2,2.7,2.7S-286,398-287.5,398z"/>
						</g>
					</g>
				</g>
			</g>
		</g>
	</g>
</g>
</svg>

<div class="radiate"></div>
</div>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" id="s" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		<div class="tabSuggest">Press <strong>tab</strong> to complete the suggestion.</div>
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>