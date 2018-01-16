<div id="slickmenu"></div>
<nav id="top-navigation" class="secondary-navigation title-font" role="navigation">
            <?php
            // Get the Appropriate Walker First.
            $walker = has_nav_menu('top') ? new Cleanpress_Menu_With_Icon : '';
            //Display the Menu.
            wp_nav_menu( array( 'theme_location' => 'top', 'walker' => $walker ) ); ?>
</nav><!-- #site-navigation -->