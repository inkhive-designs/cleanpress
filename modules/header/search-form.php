<div id="top-bar">
    <div class="container">
        <div id="top-search-form" class="col-md-12">
            <form role="search" method="get" class="row search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="search-form-top">
                    <label>
                        <span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'cleanpress' ); ?></span>
                        <input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search for anything on this site...', 'placeholder', 'cleanpress' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
                    </label>
                </div>
                <div class="cancel-search"><?php _e('Cancel','cleanpress'); ?></div>
            </form>
        </div>
        <div class="top-menu col-md-10 col-sm-10 col-xs-10">
            <?php get_template_part('modules/navigation/menu','top'); ?>
        </div>

        <div class="top-search-icon col-md-2 col-sm-2 col-xs-2">
            <i class="fa fa-search"></i>
        </div>
    </div>
</div><!--#top-bar-->