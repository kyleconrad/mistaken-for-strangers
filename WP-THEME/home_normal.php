<?php get_header(); ?>


<section id="main-container" class="djax">
    <header class="center-container">
        <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo("template_url"); ?>/IMG/logo-vertical.svg" class="mainlogo" alt="<?php bloginfo('name'); ?>" name="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"></a>
    </header>

    <section class="post-listing padding-bottom">

        <?php $do_not_duplicate = array(); ?>
        <?php //query_posts('posts_per_page=1&cat=-8'); ?>

        <?php //if (have_posts()) : while (have_posts()) : the_post(); $do_not_duplicate[] = $post->ID; ?>

        <?php
            $num = 1;
            $newsposts = array();
            $sticky=get_option('sticky_posts');
            $args = array(
                'category__not_in' => 8,
                'post__in' => $sticky,
                'posts_per_page' => 1
            );
            $sticky_posts = get_posts($args);

            if( count($sticky_posts) < $num) {
                $extras = $num - count($sticky_posts);
                $args= array(
                    'category__not_in' => 8,
                    'post__not_in' => $sticky,
                    'showposts' => 1
            );
            $extra_posts = get_posts($args);
            $newsposts = array_merge($sticky_posts, $extra_posts);

        }
        else $newsposts = $sticky_posts;?>
        <?php $posts = $newsposts; ?>
        <?php if( $posts ) : ?>
        <?php foreach( $posts as $post ) : setup_postdata( $post ); $do_not_duplicate[] = $post->ID; ?>

        <article class="post firstpost">
            <div class="post-info center-container">
                <header>
                    <span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </header>
                <span class="post-more">
                    <div class="post-details">
                        <?php the_time('F j, Y') ?> <span class="bullet">&bull;</span> <?php the_author_posts_link() ?>
                    </div>
                    <span class="excerpt"><?php echo get_the_excerpt(); ?></span>
                    <div class="post-link">
                        <a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
                    </div>
                </span>
            </div>

            <span class="gradient-overlay gradient"></span>

            <a href="<?php the_permalink(); ?>" class="post-image" style="background-image:url('<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'banner-image', true); echo $image_url[0];  ?>');"></a>
        </article>

        <?php //endwhile; endif; wp_reset_query(); ?>
        <?php endforeach; ?>
        <?php endif; ?>


        <div class="center-container">
            <div class="center-post-box center-column">

                <?php query_posts(array(
                    'posts_per_page'=>5,
                    'post__not_in' => array_merge($do_not_duplicate, get_option( 'sticky_posts' )),
                    )
                ); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); $do_not_duplicate[] = $post->ID; ?>

                <article class="post center-post">
                    <header>
                        <span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>

                    <div class="post-details">
                        <?php the_time('F j, Y') ?>
                    </div>
                    <span class="bullet">&bull;</span>
                    <span class="excerpt"><?php echo get_the_excerpt(); ?></span>
                </article>

                <?php endwhile; endif; wp_reset_query(); ?>


                <div class="center-sidebar center-column">

                    <div class="sidebar-title-wrapper">
                        <span class="category">Featured Tracks</span>
                    </div>

                    <?php query_posts('posts_per_page=2&cat=5&tag=featured'); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article class="post center-sidebar-post">
                        <header>
                            <a href="<?php the_permalink(); ?>" class="post-image" style="background-image:url('<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'front-image', true); echo $image_url[0];  ?>');"></a>

                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </header>

                        <div class="post-details">
                            <?php the_time('F j, Y') ?>
                        </div>
                        <span class="excerpt"><?php echo get_the_excerpt(); ?></span>
                    </article>

                    <?php endwhile; endif; wp_reset_query(); ?>

                </div>

            </div>

            <div class="post front-video-post">
                <?php query_posts('posts_per_page=1&cat=8'); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <span class="category">Latest Video</span>

                <div class="video">
                    <?php echo get_post_meta($post->ID, 'video_embed_code', true); ?>
                </div>

                <header>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </header>

                <div class="post-details">
                    <?php the_time('F j, Y') ?>
                </div>
                <span class="excerpt"><?php echo get_the_excerpt(); ?></span>
                <div class="post-link">
                    <a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
                </div>

                <?php endwhile; endif; wp_reset_query(); ?>
            </div>

            <div class="bottom-post-box">

                <?php query_posts(array(
                    'posts_per_page'=>12,
                    'post__not_in' => array_merge($do_not_duplicate, get_option( 'sticky_posts' )),
                    )
                ); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article class="post bottom-post">
                    <a href="<?php the_permalink(); ?>"><img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'front-image', true); echo $image_url[0];  ?>" alt="<?php the_title(); ?>" class="post-image"></a>

                    <header>
                        <span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>

                    <div class="post-details">
                        <?php the_time('F j, Y') ?>
                    </div>
                </article>

                <?php endwhile; endif; wp_reset_query(); ?>
            </div>
        </div>

        <div class="center-container page-links">
            <span class="left">
                <?php previous_posts_link('Newer Articles'); ?>
            </span>
            <span class="right">
                <?php next_posts_link('Older Articles'); ?>
            </span>
        </div>

    </section>

</section>


<?php get_footer(); ?>