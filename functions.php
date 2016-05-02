<?php
/**
 * UW Madison WP 2015 functions and definitions
 *
 * @package UW Madison WP 2015
 */
 

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
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
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
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
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
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Desktop-HD" sketch:type="MSArtboardGroup" transform="translate(-426.000000, -467.000000)" fill="#D8D8D8">
            <g id="left-sidebar" sketch:type="MSLayerGroup" transform="translate(426.000000, 467.000000)">
                <rect id="Rectangle-6" sketch:type="MSShapeGroup" x="0" y="0" width="24" height="45"></rect>
                <rect id="Rectangle-6-Copy" sketch:type="MSShapeGroup" x="30" y="0" width="53" height="45"></rect>
            </g>
        </g>
    </g>
</svg></div><input style="display: none;" type="radio" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>[left_sidebar]" value="left_sidebar" <?php $this->link(); ?> /></label>
            
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
	                
				document.getElementById("circlesLayout").addEventListener("click", function(){ this.setAttribute("class", "layoutSelected"); document.getElementById("sidebarLayout").setAttribute("class", ""); 
document.getElementById("tilesLayout").setAttribute("class", ""); 					 });
				
				document.getElementById("sidebarLayout").addEventListener("click", function(){ this.setAttribute("class", "layoutSelected"); document.getElementById("circlesLayout").setAttribute("class", "");
document.getElementById("tilesLayout").setAttribute("class", "");					  });
				
				document.getElementById("tilesLayout").addEventListener("click", function(){ this.setAttribute("class", "layoutSelected"); document.getElementById("sidebarLayout").setAttribute("class", "");
document.getElementById("circlesLayout").setAttribute("class", "");  });
				
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
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
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
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
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
                 <input id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" type="range" min="150" max="500" step="10" value="<?php echo $this->value(); ?>" <?php $this->link(); ?> />
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

$wp_customize->add_section( 'uw-madison-wp-2015-home-options' , array(
    	'title'      => __( 'Latest Post Options', 'uw-madison-wp-2015' ),
    	'priority'   => 61,
	) ); 

$wp_customize->add_section( 'uw-madison-wp-2015-header-options' , array(
    	'title'      => __( 'Header Options', 'uw-madison-wp-2015' ),
    	'priority'   => 60,
	) ); 

$wp_customize->add_section( 'uw-madison-wp-2015-font-options' , array(
    	'title'      => __( 'Fonts', 'uw-madison-wp-2015' ),
    	'priority'   => 60,
	) ); 
	
$wp_customize->add_section( 'uw-madison-wp-2015-social-options' , array(
    	'title'      => __( 'Social', 'uw-madison-wp-2015' ),
    	'priority'   => 70,
	) );
	
	
$wp_customize->add_setting('uw-madison-wp-2015_header_alt_image_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => '',
    'sanitize_callback' => 'sanitize_alt_logo_options'
 
));



$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'logo',
           array(
               'label'      => __( 'Upload an alternate logo', 'uw-madison-wp-2015' ),
               'description'=> 'If available supply a version of your logo image that works well on a white background.',
               'section'    => 'header_image',
               'settings'   => 'uw-madison-wp-2015_header_alt_image_id',
               'context'    => 'uw-madison-wp-2015-header_alt_image' 
           )
       )
);
	

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
    'description'=> 'Enter your linkedin username.',
    'section'    => 'uw-madison-wp-2015-social-options',
    'type'    => 'text',
    'settings'   => 'uw-madison-wp-2015_linkedin_id',
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

 
$wp_customize->add_control('uw-madison-wp-2015-home-options', array(
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
    'default'		 => 'transparent',
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
    'section'    => 'uw-madison-wp-2015-header-options',
    'type'    => 'radio',
    'choices' => array(
            'monochrome' => __( 'Monochrome', 'uw-madison-wp-2015' ),
            'color' => __( 'Color', 'uw-madison-wp-2015' ),
            'hybrid' => __( 'Hybrid', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_noimage_crest_id',
    'priority' => 0,
));


$wp_customize->add_setting('uw-madison-wp-2015_fonts_id', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'		 => 'raleway-option',
    'sanitize_callback' => 'sanitize_fonts_options'
 
));


$wp_customize->add_control('uw-madison-wp-2015_fonts', array(
    'label'      => __('Typeface Selection', 'uw-madison-wp-2015'),
    'description'=> 'Verlag (the new UW typeface) will be available in a upcoming update.',
    'section'    => 'uw-madison-wp-2015-font-options',
    'type'    => 'radio',
    'choices' => array(
            'raleway-option' => __( 'Raleway/Open Sans', 'uw-madison-wp-2015' ),
            'verlag-option' => __( 'Verlag', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_fonts_id',
));

 
$wp_customize->add_control('uw-madison-wp-2015-header_style_options', array(
    'label'      => __('Header Style', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-header-options',
    'type'    => 'radio',
    'choices' => array(
            'transparent' => __( 'Transparent', 'uw-madison-wp-2015' ),
            'opaque' => __( 'Opaque', 'uw-madison-wp-2015' ),
            'photo' => __( 'Photo', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_header_style_options_id',
    'priority'   => 1,
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
    'section'    => 'uw-madison-wp-2015-header-options',
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
            'datatables' => __( 'Data Tables', 'uw-madison-wp-2015' ),
            'none' => __( 'None (not recommended)', 'uw-madison-wp-2015' )
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
    'label'      => __('Header Slides', 'uw-madison-wp-2015'),
    'section'    => 'uw-madison-wp-2015-header-options',
    'type'    => 'radio',
    'choices' => array(
            'shown' => __( 'Shown', 'uw-madison-wp-2015' ),
            'hidden' => __( 'Hidden', 'uw-madison-wp-2015' )
        ),
    'settings'   => 'uw-madison-wp-2015_header_slides_options_id',
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
		'label'	=> __( 'Header Layout', 'uw-madison-wp-2015' ),
		'section' => 'uw-madison-wp-2015-header-options',
		'settings' => 'uw-madison-wp-2015_header_layout_id',
	) 
));


$wp_customize->add_control( new Photo_Header_Size_Custom_Control( 
	$wp_customize, 
	'uw-madison-wp-2015-home_photo_header_size', 
	array(
		'label'	=> __( 'Homepage Photo Header Size', 'uw-madison-wp-2015' ),
		'description' => 'In effect when transparent and photo Header style is selected.',
		'section' => 'uw-madison-wp-2015-header-options',
		'settings' => 'uw-madison-wp-2015-home_photo_header_size_id',
		'priority'   => 2,
	) 
));


$wp_customize->add_control( new Photo_Header_Size_Custom_Control( 
	$wp_customize, 
	'uw-madison-wp-2015-photo_header_size', 
	array(
		'label'	=> __( 'Subpage Photo Header Size', 'uw-madison-wp-2015' ),
		'description' => 'Only in effect when Photo Header Style is selected.',
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

 



function sanitize_page_feature( $value ) {
    if ( !$value )
        $value = '-Select-';
 
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
    
    

    $search = wpdb::esc_like($_REQUEST['q']);

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


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
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
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */ 
    $plugins = array(
		

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Advanced Custom Fields',
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),
        
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'UW-Madison Events Calendar',
            'slug'      => 'uw-madison-events-calendar',
            'required'  => false,
        ),

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


/**** Adding SVG Support ****/
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


/**** Add Featured Image Support ****/
add_theme_support( 'post-thumbnails' );







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
add_theme_support( 'custom-header', $defaults );


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
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_page-hero-images',
		'title' => 'Page Hero Images',
		'fields' => array (
			array (
				'key' => 'field_566743c4528dc',
				'label' => 'Hero Image',
				'name' => 'hero_image_pages',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-layout-options',
		'title' => 'Page Layout Options',
		'fields' => array (
			array (
				'key' => 'field_565fc8e7b2b67',
				'label' => 'Featured Pages Layouts',
				'name' => 'featured_pages_layouts',
				'type' => 'radio',
				'required' => 1,
				'choices' => array (
					'circles' => 'Circles',
					'tiles' => 'Tiles',
					'list' => 'List',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'circles',
				'layout' => 'horizontal',
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
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_page-layout-fields',
		'title' => 'Page Layout Fields',
		'fields' => array (
			array (
				'key' => 'field_565fc5543e19a',
				'label' => 'Featured Page 1',
				'name' => 'featured_page_1',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_565fcb7378f4e',
				'label' => 'Featured Page 2',
				'name' => 'featured_page_2',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_565fcb81d8329',
				'label' => 'Featured Page 3',
				'name' => 'featured_page_3',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_565fcb8cd832a',
				'label' => 'Featured Page 4',
				'name' => 'featured_page_4',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_565fcb92d832b',
				'label' => 'Featured Page 5',
				'name' => 'featured_page_5',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_565fcbb1d832c',
				'label' => 'Featured Page 6',
				'name' => 'featured_page_6',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
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
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
	

	register_field_group(array (
		'id' => 'acf_hero-image-fields',
		'title' => 'Hero Image Fields',
		'fields' => array (
			array (
				'key' => 'field_554146e0cd9b4',
				'label' => 'Sub Heading Text',
				'name' => 'sub_heading_text',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56b2db003b514',
				'label' => 'Hide Slide Text',
				'name' => 'hide_slide_text',
				'type' => 'checkbox',
				'choices' => array (
					'hide' => 'Hide Text',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_554146f2cd9b5',
				'label' => 'Link To',
				'name' => 'link_to',
				'type' => 'radio',
				'choices' => array (
					'none' => 'Do not link',
					'pageorpost' => 'Link to a Page or Post',
					'externalurl' => 'Specify a URL',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'none',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5541473ccd9b6',
				'label' => 'Link to a Page or Post',
				'name' => 'link_to_a_page_or_post',
				'type' => 'page_link',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_554146f2cd9b5',
							'operator' => '==',
							'value' => 'pageorpost',
						),
					),
					'allorany' => 'all',
				),
				'post_type' => array (
					0 => 'post',
					1 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_554147f9cd9b7',
				'label' => 'Specify a URL',
				'name' => 'specify_a_url',
				'type' => 'text',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_554146f2cd9b5',
							'operator' => '==',
							'value' => 'externalurl',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'www.wisc.edu',
				'prepend' => 'http://',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55414630cd9b2',
				'label' => 'Hero Image',
				'name' => 'hero_image',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_55f87f434dc2e',
				'label' => 'Hero Video',
				'name' => 'hero_video',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'headerslides',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));



	register_field_group(array (
		'id' => 'acf_page-and-single-attributes',
		'title' => 'Page and Single Attributes',
		'fields' => array (
			array (
				'key' => 'field_5563b6ea89fb7',
				'label' => 'Sub Title',
				'name' => 'sub_title',
				'type' => 'text',
				'instructions' => 'This text will appear above your page title as a subtitle.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
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
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_uw-events',
		'title' => 'UW Events',
		'fields' => array (
			array (
				'key' => 'field_55a94df76ef5b',
				'label' => 'Tag',
				'name' => 'tag',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55abfd67a6009',
				'label' => 'Number of Results',
				'name' => 'limit',
				'type' => 'number',
				'default_value' => 3,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
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
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => 'acf_page-options',
		'title' => 'Page Options',
		'fields' => array (
			array (
				'key' => 'field_5661e83871c8c',
				'label' => 'Hide the Side Navigation',
				'name' => 'hide_the_side_navigation',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_572628c43f043',
				'label' => 'Hide Featured Image',
				'name' => 'hide_featured_image',
				'type' => 'checkbox',
				'instructions' => 'Hide the featured image on this page.',
				'choices' => array (
					'hide' => 'Yes, hide the Featured Image',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



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
		'default-color' => 'ffffff',
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
		'name'          => __( 'Sidebar', 'uw-madison-wp-2015' ),
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
}
add_action( 'widgets_init', 'uw_madison_wp_2015_widgets_init' );





if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


/**
 * Enqueue scripts and styles.
 */
function uw_madison_wp_2015_scripts() {
	wp_enqueue_style( 'uw-madison-wp-2015-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'uw-madison-wp-2015-mainstyles', get_template_directory_uri().'/dist/styles/master.min.css' );
	
	

	wp_enqueue_script( 'uw-madison-wp-2015-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'uw-madison-wp-2015-main', get_template_directory_uri() . '/dist/scripts/main.min.js', array(), '20150429', true );

	wp_enqueue_script( 'uw-madison-wp-2015-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

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

