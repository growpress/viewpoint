<?php

/**
 * Foundation Setup
 */
if ( ! function_exists( 'gpframework_enqueue_foundation' ) ) :

	function gpframework_enqueue_foundation() {
		wp_enqueue_style( 'gpframework-foundation-style', get_template_directory_uri() . '/app.css' );
		wp_enqueue_script( 'gpframework-foundation-js', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '5.5.2', true );
		wp_enqueue_script( 'gpframework-modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.8.3', false );
	}

endif;

add_action( 'wp_enqueue_scripts', 'gpframework_enqueue_foundation', 10 );


if ( ! function_exists( 'gpframework_admin_bar_nav' ) ) :

	// Fixes admin bar CSS issues
	function gpframework_admin_bar_nav() {
	  if ( is_admin_bar_showing() ) { ?>
	    <style>
	    .fixed, .stick { margin-top: 32px; }
	    @media screen and (max-width: 600px){
	    	.fixed { margin-top: 46px; }
	    	#wpadminbar { position: fixed !important; }
	    }
	    </style>
	  <?php }
	}

endif;

add_action('wp_head', 'gpframework_admin_bar_nav');
