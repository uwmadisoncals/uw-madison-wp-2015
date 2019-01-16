<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UW Madison WP 2015
 */
?>

	</div><!-- #content -->
	<div id="result"></div>
<?php if(is_front_page()) { ?>
		<?php include('pagefeature.php'); ?>
	<?php } ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footerWrapper">

		<div class="footerWidgetAreas">

				<?php if ( is_active_sidebar( 'footer-col-1' ) ) : ?>
					<div class="footer-widget-area col-1">
						<?php dynamic_sidebar( 'footer-col-1' ); ?>
					</div>
				<?php endif; ?>


				<?php if ( is_active_sidebar( 'footer-col-2' ) ) : ?>
					<div class="footer-widget-area col-2">
						<?php dynamic_sidebar( 'footer-col-2' ); ?>
					</div>
				<?php endif; ?>


				<?php if ( is_active_sidebar( 'footer-col-3' ) ) : ?>
					<div class="footer-widget-area col-3">
						<?php dynamic_sidebar( 'footer-col-3' ); ?>
					</div>
				<?php endif; ?>


				<?php if ( is_active_sidebar( 'footer-col-4' ) ) : ?>
					<div class="footer-widget-area col-4">
						<?php dynamic_sidebar( 'footer-col-4' ); ?>
					</div>
				<?php endif; ?>

		</div>

		<div class="site-info">
			<a href="http://www.wisconsin.edu/">&copy;<?php echo date("Y"); ?> Board of Regents of the University of Wisconsin System</a>
		</div><!-- .site-info -->

		<div class="social">
			<ul>
				<?php $twitter = get_theme_mod( 'uw-madison-wp-2015_twitter_id' );
					if($twitter != "") { ?>
						<li><a href="http://twitter.com/<?php echo $twitter ?>" target="_blank" class="twitter_social">Twitter <svg enable-background="new 0 0 56.693 56.693" height="56.693px"  version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M52.837,15.065c-1.811,0.805-3.76,1.348-5.805,1.591c2.088-1.25,3.689-3.23,4.444-5.592c-1.953,1.159-4.115,2-6.418,2.454  c-1.843-1.964-4.47-3.192-7.377-3.192c-5.581,0-10.106,4.525-10.106,10.107c0,0.791,0.089,1.562,0.262,2.303  c-8.4-0.422-15.848-4.445-20.833-10.56c-0.87,1.492-1.368,3.228-1.368,5.082c0,3.506,1.784,6.6,4.496,8.412  c-1.656-0.053-3.215-0.508-4.578-1.265c-0.001,0.042-0.001,0.085-0.001,0.128c0,4.896,3.484,8.98,8.108,9.91  c-0.848,0.23-1.741,0.354-2.663,0.354c-0.652,0-1.285-0.063-1.902-0.182c1.287,4.015,5.019,6.938,9.441,7.019  c-3.459,2.711-7.816,4.327-12.552,4.327c-0.815,0-1.62-0.048-2.411-0.142c4.474,2.869,9.786,4.541,15.493,4.541  c18.591,0,28.756-15.4,28.756-28.756c0-0.438-0.009-0.875-0.028-1.309C49.769,18.873,51.483,17.092,52.837,15.065z"/></svg></a></li>
					<?php } ?>


				<?php $facebook = get_theme_mod( 'uw-madison-wp-2015_facebook_id' );
					if($facebook != "") { ?>
						<li class="facebook_social"><a href="http://facebook.com/<?php echo $facebook ?>" target="_blank" class="facebook_social">Facebook <svg enable-background="new 0 0 56.693 56.693" height="56.693px"  version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z"/></svg></a></li>
					<?php } ?>


				<?php $flickr = get_theme_mod( 'uw-madison-wp-2015_flickr_id' );
					if($flickr != "") { ?>
						<li class="flickr_social"><a href="<?php echo $flickr ?>" target="_blank" class="flickr_social">Flickr <svg height="60px" version="1.1" viewBox="0 0 60 60" width="60px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><defs/><g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1"><g><path d="M30,60 C46.5685433,60 60,46.5685433 60,30 C60,13.4314567 46.5685433,0 30,0 C13.4314567,0 0,13.4314567 0,30 C0,46.5685433 13.4314567,60 30,60 Z" fill="#262626" /><path d="M20.7692308,36.9230769 C24.5927408,36.9230769 27.6923077,33.82351 27.6923077,30 C27.6923077,26.17649 24.5927408,23.0769231 20.7692308,23.0769231 C16.9457208,23.0769231 13.8461538,26.17649 13.8461538,30 C13.8461538,33.82351 16.9457208,36.9230769 20.7692308,36.9230769 Z M39.2307692,36.9230769 C43.0542792,36.9230769 46.1538462,33.82351 46.1538462,30 C46.1538462,26.17649 43.0542792,23.0769231 39.2307692,23.0769231 C35.4072592,23.0769231 32.3076923,26.17649 32.3076923,30 C32.3076923,33.82351 35.4072592,36.9230769 39.2307692,36.9230769 Z" class="dots" fill="#FFFFFF"/></g></g></svg></a></li>
					<?php } ?>


				<?php $linkedin = get_theme_mod( 'uw-madison-wp-2015_linkedin_id' );
					if($linkedin != "") { ?>
						<li class="linkedin_social"><a href="<?php echo $linkedin ?>" target="_blank">Linked In<svg height="60px" version="1.1" viewBox="0 0 60 60" width="60px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1"><g transform="translate(-600.000000, 0.000000)"/><g fill="#000000" transform="translate(16.000000, 17.000000)"><path d="M5.88307542,26.8231512 L5.88307542,8.52433895 L0.227370038,8.52433895 L0.227370038,26.8231512 L5.88307542,26.8231512 Z M5.88307542,2.03821455 C5.84938823,0.400659962 4.75801564,-0.846153846 2.98505434,-0.846153846 C1.21163158,-0.846153846 0.0528846154,0.400659962 0.0528846154,2.03821455 C0.0528846154,3.64020234 1.17794439,4.92307692 2.9172185,4.92307692 L2.95090569,4.92307692 C4.75801564,4.92307692 5.88307542,3.64020234 5.88307542,2.03821455 Z M15.1100418,26.8231517 L15.1100418,16.3973729 C15.1100418,15.8394014 15.1503704,15.28143 15.3144472,14.8836682 C15.7630341,13.7682778 16.7839561,12.6136637 18.498199,12.6136637 C20.7438958,12.6136637 22.152278,13.8881587 22.152278,16.3973727 L22.152278,26.8231516 L27.8461538,26.8231517 L27.8461538,16.1183872 C27.8461538,10.3839878 24.7850453,7.71566901 20.7019099,7.71566901 C17.3540813,7.71566901 15.8845724,9.58735929 15.0686083,10.861302 L15.1094893,8.41391226 L9.425462,8.41391226 C9.50722415,10.1657215 9.425462,26.8231516 9.425462,26.8231516 L15.1100418,26.8231517 Z"/></g></g></svg></a></li>
					<?php } ?>


				<?php $instagram = get_theme_mod( 'uw-madison-wp-2015_instagram_id' );
					if($instagram != "") { ?>
						<li class="instagram_social"><a href="<?php echo $instagram ?>" target="_blank">Instagram<svg enable-background="new 0 0 512 512"  version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M505,257c0,34.8-0.7,69.7,0.2,104.5c1.5,61.6-37.2,109.2-86.5,130.4c-19.8,8.5-40.6,13-62.1,13c-67.3,0.1-134.7,1-202-0.3   c-50.7-1-92.4-22.2-122.3-64c-15.7-22-23.2-47-23.2-74.1c0-71.7,0-143.3,0-215c0-58.5,28.5-99.4,79.1-126C110.2,14,134.1,9.1,159,9   c65.3,0,130.7-0.4,196,0.2c50.7,0.4,93,19.8,124.2,60.6c17.4,22.8,25.8,49,25.8,77.8C505,184,505,220.5,505,257z M46,257   c0,36.7,0,73.3,0,110c0,16.4,3.8,31.8,12.3,45.7c22.3,36.5,56,54.3,97.8,55c67.1,1,134.3,0.4,201.5,0.2c16.5,0,32.5-3.4,47.4-10.5   c40.6-19.4,63.3-50.3,63.1-96.7c-0.4-71-0.1-142-0.1-213c0-20.1-5.7-38.5-17.6-54.7c-23-31.1-54.8-46.4-92.8-46.8   c-67-0.8-134-0.3-201-0.2c-14.3,0-28.1,2.9-41.5,7.9c-36.8,13.7-71,48.4-69.4,99.5C46.9,188,46,222.5,46,257z"/><path d="M257.6,363c-64.5,0-116.5-51.4-116.6-115.4c-0.1-63,52.3-114.6,116.4-114.6c64.3-0.1,116.5,51.4,116.6,114.9   C374,311.3,321.9,362.9,257.6,363z M257.6,326c43.9,0,79.5-35.1,79.4-78.3c-0.1-42.8-35.7-77.8-79.4-77.8   c-43.9,0-79.7,34.9-79.7,78C178,291.1,213.7,326.1,257.6,326z"/><path d="M387.5,98c13.5,0,24.5,11.5,24.5,25.6c-0.1,14.1-11.2,25.5-24.7,25.4c-13.3-0.1-24.2-11.5-24.2-25.3   C363,109.6,374,98,387.5,98z"/></g></svg></a></li>
					<?php } ?>


				<?php $youtube = get_theme_mod( 'uw-madison-wp-2015_youtube_id' );
					if($youtube != "") { ?>
						<li class="youtube_social"><a href="http://www.youtube.com/user/<?php echo $youtube ?>" class="youtube_social" target="_blank">Youtube <svg height="16px" version="1.1" viewBox="0 0 20 16" width="20px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd"  stroke="none" stroke-width="1"><g fill="#000000" transform="translate(-42.000000, -171.000000)"><g transform="translate(42.000000, 171.000000)"><path d="M18,0.4 C17.4,0.2 13.7,0 10,0 C6.3,0 2.6,0.2 2,0.4 C0.4,0.9 0,4.4 0,8 C0,11.6 0.4,15.1 2,15.6 C2.6,15.8 6.3,16 10,16 C13.7,16 17.4,15.8 18,15.6 C19.6,15.1 20,11.6 20,8 C20,4.4 19.6,0.9 18,0.4 L18,0.4 Z M8,12.5 L8,3.5 L14,8 L8,12.5 L8,12.5 Z" /></g></g></g></svg></a></li>
					<?php } ?>


			</ul>
		</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

<?php include("footer_include.php"); ?>

<script>
	$(".main-gallery").flickity({
    // options
    cellAlign: "left",
    contain: true,
    wrapAround: true,
	sync: ".gallery-b",
	autoPlay: <?php $autorotate = get_theme_mod("uw-madison-wp-2015_headerslides_autorotate_id");  if($autorotate) { echo $autorotate."000"; } else { echo "false"; } ?>
  });


  $(".gallery-b").flickity({
    // options
    cellAlign: "left",
    contain: true,
	wrapAround: true
  });
</script>

</body>
</html>
