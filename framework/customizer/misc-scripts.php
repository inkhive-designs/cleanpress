<?php
//upgrade
function cleanpress_customize_register_misc( $wp_customize ) {
$wp_customize->add_section(
    'cleanpress_sec_pro',
    array(
        'title'     => __('Important Links','cleanpress'),
        'priority'  => 1,
    )
);

$wp_customize->add_setting(
    'cleanpress_pro',
    array( 'sanitize_callback' => 'cleanpress_sanitize_text' )
);

$wp_customize->add_control(
    new Cleanpress_WP_Customize_Upgrade_Control(
        $wp_customize,
        'cleanpress_pro',
        array(
            'description'	=> '<a class="cleanpress-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'cleanpress').'</a>
                                    <a class="cleanpress-important-links" href="https://inkhive.com/documentation/cleanpress" target="_blank">'.__('Oxane Documentation', 'cleanpress').'</a>
                                    <a class="cleanpress-important-links" href="https://demo.inkhive.com/cleanpress-plus/" target="_blank">'.__('Oxane Plus Live Demo', 'cleanpress').'</a>
                                    <a class="cleanpress-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'cleanpress').'</a>
                                    <a class="cleanpress-important-links" href="https://wordpress.org/support/theme/cleanpress/reviews" target="_blank">'.__('Review Oxane on WordPress', 'cleanpress').'</a>',
            'section' => 'cleanpress_sec_pro',
            'settings' => 'cleanpress_pro',
        )
    )
);
}
add_action( 'customize_register', 'cleanpress_customize_register_misc' );