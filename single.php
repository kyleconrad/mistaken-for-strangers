<?php
  $post = $wp_query->post;
  if (in_category('5') && has_tag('other-embed')) {
    include(TEMPLATEPATH.'/single-otherembed.php');
  }
  elseif (in_category('5') && !has_tag('other-embed')) {
    include(TEMPLATEPATH.'/single-latest.php');
  }
  elseif (in_category('8')) {
      include(TEMPLATEPATH.'/single-video.php');
  }
  elseif (has_tag('review')) {
  	include(TEMPLATEPATH.'/single-review.php');
  }
  else {
      include(TEMPLATEPATH.'/single-article.php');
  }
?>