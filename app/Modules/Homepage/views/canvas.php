<?php
/**
 * Blank Canvas Template for SOLDIS Landing Page
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
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
<body <?php body_class( 'soldis-landing-canvas' ); ?>>
	<?php wp_body_open(); ?>
	
	<main id="soldis-landing-content">
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
	</main>

	<?php wp_footer(); ?>
</body>
</html>
