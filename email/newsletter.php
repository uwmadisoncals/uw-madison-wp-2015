<?php
/*
The eCALS email sender v 2
*/


add_action( 'ecals_mail_3_hook', 'ecals_mail_3' );

/*---ADMIN SECTION FOR ECALS NEWSLETTER--*/
add_action('admin_menu', 'ecals_mail_3_admin_menu');

function ecals_mail_3_admin_menu() {
  add_options_page('Newsletter', 'Newsletter', 'manage_options', __FILE__, 'ecals_mail_3_options');
}

function ecals_mail_3_options(){
		$hidden_field_name = "hfn";

		//check if user has requested to resubmit email
		if (isset($_POST[$hidden_field_name]) && $_POST[$hidden_field_name]=="Y") {
			if (ecals_mail_3()){?>
                <div id="message" class="updated fade">
                  <p><strong>
                    <?php _e('Email has been sent.', 'ecals_mail_3_options' ); ?>
                    </strong></p>
                </div>
			<?php }
		}


		?>
    	<div class="wrap">
			<h2>Newsletter Generator</h2>
    <!--        <div class="tool-box">
            	<h3 class="title">Scheduled Submissions</h3>
                <p>
                <?php if (!wp_next_scheduled('ecals_mail_3_hook')){
                		echo "No submissions are scheduled at this time.";
					  } else { ?>

                      The next draft of the eCALS newsletter will be sent to anemec@cals.wisc.edu on <strong><?php echo date("m/d/Y", wp_next_scheduled('ecals_mail_3_hook')); ?></strong>.
                <?php }	?>
                </p>
            </div>-->
			<div class="tool-box">
			<?php

				$current_week = date("W", time())-1;
				$num_day_0101 = date("N", strtotime("Jan 1 ".date("Y", time())));
				$monday_current_week = date("m/d/y", strtotime("Jan 1 ".date("Y", time())) + ((($current_week)*604800) - 86400*($num_day_0101- 1) ));

				/*if(isset($_POST["start"]) && isset($_POST["end"])){
					$start_date = date("m/d/Y", strtotime($_POST["start"]));
					$end_date = date("m/d/Y", strtotime($_POST["end"]));
				} else {*/
					$start_date = date("m/d/Y", strtotime($monday_current_week." - 6 days")); //start on tuesday next week
					$end_date = date("m/d/Y", strtotime($monday_current_week)); //end monday of current week
				//} ?>
            	<!--<h3 class="title">Resubmit email </h3>-->
                <p>Click the button below to create a draft of your most recent posts <strong>(includes posts from <?php echo date("m/d/y", strtotime($start_date)).' to '.date("m/d/y", strtotime($end_date)); ?>)</strong>.
                <form name="ecals_mail_3_options" method = "post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
                <strong>Date Range:</strong> <input id="start" name="start" type="text" size="10" maxlength="12" value="<?php echo $start_date?>"/> to <input id="end" name="end" type="text" size="10" maxlength="12" value="<?php echo $end_date?>"/>
                <span class="submit">

                    <input name="resubmit" value="Resubmit eCALS Newsletter draft to ecals@cals.wisc.edu and al.nemec@wisc.edu" type="submit">
                </span>
                    <input type="hidden" name="ecals_noncename" id="ecals_noncename" value="
  <?php wp_create_nonce( plugin_basename(__FILE__) );?>" />
  					<input type="hidden" name=<?php echo $hidden_field_name; ?> value="Y" />
                  </form>
                </p>
            </div>
    	</div>

<?php }

/*---END OF ADMIN SECTION FOR ECALS NEWSLETTER--*/

/**
 * Send eCALS newsletter in html and plain text formats
 *
 * @reference http://krijnhoetmer.nl/stuff/php/html-plain-text-mail/ on how to send multipart emails
 **/
function ecals_mail_3(){

	//get vars
	global $wpdb;
	global $post;

	$cats = array(17,10,3,4,5,6,7);
	$current_week = date("W", time());
	$num_day_0101 = date("N", strtotime("Jan 1 ".date("Y", time())));
	$monday_current_week = date("m/d/y", strtotime("Jan 1 ".date("Y", time())) + ((($current_week-1)*604800) - 86400*($num_day_0101- 1) ));

	if(isset($_POST["start"]) && isset($_POST["end"])){
		$start_date = date("Y-m-d", strtotime($_POST["start"]));
		$end_date = date("Y-m-d", strtotime($_POST["end"]));
	} else {
		$start_date = date("Y-m-d", strtotime($monday_current_week." - 7 days"));
		$end_date = date("Y-m-d", strtotime($monday_current_week." - 1 days"));
	}

	$google_campaign_vars = '?utm_source=ecals_email_newsletter&utm_medium=email&utm_campaign=ecals_email_newsletter';


	//setup email

	$to ='ecals@cals.wisc.edu, al.nemec@wisc.edu';
	$subject ="eCALS Newsletter - ".date("F d Y", time());

	$boundary = uniqid('np');

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "From: eCALS <ecals@cals.wisc.edu>\r\n";
	$headers .= "Subject: eCALS <ecals@cals.wisc.edu>\r\n";
	$headers .= "Content-Type: multipart/alternative;boundary=" . $boundary . "\r\n";


	$message = "This is a MIME encoded message.";

	$message .= "\r\n\r\n--" . $boundary . "\r\n";
	$message .= "Content-type: text/plain;charset=utf-8\r\n\r\n";
	$message .= ecals_mail_3_plain_text($cats, $start_date, $end_date);

	$message .= "\r\n\r\n--" . $boundary . "\r\n";
	$message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
	$message .= ecals_mail_3_html($cats, $start_date, $end_date);

	$message .= "\r\n\r\n--" . $boundary . "--";

 	//send email
	return(mail($to, $subject, $message, $headers));


}


function ecals_mail_3_plain_text($cats, $start_date, $end_date){

global $wpdb;

$output ='
==============================================================
eCALS Newsletter | College of Agricultural and Life Sciences
==============================================================

'.date("F d, Y", time()).'

The following is a compilation of all the messages posted
on eCALS from '.date("m/d/y", strtotime($start_date)).' to '.date("m/d/y", strtotime($end_date)).'.

';

//GET POSTS
foreach ($cats as $cat_id){
	//get list of children categories, so their posts can be printed as well
	$categories=  get_categories('child_of='.$cat_id);
	$cats_in = $cat_id;

	//make list of posts
	foreach ($categories as $cat){
		$cats_in.= ", '".$cat->cat_ID."'";
	}

	//get posts
	$query ="SELECT DISTINCT ID, post_title, post_date
				FROM $wpdb->posts, $wpdb->term_taxonomy, $wpdb->term_relationships
				WHERE $wpdb->term_taxonomy.taxonomy = 'category'
				AND $wpdb->term_taxonomy.term_id IN (".$cats_in.")
				AND $wpdb->posts.post_type = 'post'
				AND ($wpdb->posts.post_status = 'publish')
				AND post_date >= '$start_date 00:00:00'
				AND post_date <= '$end_date 23:59:59'
				AND $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id
				AND $wpdb->term_relationships.object_id = $wpdb->posts.ID
				ORDER BY $wpdb->posts.post_date DESC";

	$posts = $wpdb->get_results($query);

	//if there are posts in the category, print them
	if ($wpdb->num_rows > 0) {

$output.='
'.strtoupper(htmlspecialchars_decode(get_cat_name($cat_id))).'
------------------------------------
';
		foreach ($posts as $post){
			setup_postdata($post);
$output.='
** '.wordwrap(addslashes(htmlspecialchars_decode(get_the_title($post->ID))), 65).'
   <'.wp_get_shortlink($post->ID).'>
';
		} //endforeach
$output.='

';
	} // endif

} //endforeach

$output.='
CALS EVENTS
------------------------------------

** To see a list of CALS events, please visit
   <http://www.today.wisc.edu/events/feed/30>



==============================================================
==============================================================

For more news, to post an article, or to subscribe to
RSS Feeds, please visit http://ecals.cals.wisc.edu.
You may also send your inquiries to ecals@cals.wisc.edu.

CALS on Facebook: http://www.facebook.com/UWMadisonCALS
CALS on Twitter: http://twitter.com/#!/UWMadisonCALS
CALS RSS Feed: http://ecals.cals.wisc.edu/rss-feeds/


Regards,

The eCALS Team

© Copyright '.date('Y', time()).'. All rights reserved.
College of Agricultural and Life Sciences
University of Wisconsin-Madison.';


return $output;

}

function ecals_mail_3_html($cats, $start_date, $end_date) {

	global $wpdb;

$message_head =
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>eCALS Newsletter - '.date("F d Y", time()).'</title>
        <style type="text/css">
			/* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
			.ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
			.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
			body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
			table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
			img{-ms-interpolation-mode:bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

			/* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
			body{margin:0; padding:0;}
			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
			table{border-collapse:collapse !important;}
			body, #bodyTable, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;}

			/* /\/\/\/\/\/\/\/\/ TEMPLATE STYLES /\/\/\/\/\/\/\/\/ */

			/* ========== Page Styles ========== */

			#bodyCell{padding:20px;}
			#templateContainer{width:600px;}

			/**
			* @tab Page
			* @section background style
			* @tip Set the background color and top border for your email. You may want to choose colors that match your companys branding.
			* @theme page
			*/
			body, #bodyTable{
				/*@editable*/ background-color:#e8e6d9;
				font-family: Helvetica, Verdana, Arial, sans-serif;
			}
			
			a {
					
			}
			
			div,a,h1,h2,h3,table {
				background-color: #fff;
			}

			/**
			* @tab Page
			* @section background style
			* @tip Set the background color and top border for your email. You may want to choose colors that match your companys branding.
			* @theme page
			*/
			#bodyCell{
				/*@editable*/ border-top:4px solid #cac8bd;
			}

			/**
			* @tab Page
			* @section email border
			* @tip Set the border for your email.
			*/
			#templateContainer{
				/*@editable*/ border:1px solid #BBBBBB;
			}

      .clear {
        clear:both;
      }

      

			/**
			* @tab Page
			* @section heading 1
			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
			* @style heading 1
			*/
			h1{
				/*@editable*/ color:#202020 !important;
				display:block;
				/*@editable*/ font-family:Helvetica;
				/*@editable*/ font-size:26px;
				/*@editable*/ font-style:normal;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				/*@editable*/ letter-spacing:normal;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Page
			* @section heading 2
			* @tip Set the styling for all second-level headings in your emails.
			* @style heading 2
			*/
			h2{
				/*@editable*/ color:#404040 !important;
				display:block;
				/*@editable*/ font-family:Helvetica;
				/*@editable*/ font-size:14px;
				/*@editable*/ font-style:normal;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				/*@editable*/ letter-spacing:1px;
				text-transform: uppercase;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Page
			* @section heading 3
			* @tip Set the styling for all third-level headings in your emails.
			* @style heading 3
			*/
			h3{
				/*@editable*/ color:#606060 !important;
				display:block;
				/*@editable*/ font-family:Helvetica;
				/*@editable*/ font-size:16px;
				/*@editable*/ font-style:italic;
				/*@editable*/ font-weight:normal;
				/*@editable*/ line-height:100%;
				/*@editable*/ letter-spacing:normal;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Page
			* @section heading 4
			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
			* @style heading 4
			*/
			h4{
				/*@editable*/ color:#808080 !important;
				display:block;
				/*@editable*/ font-family:Helvetica;
				/*@editable*/ font-size:14px;
				/*@editable*/ font-style:italic;
				/*@editable*/ font-weight:normal;
				/*@editable*/ line-height:100%;
				/*@editable*/ letter-spacing:normal;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/* ========== Header Styles ========== */

			/**
			* @tab Header
			* @section preheader style
			* @tip Set the background color and bottom border for your emails preheader area.
			* @theme header
			*/
			#templatePreheader{
				/*@editable*/ background-color:#ffffff;
				/*@editable*/ /*border-bottom:1px solid #CCCCCC;*/
			}

			/**
			* @tab Header
			* @section preheader text
			* @tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.
			*/
			.preheaderContent{
				/*@editable*/ color:#808080;
				/*@editable*/ font-family:Helvetica;
				/*@editable*/ font-size:10px;
				/*@editable*/ line-height:125%;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Header
			* @section preheader link
			* @tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.
			*/
			.preheaderContent a:link, .preheaderContent a:visited, /* Yahoo! Mail Override */ .preheaderContent a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#606060;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			/**
			* @tab Header
			* @section header style
			* @tip Set the background color and borders for your emails header area.
			* @theme header
			*/
			#templateHeader{
				/*@editable*/ background-color:#ffffff;
				/*@editable*/ /*border-top:1px solid #FFFFFF;*/
				/*@editable*/ /*border-bottom:1px solid #CCCCCC;*/
			}

			/**
			* @tab Header
			* @section header text
			* @tip Set the styling for your emails header text. Choose a size and color that is easy to read.
			*/
			.headerContent{
				/*@editable*/ color:#505050;
				/*@editable*/ font-family:Helvetica;
				/*@editable*/ font-size:20px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				/*@editable*/ padding-top:0;
				/*@editable*/ padding-right:0;
				/*@editable*/ padding-bottom:0;
				/*@editable*/ padding-left:0;
				/*@editable*/ text-align:left;
				/*@editable*/ vertical-align:middle;
			}

			/**
			* @tab Header
			* @section header link
			* @tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.
			*/
			a:link, .headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#3694cf;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			#headerImage{
				height:auto;
				max-width:600px;
			}

			/* ========== Body Styles ========== */

			/**
			* @tab Body
			* @section body style
			* @tip Set the background color and borders for your emails body area.
			*/
			#templateBody{
				/*@editable*/ background-color:#ffffff;
				/*@editable*/ /*border-top:1px solid #FFFFFF;*/
				/*@editable*/ /*border-bottom:1px solid #CCCCCC;*/
			}

			/**
			* @tab Body
			* @section body text
			* @tip Set the styling for your emails main content text. Choose a size and color that is easy to read.
			* @theme main
			*/
			.bodyContent{
				/*@editable*/ color:#505050;
				/*@editable*/ font-family:Helvetica;
				/*@editable*/ font-size:16px;
				/*@editable*/ line-height:150%;
				padding-top:20px;
				padding-right:20px;
				padding-bottom:20px;
				padding-left:20px;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Body
			* @section body link
			* @tip Set the styling for your emails main content links. Choose a color that helps them stand out from your text.
			*/
			.bodyContent a:link, .bodyContent a:visited, /* Yahoo! Mail Override */ .bodyContent a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#3694cf;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			.bodyContent img{
				display:inline;
				height:auto;
				max-width:560px;
			}

			/* ========== Column Styles ========== */

			.templateColumnContainer{display:inline; width:100%;}

			/**
			* @tab Columns
			* @section column style
			* @tip Set the background color and borders for your emails column area.
			*/
			#templateColumns{
				/*@editable*/ background-color:#ffffff;
				/*@editable*/ /*border-top:1px solid #FFFFFF;*/
				/*@editable*/ /*border-bottom:1px solid #CCCCCC;*/
			}

			/**
			* @tab Columns
			* @section left column text
			* @tip Set the styling for your emails left column content text. Choose a size and color that is easy to read.
			*/
			.leftColumnContent{
				/*@editable*/ color:#505050;
				/*@editable*/ font-family:Helvetica;
				/*@editable*/ font-size:14px;
				/*@editable*/ line-height:150%;
				padding-top:0;
				padding-right:0;
				padding-bottom:20px;
				padding-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Columns
			* @section left column link
			* @tip Set the styling for your emails left column content links. Choose a color that helps them stand out from your text.
			*/
			.leftColumnContent a:link, .leftColumnContent a:visited, /* Yahoo! Mail Override */ .leftColumnContent a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#3694cf;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			/**
			* @tab Columns
			* @section right column text
			* @tip Set the styling for your emails right column content text. Choose a size and color that is easy to read.
			*/
			.rightColumnContent{
				/*@editable*/ color:#505050;
				/*@editable*/ font-family:Helvetica;
				/*@editable*/ font-size:14px;
				/*@editable*/ line-height:150%;
				padding-top:0;
				padding-right:0;
				padding-bottom:20px;
				padding-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Columns
			* @section right column link
			* @tip Set the styling for your emails right column content links. Choose a color that helps them stand out from your text.
			*/
			.rightColumnContent a:link, .rightColumnContent a:visited, /* Yahoo! Mail Override */ .rightColumnContent a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#3694cf;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			.leftColumnContent img, .rightColumnContent img{
				display:inline;
				height:auto;
				max-width:260px;
			}

			/* ========== Footer Styles ========== */

			/**
			* @tab Footer
			* @section footer style
			* @tip Set the background color and borders for your emails footer area.
			* @theme footer
			*/
			#templateFooter{
				/*@editable*/ background-color:#ffffff;
				/*@editable*/ border-top:1px solid #FFFFFF;
			}

			/**
			* @tab Footer
			* @section footer text
			* @tip Set the styling for your emails footer text. Choose a size and color that is easy to read.
			* @theme footer
			*/
			.footerContent{
				/*@editable*/ color:#808080;
				/*@editable*/ font-family:Helvetica;
				/*@editable*/ font-size:10px;
				/*@editable*/ line-height:150%;
				padding-top:20px;
				padding-right:20px;
				padding-bottom:20px;
				padding-left:20px;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Footer
			* @section footer link
			* @tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
			*/
			.footerContent a:link, .footerContent a:visited, /* Yahoo! Mail Override */ .footerContent a .yshortcuts, .footerContent a span /* Yahoo! Mail Override */{
				/*@editable*/ color:#606060;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			/* /\/\/\/\/\/\/\/\/ MOBILE STYLES /\/\/\/\/\/\/\/\/ */

            @media only screen and (max-width: 480px){

              

				/* /\/\/\/\/\/\/ CLIENT-SPECIFIC MOBILE STYLES /\/\/\/\/\/\/ */
				body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:none !important;} /* Prevent Webkit platforms from changing default text sizes */
                body{width:100% !important; min-width:100% !important;} /* Prevent iOS Mail from adding padding to the body */

				/* /\/\/\/\/\/\/ MOBILE RESET STYLES /\/\/\/\/\/\/ */
				#bodyCell{padding:10px !important;}

				/* /\/\/\/\/\/\/ MOBILE TEMPLATE STYLES /\/\/\/\/\/\/ */

				/* ======== Page Styles ======== */

				/**
				* @tab Mobile Styles
				* @section template width
				* @tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesnt work for you, set the width to 300px instead.
				*/
				#templateContainer{
					max-width:600px !important;
					/*@editable*/ width:100% !important;
				}

				/**
				* @tab Mobile Styles
				* @section heading 1
				* @tip Make the first-level headings larger in size for better readability on small screens.
				*/
				h1{
					/*@editable*/ font-size:16px !important;
					/*@editable*/ line-height:100% !important;
				}

				/**
				* @tab Mobile Styles
				* @section heading 2
				* @tip Make the second-level headings larger in size for better readability on small screens.
				*/
				h2{
					/*@editable*/ font-size:20px !important;
					/*@editable*/ line-height:100% !important;
				}

				/**
				* @tab Mobile Styles
				* @section heading 3
				* @tip Make the third-level headings larger in size for better readability on small screens.
				*/
				h3{
					/*@editable*/ font-size:18px !important;
					/*@editable*/ line-height:100% !important;
				}

				/**
				* @tab Mobile Styles
				* @section heading 4
				* @tip Make the fourth-level headings larger in size for better readability on small screens.
				*/
				h4{
					/*@editable*/ font-size:16px !important;
					/*@editable*/ line-height:100% !important;
				}

				/* ======== Header Styles ======== */

				#templatePreheader{display:none !important;} /* Hide the template preheader to save space */

				/**
				* @tab Mobile Styles
				* @section header image
				* @tip Make the main header image fluid for portrait or landscape view adaptability, and set the images original width as the max-width. If a fluid setting doesnt work, set the image width to half its original size instead.
				*/
				#headerImage{
					height:auto !important;
					/*@editable*/ max-width:600px !important;
					/*@editable*/ width:100% !important;
				}

				/**
				* @tab Mobile Styles
				* @section header text
				* @tip Make the header content text larger in size for better readability on small screens. We recommend a font size of at least 16px.
				*/
				.headerContent{
					/*@editable*/ font-size:20px !important;
					/*@editable*/ line-height:125% !important;
				}

				/* ======== Body Styles ======== */

				/**
				* @tab Mobile Styles
				* @section body image
				* @tip Make the main body image fluid for portrait or landscape view adaptability, and set the images original width as the max-width. If a fluid setting doesnt work, set the image width to half its original size instead.
				*/
				#bodyImage{
					height:auto !important;
					/*@editable*/ max-width:560px !important;
					/*@editable*/ width:100% !important;
				}

				/**
				* @tab Mobile Styles
				* @section body text
				* @tip Make the body content text larger in size for better readability on small screens. We recommend a font size of at least 16px.
				*/
				.bodyContent{
					/*@editable*/ font-size:18px !important;
					/*@editable*/ line-height:125% !important;
				}

				/* ======== Column Styles ======== */

				.templateColumnContainer{display:block !important; width:100% !important;}

				/**
				* @tab Mobile Styles
				* @section column image
				* @tip Make the column image fluid for portrait or landscape view adaptability, and set the images original width as the max-width. If a fluid setting doesnt work, set the image width to half its original size instead.
				*/
				.columnImage{
					height:auto !important;
					/*@editable*/ max-width:260px !important;
					/*@editable*/ width:100% !important;
				}

				/**
				* @tab Mobile Styles
				* @section left column text
				* @tip Make the left column content text larger in size for better readability on small screens. We recommend a font size of at least 16px.
				*/
				.leftColumnContent{
					/*@editable*/ font-size:16px !important;
					/*@editable*/ line-height:125% !important;
				}

				/**
				* @tab Mobile Styles
				* @section right column text
				* @tip Make the right column content text larger in size for better readability on small screens. We recommend a font size of at least 16px.
				*/
				.rightColumnContent{
					/*@editable*/ font-size:16px !important;
					/*@editable*/ line-height:125% !important;
				}

				/* ======== Footer Styles ======== */

				/**
				* @tab Mobile Styles
				* @section footer text
				* @tip Make the body content text larger in size for better readability on small screens.
				*/
				.footerContent{
					/*@editable*/ font-size:14px !important;
					/*@editable*/ line-height:115% !important;
				}

				.footerContent a{display:block !important;} /* Place footer social and utility links on their own lines, for easier access */
			}
		</style>
		<meta name="robots" content="noindex,nofollow"></meta>
		<meta property="og:title" content="eCALS Newsletter - '.date("F d Y", time()).'"></meta>
    </head>';

$message_body='
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    	<center>
        	<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
            	<tr>
                	<td align="center" valign="top" id="bodyCell">
                    	<!-- BEGIN TEMPLATE // -->
                    	<table border="0" cellpadding="0" cellspacing="0" id="templateContainer">
                        	<tr>
                            	<td align="center" valign="top">
                                	<!-- BEGIN PREHEADER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templatePreheader">
                                        <tr>
                                            <td valign="top" class="preheaderContent" style="padding-top:10px; padding-right:20px; padding-bottom:10px; padding-left:20px;" mc:edit="preheader_content00">
                                                The following is a compilation of all the messages posted
on <a href="http://ecals.cals.wisc.edu" style="color:#333;text-decoration:none;" >eCALS</a> from '.date("m/d/y", strtotime($start_date)).' to '.date("m/d/y", strtotime($end_date)).'.
                                            </td>
                                            <!-- *|IFNOT:ARCHIVE_PAGE|* -->
                                            <td valign="top" width="180" class="preheaderContent" style="padding-top:10px; padding-right:20px; padding-bottom:10px; padding-left:0;" mc:edit="preheader_content01">
                                                Email not displaying correctly?<br /><a href="http://ecals.cals.wisc.edu/" target="_blank">Read these stories online</a>.
                                            </td>
                                            <!-- *|END:IF|* -->
                                        </tr>
                                    </table>
                                    <!-- // END PREHEADER -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                	<!-- BEGIN HEADER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader">
                                        <tr>
                                            <td valign="top" class="headerContent">
                                            	<img src="http://ecals.cals.wisc.edu/wp-content/themes/ecals2013/images/ecals_logo_mail.jpg" style="max-width:600px;" id="headerImage" mc:label="header_image" mc:edit="header_image" mc:allowdesigner mc:allowtext />
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END HEADER -->
                                </td>
                            </tr>
                        	<tr style="border-bottom: none;">
                            	<td align="center" valign="top" style="border-bottom: none;">
                                	<!-- BEGIN BODY // -->
                                    <table border="0" cellpadding="0" cellspacing="0" style="border-bottom: none;" width="100%" id="templateBody">

                                    	<tr style="border-bottom: none;">
                                        	<td class="bodyContent" style="padding-top:0; padding-bottom:0;">
                                            	';

															 //AROUND CALS FEATURE

															 query_posts(array('category_name' => 'ecals-blog', "showposts" => '1', "post_status" => 'publish')); 
															 while (have_posts()) : the_post();

																//img url
																/*if ( get_post_meta($post->ID, 'image', true)) {
																	$img_src = site_url().get_post_meta($post->ID, "image", $single = true);
																} else {
																	$img_src = get_bloginfo('template_url').'/images/default200x200.jpg';
																}*/



						    				//the_post_thumbnail();
						    				//echo get_the_post_thumbnail($page->ID, 'large');
						    				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' );
$url = $thumb['0']; $img_src = $url;



																//excerpt
																$e = explode(' ', get_the_excerpt());
																if(count($e) > 20){
																	$excerpt = implode(' ', array_slice($e, 0, 25)).' [...]';
																}

	$message_body.='
                                            	<a href="'.get_permalink().'?utm_source=ecals_email_newsletter&utm_medium=email&utm_campaign=ecals_email_newsletter" style="max-height: 200px; overflow:hidden; display:block; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; margin-top:1em;"><img src="'.$img_src.'" style="width:560px;" width="560" id="bodyImage" mc:label="body_image" mc:edit="body_image" mc:allowtext /></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" class="bodyContent" mc:edit="body_content01">
                                                <h2><a href="'.get_permalink().'?utm_source=ecals_email_newsletter&utm_medium=email&utm_campaign=ecals_email_newsletter" style="line-height: 1.3em;">'.get_the_title().'</a></h2>
                                                <h4>'.$excerpt.'</h4>

                                            </td>
                                        </tr>';
                                                                    endwhile;

                                                               $message_body.='
															    <tr>
                                                                <td valign="top" class="bodyContent" mc:edit="body_content01">
                                                                <h2>More Highlights</h2><div>';
                                                                    //AROUND CALS FEATURE

															 query_posts(array('category_name' => 'highlights', "posts_per_page" => '3', "post_status" => 'publish'));
															 while (have_posts()) : the_post();

															  $message_body.='

                                                                <div style="margin-left: 0px; padding-left: 0px; list-style: none;"><a href="'.get_permalink().'?utm_source=ecals_email_newsletter&utm_medium=email&utm_campaign=ecals_email_newsletter" style="display: block; margin-left: 0px; padding-left: 0px; list-style: none;">'.get_the_title().'</a></div>';
                                                                 endwhile;


                                                   $message_body.='  </div>          </td>
                                        </tr>';




$message_body.='

                                    </table>
                                    <!-- // END BODY -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                            		
                            		<table border="0" cellpadding="0" cellspacing="0" style="border-bottom: none;" width="100%" id="templateBody">

                                    	
                            		<tr valign="top">
                            			<td width="50%" valign="top">
                            		
                                	<!-- BEGIN COLUMNS // -->
                                	
                                	                                	
                                    <div class="newsGroup" style="background: #fff; margin: 17px;">';
                                            //GET NEWS
											//$cats = array(array(3,4),array(5,6),array(7,'follow'));
											$cats = array(153,14,572,4,59,7,'follow');

											$num_printed_cells = 1;
											for ($i=0; $i<count($cats); $i++){

												//open table
												if($i==0 || $open_table==1){
													$open_table=0;

												}


												if($cats[$i]!='follow'){

													//GET CATEGORY ARTICLES
													//get list of children categories for current cat
													//so their posts are also included in list
													$categories=  get_categories('child_of='.$cats[$i]);
													$cats_in = $cats[$i];
													//print_r($categories);
													foreach ($categories as $cat){
														//make list of categories (parent + children cats)
														$cats_in.= ", '".$cat->cat_ID."'";
													}

													$query ="SELECT DISTINCT ID, post_title, post_date
																FROM $wpdb->posts, $wpdb->term_taxonomy, $wpdb->term_relationships
																WHERE $wpdb->term_taxonomy.taxonomy = 'category'
																AND $wpdb->term_taxonomy.term_id IN (".$cats_in.")
																AND $wpdb->term_taxonomy.term_id NOT IN (355,356,357,358,366,370,373,372,371,369,108,379,380,381,384,385,386,387,388)
																AND $wpdb->posts.post_type = 'post'
																AND ($wpdb->posts.post_status = 'publish')
																AND post_date >= '$start_date 00:00:00'
																AND post_date <= '$end_date 23:59:59'
																AND $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id
																AND $wpdb->term_relationships.object_id = $wpdb->posts.ID
																ORDER BY $wpdb->posts.post_date DESC";

													$posts = $wpdb->get_results($query);
													//echo '<p>'.count($posts).'</p>';
													//echo $query;

													//if there are posts in the category, print them
													if ($wpdb->num_rows > 0) {

$message_body.='									<div class="newsCategory" style="background: #fff;border-collapse:collapse;vertical-align:top; margin-top: 22px; margin-bottom: 8px; padding: 14px;" >
                                                          <h1 class="box-title" style="background: #fff;font-size:14px;font-weight:normal;margin-top:10px; margin-bottom: 0px; color:#616161;" ><a href="'.get_category_link($cats[$i]).'" style="background: #fff;text-decoration:none; color:#616161; margin-top: 20px;" >'.strtoupper(get_cat_name($cats[$i])).'</a></h1>

                                                      <div style="color:#C90;text-align:left;font-size:13px; margin-left: 0px; padding-left: 0px;" >';
																	foreach ($posts as $post) :
																		setup_postdata($post);


$message_body.='                                         <div style="text-align: left; padding-left: 0px; margin-left: 0px;">

															<a href="'.get_permalink($post->ID).'?utm_source=ecals_email_newsletter&utm_medium=email&utm_campaign=ecals_email_newsletter" style="display: block; padding-bottom: 5px; text-align:left; padding-right: 20px;"  title="Link to '.get_the_title($post->ID).'">'.get_the_title($post->ID).'</a>
                                                        </div>';
																	endforeach;
$message_body.=' 										</div>
													</div>';

													//increase count of printed cells
													$num_printed_cells++;
													}

												} else {

$message_body.='									<div width="334" align="left" valign="top" style="border-collapse:collapse;vertical-align:top;background:#fff;" >

													 </div>';
													$num_printed_cells++;
													}

												//close table
												if(($num_printed_cells % 2)){
													$open_table=1;


												}
											}; $message_body.='</div>


</td>
                            			<td width="50%" valign="top"> <div class="newsGroup" style="background: #fff; margin: 17px;">';





                      //GET NEWS
//$cats = array(array(3,4),array(5,6),array(7,'follow'));
$cats = array(47,424,5,3,437,'follow');

$num_printed_cells = 1;
for ($i=0; $i<count($cats); $i++){

  //open table
  if($i==0 || $open_table==1){
    $open_table=0;

  }


  if($cats[$i]!='follow'){

    //GET CATEGORY ARTICLES
    //get list of children categories for current cat
    //so their posts are also included in list
    $categories=  get_categories('child_of='.$cats[$i]);
    $cats_in = $cats[$i];
    //print_r($categories);
    foreach ($categories as $cat){
      //make list of categories (parent + children cats)
      $cats_in.= ", '".$cat->cat_ID."'";
    }

    $query ="SELECT DISTINCT ID, post_title, post_date
          FROM $wpdb->posts, $wpdb->term_taxonomy, $wpdb->term_relationships
          WHERE $wpdb->term_taxonomy.taxonomy = 'category'
          AND $wpdb->term_taxonomy.term_id IN (".$cats_in.")
          AND $wpdb->term_taxonomy.term_id NOT IN (355,356,357,358,366,370,373,372,371,369,374,108,379,380,381,384,385,386,387,388,59,153,14,16)
          AND $wpdb->posts.post_type = 'post'
          AND ($wpdb->posts.post_status = 'publish')
          AND post_date >= '$start_date 00:00:00'
          AND post_date <= '$end_date 23:59:59'
          AND $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id
          AND $wpdb->term_relationships.object_id = $wpdb->posts.ID
          ORDER BY $wpdb->posts.post_date DESC";

    $posts = $wpdb->get_results($query);
    //echo '<p>'.count($posts).'</p>';
    //echo $query;

    //if there are posts in the category, print them
    if ($wpdb->num_rows > 0) {

$message_body.='									<div class="newsCategory" style="border-collapse:collapse;vertical-align:top; margin-top: 22px;margin-bottom: 8px; padding: 14px;" >
                                    <h1 class="box-title" style="font-size:14px;font-weight:normal;margin-top:10px; margin-bottom: 0px; color:#616161;" ><a href="'.get_category_link($cats[$i]).'" style="text-decoration:none; color:#616161; margin-top: 20px;" >'.strtoupper(get_cat_name($cats[$i])).'</a></h1>

                                <div style="color:#C90;font-size:13px; margin-left: 0px; padding-left: 0px;" >';
            foreach ($posts as $post) :
              setup_postdata($post);


$message_body.='                                         <div style="text-align: left;  margin-left: 0px; padding-left: 0px;">
<a href="'.get_permalink($post->ID).'?utm_source=ecals_email_newsletter&utm_medium=email&utm_campaign=ecals_email_newsletter" style="display: block; text-align: left; padding-right: 20px; padding-bottom: 5px;"  title="Link to '.get_the_title($post->ID).'">'.get_the_title($post->ID).'</a>
                                  </div>';
            endforeach;
$message_body.=' 										</div>
    </div>';

    //increase count of printed cells
    $num_printed_cells++;
    }

  } else {

$message_body.='									<div width="334" align="left" valign="top" style="border-collapse:collapse;vertical-align:top;" >

     </div>';
    $num_printed_cells++;
    }

  //close table
  if(($num_printed_cells % 2)){
    $open_table=1;


  }
}








$message_body.='</div></td></tr></table>
                                            <div class="clear"></div></div>
                                    <!-- // END COLUMNS -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                	<!-- BEGIN FOOTER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter">
                                        <tr>
                                            <td valign="top" class="footerContent" mc:edit="footer_content00">
                                                <a href="https://twitter.com/UWMadisonCALS">Follow on Twitter</a>&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/UWMadisonCALS">Friend on Facebook</a>&nbsp;&nbsp;&nbsp;<a href="mailto:?subject=eCALS%20News%20Recommendation&amp;body=%0ATake%20a%20look%20at%20eCALS.%20%3A%0A%0Ahttp%3A%2F%2Fecals%2Ecals%2Ewisc%2Eedu%2F%0A">Forward to Friend</a>&nbsp;
                                            </td>
                                        </tr>

                                        <tr>
                                            <td valign="top" class="footerContent" style="padding-top:0;" mc:edit="footer_content01">
                                                <em>&copy; Copyright 2015 The Board of Regents of the University of Wisconsin System</em>
                                                <br />

                                                <br />
                                                <br />
                                                <strong>Our mailing address is:</strong>
                                                <br />
                                                ecals@cals.wisc.edu
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" class="footerContent" style="padding-top:0;" mc:edit="footer_content02">

                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END FOOTER -->
                                </td>
                            </tr>
                        </table>
                        <!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
        <img src="http://www.google-analytics.com/collect?v=1&tid=UA-10330735-1&cid=*|UNIQID|*&t=event&ec=email&ea=open&el=*|UNIQID|*&cs=newsletter&cm=email&cn=open_rate&cm1=1" />
    </body>
</html>
';

 $output = $message_head.$message_body;

 return $output;

}
