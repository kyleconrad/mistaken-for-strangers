<?php get_header(); ?>

<section id="main-container" class="djax">
    <header class="center-container">
        <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo("template_url"); ?>/IMG/logo-vertical.svg" class="mainlogo" alt="<?php bloginfo('name'); ?>" name="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"></a>
    </header>

    <header class="single-page-header btm-margin">
        <h2 class="center-container">Search Results For <?php the_search_query(); ?></h2>
    </header>

    <section class="post-listing center-container padding-bottom">
        <div class="center-post-box search-results">

        	<?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

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

            <?php endwhile; ?>

        </div>

        <div class="page-links">
            <span class="left">
                <?php previous_posts_link('Newer Articles'); ?>
            </span>
            <span class="right">
                <?php next_posts_link('Older Articles'); ?>
            </span>
        </div>

        <?php else: ?>

        <p>Sorry, we don't seem to have any articles about <em><?php the_search_query(); ?></em>. We should probably get on that. Until we do, you should head <a href="<?php bloginfo('url');?>">home</a> and read some articles that we have written.</p>

        <?php endif; ?>
    </section>

</section>

<?php get_footer(); ?>