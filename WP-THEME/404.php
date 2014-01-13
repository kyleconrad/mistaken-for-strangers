<?php get_header(); ?>

<section id="main-container" class="djax">
    <header class="center-container">
        <a href="<?php bloginfo('url');?>"><img src="<?php bloginfo("template_url"); ?>/IMG/logo-vertical.svg" class="mainlogo" alt="Mistaken For Strangers" name="Mistaken For Strangers" title="Mistaken For Strangers"></a>
    </header>

    <?
    	$num = Rand (1,3);
    	switch ($num) {
     		case 1:
     		include '404-kanye.php';
     		break;

     		case 2:
     		include '404-daftpunk.php';
     		break;

     		case 3:
     		include '404-ironman.php';
    }
    ?>

</section>

<?php get_footer(); ?>