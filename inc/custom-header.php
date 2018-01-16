<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package cleanpress
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses cleanpress_header_style()
 * @uses cleanpress_admin_header_style()
 * @uses cleanpress_admin_header_image()
 */
function cleanpress_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'cleanpress_custom_header_args', array(
		'default-text-color'     => '#000',
		'width'  				 => 1440,
		'height'				 => 380,
		'flex-height'            => true,
		'wp-head-callback'       => 'cleanpress_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'cleanpress_custom_header_setup' );

if ( ! function_exists( 'cleanpress_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see cleanpress_custom_header_setup().
 */
function cleanpress_header_style() {
	?>
	<style>
	#masthead {
			background-image: url(<?php header_image(); ?>);
			background-size: <?php echo esc_html(get_theme_mod('cleanpress_himg_style','cover')); ?>;
			background-position-x: <?php echo esc_html(get_theme_mod('cleanpress_himg_align','center')); ?>;
			background-repeat: <?php echo  esc_html(get_theme_mod('cleanpress_himg_repeat')) ? "repeat" : "no-repeat" ?>;
		}
	</style>	
	<?php
}
endif; // cleanpress_header_style