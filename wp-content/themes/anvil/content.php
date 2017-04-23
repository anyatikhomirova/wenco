<?php
/**
 * @package Forge Saas
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	
<?php if(has_post_thumbnail()): ?>
	<div class="row"> 
		
		<div class="large-4 columns">
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wpf-featured' ); ?></a>
		</div>
		
		<div class="large-8 columns">
	
<?php endif; ?>

	<header>
									
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				
		<p class="post-meta"><?php echo forge_saas_posted_on();  ?></p>
		
	</header> <!-- end article header -->

	<section class="post_content clearfix">
		
		<p>
			<?php echo excerpt(40); ?>		
		</p>
		<a href="<?php the_permalink(); ?>" class="read-more">Read More »</a>

	</section> <!-- end article section -->
	
	<footer>

		<p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ' ', ''); ?></p>
		
	</footer> <!-- end article footer -->

<?php if(has_post_thumbnail()): ?>

		</div>
		
	</div>
<?php endif; ?>

</article> <!-- end article -->
