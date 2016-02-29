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
			<section class="main-section">
				<?php
				$args      = array(
					'post_type' => 'portfolio'
				);
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();?>
						 <div class="col-xs-12 col-sm-6 col-md-4">
						<h3>
							<a href="<?php get_the_permalink(); ?>"><?php get_the_title() ;?></a>
						</h3>
						<p><?php the_excerpt(); ?></p>
						 </div>
					<?php endwhile;
					wp_reset_postdata();
				endif; ?>
			</section>
		</div>
	</div>
</main>
<?php get_footer(); ?>

