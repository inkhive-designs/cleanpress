<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cleanpress
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cleanpress' ); ?></a>
    <?php get_template_part('modules/header/search', 'form'); ?>

    <?php get_template_part('modules/header/masthead'); ?>

    <?php get_template_part('modules/navigation/menu','primary'); ?>

    <?php get_template_part('modules/navigation/menu','mobile'); ?>

	<?php if( class_exists('rt_slider') ) {
			 rt_slider::render('framework/featured-components/slider', 'nivo' );
		} ?>
	
	<?php get_template_part('framework/featured-components/featured', 'posts' ); ?>

	
	<div class="mega-container">
	
		<div id="content" class="site-content container">