<?php
/**
 * Functions used to implement options
 */

function viewpoint_customizer_style() {
	wp_enqueue_style( 'viewpoint_customizer', get_template_directory_uri() . '/customizer/style.css', array(), null, 'screen' );
}
add_action( 'customize_controls_enqueue_scripts', 'viewpoint_customizer_style' );
