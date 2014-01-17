<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- All coding, design, ideas, fantastical inventions, etc. etc. copyright 2012 Kyle Conrad -->
    <!-- Contact: kyle@kyleconrad.com -->

    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="viewport" id="vp" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="apple-mobile-web-app-capable" content="yes" >
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" href="<?php bloginfo('url');?>/iphoneLowRes.png" />
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)" href="<?php bloginfo('url');?>/iphoneRetina.png" />
    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="<?php bloginfo('url');?>/iphone5Retina.png" />

    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)" href="<?php bloginfo('url');?>/ipadLandscape.png" />
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)" href="<?php bloginfo('url');?>/ipadPortrait.png" />
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" href="<?php bloginfo('url');?>/ipadLandscapeRetina.png" />
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" href="<?php bloginfo('url');?>/ipadPortraitRetina.png" />

    <title><?php bloginfo('name'); ?> &nbsp;&#xd7;&nbsp; <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>

    <?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif; ?>

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo('url');?>/touch-icon-57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('url');?>/touch-icon-114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('url');?>/touch-icon-72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('url');?>/touch-icon-144.png" />

    <link rel="icon" href="<?php bloginfo('url');?>/fav16.png" sizes="16x16" type="image/png">
    <link rel="icon" href="<?php bloginfo('url');?>/fav32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="<?php bloginfo('url');?>/fav48.png" sizes="48x48" type="image/png">
    <link rel="icon" href="<?php bloginfo('url');?>/fav64.png" sizes="64x64" type="image/png">
    <link rel="icon" href="<?php bloginfo('url');?>/fav128.png" sizes="128x128" type="image/png">

    <link rel="icon" href="<?php bloginfo('url');?>/fav32.png">
    <!--[if IE]><link rel="shortcut icon" href="<?php bloginfo('url');?>/favicon.ico"><![endif]-->

    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="<?php bloginfo('url');?>/fav144.png">

    <?php if (is_single()) { ?>
    <meta itemprop="name" content="<?php wp_title(); ?>" />
    <meta itemprop="description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
    <meta itemprop="image" content="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'social-thumb', true); echo $image_url[0];  ?>" />
    <?php } else { ?>
    <meta itemprop="name" content="<?php wp_title(); ?>" />
    <meta itemprop="description" content="<?php bloginfo('description'); ?>" />
    <meta itemprop="image" content="<?php bloginfo('url');?>/social.png" />
    <?php } ?>

    <?php if (is_single()) { ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@mfstrangers">
    <meta name="twitter:creator" content="<?php the_author_meta('twitter' );?>">
    <meta name="twitter:title" content="<?php wp_title(); ?>">
    <meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>">
    <meta name="twitter:image" content="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'front-image', true); echo $image_url[0];  ?>">
    <?php } else { ?>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@mfstrangers">
    <meta name="twitter:title" content="<?php wp_title(); ?>">
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
    <?php } ?>

    <meta property="fb:admins" content="6203120" />
    <?php if (is_single()) { ?>
    <meta property="og:url" content="<?php the_permalink() ?>"/>
    <meta property="og:title" content="<?php wp_title(); ?>" />
    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'social-thumb', true); echo $image_url[0];  ?>" />
    <?php } else { ?>
    <meta property="og:title" content="<?php wp_title(); ?>" />
    <meta property="og:url" content="<?php bloginfo('url');?>"/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php bloginfo('url');?>/social.png" />
    <?php } ?>

    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_head(); ?>

    <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/JS/djax.js"></script>
    <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/JS/fastclick.js"></script>
    <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/JS/touchswipe.js"></script>
    <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/JS/equalheights.js"></script>
    <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/JS/fitvids.js"></script>

    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js"></script>
		<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/JS/html5shiv.js"></script>
        <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/JS/modernizr.js"></script>
        <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/JS/selectivizr.js"></script>
	<![endif]-->
    <!--[if gte IE 9]>
        <style type="text/css">
            .gradient {
                filter: none;
            }
        </style>
    <![endif]-->

    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-26457060-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
    <script type="text/javascript">
      var GoSquared = {};
      GoSquared.acct = "GSN-026401-K";
      (function(w){
        function gs(){
          w._gstc_lt = +new Date;
          var d = document, g = d.createElement("script");
          g.type = "text/javascript";
          g.src = "//d1l6p2sc9645hc.cloudfront.net/tracker.js";
          var s = d.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(g, s);
        }
        w.addEventListener ?
          w.addEventListener("load", gs, false) :
          w.attachEvent("onload", gs);
      })(window);
    </script>
</head>

<body>
<div id="overall-body">