<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,400italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
<div id="wrap"> <!-- Wrapper for sticky footer -->

<nav class="navbar navbar-fixed-top hidden-print" role="navigation">
	<div class="container">
	  <div class="navbar-default navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-nav-collapse">Menu</button>    
	    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div id="logo"></div></a>
	  </div>
  	<form role="search" method="get" class="nav-li-search navbar-form collapse navbar-collapse" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="search" class="form-control" placeholder="Search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
		</form>
	  <?php wp_nav_menu( array(
  		'container_class' => 'collapse navbar-collapse main-nav-collapse',
  		'menu_class' => 'nav navbar-nav', )); ?>
	</div>
</nav>

<?php if (is_archive() OR is_single()) : ?>
<div class="photo-slider hidden-print">
  <div class="photo-banner photo-slide-news"></div>
	<div class="container">
		<p class="breadcrumb-banner">News</p>
	</div>
</div>
<?php elseif ( is_front_page() OR is_page('contact') OR is_tree(get_page_by_title('lawyers')->ID)) : ?>
<?php elseif (is_search() OR is_page('disclaimer') OR is_page('site-map') OR is_page('copyright') OR is_page('privacy')) : ?>
<div class="photo-slider hidden-print">
  <div class="photo-banner photo-slide-<?php echo rand(1,5); ?>"></div>
</div>
<?php else : ?>
<div class="photo-slider hidden-print">
  <div class="photo-banner photo-slide-<?php the_slug(); ?>"></div>
	<div class="container">
		<p class="breadcrumb-banner"><?php the_title(); ?></p>
	</div>
</div>
<?php endif; ?>