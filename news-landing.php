<?php

	/*
		Template Name: News Landing Page
	*/

?>

<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
			
	<?php endwhile; // end of the loop. ?>

	<div class="row">
		<div class="col-sm-8 col-lg-9">
			<?php	$fivePosts = get_posts( array('posts_per_page'=>5)); ?>
			<?php foreach($fivePosts as $post) : setup_postdata($post); ?>
					<article>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<?php the_excerpt(); ?>
					</article>
			<?php endforeach; wp_reset_postdata(); ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>