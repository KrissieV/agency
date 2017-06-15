<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fervor
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			if ($post->post_type === 'case_study') {
				get_template_part( 'template-parts/content', 'case_study' );
			} elseif ($post->post_type === 'team_member') {
				get_template_part( 'template-parts/content', 'team_member' );
			} else { ?>

				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php } ?>
			
			
			<?php if (is_singular('post')) { ?>
			<section class="comments">
			<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>
			</div>
			</div>
			</section>
			<?php } else {

				} ?>
		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if (is_singular('post')) {
	get_sidebar();
} else {
	// do nothing
}
get_footer();
