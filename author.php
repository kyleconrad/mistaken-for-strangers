<?php get_header(); ?>


<section id="main-container" class="djax">
    <?php
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <header class="center-container">
        <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo("template_url"); ?>/IMG/logo-vertical.svg" class="mainlogo" alt="<?php bloginfo('name'); ?>" name="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"></a>
    </header>

    <header class="single-page-header btm-margin">
        <h2 class="center-container">Articles By <?php echo $curauth->display_name; ?></h2>
    </header>

    <section class="post-listing padding-bottom">

            <?php if (have_posts()) : ?>
            <?php $count = 0; ?>
            <?php while (have_posts()) : the_post(); ?>
            <?php $count++; ?>

            <?php if ($count == 1) : ?>
            <div class="center-container">
                <div class="center-post-box center-column">

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

                    <?php elseif ($count > 1 && $count < 6) : ?>

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

                    <?php elseif ($count == 6) : ?>

                    <div class="center-sidebar center-column">

                        <article class="post center-sidebar-post">
                            <header>
                                <span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>

                                <a href="<?php the_permalink(); ?>" class="post-image" style="background-image:url('<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'front-image', true); echo $image_url[0];  ?>');"></a>

                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>

                            <div class="post-details">
                                <?php the_time('F j, Y') ?>
                            </div>
                            <span class="excerpt"><?php echo get_the_excerpt(); ?></span>
                        </article>

                    <?php elseif ($count == 7) : ?>

                        <article class="post center-sidebar-post">
                            <header>
                                <span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>

                                <a href="<?php the_permalink(); ?>" class="post-image" style="background-image:url('<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'front-image', true); echo $image_url[0];  ?>');"></a>

                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>

                            <div class="post-details">
                                <?php the_time('F j, Y') ?>
                            </div>
                            <span class="excerpt"><?php echo get_the_excerpt(); ?></span>
                        </article>

                    </div>

                </div>

                <div class="bottom-post-box">

                    <?php elseif ($count > 7) : ?>

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

                    <?php endif; ?>
                    <?php endwhile; ?>

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

            <?php endif; ?>

    </section>

</section>


<?php get_footer(); ?>