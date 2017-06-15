<?php
/**
 * Create editor styles.
 *
 *
 * @package fervor
 */


/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

/**
 * Add "Styles" drop-down
 */
add_filter( 'mce_buttons_2', 'tuts_mce_editor_buttons' );
 
function tuts_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
 
/**
 * Add styles/classes to the "Styles" drop-down
 */
// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'button',  
			'inline' => 'span',  
			'classes' => 'button',
		),
		array(  
			'title' => 'highlighter',  
			'inline' => 'span',  
			'classes' => 'highlighter',
		),  
		array(  
			'title' => 'callout',  
			'block' => 'blockquote', 
			'classes' => 'callout', 
		),
		array(  
			'title' => 'calloutGray',  
			'block' => 'blockquote', 
			'classes' => 'calloutGray', 
		),
		array(  
			'title' => 'blockquote',  
			'block' => 'blockquote', 
			'classes' => 'blockquote', 
		),
		array(  
			'title' => 'standard button',  
			'block' => 'div', 
			'classes' => 'standard-button', 
		),
		
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 