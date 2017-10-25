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
					<p>&copy; <?php echo date('Y'); ?> Wenco International Mining Systems Ltd.</p>
          <p>
            <?php
            if (ICL_LANGUAGE_CODE == 'es') {
              echo 'Todos los derechos reservados.';
            }elseif(ICL_LANGUAGE_CODE == 'ru'){
              echo 'Все права защищены.';
            }elseif(ICL_LANGUAGE_CODE == 'fr'){
              echo 'Tous les droits sont réservés.';
            }else{
              echo 'All rights reserved.';
            }
            ?>
          </p>
				</div>

        <div class="middle large-4 columns">
          <p>
            <?php
            if (ICL_LANGUAGE_CODE == 'es') {
              echo '¿Preguntas? <a href="/es/contactos">Contáctenos</a>';
            }elseif(ICL_LANGUAGE_CODE == 'ru'){
              echo 'Вопросов? <a href="/ru/contact-russian">Свяжитесь с нами</a>';
            }elseif(ICL_LANGUAGE_CODE == 'fr'){
              echo 'Des questions? <a href="/fr/contact/">Contactez nous</a>';
            }else{
              echo 'Questions? <a href="/contact">Contact Us</a>';
            }
            ?>
          </p>
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
