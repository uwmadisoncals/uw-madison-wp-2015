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
		<div class="site-info">
			<a href="http://www.wisconsin.edu/">&copy; Board of Regents of the University of Wisconsin System</a>
		</div><!-- .site-info -->
		
		<div class="social">
			<ul>
				<?php $twitter = get_theme_mod( 'uw-madison-wp-2015_twitter_id' );
					if($twitter != "") { ?>
						<li><a href="http://twitter.com/<?php echo $twitter ?>" class="twitter_social"><svg enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M52.837,15.065c-1.811,0.805-3.76,1.348-5.805,1.591c2.088-1.25,3.689-3.23,4.444-5.592c-1.953,1.159-4.115,2-6.418,2.454  c-1.843-1.964-4.47-3.192-7.377-3.192c-5.581,0-10.106,4.525-10.106,10.107c0,0.791,0.089,1.562,0.262,2.303  c-8.4-0.422-15.848-4.445-20.833-10.56c-0.87,1.492-1.368,3.228-1.368,5.082c0,3.506,1.784,6.6,4.496,8.412  c-1.656-0.053-3.215-0.508-4.578-1.265c-0.001,0.042-0.001,0.085-0.001,0.128c0,4.896,3.484,8.98,8.108,9.91  c-0.848,0.23-1.741,0.354-2.663,0.354c-0.652,0-1.285-0.063-1.902-0.182c1.287,4.015,5.019,6.938,9.441,7.019  c-3.459,2.711-7.816,4.327-12.552,4.327c-0.815,0-1.62-0.048-2.411-0.142c4.474,2.869,9.786,4.541,15.493,4.541  c18.591,0,28.756-15.4,28.756-28.756c0-0.438-0.009-0.875-0.028-1.309C49.769,18.873,51.483,17.092,52.837,15.065z"/></svg></a></li>
					<?php } ?>
					
				
				<?php $facebook = get_theme_mod( 'uw-madison-wp-2015_facebook_id' );
					if($facebook != "") { ?>
						<li class="facebook_social"><a href="http://facebook.com/<?php echo $facebook ?>" class="facebook_social"><svg enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z"/></svg></a></li>
					<?php } ?>
					
					
				<?php $linkedin = get_theme_mod( 'uw-madison-wp-2015_linkedin_id' );
					if($linkedin != "") { ?>
						<li class="linkedin_social"><a href="http://wwwlinkedin.com/in/<?php echo $linkedin ?>"><svg height="60px" version="1.1" viewBox="0 0 60 60" width="60px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="black" stroke="none" stroke-width="1"><g id="slice" transform="translate(-600.000000, 0.000000)"/><g fill="#000000" id="linkedin" transform="translate(16.000000, 17.000000)"><path d="M5.88307542,26.8231512 L5.88307542,8.52433895 L0.227370038,8.52433895 L0.227370038,26.8231512 L5.88307542,26.8231512 Z M5.88307542,2.03821455 C5.84938823,0.400659962 4.75801564,-0.846153846 2.98505434,-0.846153846 C1.21163158,-0.846153846 0.0528846154,0.400659962 0.0528846154,2.03821455 C0.0528846154,3.64020234 1.17794439,4.92307692 2.9172185,4.92307692 L2.95090569,4.92307692 C4.75801564,4.92307692 5.88307542,3.64020234 5.88307542,2.03821455 Z M15.1100418,26.8231517 L15.1100418,16.3973729 C15.1100418,15.8394014 15.1503704,15.28143 15.3144472,14.8836682 C15.7630341,13.7682778 16.7839561,12.6136637 18.498199,12.6136637 C20.7438958,12.6136637 22.152278,13.8881587 22.152278,16.3973727 L22.152278,26.8231516 L27.8461538,26.8231517 L27.8461538,16.1183872 C27.8461538,10.3839878 24.7850453,7.71566901 20.7019099,7.71566901 C17.3540813,7.71566901 15.8845724,9.58735929 15.0686083,10.861302 L15.1094893,8.41391226 L9.425462,8.41391226 C9.50722415,10.1657215 9.425462,26.8231516 9.425462,26.8231516 L15.1100418,26.8231517 Z"/></g></g></svg></a></li>
					<?php } ?>
					
					
				<?php $youtube = get_theme_mod( 'uw-madison-wp-2015_youtube_id' );
					if($youtube != "") { ?>
						<li class="youtube_social"><a href="http://www.youtube.com/user/<?php echo $youtube ?>" class="youtube_social"><svg height="16px" version="1.1" viewBox="0 0 20 16" width="20px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#000000" id="Icons-AV" transform="translate(-42.000000, -171.000000)"><g id="video-youtube" transform="translate(42.000000, 171.000000)"><path d="M18,0.4 C17.4,0.2 13.7,0 10,0 C6.3,0 2.6,0.2 2,0.4 C0.4,0.9 0,4.4 0,8 C0,11.6 0.4,15.1 2,15.6 C2.6,15.8 6.3,16 10,16 C13.7,16 17.4,15.8 18,15.6 C19.6,15.1 20,11.6 20,8 C20,4.4 19.6,0.9 18,0.4 L18,0.4 Z M8,12.5 L8,3.5 L14,8 L8,12.5 L8,12.5 Z" id="Shape"/></g></g></g></svg></a></li>
					<?php } ?>
			</ul>
		</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

<?php include("footer_include.php"); ?>

</body>
</html>
