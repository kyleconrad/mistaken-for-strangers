<?php
// GET CORRECT JQUERY
if( !is_admin() ){
  wp_deregister_script('jquery');
  wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"), false, '');
  wp_enqueue_script('jquery');
}

// IMPROVED EXCERPTS
function improved_trim_excerpt($text) {
  global $post;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace('\]\]\>', ']]&gt;', $text);
$text = strip_tags($text, '<p>');
    $excerpt_length = 55;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words)> $excerpt_length) {
      array_pop($words);
      array_push($words, '[...]');
      $text = implode(' ', $words);
    }
  }
return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

function replace_ellipsis($text) {
	$return = str_replace('[...]', '', $text);
	return $return;
}
add_filter('get_the_excerpt', 'replace_ellipsis');


// BETTER SLUG
function the_slug() {
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug;
}


// IMAGE SIZES
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
	set_post_thumbnail_size( 100, 100, true );
	add_image_size( 'alsolike-thumb', 290, 110, true );
  add_image_size( 'social-thumb', 400, 400, true );
	add_image_size( 'front-image', 595, 300, true );
	add_image_size( 'banner-image', 1300, 600, true );
}


// SEARCH RETURNS ONLY POSTS
function SearchFilter($query) {
  if ($query->is_search) {
    $query->set('post_type', array('post'));
  }
  return $query;
}
add_filter('pre_get_posts','SearchFilter');


// EDITING TINYMCE
function make_mce_awesome( $init ) {
  $init['theme_advanced_blockformats'] = 'h3, p';
  $init['theme_advanced_disable'] = 'underline,spellchecker,wp_help';
  $init['theme_advanced_buttons2_add'] = 'styleselect';
  $init['theme_advanced_styles'] = "AlignLeft=alignleft,AlignCenter=aligncenter,AlignRight=alignright,LargeType=large-type";
    return $init;
}

add_filter('tiny_mce_before_init', 'make_mce_awesome');


// ADD HR
function enable_more_buttons($buttons) {
  $buttons[] = 'hr';
  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");


// REMOVE INLINE HEIGHT AND WIDTH
function remove_thumbnail_dimensions( $html ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );


// ADD CUSTOM MENUS
function register_my_menus() {
  register_nav_menus(
    array(
      'main-nav' => __( 'Main Menu' ),
      'sidebar-page-nav' => __( 'Lower Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// CORRECT DISQUS COMMENT COUNTS
remove_filter('comments_number', 'dsq_comments_text');
remove_filter('get_comments_number', 'dsq_comments_number');
remove_action('loop_end', 'dsq_loop_end');

?>