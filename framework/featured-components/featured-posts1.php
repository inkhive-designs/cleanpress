<?php if ( get_theme_mod('cleanpress_featposts1_enable') == 'enable' && is_front_page() ) : ?>

    <div class="featposts1 container-fluid">

            <?php /* Start the Loop */  ?>
            <?php
            $args = array( 'posts_per_page' =>  3, 'category' => esc_html(get_theme_mod('cleanpress_featposts1_cat')) );
            $the_query = new WP_Query( $args );
            while ( $the_query->have_posts() ) :
                $the_query->the_post(); ?>

                <div class="item col-md-4 col-sm-4 col-xs-12">
                    <div class="item-container">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('cleanpress-thumb', array(  'alt' => trim(strip_tags( $post->post_title )))); ?></a>
                        <?php else : ?>
                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder.png"; ?>" alt="<?php the_title(); ?>"></a>

                        <?php endif; ?>
                        <div class="post-title-parent">
                            <a class="post-title" href="<?php the_permalink() ?>"><?php echo the_title(); ?></a>
                            <div class="cat"><?php the_category(); ?></div>
                        </div>
                    </div>


                </div><!-- #post-## -->

            <?php endwhile;
            wp_reset_postdata(); ?>

    </div>

<?php endif; ?>