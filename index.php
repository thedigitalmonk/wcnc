<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wcnc
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8 col-sm-12 cold-xs-12">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<div class="post-block col-md-12 col-sm-12 col-xs-12">
				<div class="thumbnail-blog col-md-4 col-sm-4 col-xs-5">
					<a href="<?php the_permalink(); ?>">

						<?php 

						$format = get_post_format();

						switch ($format) {
						    case "video":
						       echo '<img src="' . get_bloginfo('stylesheet_directory'). '/img/video-thumbnail.jpg " >';
						       $type = "video";
						        break;
						    case "quote":
						         echo '<img src="' . get_bloginfo('stylesheet_directory'). '/img/quote-thumbnail.jpg " >';
						         $type = "quote";
						        break;
						    default:
						        the_post_thumbnail('blog-thumbnail');
						        $type = "";
						}
						
						?>
					</a>
				</div>
				<div class="post-info col-md-8 col-sm-8 col-xs-7">
					<div class="posttype"><?php echo $type; ?></div>
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<div class="author"><em>by <?php the_author_posts_link(); ?></em></div>
					<?php the_content('Read More'); ?>
				</div>
			</div>

			<?php endwhile; ?>

			<?php wcnc_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
