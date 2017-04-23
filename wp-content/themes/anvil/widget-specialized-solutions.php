<div class="specialized-solutions-widget">
	<?php 
		$pageid = get_the_ID();
		$args = array(
			'post_type' => 'products', 
			'posts_per_page' => -1
		); 
		$features = new WP_Query($args); 
	?>
	<h3><?php _e( "Specialized Solutions", 'forge_saas' );?></h3>

	<ul class="specialized-list">
		<?php while ( $features->have_posts() ) : $features->the_post(); ?>

			<?php $menuid = get_the_ID(); 
			$menuclass = '';
			if ( $pageid == $menuid ) { $menuclass = ' active'; } ?>

			<li>
				<a href="<?php the_permalink(); ?>" class="button<?php echo $menuclass; ?>"><?php the_title(); ?></a>
			</li>

		<?php endwhile; // end of the loop. ?>

	</ul>
</div>
