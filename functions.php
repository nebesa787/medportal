<?php
/**
 * Twenty Thirteen functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see https://codex.wordpress.org/Theme_Development
 * and https://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 

function fix_category_pagination($qs){
    if(isset($qs['category_name']) && isset($qs['paged'])){
        $qs['post_type'] = get_post_types($args = array(
            'public'   => true,
            '_builtin' => false
        ));
        array_push($qs['post_type'],'post');
    }
    return $qs;
}
add_filter('request', 'fix_category_pagination'); 
 
add_image_size( 'large-thumb', 700, 380,true );
add_image_size( 'medium-thumb', 330, 220,true );
add_image_size( 'small-thumb', 110, 100,true );



function root_category_id ($catid) {
	while ($catid) {
		$cat = get_category($catid); 
		$catid = $cat->category_parent; 
		$catParent = $cat->cat_ID;
	}

	return $catParent;
}



/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
	// Add new "Locations" taxonomy to Posts
	register_taxonomy('adv', 'post', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'ADV', 'taxonomy general name' ),
			'singular_name' => _x( 'ADV', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search' ),
			'all_items' => __( 'All' ),
			'parent_item' => __( 'Parent' ),
			'parent_item_colon' => __( 'Parent:' ),
			'edit_item' => __( 'Edit' ),
			'update_item' => __( 'Update' ),
			'add_new_item' => __( 'Add New' ),
			'new_item_name' => __( 'New Name' ),
			'menu_name' => __( 'ADV' ),
		),
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'adv', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
add_action( 'init', 'add_custom_taxonomies', 0 );




function register_my_menus(){
	register_nav_menus(array(
		'main-menu'=>'Главное меню',
		'footer-menu'=>'Нижнее меню',
		'meduchregden'=>'Медучреждения',
		'vrachi'=>'Врачи',
		'medenciklo'=>'Мендэнциклопедия'
	));
}
add_action('init','register_my_menus');

/*
 * Set up the content width value based on the theme's design.
 *
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
 
if ( ! isset( $content_width ) )
	$content_width = 604;

/**
 * Add support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Twenty Thirteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

 
function the_content_limit($max_char, $more_link_text = ' ', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);
   if (strlen($_GET['p']) > 0) {
      echo "<p>";
      echo $content;
     // echo "&nbsp;<a href='"; the_permalink(); echo "'>"."Читать полностью</a>";
      echo "</p>";
   }   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "<p>";
        echo $content;
   // echo "&nbsp;<a href='"; the_permalink(); echo "'>"."Читать полностью</a>";
        echo "</p>";
   }   else {
      echo "<p>";
      echo $content;
    //  echo "&nbsp;<a href='"; the_permalink(); echo "'>"."Читать полностью</a>";
      echo "</p>";
   }
}    
 
 
 
 
function twentythirteen_setup() {
	/*
	 * Makes Twenty Thirteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentythirteen', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentythirteen_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );


	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );


	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );
	

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );



function twentythirteen_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentythirteen' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'twentythirteen' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	
	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentythirteen-fonts', twentythirteen_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.03' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_widgets_init() {

	register_sidebar(array(
		'name' 		=> 'Header Banner',
		'id'            => 'header-banner',
		'before_widget' => '<div class="bnr">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));
	
	register_sidebar(array(
		'name' 		=> 'Mobile menu',
		'id'            => 'mobile-menu',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));
	
	register_sidebar(array(
		'name' 		=> 'Top Rotator',
		'id'            => 'top-rotator',
		'before_widget' => '<!--noindex-->
							<div class="b_info ib_wr">',
		'after_widget' 	=> '</div>
							<!--/noindex-->',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));
	
	register_sidebar(array(
		'name' 		=> 'Main Page Banner Right',
		'id'            => 'main-page-banner-right',
		'before_widget' => '<div class="bnr">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));	
	
	register_sidebar(array(
		'name' 		=> 'Subscribers',
		'id'            => 'email-subscribers',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));	
	
	register_sidebar(array(
		'name' 		=> 'Main Page Footer Banner',
		'id'            => 'footer-banner',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));	

	
	
	register_sidebar(array(
		'name' 		=> 'Single Banner',
		'id'            => 'single-banner',
		'before_widget' => '<div class="bnr">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));
	
	register_sidebar(array(
		'name' 		=> 'Footer Copyright',
		'id'            => 'footer-copyright',
		'before_widget' => '<div class="copy">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));
	
	register_sidebar(array(
		'name' 			=> 'Final Code',
        'description' 	=> 'For popups, web-analytics code and etc.',
		'id'            => 'final-code',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));	
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*/
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . esc_html__( 'Sticky', 'twentythirteen' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function twentythirteen_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since Twenty thirteen 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );

function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );

function wp_corenavi() {
  global $wp_query;
  
  //print_R($wp_query->request);
  
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
   $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
  //$a['prev_text'] = '← Предыдущие записи'; //текст ссылки "Предыдущая страница"
   $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"
  //$a['next_text'] = 'Следующие записи →'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="pagination">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}

function dimox_breadcrumbs() {

	 /* === ОПЦИИ === */
	 $text['home'] = 'Главная'; // текст ссылки "Главная"
	 $text['category'] = '%s'; // текст для страницы рубрики
	 $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	 $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
	 $text['author'] = 'Статьи автора %s'; // текст для страницы автора
	 $text['404'] = 'Ошибка 404'; // текст для страницы 404
	 $text['page'] = 'Страница %s'; // текст 'Страница N'
	 $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

	 $delimiter = '›'; // разделитель между "крошками"
	 $delim_before = '<span class="divider">'; // тег перед разделителем
	 $delim_after = '</span>'; // тег после разделителя
	 $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	 $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	 $show_title = 1; // 1 - показывать подсказку (title) для ссылок, 0 - не показывать
	 $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	 $before = '<li>'; // тег перед текущей "крошкой"
	 $after = '</li>'; // тег после текущей "крошки"
	 /* === КОНЕЦ ОПЦИЙ === */

	 global $post;
	 $home_link = home_url('/');
	 $link_before = '<li>';
	 $link_after = '</li>';
	 //$link_attr = ' itemprop="url"';
	 $link_attr = ' ';
	 //$link_in_before = '<span itemprop="title">';
	 $link_in_before = '';
	 //$link_in_after = '</span>';
	 $link_in_after = '';
	 $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	 $frontpage_id = get_option('page_on_front');
	 $parent_id = $post->post_parent;
	 //$delimiter = ' ' . $delim_before . $delimiter . $delim_after . ' ';
	 $delimiter = '';

	 if (is_home() || is_front_page()) {

	 if ($show_on_home == 1) echo '<ul class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></ul>';

	 } else {

	 echo '<ul class="breadcrumbs">';
	 if ($show_home_link == 1) echo sprintf($link, $home_link, $text['home']);

	 if ( is_category() ) {
	 $cat = get_category(get_query_var('cat'), false);
	 if ($cat->parent != 0) {
	 $cats = get_category_parents($cat->parent, TRUE, $delimiter);
	 $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
	 $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
	 if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
	 if ($show_home_link == 1) echo $delimiter;
	 echo $cats;
	 }
	 /*if ( get_query_var('paged') ) {
	 $cat = $cat->cat_ID;
	 echo $delimiter . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $delimiter . $before . sprintf($text['page'], get_query_var('paged')) . $after;
	 } else {*/
	 if ($show_current == 1) echo $delimiter . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
	 //}

	 } elseif ( is_search() ) {
	 if ($show_home_link == 1) echo $delimiter;
	 echo $before . sprintf($text['search'], get_search_query()) . $after;

	 } elseif ( is_day() ) {
	 if ($show_home_link == 1) echo $delimiter;
	 echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
	 echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
	 echo $before . get_the_time('d') . $after;

	 } elseif ( is_month() ) {
	 if ($show_home_link == 1) echo $delimiter;
	 echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
	 echo $before . get_the_time('F') . $after;

	 } elseif ( is_year() ) {
	 if ($show_home_link == 1) echo $delimiter;
	 echo $before . get_the_time('Y') . $after;

	 } elseif ( is_single() && !is_attachment() ) {
	 if ($show_home_link == 1) echo $delimiter;
	 if ( get_post_type() != 'post' ) {
	 $post_type = get_post_type_object(get_post_type());
	 $slug = $post_type->rewrite;
	 printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
	 if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
	 } else {
	 $cat = get_the_category(); $cat = $cat[0];
	 $cats = get_category_parents($cat, TRUE, $delimiter);
	 if ($show_current == 0 || get_query_var('cpage')) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
	 $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
	 if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
	 echo $cats;
	 if ( get_query_var('cpage') ) {
	 echo $delimiter . sprintf($link, get_permalink(), get_the_title()) . $delimiter . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
	 } else {
	 if ($show_current == 1) echo $before . get_the_title() . $after;
	 }
	 }

	 // custom post type
	 } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
	 $post_type = get_post_type_object(get_post_type());
	 /*if ( get_query_var('paged') ) {
	 echo $delimiter . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label)/* . $delimiter . $before . sprintf($text['page'], get_query_var('paged')) . $after;
	 } else {*/
	 if ($show_current == 1) echo $delimiter . $before . $post_type->label . $after;
	 //}

	 } elseif ( is_attachment() ) {
	 if ($show_home_link == 1) echo $delimiter;
	 $parent = get_post($parent_id);
	 $cat = get_the_category($parent->ID); $cat = $cat[0];
	 if ($cat) {
	 $cats = get_category_parents($cat, TRUE, $delimiter);
	 $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
	 if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
	 echo $cats;
	 }
	 printf($link, get_permalink($parent), $parent->post_title);
	 if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

	 } elseif ( is_page() && !$parent_id ) {
	 if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

	 } elseif ( is_page() && $parent_id ) {
	 if ($show_home_link == 1) echo $delimiter;
	 if ($parent_id != $frontpage_id) {
	 $breadcrumbs = array();
	 while ($parent_id) {
	 $page = get_page($parent_id);
	 if ($parent_id != $frontpage_id) {
	 $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
	 }
	 $parent_id = $page->post_parent;
	 }
	 $breadcrumbs = array_reverse($breadcrumbs);
	 for ($i = 0; $i < count($breadcrumbs); $i++) {
	 echo $breadcrumbs[$i];
	 if ($i != count($breadcrumbs)-1) echo $delimiter;
	 }
	 }
	 if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

	 } elseif ( is_tag() ) {
	 if ($show_current == 1) echo $delimiter . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

	 } elseif ( is_author() ) {
	 if ($show_home_link == 1) echo $delimiter;
	 global $author;
	 $author = get_userdata($author);
	 echo $before . sprintf($text['author'], $author->display_name) . $after;

	 } elseif ( is_404() ) {
	 if ($show_home_link == 1) echo $delimiter;
	 echo $before . $text['404'] . $after;

	 } elseif ( has_post_format() && !is_singular() ) {
	 if ($show_home_link == 1) echo $delimiter;
	 echo get_post_format_string( get_post_format() );
	 }

	 echo '</ul><!-- .breadcrumbs -->';

	 }
}

/**
 * Функция для вывода последних комментариев в WordPress.
 * ver: 0.1
 */
function kama_recent_comments( $args = array() ){
	global $wpdb;

	$def = array(
		'limit'      => 4, // сколько комментов выводить.
		'ex'         => 100, // n символов. Обрезка текста комментария.
		'term'       => '', // id категорий/меток. Включить(5,12,35) или исключить(-5,-12,-35) категории. По дефолту - из всех категорий.
		'gravatar'   => '', // Размер иконки в px. Показывать иконку gravatar. '' - не показывать.
		'user'       => '', // id юзеров. Включить(5,12,35) или исключить(-5,-12,-35) комменты юзеров. По дефолту - все юзеры.
		'echo'       => 1,  // выводить на экран (1) или возвращать (0).
		'comm_type'  => '', // название типа коментария
		'meta_query' => '', // WP_Meta_Query
		'meta_key'   => '', // WP_Meta_Query
		'meta_value' => '', // WP_Meta_Query
		'url_patt'   => '', // оптимизация ссылки на коммент. Пр: '%s?all_comments#comment-%d' плейсхолдеры будут заменены на $post->guid и $comment->comment_ID
	);

	$args = wp_parse_args( $args, $def );
	extract( $args );

	$AND = '';

	// ЗАПИСИ
	if( $term ){
		$cats = explode(',', $term );
		$cats = array_map('intval', $cats );

		$CAT_IN = ( $cats[ key($cats) ] > 0 ); // из категорий или нет

		$cats = array_map('absint', $cats ); // убирем минусы
		$AND_term_id = 'AND term_id IN ('. implode(',', $cats) .')';

		$posts_sql = "SELECT object_id FROM $wpdb->term_relationships rel LEFT JOIN $wpdb->term_taxonomy tax ON (rel.term_taxonomy_id = tax.term_taxonomy_id) WHERE 1 $AND_term_id ";

		$AND .= ' AND comment_post_ID '. ($CAT_IN ? 'IN' : 'NOT IN') .' ('. $posts_sql .')';
	}

	// ЮЗЕРЫ
	if( $user ){
		$users = explode(',', $user );
		$users = array_map('intval', $users );

		$USER_IN = ( $users[ key($users) ] > 0 );

		$users = array_map('absint', $users );

		$AND .= ' AND user_id '. ($USER_IN ? 'IN' : 'NOT IN') .' ('. implode(',', $users) .')';
	}

	// WP_Meta_Query
	$META_JOIN = '';
	if( $meta_query || $meta_key || $meta_value ){
		$mq = new WP_Meta_Query( $args );
		$mq->parse_query_vars( $args );
		if( $mq->queries ){
			$mq_sql = $mq->get_sql('comment', $wpdb->comments, 'comment_ID' );
			$META_JOIN = $mq_sql['join'];
			$AND .= $mq_sql['where'];
		}
	}

	$sql = $wpdb->prepare("SELECT * FROM $wpdb->comments LEFT JOIN $wpdb->posts ON (ID = comment_post_ID ) $META_JOIN
	WHERE comment_approved = '1' AND comment_type = %s $AND ORDER BY comment_date DESC LIMIT %d", $comm_type, $limit );

	//die( $sql );
	$results = $wpdb->get_results( $sql );

	if( ! $results ) return 'Комментариев нет.';

	// HTML
	$out = $grava = '';
	foreach ( $results as $comm ){
		if( $gravatar )
			$grava = get_avatar( $comm->comment_author_email, $gravatar );

		$pluso = get_post_rates_like($comm->ID);
		$minuso = get_post_rates_dislike($comm->ID);

		$comtext = strip_tags( $comm->comment_content );
		$com_url = $url_patt ? sprintf( $url_patt, $comm->guid, $comm->comment_ID ) : get_comment_link( $comm->comment_ID );

		$leight = (int) mb_strlen( $comtext );
		if( $leight > $ex )
			$comtext = mb_substr( $comtext, 0, $ex ) .' …';

		/*$out .= '
		<li>
			'. $grava .' <b>'. strip_tags( $comm->comment_author ) .':</b>
			<a href="'. $com_url .'" title="к записи: '. esc_attr( $comm->post_title ) .'">'. $comtext .'</a>
		</li>';
		*/
		print_r('<pre>');
		
		//print_r($comm);
		//print_r($comm->comment_ID );
		print_r('</pre>');
		$com_url = get_post_permalink( $comm->ID ).'#comment-'.$comm->comment_ID;
		$out .= '
		<div class="preview">
			<div class="label">Клиника:</div>
			<div class="p_descr">
				<div class="title"><a href="'. $com_url .'" rel="nofollow">'.$comm->post_title.'</a></div>
				<div class="b_rate">
					<span class="v1">'.$pluso.'<i class="ico"></i></span>
					<span class="v2">'.$minuso.'<i class="ico"></i></span>
				</div>
			</div>
			<div class="label">Отзыв:</div>
			<div class="p_descr">
				<p>'. $comtext .'</p>
			</div>
		</div>';
	}

	if( $echo )
		return print $out;
	return $out;
}


// подкатегории

class Subcategory_Walker_Category extends Walker_Category {
   function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        extract($args);
		global $post;
		
		

        $cat_name = esc_attr( $category->name );
        $cat_name = apply_filters( 'list_cats', $cat_name, $category );
        $link = '<a href="' . esc_url( get_term_link($category) ) . '" ';
        if ( $use_desc_for_title == 0 || empty($category->description) )
            $link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s' ), $cat_name) ) . '"';
        else
            $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
            $link .= '>';
            $link .= $cat_name . '</a>';

        if ( !empty($show_count) )
            $link .= ' (' . intval($category->count) . ')';

                if ( 'list' == $args['style'] ) {
                        $output .= "\t<li";
                        $class = 'cat-item cat-item-' . $category->term_id;
						if (is_single()){
								global $parcat;
								global $catpar;
								global $parcatpar;
								global $medcat;
								
								
								if ($medcat == $category->term_id){
									$class .= ' active';
								}
								
							}

                        $termchildren = get_term_children( $category->term_id, $category->taxonomy );
                        if(count($termchildren)>0){
                            $class .=  ' item-has-children';
							if (is_single()){
								global $parcat;
								global $catpar;
								global $parcatpar;
								global $medcat;
								
								if ((($parcat == $category->term_id)||($catpar == $category->term_id)||($parcatpar == $category->term_id)||($medcat == $category->term_id))){
									$class .= ' current-cat-parent ';
									//$class .= ' current-cat active ';
								}
								
							}
							
                        }

                        if ( !empty($current_category) ) {
                                $_current_category = get_term( $current_category, $category->taxonomy );
                                if ( $category->term_id == $current_category )
                                        $class .=  ' current-cat active';
                                elseif ( $category->term_id == $_current_category->parent )
                                        $class .=  ' current-cat-parent';
                        }
                        $output .=  ' class="' . $class . '"';
                        $output .= ">$link\n";
                } else {
                        $output .= "\t$link<br />\n";
                }
        }
}

/**
 * Обрезка текста (excerpt). Шоткоды вырезаются. Минимальное значение maxchar может быть 22.
 * version 2.2
 *
 * @param  массив/строка $args аргументы. Смотирте переменную $default.
 * @return строка HTML
 */
function kama_excerpt( $args = '' ){
	global $post;

	$default = array(
		'maxchar'     => 350, // количество символов.
		'text'        => '',  // какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
							  // Если есть тег <!--more-->, то maxchar игнорируется и берется все до <!--more--> вместе с HTML
		'save_format' => false, // Сохранять перенос строк или нет. Если в параметр указать теги, то они НЕ будут вырезаться: пр. '<strong>'
		'more_text'   => 'Читать дальше...', // текст ссылки читать дальше
		'echo'        => true, // выводить на экран или возвращать (return) для обработки.
	);

	if( is_array($args) )
		$rgs = $args;
	else
		parse_str( $args, $rgs );

	$args = array_merge( $default, $rgs );

	extract( $args );

	if( ! $text ){
		$text = $post->post_excerpt ? $post->post_excerpt : $post->post_content;

		$text = preg_replace ('~\[[^\]]+\]~', '', $text ); // убираем шоткоды, например:[singlepic id=3]
		// $text = strip_shortcodes( $text ); // или можно так обрезать шоткоды, так будет вырезан шоткод и конструкция текста внутри него
		// и только те шоткоды которые зарегистрированы в WordPress. И эта операция быстрая, но она в десятки раз дольше предыдущей
		// (хотя там очень маленькие цифры в пределах одной секунды на 50000 повторений)

		// для тега <!--more-->
		if( ! $post->post_excerpt && strpos( $post->post_content, '<!--more-->') ){
			preg_match ('~(.*)<!--more-->~s', $text, $match );
			$text = trim( $match[1] );
			$text = str_replace("\r", '', $text );
			$text = preg_replace( "~\n\n+~s", "</p><p>", $text );

			$more_text = $more_text ? '<a class="kexc_moretext" href="'. get_permalink( $post->ID ) .'#more-'. $post->ID .'">'. $more_text .'</a>' : '';

			$text = '<p>'. str_replace( "\n", '<br />', $text ) .' '. $more_text .'</p>';

			if( $echo )
				return print $text;

			return $text;
		}
		elseif( ! $post->post_excerpt )
			$text = strip_tags( $text, $save_format );
	}

	// Обрезаем
	if ( mb_strlen( $text ) > $maxchar ){
		$text = mb_substr( $text, 0, $maxchar );
		$text = preg_replace('@(.*)\s[^\s]*$@s', '\\1 ...', $text ); // убираем последнее слово, оно 99% неполное
	}

	// Сохраняем переносы строк. Упрощенный аналог wpautop()
	if( $save_format ){
		$text = str_replace("\r", '', $text );
		$text = preg_replace("~\n\n+~", "</p><p>", $text );
		$text = "<p>". str_replace ("\n", "<br />", trim( $text ) ) ."</p>";
	}

	//$out = preg_replace('@\*[a-z0-9-_]{0,15}\*@', '', $out); // удалить *some_name-1* - фильтр сммайлов

	if( $echo ) return print $text;

	return $text;
}

function go_doc_prof_filter() { // наша функция
	$args = array(); // подготовим массив
	//$args['meta_query'] = array('relation' => 'OR'); // отношение между условиями, у нас это "И то И это", можно ИЛИ(OR)
	$args['meta_query'] = array('relation' => 'AND');
	global $wp_query; // нужно заглобалить текущую выборку постов

	if ($_POST['doc_qualif'] != '') {
		foreach ($_POST['doc_qualif'] as $doc_qualif) {
			if ($doc_qualif != '') { // если передана фильтрация по разделу
				$args['meta_query'][] = array( // пешем условия в meta_query
					'key' => 'doc_qualif', // название произвольного поля
					'value' => $doc_qualif, // переданное значение произвольного поля
					'type' => 'text' // тип поля, нужно указывать чтобы быстрее работало, у нас здесь число
				);
			}
		}
	}
	if ($_POST['doc_lvl'] != '') {
		foreach ($_POST['doc_lvl'] as $doc_lvl) {
			if ($doc_lvl != '') { // если передана фильтрация по разделу
				$args['meta_query'][] = array( // пешем условия в meta_query
					'key' => 'doc_lvl', // название произвольного поля
					'value' => $doc_lvl, // переданное значение произвольного поля
					'type' => 'text' // тип поля, нужно указывать чтобы быстрее работало, у нас здесь число
				);
			}
		}
	}
	if ($_POST['doc_spc'] != '') {
		foreach ($_POST['doc_spc'] as $doc_spc) {
			if ($doc_spc != '') { // если передана фильтрация по разделу
				$args['meta_query'][] = array( // пешем условия в meta_query
					'key' => 'doc_spc', // название произвольного поля
					'value' => '"'.$doc_spc.'"', // переданное значение произвольного поля
					'type' => 'text', // тип поля, нужно указывать чтобы быстрее работало, у нас здесь число
					'compare' => 'LIKE' // тип сравнения IN, т.е. значения поля комнат должно быть одним из значений элементов массива
				);
			}
		}
	}

	
	if ($_POST['subway'] != '') {
			$address_string =  $_POST['subway'];
			if ($_POST['district'] != '') {
				$address_string .=  ', '.$_POST['district'];
			}
		}elseif (($_POST['district'] != '')&&($_POST['subway'] == '')) {
			$address_string .=  $_POST['district'];
		}else{
			$address_string = ''; 
	}
	
    //var_dump($address_string); exit;
	if ($address_string != '') { // если передана фильтрация по разделу
		$args['meta_query'][] = array( // пешем условия в meta_query
			'key' => 'addreses', // название произвольного поля
			'value' => $address_string, // переданное значение произвольного поля
			'type' => 'text', // тип поля, нужно указывать чтобы быстрее работало, у нас здесь число
			'compare' => 'LIKE' // тип сравнения IN, т.е. значения поля комнат должно быть одним из значений элементов массива
		);
	}

	
	query_posts(array_merge($args,$wp_query->query)); // сшиваем текущие условия выборки стандартного цикла wp с новым массивом переданным из формы и фильтруем
}

function go_med_filter() { 
}

function getfilter_list(){
	$filter_list = array();

	global $wpdb;

	$string_qwer = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE meta_id = 1265 AND meta_key = 'field_568130d936d3f'" );
	$string = $string_qwer[0]->meta_value;
	$decoding = unserialize($string);

	$filter_list['qualif_sort']["label"] = $decoding["label"];
	$filter_list['qualif_sort']["name"] = $decoding["name"];
	$filter_list['qualif_sort']["choices"] = $decoding["choices"];


	$string_qwer = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE meta_id = 1266 AND meta_key = 'field_5681313e36d40'" );
	$string = $string_qwer[0]->meta_value;
	$decoding = unserialize($string);

	$filter_list['level_sort']["label"] = $decoding["label"];
	$filter_list['level_sort']["name"] = $decoding["name"];
	$filter_list['level_sort']["choices"] = $decoding["choices"];


	$string_qwer = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE meta_id = 1267 AND meta_key = 'field_5681318d36d41'" );
	$string = $string_qwer[0]->meta_value;
	$decoding = unserialize($string);

	$filter_list['spec_sort']["label"] = $decoding["label"];
	$filter_list['spec_sort']["name"] = $decoding["name"];
	$filter_list['spec_sort']["choices"] = $decoding["choices"];

	return $filter_list;
}

function getfilter_list_doc_checkbox(){
	$filter_list = array();

	global $wpdb;

	//$string_qwer = $wpdb->get_results( "SELECT DISTINCT meta_value FROM wp_postmeta WHERE meta_key = 'subway'" );
	$string_qwer = $wpdb->get_results( "SELECT DISTINCT meta_value 
										FROM wp_postmeta 
										WHERE meta_key = 'subway_1'
										OR meta_key = 'subway_2'
										OR meta_key = 'subway_3'
										OR meta_key = 'subway_4'
										OR meta_key = 'subway_5'
										OR meta_key = 'subway_6'
										OR meta_key = 'subway_7'
										OR meta_key = 'subway_8'
										OR meta_key = 'subway_9'
										OR meta_key = 'subway_10'
										ORDER BY `wp_postmeta`.`meta_value` ASC
										" );	

	$filter_list['subway']["label"] = 'Метро';
	$filter_list['subway']["name"] = 'subway';
    foreach ($string_qwer as $decoding) {
		$filter_list['subway']["choices"][] = $decoding->meta_value;
	}


	//$string_qwer = $wpdb->get_results( "SELECT DISTINCT meta_value FROM wp_postmeta WHERE meta_key = 'district'" );
	$string_qwer = $wpdb->get_results( "SELECT DISTINCT meta_value FROM wp_postmeta 
										WHERE meta_key = 'district_1'
										OR meta_key = 'district_2'
										OR meta_key = 'district_3'
										OR meta_key = 'district_4'
										OR meta_key = 'district_5'
										OR meta_key = 'district_6'
										OR meta_key = 'district_7'
										OR meta_key = 'district_8'
										OR meta_key = 'district_9'
										OR meta_key = 'district_10'
										
										ORDER BY `wp_postmeta`.`meta_value` ASC
										" );

	$filter_list['district']["label"] = 'Район';
	$filter_list['district']["name"] = 'district';
    foreach ($string_qwer as $decoding) {
		$filter_list['district']["choices"][] = $decoding->meta_value;
	}



	//$string_qwer = $wpdb->get_results( "SELECT DISTINCT * FROM wp_postmeta WHERE meta_key = 'addreses' AND meta_value = ''" );
	$string_qwer = $wpdb->get_results( "SELECT DISTINCT * FROM wp_postmeta WHERE meta_key = 'addreses'" );

	foreach ( $string_qwer as $empty_val ) {
		$job_qwer = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE post_id = ".$empty_val->post_id." AND meta_key = 'doc_job'" );
		$decoding = unserialize($job_qwer[0]->meta_value);
		//print_R("SELECT meta_value FROM wp_postmeta WHERE post_id = ".$empty_val->post_id." AND meta_key = 'doc_job'");
        $places_count = 1;

		foreach ($decoding as $place_to_work) {
			$address_qwer = $wpdb->get_results( "SELECT DISTINCT meta_key, meta_value FROM wp_postmeta 
												 LEFT JOIN wp_posts ON wp_postmeta.post_id = wp_posts.ID 
												 WHERE wp_posts.ID = '".$place_to_work."' 
												 AND (
													   (meta_key = 'subway_1') 
													OR (meta_key = 'subway_2') 
													OR (meta_key = 'subway_3') 
													OR (meta_key = 'subway_4') 
													OR (meta_key = 'subway_5') 
													OR (meta_key = 'subway_6') 
													OR (meta_key = 'subway_7') 
													OR (meta_key = 'subway_8') 
													OR (meta_key = 'subway_9') 
													OR (meta_key = 'subway_10') 
													OR (meta_key = 'district_1')
													OR (meta_key = 'district_2')
													OR (meta_key = 'district_3')
													OR (meta_key = 'district_4')
													OR (meta_key = 'district_5')
													OR (meta_key = 'district_6')
													OR (meta_key = 'district_7')
													OR (meta_key = 'district_8')
													OR (meta_key = 'district_9')
													OR (meta_key = 'district_10')
												) 
												 ORDER BY meta_id" );
			//$city_t = unserialize($address_qwer[0]->meta_value);
			//$city_t = implode(",", $city_t);
			
            if ($places_count == 1) {
				//$writing_string = $address_qwer[0]->meta_value.', '.$address_qwer[1]->meta_value.', '.$address_qwer[02]->meta_value;
				$writing_string = 
								  $address_qwer[0]->meta_value.', '.
								  $address_qwer[1]->meta_value.', '.
								  $address_qwer[2]->meta_value.', '.
								  $address_qwer[3]->meta_value.', '.
								  $address_qwer[4]->meta_value.', '.
								  $address_qwer[5]->meta_value.', '.
								  $address_qwer[6]->meta_value.', '.
								  $address_qwer[7]->meta_value.', '.
								  $address_qwer[8]->meta_value.', '.
								  $address_qwer[9]->meta_value.', '.
								  $address_qwer[10]->meta_value.', '.
								  $address_qwer[11]->meta_value.', '.
								  $address_qwer[12]->meta_value.', '.
								  $address_qwer[13]->meta_value.', '.
								  $address_qwer[14]->meta_value.', '.
								  $address_qwer[15]->meta_value.', '.
								  $address_qwer[16]->meta_value.', '.
								  $address_qwer[17]->meta_value.', '.
								  $address_qwer[18]->meta_value.', '.
								  $address_qwer[19]->meta_value.', '
								  ;
            } else {
            	//$writing_string .= '-|-'.$address_qwer[0]->meta_value.', '.$address_qwer[1]->meta_value.', '.$address_qwer[02]->meta_value;
            	$writing_string .= 
								  $address_qwer[0]->meta_value.', '.
								  $address_qwer[1]->meta_value.', '.
								  $address_qwer[2]->meta_value.', '.
								  $address_qwer[3]->meta_value.', '.
								  $address_qwer[4]->meta_value.', '.
								  $address_qwer[5]->meta_value.', '.
								  $address_qwer[6]->meta_value.', '.
								  $address_qwer[7]->meta_value.', '.
								  $address_qwer[8]->meta_value.', '.
								  $address_qwer[9]->meta_value.', '.
								  $address_qwer[10]->meta_value.', '.
								  $address_qwer[11]->meta_value.', '.
								  $address_qwer[12]->meta_value.', '.
								  $address_qwer[13]->meta_value.', '.
								  $address_qwer[14]->meta_value.', '.
								  $address_qwer[15]->meta_value.', '.
								  $address_qwer[16]->meta_value.', '.
								  $address_qwer[17]->meta_value.', '.
								  $address_qwer[18]->meta_value.', '.
								  $address_qwer[19]->meta_value.', '
								  ;
            }
			$places_count++;
			
			
			
			
			//print_R($address_qwer);
			
		}
		$wpdb->query("UPDATE `wp_postmeta` SET `meta_value`='".$writing_string."' WHERE `post_id` = ".$empty_val->post_id." AND `meta_key` = 'addreses'");
	}

	return $filter_list;
}



function getfilter_list_medcentr_select_city(){
	//подбор города 
	$filter_list = array();
	$list_city = array();
	global $wpdb, $cat;
	
	$this_category = get_category($cat);
	
	$children = get_terms( 
				$this_category->taxonomy, array(
					'parent'    => $this_category->term_id,
					'hide_empty' => false
				) 
			);
	
	if(empty($children)){
		$children = get_terms( 
			$this_category->taxonomy, array(
				'parent'    => $this_category->category_parent,
				'hide_empty' => false
			) 
		);
		$list_city[$this_category->category_parent ] = 'Все города';
	}else{
		$list_city[$this_category->term_id ] = 'Все города';
		$filter_list['service']["main"] = true;
	}
	
	$lebel_ok = false;
	if($children) { 
		foreach ($children as $item){
			if($item->name == 'Минск' ){
				$lebel_ok = true;
				$list_city[$item->term_id] = $item->name;
			}
		}
	}	
		
	if($lebel_ok == true){
		foreach ($children as $item){
			if($item->name != 'Минск' ){
				$list_city[$item->term_id] = $item->name;
			}
		}
		
		$filter_list['service']["label"] = 'Город';
		$filter_list['service']["name"] = 'city_search';
		$filter_list['service']["slug"] = get_category_link( $this_category->term_id );
		$filter_list['service']["choices"] = $list_city;
	}
	
	return $filter_list;
}



function getfilter_list_vrachi_select_city(){
	//подбор города 
	/*$filter_list = array();

	global $wpdb;
	
	$string_qwer = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE meta_id = 60057 AND meta_key = 'field_56a4d3c28d040'" );
	$string = $string_qwer[0]->meta_value;
	$decoding = unserialize($string);

	$filter_list['service']["label"] = $decoding["label"];
	$filter_list['service']["name"] = $decoding["name"];
	$filter_list['service']["choices"] = $decoding["choices"];
	
	
	return $filter_list;
	*/
	$filter_list = array();
	$list_city = array();
	global $wpdb, $cat;
	
	$this_category = get_category($cat);
	
	$children = get_terms( 
				$this_category->taxonomy, array(
					'parent'    => $this_category->term_id,
					'hide_empty' => false
				) 
			);
	
	if(empty($children)){
		$children = get_terms( 
			$this_category->taxonomy, array(
				'parent'    => $this_category->category_parent,
				'hide_empty' => false
			) 
		);
		$list_city[$this_category->category_parent ] = 'Все города';
	}else{
		$list_city[$this_category->term_id ] = 'Все города';
		$filter_list['service']["main"] = true;
	}
	
	$lebel_ok = false;
	if($children) { 
		foreach ($children as $item){
			if($item->name == 'Минск' ){
				$lebel_ok = true;
				$list_city[$item->term_id] = $item->name;
			}
		}
	}	
		
	if($lebel_ok == true){
		foreach ($children as $item){
			if($item->name != 'Минск' ){
				$list_city[$item->term_id] = $item->name;
			}
		}
		
		$filter_list['service']["label"] = 'Город';
		$filter_list['service']["name"] = 'city_search';
		$filter_list['service']["slug"] = get_category_link( $this_category->term_id );
		$filter_list['service']["choices"] = $list_city;
	}
	
	return $filter_list;
	
}




function getfilter_list_med_select(){
	//подбор медцентра
	$filter_list = array();

	global $wpdb;
	
	
	$string_qwer = $wpdb->get_results( "SELECT DISTINCT meta_value 
										FROM wp_postmeta 
										WHERE meta_key = 'subway_1'
										OR meta_key = 'subway_2'
										OR meta_key = 'subway_3'
										OR meta_key = 'subway_4'
										OR meta_key = 'subway_5'
										OR meta_key = 'subway_6'
										OR meta_key = 'subway_7'
										OR meta_key = 'subway_8'
										OR meta_key = 'subway_9'
										OR meta_key = 'subway_10'
										ORDER BY `wp_postmeta`.`meta_value` ASC
										" );										
										

	$filter_list['subway']["label"] = 'Метро';
	$filter_list['subway']["name"] = 'subway';
    foreach ($string_qwer as $decoding) {
		$filter_list['subway']["choices"][] = $decoding->meta_value;
	}
	


	$string_qwer = $wpdb->get_results( "SELECT DISTINCT meta_value FROM wp_postmeta 
										WHERE meta_key = 'district_1'
										OR meta_key = 'district_2'
										OR meta_key = 'district_3'
										OR meta_key = 'district_4'
										OR meta_key = 'district_5'
										OR meta_key = 'district_6'
										OR meta_key = 'district_7'
										OR meta_key = 'district_8'
										OR meta_key = 'district_9'
										OR meta_key = 'district_10'
										
										ORDER BY `wp_postmeta`.`meta_value` ASC
										" );

	$filter_list['district']["label"] = 'Район';
	$filter_list['district']["name"] = 'district';
    foreach ($string_qwer as $decoding) {
		$filter_list['district']["choices"][] = $decoding->meta_value;
	}
	//var_dump($filter_list); exit;

	return $filter_list;
}

function getfilter_list_checkbox(){
	$filter_list = array();

	global $wpdb;

	$string_qwer = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE meta_id = 1090 AND meta_key = 'field_567d55f5fe0ec'" );
	$string = $string_qwer[0]->meta_value;
	$decoding = unserialize($string);

	$filter_list['doctors']["label"] = $decoding["label"];
	$filter_list['doctors']["name"] = $decoding["name"];
	$filter_list['doctors']["choices"] = $decoding["choices"];


	$string_qwer = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE meta_id = 1171 AND meta_key = 'field_567d59a304890'" );
	$string = $string_qwer[0]->meta_value;
	$decoding = unserialize($string);

	$filter_list['diagnostics_types']["label"] = $decoding["label"];
	$filter_list['diagnostics_types']["name"] = $decoding["name"];
	$filter_list['diagnostics_types']["choices"] = $decoding["choices"];

	return $filter_list;
}



function getfilter_list_medcentr_checkbox(){
	$filter_list = array();

	global $wpdb;
	
	$string_qwer = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE meta_id = 1064 AND meta_key = 'field_567d530920a78'" );
	$string = $string_qwer[0]->meta_value;
	$decoding = unserialize($string);

	$filter_list['service']["label"] = $decoding["label"];
	$filter_list['service']["name"] = $decoding["name"];
	$filter_list['service']["choices"] = $decoding["choices"];

	$string_qwer = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE meta_id = 1090 AND meta_key = 'field_567d55f5fe0ec'" );
	$string = $string_qwer[0]->meta_value;
	$decoding = unserialize($string);

	$filter_list['doctors']["label"] = $decoding["label"];
	$filter_list['doctors']["name"] = $decoding["name"];
	$filter_list['doctors']["choices"] = $decoding["choices"];


	$string_qwer = $wpdb->get_results( "SELECT meta_value FROM wp_postmeta WHERE meta_id = 1171 AND meta_key = 'field_567d59a304890'" );
	$string = $string_qwer[0]->meta_value;
	$decoding = unserialize($string);

	$filter_list['diagnostics_types']["label"] = $decoding["label"];
	$filter_list['diagnostics_types']["name"] = $decoding["name"];
	$filter_list['diagnostics_types']["choices"] = $decoding["choices"];

	return $filter_list;
}


function get_post_rates_dislike($post_id){
	global $wpdb;

	$string_qwer = $wpdb->get_results( "SELECT COUNT(rating_rating) as dsl FROM wp_ratings WHERE rating_postid = ".$post_id." AND rating_rating = '-1'" );
	//var_dump($string_qwer[0]->dsl); exit;

	$filter_list = $string_qwer[0]->dsl;

	return $filter_list;
}

function get_post_rates_like($post_id){
	global $wpdb;

	$string_qwer = $wpdb->get_results( "SELECT COUNT(rating_rating) as l FROM wp_ratings WHERE rating_postid = ".$post_id." AND rating_rating = '+1'" );
	//var_dump($string_qwer[0]->l); exit;

	$filter_list = $string_qwer[0]->l;

	return $filter_list;
}

function get_the_medicine(){
	global $wpdb;

	$string_qwer = $wpdb->get_results( "SELECT p.post_title, p.post_name FROM wp_term_relationships as cp LEFT JOIN wp_posts as p ON cp.object_id = p.ID WHERE cp.term_taxonomy_id = 49 ORDER BY p.post_title" );
	//var_dump($string_qwer); exit;

	return $string_qwer;
}

remove_action( 'wp_head', 'wp_shortlink_wp_head');




remove_action('wp_head', 'rsd_link');
remove_action( 'wp_head', 'feed_links_extra', 3 ); 
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'wp_generator' );

add_filter('rest_enabled', '__return_false');

add_filter('xmlrpc_enabled', '__return_false');

remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );

remove_action( 'rest_api_init', 'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

?>