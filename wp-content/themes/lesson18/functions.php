<?php
function src_resources() {
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'jquery-1.12.0.min', '/js/jquery-1.12.0.min.js', array( 'jquery' ), 1.1, true );

}

add_action( 'wp_enqueue_scripts', 'src_resources' );

//Font awesome

function font_awesome() {
	if ( ! is_admin() ) {
		wp_register_style( 'font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css' );
		wp_enqueue_style( 'font-awesome' );
	}
}

add_action( 'wp_enqueue_scripts', 'font_awesome' );

//Menu

register_nav_menus(
	array(
		'primary'   => __( 'Primary Menu' ),
		'secondary' => __( 'Secondary Menu' ),
		'footer' => __('Footer Menu')
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
		'name'               => 'Портфолио',
		'singular_name'      => 'Работа',
		'add_new'            => 'Добавить работу',
		'add_new_item'       => 'Добавить новую работу',
		'edit_item'          => 'Редактировать работу',
		'new_item'           => 'Новая работа',
		'all_items'          => 'Все работы',
		'view_item'          => 'Просмотр работ на сайте',
		'search_items'       => 'Искать работы',
		'not_found'          => 'Работ не найдено.',
		'not_found_in_trash' => 'В корзине нет работ.',
		'menu_name'          => 'Портфолио'
	);
	$args   = array(
		'labels'        => $labels,
		'public'        => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon'     => 'dashicons-format-gallery', // иконка корзины
		'menu_position' => 5,
		'has_archive'   => true,
		'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'categories' ),
		'taxonomies'    => array( 'post_tag', 'category' ),

	);
	register_post_type( 'portfolio', $args );
}

//registered widget

function register_my_widgets() {
	register_sidebar( array(
		'name'          => "Виджет зона контактов ",
		'description'   => 'Эти виджеты будут показаны в футере сайта',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );
	register_sidebar( array(
		'name'          => "Виджет зона быстрых ссылкок",
		'description'   => 'Эти виджеты будут показаны в футере сайта',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );
	register_sidebar( array(
		'name'          => "Виджет зона подписки",
		'description'   => 'Эти виджеты будут показаны в футере сайта',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );

}

add_action( 'widgets_init', 'register_my_widgets' );

/*Create description filed*/
function example_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'example_section_one',
		array(
			'title' => 'Описание сайта',
			'description' => 'Это секция настроек.',
			'priority' => 35,
		)
	);
	$wp_customize->add_setting(
		'description_textbox',
		array(
			'default' => 'Default description text',
		)
	);
	$wp_customize->add_control(
		'description_textbox',
		array(
			'label' => 'Описание сайта ',
			'section' => 'example_section_one',
			'type' => 'text',
		)
	);

	/*Социальные сети*/
	$wp_customize->add_section(
		'social_icon_section',
		array(
			'title' => 'Социальные сети',
			'description' => 'Это секция настроек.',
			'priority' => 35,
		)
	);
	$wp_customize->add_setting(
		'social_icon_twitter',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_twitter',
		array(
			'label' => 'Ссылка на твиттер',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_facebook',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_facebook',
		array(
			'label' => 'Ссылка на facebook',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_rss',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_rss',
		array(
			'label' => 'Ссылка на rss',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);

	/*Заказ сайта*/

	$wp_customize->add_section(
		'quote_section',
		array(
			'title' => 'Заказ сайта',
			'description' => 'Это секция настроек.',
			'priority' => 50,
		)
	);
	$wp_customize->add_setting(
		'quote_title',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'quote_title',
		array(
			'label' => 'Заголовок',
			'section' => 'quote_section',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'quote_content',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'quote_content',
		array(
			'label' => 'Содержимое',
			'section' => 'quote_section',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'quote_url',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'quote_url',
		array(
			'label' => 'Ссылка',
			'section' => 'quote_section',
			'type' => 'url',
		)
	);

	/*Контент порфолио*/
	$wp_customize->add_section(
		'portfolio_description',
		array(
			'title' => 'Про портфолио',
			'description' => 'Это секция настроек.',
			'priority' => 50,
		)
	);
	$wp_customize->add_setting(
		'portfolio_description_title',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'portfolio_description_title',
		array(
			'label' => 'Заголовок',
			'section' => 'portfolio_description',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'portfolio_description_content',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'portfolio_description_content',
		array(
			'label' => 'Содержимое',
			'section' => 'portfolio_description',
			'type' => 'text',
		)
	);
}
add_action( 'customize_register', 'example_customizer' );


















