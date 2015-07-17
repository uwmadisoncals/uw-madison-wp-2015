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
<?php if(is_front_page()) { ?>
		<?php include('pagefeature.php'); ?>
	<?php } ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="http://www.wisconsin.edu/">&copy; Board of Regents of the University of Wisconsin System</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
