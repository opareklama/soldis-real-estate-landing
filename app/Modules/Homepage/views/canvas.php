<?php
defined( 'ABSPATH' ) || exit;

/**
 * Blank Canvas Template for SOLDIS Landing Page
 */
?><!DOCTYPE html>
<html <?php defined( 'ABSPATH' ) || exit;

language_attributes(); ?>>
<head>
	<meta charset="<?php defined( 'ABSPATH' ) || exit;

bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php defined( 'ABSPATH' ) || exit;

wp_head(); ?>
	<style>
		/* Ensure no theme margin/padding affects the canvas */
		html, body {
			margin: 0;
			padding: 0;
			width: 100%;
			overflow-x: hidden;
		}
	</style>
</head>
<body <?php defined( 'ABSPATH' ) || exit;

body_class( 'soldis-landing-canvas' ); ?>>
	<?php defined( 'ABSPATH' ) || exit;

wp_body_open(); ?>
	
	<main id="soldis-landing-content">
		<?php
		defined( 'ABSPATH' ) || exit;

while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
	</main>

	<?php defined( 'ABSPATH' ) || exit;

wp_footer(); ?>
</body>
</html>

