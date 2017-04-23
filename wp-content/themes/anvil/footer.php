<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Forge Saas
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer panel" role="contentinfo">
		
		<?php if(!is_page_template('page-contact.php') && get_field('footer_location_bar', 'options')): ?>
		<div class="location-wrap">
		
			<div class="row">
			
				<div class="large-8 columns">
				
					<ul class="location-meta"> 
					
						<?php if(get_field('address', 'options')){ ?><li class="address"><?php the_field('address', 'options'); ?></li><?php } ?>
						<?php if(get_field('hours', 'options')){ ?><li class="hours"><?php the_field('hours', 'options'); ?></li><?php } ?>
						<?php if(get_field('phone', 'options') || get_field('fax', 'options') ){ ?>
							<li class="phone-fax">
								<?php if(get_field('phone', 'options')){ ?> Phone: <?php the_field('phone', 'options'); } ?> 
								<span class="separator" >|</span> 
								<?php if(get_field('fax', 'options')){ ?> Fax: <?php the_field('fax', 'options'); } ?>
							</li>
						<?php } ?>
						<?php if(get_field('email', 'options')){ ?><li class="email"><?php the_field('email', 'options'); ?></li><?php } ?>
						
					</ul>				
				
				</div>
				
				<div class="large-4 columns">

				<?php if( get_field('map_url', 'options') ):?>
					<iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php the_field('map_url', 'options'); ?>&amp;iwloc=near&amp;output=embed"></iframe>
				<?php endif; ?>		

				</div>
			
			</div>
		
		</div>
		<?php endif; ?>

		<?php if(get_field('footer_menu','options') && get_field('use_footer_custom_menu','options') == 'true' ): ?>

			<section class="footer-custom-menu">

				<div class="wrapper row">

					<div class="large-12 columns">

						<?php $steps = count(get_field('footer_menu','options')); ?>

						<ul class="large-block-grid-<?php echo $steps; ?>">
					
							<?php  while(has_sub_field("footer_menu",'options')): ?>

							 	<li>
								
									<?php  if(get_row_layout() == "links"): // layout: Buckets ?>

										<h4><?php the_sub_field('headline'); ?></h4>

										<?php if(get_sub_field('links')): ?>
											<ul>
												<?php while(has_sub_field('links','options')): ?>

												<?php if(get_sub_field('link_location')){
													$link = get_sub_field('link_location');
												}else{
													$link = get_sub_field('page_link');
												} ?>

												<li>
													<a href="<?php echo $link; ?>">
														<?php the_sub_field('link_name') ?>
													</a>
												</li>
												<?php endwhile; ?>

											</ul>
										<?php endif; ?>


									<?php elseif(get_row_layout() == "editor"):  ?>
									
										<h4><?php the_sub_field('headline'); ?></h4>

										<?php the_sub_field('text_area'); ?>



									<?php elseif(get_row_layout() == "social_media"):  ?>
									
										<h4><?php the_sub_field('headline'); ?></h4>

										<?php if(get_field('social_media', 'options')): ?>	

											<?php $media = get_field('social_media', 'options'); ?>
		
											<ul class="footer-social-menu">
												<?php foreach($media as $single): ?>
													
													<li>
														<a target="_blank" href="<?php echo $single['link']; ?>">
															<span class="ss-icon ss-social-circle">
																<?php  echo $single['social_media'];  ?>
															</span>
															<span><?php  echo $single['footer_text'];  ?></span>
														</a>
													</li>
												<?php endforeach; ?>
											</ul>
											
										<?php endif; ?>	

									<?php endif; ?>

								</li>

							 <?php endwhile; ?>

						</ul>

					</div>

				</div>
			</section>

		<?php endif; ?>

		<div class="bottom-footer">
		
			<div class="row">
				
				<div class="large-12 columns site-info text-center">

			
					<?php do_action( 'forge_saas_credits' ); ?>	

					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'items_wrap' => '<ul id="footer-nav" class="nav menu">%3$s</ul>' ) ); ?>

			
					<small>&copy; <?php echo date('Y'); ?> <?php the_field('company_copyright_name', 'options'); ?>. All rights reserved. Design and development by <a href="http://forgeandsmith.com/">Forge and Smith</a>. Powered by the Anvil Framework</small>
					
				</div><!-- .site-info -->

			</div>

		</div>

	</footer><!-- #colophon -->

</div> <!-- #st-pusher -->
</div> <!-- #st-container -->

<?php wp_footer(); ?>



<script>
	jQuery(document).foundation();
</script>
<script>
	// jQuery(document).ready(function () {
	// 	// Twitter
	// 	jQuery(".tweet").tweet({
	// 		username: "OuestSAP",
	// 		//avatar_size: 32,
	// 		modpath: '<?php echo home_url(); ?>/twitter/',
	// 		count: 2,
	// 		loading_text: "loading tweets..."
	// 	});
	// });
</script>
</body>
</html>
