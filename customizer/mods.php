<?php
/**
 * Functions used to implement options
 */

function gpframework_customizer_style() {
	wp_enqueue_style( 'gpframework_customizer', get_template_directory_uri() . '/customizer/style.css', array(), null, 'screen' );
}
add_action( 'customize_controls_enqueue_scripts', 'gpframework_customizer_style' );
