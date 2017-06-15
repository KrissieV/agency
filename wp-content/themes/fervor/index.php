<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fervor
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<section class="opening blog-opening container-fluid">
							
							<?php $background_image = get_field( 'featured_image',35 ); ?>
							<?php if ( $background_image ) { ?>
								<?php fervor_background_image($background_image,'.blog-opening'); ?>
							<?php } ?>

							<div class="row">
								<div class="typography col-xs-6 col-sm-5 col-sm-offset-1">
									<h1><?php single_post_title(); ?></h1>
								</div>
								<div class="icon col-xs-5 col-sm-4 col-md-3 col-sm-offset-1">
									<?php $icon = get_sub_field( 'icon' ); ?>
									<?php if ( $icon ) { ?>
										<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
									<?php } ?>
								</div>
							</div>
						</section>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif; ?>
			<section class="grid container-fluid">
				<div class="row">
			<?php /* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				?>
				
				<?php get_template_part( 'template-parts/content', 'blog-home' ); ?>
				

			<?php endwhile; ?>
			</div>
			</section>

			<?php the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
