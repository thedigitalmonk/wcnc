<?php
/**
 * The Template for displaying all single posts.
 *
 * @package wcnc
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8">

		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<div class="entry-meta">
					<?php wcnc_posted_on(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
				<div class="info-tab col-md-12">
				<?php //variables needed for display
						$start_date = get_field('start_date');
						$start_date_format = DateTime::createFromFormat('Ymd', get_field('start_date'));
						$end_date = get_field('end_date');
						$end_date_format = DateTime::createFromFormat('Ymd', get_field('end_date'));
						$duration = get_field('duration');
						$reg_fee =  get_field('reg_fee');
						$reg_deadline = get_field('reg_deadline');
						$reg_deadline_format = DateTime::createFromFormat('Ymd', get_field('reg_deadline'));
						$cost = get_field('cost');

						if($end_date - $start_date > 0) {

				 ?>
				

				<div class="col-md-12">
					<div class="col-md-3 tab">
						<h5>From</h5>
						<div><?php echo $start_date_format->format('d M Y'); ?></div>
					</div>
					<div class="col-md-3 tab">
						<h5>To</h5>
						<div><?php echo $end_date_format->format('d M Y'); ?></div>
					</div>
					<div class="col-md-3 tab">
						<h5>Cost</h5>
						<div><?php echo $cost; ?></div>
					</div>
					<div class="col-md-3 tab">
						<h5>Deadline</h5>
						<div><?php echo $reg_deadline_format->format('d M Y'); ?></div>
					</div>
				
				</div>
				<?php } else { ?>

				<div class="col-md-4 tab">
						<h5>On</h5>
						<div><?php echo $start_date_format->format('d M Y'); ?></div>
					</div>
					<div class="col-md-4 tab">
						<h5>Registration Fee</h5>
						<div><?php echo $reg_fee; ?></div>
					</div>
					<div class="col-md-4 tab">
						<h5>Registration Deadline</h5>
						<div><?php echo $reg_deadline_format->format('d M Y'); ?></div>
					</div>

				<?php } ?>
			</div>
			</div>

			

			<?php if( $reg_fee ) { ?>
			<div><em>A registration fee of Rs. <?php echo $reg_fee; ?> has to be paid to secure your seat. </em></div>
			<?php } ?>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'wcnc' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php
					/* translators: used between list items, there is a space after the comma */
					$category_list = get_the_category_list( __( ', ', 'wcnc' ) );

					/* translators: used between list items, there is a space after the comma */
					$tag_list = get_the_tag_list( '', __( ', ', 'wcnc' ) );

					if ( ! wcnc_categorized_blog() ) {
						// This blog only has 1 category so we just need to worry about tags in the meta text
						if ( '' != $tag_list ) {
							$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wcnc' );
						} else {
							$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wcnc' );
						}

					} else {
						// But this blog has loads of categories so we should probably display them here
						if ( '' != $tag_list ) {
							$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wcnc' );
						} else {
							$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wcnc' );
						}

					} // end check for categories on this blog

					printf(
						$meta_text,
						$category_list,
						$tag_list,
						get_permalink()
					);
				?>

				<?php edit_post_link( __( 'Edit', 'wcnc' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## -->

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