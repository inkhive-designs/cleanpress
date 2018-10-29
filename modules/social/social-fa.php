<?php
/*
** Template to Render Social Icons on Top Bar
*/
?>
<div id="social-icons" class="col-md-12 col-sm-12 col-xs-12">
    <?php
    for ($i = 1; $i < 8; $i++) :
        $social = esc_html(get_theme_mod('cleanpress_social_'.$i));
        if ( ($social != 'none') && ($social != '' ) ) : ?>
            <a class="" href="<?php echo esc_url( get_theme_mod('cleanpress_social_url'.$i) ); ?>">
                <i class="fa fa-fw fa-<?php echo $social; ?>"></i>
            </a>
        <?php endif;

    endfor; ?>
</div>
