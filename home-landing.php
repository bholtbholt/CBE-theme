<?php	/*	Template Name: Home Landing Page	*/
	get_header(); ?>
<div class="photo-slider">
	<div id="carousel-auto-photo-slider" class="carousel slide carousel-fade" data-ride="carousel">
		<div id="carousel-auto-photo-slider-inner" class="carousel-inner">
	    <div class="item active photo-slide photo-slide-1"></div>
			<div class="item photo-slide photo-slide-2"></div>
			<div class="item photo-slide photo-slide-3"></div>
			<div class="item photo-slide photo-slide-4"></div>
			<div class="item photo-slide photo-slide-5"></div>
		</div>
	</div>
</div>
<div class="services-banner">
	<div id="carousel-services-banner" class="container carousel slide">
		<div class="carousel-inner">
			<a href="<?php echo get_page_link(get_page_by_title('General Litigation')); ?>" class="services-banner-service"><li>General Litigation</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Business Law')); ?>" class="services-banner-service"><li>Business Law</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Family Law')); ?>" class="services-banner-service"><li>Family Law</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Estate Planning')); ?>" class="services-banner-service"><li>Estate Planning</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Estate Disputes')); ?>" class="services-banner-service"><li>Estate Disputes</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Commercial Lending')); ?>" class="services-banner-service"><li>Commercial Lending</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Personal Injury')); ?>" class="services-banner-service"><li>Personal Injury</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Real Estate')); ?>" class="services-banner-service"><li>Real Estate</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Maritime Law')); ?>" class="services-banner-service"><li>Maritime Law</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Employment Law')); ?>" class="services-banner-service"><li>Employment Law</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Immigration Law')); ?>" class="services-banner-service"><li>Immigration Law</li></a>
			<a href="<?php echo get_page_link(get_page_by_title('Alternative Dispute Resolution')); ?>" class="services-banner-service"><li class="services-banner-alternative-dispute-resolution">Dispute Resolution</li></a>
		</div>
		<a class="left carousel-control" href="#carousel-services-banner" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel-services-banner" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
</div>


<div class="container main-content">
	<div class="row col-md-12">
		<?php while ( have_posts() ) : the_post();
			$pid = $post->ID;
		  $sidebar = get_post_meta($pid, 'sidebar', true); ?>

			<?php the_content(); ?>	

		<?php endwhile; // end of the loop. ?>
	</div>
	<div class="row">
		<div class="col-sm-8">
			<section>
				<h3>Latest News</h3>
				<?php	$twoPosts = get_posts( array('posts_per_page'=>2)); ?>
				<?php foreach($twoPosts as $post) : setup_postdata($post); ?>
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<?php the_excerpt(); ?>
				<?php endforeach; wp_reset_postdata(); ?>
			</section>
			<section>
				<h3>Our Community</h3>
				<p>You will find us in your community either on a board, a committee, a charitable institution, or providing free legal services to those in need. Our commitment to our community is one of the most important priorities of our firm, aside from providing the very best legal advice for our clients. <a href="<?php echo get_page_link(get_page_by_title('About')); ?>" class="action"><span class="glyphicon glyphicon-chevron-right"></span></a></p>
			</section>
		</div>
		<div class="col-sm-4">
			<aside class="sidebar-box grey-bg rounded-corners">
				<?php echo $sidebar; ?>
			</aside>
		</div>
	</div>
</div>

<?php get_footer(); ?>