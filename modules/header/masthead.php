<header id="masthead" class="site-header" role="banner">
        <div id="topbar">
            <div class="container section-inner">

                <div class="site-branding col-md-6 col-sm-6 col-xs-12">
                    <?php if ( has_custom_logo() ) : ?>
                        <div id="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php endif; ?>
                    <div id="text-title-desc">
                        <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>
                </div>

                <div id="menu-search-wrapper" class="col-md-6 col-sm-6 col-xs-12">
                    <div class="top-search-icon">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="side-menu">
                        <a href="#menu" class="menu-link"> &#9776;</a>
                    </div>
                    <?php get_template_part('modules/navigation/menu', 'primary'); ?>
                </div>

            </div>
        </div>

    <div class="container section-inner header-content">

        <div class="header-text title-font container">
            <?php if ( ( get_theme_mod( 'cleanpress_header_text' ) != '' ) && is_front_page() ) { ?>
                <span class="header_text_title"><?php echo esc_html( get_theme_mod('cleanpress_header_text') ); ?></span>
                <span class="header_text_desc"><?php echo esc_html( get_theme_mod('cleanpress_header_text_desc') ); ?></span>
            <?php } ?>

            <?php if ( get_theme_mod('cleanpress_header_cta_enable') && is_front_page() ) { ?>
                <div class="header-cta">
                    <a href="<?php echo esc_url(get_theme_mod('cleanpress_header_cta_url', '')); ?>"><?php echo esc_html( get_theme_mod( 'cleanpress_header_cta', '' ) ); ?></a>
                </div>
            <?php } ?>
        </div>


    </div>

</header><!-- #masthead -->