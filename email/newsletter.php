<?php
/*
Newsletter Generator
*/


add_action( 'email_newsletter_2017_hook', 'email_newsletter_2017' );

/*---ADMIN SECTION FOR ECALS NEWSLETTER--*/
add_action('admin_menu', 'email_newsletter_2017_admin_menu');

function email_newsletter_2017_admin_menu() {
  add_options_page('Newsletter Beta', 'Newsletter Beta', 'manage_options', __FILE__, 'email_newsletter_2017_options');
}

function email_newsletter_2017_options(){
		$hidden_field_name = "hfn";

		

		//check if user has requested to resubmit email
		if (isset($_POST[$hidden_field_name]) && $_POST[$hidden_field_name]=="Y") {
			if(isset($_POST['sendto'])) {
				$adminmsg = 'Email has been sent to '.$_POST['sendto'];
			} else {
				$adminemail = get_option('admin_email');
				$adminmsg = 'Email has been sent to the site administrator ('.$adminemail.').';
			}

			if (email_newsletter_2017()){?>
                <div id="message" class="updated fade">
                  <p><strong>
                    <?php _e($adminmsg, 'email_newsletter_2017_options' ); ?>
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
                <?php if (!wp_next_scheduled('email_newsletter_2017_hook')){
                		echo "No submissions are scheduled at this time.";
					  } else { ?>

                      The next draft of the eCALS newsletter will be sent to anemec@cals.wisc.edu on <strong><?php echo date("m/d/Y", wp_next_scheduled('email_newsletter_2017_hook')); ?></strong>.
                <?php }	?>
                </p>
            </div>-->
			<div class="tool-box">
			<?php

				$current_week = date("W", time())-1;
				$num_day_0101 = date("N", strtotime("Jan 1 ".date("Y", time())));
				$mailingaddress = get_option('mailingaddresssaved');
				$mainfeaturecats = get_option( 'mainfeaturecats' );
				$highlightedcats = get_option( 'highlightedcats' );
				$leftcolcats = get_option( 'leftcolcats' );
				$leftcolcatsex = get_option( 'leftcolcatsex' );
				$rightcolcats = get_option( 'rightcolcats' );
				$rightcolcatsex = get_option( 'rightcolcatsex' );

				$monday_current_week = date("m/d/y", strtotime("Jan 1 ".date("Y", time())) + ((($current_week)*604800) + (86400) ));
				//echo $monday_current_week;
				/*if(isset($_POST["start"]) && isset($_POST["end"])){
					$start_date = date("m/d/Y", strtotime($_POST["start"]));
					$end_date = date("m/d/Y", strtotime($_POST["end"]));
				} else {*/
					$start_date = date("m/d/Y", strtotime($monday_current_week." - 6 days")); //start on tuesday next week
					$end_date = date("m/d/Y", strtotime($monday_current_week)); //end monday of current week
					$adminemail = get_option('admin_email'); 
				//}  ?>
            	<!--<h3 class="title">Resubmit email </h3>-->

				<style>
					.newsletterShell {
						border: 1px solid rgba(0,0,0,0.3);
						padding: 1rem;
						margin-top: 1rem;
						max-width: 800px;
					}

					.feature {
						display: flex;
						align-items: center;
						text-align: center;
						background: rgba(0,0,0,0.2);
						height: 200px;
						padding: 1rem;
						margin-bottom:1rem;
					}

					.feature .include {
						
						vertical-align: center;
						text-align: center;
					}

					.highlights {
						display: flex;
						align-items: center;
						padding: 1rem;
						background: rgba(0,0,0,0.2);
						min-height: 80px;
					}

					.highlights .include {
						vertical-align: center;
					}

					.columns {
						display: flex;
						margin-top: 1rem;
					}

					.leftcol, .rightcol {
						padding: 1rem;
						flex-basis: 50%;
						background: rgba(0,0,0,0.2);
					}

					.leftcol {
						margin-right: 1rem;
					}
				</style>

                <p>Click the button below to create a draft of your most recent posts <strong>(includes posts from <?php echo date("m/d/y", strtotime($start_date)).' to '.date("m/d/y", strtotime($end_date)); ?>)</strong>.
                <form name="email_newsletter_2017_options" method = "post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
                <strong>Date Range:</strong> <input id="start" name="start" type="text" size="10" maxlength="12" value="<?php echo $start_date?>"/> to <input id="end" name="end" type="text" size="10" maxlength="12" value="<?php echo $end_date?>"/>
                send sample message to
				<input type="text" name="sendto" value="<?php echo $adminemail ?>" placeholder="name@email.com">
<span class="submit"> and address it from the mailing adddress of <input type="text" name="mailingaddress" value="<?php echo $mailingaddress ?>" placeholder="name@email.com">
<span class="submit">

                    <input name="resubmit" value="Send" type="submit">
					
                </span>
				
				<div class="newsletterShell">

				<div class="header">
					<div class="feature">
						<div class="include">
							<label for="mainfeaturecat">Main Feature Category</label>
							<input type="text" value="<?php echo $mainfeaturecats ?>" name="mainfeaturecat" placeholder="Category ID's to grab seperated by comma.">
						</div>
					</div>

					<div class="highlights">
						<div class="include">
							<label for="highlightedcat">Highlighted Categories</label>
							<input type="text" value="<?php echo $highlightedcats ?>" name="highlightedcat" placeholder="Category ID's to grab seperated by comma.">
						</div>
					</div>
				
				</div>

				<div class="columns">
				
				<div class="leftcol">
					<div class="include">
						<label for="leftcolcat">Left Column Categories</label>
						<input type="text" value="<?php echo $leftcolcats ?>" name="leftcolcat" placeholder="Category ID's to grab seperated by comma.">
					</div>

					<div class="exclude">
						<label for="leftcolcatex">Left Column Excluded Categories</label>
						<input type="text" value="<?php echo $leftcolcatsex ?>" name="leftcolcatex" placeholder="Category ID's to exclude seperated by comma.">
					</div>
				</div>

				<div class="rightcol">
					<div class="include">
						<label for="rightcolcat">Right Column Categories</label>
						<input type="text" value="<?php echo $rightcolcats ?>" name="rightcolcat" placeholder="Category ID's to grab seperated by comma.">
					</div>

					<div class="exclude">
						<label for="rightcolcatex">Right Column Excluded Categories</label>
						<input type="text" value="<?php echo $rightcolcatsex ?>" name="rightcolcatex" placeholder="Category ID's to exclude seperated by comma.">
					</div>
				</div>

				</div>

				</div>
				
				
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
function email_newsletter_2017(){

	if(isset($_POST['mailingaddress'])) {
			$mailingaddress = $_POST['mailingaddress'];
			update_option( 'mailingaddresssaved', $mailingaddress );
	} 
	
	if(isset($_POST['mainfeaturecat'])) {
			$mainfeaturecats = $_POST['mainfeaturecat'];
			update_option( 'mainfeaturecats', $mainfeaturecats );
	} 

	if(isset($_POST['highlightedcat'])) {
			$highlightedcats = $_POST['highlightedcat'];
			update_option( 'highlightedcats', $highlightedcats );
	} 

	if(isset($_POST['leftcolcat'])) {
			$leftcolcats = $_POST['leftcolcat'];
			update_option( 'leftcolcats', $leftcolcats );
	} 

	if(isset($_POST['leftcolcatex'])) {
			$leftcolcatsex = $_POST['leftcolcatex'];
			update_option( 'leftcolcatsex', $leftcolcatsex );
	} 

	if(isset($_POST['rightcolcat'])) {
			$rightcolcats = $_POST['rightcolcat'];
			update_option( 'rightcolcats', $rightcolcats );
	} 

	if(isset($_POST['rightcolcatex'])) {
			$rightcolcatsex = $_POST['rightcolcatex'];
			update_option( 'rightcolcatsex', $rightcolcatsex );
	} 

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

	if(isset($_POST["sendto"])) {
		$sendaddr = $_POST["sendto"];
	} else {
		$sendaddr = "al.nemec@wisc.edu";
	}

	if(isset($_POST["mailingaddress"])) {
		$mailing_address = $_POST["mailingaddress"];
	} else {
		
		if(isset($_POST["sendto"])) {
			$mailing_address = $_POST["sendto"];
		} else {
			$mailing_address = "ecals@cals.wisc.edu";
		}
	}

	$site_name = get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description' );
	

	$to = $sendaddr;
	$subject ="$site_name Newsletter - ".date("F d Y", time());

	$boundary = uniqid('np');

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "From: $site_name <$mailing_address>\r\n";
	$headers .= "Subject: $site_name <$mailing_address>\r\n";
	$headers .= "Content-Type: multipart/alternative;boundary=" . $boundary . "\r\n";


	$message = "This is a MIME encoded message.";

	$message .= "\r\n\r\n--" . $boundary . "\r\n";
	$message .= "Content-type: text/plain;charset=utf-8\r\n\r\n";
	$message .= email_newsletter_2017_plain_text($cats, $start_date, $end_date);

	$message .= "\r\n\r\n--" . $boundary . "\r\n";
	$message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
	$message .= email_newsletter_2017_html($cats, $start_date, $end_date);

	$message .= "\r\n\r\n--" . $boundary . "--";

 	//send email
	return(mail($to, $subject, $message, $headers));


}


function email_newsletter_2017_plain_text($cats, $start_date, $end_date){

global $wpdb;
global $post;

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

function email_newsletter_2017_html($cats, $start_date, $end_date) {

	global $wpdb;
	global $post;

	$site_name = get_bloginfo( 'name' );
	$site_url = site_url();
	$site_description = get_bloginfo( 'description' );
	$mainfeaturecats = get_option( 'mainfeaturecats');
	$highlightedcats = get_option( 'highlightedcats');
	$leftcolcats = get_option( 'leftcolcats');
	$rightcolcats = get_option( 'rightcolcats');
	$leftcolcatsex = get_option( 'leftcolcatsex');
	$rightcolcatsex = get_option( 'rightcolcatsex');

	if($leftcolcats == null) {
		$leftcolcats = '1';
	}
	
	if($rightcolcats == null) {
		$rightcolcats = '1';
	}
	
	if($rightcolcatsex == null) {
		$rightcolcatsex = '0';
	}

	if($leftcolcatsex == null) {
		$leftcolcatsex = '0';
	}

$message_head =
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>'.$site_name.' Newsletter - '.date("F d Y", time()).'</title>
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

			
		</style>
		<meta name="robots" content="noindex,nofollow"></meta>
		<meta property="og:title" content="eCALS Newsletter - '.date("F d Y", time()).'"></meta>
    </head>';

$message_body='
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="background-color: #ececec; margin:0; padding:0; font-family: Verlag, Helvetica, Verdana, Arial, sans-serif;">
	  <!--[if mso]>
<style type="text/css">
body, table, td {font-family: Arial, Helvetica, sans-serif !important;}
</style>
<![endif]-->
    	<center>
        	<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="background-color: #ececec;">
            	<tr>
                	<td align="center" valign="top" id="bodyCell" style="border-top:4px solid #727272; padding: 20px;">
                    	<!-- BEGIN TEMPLATE // -->
                    	<table border="0" cellpadding="0" cellspacing="0" id="templateContainer" style="width:600px; border:1px solid #BBBBBB; max-width:600px !important; background-color: #fff;">
                        	<tr>
                            	<td align="center" valign="top">
                                	<!-- BEGIN PREHEADER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templatePreheader">
                                        <tr>
                                            <td valign="top" class="preheaderContent" style="padding-top:10px; padding-right:20px; padding-bottom:10px; padding-left:20px;" mc:edit="preheader_content00">
                                                The following is a compilation of all the messages posted
on <a href="'.site_url().'" style="color:#333;text-decoration:none;" >'.$site_name.'</a> from '.date("m/d/y", strtotime($start_date)).' to '.date("m/d/y", strtotime($end_date)).'.
                                            </td>
                                            <!-- *|IFNOT:ARCHIVE_PAGE|* -->
                                            <td valign="top" width="180" class="preheaderContent" style="padding-top:10px; padding-right:20px; padding-bottom:10px; padding-left:0;" mc:edit="preheader_content01">
                                                Email not displaying correctly?<br /><a href="'.$site_url.'" target="_blank">Read these stories online</a>.
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
												
													<table width="100%" style="background: #ececec;">
														<tr>
															<td width="50" style="padding-left: 20px; padding-top: 10px; padding-bottom: 10px;">
																<img src="'.get_stylesheet_directory_uri().'/images/uw-crest-web.png" alt="UW Crest" width="40" height="63" style="width: 40px; height: auto; border:0; height:auto; line-height:100%; outline:none; text-decoration:none;">
															</td>

															<td style="padding-right: 20px; padding-left: 8px;">
																<h1 style="margin-bottom: 0px; color: #c5050c; margin-top: 14px; text-transform: uppercase; font-size: 22px; letter-spacing: 0.5px;">'.$site_name.'</h1>
														<div style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; color: #727272;">'.$site_description.'</div>
															</td>
														</tr>
													</table>
													

													
												
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
                                        	<td class="bodyContent" style="padding-top:20px; padding-right:20px; padding-bottom:20px;padding-left:20px;">
                                            	';

															 //AROUND CALS FEATURE
															 
															 query_posts(array('cat' => "$mainfeaturecats", "showposts" => '1', "post_status" => 'publish')); 
															 while (have_posts()) : the_post();

																//echo $post->ID;
						    				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' );
											//var_dump($thumb);
$url = $thumb['0']; $img_src = $url; 



																//excerpt
																$e = explode(' ', get_the_excerpt());
																if(count($e) > 20){
																	$excerpt = implode(' ', array_slice($e, 0, 25)).' [...]';
																} else {
																	$excerpt = get_the_excerpt();
																}

	$message_body.='
                                            	<a href="'.get_permalink().'?utm_source=ecals_email_newsletter&utm_medium=email&utm_campaign=ecals_email_newsletter" style="max-height: 200px; overflow:hidden; display:block; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; margin-top:1em;"><img src="'.$img_src.'" style="width:560px; border:0; height:auto; line-height:100%; outline:none; text-decoration:none;" width="560" id="bodyImage" mc:label="body_image" mc:edit="body_image" mc:allowtext /></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" class="bodyContent" mc:edit="body_content01" style="padding-top:20px; padding-right:20px; padding-bottom:20px;padding-left:20px;">
                                                <h2><a href="'.get_permalink().'?utm_source=ecals_email_newsletter&utm_medium=email&utm_campaign=ecals_email_newsletter" style="line-height: 1.3em;">'.get_the_title().'</a></h2>
                                                <h4>'.$excerpt.'</h4>

                                            </td>
                                        </tr>';
                                                                    endwhile;

                                                               $message_body.='
															    <tr>
                                                                <td valign="top" class="bodyContent" mc:edit="body_content01" style="padding-top:20px; padding-right:20px; padding-bottom:20px;padding-left:20px;">
                                                                <h2>More Highlights</h2><div>';
                                                                    //AROUND CALS FEATURE

															 query_posts(array('cat' => "$highlightedcats", "posts_per_page" => '3', "post_status" => 'publish'));
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
                            			<td width="50%" valign="top" style="padding-left: 20px;">
                            		
                                	<!-- BEGIN COLUMNS // -->
                                	
                                	                                	
                                    <div class="newsGroup" style="background: #fff;">';
                                            //GET NEWS
											//$cats = array(array(3,4),array(5,6),array(7,'follow'));
											
											//$cats = array(153,14,572,4,59,7,'follow');
											//$cats = array($leftcolcats,'follow');
											$oldcats = explode(",", $leftcolcats);
											
											$cats = array();
											
											foreach ($oldcats as $cat) {
												//echo $cat;
												$newcat = (int)$cat;
												//echo $newcat;
												array_push($cats, $newcat);
											}

											array_push($cats, "follow");

											//var_dump($cats);

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
																AND $wpdb->term_taxonomy.term_id NOT IN (".$leftcolcatsex.")
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

$message_body.='									<div class="newsCategory" style="background: #fff;border-collapse:collapse;vertical-align:top; margin-top: 22px; margin-bottom: 8px;" >
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
                            			<td width="50%" valign="top"> <div class="newsGroup" style="background: #fff; style="padding-left: 20px;">';





                      //GET NEWS
//$cats = array(array(3,4),array(5,6),array(7,'follow'));
//$cats = array(47,424,5,3,437,'follow');

$oldcats = explode(",", $rightcolcats);
											
											$cats = array();
											
											foreach ($oldcats as $cat) {
												//echo $cat;
												$newcat = (int)$cat;
												//echo $newcat;
												array_push($cats, $newcat);
											}

											array_push($cats, "follow");

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
          AND $wpdb->term_taxonomy.term_id NOT IN (".$rightcolcatsex.")
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

$message_body.='									<div class="newsCategory" style="border-collapse:collapse;vertical-align:top; margin-top: 22px;margin-bottom: 8px;" >
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
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter" style="background-color:#ffffff; border-top:1px solid #FFFFFF;">
                                        <tr>
                                            <td valign="top" class="footerContent" mc:edit="footer_content00" style="display:block; padding-top:20px; padding-right:20px; padding-bottom:20px; padding-left:20px;">
                                                <a href="https://twitter.com/UWMadisonCALS" style="color:#606060; font-weight:normal; text-decoration:underline;">Follow on Twitter</a>&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/UWMadisonCALS" style="color:#606060; font-weight:normal; text-decoration:underline;">Friend on Facebook</a>&nbsp;&nbsp;&nbsp;<a href="mailto:?subject=eCALS%20News%20Recommendation&amp;body=%0ATake%20a%20look%20at%20eCALS.%20%3A%0A%0Ahttp%3A%2F%2Fecals%2Ecals%2Ewisc%2Eedu%2F%0A" style="color:#606060; font-weight:normal; text-decoration:underline;">Forward to Friend</a>&nbsp;
                                            </td>
                                        </tr>

                                        <tr>
                                            <td valign="top" class="footerContent" style="display:block;  padding-right:20px; padding-bottom:20px; padding-left:20px; padding-top:0;" mc:edit="footer_content01">
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
                                            <td valign="top" class="footerContent" style="display:block; padding-right:20px; padding-bottom:20px; padding-left:20px; padding-top:0;" mc:edit="footer_content02">

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
