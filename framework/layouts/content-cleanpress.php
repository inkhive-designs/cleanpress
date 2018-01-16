<?php
/**
 * @package Cleanpress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cleanpress col-md-6 col-sm-6 col-xs-12'); ?>>

    <div class="wrapper">
        <div class="featured-thumb col-md-12 col-sm-12">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('cleanpress-layout-thumb', array( 'alt' => trim(strip_tags( $post->post_title )))); ?></a>
            <?php else: ?>
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder.png"; ?>" alt="<?php the_title(); ?>"></a>
            <?php endif; ?>
            <div class="postedon"><i class="fa fa-calendar"></i><?php cleanpress_posted_on_date(); ?></div><div class="clearfix"></div>
            <div class="postedby"><i class="fa fa-user"></i><?php the_author(); ?></div>
        </div><!--.featured-thumb-->

        <div class="out-thumb col-md-12 col-sm-12">
            <header class="entry-header">
                <h3 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            </header><!-- .entry-header -->
            <div class="entry-excerpt">
                <?php echo the_excerpt(); ?>
            </div>
        </div>
    </div>



		
</article><!-- #post-## -->