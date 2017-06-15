<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fervor
 */

?>

<section class="opening container-fluid team_member">
							
	<?php $background_image = get_field( 'featured_image' ); ?>
	<?php if ( $background_image ) { ?>
		<?php fervor_background_image($background_image,'.team_member'); ?>
	<?php } ?>

	
</section>
<section class="text_content container-fluid team_member__bio">

	<?php $background_image = get_sub_field( 'background_image' ); ?>
		<?php if ( $background_image ) { ?>
			<?php fervor_background_image($background_image,'.team_member__bio'); ?>
		<?php } ?>

	<div class="row">
				<div class="col-xs-12 col-sm-4 col-sm-offset-1">
					<h1><?php the_title(); ?></h1>
					<h2><?php the_field('role'); ?></h2>
				</div>
				<div class="col-xs-12 col-sm-6">
					<?php the_content(); ?>
					
				</div>
			</div>
</section>