<div class="solutions-widget">
	<h4><?php _e( "The Core System", 'forge_saas' );?></h4>
	<h3><?php _e( "Solutions", 'forge_saas' );?></h3>

	<?php 

		
	$pageid = get_the_ID(); 
	?>
	<?php 
		$args = array(
			'post_type' => 'features', 
			'posts_per_page' => -1
		); 
		$features = new WP_Query($args); 
	?>
	<ul class="solutions-list">
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