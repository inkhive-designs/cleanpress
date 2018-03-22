<?php
// Layout and Design
function cleanpress_customize_register_layouts( $wp_customize ) {
$wp_customize->add_panel( 'cleanpress_design_panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Design & Layout','cleanpress'),
) );

//Blog Layout
$wp_customize->add_section(
    'cleanpress_design_options',
    array(
        'title'     => __('Blog Layout','cleanpress'),
        'priority'  => 0,
        'panel'     => 'cleanpress_design_panel'
    )
);

$wp_customize->add_setting(
    'cleanpress_blog_layout',
    array( 'sanitize_callback' => 'cleanpress_sanitize_blog_layout' )
);

function cleanpress_sanitize_blog_layout( $input ) {
    if ( in_array($input, array('grid','grid_2_column','grid_3_column','cleanpress') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'cleanpress_blog_layout',array(
        'label' => __('Select Layout','cleanpress'),
        'settings' => 'cleanpress_blog_layout',
        'section'  => 'cleanpress_design_options',
        'type' => 'select',
        'choices' => array(
            'cleanpress' => __('Cleanpress Theme Layout','cleanpress'),
            'grid' => __('Basic Blog Layout','cleanpress'),
            'grid_2_column' => __('Grid - 2 Column','cleanpress'),
            'grid_3_column' => __('Grid - 3 Column','cleanpress'),

        )
    )
);

//Sidebar Layout
$wp_customize->add_section(
    'cleanpress_sidebar_options',
    array(
        'title'     => __('Sidebar Layout','cleanpress'),
        'priority'  => 0,
        'panel'     => 'cleanpress_design_panel'
    )
);

$wp_customize->add_setting(
    'cleanpress_sidebar_style',
    array(
        'default' => 'default',
        'sanitize_callback' => 'cleanpress_sanitize_sidebar_style',

    )
);

$wp_customize->add_control(
    'cleanpress_sidebar_style',
    array(
        'setting' => 'cleanpress_sidebar_style',
        'section' => 'cleanpress_sidebar_options',
        'label' => __('Sidebar Style', 'cleanpress'),
        'type' => 'select',
        'choices' => array(
            'default' => __('Default', 'cleanpress'),
            'sticky-sidebar' => __('Sticky', 'cleanpress'),
        )
    )
);

    function cleanpress_sanitize_sidebar_style( $input ) {
        if ( in_array($input, array('default','sticky-sidebar') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_setting(
        'cleanpress_disable_sidebar',
        array(
            'sanitize_callback' => 'cleanpress_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Cleanpress_Switch_Control(
            $wp_customize,
            'cleanpress_disable_sidebar',
            array(
                'settings'		=> 'cleanpress_disable_sidebar',
                'section'		=> 'cleanpress_sidebar_options',
                'label'    => __( 'Enable/Disable Sidebar Everywhere.','cleanpress' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'cleanpress' ),
                    'disable' => __( 'Disabled', 'cleanpress' )
                )
            )
        )
    );

    $wp_customize->add_setting(
        'cleanpress_disable_sidebar_home',
        array(
            'sanitize_callback' => 'cleanpress_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Cleanpress_Switch_Control(
            $wp_customize,
            'cleanpress_disable_sidebar_home',
            array(
                'settings'		=> 'cleanpress_disable_sidebar_home',
                'section'		=> 'cleanpress_sidebar_options',
                'label'    => __( 'Enable/Disable Sidebar on Home/Blog.','cleanpress' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'cleanpress' ),
                    'disable' => __( 'Disabled', 'cleanpress' )
                ),
                'active_callback' => 'cleanpress_show_sidebar_options',
            )
        )
    );

    $wp_customize->add_setting(
        'cleanpress_disable_sidebar_front',
        array(
            'sanitize_callback' => 'cleanpress_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Cleanpress_Switch_Control(
            $wp_customize,
            'cleanpress_disable_sidebar_front',
            array(
                'settings'		=> 'cleanpress_disable_sidebar_front',
                'section'		=> 'cleanpress_sidebar_options',
                'label'    => __( 'Enable/Disable Sidebar on Front Page.','cleanpress' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'cleanpress' ),
                    'disable' => __( 'Disabled', 'cleanpress' )
                ),
                'active_callback' => 'cleanpress_show_sidebar_options',
            )
        )
    );

    $wp_customize->add_setting(
        'cleanpress_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'cleanpress_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'cleanpress_sidebar_width', array(
            'settings' => 'cleanpress_sidebar_width',
            'label'    => __( 'Sidebar Width','cleanpress' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','cleanpress'),
            'section'  => 'cleanpress_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'cleanpress_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

/* Active Callback Function */
function cleanpress_show_sidebar_options($control) {

    $option = $control->manager->get_setting('cleanpress_disable_sidebar');
    return $option->value() == 'enable' ;

}

function cleanpress_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Custom Footer Text
$wp_customize-> add_section(
    'cleanpress_custom_footer',
    array(
        'title'			=> __('Custom Footer Text','cleanpress'),
        'description'	=> __('Enter your Own Copyright Text.','cleanpress'),
        'priority'		=> 11,
        'panel'			=> 'cleanpress_design_panel'
    )
);

$wp_customize->add_setting(
    'cleanpress_footer_text',
    array(
        'default'		=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'cleanpress_footer_text',
    array(
        'section' => 'cleanpress_custom_footer',
        'settings' => 'cleanpress_footer_text',
        'type' => 'text'
    )
);

}
add_action( 'customize_register', 'cleanpress_customize_register_layouts' );