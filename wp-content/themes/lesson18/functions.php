<?php
function src_resources() {
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'jquery-1.12.0.min', '/js/jquery-1.12.0.min.js', array ( 'jquery' ), 1.1, true);

}
add_action( 'wp_enqueue_scripts', 'src_resources' );

//Font awesome

function font_awesome() {
  if (!is_admin()) {
    wp_register_style('font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css');
    wp_enqueue_style('font-awesome');
  }
}
add_action('wp_enqueue_scripts', 'font_awesome');

//Menu

register_nav_menus(
	array(
		'primary' => __( 'Primary Menu' ),
		'secondary'=>__('Secondary Menu'),
	)
);
add_action( 'genesis_meta', 'wpb_add_google_fonts', 5 );

//Goggle Fonts

//function wpb_add_google_fonts() {
//	echo '<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Pacifico" >';
//}

/*Featured images*/

add_theme_support( 'post-thumbnails' );

/*register post type portfolio*/
add_action( 'init', 'true_register_portfolio' );

function true_register_portfolio() {
	$labels = array(
		'name' => 'Портфолио',
		'singular_name' => 'Работа',
		'add_new' => 'Добавить работу',
		'add_new_item' => 'Добавить новую работу',
		'edit_item' => 'Редактировать работу',
		'new_item' => 'Новая работа',
		'all_items' => 'Все работы',
		'view_item' => 'Просмотр работ на сайте',
		'search_items' => 'Искать работы',
		'not_found' =>  'Работ не найдено.',
		'not_found_in_trash' => 'В корзине нет работ.',
		'menu_name' => 'Портфолио'
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-format-gallery', // иконка корзины
		'menu_position' => 5,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'categories'),
		'taxonomies' => array('post_tag', 'category'),

	);
	register_post_type('portfolio',$args);
}