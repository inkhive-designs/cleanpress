<?php
// Social Icons
function cleanpress_customize_register_social( $wp_customize ) {
$wp_customize->add_section('cleanpress_social_section', array(
    'title' => __('Social Icons','cleanpress'),
    'priority' => 44 ,
    'panel' => 'cleanpress_header_panel'
));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','cleanpress'),
    'facebook' => __('Facebook','cleanpress'),
    'twitter' => __('Twitter','cleanpress'),
    'google-plus' => __('Google Plus','cleanpress'),
    'instagram' => __('Instagram','cleanpress'),
    'rss' => __('RSS Feeds','cleanpress'),
    'vine' => __('Vine','cleanpress'),
    'vimeo-square' => __('Vimeo','cleanpress'),
    'youtube' => __('Youtube','cleanpress'),
    'flickr' => __('Flickr','cleanpress'),
);

$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'cleanpress_social_'.$x, array(
        'sanitize_callback' => 'cleanpress_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'cleanpress_social_'.$x, array(
        'settings' => 'cleanpress_social_'.$x,
        'label' => __('Icon ','cleanpress').$x,
        'section' => 'cleanpress_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'cleanpress_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'cleanpress_social_url'.$x, array(
        'settings' => 'cleanpress_social_url'.$x,
        'description' => __('Icon ','cleanpress').$x.__(' Url','cleanpress'),
        'section' => 'cleanpress_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function cleanpress_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'cleanpress_customize_register_social' );