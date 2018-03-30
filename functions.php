<?php
/**
 * UW Madison WP 2015 functions and definitions
 *
 * @package UW Madison WP 2015
 */



	// 1. customize ACF path
	add_filter('acf/settings/path', 'my_acf_settings_path');

	function my_acf_settings_path( $path ) {

	    // update path
	    $path = get_template_directory() . '/acf/';

	    // return
	    return $path;

	}


	// 2. customize ACF dir
	add_filter('acf/settings/dir', 'my_acf_settings_dir');

	function my_acf_settings_dir( $dir ) {

	    // update path
	    $dir = get_template_directory_uri() . '/acf/';

	    // return
	    return $dir;

	}


	// 3. Hide ACF field group menu item
	//add_filter('acf/settings/show_admin', '__return_false');


	// 4. Include ACF
	include_once( get_template_directory() . '/acf/acf.php' );


	//include_once( get_template_directory() . '/google-cse/google-cse.php' );



//Include the UW Events Calendar
//if ( !function_exists("uwmadison_events_object") ) {
	include_once( get_template_directory() . '/uwevents/uwmadison_events.php' );
//}




/***** Add Custom Post type for Hero Image ****/
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'headerslides',
		array(
			'labels' => array(
				'name' => __( 'Header Slides', 'uw_madison_wp_2015' ),
				'singular_name' => __( 'Header Slide', 'uw_madison_wp_2015' )
			),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-slides',
		'supports' => array(
	  'title',
	  'editor',
	  'excerpt',
	  'revisions',
	  'thumbnail',
	  'author',
	  'page-attributes',
	  )
		)
	);


	register_post_type( 'directory',
		array(
			'labels' => array(
				'name' => __( 'Directory', 'uw_madison_wp_2015' ),
				'singular_name' => __( 'Directory', 'uw_madison_wp_2015' )
			),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-groups',
		'supports' => array(
	  'title',
	  'editor',
	  'excerpt',
	  'revisions',
	  'thumbnail',
	  'author',
	  'page-attributes',
	  )
		)
	);
}

/*** Adding taxonomy for the Directory  ***/

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_directory_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_directory_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Groups', 'taxonomy general name', 'uw_madison_wp_2015' ),
		'singular_name'     => _x( 'Group', 'taxonomy singular name', 'uw_madison_wp_2015' ),
		'search_items'      => __( 'Search Groups', 'uw_madison_wp_2015' ),
		'all_items'         => __( 'All Groups', 'uw_madison_wp_2015' ),
		'parent_item'       => __( 'Parent Group', 'uw_madison_wp_2015' ),
		'parent_item_colon' => __( 'Parent Group:', 'uw_madison_wp_2015' ),
		'edit_item'         => __( 'Edit Group', 'uw_madison_wp_2015' ),
		'update_item'       => __( 'Update Group', 'uw_madison_wp_2015' ),
		'add_new_item'      => __( 'Add New Group', 'uw_madison_wp_2015' ),
		'new_item_name'     => __( 'New Group Name', 'uw_madison_wp_2015' ),
		'menu_name'         => __( 'Group', 'uw_madison_wp_2015' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'group' ),
	);

	register_taxonomy( 'group', array( 'directory' ), $args );


}



function my_rewrite_flush() {
    create_post_type();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );


add_action( 'customize_register', 'my_customize_register' );

function my_customize_register($wp_customize) {

/**
 * Class to create a custom layout control
 */
class Layout_Picker_Custom_Control extends WP_Customize_Control
{
      /**
       * Render the content on the theme customizer page
       */
      public $type = 'layout';

      public function render_content()
       {
            ?>
            	<style>
	            	.layoutClear {
		            	clear: both;
	            	}

	            	ul.layoutOptions label {

		            	margin-right: 6px;
		            	margin-bottom: 6px;
		            	display: block;
		            	box-sizing: border-box;
		            	-webkit-box-sizing: border-box;
		            	-moz-box-sizing: border-box;
		            	width: 100%;
		            	border: 1px solid rgba(0,0,0,0.1);
		            	height: auto;
		            	border-radius: 3px;
		            	background: transparent;

	            	}

	            	ul.layoutOptions label span {
		            	display: block;
		            	background: rgba(0,0,0,0.18);
		            	padding: 10px;
	            	}

	            	ul.layoutOptions label.layoutSelected {
		            	border: 1px solid #C2242A;
	            	}

	            	ul.layoutOptions label.layoutSelected span {
		            	background: #C2242A;
		            	color: #fff;
		            	font-weight: bold;
		            }

	            	.layoutOption {
		            	display:block;


		            	font-size: 11px;

	            	}

	            	.layoutIcon {
		            	padding: 16px;
	            	}

	            	.layoutIcon svg {
		            	width: 100%;

	            	}
	            </style>

                <label>
                  <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                 </label>

                  <ul class="layoutOptions">
                    <label id="circlesLayout" for="<?php echo $this->id; ?>[circles]" class="layoutOption"><span>Circles Layout</span><div class="layoutIcon"><svg width="84px" height="24px" viewBox="0 0 84 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <!-- Generator: Sketch 3.3.3 (12072) - http://www.bohemiancoding.com/sketch -->
    <title>circles</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-426.000000, -322.000000)" fill="#D8D8D8">
            <g id="circles" sketch:type="MSLayerGroup" transform="translate(426.000000, 322.000000)">
                <circle id="Oval-1" sketch:type="MSShapeGroup" cx="12" cy="12" r="12"></circle>
                <circle id="Oval-1-Copy" sketch:type="MSShapeGroup" cx="42" cy="12" r="12"></circle>
                <circle id="Oval-1-Copy-2" sketch:type="MSShapeGroup" cx="72" cy="12" r="12"></circle>
            </g>
        </g>
    </g>
</svg></div><input type="radio" style="display: none;" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>[circles]" value="circles" <?php $this->link(); ?> /></label>
                   <label id="tilesLayout" for="<?php echo $this->id; ?>[tiles]" class="layoutOption"><span>Tiles Layout</span><div class="layoutIcon"><svg width="83px" height="66px" viewBox="0 0 83 66" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <!-- Generator: Sketch 3.3.3 (12072) - http://www.bohemiancoding.com/sketch -->
    <title>tiles</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-426.000000, -378.000000)" fill="#D8D8D8">
            <g id="tiles" sketch:type="MSLayerGroup" transform="translate(426.000000, 378.000000)">
                <rect id="Rectangle-1" sketch:type="MSShapeGroup" x="0" y="0" width="24" height="31"></rect>
                <rect id="Rectangle-1-Copy-4" sketch:type="MSShapeGroup" x="59" y="40" width="24" height="24"></rect>
                <rect id="Rectangle-1-Copy-2" sketch:type="MSShapeGroup" x="29" y="0" width="24" height="52"></rect>
                <rect id="Rectangle-1-Copy" sketch:type="MSShapeGroup" x="0" y="35" width="24" height="31"></rect>
                <rect id="Rectangle-1-Copy-3" sketch:type="MSShapeGroup" x="59" y="0" width="24" height="36"></rect>
            </g>
        </g>
    </g>
</svg></div><input type="radio" style="display: none;" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>[tiles]" value="tiles" <?php $this->link(); ?> /></label>
                    <label id="sidebarLayout" for="<?php echo $this->id; ?>[left_sidebar]" class="layoutOption"><span>Left Sidebar Layout</span><div class="layoutIcon"><svg width="83px" height="45px" viewBox="0 0 83 45" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <!-- Generator: Sketch 3.3.3 (12072) - http://www.bohemiancoding.com/sketch -->
    <title>left-sidebar</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-426.000000, -467.000000)" fill="#D8D8D8">
            <g id="left-sidebar" sketch:type="MSLayerGroup" transform="translate(426.000000, 467.000000)">
                <rect id="Rectangle-6" sketch:type="MSShapeGroup" x="0" y="0" width="24" height="45"></rect>
                <rect id="Rectangle-6-Copy" sketch:type="MSShapeGroup" x="30" y="0" width="53" height="45"></rect>
            </g>
        </g>
    </g>
</svg></div><input style="display: none;" type="radio" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>[left_sidebar]" value="left_sidebar" <?php $this->link(); ?> /></label>


<label id="rightsidebarLayout" for="<?php echo $this->id; ?>[right_sidebar]" class="layoutOption"><span>Right Sidebar Layout</span><div class="layoutIcon"><svg width="83px" height="45px" viewBox="0 0 83 45" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <!-- Generator: Sketch 3.3.3 (12072) - http://www.bohemiancoding.com/sketch -->
    <title>left-sidebar</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-426.000000, -467.000000)" fill="#D8D8D8">
            <g id="right-sidebar" sketch:type="MSLayerGroup" transform="translate(426.000000, 467.000000)">
                <rect id="Rectangle-6" sketch:type="MSShapeGroup" x="0" y="0" width="24" height="45"></rect>
                <rect id="Rectangle-6-Copy" sketch:type="MSShapeGroup" x="30" y="0" width="53" height="45"></rect>
            </g>
        </g>
    </g>
</svg></div><input style="display: none;" type="radio" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>[right_sidebar]" value="right_sidebar" <?php $this->link(); ?> /></label>



                  </ul>
                  <div class="layoutClear"></div>


                <script>

	            if(document.getElementById('uw-madison-wp-2015-home-layout-control[circles]').checked) {
		            document.getElementById('uw-madison-wp-2015-home-layout-control[circles]').parentNode.setAttribute("class", "layoutSelected");
		        }

		        if(document.getElementById('uw-madison-wp-2015-home-layout-control[tiles]').checked) {
		            document.getElementById('uw-madison-wp-2015-home-layout-control[tiles]').parentNode.setAttribute("class", "layoutSelected");
		        }

		        if(document.getElementById('uw-madison-wp-2015-home-layout-control[left_sidebar]').checked) {
		            document.getElementById('uw-madison-wp-2015-home-layout-control[left_sidebar]').parentNode.setAttribute("class", "layoutSelected");
		        }

		        if(document.getElementById('uw-madison-wp-2015-home-layout-control[right_sidebar]').checked) {
		            document.getElementById('uw-madison-wp-2015-home-layout-control[right_sidebar]').parentNode.setAttribute("class", "layoutSelected");
		        }

				document.getElementById("circlesLayout").addEventListener("click", function(){ this.setAttribute("class", "layoutSelected");
						document.getElementById("sidebarLayout").setAttribute("class", "");
						document.getElementById("tilesLayout").setAttribute("class", "");
						document.getElementById("rightsidebarLayout").setAttribute("class", "");
					});

				document.getElementById("sidebarLayout").addEventListener("click", function(){ this.setAttribute("class", "layoutSelected");
						document.getElementById("circlesLayout").setAttribute("class", "");
						document.getElementById("tilesLayout").setAttribute("class", "");
						document.getElementById("rightsidebarLayout").setAttribute("class", "");
					});

				document.getElementById("tilesLayout").addEventListener("click", function(){ this.setAttribute("class", "layoutSelected");
						document.getElementById("sidebarLayout").setAttribute("class", "");
						document.getElementById("circlesLayout").setAttribute("class", "");
						document.getElementById("rightsidebarLayout").setAttribute("class", "");
				});

				document.getElementById("rightsidebarLayout").addEventListener("click", function(){ this.setAttribute("class", "layoutSelected");
					document.getElementById("tilesLayout").setAttribute("class", "");
					document.getElementById("sidebarLayout").setAttribute("class", "");
					document.getElementById("circlesLayout").setAttribute("class", "");
				});

				/*document.getElementById("layout2").addEventListener("click", function(){ var valueoption = this.getAttribute("data-value");  document.getElementById("layoutTextArea").value = valueoption; });
				document.getElementById("layout3").addEventListener("click", function(){ var valueoption = this.getAttribute("data-value");  document.getElementById("layoutTextArea").value = valueoption; });*/
				</script>
            <?php
       }
}


/**
 * Class to create a custom header layout control
 */
class Header_Layout_Picker_Custom_Control extends WP_Customize_Control
{
      /**
       * Render the content on the theme customizer page
       */
      public $type = 'layout';

      public function render_content()
       {
            ?>
            	<style>
	            	.layoutClear {
		            	clear: both;
	            	}

	            	ul.layoutOptions label {

		            	margin-right: 6px;
		            	margin-bottom: 6px;
		            	display: block;
		            	box-sizing: border-box;
		            	-webkit-box-sizing: border-box;
		            	-moz-box-sizing: border-box;
		            	width: 100%;
		            	border: 1px solid rgba(0,0,0,0.1);
		            	height: auto;
		            	border-radius: 3px;
		            	background: transparent;

	            	}

	            	ul.layoutOptions label span {
		            	display: block;
		            	background: rgba(0,0,0,0.18);
		            	padding: 10px;
	            	}

	            	ul.layoutOptions label.layoutSelected {
		            	border: 1px solid #C2242A;
	            	}

	            	ul.layoutOptions label.layoutSelected span {
		            	background: #C2242A;
		            	color: #fff;
		            	font-weight: bold;
		            }

	            	.layoutOption {
		            	display:block;


		            	font-size: 11px;

	            	}

	            	.layoutIcon {
		            	padding: 16px;
	            	}

	            	.layoutIcon svg {
		            	width: 100%;

	            	}
	            </style>

                <label>
                  <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                 </label>

                  <ul class="layoutOptions">
                    <label id="navbarLayout" for="<?php echo $this->id; ?>[navbar]" class="layoutOption"><span>Navigation Bar</span><div class="layoutIcon"><svg width="277px" height="111px" viewBox="0 0 277 111" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <!-- Generator: Sketch 3.5.1 (25234) - http://www.bohemiancoding.com/sketch -->
    <title>Untitled</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Main-Navigation" sketch:type="MSLayerGroup" transform="translate(0.000000, 79.000000)" fill="#898989" fill-opacity="0.265285326">
            <rect id="Rectangle-3" sketch:type="MSShapeGroup" x="0" y="0" width="277" height="22"></rect>
        </g>
        <path d="M64.0627398,23.8916503 C63.7122932,20.4038182 62.8361769,17.2647692 61.7848373,14.6488951 C61.7848373,14.5616993 61.6096141,14.3001119 61.6096141,14.2129161 C60.6458861,12.2074126 59.5069349,10.3763007 58.1927604,9.06836364 C55.7396348,6.53968531 52.7608393,5.14455245 49.4315973,5.05735664 L49.3439857,5.05735664 C48.8183159,3.92381119 47.3289181,3.13904895 46.1023553,2.96465734 C46.1023553,2.96465734 45.3138506,0 42.1598319,0 C39.0058131,0 38.2173084,2.96465734 38.2173084,2.96465734 C36.903134,3.13904895 35.5013479,3.92381119 34.9756781,5.05735664 L34.8880664,5.05735664 C31.5588244,5.05735664 28.580029,6.45248951 26.1269033,9.06836364 C24.8127288,10.4634965 23.6737776,12.2074126 22.7100497,14.2129161 C22.7100497,14.2129161 22.5348264,14.5616993 22.5348264,14.6488951 C21.3958752,17.2647692 20.5197589,20.4038182 20.256924,23.8916503 C18.4170797,41.1564196 26.5649614,62.345 41.2837156,65.5712448 C41.4589388,65.920028 42.0722202,66.5303986 42.3350551,66.5303986 C42.59789,66.5303986 43.1235598,65.920028 43.3863947,65.5712448 C57.7547023,62.2578042 65.902584,41.1564196 64.0627398,23.8916503 L64.0627398,23.8916503 L64.0627398,23.8916503 Z" id="Crest-path" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
    </g>
</svg></div><input type="radio" style="display: none;" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>[navbar]" value="navbar" <?php $this->link(); ?> /></label>
                   <label id="righthandLayout" for="<?php echo $this->id; ?>[righthand]" class="layoutOption"><span>Anchored Right Nav</span><div class="layoutIcon"><svg width="277px" height="111px" viewBox="0 0 277 111" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <!-- Generator: Sketch 3.5.1 (25234) - http://www.bohemiancoding.com/sketch -->
    <title>Untitled</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Main-Navigation" sketch:type="MSLayerGroup" fill="#898989" fill-opacity="0.265285326">
            <rect id="Rectangle-3" sketch:type="MSShapeGroup" x="0" y="0" width="277" height="14"></rect>
        </g>
        <g id="Main-Navigation" sketch:type="MSLayerGroup" transform="translate(217.000000, 52.000000)" fill="#898989" fill-opacity="0.265285326">
            <rect id="Rectangle-3" sketch:type="MSShapeGroup" x="0" y="0" width="44" height="14"></rect>
        </g>
        <g id="Main-Navigation" sketch:type="MSLayerGroup" transform="translate(157.000000, 52.000000)" fill="#898989" fill-opacity="0.265285326">
            <rect id="Rectangle-3" sketch:type="MSShapeGroup" x="0" y="0" width="44" height="14"></rect>
        </g>
        <g id="Main-Navigation" sketch:type="MSLayerGroup" transform="translate(97.000000, 52.000000)" fill="#898989" fill-opacity="0.265285326">
            <rect id="Rectangle-3" sketch:type="MSShapeGroup" x="0" y="0" width="44" height="14"></rect>
        </g>
        <path d="M54.0627398,56.8916503 C53.7122932,53.4038182 52.8361769,50.2647692 51.7848373,47.6488951 C51.7848373,47.5616993 51.6096141,47.3001119 51.6096141,47.2129161 C50.6458861,45.2074126 49.5069349,43.3763007 48.1927604,42.0683636 C45.7396348,39.5396853 42.7608393,38.1445524 39.4315973,38.0573566 L39.3439857,38.0573566 C38.8183159,36.9238112 37.3289181,36.139049 36.1023553,35.9646573 C36.1023553,35.9646573 35.3138506,33 32.1598319,33 C29.0058131,33 28.2173084,35.9646573 28.2173084,35.9646573 C26.903134,36.139049 25.5013479,36.9238112 24.9756781,38.0573566 L24.8880664,38.0573566 C21.5588244,38.0573566 18.580029,39.4524895 16.1269033,42.0683636 C14.8127288,43.4634965 13.6737776,45.2074126 12.7100497,47.2129161 C12.7100497,47.2129161 12.5348264,47.5616993 12.5348264,47.6488951 C11.3958752,50.2647692 10.5197589,53.4038182 10.256924,56.8916503 C8.41707971,74.1564196 16.5649614,95.345 31.2837156,98.5712448 C31.4589388,98.920028 32.0722202,99.5303986 32.3350551,99.5303986 C32.59789,99.5303986 33.1235598,98.920028 33.3863947,98.5712448 C47.7547023,95.2578042 55.902584,74.1564196 54.0627398,56.8916503 L54.0627398,56.8916503 L54.0627398,56.8916503 Z" id="Crest-path" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
    </g>
</svg></div><input type="radio" style="display: none;" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>[righthand]" value="righthand" <?php $this->link(); ?> /></label>


                  </ul>
                  <div class="layoutClear"></div>


                <script>

	            if(document.getElementById('uw-madison-wp-2015-header-layout-control[navbar]').checked) {
		            document.getElementById('uw-madison-wp-2015-header-layout-control[navbar]').parentNode.setAttribute("class", "layoutSelected");
		        }

		        if(document.getElementById('uw-madison-wp-2015-header-layout-control[righthand]').checked) {
		            document.getElementById('uw-madison-wp-2015-header-layout-control[righthand]').parentNode.setAttribute("class", "layoutSelected");
		        }



				document.getElementById("navbarLayout").addEventListener("click", function(){ this.setAttribute("class", "layoutSelected");
document.getElementById("righthandLayout").setAttribute("class", ""); 					 });



				document.getElementById("righthandLayout").addEventListener("click", function(){ this.setAttribute("class", "layoutSelected");
document.getElementById("navbarLayout").setAttribute("class", "");  });


				</script>
            <?php
       }
}




/**
 * Class to create a custom header layout control
 */
class Photo_Header_Size_Custom_Control extends WP_Customize_Control
{
      /**
       * Render the content on the theme customizer page
       */
      public $type = 'size';

      public function render_content()
       {
            ?>


                <label>
                  <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                  <em><?php echo esc_html( $this->description ); ?></em>
                 </label>


                 <div style="margin-top: 1em;">
                 <input id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" type="range" min="150" max="800" step="10" value="<?php echo $this->value(); ?>" <?php $this->link(); ?> />
                 </div>


                  <div class="layoutClear"></div>



            <?php
       }
}



/**
 * Class to create a custom max page width
 */
class Page_Width_Custom_Control extends WP_Customize_Control
{
      /**
       * Render the content on the theme customizer page
       */
      public $type = 'size';

      public function render_content()
       {
            ?>


                <label>
                  <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                  <em><?php echo esc_html( $this->description ); ?></em>
                 </label>


                 <div style="margin-top: 1em;">
                 <input id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" type="range" min="800" max="1500" step="10" value="<?php echo $this->value(); ?>" <?php $this->link(); ?> />
                 </div>


                  <div class="layoutClear"></div>



            <?php
       }
}





class WP_Customize_Layout_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
		?>


			<a href="#" id="layout1" class="layoutOption" data-value="option1">Option 1</a>
			<a href="#" id="layout2" class="layoutOption" data-value="option2">Option 2</a>
			<a href="#" id="layout3" class="layoutOption" data-value="option3">Option 3</a>


			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea id="layoutTextArea" rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>


			<script>
				document.getElementById("layout1").addEventListener("click", function(){ var valueoption = this.getAttribute("data-value");  document.getElementById("layoutTextArea").value = valueoption; });
				document.getElementById("layout2").addEventListener("click", function(){ var valueoption = this.getAttribute("data-value");  document.getElementById("layoutTextArea").value = valueoption; });
				document.getElementById("layout3").addEventListener("click", function(){ var valueoption = this.getAttribute("data-value");  document.getElementById("layoutTextArea").value = valueoption; });
			</script>
		<?php
		}
	}


}



/**** Adding Theme Customizer Options ****/
function mytheme_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here

   /**
 * Pages Drop-Down List
 *
 * Since NARGA v1.6
 */

$wp_customize->add_section( 'uw-madison-wp-2015-post-options' , array(
	'title'      => __( 'News/Blog Post Options', 'uw-madison-wp-2015' ),
	'priority'   => 58,
) );

$wp_customize->add_section( 'uw-madison-wp-2015-navigation-options' , array(
    	'title'      => __( 'Navigation Options', 'uw-madison-wp-2015' ),
    	'priority'   => 58,
	) );


$wp_customize->add_section( 'uw-madison-wp-2015-logo-options' , array(
    	'title'      => __( 'Custom Logo', 'uw-madison-wp-2015' ),
    	'priority'   => 20,
	) );


$wp_customize->add_section( 'uw-madison-wp-2015-home-options' , array(
    	'title'      => __( 'Latest Post Options', 'uw-madison-wp-2015' ),
    	'priority'   => 61,
	) );

$wp_customize->add_section( 'uw-madison-wp-2015-header-options' , array(
    	'title'      => __( 'Header Slide Options', 'uw-madison-wp-2015' ),
    	'priority'   => 60,
	) );

$wp_customize->add_section( 'uw-madison-wp-2015-visual-effects' , array(
    	'title'      => __( 'Visual Effects', 'uw-madison-wp-2015' ),
    	'priority'   => 60,
	) );

$wp_customize->add_section( 'uw-madison-wp-2015-font-options' , array(
    	'title'      => __( 'Fonts', 'uw-madison-wp-2015' ),
    	'priority'   => 57,
	) );

$wp_customize->add_section( 'uw-madison-wp-2015-social-options' , array(
    	'title'      => __( 'Social', 'uw-madison-wp-2015' ),
    	'priority'   => 70,
	) );


$wp_customize->add_section( 'uw-madison-wp-2015-analytics-options' , array(
    	'title'      => __( 'Analytics', 'uw-madison-wp-2015' ),
    	'priority'   => 80,
	) );

$wp_customize->add_section( 'uw-madison-wp-2015-search-options' , array(
    	'title'      => __( 'Search', 'uw-madison-wp-2015' ),
    	'priority'   => 80,
	) );

$wp_customize->add_setting('uw-madison-wp-2015_header_alt_image_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_alt_logo_options'

));


$wp_customize->add_setting('uw-madison-wp-2015_header_main_image_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_main_logo_options'

));



$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'logo',
           array(
               'label'      => __( 'Upload an alternate logo', 'uw-madison-wp-2015' ),
               'description'=> 'If available supply a version of your logo image that works well on a white background.',
               'section'    => 'uw-madison-wp-2015-logo-options',
               'settings'   => 'uw-madison-wp-2015_header_alt_image_id',
               'context'    => 'uw-madison-wp-2015-header_alt_image',
               'priority'	=> 2
           )
       )
);



/*** Primary Logo ***/
$wp_customize->add_setting('uw-madison-wp-2015_header_main_image_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_main_logo_options'

));



$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'logomain',
           array(
               'label'      => __( 'Upload a custom logo', 'uw-madison-wp-2015' ),
               'description'=> 'Upload your own logo in either PNG or SVG formats.',
               'section'    => 'uw-madison-wp-2015-logo-options',
               'settings'   => 'uw-madison-wp-2015_header_main_image_id',
               'context'    => 'uw-madison-wp-2015-header_main_image',
               'priority'	=> 1
           )
       )
);


$wp_customize->add_setting('uw-madison-wp-2015_tagline_location_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'below',
    'sanitize_callback' => 'sanitize_tagline_location'

));


$wp_customize->add_control('uw-madison-wp-2015-tagline_location', array(
    'label'      => __('Tagline Location', 'uw-madison-wp-2015'),
    'description'=> '',
    'section'    => 'title_tagline',
    'type'    => 'radio',
    'choices' => array(
            'above' => __( 'Above the Title', 'uw-madison-wp-2015' ),
            'below' => __( 'Below the Title', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_tagline_location_id',
));


$wp_customize->add_setting('uw-madison-wp-2015_campus_title_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'UNIVERSITY of WISCONSIN-MADISON',
    'sanitize_callback' => 'sanitize_campus_title'

));


$wp_customize->add_control('uw-madison-wp-2015-campus_title', array(
    'label'      => __('Campus Title', 'uw-madison-wp-2015'),
    'description'=> '',
    'section'    => 'title_tagline',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_campus_title_id',
));


$wp_customize->add_setting('uw-madison-wp-2015_campus_title_link_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_campus_title_link'

));


$wp_customize->add_control('uw-madison-wp-2015-campus_title_link', array(
    'label'      => __('Campus Title Link', 'uw-madison-wp-2015'),
    'description'=> '',
    'section'    => 'title_tagline',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_campus_title_link_id',
));






/*** Add option to move main logo for homepage ***/

$wp_customize->add_setting('uw-madison-wp-2015_home_logo_position_id', array(
    'capability'     => 'edit_theme_options',
    'default'		 => 'top-left',
    'type'           => 'theme_mod',
    'sanitize_callback' => 'sanitize_home_logo_position'

));


$wp_customize->add_control('uw-madison-wp-2015-home_logo_position', array(
    'label'      => __('Homepage Logo Position', 'uw-madison-wp-2015'),
    'description'=> 'Adjust the position of the logo on the homepage.',
    'section'    => 'uw-madison-wp-2015-logo-options',
    'type'    => 'radio',
    'choices' => array(
            'top-left' => __( 'Top Left (default)', 'uw-madison-wp-2015' ),
            'center' => __( 'Center of the Header Slide', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_home_logo_position_id',
    'priority'	=> 10
));



/*** Add option to hide main navigation ***/

$wp_customize->add_setting('uw-madison-wp-2015_post_featured_setting_id', array(
    'capability'     => 'edit_theme_options',
    'default'		 => 'overlay',
    'type'           => 'theme_mod',
    'sanitize_callback' => 'sanitize_post_featured'

));

$wp_customize->add_control('uw-madison-wp-2015-post_featured_style', array(
    'label'      => __('Featured Image Style', 'uw-madison-wp-2015'),
    'description'=> 'Select how featured images and their titles will be styled on all posts.',
    'section'    => 'uw-madison-wp-2015-post-options',
    'type'    => 'radio',
    'choices' => array(
            'overlay' => __( 'Overlay Title on the Image (default)', 'uw-madison-wp-2015' ),
            'title_above' => __( 'Place Title Above the Image', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_post_featured_setting_id',
    'priority'	=> 1
));


/*** Add option to hide main navigation ***/

$wp_customize->add_setting('uw-madison-wp-2015_hide_show_nav_id', array(
    'capability'     => 'edit_theme_options',
    'default'		 => 'no',
    'type'           => 'theme_mod',
    'sanitize_callback' => 'sanitize_hide_show_nav'

));


$wp_customize->add_control('uw-madison-wp-2015-hide_show_nav', array(
    'label'      => __('Hide Main Navigation', 'uw-madison-wp-2015'),
    'description'=> 'Hide the main navigation in the event there no subpages.',
    'section'    => 'uw-madison-wp-2015-navigation-options',
    'type'    => 'radio',
    'choices' => array(
            'no' => __( 'Show Navigation (default)', 'uw-madison-wp-2015' ),
            'yes' => __( 'Hide Navigation', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_hide_show_nav_id',
    'priority'	=> 1
));



/*** Nav Text Size ***/

$wp_customize->add_setting('uw-madison-wp-2015_nav_text_size_id', array(
    'capability'     => 'edit_theme_options',
    'default'		 => 'default',
    'type'           => 'theme_mod',
    'sanitize_callback' => 'sanitize_nav_text_size'

));


$wp_customize->add_control('uw-madison-wp-2015-nav_text_size', array(
    'label'      => __('Navigation Font Size', 'uw-madison-wp-2015'),
    'description'=> 'Select a navigation font size.',
    'section'    => 'uw-madison-wp-2015-navigation-options',
    'type'    => 'radio',
    'choices' => array(
            'default' => __( 'Normal (default)', 'uw-madison-wp-2015' ),
            'large' => __( 'Large', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_nav_text_size_id',
    'priority'	=> 1
));



/*** adjust logo image width if desired ***/

/*$wp_customize->add_setting('uw-madison-wp-2015_logo_width_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_logo_width'

));


$wp_customize->add_control('uw-madison-wp-2015-logo_width', array(
    'label'      => __('Uploaded Logo Width', 'uw-madison-wp-2015'),
    'description'=> '',
    'section'    => 'header_image',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_logo_width_id',
));*/

/*** Google CSE ***/

$wp_customize->add_setting('uw-madison-wp-2015_gcse_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_ga_options'

));

$wp_customize->add_control('uw-madison-wp-2015-gcse', array(
    'label'      => __('Google Custom Search', 'uw-madison-wp-2015'),
    'description'=> 'Enter your Google CSE Search ID. When this field is blank your site will use the default Wordpress search.',
    'section'    => 'uw-madison-wp-2015-search-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_gcse_id',
));



/*** Google Analytics ***/

$wp_customize->add_setting('uw-madison-wp-2015_ga_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_ga_options'

));

$wp_customize->add_control('uw-madison-wp-2015-ga', array(
    'label'      => __('Google Analytics', 'uw-madison-wp-2015'),
    'description'=> 'Enter your Tracking ID.',
    'section'    => 'uw-madison-wp-2015-analytics-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_ga_id',
));


/*** Eloqua Analytics ***/

$wp_customize->add_setting('uw-madison-wp-2015_eq_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_eq_options'

));

$wp_customize->add_control('uw-madison-wp-2015-eq', array(
    'label'      => __('Eloqua Analytics', 'uw-madison-wp-2015'),
    'description'=> 'Enter your Eloqua tracking ID.',
    'section'    => 'uw-madison-wp-2015-analytics-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_eq_id',
));


/*** Facebook Pixel Analytics ***/

$wp_customize->add_setting('uw-madison-wp-2015_fp_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_fp_options'

));

$wp_customize->add_control('uw-madison-wp-2015-fp', array(
    'label'      => __('Facebook Pixel Analytics', 'uw-madison-wp-2015'),
    'description'=> 'Enter your Pixel ID.',
    'section'    => 'uw-madison-wp-2015-analytics-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_fp_id',
));


/*** HotJar Analytics ***/

$wp_customize->add_setting('uw-madison-wp-2015_hj_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_hj_options'

));

$wp_customize->add_control('uw-madison-wp-2015-hj', array(
    'label'      => __('Hotjar Analytics', 'uw-madison-wp-2015'),
    'description'=> 'Enter your ID.',
    'section'    => 'uw-madison-wp-2015-analytics-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_hj_id',
));




/*** Twitter ***/
$wp_customize->add_setting('uw-madison-wp-2015_twitter_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_twitter_options'

));


$wp_customize->add_control('uw-madison-wp-2015-twitter', array(
    'label'      => __('Twitter', 'uw-madison-wp-2015'),
    'description'=> 'Enter your twitter username.',
    'section'    => 'uw-madison-wp-2015-social-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_twitter_id',
));


/*** Flickr ***/
$wp_customize->add_setting('uw-madison-wp-2015_flickr_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_flickr_options'

));


$wp_customize->add_control('uw-madison-wp-2015-flickr', array(
    'label'      => __('Flickr', 'uw-madison-wp-2015'),
    'description'=> 'Enter your flickr URL.',
    'section'    => 'uw-madison-wp-2015-social-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_flickr_id',
));


/*** Facebook ***/
$wp_customize->add_setting('uw-madison-wp-2015_facebook_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_facebook_options'

));


$wp_customize->add_control('uw-madison-wp-2015-facebook', array(
    'label'      => __('Facebook', 'uw-madison-wp-2015'),
    'description'=> 'Enter your facebook username.',
    'section'    => 'uw-madison-wp-2015-social-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_facebook_id',
));

/*** LinkedIn ***/
$wp_customize->add_setting('uw-madison-wp-2015_linkedin_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_linkedin_options'

));


$wp_customize->add_control('uw-madison-wp-2015-linkedin', array(
    'label'      => __('LinkedIn', 'uw-madison-wp-2015'),
    'description'=> 'Enter your linkedin URL.',
    'section'    => 'uw-madison-wp-2015-social-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_linkedin_id',
));


/*** Instagram ***/
$wp_customize->add_setting('uw-madison-wp-2015_instagram_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_instagram_options'

));


$wp_customize->add_control('uw-madison-wp-2015-instagram', array(
    'label'      => __('Instagram', 'uw-madison-wp-2015'),
    'description'=> 'Enter your instagram URL.',
    'section'    => 'uw-madison-wp-2015-social-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_instagram_id',
));

/*** Youtube ***/
$wp_customize->add_setting('uw-madison-wp-2015_youtube_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_youtube_options'

));


$wp_customize->add_control('uw-madison-wp-2015-youtube', array(
    'label'      => __('Youtube', 'uw-madison-wp-2015'),
    'description'=> 'Enter your youtube username.',
    'section'    => 'uw-madison-wp-2015-social-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_youtube_id',
));


$wp_customize->add_setting('uw-madison-wp-2015_options_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'sanitize_callback' => 'sanitize_page_feature'

));


$wp_customize->add_control('uw-madison-wp-2015-home-options-control', array(
    'label'      => __('Featured Page', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-home-options',
    'type'    => 'dropdown-pages',
    'settings'   => 'uw-madison-wp-2015_options_id',
));



//Home Page Layout Options
$wp_customize->add_setting('uw-madison-wp-2015_layout_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'circles',
    'sanitize_callback' => 'sanitize_home_layout'

));


//Header Layout Options
$wp_customize->add_setting('uw-madison-wp-2015_header_layout_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'navbar',
    'sanitize_callback' => 'sanitize_header_layout'

));


//Photo Header Size
$wp_customize->add_setting('uw-madison-wp-2015_photo_header_size_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '200',
    'sanitize_callback' => 'sanitize_photo_size'

));


//Homepage Photo Header Size
$wp_customize->add_setting('uw-madison-wp-2015-home_photo_header_size_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '500',
    'sanitize_callback' => 'sanitize_homepage_photo_size'

));


$wp_customize->add_setting('uw-madison-wp-2015_header_style_options_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'photo',
    'sanitize_callback' => 'sanitize_header_options'

));





$wp_customize->add_setting('uw-madison-wp-2015_noimage_crest_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'monochrome',
    'sanitize_callback' => 'sanitize_logonoimage_options'


));


$wp_customize->add_control('uw-madison-wp-2015_noimage_crest', array(
    'label'      => __('Crest Style', 'uw-madison-wp-2015'),
    'description'=> 'Crest style is only applied when no header image is present.',
    'section'    => 'title_tagline',
    'type'    => 'radio',
    'choices' => array(
            'monochrome' => __( 'Monochrome', 'uw-madison-wp-2015' ),
            'color' => __( 'Color', 'uw-madison-wp-2015' ),
            'hybrid' => __( 'Hybrid', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_noimage_crest_id',
    'priority' => 10,
));


$wp_customize->add_setting('uw-madison-wp-2015_fonts_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'verlag-option',
    'sanitize_callback' => 'sanitize_fonts_options'

));


$wp_customize->add_control('uw-madison-wp-2015_fonts', array(
    'label'      => __('Typeface Selection', 'uw-madison-wp-2015'),
    'description'=> 'Verlag (the new UW typeface) is available for UW-Madison campus websites.',
    'section'    => 'uw-madison-wp-2015-font-options',
    'type'    => 'radio',
    'choices' => array(
	    	'verlag-option' => __( 'Verlag', 'uw-madison-wp-2015' ),
            'raleway-option' => __( 'Raleway/Open Sans', 'uw-madison-wp-2015' )

        ),
    'settings'   => 'uw-madison-wp-2015_fonts_id',
));


$wp_customize->add_control('uw-madison-wp-2015-header_style_options', array(
    'label'      => __('Navigation Bar Style', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-navigation-options',
    'type'    => 'radio',
    'choices' => array(
            //'transparent' => __( 'Transparent Navigation Bar', 'uw-madison-wp-2015' ),
            'opaque' => __( 'Opaque Navigation Bar', 'uw-madison-wp-2015' ),
            'photo' => __( 'Transparent Navigation Bar', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_header_style_options_id',
    'priority'   => 1,
));


/*** WORK HERE ***/

$wp_customize->add_setting('uw-madison-wp-2015_headerslides_transition_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
));


$wp_customize->add_control('uw-madison-wp-2015-headerslides_transition', array(
    'label'      => __('Use a cross dissolve effect for Header Slide transitions', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-header-options',
    'type'    => 'checkbox',
    'settings'   => 'uw-madison-wp-2015_headerslides_transition_id',
    'priority'   => 2,
));

$wp_customize->add_setting('uw-madison-wp-2015_headerslides_frostedglass_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
));


$wp_customize->add_control('uw-madison-wp-2015-headerslides_frostedglass', array(
    'label'      => __('Frosted Glass Effect on Homepage', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-header-options',
    'type'    => 'checkbox',
    'settings'   => 'uw-madison-wp-2015_headerslides_frostedglass_id',
    'priority'   => 2,
));


$wp_customize->add_setting('uw-madison-wp-2015_headerslides_frostedglass_subpages_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
));


$wp_customize->add_control('uw-madison-wp-2015-headerslides_frostedglass_subpages', array(
    'label'      => __('Frosted Glass Effect on Subpages', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-header-options',
    'type'    => 'checkbox',
    'settings'   => 'uw-madison-wp-2015_headerslides_frostedglass_subpages_id',
    'priority'   => 2,
));


$wp_customize->add_setting('uw-madison-wp-2015_headerslides_dots_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
));


$wp_customize->add_control('uw-madison-wp-2015-headerslides_dots', array(
    'label'      => __('Hide Header Slides Dots', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-header-options',
    'type'    => 'checkbox',
    'settings'   => 'uw-madison-wp-2015_headerslides_dots_id',
    'priority'   => 2,
));


$wp_customize->add_setting('uw-madison-wp-2015_headerslides_arrows_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
));


$wp_customize->add_control('uw-madison-wp-2015-headerslides_arrows', array(
    'label'      => __('Hide Header Slides Arrows', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-header-options',
    'type'    => 'checkbox',
    'settings'   => 'uw-madison-wp-2015_headerslides_arrows_id',
    'priority'   => 2,
));

/*$wp_customize->add_control('uw-madison-wp-2015-photo_header_size', array(
    'label'      => __('Header Style', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-header-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_photo_header_size_id',
));*/


$wp_customize->add_setting('uw-madison-wp-2015_dropdowns_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'disabled',
    'sanitize_callback' => 'sanitize_dropdown_options'

));


$wp_customize->add_control('uw-madison-wp-2015-dropdowns', array(
    'label'      => __('Drop Down Menus', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-navigation-options',
    'type'    => 'radio',
    'choices' => array(
            'enabled' => __( 'Enabled', 'uw-madison-wp-2015' ),
            'disabled' => __( 'Disabled', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_dropdowns_id',
));



$wp_customize->add_setting('uw-madison-wp-2015_breadcrumbs_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'hidden',
    'sanitize_callback' => 'sanitize_breadcrumbs_options'

));


$wp_customize->add_control('uw-madison-wp-2015-breadcrumbs', array(
    'label'      => __('Page Breadcrumbs', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-sidebar-options',
    'type'    => 'radio',
    'choices' => array(
            'shown' => __( 'Shown', 'uw-madison-wp-2015' ),
            'hidden' => __( 'Hidden', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_breadcrumbs_id',
));



/*** max page width option */
$wp_customize->add_setting('uw-madison-wp-2015_maxpgwidth_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '1500',
    'sanitize_callback' => 'sanitize_maxpgwidth_options'

));


/*$wp_customize->add_control('uw-madison-wp-2015-maxpgwidth', array(
    'label'      => __('Max Page Width', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-sidebar-options',
    'type'    => 'radio',
    'choices' => array(
            'shown' => __( 'Shown', 'uw-madison-wp-2015' ),
            'hidden' => __( 'Hidden', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_maxpgwidth_id',
));*/


$wp_customize->add_control( new Page_Width_Custom_Control(
	$wp_customize,
	'uw-madison-wp-2015-maxpgwidth',
	array(
		'label'	=> __( 'Max Page Width', 'uw-madison-wp-2015' ),
		'description' => '',
		'section' => 'uw-madison-wp-2015-sidebar-options',
		'settings' => 'uw-madison-wp-2015_maxpgwidth_id',
		'priority'   => 2,
	)
));



/** Posted by location **/

$wp_customize->add_setting('uw-madison-wp-2015_postedby_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'upper',
    'sanitize_callback' => 'sanitize_postedby_options'

));


$wp_customize->add_control('uw-madison-wp-2015-postedby', array(
    'label'      => __('Posted By Location', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-sidebar-options',
    'type'    => 'radio',
    'choices' => array(
            'upper' => __( 'Below Headline', 'uw-madison-wp-2015' ),
            'lower' => __( 'After Content', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_postedby_id',
));



$wp_customize->add_setting('uw-madison-wp-2015_sidebar_style_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'dots',
    'sanitize_callback' => 'sanitize_sidebar_style_options'

));


$wp_customize->add_control('uw-madison-wp-2015-sidebar_style', array(
    'label'      => __('Sidebar Style', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-sidebar-options',
    'type'    => 'radio',
    'choices' => array(
            'dots' => __( 'Dots', 'uw-madison-wp-2015' ),
            'card' => __( 'Card', 'uw-madison-wp-2015' ),
            'line' => __( 'Line', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_sidebar_style_id',
));



$wp_customize->add_setting('uw-madison-wp-2015_tablesaw_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'tablesaw',
    'sanitize_callback' => 'sanitize_tablesaw_options'

));


$wp_customize->add_control('uw-madison-wp-2015-tablesaw', array(
    'label'      => __('Mobile Responsive Tables', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-sidebar-options',
    'type'    => 'radio',
    'choices' => array(
            'tablesaw' => __( 'Tablesaw', 'uw-madison-wp-2015' ),
            'datatables' => __( 'Data Tables', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_tablesaw_id',
));



$wp_customize->add_setting('uw-madison-wp-2015_header_slides_options_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'shown',
    'sanitize_callback' => 'sanitize_header_slides_options'

));


$wp_customize->add_control('uw-madison-wp-2015-header_slides_options', array(
    'label'      => __('Header Slides on Homepage', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-header-options',
    'type'    => 'radio',
    'choices' => array(
            'shown' => __( 'Shown', 'uw-madison-wp-2015' ),
            'hidden' => __( 'Hidden', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_header_slides_options_id',
    'priority'	=> 1
));





/*$wp_customize->add_control('uw-madison-wp-2015-home-layout', array(
    'label'      => __('Home Page Layout', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-home-options',
    'type'    => 'radio',
    'choices' => array(
            'circles' => __( 'Three Columns', 'uw-madison-wp-2015' ),
            'cards' => __( 'Card Mosaic', 'uw-madison-wp-2015' ),
            'left-sidebar' => __( 'Left Hand Sidebar', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_layout_id',
));*/

/*$wp_customize->add_control(
    new Layout_Picker_Custom_Control(
        $wp_customize,
        'uw-madison-wp-2015-home-layout',
        array(
		'label' => __( 'Home Page Layout', 'uw-madison-wp-2015' ),
		'section' => 'uw-madison-wp-2015-home-options',
		'settings' => 'uw-madison-wp-2015_layout_id',
		'type' => 'radio',
		'choices' => array(
            'circles' => __( 'Three Columns', 'uw-madison-wp-2015' ),
            'cards' => __( 'Card Mosaic', 'uw-madison-wp-2015' ),
            'left-sidebar' => __( 'Left Hand Sidebar', 'uw-madison-wp-2015' )
        ),
        )
    )
);
*/

$wp_customize->add_control( new Layout_Picker_Custom_Control(
	$wp_customize,
	'uw-madison-wp-2015-home-layout-control',
	array(
		'label'	=> __( 'Latest Posts Layout', 'uw-madison-wp-2015' ),
		'section' => 'uw-madison-wp-2015-home-options',
		'settings' => 'uw-madison-wp-2015_layout_id',
	)
));


$wp_customize->add_control( new Header_Layout_Picker_Custom_Control(
	$wp_customize,
	'uw-madison-wp-2015-header-layout-control',
	array(
		'label'	=> __( 'Navigation Layout', 'uw-madison-wp-2015' ),
		'section' => 'uw-madison-wp-2015-navigation-options',
		'settings' => 'uw-madison-wp-2015_header_layout_id',
	)
));


$wp_customize->add_control( new Photo_Header_Size_Custom_Control(
	$wp_customize,
	'uw-madison-wp-2015-home_photo_header_size',
	array(
		'label'	=> __( 'Header Slide Height on Homepage', 'uw-madison-wp-2015' ),
		'description' => '',
		'section' => 'uw-madison-wp-2015-header-options',
		'settings' => 'uw-madison-wp-2015-home_photo_header_size_id',
		'priority'   => 2,
	)
));


$wp_customize->add_control( new Photo_Header_Size_Custom_Control(
	$wp_customize,
	'uw-madison-wp-2015-photo_header_size',
	array(
		'label'	=> __( 'Header Slide Height on Subpages', 'uw-madison-wp-2015' ),
		'description' => '',
		'section' => 'uw-madison-wp-2015-header-options',
		'settings' => 'uw-madison-wp-2015_photo_header_size_id',
		'priority'   => 3,
	)
));



// Adding option to choose simple or expanded sidebar nav
$wp_customize->add_section( 'uw-madison-wp-2015-sidebar-options' , array(
    	'title'      => __( 'Page Options', 'uw-madison-wp-2015' ),
    	'priority'   => 62,
	) );

$wp_customize->add_setting('uw-madison-wp-2015_sidebar_options_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'default'		 => 'simple-nav',
    'sanitize_callback' => 'sanitize_sidebar_nav'

));


$wp_customize->add_control('uw-madison-wp-2015-sidebar-options', array(
    'label'      => __('Sidebar Navigation Style', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-sidebar-options',
    'type'    => 'radio',
    'choices' => array(
            'simple-nav' => __( 'Simple Navigation', 'uw-madison-wp-2015' ),
            'expanded-nav' => __( 'Expanded Navigation', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_sidebar_options_id',
));



function sanitize_hide_show_nav( $value ) {
    if ( !$value )
        $value = 'no';

    return $value;
}

function sanitize_post_featured( $value ) {
    if ( !$value )
        $value = 'overlay';

    return $value;
}

function sanitize_nav_text_size( $value ) {
    if ( !$value )
        $value = 'default';

    return $value;
}

function sanitize_home_logo_position( $value ) {
    if ( !$value )
        $value = 'top-left';

    return $value;
}


function sanitize_page_feature( $value ) {
    if ( !$value )
        $value = '-Select-';

    return $value;
}

function sanitize_campus_title( $value ) {
    if ( !$value )
        $value = 'UNIVERSITY of WISCONSIN-MADISON';

    return $value;
}

function sanitize_maxpgwidth_options( $value ) {
    if ( !$value )
        $value = '1500';

    return $value;
}

function sanitize_tagline_location( $value ) {
    if ( !$value )
        $value = 'below';

    return $value;
}

function sanitize_campus_title_link( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}


function sanitize_sidebar_nav( $value ) {
    if ( !$value )
        $value = 'simple';

    return $value;
}

function sanitize_header_options( $value ) {
    if ( !$value )
        $value = 'transparent';

    return $value;
}

function sanitize_dropdown_options( $value ) {
    if ( !$value )
        $value = 'disabled';

    return $value;
}

function sanitize_breadcrumbs_options( $value ) {
    if ( !$value )
        $value = 'hidden';

    return $value;
}


function sanitize_postedby_options( $value ) {
    if ( !$value )
        $value = 'upper';

    return $value;
}

function sanitize_sidebar_style_options( $value ) {
    if ( !$value )
        $value = 'dots';

    return $value;
}

function sanitize_tablesaw_options( $value ) {
    if ( !$value )
        $value = 'tablesaw';

    return $value;
}

function sanitize_header_slides_options( $value ) {
    if ( !$value )
        $value = 'shown';

    return $value;
}

function sanitize_twitter_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}

function sanitize_instagram_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}

function sanitize_flickr_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}


function sanitize_ga_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}

function sanitize_hj_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}

function sanitize_eq_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}

function sanitize_fp_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}

function sanitize_facebook_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}

function sanitize_linkedin_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}

function sanitize_youtube_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}

function sanitize_home_layout( $value ) {
    if ( !$value )
        $value = 'circles';

    return $value;
}

function sanitize_header_layout( $value ) {
    if ( !$value )
        $value = 'navbar';

    return $value;
}

function sanitize_photo_size( $value ) {
    if ( !$value )
        $value = '200';

    return $value;
}

function sanitize_homepage_photo_size( $value ) {
    if ( !$value )
        $value = '500';

    return $value;
}

function sanitize_logonoimage_options( $value ) {
    if ( !$value )
        $value = 'monochrome';

    return $value;
}


function sanitize_fonts_options( $value ) {
    if ( !$value )
        $value = 'raleway-option';

    return $value;
}


function sanitize_alt_logo_options( $value ) {
    if ( !$value )
        $value = '';

    return $value;
}

function sanitize_main_logo_options( $value ) {
    if ( !$value )
		$value = '';

    return $value;
}

}
add_action( 'customize_register', 'mytheme_customize_register' );


/*function mytheme_customize_css()
{
    ?>
         <style type="text/css">
             body { color:<?php echo get_theme_mod('home_featurecolor', '#000000'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');*/


/**** Adjusted Excerpt Length ****/
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**** Search Suggest functionality ****/
add_action('wp_enqueue_scripts', 'se_wp_enqueue_scripts');
function se_wp_enqueue_scripts() {
    wp_enqueue_script('suggest',array( 'jquery' ));

}

add_action('wp_head', 'se_wp_head');
function se_wp_head() {
?>
<script type="text/javascript">


	var se_ajax_url = '<?php echo admin_url('admin-ajax.php','http'); ?>?action=se_lookup';
	var se_ajax_url_https = '<?php echo admin_url('admin-ajax.php','https'); ?>?action=se_lookup';
	var se_ajax_url = "//"+se_ajax_url.replace(/.*?:\/\//g, "");

	//console.log(se_ajax_url);
    jQuery(document).ready(function() {

	  	//console.log(se_ajax_url2);
	  	$.ajax({
		  url: se_ajax_url
		}).error(function(msg) {
				$.ajax({
				  url: se_ajax_url_https
				}).error(function(msg) {
					console.log("The connection to the admin interface has failed.");

				}).done(function(msg) {

				  var se_ajax_array = msg.split('~');


				  	jQuery('.search-field').suggest(se_ajax_array, {
			         suggestionColor   : '#cccccc',
					 moreIndicatorClass: 'suggest-more',
					 moreIndicatorText : '&hellip;'
		        	});
				});

		}).done(function(msg) {

		  var se_ajax_array = msg.split('~');


		  	jQuery('.search-field').suggest(se_ajax_array, {
	         suggestionColor   : '#cccccc',
			 moreIndicatorClass: 'suggest-more',
			 moreIndicatorText : '&hellip;'
        	});
		});

	   //console.log(se_ajax_url3);

    });
</script>
<?php
}

add_action('wp_ajax_se_lookup', 'se_lookup');
add_action('wp_ajax_nopriv_se_lookup', 'se_lookup');

function se_lookup() {
    global $wpdb;

	$search = $wpdb->get_results();

    $query = 'SELECT ID,post_title FROM ' . $wpdb->posts . '
        WHERE post_title LIKE \'' . $search . '%\'
        AND post_status = \'publish\'
        ORDER BY post_title ASC';

    //$post_array = [];
    foreach ($wpdb->get_results($query) as $row) {


        $post_title = $row->post_title;
        //$id = $row->ID;

        //$meta = get_post_meta($id, 'YOUR_METANAME', TRUE);

        echo $post_title . "~";

    }

    die();
}

//Force Deactivation of Normal ACF since ACF Pro is bundled with the theme.
function deactivate_plugin_conditional() {
    if ( is_plugin_active('advanced-custom-fields/acf.php') ) {
    	deactivate_plugins('advanced-custom-fields/acf.php');

    	add_action( 'admin_notices', function(){
 	    	echo '<div class="error"><p>It looks like you have the <b>advanced-custom-fields</b> plugin activated. The theme bundles ACF Pro. As a result your plugin will be deactivated while this theme is active.</p></div>';
 	  	});
 	  	return;

    }

    if ( is_plugin_active('advanced-custom-fields-pro/acf.php') ) {
    	deactivate_plugins('advanced-custom-fields-pro/acf.php');

    	add_action( 'admin_notices', function(){
 	    	echo '<div class="error"><p>It looks like you have the <b>advanced-custom-fields-pro</b> plugin activated. The theme bundles ACF Pro. As a result your installed acf pro plugin will be deactivated while this theme is active.</p></div>';
 	  	});
 	  	return;
    }

    if ( is_plugin_active('uw-madison-events-calendar/uwmadison_events.php') ) {
    	deactivate_plugins('uw-madison-events-calendar/uwmadison_events.php');

    	add_action( 'admin_notices', function(){
 	    	echo '<div class="error"><p>It looks like you have the <b>UW Events Calendar</b> plugin activated. The theme bundles this plugin automatically. As a result your plugin will be deactivated while this theme is active.</p></div>';
 	  	});
 	  	return;
    }

}
add_action( 'admin_init', 'deactivate_plugin_conditional' );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'uw_madison_wp_2015_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function uw_madison_wp_2015_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(


        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        /*array(
            'name'      => 'Advanced Custom Fields',
            'slug'      => 'advanced-custom-fields',
            'force_deactivation' => true,
        ),*/

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        /*array(
            'name'      => 'UW-Madison Events Calendar',
            'slug'      => 'uw-madison-events-calendar',
            'required'  => false,
        ),*/

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

/*** Adding custom 403 error Support ***/

function custom_error_pages()
{
    global $wp_query;

    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
    {
        $wp_query->is_404 = FALSE;
        $wp_query->is_page = TRUE;
        $wp_query->is_singular = TRUE;
        $wp_query->is_single = FALSE;
        $wp_query->is_home = FALSE;
        $wp_query->is_archive = FALSE;
        $wp_query->is_category = FALSE;
        add_filter('wp_title','custom_error_title',65000,2);
        add_filter('body_class','custom_error_class');
        status_header(403);
        get_template_part('403');
        exit;
    }


}

function custom_error_title($title='',$sep='')
{
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
        return "Forbidden ".$sep." ".get_bloginfo('name');


}

function custom_error_class($classes)
{
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
    {
        $classes[]="error403";
        return $classes;
    }


}

add_action('wp','custom_error_pages');


/**** Adding SVG Support ****/
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


/**** Add Featured Image Support ****/
add_theme_support( 'post-thumbnails' );


/**** Add editor styles ***/
add_editor_style( 'css/custom-editor-style.css' );


/***** FIX WP 4.7.1 broken MIME detection *****/
 function ignore_upload_ext($checked, $file, $filename, $mimes){

	//we only need to worry if WP failed the first pass
	if(!$checked['type']){
		//rebuild the type info
		$wp_filetype = wp_check_filetype( $filename, $mimes );
		$ext = $wp_filetype['ext'];
		$type = $wp_filetype['type'];
		$proper_filename = $filename;

		//preserve failure for non-svg images
		if($type && 0 === strpos($type, 'image/') && $ext !== 'svg'){
			$ext = $type = false;
		}

		//everything else gets an OK, so e.g. we've disabled the error-prone finfo-related checks WP just went through. whether or not the upload will be allowed depends on the <code>upload_mimes</code>, etc.

		$checked = compact('ext','type','proper_filename');
	}

	return $checked;
}
add_filter('wp_check_filetype_and_ext', 'ignore_upload_ext', 10, 4);



/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function pageeditor_enqueue_custom_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/dist/styles/admin-styles-02022018.min.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'pageeditor_enqueue_custom_admin_style' );


/*** Setting default header for theme ****/
$defaults = array(
	'default-image'          => get_template_directory_uri() . '/images/default-logo-bw.svg',
	'width'                  => 250,
	'height'                 => 80,
	'flex-height'            => true,
	'flex-width'             => true,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => false,
	'default-text-color'     => '#ffffff',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);

$header_image = get_header_image();
if($header_image) {
	add_theme_support( 'custom-header', $defaults );
}

register_default_headers( array(
	'colorcrest' => array(
		'url'           => '%s/images/uw_logo_color.svg',
		'thumbnail_url' => '%s/images/uw_logo_color.svg',
		'description'   => __( 'Color UW Logo', 'uw-madison-wp-2015' ),

	),
	'bwcrest' => array(
		'url'           => '%s/images/default-logo-bw.svg',
		'thumbnail_url' => '%s/images/default-logo-bw.svg',
		'description'   => __( 'Monochrome UW Logo', 'uw-madison-wp-2015' ),

	)

) );


/**** Added ACF fields for Header Slides ****/
if( function_exists('acf_add_local_field_group') ):

	include 'acf_fields/advanced_page_editor_fields.php';

	include 'acf_fields/directory_fields.php';

/*acf_add_local_field_group(array (
	'key' => 'group_57980a9959a78',
	'title' => 'Advanced Formatting',
	'fields' => array (
		array (
			'key' => 'field_57981a7f3d3c9',
			'label' => 'Page Editor',
			'name' => 'page_editor',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'default' => 'Normal WordPress Editor',
				'advanced' => 'Advanced Content Editor',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'default',
			'layout' => 'vertical',
		),
		array (
			'key' => 'field_57980ae336fb5',
			'label' => 'Page Content Options',
			'name' => 'page_content_options',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_57981a7f3d3c9',
						'operator' => '==',
						'value' => 'advanced',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => 'layoutTypes',
				'id' => '',
			),
			'button_label' => 'Select Content Layout',
			'min' => '',
			'max' => '',
			'layouts' => array (
				array (
					'key' => '57d6195b19fe4',
					'name' => 'full_width',
					'label' => 'Full Width',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57d6198e19fe5',
							'label' => 'Full Width Content Options',
							'name' => 'full_width_content_options',
							'type' => 'flexible_content',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => 'typeContainer',
								'id' => '',
							),
							'button_label' => 'Add Full Width Content',
							'min' => '',
							'max' => '',
							'layouts' => array (
								array (
									'key' => '582d3731a0b9d',
									'name' => 'title_text',
									'label' => 'Title Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_582d376ea0b9e',
											'label' => 'Text Content',
											'name' => 'text_content',
											'type' => 'text',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '582d3799a0b9f',
									'name' => 'body_text',
									'label' => 'Body Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_582d379fa0ba0',
											'label' => 'Text Content',
											'name' => 'text_content',
											'type' => 'wysiwyg',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'tabs' => 'visual',
											'toolbar' => 'basic',
											'media_upload' => 1,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '582dd7ac17e04',
									'name' => 'button',
									'label' => 'Button',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_582dd7bc17e05',
											'label' => 'Button Text',
											'name' => 'button_text',
											'type' => 'text',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
										array (
											'key' => 'field_582dd7fc17e07',
											'label' => 'Button Action',
											'name' => 'button_action',
											'type' => 'radio',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'page' => 'Page',
												'customurl' => 'Custom URL',
											),
											'allow_null' => 0,
											'other_choice' => 0,
											'save_other_choice' => 0,
											'default_value' => '',
											'layout' => 'vertical',
										),
										array (
											'key' => 'field_582dd7de17e06',
											'label' => 'Button Link URL',
											'name' => 'button_link',
											'type' => 'url',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582dd7fc17e07',
														'operator' => '==',
														'value' => 'customurl',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_582dd83517e08',
											'label' => 'Link to Page or Post',
											'name' => 'link_to_page',
											'type' => 'page_link',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582dd7fc17e07',
														'operator' => '==',
														'value' => 'page',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'post_type' => array (
											),
											'taxonomy' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d619a1e7c89',
									'name' => 'fw_highlighted_content',
									'label' => 'Highlighted Posts/Pages',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df50cffadd6',
											'label' => 'Appearance Options',
											'name' => 'appearance_options',
											'type' => 'select',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'default' => 'Default',
												'offset' => 'Offset Columns',
												'3col' => '3 Columns',
											),
											'default_value' => array (
												0 => 'default',
											),
											'allow_null' => 0,
											'multiple' => 0,
											'ui' => 0,
											'ajax' => 0,
											'placeholder' => '',
											'disabled' => 0,
											'readonly' => 0,
										),
										array (
											'key' => 'field_57d61aba19fe6',
											'label' => 'Highlighted Content Type',
											'name' => 'fw_highlighted_content_type',
											'type' => 'flexible_content',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'button_label' => 'Add Highlighted Content',
											'min' => '',
											'max' => '',
											'layouts' => array (
												array (
													'key' => '57d61abf52cc2',
													'name' => 'fw_latest_posts',
													'label' => 'Latest Posts',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_57d61e5019fe7',
															'label' => 'Number of Posts',
															'name' => 'fw_number_of_posts',
															'type' => 'number',
															'instructions' => '',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => '',
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '57d61edb19fe9',
													'name' => 'fw_posts_by_category',
													'label' => 'Posts by Category',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_57d61ee419fea',
															'label' => 'Highlighted Category',
															'name' => 'fw_highlighted_category',
															'type' => 'taxonomy',
															'instructions' => '',
															'required' => 1,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'taxonomy' => 'category',
															'field_type' => 'checkbox',
															'allow_null' => 1,
															'add_term' => 0,
															'save_terms' => 0,
															'load_terms' => 0,
															'return_format' => 'id',
															'multiple' => 0,
														),
														array (
															'key' => 'field_57d61f4c19feb',
															'label' => 'Number of Posts',
															'name' => 'fw_cat_number_of_posts',
															'type' => 'number',
															'instructions' => '',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => '',
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
														array (
															'key' => 'field_58caa779b9d79',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => '',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '57d61f8419fec',
													'name' => 'fw_highlighted_page',
													'label' => 'Highlighted Page',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_57d61f9019fed',
															'label' => 'Page to Highlight',
															'name' => 'fw_page_to_highlight',
															'type' => 'post_object',
															'instructions' => '',
															'required' => 1,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'post_type' => array (
																0 => 'page',
															),
															'taxonomy' => array (
															),
															'allow_null' => 1,
															'multiple' => 1,
															'return_format' => 'id',
															'ui' => 1,
														),
													),
													'min' => '',
													'max' => '',
												),
											),
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '582de7893af65',
									'name' => 'person_feature',
									'label' => 'Person Feature',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_582de7d63af67',
											'label' => 'Section Title',
											'name' => 'section_title',
											'type' => 'text',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
										array (
											'key' => 'field_582de7a03af66',
											'label' => 'Person\'s Name',
											'name' => 'persons_name',
											'type' => 'text',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
										array (
											'key' => 'field_582de7ff3af68',
											'label' => 'Person Bio',
											'name' => 'person_bio',
											'type' => 'wysiwyg',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'tabs' => 'visual',
											'toolbar' => 'basic',
											'media_upload' => 0,
										),
										array (
											'key' => 'field_582de90b3af69',
											'label' => 'Person Photo',
											'name' => 'person_photo',
											'type' => 'image',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'id',
											'preview_size' => 'thumbnail',
											'library' => 'all',
											'min_width' => 300,
											'min_height' => 300,
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => 12,
											'mime_types' => '',
										),
										array (
											'key' => 'field_582de95a3af6a',
											'label' => 'Quote',
											'name' => 'quote',
											'type' => 'textarea',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'maxlength' => '',
											'rows' => 4,
											'new_lines' => 'wpautop',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58d3f8b313a57',
									'name' => 'remote_wp_content',
									'label' => 'Remote WordPress Content',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58d3f8c113a58',
											'label' => 'Source URL',
											'name' => 'source_url',
											'type' => 'url',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_58d3f8cd13a59',
											'label' => 'Number of Posts',
											'name' => 'number_of_posts',
											'type' => 'number',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => 1,
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => '',
											'max' => '',
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '57d85ba2c35ec',
					'name' => '2_column (50/50)',
					'label' => '2 Column',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57dae51e2ec56',
							'label' => 'Column Sizes',
							'name' => 'column_sizes',
							'type' => 'select',
							'instructions' => '',
							'required' => '',
							'conditional_logic' => '',
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								5050 => '50% / 50%',
								3366 => '33% / 66%',
								6633 => '66% / 33%',
								2775 => '25% / 75%',
								7525 => '75% / 25%',
							),
							'default_value' => array (
								0 => 5050,
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_57d897980b138',
							'label' => 'Left Column Style',
							'name' => 'left_column_style',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 50,
								'class' => 'typeContainer',
								'id' => '',
							),
							'choices' => array (
								'default' => 'Default',
								'redbg' => 'Red Background',
							),
							'default_value' => array (
								0 => 'default',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_57d8982a0b139',
							'label' => 'Right Column Style',
							'name' => 'right_column_style',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 50,
								'class' => 'typeContainer',
								'id' => '',
							),
							'choices' => array (
								'default' => 'Default',
								'redbg' => 'Red Background',
							),
							'default_value' => array (
								0 => 'default',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_57d85bc6c35ed',
							'label' => 'Left Column',
							'name' => '2c_5050_left_column',
							'type' => 'flexible_content',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 50,
								'class' => 'typeContainer',
								'id' => '',
							),
							'button_label' => 'Add Content',
							'min' => '',
							'max' => '',
							'layouts' => array (
								array (
									'key' => '57d863756b082',
									'name' => 'title_text',
									'label' => 'Title Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57d8637e6b083',
											'label' => 'Text Content',
											'name' => 'title_text_content',
											'type' => 'text',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d85bdd2c2b0',
									'name' => 'body_text',
									'label' => 'Body Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57d85c4b72bf3',
											'label' => 'Text Content',
											'name' => 'text_content',
											'type' => 'wysiwyg',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'tabs' => 'visual',
											'toolbar' => 'basic',
											'media_upload' => 1,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '582ddb526ad7b',
									'name' => 'button',
									'label' => 'Button',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_582ddb576ad7c',
											'label' => 'Button Text',
											'name' => 'button_text',
											'type' => 'text',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
										array (
											'key' => 'field_582ddb946ad7d',
											'label' => 'Button Action',
											'name' => 'button_action',
											'type' => 'radio',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'page' => 'Page',
												'customurl' => 'Custom URL',
											),
											'allow_null' => 0,
											'other_choice' => 0,
											'save_other_choice' => 0,
											'default_value' => '',
											'layout' => 'vertical',
										),
										array (
											'key' => 'field_582ddbb56ad7e',
											'label' => 'Button Link URL',
											'name' => 'button_link',
											'type' => 'url',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582ddb946ad7d',
														'operator' => '==',
														'value' => 'customurl',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_582ddbdf6ad7f',
											'label' => 'Link to Page or Post',
											'name' => 'link_to_page',
											'type' => 'page_link',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582ddb946ad7d',
														'operator' => '==',
														'value' => 'page',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'post_type' => array (
											),
											'taxonomy' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d9a46a7aaea',
									'name' => 'events',
									'label' => 'Events',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57d9a4737aaeb',
											'label' => 'Events URL',
											'name' => 'events_url',
											'type' => 'url',
											'instructions' => 'e.g. http://today.wisc.edu/events/tag/',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => 75,
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_57d9a4a57aaec',
											'label' => 'Number of Events',
											'name' => 'number_of_events',
											'type' => 'number',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => 25,
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => '',
											'max' => '',
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d9a59dc0e35',
									'name' => 'photo',
									'label' => 'Photo',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57d9a5acc0e36',
											'label' => 'Photo from Library',
											'name' => 'photo_from_library',
											'type' => 'image',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'id',
											'preview_size' => 'thumbnail',
											'library' => 'all',
											'min_width' => '',
											'min_height' => '',
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => '',
											'mime_types' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58c89dee10dea',
									'name' => '2c_highlighted_content',
									'label' => 'Highlighted Post/Page',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58cad651ad02c',
											'label' => 'Highlighted Content Style',
											'name' => 'highlighted_content_style',
											'type' => 'select',
											'instructions' => '',
											'required' => 0,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'default' => 'Default',
												'fixedheight' => 'Fixed height',
											),
											'default_value' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
											'ui' => 0,
											'ajax' => 0,
											'placeholder' => '',
											'disabled' => 0,
											'readonly' => 0,
										),
										array (
											'key' => 'field_58c89e1510deb',
											'label' => 'Highlighted Content Type',
											'name' => '2c_highlighted_content_type',
											'type' => 'flexible_content',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'button_label' => 'Add Row',
											'min' => '',
											'max' => '',
											'layouts' => array (
												array (
													'key' => '58c89e45277fc',
													'name' => '2c_post_by_category',
													'label' => 'Post By Category',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58c89e4e10dec',
															'label' => 'Post Category',
															'name' => '2c_post_category',
															'type' => 'taxonomy',
															'instructions' => '',
															'required' => 0,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'taxonomy' => 'category',
															'field_type' => 'checkbox',
															'allow_null' => 1,
															'add_term' => 0,
															'save_terms' => 0,
															'load_terms' => 0,
															'return_format' => 'id',
															'multiple' => 0,
														),
														array (
															'key' => 'field_58caa53246dbb',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => 'If you want to not pull the latest post choose a number to offset. For example: 2 would pull the third from the latest post.',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '58d3e4bac62a6',
													'name' => '2c_latest_posts',
													'label' => 'Latest Posts',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58d3e4bac62a8',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => 'If you want to not pull the latest post choose a number to offset. For example: 2 would pull the third from the latest post.',
															'required' => 1,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '58d2e1b58d49d',
													'name' => '2c_highlighted_page',
													'label' => 'Highlighted Page',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58d2e1cf8d4a0',
															'label' => 'Page to Highlight',
															'name' => '2c_page_to_highlight',
															'type' => 'post_object',
															'instructions' => '',
															'required' => 1,
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'post_type' => array (
																0 => 'page',
															),
															'taxonomy' => array (
															),
															'allow_null' => 0,
															'multiple' => 0,
															'return_format' => 'id',
															'ui' => 1,
														),
													),
													'min' => '',
													'max' => '',
												),
											),
										),
										array (
											'key' => 'field_58d42e35a5c71',
											'label' => 'Override Image',
											'name' => 'override_image',
											'type' => 'image',
											'instructions' => 'Manually supply an image for this featured content.',
											'required' => 0,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'id',
											'preview_size' => 'thumbnail',
											'library' => 'all',
											'min_width' => 200,
											'min_height' => 200,
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => '',
											'mime_types' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58cadcde83489',
									'name' => 'remote_wp_content',
									'label' => 'Remote WordPress Content',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58cadcf08348a',
											'label' => 'Source URL',
											'name' => 'source_url',
											'type' => 'url',
											'instructions' => 'Enter the url for the source of the remote content. The remote site must be running WordPress 4.5 or higher.',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_58cade438348b',
											'label' => 'Number of Posts',
											'name' => 'number_of_posts',
											'type' => 'number',
											'instructions' => 'Number of posts you would like to show, if the url is page content then leave the default value of 1.',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => 1,
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => 1,
											'max' => 50,
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
							),
						),
						array (
							'key' => 'field_57d85beac35ee',
							'label' => 'Right Column',
							'name' => '2c_5050_right_column',
							'type' => 'flexible_content',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 50,
								'class' => 'typeContainer',
								'id' => '',
							),
							'button_label' => 'Add Content',
							'min' => '',
							'max' => '',
							'layouts' => array (
								array (
									'key' => '57d863bacac17',
									'name' => 'title_text',
									'label' => 'Title Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57d863bacac18',
											'label' => 'Text Content',
											'name' => 'title_text_content',
											'type' => 'text',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d85bf6925ce',
									'name' => 'body_text',
									'label' => 'Body Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57d85db962c9b',
											'label' => 'Text Content',
											'name' => 'text_content',
											'type' => 'wysiwyg',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'tabs' => 'visual',
											'toolbar' => 'basic',
											'media_upload' => 1,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '582ddc512b93b',
									'name' => 'button',
									'label' => 'Button',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_582ddc552b93c',
											'label' => 'Button Text',
											'name' => 'button_text',
											'type' => 'text',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
										array (
											'key' => 'field_582ddc6e2b93d',
											'label' => 'Button Action',
											'name' => 'button_action',
											'type' => 'radio',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'page' => 'Page',
												'customurl' => 'Custom URL',
											),
											'allow_null' => 0,
											'other_choice' => 0,
											'save_other_choice' => 0,
											'default_value' => '',
											'layout' => 'vertical',
										),
										array (
											'key' => 'field_582ddc9f2b93e',
											'label' => 'Button Link URL',
											'name' => 'button_link',
											'type' => 'url',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582ddc6e2b93d',
														'operator' => '==',
														'value' => 'customurl',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_582ddcc02b93f',
											'label' => 'Link to Page or Post',
											'name' => 'link_to_page',
											'type' => 'page_link',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582ddc6e2b93d',
														'operator' => '==',
														'value' => 'page',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'post_type' => array (
											),
											'taxonomy' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d9a4c27aaed',
									'name' => 'events',
									'label' => 'Events',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57d9a4d27aaee',
											'label' => 'Events URL',
											'name' => 'events_url',
											'type' => 'url',
											'instructions' => 'e.g. http://today.wisc.edu/events/tag/',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => 75,
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_57d9a4f47aaef',
											'label' => 'Number of Events',
											'name' => 'number_of_events',
											'type' => 'number',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => 25,
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => '',
											'max' => '',
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d9a5eec0e37',
									'name' => 'photo',
									'label' => 'Photo',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57d9a5f4c0e38',
											'label' => 'Photo from Library',
											'name' => 'photo_from_library',
											'type' => 'image',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'id',
											'preview_size' => 'thumbnail',
											'library' => 'all',
											'min_width' => '',
											'min_height' => '',
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => '',
											'mime_types' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58c89e76dc7b7',
									'name' => '2c_highlighted_content',
									'label' => 'Highlighted Post/Page',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58cad66ead02d',
											'label' => 'Highlighted Content Style',
											'name' => 'highlighted_content_style',
											'type' => 'select',
											'instructions' => '',
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'default' => 'Default',
												'fixedheight' => 'Fixed height',
											),
											'default_value' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
											'ui' => 0,
											'ajax' => 0,
											'placeholder' => '',
											'disabled' => 0,
											'readonly' => 0,
										),
										array (
											'key' => 'field_58c89e8adc7b8',
											'label' => 'Highlighted Content Type',
											'name' => '2c_highlighted_content_type',
											'type' => 'flexible_content',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'button_label' => 'Add Row',
											'min' => '',
											'max' => '',
											'layouts' => array (
												array (
													'key' => '58c89e959b276',
													'name' => '2c_post_by_category',
													'label' => 'Post By Category',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58c89ea1dc7b9',
															'label' => 'Post Category',
															'name' => '2c_post_category',
															'type' => 'taxonomy',
															'instructions' => '',
															'required' => 0,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'taxonomy' => 'category',
															'field_type' => 'checkbox',
															'allow_null' => 1,
															'add_term' => 0,
															'save_terms' => 0,
															'load_terms' => 0,
															'return_format' => 'id',
															'multiple' => 0,
														),
														array (
															'key' => 'field_58caa51546dba',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => 'If you want to not pull the latest post choose a number to offset. For example: 2 would pull the third from the latest post.',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '58d3e4f2c62a9',
													'name' => '2c_latest_posts',
													'label' => 'Latest Posts',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58d3e4f2c62ab',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => 'If you want to not pull the latest post choose a number to offset. For example: 2 would pull the third from the latest post.',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '58d3e513c62ac',
													'name' => '2c_highlighted_page',
													'label' => 'Highlighted Page',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58d3e52dc62ae',
															'label' => 'Page to Highlight',
															'name' => '2c_page_to_highlight',
															'type' => 'post_object',
															'instructions' => '',
															'required' => 1,
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'post_type' => array (
																0 => 'page',
															),
															'taxonomy' => array (
															),
															'allow_null' => 0,
															'multiple' => 0,
															'return_format' => 'id',
															'ui' => 1,
														),
													),
													'min' => '',
													'max' => '',
												),
											),
										),
										array (
											'key' => 'field_58d42dbda5c70',
											'label' => 'Override Image',
											'name' => 'override_image',
											'type' => 'image',
											'instructions' => 'Manually supply an image for this featured content.',
											'required' => 0,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'id',
											'preview_size' => 'thumbnail',
											'library' => 'all',
											'min_width' => 200,
											'min_height' => 200,
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => '',
											'mime_types' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58d3eb41a352b',
									'name' => 'remote_wp_content',
									'label' => 'Remote WordPress Content',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58d3eb65a352c',
											'label' => 'Source URL',
											'name' => 'source_url',
											'type' => 'url',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_58d3eb76a352d',
											'label' => 'Number of Posts',
											'name' => 'number_of_posts',
											'type' => 'number',
											'instructions' => 'Number of posts you would like to show, if the url is page content then leave the default value of 1.',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => 1,
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => '',
											'max' => '',
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '57df5275e7330',
					'name' => '3_column',
					'label' => '3 Column',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57df5275e7331',
							'label' => 'Column Sizes',
							'name' => 'column_sizes',
							'type' => 'select',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								333333 => '33% / 33% / 33%',
								255025 => '25% / 50% / 25%',
								502525 => '50% / 25% / 25%',
								252550 => '25% / 25% / 50%',
							),
							'default_value' => array (
								0 => 333333,
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_57df5275e7332',
							'label' => 'Left Column Style',
							'name' => 'left_column_style',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 33,
								'class' => 'typeContainer',
								'id' => '',
							),
							'choices' => array (
								'default' => 'Default',
								'redbg' => 'Red Background',
							),
							'default_value' => array (
								0 => 'default',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_57df5309e7340',
							'label' => 'Middle Column Style',
							'name' => 'middle_column_style',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 33,
								'class' => 'typeContainer',
								'id' => '',
							),
							'choices' => array (
								'default' => 'Default',
								'redbg' => 'Red Background',
							),
							'default_value' => array (
								0 => 'default',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_57df5275e7333',
							'label' => 'Right Column Style',
							'name' => 'right_column_style',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 33,
								'class' => 'typeContainer',
								'id' => '',
							),
							'choices' => array (
								'default' => 'Default',
								'redbg' => 'Red Background',
							),
							'default_value' => array (
								0 => 'default',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'field_57df5275e7334',
							'label' => 'Left Column',
							'name' => '3c_5050_left_column',
							'type' => 'flexible_content',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 33,
								'class' => 'typeContainer',
								'id' => '',
							),
							'button_label' => 'Add Content',
							'min' => '',
							'max' => '',
							'layouts' => array (
								array (
									'key' => '57d863756b082',
									'name' => 'title_text',
									'label' => 'Title Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5275e7335',
											'label' => 'Text Content',
											'name' => 'title_text_content',
											'type' => 'text',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d85bdd2c2b0',
									'name' => 'body_text',
									'label' => 'Body Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5275e7336',
											'label' => 'Text Content',
											'name' => 'text_content',
											'type' => 'wysiwyg',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'tabs' => 'visual',
											'toolbar' => 'basic',
											'media_upload' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '582dddf4cce35',
									'name' => 'button',
									'label' => 'Button',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_582dddf8cce36',
											'label' => 'Button Text',
											'name' => 'button_text',
											'type' => 'text',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
										array (
											'key' => 'field_582dde10cce37',
											'label' => 'Button Action',
											'name' => 'button_action',
											'type' => 'radio',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'page' => 'Page',
												'customurl' => 'Custom URL',
											),
											'allow_null' => 0,
											'other_choice' => 0,
											'save_other_choice' => 0,
											'default_value' => '',
											'layout' => 'vertical',
										),
										array (
											'key' => 'field_582dde28cce38',
											'label' => 'Button Link URL',
											'name' => 'button_link',
											'type' => 'url',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582dde10cce37',
														'operator' => '==',
														'value' => 'customurl',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_582dde61cce39',
											'label' => 'Link to Page or Post',
											'name' => 'link_to_page',
											'type' => 'page_link',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582dde10cce37',
														'operator' => '==',
														'value' => 'page',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'post_type' => array (
											),
											'taxonomy' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d9a46a7aaea',
									'name' => 'events',
									'label' => 'Events',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5275e7337',
											'label' => 'Events URL',
											'name' => 'events_url',
											'type' => 'url',
											'instructions' => 'e.g. http://today.wisc.edu/events/tag/',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => 75,
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_57df5275e7338',
											'label' => 'Number of Events',
											'name' => 'number_of_events',
											'type' => 'number',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => 25,
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => '',
											'max' => '',
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d9a59dc0e35',
									'name' => 'photo',
									'label' => 'Photo',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5275e7339',
											'label' => 'Photo from Library',
											'name' => 'photo_from_library',
											'type' => 'image',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => '',
											'preview_size' => 'thumbnail',
											'library' => '',
											'min_width' => '',
											'min_height' => '',
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => '',
											'mime_types' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58c843007a930',
									'name' => '3c_highlighted_content',
									'label' => 'Highlighted Post/Page',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58cac40364dfd',
											'label' => 'Highlighted Content Style',
											'name' => 'highlighted_content_style',
											'type' => 'select',
											'instructions' => '',
											'required' => 0,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'default' => 'Default',
												'fixedheight' => 'Fixed height',
											),
											'default_value' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
											'ui' => 0,
											'ajax' => 0,
											'placeholder' => '',
											'disabled' => 0,
											'readonly' => 0,
										),
										array (
											'key' => 'field_58c8430f7a931',
											'label' => 'Highlighted Content Type',
											'name' => '3c_highlighted_content_type',
											'type' => 'flexible_content',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'button_label' => 'Add Highlighted Content',
											'min' => '',
											'max' => '',
											'layouts' => array (
												array (
													'key' => '58d2d7ab442ac',
													'name' => '3c_post_by_category',
													'label' => 'Post By Category',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58d2d7ab442ad',
															'label' => 'Post Category',
															'name' => '3c_post_category',
															'type' => 'taxonomy',
															'instructions' => '',
															'required' => 0,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'taxonomy' => 'category',
															'field_type' => 'checkbox',
															'allow_null' => 1,
															'add_term' => 0,
															'save_terms' => 0,
															'load_terms' => 0,
															'return_format' => 'id',
															'multiple' => 0,
														),
														array (
															'key' => 'field_58d2d7ab442ae',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => 'If you want to not pull the latest post choose a number to offset. For example: 2 would pull the third from the latest post.',
															'required' => 1,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '58c8433331f0a',
													'name' => '3c_latest_posts',
													'label' => 'Latest Post',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58caa4f546db9',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => 'If you want to not pull the latest post choose a number to offset. For example: 2 would pull the third from the latest post.',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '58d2d7ea442af',
													'name' => '3c_highlighted_page',
													'label' => 'Specific Page/Post',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58d2d800442b1',
															'label' => 'Page to Highlight',
															'name' => '3c_page_to_highlight',
															'type' => 'post_object',
															'instructions' => '',
															'required' => 1,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'post_type' => array (
																0 => 'page',
															),
															'taxonomy' => array (
															),
															'allow_null' => 0,
															'multiple' => 0,
															'return_format' => 'id',
															'ui' => 1,
														),
													),
													'min' => '',
													'max' => '',
												),
											),
										),
										array (
											'key' => 'field_58d432db6c49b',
											'label' => 'Override Image',
											'name' => 'override_image',
											'type' => 'image',
											'instructions' => '',
											'required' => 0,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'id',
											'preview_size' => 'thumbnail',
											'library' => 'all',
											'min_width' => 200,
											'min_height' => 200,
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => '',
											'mime_types' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58d400cd3902a',
									'name' => 'remote_wp_content',
									'label' => 'Remote WordPress Content',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58d400d93902b',
											'label' => 'Source URL',
											'name' => 'source_url',
											'type' => 'url',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_58d400e43902c',
											'label' => 'Number of Posts',
											'name' => 'number_of_posts',
											'type' => 'number',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => 1,
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => '',
											'max' => '',
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
							),
						),
						array (
							'key' => 'field_57df5345e7341',
							'label' => 'Middle Column',
							'name' => '3c_5050_middle_column',
							'type' => 'flexible_content',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 33,
								'class' => 'typeContainer',
								'id' => '',
							),
							'button_label' => 'Add Content',
							'min' => '',
							'max' => '',
							'layouts' => array (
								array (
									'key' => '57d863756b082',
									'name' => 'title_text',
									'label' => 'Title Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5345e7342',
											'label' => 'Text Content',
											'name' => 'title_text_content',
											'type' => 'text',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d85bdd2c2b0',
									'name' => 'body_text',
									'label' => 'Body Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5345e7343',
											'label' => 'Text Content',
											'name' => 'text_content',
											'type' => 'wysiwyg',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'tabs' => 'visual',
											'toolbar' => 'basic',
											'media_upload' => 1,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '582dde8bcce3a',
									'name' => 'button',
									'label' => 'Button',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_582dde90cce3b',
											'label' => 'Button Text',
											'name' => 'button_text',
											'type' => 'text',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
										array (
											'key' => 'field_582dde9acce3c',
											'label' => 'Button Action',
											'name' => 'button_action',
											'type' => 'radio',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'page' => 'Page',
												'customurl' => 'Custom URL',
											),
											'allow_null' => 0,
											'other_choice' => 0,
											'save_other_choice' => 0,
											'default_value' => '',
											'layout' => 'vertical',
										),
										array (
											'key' => 'field_582ddeaccce3d',
											'label' => 'Button Link URL',
											'name' => 'button_link',
											'type' => 'url',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582dde9acce3c',
														'operator' => '==',
														'value' => 'customurl',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_582ddec8cce3e',
											'label' => 'Link to Page or Post',
											'name' => 'link_to_page',
											'type' => 'page_link',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582dde9acce3c',
														'operator' => '==',
														'value' => 'page',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'post_type' => array (
											),
											'taxonomy' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d9a46a7aaea',
									'name' => 'events',
									'label' => 'Events',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5345e7344',
											'label' => 'Events URL',
											'name' => 'events_url',
											'type' => 'url',
											'instructions' => 'e.g. http://today.wisc.edu/events/tag/',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => 75,
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_57df5345e7345',
											'label' => 'Number of Events',
											'name' => 'number_of_events',
											'type' => 'number',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => 25,
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => '',
											'max' => '',
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d9a59dc0e35',
									'name' => 'photo',
									'label' => 'Photo',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5345e7346',
											'label' => 'Photo from Library',
											'name' => 'photo_from_library',
											'type' => 'image',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'id',
											'preview_size' => 'thumbnail',
											'library' => 'all',
											'min_width' => '',
											'min_height' => '',
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => '',
											'mime_types' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58c89c94b0968',
									'name' => '3c_highlighted_content',
									'label' => 'Highlighted Post/Page',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58cad5cb64dfe',
											'label' => 'Highlighted Content Style',
											'name' => 'highlighted_content_style',
											'type' => 'select',
											'instructions' => '',
											'required' => 0,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'default' => 'Default',
												'fixedheight' => 'Fixed height',
											),
											'default_value' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
											'ui' => 0,
											'ajax' => 0,
											'placeholder' => '',
											'disabled' => 0,
											'readonly' => 0,
										),
										array (
											'key' => 'field_58c89ca9b0969',
											'label' => 'Highlighted Content Type',
											'name' => '3c_highlighted_content_type',
											'type' => 'flexible_content',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'button_label' => 'Add Row',
											'min' => '',
											'max' => '',
											'layouts' => array (
												array (
													'key' => '58c89cb893135',
													'name' => '3c_post_by_category',
													'label' => 'Post By Category',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58c89cd8b096a',
															'label' => 'Post Category',
															'name' => '3c_post_category',
															'type' => 'taxonomy',
															'instructions' => '',
															'required' => 0,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'taxonomy' => 'category',
															'field_type' => 'checkbox',
															'allow_null' => 1,
															'add_term' => 0,
															'save_terms' => 0,
															'load_terms' => 0,
															'return_format' => 'id',
															'multiple' => 0,
														),
														array (
															'key' => 'field_58caa4cf46db8',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => 'If you want to not pull the latest post choose a number to offset. For example: 2 would pull the third from the latest post.',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '58d2d75b442a6',
													'name' => '3c_latest_posts',
													'label' => 'Latest Posts',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58d2d75b442a8',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => 'If you want to not pull the latest post choose a number to offset. For example: 2 would pull the third from the latest post.',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '58d2d76e442a9',
													'name' => '3c_highlighted_page',
													'label' => 'Specific Page/Post',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58d2d783442ab',
															'label' => 'Page to Highlight',
															'name' => '3c_page_to_highlight',
															'type' => 'post_object',
															'instructions' => '',
															'required' => 1,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'post_type' => array (
																0 => 'page',
															),
															'taxonomy' => array (
															),
															'allow_null' => 0,
															'multiple' => 0,
															'return_format' => 'id',
															'ui' => 1,
														),
													),
													'min' => '',
													'max' => '',
												),
											),
										),
										array (
											'key' => 'field_58d432c26c49a',
											'label' => 'Override Image',
											'name' => 'override_image',
											'type' => 'image',
											'instructions' => '',
											'required' => 0,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'id',
											'preview_size' => 'thumbnail',
											'library' => 'all',
											'min_width' => 200,
											'min_height' => 200,
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => '',
											'mime_types' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58d3f78c27438',
									'name' => 'remote_wp_content',
									'label' => 'Remote WordPress Content',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58d3f79827439',
											'label' => 'Source URL',
											'name' => 'source_url',
											'type' => 'url',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_58d3f7c22743a',
											'label' => 'Number of Posts',
											'name' => 'number_of_posts',
											'type' => 'number',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => 1,
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => '',
											'max' => '',
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
							),
						),
						array (
							'key' => 'field_57df5275e733a',
							'label' => 'Right Column',
							'name' => '3c_5050_right_column',
							'type' => 'flexible_content',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 33,
								'class' => 'typeContainer',
								'id' => '',
							),
							'button_label' => 'Add Content',
							'min' => '',
							'max' => '',
							'layouts' => array (
								array (
									'key' => '57d863bacac17',
									'name' => 'title_text',
									'label' => 'Title Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5275e733b',
											'label' => 'Text Content',
											'name' => 'title_text_content',
											'type' => 'text',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d85bf6925ce',
									'name' => 'body_text',
									'label' => 'Body Text',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5275e733c',
											'label' => 'Text Content',
											'name' => 'text_content',
											'type' => 'wysiwyg',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'tabs' => 'visual',
											'toolbar' => 'basic',
											'media_upload' => 1,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '582ddef6cce3f',
									'name' => 'button',
									'label' => 'Button',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_582ddefacce40',
											'label' => 'Button Text',
											'name' => 'button_text',
											'type' => 'text',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'maxlength' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
										array (
											'key' => 'field_582ddf03cce41',
											'label' => 'Button Action',
											'name' => 'button_action',
											'type' => 'radio',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'page' => 'Page',
												'customurl' => 'Custom URL',
											),
											'allow_null' => 0,
											'other_choice' => 0,
											'save_other_choice' => 0,
											'default_value' => '',
											'layout' => 'vertical',
										),
										array (
											'key' => 'field_582ddf33cce42',
											'label' => 'Button Link URL',
											'name' => 'button_link',
											'type' => 'url',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582ddf03cce41',
														'operator' => '==',
														'value' => 'customurl',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_582ddf4acce43',
											'label' => 'Link to Page or Post',
											'name' => 'link_to_page',
											'type' => 'page_link',
											'instructions' => '',
											'required' => '',
											'conditional_logic' => array (
												array (
													array (
														'field' => 'field_582ddf03cce41',
														'operator' => '==',
														'value' => 'page',
													),
												),
											),
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'post_type' => array (
											),
											'taxonomy' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d9a4c27aaed',
									'name' => 'events',
									'label' => 'Events',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5275e733d',
											'label' => 'Events URL',
											'name' => 'events_url',
											'type' => 'url',
											'instructions' => 'e.g. http://today.wisc.edu/events/tag/',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => 75,
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_57df5275e733e',
											'label' => 'Number of Events',
											'name' => 'number_of_events',
											'type' => 'number',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => 25,
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => '',
											'max' => '',
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '57d9a5eec0e37',
									'name' => 'photo',
									'label' => 'Photo',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_57df5275e733f',
											'label' => 'Photo from Library',
											'name' => 'photo_from_library',
											'type' => 'image',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'id',
											'preview_size' => 'thumbnail',
											'library' => 'all',
											'min_width' => '',
											'min_height' => '',
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => '',
											'mime_types' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58c89d264162c',
									'name' => '3c_highlighted_content',
									'label' => 'Highlighted Post/Page',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58cad5fa64dff',
											'label' => 'Highlighted Content Style',
											'name' => 'highlighted_content_style',
											'type' => 'select',
											'instructions' => '',
											'required' => 0,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'choices' => array (
												'default' => 'Default',
												'fixedheight' => 'Fixed height',
											),
											'default_value' => array (
											),
											'allow_null' => 0,
											'multiple' => 0,
											'ui' => 0,
											'ajax' => 0,
											'placeholder' => '',
											'disabled' => 0,
											'readonly' => 0,
										),
										array (
											'key' => 'field_58c89d3d4162d',
											'label' => 'Highlighted Content Type',
											'name' => '3c_highlighted_content_type',
											'type' => 'flexible_content',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => 0,
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'button_label' => 'Add Row',
											'min' => '',
											'max' => '',
											'layouts' => array (
												array (
													'key' => '58c89d51197ce',
													'name' => '3c_post_by_category',
													'label' => 'Post By Category',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58c89d5a4162e',
															'label' => 'Post Category',
															'name' => '3c_post_category',
															'type' => 'taxonomy',
															'instructions' => '',
															'required' => 0,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'taxonomy' => 'category',
															'field_type' => 'checkbox',
															'allow_null' => 1,
															'add_term' => 0,
															'save_terms' => 0,
															'load_terms' => 0,
															'return_format' => 'id',
															'multiple' => 0,
														),
														array (
															'key' => 'field_58caa46246db7',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => 'If you want to not pull the latest post choose a number to offset. For example: 2 would pull the third from the latest post.',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '58d2d58b56772',
													'name' => '3c_latest_posts',
													'label' => 'Latest Posts',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58d2d58b56774',
															'label' => 'Offset',
															'name' => 'post_offset',
															'type' => 'number',
															'instructions' => 'If you want to not pull the latest post choose a number to offset. For example: 2 would pull the third from the latest post.',
															'required' => '',
															'conditional_logic' => '',
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'default_value' => 0,
															'placeholder' => '',
															'prepend' => '',
															'append' => '',
															'min' => '',
															'max' => '',
															'step' => '',
															'readonly' => 0,
															'disabled' => 0,
														),
													),
													'min' => '',
													'max' => '',
												),
												array (
													'key' => '58d2d5d756775',
													'name' => '3c_highlighted_page',
													'label' => 'Specific Page',
													'display' => 'block',
													'sub_fields' => array (
														array (
															'key' => 'field_58d2d64056777',
															'label' => 'Page to Highlight',
															'name' => '3c_page_to_highlight',
															'type' => 'post_object',
															'instructions' => '',
															'required' => 1,
															'conditional_logic' => 0,
															'wrapper' => array (
																'width' => '',
																'class' => '',
																'id' => '',
															),
															'post_type' => array (
																0 => 'page',
															),
															'taxonomy' => array (
															),
															'allow_null' => 0,
															'multiple' => 0,
															'return_format' => 'id',
															'ui' => 1,
														),
													),
													'min' => '',
													'max' => '',
												),
											),
										),
										array (
											'key' => 'field_58d432a16c499',
											'label' => 'Override Image',
											'name' => 'override_image',
											'type' => 'image',
											'instructions' => '',
											'required' => 0,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'return_format' => 'id',
											'preview_size' => 'thumbnail',
											'library' => 'all',
											'min_width' => 200,
											'min_height' => 200,
											'min_size' => '',
											'max_width' => '',
											'max_height' => '',
											'max_size' => '',
											'mime_types' => '',
										),
									),
									'min' => '',
									'max' => '',
								),
								array (
									'key' => '58d3f7f92743b',
									'name' => 'remote_wp_content',
									'label' => 'Remote WordPress Content',
									'display' => 'block',
									'sub_fields' => array (
										array (
											'key' => 'field_58d3f8062743c',
											'label' => 'Source URL',
											'name' => 'source_url',
											'type' => 'url',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => '',
											'placeholder' => '',
										),
										array (
											'key' => 'field_58d3f8112743d',
											'label' => 'Number of Posts',
											'name' => 'number_of_posts',
											'type' => 'number',
											'instructions' => '',
											'required' => 1,
											'conditional_logic' => '',
											'wrapper' => array (
												'width' => '',
												'class' => '',
												'id' => '',
											),
											'default_value' => 1,
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'min' => '',
											'max' => '',
											'step' => '',
											'readonly' => 0,
											'disabled' => 0,
										),
									),
									'min' => '',
									'max' => '',
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
		1 => 'excerpt',
	),
	'active' => 1,
	'description' => '',
));
*/


acf_add_local_field_group(array (
	'key' => 'group_58cc0f9e1372d',
	'title' => 'Author',
	'fields' => array (
		array (
			'key' => 'field_52ad23c3a079b',
			'label' => 'Written By',
			'name' => 'written_by',
			'type' => 'text',
			'instructions' => 'Enter the name of the original author.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'John Smith',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));


include 'acf_fields/hero_image_fields.php';



acf_add_local_field_group(array (
	'key' => 'group_acf_page-and-single-attributes',
	'title' => 'Page and Single Attributes ',
	'fields' => array (
		array (
			'key' => 'field_5563b6ea89fb7',
			'label' => 'Sub Title',
			'name' => 'sub_title',
			'type' => 'text',
			'instructions' => 'This text will appear above your page title as a subtitle.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
				'order_no' => 0,
				'group_no' => 1,
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
	'active' => 1,
	'description' => '',
	'id' => 'acf_page-and-single-attributes',
	'local' => 'php',
));



	acf_add_local_field_group(array (
		'key' => 'group_acf_page-hero-images',
		'title' => 'Page Hero Images',
		'fields' => array (
			array (
				'key' => 'field_566743c4528dc',
				'label' => 'Watermark Background Image',
				'name' => 'hero_image_pages',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));



acf_add_local_field_group(array (
	'key' => 'group_acf_page-options',
	'title' => 'Page Options',
	'fields' => array (
		array (
			'key' => 'field_5661e83871c8c',
			'label' => 'Hide the Side Navigation',
			'name' => 'hide_the_side_navigation',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
		),
		array (
			'key' => 'field_572628c43f043',
			'label' => 'Hide Featured Image',
			'name' => 'hide_featured_image',
			'type' => 'checkbox',
			'instructions' => 'Hide the featured image on this page.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'hide' => 'Yes, hide the Featured Image',
			),
			'default_value' => array (
			),
			'layout' => 'vertical',
			'toggle' => 0,
		),
		array (
			'key' => 'field_572badddcd0b7',
			'label' => 'Show Page Widgets',
			'name' => 'show_page_widgets',
			'type' => 'checkbox',
			'instructions' => 'Select this option if you would like the "Pages Sidebar" widget area to appear on this page. By default it is hidden.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'showpagewidgets' => 'Show Page Sidebar Widgets',
			),
			'default_value' => array (
			),
			'layout' => 'vertical',
			'toggle' => 0,
		),
		array (
			'key' => 'field_58812bcf7467d',
			'label' => 'Page Theme',
			'name' => 'page_theme',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'default' => 'Default',
				'documentation' => 'Documentation',
			),
			'default_value' => array (
				0 => 'default',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_acf_uw-events',
	'title' => 'UW Events ',
	'fields' => array (
		array (
			'key' => 'field_55a94df76ef5b',
			'label' => 'Tag',
			'name' => 'tag',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_55abfd67a6009',
			'label' => 'Number of Results',
			'name' => 'limit',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 3,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'default',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
	'active' => 1,
	'description' => '',
	'id' => 'acf_uw-events',
	'local' => 'php',
));

acf_add_local_field_group(array (
	'key' => 'group_acf_page-layout-options',
	'title' => 'Page Layout Options ',
	'fields' => array (
		array (
			'key' => 'field_565fc8e7b2b67',
			'label' => 'Featured Pages Layouts',
			'name' => 'featured_pages_layouts',
			'type' => 'radio',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'circles' => 'Circles',
				'tiles' => 'Tiles',
				'list' => 'List',
				'listr' => 'List (Right Sidebar)',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'circles',
			'layout' => 'horizontal',
			'allow_null' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-featured_pages.php',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'menu_order' => 1,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
	'active' => 1,
	'description' => '',
	'id' => 'acf_page-layout-options',
	'local' => 'php',
));

acf_add_local_field_group(array (
	'key' => 'group_acf_page-layout-fields',
	'title' => 'Page Layout Fields ',
	'fields' => array (
		array (
			'key' => 'field_565fc5543e19a',
			'label' => 'Featured Page 1',
			'name' => 'featured_page_1',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'page',
			),
			'taxonomy' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array (
			'key' => 'field_565fcb7378f4e',
			'label' => 'Featured Page 2',
			'name' => 'featured_page_2',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'page',
			),
			'taxonomy' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array (
			'key' => 'field_565fcb81d8329',
			'label' => 'Featured Page 3',
			'name' => 'featured_page_3',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'page',
			),
			'taxonomy' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array (
			'key' => 'field_565fcb8cd832a',
			'label' => 'Featured Page 4',
			'name' => 'featured_page_4',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'page',
			),
			'taxonomy' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array (
			'key' => 'field_565fcb92d832b',
			'label' => 'Featured Page 5',
			'name' => 'featured_page_5',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'page',
			),
			'taxonomy' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array (
			'key' => 'field_565fcbb1d832c',
			'label' => 'Featured Page 6',
			'name' => 'featured_page_6',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'page',
			),
			'taxonomy' => array (
			),
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-featured_pages.php',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'menu_order' => 2,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
	'active' => 1,
	'description' => '',
	'id' => 'acf_page-layout-fields',
	'local' => 'php',
));

endif;

/** fix jetpack gallery width */
if ( ! isset( $content_width ) )
/**set width below **/
 $content_width = 1020;



/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'uw_madison_wp_2015_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uw_madison_wp_2015_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on UW Madison WP 2015, use a find and replace
	 * to change 'uw-madison-wp-2015' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'uw-madison-wp-2015', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'uw-madison-wp-2015' ),
		'youruw' => __( 'Your UW Menu', 'uw-madison-wp-2015' ),
		'resources' => __( 'Resources Menu', 'uw-madison-wp-2015' )

	) );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'uw_madison_wp_2015_custom_background_args', array(
		'default-color' => 'f7f7f7',
		'default-image' => '',
	) ) );
}
endif; // uw_madison_wp_2015_setup
add_action( 'after_setup_theme', 'uw_madison_wp_2015_setup' );


if (function_exists('add_image_size')) {
		add_image_size( 'hero-image', 1200 ); // 1200 pixels wide (and unlimited height)
	}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function uw_madison_wp_2015_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Posts Sidebar', 'uw-madison-wp-2015' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	));

	register_sidebar( array(
		'name'          => __( 'Footer Column 1', 'uw-madison-wp-2015' ),
		'id'            => 'footer-col-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 2', 'uw-madison-wp-2015' ),
		'id'            => 'footer-col-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 3', 'uw-madison-wp-2015' ),
		'id'            => 'footer-col-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 4', 'uw-madison-wp-2015' ),
		'id'            => 'footer-col-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Pages Sidebar', 'uw-madison-wp-2015' ),
		'id'            => 'page-sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'uw_madison_wp_2015_widgets_init' );





if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


/**
 * Enqueue scripts and styles.
 */

// Async load
function madisonwp2015_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async";
    }
add_filter( 'clean_url', 'madisonwp2015_async_scripts', 11, 1 );




function uw_madison_wp_2015_scripts() {
	define("VERSION", "1.0");

	wp_enqueue_style( 'uw-madison-wp-2015-style', get_stylesheet_uri() );

	/*wp_enqueue_style( 'uw-madison-wp-2015-mainstyles', get_template_directory_uri().'/dist/styles/master-02022018.min.css' );
*/


	wp_enqueue_script( 'uw-madison-wp-2015-navigation', get_template_directory_uri() . '/js/navigation.js#asyncload', array(), '20120206', true );

	//wp_enqueue_script( 'uw-madison-wp-2015-main', get_template_directory_uri() . '/dist/scripts/main-02022018.min.js#asyncload', array(), '20150429', true );

	wp_enqueue_style('main-css', get_template_directory_uri()."/build/css/root.css", null, VERSION, false);

	/*wp_enqueue_script('main-js', get_template_directory_uri()."/compiled/js/main.js", null, VERSION, true);*/

	wp_enqueue_script('jquery-visible', get_template_directory_uri()."/js/jquery.visible.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('detect-zoom', get_template_directory_uri()."/js/detect-zoom.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('jquery-suggest', get_template_directory_uri()."/js/jquery.suggest.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('color-thief', get_template_directory_uri()."/js/color-thief.min.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('color-thief-init', get_template_directory_uri()."/js/color-thief-init.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('flickity', get_template_directory_uri()."/js/flickity.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('flickity-sync', get_template_directory_uri()."/js/flickity-sync.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('isotope', get_template_directory_uri()."/js/isotope.min.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('imagesloaded', get_template_directory_uri()."/js/imagesloaded.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('detectbrowser', get_template_directory_uri()."/js/detectbrowser.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('fastclick', get_template_directory_uri()."/js/fastclick.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('history', get_template_directory_uri()."/js/history.js", array( 'jquery' ), VERSION, true);

	wp_enqueue_script('global', get_template_directory_uri()."/js/global.js", array( 'jquery' ), VERSION, true);

	/*  ***** */

	wp_enqueue_script( 'uw-madison-wp-2015-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js#asyncload', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	$tablesaw_settings = get_theme_mod( 'uw-madison-wp-2015_tablesaw_id' );

	if($tablesaw_settings == "tablesaw") {


		add_filter( 'the_content', 'tablesaw_add_custom_table_class' );
		function tablesaw_add_custom_table_class( $content ) {
		    return str_replace( '<table>', '<table class="tablesaw" data-tablesaw-mode="stack">', $content );
		}

		wp_enqueue_script( 'uw-madison-wp-2015-tablesaw', get_template_directory_uri() . '/js/tablesaw.js', array(), '20160201', true );
		wp_enqueue_script( 'uw-madison-wp-2015-tablesaw-init', get_template_directory_uri() . '/js/tablesaw-init.js', array(), '20160201', true );
	}

	if($tablesaw_settings == "datatables") {
		add_filter( 'the_content', 'datatables_add_custom_table_class' );
		function datatables_add_custom_table_class( $content ) {
		    return str_replace( '<table>', '<table>', $content );
		}

		wp_enqueue_script( 'uw-madison-wp-2015-datatables', "https://cdn.datatables.net/s/dt/dt-1.10.10,r-2.0.0/datatables.min.js", array(), '20160201', true );
		wp_enqueue_style( 'uw-madison-wp-2015-datatablestyle', "https://cdn.datatables.net/s/dt/dt-1.10.10,r-2.0.0/datatables.min.css" );
		wp_enqueue_script( 'uw-madison-wp-2015-datatables-init', get_template_directory_uri() . '/js/datatables-init.js', array(), '20160201', true );
	}

}
add_action( 'wp_enqueue_scripts', 'uw_madison_wp_2015_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



require get_template_directory() . '/inc/comment-removal.php';

/**
 * Enables the Excerpt meta box in Page edit screen.
 */
function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );


/**
 * Modifying TinyMCE editor to remove unused items.
 * ----------------------------------------------------------------------------
 */
 function customformatTinyMCE($init) {
   $init['block_formats'] = "Paragraph=p; Heading 2=h2; Heading 3=h3";
   $init['toolbar2']='formatselect,alignjustify,pastetext,removeformat,charmap,outdent,indent,undo,redo,table';

   $init['toolbar1'] = 'bold,italic,underline, strikethrough,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,wp_fullscreen,wp_adv,gca_button ';

  return $init;
}
add_filter('tiny_mce_before_init', 'customformatTinyMCE' );

/**
 *  Find featured image functionality
 * ----------------------------------------------------------------------------
 */
function catch_that_thumbnail() {
  global $post, $posts;
  $first_img = '';
  $first_vid = '';

  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $imgmatches);
  $output = preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $post->post_content, $vidmatches);

  if($imgmatches[1]) {
	  $first_img = $imgmatches[1][0];
	  $first_img = preg_replace("/^http:/i", "", $first_img);
  }


  if($vidmatches) {
  	$first_vid = $vidmatches[1];
  }

  if(empty($first_img) && empty($first_vid)) {


    return false;
  }  else {

	if(empty($first_vid)) {
		return $first_img;
	} else {
		return $first_vid;
	}


  }

}


/**
 *  Set default to not add link to images
 * ----------------------------------------------------------------------------
 */
function wpb_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );

    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}

add_action('admin_init', 'wpb_imagelink_setup', 10);


if(is_admin()){
	include ("email/newsletter.php");

	//include ("email/newsletter_legacy.php");
}







/**** Replacing wp-updates.com for my own api ****/
//require_once('wp-updates-theme.php');
//new WPUpdatesThemeUpdater_1555( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );


/**** My replacement API *****/
/*require 'theme-update-checker.php';
$MyThemeUpdateChecker = new ThemeUpdateChecker(
'madisonwp2015', //Theme slug. Usually the same as the name of its directory.
'http://wpupdates.heroiccloud.com/?action=get_metadata&slug=madisonwp2015' //Metadata URL.
);*/

require 'theme-update-checker.php';
$MyThemeUpdateChecker = new ThemeUpdateChecker(
'madisonwp2015', //Theme slug. Usually the same as the name of its directory.
'http://wpupdates.heroiccloud.com/wp-update-server/?action=get_metadata&slug=madisonwp2015' //Metadata URL.
);

