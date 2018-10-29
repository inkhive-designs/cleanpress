<?php if ( get_theme_mod('cleanpress_featposts_enable') == 'enable' ) : ?>

<div class="featposts container-fluid">
	
	<?php //if ( have_posts() ) : ?>
	
				<?php /* Start the Loop */  ?>
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 2,
            'cat'  => esc_html( get_theme_mod('cleanpress_featposts_cat') ),
            //'ignore_sticky_posts' => 1,
        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) :

            $loop->the_post();

            ?>
<!--				--><?php
//	    		$args = array( 'posts_per_page' =>  2, 'category' => esc_html(get_theme_mod('cleanpress_featposts_cat')) );
//				$lastposts = get_posts( $args );
//				foreach ( $lastposts as $post ) : ?>

                <?php global $post; ?>
				<div class="item col-md-6 col-sm-6 col-xs-12">
					<div class="item-container">
							<?php if (has_post_thumbnail()) : ?>	
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('cleanpress-fp-thumb', array(  'alt' => trim(strip_tags( $post->post_title )))); ?></a>
							<?php else : ?>
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder.png"; ?>" alt="<?php the_title(); ?>"></a>
	
							<?php endif; ?>
                        <div class="post-title-parent">
                            <a class="post-title" href="<?php the_permalink() ?>"><?php echo the_title(); ?></a>
                            <div class="cat"><?php the_category(); ?></div>
                        </div>
					</div>		

				</div><!-- #post-## -->

        <?php endwhile; ?>
    <!--				--><?php wp_reset_postdata(); ?>
        <?php endif; ?>
	

</div>

<?php endif; ?>