<?php
/**
 * The template for displaying archive pages.
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
									<h1><?php the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' ); ?></h1>
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
		if ( have_posts() ) : ?>

			
<section class="grid container-fluid">
				<div class="row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-blog-home', get_post_format() );

			endwhile;
			$countPosts = $wp_the_query->post_count;
			if ($countPosts % 3 == 0) {
				//do nothing
			} elseif ($countPosts % 3 == 1) { ?>
				<div class="grid__box spacer spacer--one"></div>
				<div class="grid__box spacer spacer--two"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
			<?php } elseif ($countPosts % 3 == 2) { ?>
				<div class="grid__box spacer spacer--one"><img src="/wp-content/themes/fervor/assets/img/fervor-flame-white.svg" /></div>
				
			<?php } 

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
