<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fervor
 */

?>



<?php 

	if (get_field('featured_image',$post->ID)) {
		$image_array = get_field('featured_image',$post->ID);
	} else {
		$image_array = '';
	}
	
	$type = $post->post_type;

	$content = $post->post_excerpt;

	$link_url = get_permalink();

	$i = $post->ID;
	$link_text = $post->post_title;

	fervor_grid_element($image_array,$type,$i,$content,$link_url,$link_text); ?>

