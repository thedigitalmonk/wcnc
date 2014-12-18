<?php
/**
 * The template for displaying Photo Albums
 *
 * @package wcnc
 */

get_header(); ?>

<section id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<a href="<?php the_permalink(); ?>">
			<div class="album-block col-md-6">

				<?php the_post_thumbnail('ablumcover'); ?>

				<h5><?php the_title(); ?></h5>

			</div>

			</a>

			<?php endwhile; ?>

			<?php wcnc_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
</section><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>