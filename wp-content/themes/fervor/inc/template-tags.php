<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package fervor
 */

if ( ! function_exists( 'fervor_grid_element' ) ) :
/**
 * Creates grid element
 */
function fervor_grid_element($image_array,$type,$i,$content,$link_url,$link_text) { ?>
	
	
	
	
		<?php if ($image_array == '') { ?>
			<div class="grid__box no-image grid-post-<?php echo $type; ?> grid-post-<?php echo $type; ?>-<?php echo $i; ?>">
			
		<?php } else { ?>
			<div class="grid__box grid-post-<?php echo $type; ?> grid-post-<?php echo $type; ?>-<?php echo $i; ?>">

			<?php fervor_background_image($image_array,'.grid-post-'.$type.'-'.$i); ?>
			<? if ($content != '') { ?>
				<div class="caption"><?php echo $content; ?></div>
			<?php } ?>
			<?php } ?>
		
	
		<?php if ($type === 'case_study') { ?>
			<div class="link-bar">Case Study: <strong><?php echo $link_text; ?></strong></div>
			<a href="<?php echo $link_url; ?>"  class="grid__box__link"></a>
			<?php } elseif ($type === 'page') { ?>
				<div class="link-bar"><strong><?php echo $link_text; ?></strong></div>
			<a href="<?php echo $link_url; ?>"  class="grid__box__link"></a>
			<?php } elseif ($type === 'team_member') { ?>
				<div class="link-bar"><strong><?php echo $link_text; ?></strong></div>
				<a href="<?php echo $link_url; ?>"  class="grid__box__link"></a>
			<?php } elseif ($type === 'post') { ?>
				<div class="link-bar"><strong><?php echo $link_text; ?></strong></div>
				<a href="<?php echo $link_url; ?>"  class="grid__box__link"></a>
			<?php } elseif ($type === 'gallery-image') { ?>
				<div class="caption"><?php echo $content; ?></div>
			<?php } ?>
	</div>


<?php }
endif;

if ( ! function_exists( 'fervor_background_image' ) ) :
/**
 * Adds styling to set a background image responsively to the container specified.
 */
function fervor_background_image($image_array,$selector) { ?>
	<?php  
		$width = $image_array['width'];
		$height = $image_array['height'];
		$ratio = ($height / $width) * 100;	
	?>
    <style>
	    @media screen and (min-width: 1025px) {
        	<?php echo $selector; ?> {
        		background-image: url('<?php echo $image_array['url']; ?>');
        	}
        }
        @media screen and (min-width: 641px) {
        	<?php echo $selector; ?> {
        		background-image: url('<?php echo $image_array['sizes']['tablet-background']; ?>');
        	}
        }
        @media screen and (max-width: 640px) {
        	<?php echo $selector; ?> {
        		background-image: url('<?php echo $image_array['sizes']['mobile-background']; ?>');
        	}
        }
    	
    	<?php echo $selector; ?>::after {
    		padding-top: <?php echo $ratio; ?>%;
    	}
    </style>

<?php }
endif;

// function acf_wysiwyg_remove_wpautop() {
//     remove_filter('acf_the_content', 'wpautop' );
// }
// add_action('acf/init', 'acf_wysiwyg_remove_wpautop');

if ( ! function_exists( 'fervor_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function fervor_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'fervor' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'fervor' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'fervor_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function fervor_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'fervor' ) );
		if ( $categories_list && fervor_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'fervor' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'fervor' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'fervor' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'fervor' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'fervor' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function fervor_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'fervor_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'fervor_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so fervor_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so fervor_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in fervor_categorized_blog.
 */
function fervor_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'fervor_categories' );
}
add_action( 'edit_category', 'fervor_category_transient_flusher' );
add_action( 'save_post',     'fervor_category_transient_flusher' );
