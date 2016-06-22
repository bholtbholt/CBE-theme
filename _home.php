<?php get_header(); ?>
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
		<h1><strong>Legal services in the heart of Richmond.</strong></h1>
		<p class="lead">
			Cohen Buchan Edwards LLP is a full service law firm providing practical, client-oriented service that delivers results. For more than 30 years an exceptional legal team of lawyers and staff continue to work effectively with both businesses and individuals, and on a wide range of solutions. Benefit from our experience, drive, and tenacity as we pursue all viable options to protect you, your family, or your business.</p>
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
				<h4>In your own words</h4>
				<p>When making legal decisions, we understand that it’s important that you are as comfortable as possible. You should fully understand your choices and any associated consequences. Discussing these options in your first language will help you focus on your legal matter, not the language issues.</p>
				<p>We have lawyers who speak Chinese and also staff who can translate for their English-only speaking lawyers, ensuring you have access to all our legal services.</p>
				<p>We welcome all generations. Please call us for a consultation. <a href="#"><span class="glyphicon glyphicon-chevron-right action"></span></a></p>
			</aside>
		</div>
	</div>
</div>

<?php get_footer(); ?>