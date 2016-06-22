<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="form-control auto-width inline-block" placeholder="Search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">&emsp; 
	<button type="submit" class="btn btn-primary inline-block">Submit</button>
</form>