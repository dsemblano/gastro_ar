<?php
function reverie_setup() {
	// Add language supports. Please note that Reverie Framework does not include language files.
	load_theme_textdomain('reverie', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	
	// Thumbnail hard crop para thumbs da home - Onde Ir e Receitas
	// chama com the_post_thumbnail('homepage-thumb')
	add_image_size( 'internas-thumb', 280, 140, true );
	add_image_size( 'homepage-thumb', 250, 260, true );	
	add_image_size( 'homepage-destaques', 200, 120, true );
	add_image_size( 'slider2', 643, 420, true );
	add_image_size( 'category-pages', 200, 135, true );
	add_image_size( 'sidebar-thumb', 65, 50, true );
	
	// set_post_thumbnail_size(150, 150, false);
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation', 'reverie'),
		'utility_navigation' => __('Utility Navigation', 'reverie')
	));	
}
add_action('after_setup_theme', 'reverie_setup');

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="sidebar-section twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

$sidebars = array('OndeIr');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Publicado em %s &agrave;s %s.', 'reverie'), get_the_time('j \d\e F \d\e Y'), get_the_time()) .'</time>';
	echo '<p class="byline author vcard">'. __('Por', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('id')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

/* Customized the output of caption, you can remove the filter to restore back to the WP default output. Courtesy of DevPress. http://devpress.com/blog/captions-in-wordpress/ */
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ' class="figure ' . esc_attr( $attr['align'] ) . '"';

	/* Open the caption <div>. */
	$output = '<figure' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<figcaption>' . $attr['caption'] . '</figcaption>';

	/* Close the caption </div>. */
	$output .= '</figure>';

	/* Return the formatted, clean caption. */
	return $output;
}

// Clean the output of attributes of images in editor. Courtesy of SitePoint. http://www.sitepoint.com/wordpress-change-img-tag-html/
function image_tag_class($class, $id, $align, $size) {
	$align = 'align' . esc_attr($align);
	return $align;
}
add_filter('get_image_tag_class', 'image_tag_class', 0, 4);
function image_tag($html, $id, $alt, $title) {
	return preg_replace(array(
			'/\s+width="\d+"/i',
			'/\s+height="\d+"/i',
			'/alt=""/i'
		),
		array(
			'',
			'',
			'',
			'alt="' . $title . '"'
		),
		$html);
}
add_filter('get_image_tag', 'image_tag', 0, 4);

// img unautop, Courtesy of Interconnectit http://interconnectit.com/2175/how-to-remove-p-tags-from-images-in-wordpress/
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );

// Presstrends
function presstrends() {

// Add your PressTrends and Theme API Keys
$api_key = 'xc11x4vpf17icuwver0bhgbzz4uewlu5ql38';
$auth = 'kw1f8yr8eo1op9c859qcqkm2jjseuj7zp';

// NO NEED TO EDIT BELOW
$data = get_transient( 'presstrends_data' );
if (!$data || $data == ''){
$api_base = 'http://api.presstrends.io/index.php/api/sites/add/auth/';
$url = $api_base . $auth . '/api/' . $api_key . '/';
$data = array();
$count_posts = wp_count_posts();
$count_pages = wp_count_posts('page');
$comments_count = wp_count_comments();
$theme_data = get_theme_data(get_stylesheet_directory() . '/style.css');
$plugin_count = count(get_option('active_plugins'));
$all_plugins = get_plugins();
foreach($all_plugins as $plugin_file => $plugin_data) {
$plugin_name .= $plugin_data['Name'];
$plugin_name .= '&';
}
$data['url'] = stripslashes(str_replace(array('http://', '/', ':' ), '', site_url()));
$data['posts'] = $count_posts->publish;
$data['pages'] = $count_pages->publish;
$data['comments'] = $comments_count->total_comments;
$data['approved'] = $comments_count->approved;
$data['spam'] = $comments_count->spam;
$data['theme_version'] = $theme_data['Version'];
$data['theme_name'] = $theme_data['Name'];
$data['site_name'] = str_replace( ' ', '', get_bloginfo( 'name' ));
$data['plugins'] = $plugin_count;
$data['plugin'] = urlencode($plugin_name);
$data['wpversion'] = get_bloginfo('version');
foreach ( $data as $k => $v ) {
$url .= $k . '/' . $v . '/';
}
$response = wp_remote_get( $url );
set_transient('presstrends_data', $data, 60*60*24);
}}
add_action('admin_init', 'presstrends');

/************************************ CUSTOM CODE GASTROONLINE ************************************/

// FlexSlider
	function my_add_scripts() {
	if(is_home()) {
		wp_enqueue_script('flexslider', get_bloginfo('stylesheet_directory').'/js/jquery.flexslider-min.js', array('jquery'));
		wp_enqueue_script('flexslider-init', get_bloginfo('stylesheet_directory').'/js/flexslider-init.js', array('jquery', 'flexslider'));
		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-init', get_bloginfo('stylesheet_directory').'/js/jquery-ui-init.js', array('jquery-ui-tabs'));
		}
	}
	wp_enqueue_script( 'jquery-ui-slider');
	add_action('wp_enqueue_scripts', 'my_add_scripts');
	

	function my_add_styles() {
	if(is_home()) {
		wp_enqueue_style('flexslider', get_bloginfo('stylesheet_directory').'/css/flexslider.css');
		wp_enqueue_style('jquery-ui', get_bloginfo('stylesheet_directory').'/css/jquery-ui-1.10.3.custom.min.css');
		}
	}
	add_action('wp_enqueue_scripts', 'my_add_styles');
// END FlexSlider

// Limitando palavras/strings do excerpt
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

// Leitura Estimada
function leitura_estimada($mycontent){
	//$mycontent = $post->post_content; // wordpress users only
	$word = str_word_count(strip_tags($mycontent));
	$m = floor($word / 200);
	$s = floor($word % 200 / (200 / 60));
	$est = '<p>Leitura estimada:' . $m . ' minuto' . ($m == 1 ? '' : 's') . ' e ' . $s . ' segundo' . ($s == 1 ? '' : 's') . '</p>';
	return $est;
}

/************************************/
/*	Custom WordPress Login Logo		*/
/************************************/
function login_css() {
	wp_enqueue_style( 'login_css', get_stylesheet_directory_uri() . '/login.css' );
}
add_action('login_head', 'login_css');

/************************************/
/*			Custom Header			*/
/************************************/

$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

/* Tirar link de foto */

add_filter( 'the_content', 'attachment_image_link_remove_filter' );

function attachment_image_link_remove_filter( $content ) {
	$content =
	preg_replace(
	array('{<a(.*?)(wp-att|wp-content/uploads)[^>]*><img}',
	'{ wp-image-[0-9]*" /></a>}'),
	array('<img','" />'),
	$content
	);
	return $content;
 }

?>