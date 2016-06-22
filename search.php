<?php get_header(); ?>

<div class="container main-content">
	<div class="row">
		<article class="col-sm-8 col-lg-9">

			<?php if ( have_posts() ) : ?>
				<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'CBE' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php CBE_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</article>
	</div>
</div>

<?php get_footer(); ?>