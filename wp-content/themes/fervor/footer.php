<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fervor
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-sm-offset-1">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
			<p><span class="social"><a href="https://www.facebook.com/createfervor">Facebook</a> <a href="https://www.instagram.com/createfervor/" target="_blank">Instagram</a> <a href="https://twitter.com/createfervor">Twitter</a> <a href="https://www.linkedin.com/company/1807294">LinkedIn</a></span><br/>
			@createfervor</p>
			

		</div>
		<div class="col-xs-12 col-sm-2">
			<h4>Most<br/>Recent<br/>Post</h4>
		</div>
		<div class="recent-post col-xs-12 col-sm-5">
		<?php if( fervor_is_latest_post() ){ ?>
		   <?php 
			 /**
			 	 * The WordPress Query class.
			 	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
			 	 *
			 	 */
			 	$args = array(
			 		
			 		//Type & Status Parameters
			 		'post_type'   => 'post',
			 		
			 		//Pagination Parameters
			 		'posts_per_page'         => 1,	
			 		'offset' => 1
			 		
			 	);
			 
			 $query = new WP_Query( $args );
			 
			?>
			<?php if ( $query->have_posts() ) {

				while ( $query->have_posts() ) {
					$query->the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" >>></a>
				<?php }

				/* Restore original Post Data */
				wp_reset_postdata();
			} else {
				// no posts found
			} ?>
		<?php } else { ?>
			<?php 
			 /**
			 	 * The WordPress Query class.
			 	 * @link http://codex.wordpress.org/Function_Reference/WP_Query
			 	 *
			 	 */
			 	$args = array(
			 		
			 		//Type & Status Parameters
			 		'post_type'   => 'post',
			 		
			 		//Pagination Parameters
			 		'posts_per_page'         => 1,	
			 		
			 	);
			 
			 $query = new WP_Query( $args );
			 
			?>
			<?php if ( $query->have_posts() ) {

				while ( $query->have_posts() ) {
					$query->the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" >>></a>
				<?php }

				/* Restore original Post Data */
				wp_reset_postdata();
			} else {
				// no posts found
			} ?>
		<?php } ?>
			
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 site-info">
			&copy; <?php echo date("Y"); ?> Fervor &nbsp; | &nbsp; <address translate="no">1705 Summit St.
Kansas City, MO 64108</address> &nbsp; | &nbsp; <a href="tel:816-200-2271">816.200.2271</a> &nbsp; | &nbsp; <a href="/privacy-policy/">Privacy Policy</a>
		</div><!-- .site-info -->
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<script type='text/javascript'>
window.__lo_site_id = 54856;

	(function() {
		var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
		wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
	  })();
	</script>

<?php wp_footer(); ?>

</body>
</html>
