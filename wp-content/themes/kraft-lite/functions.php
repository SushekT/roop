<?php
/**
 * SKT kraft functions and definitions
 *
 * @package SKT kraft
 */

// Set the word limit of post content 
if ( ! function_exists( 'kraftlite_content' ) ) {
function kraftlite_content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}
}


/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'kraftlite_setup' ) ) {
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function kraftlite_setup() {
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'kraft-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_image_size('kraft-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kraft-lite' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
}
}
add_action( 'after_setup_theme', 'kraftlite_setup' );


if ( ! function_exists( 'kraftlite_widgets_init' ) ) {
function kraftlite_widgets_init() {	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'kraft-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'kraft-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
}
add_action( 'widgets_init', 'kraftlite_widgets_init' );
}


if ( ! function_exists( 'kraftlite_font_url' ) ) {
function kraftlite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Oswald, trsnalate this to off, do not
		* translate into your own language.
		*/
		$raleway = _x('on','Raleway:on or off','kraft-lite');
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$pt_sans = _x('on','pt_sans:on or off','kraft-lite');
		
		if('off' !== $raleway || 'off' !== $pt_sans){
			$font_family = array();
			
			if('off' !== $raleway){
				$font_family[] = 'Raleway:100,200,300,400,600,700,800,900';
			}
			if('off' !== $pt_sans){
				$font_family[] = 'PT Sans:300,400,600,700';
			}
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}
}

if ( ! function_exists( 'kraftlite_scripts' ) ) {
function kraftlite_scripts() {
	wp_enqueue_style('kraft-lite-font', kraftlite_font_url(), array());
	wp_enqueue_style( 'kraft-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'kraft-lite-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'kraft-lite-nivoslider-style', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'kraft-lite-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'kraft-lite-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'kraft-lite-nivo-script', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'kraft-lite-custom_js', get_template_directory_uri() . '/js/custom.js' );
	wp_enqueue_style( 'kraft-lite-font-awesome-style', get_template_directory_uri()."/css/font-awesome.min.css" );
	wp_enqueue_style( 'kraft-lite-animation-style', get_template_directory_uri()."/css/animation.css" );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
}
add_action( 'wp_enqueue_scripts', 'kraftlite_scripts' );

if ( ! function_exists( 'kraftlite_ie_stylesheet' ) ) {
function kraftlite_ie_stylesheet(){
	global $wp_styles;
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('kraft-lite-ie', get_template_directory_uri().'/css/ie.css', array('kraft-lite-style'));
	$wp_styles->add_data('kraft-lite-ie','conditional','IE');
	}
}
add_action('wp_enqueue_scripts','kraftlite_ie_stylesheet');

if ( ! function_exists( 'kraftlite_pagination' ) ) {
function kraftlite_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}
}


define('SKT_URL','https://www.sktthemes.org');
define('SKT_THEME_URL','https://www.sktthemes.org/themes');
define('SKT_THEME_URL_DIRECT','https://www.sktthemes.org/shop/premium-wordpress-theme/');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/skt-kraft-doc/');
define('SKT_PRO_THEME_URL','https://www.sktthemes.org/shop/premium-wordpress-theme/');
define('SKT_PRO_FONT_AWESOME_URL','http://fortawesome.github.io/Font-Awesome/icons/');


if ( ! function_exists( 'kraftlite_credit' ) ) {
function kraftlite_credit(){
		return "SKT Kraft Lite";
}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


if ( ! function_exists( 'kraftlite_custom_blogpost_pagination' ) ) {
function kraftlite_custom_blogpost_pagination( $wp_query ){
	$big = 999999999; // need an unlikely integer
	if ( get_query_var('paged') ) { $pageVar = 'paged'; }
	elseif ( get_query_var('page') ) { $pageVar = 'page'; }
	else { $pageVar = 'paged'; }
	$pagin = paginate_links( array(
		'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' 		=> '?'.$pageVar.'=%#%',
		'current' 		=> max( 1, get_query_var($pageVar) ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_text'		=> '&laquo; Prev',
		'next_text' 	=> 'Next &raquo;',
		'type'  => 'array'
	) ); 
	if( is_array($pagin) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $pagin as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	} 
}
}


class Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		
		$menu_icon = strstr($class_names, ' ', true);
		$icon_check = strrchr($menu_icon,"fa-");
		$icon_class = '';
		if(!empty($icon_check)){
		$class_names = str_replace($menu_icon, '', $class_names);
		$icon_class = ' class="fa '.$menu_icon.'"';
		}
		
		
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
		
		if ( has_nav_menu( 'primary' ) ) {
		$item_output = $args->before;
		$item_output .= '<a'. $attributes . '><i '.$icon_class.'></i>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<span>' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}

// get slug by id
if ( ! function_exists( 'kraftlite_get_slug_by_id' ) ) {
function kraftlite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}
}