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

        <hr class="striped">

        <h3>Editors</h3>
        <?php
        $display_admins = false;
        $order_by = 'display_name'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
        $role = 'editor'; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
        $hide_empty = true; // hides authors with zero posts

        if(!empty($display_admins)) {
            $blogusers = get_users('orderby='.$order_by.'&role='.$role);
        } else {
            $admins = get_users('role=administrator');
            $exclude = array();
            foreach($admins as $ad) {
                $exclude[] = $ad->ID;
            }
            $exclude = implode(',', $exclude);
            $blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&role='.$role);
        }
        $authors = array();
        foreach ($blogusers as $bloguser) {
            $user = get_userdata($bloguser->ID);
            if(!empty($hide_empty)) {
                $numposts = count_user_posts($user->ID);
                if($numposts < 1) continue;
            }
            $authors[] = (array) $user;
        }

        foreach($authors as $author) {
            $display_name = $author['data']->display_name;
            $author_profile_url = get_author_posts_url($author['ID']);
            $description = get_userdata($author['ID'])->user_description;

            echo '<p><a href="', $author_profile_url, '">', $display_name, '</a> ', $description,'</p>';
        }
        ?>

        <hr>

        <h3>Contributors</h3>
        <?php
        $display_admins = false;
        $order_by = 'display_name'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
        $role = 'author'; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
        $hide_empty = true; // hides authors with zero posts

        if(!empty($display_admins)) {
            $blogusers = get_users('orderby='.$order_by.'&role='.$role);
        } else {
            $admins = get_users('role=administrator');
            $exclude = array();
            foreach($admins as $ad) {
                $exclude[] = $ad->ID;
            }
            $exclude = implode(',', $exclude);
            $blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&role='.$role);
        }
        $authors = array();
        foreach ($blogusers as $bloguser) {
            $user = get_userdata($bloguser->ID);
            if(!empty($hide_empty)) {
                $numposts = count_user_posts($user->ID);
                if($numposts < 1) continue;
            }
            $authors[] = (array) $user;
        }

        foreach($authors as $author) {
            $display_name = $author['data']->display_name;
            $author_profile_url = get_author_posts_url($author['ID']);
            $description = get_userdata($author['ID'])->user_description;

            echo '<p><a href="', $author_profile_url, '">', $display_name, '</a> ', $description,'</p>';
        }
        ?>

    </article>

    <?php endwhile; ?>
    <?php else: ?>
    <?php endif; ?>

</section>

<?php get_footer(); ?>