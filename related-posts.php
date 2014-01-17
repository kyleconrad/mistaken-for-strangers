<section class="related-posts post-center">
    <h3>Related Articles</h3>

    <?php
    $original_post = $post;
    $tags = wp_get_post_tags($post->ID);
    if($tags)
    {
        $sendTags = array();
        foreach($tags as $tag)
            $sendTags[] = $tag->term_id;

        $args = array(
            'tag__in' => $sendTags,
            'post__not_in' => array($post->ID),
            'showposts' => 5,
            'caller_get_posts' => 1,
        );

        $queryDb = new WP_Query($args);
        if($queryDb->have_posts())
        {
            while ($queryDb->have_posts()) {
                $queryDb->the_post();
                ?>

                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

    			<?php
            }
        }
    }
    $post = $original_post;
    wp_reset_query();
    ?>
</section>