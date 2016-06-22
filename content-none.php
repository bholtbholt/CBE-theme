<div class="container main-content">
	<div class="row">
		<article class="col-sm-8 col-lg-9">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<h3><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'CBE' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></h3>

		<?php elseif ( is_search() ) : ?>

			<h3><?php _e( 'Sorry, but nothing matched your search terms', 'CBE' ); ?></h3>
			<p class="lead">Please try again with some different keywords.</p>
			<br/>
			<?php get_search_form(); ?>

		<?php else : ?>

			<h3><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for', 'CBE' ); ?></h3>
			<p class="lead">It looks like nothing was found here. Perhaps searching can help.</p>
			<br/>
			<?php get_search_form(); ?>

		<?php endif; ?>
		</article>
		<?php get_sidebar(); ?>
	</div>
</div>