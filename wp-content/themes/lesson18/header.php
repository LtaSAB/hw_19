<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<title><?php echo wp_get_document_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="wrapper">
	<header class="h-page">
		<div class="container-fluid">
			<h1 class="logotype "><a href="<?php echo home_url('/portfolio', 'http'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<button class="hamburger">&#9776;</button>
			<button class="cross">&#735;</button>
				<?php
				$args = [ 'theme_location' => 'primary' ];
				wp_nav_menu( $args ); ?>
		</div>
	</header>