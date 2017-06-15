<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fervor
 */

?>
<section class="opening container-fluid case_study <?php echo $post->post_name; ?>">
							
	<?php $background_image = get_field( 'featured_image' ); ?>
	<?php if ( $background_image ) { ?>
		<?php fervor_background_image($background_image,'.case_study'); ?>
	<?php } ?>
	
	<div class="quote">
		<h1><?php the_field('quote'); ?></h1>
		<p class="client-name"><?php the_field('name'); ?>, <?php the_field('title'); ?></p>
		
		<?php $client = get_field( 'client' ); ?>
			<?php if ( $client ): ?>
				<?php foreach ( $client as $post ):  ?>
					<?php setup_postdata ($post); ?>
					<?php 
						$page = get_page_by_path( $post->post_name, OBJECT, $post->post_type ); 
						$image = get_field('featured_image',$page->ID);
						if ( $image ) { ?>
							<img class="client-logo" src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" />
						<?php } else { ?>
							<h2><?php the_title(); ?></h2>
						<?php } ?>
				<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		

	</div>
	
</section>
<!--<section class="case_study gradient-bkgd container-fluid">
	
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-sm-push-5 ">
			<?php $featured_image = get_field( 'featured_image' ); ?>
			<?php if ( $featured_image ) { ?>
				<img src="<?php echo $featured_image['url']; ?>" alt="<?php echo $featured_image['alt']; ?>" class="featured-image" />
			<?php } ?>
			
		</div>
		<div class="recent_work col-xs-12 col-sm-5 col-sm-pull-6 ">
		<?php $client = get_field( 'client' ); ?>
			<?php if ( $client ): ?>
				<?php foreach ( $client as $post ):  ?>
					<?php setup_postdata ($post); ?>
					<?php 
						$page = get_page_by_path( $post->post_name, OBJECT, $post->post_type ); 
						$image = get_field('featured_image',$page->ID);
						if ( $image ) { ?>
							<h1><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></h1>
						<?php } else { ?>
							<h1><?php the_title(); ?></h1>
						<?php } ?>
				<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
			<h1></h1>	
		</div>
	</div>
</section>-->
<section class="case_study__content container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<h2>Challenge</h2>
			<?php the_field( 'challenge' ); ?>
		</div>
		<div class="col-xs-12 col-sm-4">
			<h2>Solution</h2>
			<?php the_field( 'solution' ); ?>
		</div>
		<div class="col-xs-12 col-sm-4">
			<h2>Impact</h2>
			<?php the_field( 'impact' ); ?>
		</div>
	</div>
</section>
<section class="grid container-fluid">
	<?php $image_gallery_images = get_field( 'image_gallery' ); ?>
	<?php if ( $image_gallery_images ) :  ?>
		<div class="row">
		<?php 
			$image_count = count($image_gallery_images); 
			$i = 0;
		?>
		<?php foreach ( $image_gallery_images as $image_gallery_image ): ?>
			
			<?php
				$image_array = $image_gallery_image;
				$type = 'gallery-image';
				$i++;
				$content = $image_gallery_image['caption'];
				$link_url = $image_gallery_image['url'];
				$link_text = '>>';
				fervor_grid_element($image_array,$type,$i,$content,$link_url,$link_text); ?>
		
		<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>

