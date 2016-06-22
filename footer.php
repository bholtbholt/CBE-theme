</div> <!-- end sticky footer -->

<footer class="main-footer">
	<div class="container">
  <ul>
  	<li><a href="<?php echo get_page_link(get_page_by_title('Copyright')); ?>">Copyright © 2013 Cohen Buchan Edwards LLP</a></li>
  	<li><a href="<?php echo get_page_link(get_page_by_title('Privacy Policy')); ?>">Privacy Policy</a></li>
  	<li><a href="<?php echo get_page_link(get_page_by_title('Disclaimer')); ?>">Disclaimer</a></li>
  	<li><a href="<?php echo get_page_link(get_page_by_title('Site Map')); ?>">Site Map</a></li>
  	<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
  	<li>Contact us: 604-273-6411</li>
  	<li>Site design by <a href="http://www.vandykemarketing.com/" target="_blank">Van Dyke Marketing</a></li>
  </ul>
  </div>
</footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>

<?php wp_footer(); ?>

</body>
</html>