<?php /* Template Name: Contact Landing Page	*/
	get_header();
	$pid = $post->ID;
  $phone = get_post_meta($pid, 'phone', true);
  $email = get_post_meta($pid, 'email', true);
  $fax = get_post_meta($pid, 'fax', true);
?>

<div class="photo-slider">
  <div class="photo-slide photo-slide-<?php the_slug(); ?>">
  	<div class="container">
  		<div class="col-md-offset-5 col-md-7">
	  		<div class="floating-box rounded-corners clearfix">
	  			<h1>Your Richmond law firm</h1>
	  			<h5>Cohen Buchan Edwards LLP</h5>
	  			<div class="row">
		  			<p class="col-sm-6">
		  				Suite 208&mdash;4940 No. 3 Road<br/>
		  				Richmond, British Columbia<br/>
		  				Canada, V6X 3A5
		  			</p>
		  			<p class="col-sm-6">
		  				Main: <strong><?php echo $phone; ?></strong><br/>
		  				Fax: <strong><?php echo $fax; ?></strong><br/>
		  				Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
		  			</p>
		  		</div>
	  			<p><strong>Open:</strong> Monday to Friday 9:00 am &mdash; 5:00 pm</p><br/>
	  			<div class="row">
		  			<div class="col-sm-6">
			  			<iframe class="hidden-md" width="280" height="190" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ca/maps?q=4940+Number+3+Rd+%23208,+Richmond,+Greater+Vancouver,+BC+V6X+3A5&amp;ie=UTF8&amp;hq=&amp;hnear=4940+Number+3+Rd+%23208,+Richmond,+Greater+Vancouver,+British+Columbia+V6X+3A5&amp;t=m&amp;ll=49.17772,-123.135624&amp;spn=0.008416,0.018797&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
			  			<iframe class="visible-md" width="224" height="230" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ca/maps?q=4940+Number+3+Rd+%23208,+Richmond,+Greater+Vancouver,+BC+V6X+3A5&amp;ie=UTF8&amp;hq=&amp;hnear=4940+Number+3+Rd+%23208,+Richmond,+Greater+Vancouver,+British+Columbia+V6X+3A5&amp;t=m&amp;source=embed&amp;ll=49.17772,-123.135624&amp;spn=0.012063,0.01914&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
		  			</div>
		  			<div class="col-sm-6">
			  			<p>
			  				<strong>Parking:</strong> There are CBE reserved parking stalls facing Alderbridge Way as well as general customer parking at the back of the building.<br/>
			  				<strong>Transit:</strong> We are a five minute walk away from the Canada Line, Landsdowne Station.
			  			</p>
			  			<p>Our building is wheelchair accessible.</p>
			  			<p><a target="_blank" href="https://maps.google.ca/maps?q=4940+Number+3+Rd+%23208,+Richmond,+Greater+Vancouver,+BC+V6X+3A5&amp;ie=UTF8&amp;hq=&amp;hnear=4940+Number+3+Rd+%23208,+Richmond,+Greater+Vancouver,+British+Columbia+V6X+3A5&amp;t=m&amp;ll=49.17772,-123.135624&amp;spn=0.008416,0.018797&amp;z=14&amp;iwloc=A&amp;source=embed">View our location on a larger map</a></p>
			  		</div>
			  	</div>
	  		</div>
	  	</div>
  	</div>
  </div>
	<div class="container">
		<p class="breadcrumb-banner hidden-xs hidden-sm"><?php the_title(); ?></p>
	</div>
</div>

<div class="grey-bg">
<div class="container main-content">
	<div class="row">
		<article class="col-sm-8 col-lg-9">
			<?php while ( have_posts() ) : the_post();
				the_content();
				endwhile; // end of the loop. ?>
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<?php
						$pid = get_page_by_title('Lawyers')->ID;
						foreach(my_get_page_children($pid) as $lawyer){
				      $page = $lawyer->ID;
				      $page_data = get_page($page);
				      $title = $page_data->post_title;
				      $url = get_permalink($page);
				      $phone = get_post_meta($page, 'phone', true);
				      $email = get_post_meta($page, 'email', true);
				      echo
				      	'<tr>
										<td><a href="'.$url.'">'.$title.'</a></td>
										<td>'.$phone.'</td>
										<td><a href="mailto:'.$email.'">'.$email.'</a></td>
									</tr>';
			   		}
			    ?>
				</table>
			</div>
		</article>

		<aside class="col-sm-4 col-lg-3">
			<div class="contact-form">
				<h4>Contact us</h4>
				<form role="form" method="post" id="contact">
					<div class="form-group">
						<label for="name" class="sr-only">Name</label>
						<input type="text" class="form-control" id="name" placeholder="Name">
					</div>
					<div class="form-group">
						<label for="phone" class="sr-only">Phone</label>
						<input type="text" class="form-control" id="phone" placeholder="Phone">
					</div>
					<div class="form-group">
						<label for="email" class="sr-only">Email</label>
						<input type="email" class="form-control" id="email" placeholder="Email address">
					</div>
					<select class="form-control" id="lawArea">
						<option>Requestion information about...</option>
						<?php
							$pid = get_page_by_title('Services')->ID;
							foreach(my_get_page_children($pid) as $service){
					      $page = $service->ID;
					      $page_data = get_page($page);
					      $title = $page_data->post_title;
					      echo '<option value="'.$title.'">'.$title.'</option>';
				   		}
				    ?>
					</select>
					<textarea class="form-control" rows="3" placeholder="Comments" id="message"></textarea>
					<button type="submit" id="submit" class="btn btn-primary btn-contact">Send</button>
				</form>

				<script type="text/javascript">
					var templateDir = "<?php bloginfo('template_directory') ?>";
				</script>

			</div>
		</aside>
	</div>

</div>
</div> <!-- end grey bg -->

<?php get_footer(); ?>