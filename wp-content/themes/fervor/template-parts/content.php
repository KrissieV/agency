<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fervor
 */

?>


	<header class="entry-header">
	<section class="container-fluid opening blog-opening">
	

		<?php
		$background_image = get_field( 'featured_image',35 );
			fervor_background_image($background_image,'.blog-opening');
		 ?>

	
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
		<?php
		if (is_archive()) {
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		} elseif ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php fervor_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
		</div>
		</div>
	</section>
	</header><!-- .entry-header -->
<section class="container-fluid text_content gradient-bkgd">
<div class="row">
<div class="col-xs-12 col-sm-10 col-sm-offset-1">
	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'fervor' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fervor' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fervor_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	</div>
	</div>
	</section>
	<section class="email_subscription container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<p>Get the latest from Fervor</p>
				<?php 
				    
				    echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]');
				?>
			</div>
		</div>
	</section>

