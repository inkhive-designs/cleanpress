<?php
//FEATURED POSTS
// CREATE THE FCA PANEL
function cleanpress_customize_register_fp( $wp_customize ) {
$wp_customize->add_section(
    'cleanpress_featposts',
    array(
        'title'     => __('Featured Posts','cleanpress'),
        'priority'  => 35,
    )
);

    $wp_customize->add_setting(
        'cleanpress_featposts_enable',
        array(
            'sanitize_callback' => 'cleanpress_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Cleanpress_Switch_Control(
            $wp_customize,
            'cleanpress_featposts_enable',
            array(
                'settings'		=> 'cleanpress_featposts_enable',
                'section'		=> 'cleanpress_featposts',
                'label'    => __( 'Enable/Disable Feature Posts.','cleanpress' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'cleanpress' ),
                    'disable' => __( 'Disabled', 'cleanpress' )
                )
            )
        )
    );


$wp_customize->add_setting(
    'cleanpress_featposts_cat',
    array( 'sanitize_callback' => 'cleanpress_sanitize_category' )
);


$wp_customize->add_control(
    new Cleanpress_WP_Customize_Category_Control(
        $wp_customize,
        'cleanpress_featposts_cat',
        array(
            'label'    => __('Category For Featured Posts','cleanpress'),
            'settings' => 'cleanpress_featposts_cat',
            'section'  => 'cleanpress_featposts'
        )
    )
);
}
add_action( 'customize_register', 'cleanpress_customize_register_fp' );