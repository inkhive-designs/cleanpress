<?php
function cleanpress_customize_register_hero($wp_customize) {
    //HERO 2
    $wp_customize->add_section('cleanpress_hero2_section',
        array(
            'title' => __('HERO (Below Content)', 'cleanpress'),
            'priority' => 25,
        )
    );

    $wp_customize->add_setting(
        'cleanpress_hero_eta_enable',
        array(
            'sanitize_callback' => 'cleanpress_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Cleanpress_Switch_Control(
            $wp_customize,
            'cleanpress_hero_eta_enable',
            array(
                'settings'		=> 'cleanpress_hero_eta_enable',
                'section'		=> 'cleanpress_hero2_section',
                'label'    => __( 'Enable/Disable Hero.','cleanpress' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'cleanpress' ),
                    'disable' => __( 'Disabled', 'cleanpress' )
                )
            )
        )
    );

    $wp_customize->add_setting('cleanpress_hero2_selectpage',
        array(
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control('cleanpress_hero2_selectpage',
        array(
            'setting' => 'cleanpress_hero2_selectpage',
            'section' => 'cleanpress_hero2_section',
            'label' => __('Title', 'cleanpress'),
            'description' => __('Select a Page to display Title', 'cleanpress'),
            'type' => 'dropdown-pages',
            'active_callback' => 'cleanpress_hero_eta_active_callback'
        )
    );

    $wp_customize->add_setting('cleanpress_hero2_full_content',
        array(
            'sanitize_callback' => 'cleanpress_sanitize_checkbox'
        )
    );

    $wp_customize->add_control('cleanpress_hero2_full_content',
        array(
            'setting' => 'cleanpress_hero2_full_content',
            'section' => 'cleanpress_hero2_section',
            'label' => __('Show Full Content instead of excerpt', 'cleanpress'),
            'type' => 'checkbox',
            'default' => false,
            'active_callback' => 'cleanpress_hero_eta_active_callback'
        )
    );

    $wp_customize->add_setting('cleanpress_hero2_button',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control('cleanpress_hero2_button',
        array(
            'setting' => 'cleanpress_hero2_button',
            'section' => 'cleanpress_hero2_section',
            'label' => __('Button Name', 'cleanpress'),
            'description' => __('Leave blank to disable Button.', 'cleanpress'),
            'type' => 'text',
            'active_callback' => 'cleanpress_hero_eta_active_callback'
        )
    );

    function cleanpress_hero_eta_active_callback( $control ) {
        $option = $control->manager->get_setting('cleanpress_hero_eta_enable');
        return $option->value() == 'enable';
    }
}
add_action('customize_register', 'cleanpress_customize_register_hero');