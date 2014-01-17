<?php get_header(); ?>

<section id="main-container" class="djax">
    <header class="center-container">
        <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo("template_url"); ?>/IMG/logo-vertical.svg" class="mainlogo" alt="Mistaken For Stranger" name="Mistaken For Strangers" title="Mistaken For Strangers"></a>
    </header>

    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <header class="single-page-header">
        <h2 class="center-container"><?php the_title(); ?></h2>
    </header>

    <article class="single-page center-container padding-bottom">
        <?php the_content(); ?>
    </article>

    <?php endwhile; ?>
    <?php else: ?>
    <?php endif; ?>

</section>

<?php get_footer(); ?>