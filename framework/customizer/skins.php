<?php
//Logo Settings
function cleanpress_customize_register_skins( $wp_customize ) {
$wp_customize->add_section( 'title_tagline' , array(
    'title'      => __( 'Title, Tagline & Logo', 'cleanpress' ),
    'priority'   => 30,
) );
    function cleanpress_logo_enabled($control) {
    $option = $control->manager->get_setting('custom_logo');
    return $option->value() == true;
}

//Replace Header Text Color with, separate colors for Title and Description
$wp_customize->get_control('header_textcolor')->label = __('Site Title Color','cleanpress');
$wp_customize->add_setting('cleanpress_header_desccolor', array(
    'default'     => '#FFF',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'cleanpress_header_desccolor', array(
        'label' => __('Site Tagline Color','cleanpress'),
        'section' => 'colors',
        'settings' => 'cleanpress_header_desccolor',
        'type' => 'color'
    ) )
);
}
add_action( 'customize_register', 'cleanpress_customize_register_skins' );