<?php
	$author = get_the_author();
	$pid = get_page_by_title($author)->ID;
	$authorSlug = get_page_by_title($author)->post_name;
	$email = get_post_meta($pid, 'email', true);
	$authorURL = get_permalink($pid);
	?>
<div class="container main-content">
	<div class="row">
		<article class="col-sm-8 col-lg-9 post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<p class="byline"><?php the_date('F j, Y'); echo " by "; ?>
				<a href="<?php echo $authorURL; ?>"><?php echo $author; ?></a>
			</p>
			<?php if ($author != "Firm News") : ?>
				<div class="author-pic">
					<?php	echo '<a href="'.$authorURL.'">
						<img src="'.get_template_directory_uri().'/images/lawyers/'.$authorSlug.'-author.jpg" class="rounded-corners"></a>'; ?>	
					<p>
						<?php echo '<a href="'.$authorURL.'">'.$author.'</a><br/>'; ?>
						<?php echo '<a href="mailto:'.$email.'">'.$email.'</a>'; ?>
					</p>
				</div>
			<?php endif; ?>

			<?php the_content(); ?>
			<?php CBE_post_nav(); ?>
		</article>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'CBE' ),
				'after'  => '</div>',
			) );
		?>

		<?php get_sidebar(); ?>
	</div>
</div>