<?php

	/*
		Template Name: Lawyer Biography
	*/

?>

<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post();
			$pid = $post->ID;
			$position = get_post_meta($pid, 'position', true);
	    $phone = get_post_meta($pid, 'phone', true);
	    $email = get_post_meta($pid, 'email', true);
	    $fax = get_post_meta($pid, 'fax', true);
	    $assistant = get_post_meta($pid, 'assistant', true);
	    $areasOfLaw = get_the_tags();
	    $accreditation = get_post_meta($pid, 'accreditation', true);
	    $memberships = get_post_meta($pid, 'memberships', true);
	?>

<div class="photo-slider hidden-print">
  <div class="photo-slide photo-slide-<?php the_slug(); ?>"></div>
	<div class="container">
		<p class="breadcrumb-banner"><?php the_title(); ?></p>
	</div>
</div>

<div class="container main-content">
	<div class="row">
		<aside class="col-sm-4 col-sm-push-8">
			<div class="sidebar-box grey-bg rounded-corners">
				<h5><?php the_title(); echo ', '.$position ; ?></h5>
				<p>Phone: <?php echo $phone; ?><br/>
					Fax: <?php echo $fax; ?><br/>
					Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
				</p>
				<?php if (!empty($assistant)){ echo $assistant; } ?>
			</div>

		
		<?php echo get_related_author_posts(); ?>
			

		<?php if (!empty($areasOfLaw)) { ?>			
		<div class="sidebar">
			<h5>Areas of Law</h5>
			<ul>
				<?php foreach($areasOfLaw as $tag){
					echo '
						<a href="'.get_site_url().'/services/'.$tag->slug.'">
						<li>'.$tag->name.'
						<span class="glyphicon glyphicon-chevron-right pull-right action"></span>
						</li></a>';
	   		}?>
			</ul>
		</div>
		<?php } ?>

		<?php if (!empty($accreditation)) { ?>
			<div class="sidebar">
				<h5>Accreditation</h5>
				<ul>
					<?php echo $accreditation; ?>					
				</ul>
			</div>
		<?php } ?>

		<?php if (!empty($memberships)) { ?>
			<div class="sidebar">
				<h5>Memberships & Associations</h5>
				<ul>
					<?php echo $memberships; ?>					
				</ul>
			</div>
		<?php } ?>
		</aside>

		<article class="col-sm-8 col-sm-pull-4">
			<?php the_content(); ?>
			<br/>
			<p class="hidden-xs"><a class="print-page"><span class="glyphicon glyphicon-print"></span>&emsp;Print this page</a></p>
		</article>
	</div>

	<?php endwhile; // end of the loop. ?>

</div>

<?php get_footer(); ?>