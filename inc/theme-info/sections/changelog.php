<?php
/**
 * Welcome screen changelog template
 */
?>

<div id="changelog" class="viewpoint-changelog panel">

	<div class="changelog-intro">

		<h3><?php _e( 'Version Update Details', 'viewpoint' ); ?> </h3>
		<p><?php _e( 'Review viewpoint version details and release dates.', 'viewpoint' ); ?></p>

	</div><!-- .changelog-intro -->

	<div class="content-section">

		<?php
		/**
		 * Display the changelog file from the theme
		 */
			echo wp_kses_post ( $this->viewpoint_changlog() );
		?>

	</div><!-- .content-section -->


</div><!-- #changelog -->
