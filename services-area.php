<?php
/**
 * Template Name: Service Area Page
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="container main-content">
					<div class="row <?php echo $columns; ?>">
						<article class="col-sm-8 col-lg-9">
							<?php the_content(); ?>
						</article>

						<?php	$lawyersPage = get_page_by_title('Lawyers')->ID;
									$relatedArea = the_slug(false);

									$allLawyerPages = get_pages( array(
										'child_of'=>$lawyersPage));
									$relatedLawyers = array();
									foreach($allLawyerPages as $lawyers) {
										if (has_tag($relatedArea, $lawyers->ID)) {
											$relatedLawyers[] = $lawyers;
										}
									}
									
									$allNews = get_posts('numberposts=-1&orderby=date');
									$relatedNews = array();
									foreach($allNews as $post) {
										if (has_tag($relatedArea, $post->ID)) {
											$relatedNews[] = $post;
										}
									}

									$page_object = get_queried_object();
									$page_id = get_queried_object_id();
									$areasOfLaw = get_the_tags($page_id);
				    			?>

					<aside class="col-sm-4 col-lg-3">
						<?php if ($relatedLawyers) { ?>			
							<div class="sidebar">
								<a href="#" class="filter"><h4>Related lawyers<span class="glyphicon glyphicon-plus pull-right"></h4></a>
								<ul class="filter-list">
									<?php foreach($relatedLawyers as $lawyer){
										echo '
											<a href="'.get_site_url().'/lawyers/'.$lawyer->post_name.'">
											<li>'.$lawyer->post_title.'
											<span class="glyphicon glyphicon-chevron-right pull-right action"></span>
											</li></a>';
						   		}?>
								</ul>
							</div>
						<?php } ?>

						<?php if ($areasOfLaw) { ?>			
							<div class="sidebar">
								<a href="#" class="filter"><h4>Related areas of law<span class="glyphicon glyphicon-plus pull-right"></h4></a>
								<ul class="filter-list">
									<?php foreach($areasOfLaw as $tag){
										echo '
											<a href="'.get_site_url().'/services/'.$tag->slug.'">
											<li>'.$tag->name.'
											<span class="glyphicon glyphicon-chevron-right pull-right action"></span>
											</li></a>';
						   		} ?>
								</ul>
							</div>
						<?php } ?>

						<?php if ($relatedNews) { ?>
							<div class="sidebar">
								<a href="#" class="filter"><h4>Related news<span class="glyphicon glyphicon-plus pull-right"></h4></a>
								<ul class="filter-list">
									<?php $count = 0; ?>
									<?php foreach($relatedNews as $post) : setup_postdata($post); ?>
										<a href="<?php the_permalink(); ?>"><li><?php the_title(); ?><span class="glyphicon glyphicon-chevron-right pull-right action"></span></li></a>
										<?php if (++$count == 5) break; ?>
									<?php endforeach; wp_reset_postdata(); ?>
								</ul>
							</div>
						<?php } ?>

					</aisde>

					</div>

			<?php endwhile; // end of the loop. ?>

	</div>
</div>

<?php get_footer(); ?>