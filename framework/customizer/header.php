<?php
function cleanpress_customize_register_header($wp_customize) {
    //Header Image Control
    $wp_customize->get_section('header_image')->panel = "cleanpress_header_panel";

    //Header Panel
    $wp_customize->add_panel('cleanpress_header_panel', array(
        'title' => __('Header Settings', 'cleanpress'),
        'priority' => 20,
    ));

    //Title Tagline Section
    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'cleanpress' ),
        'priority'   => 30,
        'panel' => 'cleanpress_header_panel'
    ) );

    function cleanpress_logo_enabled($control) {
        $option = $control->manager->get_setting('custom_logo');
        return $option->value() == true;
    }
    
    //Header Text
    $wp_customize->add_section(
        'cleanpress_header_text_section',
        array(
            'title' => __('Header Text', 'cleanpress'),
            'priority' => 37,
            'panel'	=> 'cleanpress_header_panel'
        )
    );

    $wp_customize->add_setting(
        'cleanpress_header_text',
        array(
            'default'	=> '',
            'sanitize_callback'	=> 'esc_textarea',
            'transport'		=> 'postMessage'
        )
    );

    $wp_customize->add_control(
        'cleanpress_header_text',
        array(
            'label'	=> __('Enter the Header Text', 'cleanpress'),
            'type'	=> 'textarea',
            'section'	=> 'cleanpress_header_text_section',
            'priority'	=> 5
        )
    );

    $wp_customize->add_setting(
        'cleanpress_header_text_desc',
        array(
            'default'	=> '',
            'sanitize_callback'	=> 'esc_textarea',
            'transport'		=> 'postMessage'
        )
    );

    $wp_customize->add_control(
        'cleanpress_header_text_desc',
        array(
            'label'	=> __('Enter the Header Text', 'cleanpress'),
            'type'	=> 'textarea',
            'section'	=> 'cleanpress_header_text_section',
            'priority'	=> 5
        )
    );

    $wp_customize->add_setting(
        'cleanpress_header_cta_enable',
        array(
            'default'	=> '',
            'sanitize_callback'	=> 'cleanpress_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'cleanpress_header_cta_enable',
        array(
            'label'		=> __('Enable Header Call-To-Action Button', 'cleanpress'),
            'type'		=> 'checkbox',
            'section'	=> 'cleanpress_header_text_section',
            'priority'	=> 10
        )
    );

    $wp_customize->add_setting(
        'cleanpress_header_cta',
        array(
            'default'	=> '',
            'sanitize_callback'	=> 'wp_filter_nohtml_kses',
        )
    );

    $wp_customize->add_control(
        'cleanpress_header_cta',
        array(
            'label'	=> __('Enter the CTA Button Text', 'cleanpress'),
            'type'	=> 'text',
            'section'	=> 'cleanpress_header_text_section',
            'priority'	=> 15
        )
    );

    $wp_customize->add_setting(
        'cleanpress_header_cta_url',
        array(
            'default'	=> '',
            'sanitize_callback'	=> 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleanpress_header_cta_url',
        array(
            'label'	=> __('Enter the CTA Button URL', 'cleanpress'),
            'type'	=> 'text',
            'section'	=> 'cleanpress_header_text_section',
            'priority'	=> 20
        )
    );
}
add_action('customize_register', 'cleanpress_customize_register_header');