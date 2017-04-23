<?php
/**
 * Template Name: Home Page
 *
 * @package Forge Saas
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php if(get_field('content_blocks')): ?>

			<?php  while(has_sub_field("content_blocks")): ?>
			 
				<?php  if(get_row_layout() == "buckets"): // layout: Buckets ?>

					<div class="buckets-callout clearing-container">
						
						<div class="row">
								
							<?php while(has_sub_field('buckets')): ?>							
								
								<div class="large-4 columns callouts">
									
									<?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'medium'); ?>				 
									<img src="<?php echo $image[0]; ?>">
									
									
									<h3><?php the_sub_field('title'); ?></h3>
									
									<p><?php the_sub_field('content'); ?></p>
									
									<?php if(get_sub_field('link_text')){ ?>	
									
									<a href="<?php the_sub_field('link'); ?>" class="button"><?php the_sub_field('link_text');?></a>
									
									<?php } ?>		
												
								</div>
								
							<?php endwhile;  ?>

						</div>
						
					</div>

				<?php  elseif(get_row_layout() == "content_callout"): // layout: Content Callout ?>

					<div class="content-callout clearing-container">					 
							
						<div class="row">
						
							<div class="large-8 columns">
															
								<?php the_sub_field('content_area'); ?>
							
							</div>
							
							<?php get_sidebar('home'); ?>
						
						</div>
						
					</div>

				<?php  elseif(get_row_layout() == "carousel"): // layout: Carousel ?>

					<div class="carousel-container clearing-container">
					
						<div class="row">
						
							<div class="large-12 columns">

								<?php if(get_sub_field('carousel_title')) : ?>
									<h2><?php the_sub_field('carousel_title'); ?></h2>
								<?php endif; ?>
						
								<div class="flexslider carousel">
									
									<ul class="slides">
									
									<?php while(has_sub_field('carousel')): ?>							
										
										<li>
											<a href="<?php the_sub_field('link'); ?>">	
												<?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'wpf-home-featured'); ?>				 
												<img src="<?php echo $image[0]; ?>">
											</a>																						
										</li>
										
									<?php endwhile;  ?>
									
									</ul>
									
								</div>
						
							</div>
						
						</div>
					
					</div>

				<?php  elseif(get_row_layout() == "slideshow"): // layout: Slider ?>

					<?php $text_location = get_sub_field('text_location');  ?>
					
					<?php $slider_width = get_sub_field('slideshow_type'); ?>
					
					<div class="slideshow-wrapper <?php echo $slider_width; ?> clearing-container">
						
						<?php if($slider_width == 'container' ): ?>
																						
						<div class="row">
						
							<div class="large-12 columns">
						
						<?php endif; ?>
								
								<div class="flexslider slider">
									
									<ul class="slides">
									
									<?php while(has_sub_field('slider')): ?>							
										
										<?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>								
										
										<li style="
										background-image: url('<?php echo $image[0]; ?>');
										background-repeat: no-repeat;
					                	background-position: center;
					                	-webkit-background-size: cover;
					                	-moz-background-size: cover;
					                	-o-background-size: cover;
					                	background-size: cover; 
										">
																		
										<?php if($slider_width == 'full-width' ): ?>
																										
										<div class="text-wrapper">
																					
										<?php endif; ?>															 											

											<div class="text-container <?php echo $text_location; ?>">
																						
												<h1><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></h1>							
												<p><?php the_sub_field('content'); ?></p>
												<a href="<?php the_sub_field('link'); ?>" class="button"><?php the_sub_field('link_text'); ?> » </a>		
											</div>

										<?php if($slider_width == 'full-width' ): ?>
															
										</div>
										
										<?php endif; ?>

										</li>
																	
									<?php endwhile;  ?>
									
									</ul>
									
								</div>
						
						<?php if($slider_width == 'container' ): ?>

							</div>
							
						</div>
						
						<?php endif; ?>
												
					</div>
				
				<?php  elseif(get_row_layout() == "blog_posts"): // layout: Blog Posts ?>

					<div class="blog-callout clearing-container">
						
						<div class="row">

							<div class="large-12 columns">
							
								<h2><a href="<?php the_sub_field('blog_link'); ?>"><?php the_sub_field('headline'); ?></a></h2>

							</div>
						
							<?php 
								$args = array(
									'posts_per_page' => 3, 
								); 
								$blog = new WP_Query($args);
								if($blog->have_posts()):
								while($blog->have_posts()): $blog->the_post(); 
							?>
								<div class="large-4 columns">
								
									<h3><?php the_title(); ?></h3>
									
									<p>
										<?php echo excerpt(20); ?>
									
										<a href="<?php the_permalink(); ?>" class="read-more"><?php _e( "Read More", 'forge_saas' );?></a>
									</p>
								</div>
								
					
						<?php endwhile; wp_reset_query(); ?>
						
						<?php endif; ?>
						
						</div>
						
					</div>

				<?php elseif(get_row_layout() == "testimonial") : // layout: Testimonials ?>

					<div class="testimonial-callout clearing-container">

						<div class="row">

							<div class="large-12 columns">

								<?php 
									$testimonial_args = array(
										'post_type' => 'testimonials',
										'posts_per_page' => 1,
										'orderby' => 'rand'
									);
									$testimonial = new WP_Query($testimonial_args);
									if($testimonial->have_posts()):
									while($testimonial->have_posts()): $testimonial->the_post();
								?>

									<?php the_content(); ?>

									<h3 class="right"><?php the_title(); ?></h3>

								<?php endwhile; wp_reset_query();?>

								<?php endif; ?>

							</div>

						</div>

					</div>					
				
					<?php elseif(get_row_layout() == "widgets") : // layout: Testimonials ?>

					<div class="widgets-callout clearing-container">

						<div class="row">

							<?php dynamic_sidebar( 'sidebar-4' );  ?>

						</div>

					</div>						
				
					<?php elseif(get_row_layout() == "featured_posts") : // layout: Testimonials ?>
					
					<?php 
						$post1 = get_sub_field('post_one');
						$post1 = $post1[0];
						$post2 = get_sub_field('post_two');
						$post2 = $post2[0];
					?>

					<div class="featured-posts clearing-container">

						<div class="row">

							<div class="large-3 columns post-one">

								<div class="image">

									<?php $image1 = wp_get_attachment_image_src(get_sub_field('image_one'), 'full'); ?>
									<a href="<?php the_sub_field('link_one'); ?>"><img src="<?php echo $image1[0] ?>" alt="<?php the_field('title_one'); ?>"></a>

								</div>

								<div class="text">

									<h4><?php the_sub_field('header_one'); ?></h4>
									<h3><a href="<?php the_sub_field('link_one'); ?>"><?php the_sub_field('title_one'); ?></a></h3>
									<p><?php the_sub_field('text_one'); ?></p>
									<a href="<?php the_sub_field('link_one'); ?>" class="button"><?php _e( "Learn More", 'forge_saas' );?> »</a>

									<!--<?php $post = $post1; setup_postdata( $post ); ?>

										<?php the_post_thumbnail( ); ?>
										<h4><?php the_sub_field('header_one') ?></h4>
										<h3><?php the_title(); ?></h3>
										<?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" class="button"><?php _e( "Learn More", 'forge_saas' );?> »</a>

									<?php wp_reset_postdata(); ?> -->
								</div>

							</div>

							<div class="large-3 columns post-two">
								

								<div class="image">
									<?php $image2 = wp_get_attachment_image_src(get_sub_field('image_two'), 'full'); ?>
									<a href="<?php the_sub_field('link_two'); ?>"><img src="<?php echo $image2[0] ?>" alt="<?php the_field('title_two'); ?>"></a>
								</div>

								<div class="text">

									<h4><?php the_sub_field('header_two'); ?></h4>
									<h3><a href="<?php the_sub_field('link_two'); ?>"><?php the_sub_field('title_two'); ?></a></h3>
									<p><?php the_sub_field('text_two'); ?></p>
									<a href="<?php the_sub_field('link_two'); ?>" class="button"><?php _e( "Learn More", 'forge_saas' );?> »</a>
								
								</div>

							<!-- <?php $post = $post2;  setup_postdata( $post ); ?>

									<?php the_post_thumbnail( ); ?>
									<h4><?php the_sub_field('header_two') ?></h4>
									<h3><?php the_title(); ?></h3>
									<?php the_excerpt(); ?>
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( "Learn More", 'forge_saas' );?> »</a>

								<?php //wp_reset_postdata(); ?> -->

							</div>

							<div class="large-6 columns video">
								<h3><?php the_sub_field('header_three'); ?></h3>
								<ul class="post-list">
									<?php 
									$press_args = array(
										'post_type' => 'press',
										'posts_per_page' => 3,
										'orderby' => 'date'
									);
									$press = new WP_Query($press_args);
									if($press->have_posts()): while($press->have_posts()): $press->the_post(); ?>
									<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
									<?php endwhile; endif; wp_reset_query();?>
								
								</ul>

								<div class="video-wrap">
									<h2 class="video-title"><?php the_sub_field('video_title'); ?></h2>

									<?php $homevid = get_sub_field('video'); ?>

									<div class="flex-video">
										<iframe id="homevid" width="640" height="360" frameborder="0" allowfullscreen=""></iframe>
									</div>								

									<script>
										jQuery(window).load(function() {
											jQuery('#homevid').attr('src','<?php echo $homevid; ?>?feature=oembed&rel=0');
										});
									</script>

								</div>
							</div>

						</div>
					</div>


				<?php elseif(get_row_layout() == "locations") : // layout: Contact and Locations ?>

					<div class="contact-locations clearing-container">
						<div class="row">


						<?php if ( $contact_title = get_sub_field('contact_title' ) ): ?>
							<div class="columns large-3 contact">
								<h3><?php echo$contact_title;?></h3>
								<?php the_sub_field('contact_content');?>
							</div>
						<?php endif;?>

						<?php while(has_sub_field('location_columns')): ?>

							<div class="columns large-3">

								<?php while(has_sub_field('location_group')): ?>

									<h4><?php the_sub_field('group_title');?></h4>

									<?php while(has_sub_field('locations')): ?>

										<h5><?php the_sub_field('title');?></h5>

										<?php the_sub_field('content');?>

									<?php endwhile;?>


								<?php endwhile;?>

							</div>

						<?php endwhile;  ?>



						</div>

					</div>

				<?php elseif(get_row_layout() == "hero_content") : // layout: Hero Content ?>
					<?php $slides = get_sub_field('slides');
						shuffle ($slides ); // Randomize the order
						$random_slide = $slides[0]; // Grab the first one

						$background_image  = wp_get_attachment_image_src($random_slide['background_image'], 'full');
					?>

					<div class="hero-content full-width clearing-container text-location-<?php echo $random_slide['text_position'];?> background-<?php echo $random_slide['background_color'];?>" style="background-image:url(<?php echo $background_image[0];?>); background-size: cover;" >

						<div class="row">
							<div class="content-wrapper">
								<div class="content-wrapper-inner">
									<h1>
										<?php echo $random_slide['title'];?>
									</h1>
									<?php echo $random_slide['content'];?>
									<?php if($random_slide['button_link'])  :?>
										<a class="button" href="<?php echo $random_slide['button_link'];?>">
											<?php echo $random_slide['button_label'];?>
										</a>
									<?php endif;?>
								</div>
							</div>
						</div>

					</div>

				<?php endif; ?>
	
			<?php  endwhile; // end of flexible content ?>

		<?php endif; //end of flexbile content check ?>

	<?php endwhile; // end of the loop. ?>
		
<?php get_footer(); ?>
