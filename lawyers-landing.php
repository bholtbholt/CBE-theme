<?php

	/*
		Template Name: Lawyers Landing Page
	*/

?>

<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
			
	<?php endwhile; // end of the loop. ?>

	<div class="row">
		<?php
			$pid = $post->ID;
			foreach(my_get_page_children($pid, 'menu_order') as $lawyer){
	      $page = $lawyer->ID;
	      $page_data = get_page($page);
	      $title = $page_data->post_title;
	      $url = get_permalink($page);
	      $phone = get_post_meta($page, 'phone', true);
	      $email = get_post_meta($page, 'email', true);
	      $slug = basename(get_permalink($page));
	      echo
	      	'<div class="col-sm-4">
	      		<div class="lawyer-box rounded-corners">
	      			<a href="'.$url.'"><img src="'.get_template_directory_uri().'/images/lawyers/'.$slug.'-thumb.jpg" class="img-responsive"></a>
							<h4><a href="'.$url.'">'.$title.'</a></h4>
							<p>'.$phone.'</p><p><a href="mailto:'.$email.'">'.$email.'</a></p>
						</div>
					</div>';
   		}
    ?>
</div>
</div>

<?php get_footer(); ?>