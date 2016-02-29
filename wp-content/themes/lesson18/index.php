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
				<h2>Nothing but the best for our Portfolio</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent justo ligula, interdum ut lobortis
					quis,
					interdum vitae metus. Proin fringilla metus non nulla cursus, sit amet rutrum est pretium.
				</p>
			</div>
			<div class="breadcrump">
				<?php
				// список разделов произвольной таксономии genre

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
				<h2>Do you need a Website?</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent justo ligula, interdum ut lobortis
					quis,
					interdum vitae metus. Proin fringilla metus non nulla cursus, sit amet rutrum est pretium.
				</p>
				<a href="#" class="button">Get a Free Quote</a>
			</div>
		</div>
		<div class="our-contacts clearfix">
			<div class="our-describe col-xs-12 col-sm-8 col-md-6 col-lg-4 ">
				<h2 class="logotype"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h2>
				<p><?php bloginfo( 'description' ); ?></p>
			</div>
			<div class="contact-info col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<h3>Contact info</h3>
				<address>
					222 Ave C South
					Saskatoon, Saskatchewan
					Canada S7K 2N5
				</address>
				<span class="our-mail">info@deliver.ca</span>
				<span class="coordinates">
					1.306.222.3456
				</span>
			</div>
			<div class="quick-links col-xs-6 col-sm-5 col-md-3 col-lg-2">
				<h3>
					Quick Links
				</h3>
			</div>
			<div class="news-letter col-xs-8 col-sm-7 col-md-8 col-lg-3">
				<h3>Newsletter</h3>
				<p>Lorem ipsum dolor sit amet dolor consectetur adipiscing elit. </p>
				<form action="#" >
					<input type="email" placeholder="Email"><button type="submit">Ok</button>
				</form>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>

