<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _S
 */

get_header(); ?>
<div class="container main-content">
	<div class="row">
		<article class="col-sm-8 col-lg-9">
			<?php if ( have_posts() ) : ?>
				<h3 class="page-title">
					<?php
						if ( is_category() ) :
							//single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title('Topic: ');

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'CBE' ), '<span>' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'CBE' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'CBE' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'CBE' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'CBE' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'CBE' ) ) . '</span>' );

						else :
							_e( 'Archives', 'CBE' );

						endif;
					?>
				</h3>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?><br/>

			<?php endwhile; ?>

			<?php CBE_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</article>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>