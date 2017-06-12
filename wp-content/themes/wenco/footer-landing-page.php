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

	<footer id="colophon" class="site-footer panel">

		<div class="bottom-footer">
		
			<div class="row">
				
				<div class="left large-5 columns">
					<p>&copy; <?php echo date('Y'); ?> <?php the_field('company_copyright_name', 'options'); ?>.</p>
          <p>All rights reserved.</p>
				</div>

        <div class="middle large-4 columns">
          <p>Questions? <a href="/contact">Contact Us</a></p>
				</div>

        <div class="logo large-3 columns">
					<!--[if gte IE 9]><!-->
            <img height="72" src="<?php echo get_stylesheet_directory_uri();?>/images/logo-2color-w.svg" />
          <!--<![endif]-->
            <!--[if lt IE 9]><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo-2color-w.png" /><![endif]-->						
				</div>

			</div>

		</div>

	</footer><!-- #colophon -->

</div> <!-- #st-container -->

<?php wp_footer(); ?>



<script>
	jQuery(document).foundation();
</script>
</body>
</html>
