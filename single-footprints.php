<?php
/**
 * The Template for displaying all footprints
 *
 * @package wcnc
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8">

		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="btn-default download_link"><a href="<?php the_field('link'); ?>"><span class="glyphicon glyphicon-download-alt"></span> &nbsp; Download</a></div>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php wcnc_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>