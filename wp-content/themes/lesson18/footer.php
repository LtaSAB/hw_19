<footer class="f-page">
	<div class="container-fluid">

		<p class="copyright"> copyright <?php echo date( 'Y' ); ?>
			<span><?php bloginfo( 'name' ) ?></span>. All Rights Reserved
		</p>
		<?php
		$args = [ 'theme_location' => 'footer' ];
		wp_nav_menu( $args ); ?>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>