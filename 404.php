<?php get_header(); ?>

<div class="container main-content">
	<div class="row">
		<article class="col-sm-8 col-lg-9">
			<h2 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'CBE' ); ?></h2>
			<p class="lead">It looks like nothing was found here. Why don't you try searching?</p>
			<br/>
			<?php get_search_form(); ?>
		</article>
	</div>
</div>

<?php get_footer(); ?>