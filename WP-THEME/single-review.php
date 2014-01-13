<?php
/*
Single Post Template: Review Template
Description: Review template, including rating out of 10, cover, publisher info, and year released. For use in Music, Gaming, and Film/TV categories.
*/
?>


<?php get_header(); ?>


<section id="main-container" class="djax padding-bottom">
    <header class="center-container">
        <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo("template_url"); ?>/IMG/logo-vertical.svg" class="mainlogo" alt="<?php bloginfo('name'); ?>" name="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"></a>
    </header>

    <article class="post single-post review-post">

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

        <header class="columns-center" style="background-image:url('<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'banner-image', true); echo $image_url[0];  ?>');">
            <span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>

            <span class="post-info">
                <h2><?php the_title(); ?></h2>

                <div class="post-details">
                    <?php the_time('F j, Y') ?> <span class="bullet">&bull;</span> <?php the_author_posts_link() ?>
                </div>
            </span>

            <span class="gradient-overlay gradient"></span>
        </header>

        <div class="columns-center">
            <div class="review-detail">
                <div class="rating">
                    <?php echo get_post_meta($post->ID, 'rating', true); ?>
                </div>
                <img src="<?php echo get_post_meta($post->ID, 'albumcover', true); ?>">
            </div>

            <?php the_content(''); ?>

            <div class="publish-detail">
                <span class="publish-text">
                    <span class="publish-info"><?php echo get_post_meta($post->ID, 'album_title', true); ?></span> <span class="bullet">&bull;</span> <span class="publish-info"><?php echo get_post_meta($post->ID, 'record_label', true); ?></span> <span class="bullet">&bull;</span> <span class="publish-info"><?php echo get_post_meta($post->ID, 'release_year', true); ?></span>
                </span>
            </div>
        </div>

    </article>

    <section class="comments post-center">
        <h3>There <?php comments_number( 'are 0 comments', 'is 1 comment', 'are % comments' ); ?></h3>

        <?php comments_template(); ?>
    </section>

    <?php endwhile; ?>
    <?php else: ?>
    <?php endif; ?>

    <?php include (TEMPLATEPATH . '/related-posts.php'); ?>

</section>


<?php get_footer(); ?>