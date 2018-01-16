<header id="masthead" class="site-header" role="banner">
    <div class="container">
        <div class="site-branding col-md-5 col-sm-5 col-xs-12">
            <?php if ( has_custom_logo() ) : ?>
                <div class="cleanpress-logo">
                <div id="site-logo">
                    <?php the_custom_logo(); ?>
                </div>
                </div>
            <?php endif; ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div>

        <div id="social-icons"class="col-md-7 col-sm-7 col-xs-12">
            <?php get_template_part('modules/social/social', 'fa'); ?>
        </div>
    </div>

</header><!-- #masthead -->