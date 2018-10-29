<nav id="menu" class="panel" role="navigation">
    <a class="panel_hide_button"><i class="fa fa-fw fa-times"></i></a>
    <?php
    // Get the Appropriate Walker First.
    $walker = has_nav_menu('primary') ? new Cleanpress_Menu_With_Icon : '';
    //Display the Menu.
    wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>

</nav><!-- #site-navigation -->