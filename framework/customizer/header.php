<?php
function cleanpress_customize_register_header($wp_customize) {

    $wp_customize->add_panel('cleanpress_header_panel', array(
        'title' => __('Header Settings', 'cleanpress'),
        'priority' => 20,
    ));

    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'cleanpress' ),
        'priority'   => 30,
        'panel' => 'cleanpress_header_panel'
    ) );

    function cleanpress_logo_enabled($control) {
        $option = $control->manager->get_setting('custom_logo');
        return $option->value() == true;
    }
}
add_action('customize_register', 'cleanpress_customize_register_header');