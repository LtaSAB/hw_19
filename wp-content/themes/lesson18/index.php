<?php get_header(); ?>
<main class="m-page clearfix">
	<div id="content">
		<div class="top-title">
			<div class="container-fluid">
				<h2>Our Portfolio</h2>
			</div>
		</div>
		<div class="container-fluid">
			<div class="page-desc-title title-centered">
				<h2><?php echo get_theme_mod( 'portfolio_description_title', '' ); ?></h2>
				<p>
					<?php echo get_theme_mod( 'portfolio_description_content', '' ); ?>
				</p>
			</div>
			<div class="breadcrump">
				<?php
				// список разделов произвольной таксономии

				$args = array(
					'taxonomy'     => 'category', // название таксономии
					'orderby'      => 'name',  // сортируем по названиям
					'show_count'   => 0,       // не показываем количество записей
					'pad_counts'   => 0,       // не показываем количество записей у родителей
					'hierarchical' => 1,       // древовидное представление
					'title_li'     => ''       // список без заголовка
				);
				?>


				<ul>
					<?php wp_list_categories( $args ); ?>
				</ul>

			</div>
			<section class="main-section clearfix">
				<?php
				$args      = array(
					'post_type' => 'portfolio'
				);
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<article class="col-xs-12 col-sm-6 col-md-4 preview-work ">
							<div class="short-description">
								<h3>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<p><?php the_excerpt(); ?></p>
							</div>
							<div class=" screen-notebook">
								<div class="thumbnail-wrapper">
									<?php the_post_thumbnail(); ?>
								</div>
							</div>
							<div class="keyboard-notebook">
								<div class="inner-block">

								</div>
							</div>
						</article>
					<?php endwhile;
					wp_reset_postdata();
				endif; ?>
			</section>
			<div class="get-account title-centered">
				<h2><?php echo get_theme_mod( 'quote_title', '' ); ?></h2>
				<p><?php echo get_theme_mod( 'quote_content', '' ); ?>
				</p>
				<a href="<?php echo get_theme_mod( 'quote_url', '' ); ?>" class="button">Get a Free Quote</a>
			</div>
		</div>
		<div class="our-contacts clearfix">
			<div class="our-describe col-xs-12 col-sm-8 col-md-6 col-lg-4 ">
				<h2 class="logotype"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h2>
				<div class="social-icons">
					<ul>
						<li><a class="fa fa-twitter" href="<?php echo get_theme_mod( 'social_icon_twitter', '' ); ?>"></a></li>
						<li><a class="fa fa-facebook" href="<?php echo get_theme_mod( 'social_icon_facebook', '' ); ?>"></a></li>
						<li><a class="fa fa-rss" href="<?php echo get_theme_mod( 'social_icon_rss', '' ); ?>"></a></li>
					</ul>
				</div>
				<p><?php echo get_theme_mod( 'description_textbox', '' ); ?>
				</p>
			</div>
			<div class="contact-info col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<?php
				if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 1 ) ):
				endif; ?>
			</div>
			<div class="quick-links col-xs-6 col-sm-5 col-md-3 col-lg-2">
				<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 2 ) ):
				endif; ?>
			</div>
			<div class="news-letter col-xs-10 col-sm-7 col-md-8 col-lg-3">
				<?php
				if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 3 ) ):
				endif;
				?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>

