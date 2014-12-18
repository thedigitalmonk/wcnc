<?php get_header(); ?>

<?php $atag = get_field('activity_tag'); ?>

<div class="bigbanner">

			<div class="col-md-4 title-wrap">
				<h3><?php $term = get_term($atag, 'post_tag'); echo $term->name; ?></h3>
			</div>

			<div class="col-md-12 bigimage">
				<img src="<?php the_field('home_banner'); ?>" >
			</div>

			<div class="col-md-12 appendSection">


				<div class="col-md-4">

					<?php $photogallery = get_posts(array(
										'post_type' => 'easy-photo-album',
										'numberposts' => 1,
										'meta_key' => 'tag',
										'meta_value' => $atag
										)); 

						foreach ( $photogallery as $post ) : setup_postdata( $post ); ?>
							<a href="<?php the_permalink(); ?>">
								<div class="col-md-4 thumbnail-home">
									<?php the_post_thumbnail('homethumb'); ?>
								</div>
								<div class="col-md-8 info">
									<h3>Photo Gallery</h3>
									Check out some awesome pictures of <?php the_title(); ?> here.
								</div>
							</a>
						<?php endforeach; 
						
							wp_reset_postdata();?>
				</div>
				

				<div class="col-md-4">

					<?php

					$exemptcat = get_cat_ID('Reports');

						$blogpost = get_posts(array(
									'tag_id' => $atag,
									'numberposts' => 1,
									'post_type'=> 'post',
									'category__not_in' => array($exemptcat)
								));

						foreach ( $blogpost as $post ) : setup_postdata( $post ); ?>

					<a href="<?php the_permalink(); ?>">

						<div class="col-md-4 thumbnail-home">
							<?php the_post_thumbnail('homethumb'); ?>
						</div>
						<div class="col-md-8 info">
							<h3>From the Blog</h3>
							<p><?php the_title(); ?></p>
						</div>
					</a>

					<?php endforeach; 
						
						wp_reset_postdata();?>

				</div>

				

				<div class="col-md-4">

					<?php

						$blogpost = get_posts(array(
									'tag_id' => $atag,
									'category_name' => 'reports',
									'numberposts' => 1,
									'post_type'=> 'post'
								));
						foreach ( $blogpost as $post ) : setup_postdata( $post ); ?>
					<a href="<?php the_permalink(); ?>">
						<div class="col-md-4 thumbnail-home">
							<?php the_post_thumbnail('homethumb'); ?>
						</div>
						<div class="col-md-8 info">
							<h3>Official Report</h3>
							<p>by <?php the_author(); ?></p>
						</div>
					</a>

						<?php endforeach; 
						
							wp_reset_postdata();?>				
				</div>
				

			</div><!-- .appendSection -->

		</div><!-- .bigbanner -->

		<div class="col-md-12 widget-horizontal">

				<div class="col-md-4 events-widget">

					<h3>Events</h3>

					<?php $events = get_posts(array(
										'post_type' => 'events',
										'numberposts' => 5
										)); 

						foreach ( $events as $post ) : setup_postdata( $post ); ?>

							<a href="<?php the_permalink(); ?>">
								<div class="event-block col-md-12">
									<div class="col-md-5 thumbnail-preview">
										<?php the_post_thumbnail('preview'); ?>
									</div>
									<div class="col-md-7 info">
										<h4><?php the_title(); ?></h4>
										
										<?php 	
												$date = DateTime::createFromFormat('Ymd', get_field('start_date'));
												echo $date->format('d M Y'); 
										?>

										<div class="date"><?php $date; ?></div>
										<div class="duration"><?php the_field('duration'); ?></div>
									</div>
								</div>
							</a>
						<?php endforeach; 
						
							wp_reset_postdata();?>
				</div>

				<div class="col-md-4 photos-widget">

					<h3>Photos</h3>

					<?php $events = get_posts(array(
										'post_type' => 'easy-photo-album',
										'numberposts' => 5
										)); 

						foreach ( $events as $post ) : setup_postdata( $post ); ?>

							<a href="<?php the_permalink(); ?>">
								<div class="event-block col-md-12">
									<div class="col-md-5 thumbnail-preview">
										<?php the_post_thumbnail('preview'); ?>
									</div>
									<div class="col-md-7 info">

										<h4><?php the_title(); ?></h4>
										
										<?php the_time( 'F Y' ); ?>

										
										
									</div>
								</div>
							</a>
						<?php endforeach; 
						
							wp_reset_postdata();?>

				</div>

				<div class="col-md-4 fp-widget">

					<h3>Footprint</h3>

					<?php $footprint = get_posts(array(
										'post_type' => 'footprints',
										'numberposts' => 1
										)); 

						foreach ( $footprint as $post ) : setup_postdata( $post ); ?>

							
								<div class="magazine-block col-md-12">
									<div class="col-md-5 thumbnail-preview">
										<?php the_post_thumbnail('footprint'); ?>
									</div>
									<div class="col-md-7 info">

										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?> &#10140;</a></h4>
										
										<div>Volume <?php the_field('volume'); ?></div>
										<div>Issue <?php the_field('issue'); ?></div>

										<button class="btn-default"><a href="<?php the_permalink(); ?>">READ</a></button>
										
									</div>
								</div>
							
						<?php endforeach; 
						
							wp_reset_postdata();?>

							<?php $archive_link =  get_post_type_archive_link('footprints'); ?>

							<div class="col-md-12"><a href="<?php echo $archive_link ?>">View Archives &#10140;</a></div>
					
				</div>

		</div>

	</div><!-- .row -->

</div><!-- .container -->



<?php get_footer(); ?>