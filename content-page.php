<?php
	$pid = $post->ID;
	$columns = get_post_meta($pid, 'columns', true);
	if (!$columns) {
		$columns = "col-md-12";
	}
?>

<div class="container main-content">
	<div class="row <?php echo $columns; ?>">
		<?php the_content(); ?>
	</div>
<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'CBE' ),
		'after'  => '</div>',
	) );
?>