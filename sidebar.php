<?php	$newsTopics = get_tags();	?>

		<aside class="col-sm-4 col-lg-3">
			<?php if (!empty($newsTopics)) { ?>			
				<div class="sidebar">
					<a class="filter"><h4>Filter news by topic<span class="glyphicon glyphicon-plus pull-right"></span></h4></a>
					<ul class="filter-list">
						<?php foreach($newsTopics as $tag){
							if ($tag->term_id !=3 && $tag->term_id !=5 && $tag->term_id !=7 && $tag->term_id !=10 && $tag->term_id !=12) {
							echo '
								<a href="'.get_tag_link($tag).'">
								<li>'.$tag->name.'
								<span class="glyphicon glyphicon-chevron-right pull-right action"></span>
								</li></a>';
			   		}}?>
					</ul>
				</div>
			<?php } ?>

			<div class="sidebar">
				<a class="filter"><h4>Filter news by author<span class="glyphicon glyphicon-plus pull-right"></h4></a>
				<ul class="filter-list">
					<?php CBE_list_authors(); ?>
				</ul>
			</div>

			<div class="sidebar">
				<br/>
				<a href="<?php echo get_page_link(get_page_by_title('Lawyers')); ?>"><p>Back to lawyer biographies<span class="glyphicon glyphicon-chevron-right pull-right action"></span></p></a>
			</div>
		</aisde>