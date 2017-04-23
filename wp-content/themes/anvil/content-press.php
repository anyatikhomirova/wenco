<?php
/**
 * The template used for displaying page content in page-press.php
 *
 * @package Forge Saas
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

	<div class="row">

		<div class="large-12 columns">
			
			<header class="entry-header">
				
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
			</header><!-- .entry-header -->
		
			<div class="entry-content">
			
				<p>
					<?php echo excerpt(55); ?>				
				</p>

				<a href="<?php the_permalink(); ?>" class="read-more"><?php _e( "Read More", 'forge_saas' );?> »</a>
			</div><!-- .entry-content -->
		
			<?php edit_post_link( __( 'Edit', 'forge_saas' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

		</div>

	</div>
	
</article><!-- #post-## -->
