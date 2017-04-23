<?php
/**
 * Template Name: Contact 
 */

get_header(); ?>

	<div class="row content-area">		
	
			<div id="content" class="large-8 columns site-content" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
	
			</div><!-- #content -->
			
			<div id="secondary" class="large-4 columns widget-area" role="complementary">

				<div class="sidebar-wrap">
				
					<h3 class="widget-title"><?php _e( "Contact Info", 'forge_saas' );?></h3>
					
					<ul class="contact-info">
					
						<?php if(get_field('address', 'options')){ ?><li class="address"><?php the_field('address', 'options'); ?></li><?php } ?>
						<?php if(get_field('phone', 'options')){ ?><li class="phone"><?php the_field('phone', 'options'); ?><br/><?php } ?>
						<?php if(get_field('fax', 'options')){ ?><?php the_field('fax', 'options'); ?> - <?php _e( "Fax", 'forge_saas' );?></li><?php } ?>
						<?php if(get_field('email', 'options')){ ?><li class="address"><a href="mailto:<?php the_field('email', 'options'); ?>"><?php the_field('email', 'options'); ?></a></li><?php } ?>	
					</ul>

				</div>

				<?php if(get_field('map_url', 'options')){ ?>
						
							<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php the_field('map_url', 'options'); ?>&amp;iwloc=near&amp;output=embed"></iframe>
					
						<?php } ?>
				
			</div><!-- #secondary -->

		</div>

<?php get_footer(); ?>
