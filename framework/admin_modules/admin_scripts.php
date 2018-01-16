<?php
function cleanpress_custom_wp_admin_scripts() {

    wp_enqueue_script( 'cleanpress-customizer-js', get_template_directory_uri() . '/js/customizer.js' );

}
add_action( 'admin_enqueue_scripts', 'cleanpress_custom_wp_admin_scripts' );