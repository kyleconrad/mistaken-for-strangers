<?php get_header(); ?>


<section id="main-container" class="djax padding-bottom">
    <header class="center-container">
        <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo("template_url"); ?>/IMG/logo-vertical.svg" class="mainlogo" alt="<?php bloginfo('name'); ?>" name="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"></a>
    </header>

    <article class="post single-post video-post">

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

        <div class="video-main center-container">
            <?php echo get_post_meta($post->ID, 'video_embed_code', true); ?>
        </div>

        <header class="center-container">
            <span class="category"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>

            <h2><?php the_title(); ?></h2>

            <div class="post-details">
                <?php the_time('F j, Y') ?> <span class="bullet">&bull;</span> <?php the_author_posts_link() ?>
            </div>
        </header>

        <div class="post-center">
            <hr>

            <?php the_content(''); ?>
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