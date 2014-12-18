<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wcnc
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

			<header>
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'wcnc' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'wcnc' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'wcnc' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'wcnc' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'wcnc' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'wcnc' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'wcnc' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'wcnc');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'wcnc');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'wcnc' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'wcnc' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'wcnc' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'wcnc' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'wcnc' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'wcnc' );

						else :
							_e( 'Archives', 'wcnc' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->



	<section id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="post-block col-md-12">
				<div class="thumbnail-blog col-md-4">
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
				<div class="post-info col-md-8">
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
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
