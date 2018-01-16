<?php
//upgrade
function cleanpress_customize_register_misc( $wp_customize ) {
$wp_customize->add_section(
    'cleanpress_sec_premsupport',
    array(
        'title'     => __('Cleanpress - Important Links','cleanpress'),
        'priority'  => 1,
    )
);

$wp_customize->add_setting(
    'cleanpress_important_links',
    array( 'sanitize_callback' => 'cleanpress_sanitize_text' )
);

$wp_customize->add_control(
    new Cleanpress_WP_Customize_Upgrade_Control(
        $wp_customize,
        'cleanpress_upgrade',
        array(
            'settings'		=> 'cleanpress_important_links',
            'section'		=> 'cleanpress_sec_premsupport',
            'description'	=> '<a class="cleanpress-important-links" href="#" target="_blank">'.__('InkHive Support Forum', 'cleanpress').'</a>
                                    <a class="cleanpress-important-links" href="http://demo.inkhive.com/cleanpress-plus/" target="_blank">'.__('Cleanpress Live Demo', 'cleanpress').'</a>
                                    <a class="cleanpress-important-links" href="#" target="_blank">'.__('Cleanpress Documentation', 'cleanpress').'</a>
                                    <a class="cleanpress-important-links" href="https://www.facebook.com/inkhive/" target="_blank">'.__('We Love Our Facebook Fans', 'cleanpress').'</a>
                                    <a class="cleanpress-important-links" href="#" target="_blank">'.__('Want SEO?', 'cleanpress').'</a>
                                    <a class="cleanpress-important-links" href="#" target="_blank">'.__('Review Us', 'cleanpress').'</a>'
        )
    )
);
}
add_action( 'customize_register', 'cleanpress_customize_register_misc' );