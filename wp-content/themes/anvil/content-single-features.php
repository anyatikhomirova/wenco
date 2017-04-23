<?php
/**
 * The template used for displaying single features
 *
 * @package Forge Saas
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		
		<h1 class="entry-title"><?php the_title(); ?></h1>
	
	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<h3><?php the_field('subtitle');?></h3>
	
		<?php the_content(); ?>

		<?php $nextPost = get_field('next_post');

			// print_r($nextPost);


		 ?>

		 <h2 class="next-post">
		 	<a href="<?php echo get_permalink($nextPost[0]->ID); ?>"><?php _e('NEXT','wenco') ?>: <?php echo $nextPost[0]->post_title; ?></a>
		 </h2>
	
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'forge_saas' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'forge_saas' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</article><!-- #post-## -->
