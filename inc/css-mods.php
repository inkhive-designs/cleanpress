<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function cleanpress_custom_css_mods() {

	$custom_css = "";

    //If Highlighting Nav active item is disabled
	if ( get_theme_mod('cleanpress_disable_active_nav') ) :
		$custom_css .= "#site-navigation ul .current_page_item > a, #site-navigation ul .current-menu-item > a, #site-navigation ul .current_page_ancestor > a { border:none; background: inherit; }"; 
	endif;

	if ( get_background_color() ) {
		$custom_css .= "#social-search .searchform:before { border-left-color: #".get_background_color()." }";
		$custom_css .= "#social-search .searchform, #social-search .searchform:after { background: #".get_background_color()." }";
	}
	
	if ( get_theme_mod('cleanpress_title_font','HIND') ) :
		$custom_css .= ".title-font, h1, h2 { font-family: ".esc_html(get_theme_mod('cleanpress_title_font'))."; }";
	endif;
	
	if ( get_theme_mod('cleanpress_body_font','Open Sans') ) :
		$custom_css .= "body { font-family: ".esc_html(get_theme_mod('cleanpress_body_font'))."; }";
	endif;
	
	if ( get_header_textcolor() ) :
		$custom_css .= "#masthead h1.site-title a { color: #".get_header_textcolor()."; }";
	endif;
	
	
	if ( get_theme_mod('cleanpress_header_desccolor','#78899b') ) :
		$custom_css .= "#masthead h2.site-description { color: ".esc_html(get_theme_mod('cleanpress_header_desccolor','#78899b'))."; }";
	endif;
	
	
	if ( !display_header_text() ) :
		$custom_css .= "#masthead .site-branding #text-title-desc { display: none; }";
	endif;

    // page & post fontsize
    if(get_theme_mod('cleanpress_content_page_post_fontsize_set')):
        $val = get_theme_mod('cleanpress_content_page_post_fontsize_set');
        if($val=='small'):
            $custom_css .= "#primary-mono .entry-content{ font-size:12px;}";
        elseif ($val=='medium'):
            $custom_css .= "#primary-mono .entry-content{ font-size:16px;}";
        elseif ($val=='large'):
            $custom_css .= "#primary-mono .entry-content{ font-size:18px;}";
        elseif ($val=='extra-large'):
            $custom_css .= "#primary-mono .entry-content{ font-size:20px;}";
        endif;
    else:
        $custom_css .= "#primary-mono .entry-content{ font-size:14px;}";
    endif;

	wp_add_inline_style( 'cleanpress-main-theme-style', wp_strip_all_tags($custom_css) );


	
}

add_action('wp_enqueue_scripts', 'cleanpress_custom_css_mods');