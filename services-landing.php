<?php

	/*
		Template Name: Services Landing Page
	*/

?>

<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
			
	<?php endwhile; // end of the loop. ?>

	<div class="row col-md-12">
		<?php
			$pid = $post->ID;
			foreach(my_get_page_children($pid, 'title') as $service){
	      $page = $service->ID;
	      $page_data = get_page($page);
	      $title = $page_data->post_title;
	      $url = get_permalink($page);
	      $slug = basename(get_permalink($page));
	      echo '<a href="'.$url.'"><div class="service-box service-box-image-reveal-'.$slug.' col-sm-4">'.$title.'</div></a>'; 
   		}
    ?>
  </div>
</div>

<?php get_footer(); ?>