<?php
/**
 * Template Name: Resources
 *
 * @package Forge Saas
 */


$fs_custom_error = 0;
if(isset($wp_query->query_vars['resource_id'])) {
	// They want to access a specific file and came from a notification email
	$resource_id = urldecode($wp_query->query_vars['resource_id']);

	// Check that the file exists
	if(wp_get_attachment_url(intval($resource_id))):
		$resources_cookie = 0;
		$resources_cookie = $_COOKIE['resourcesUnlockedStatus'];
		// Check if they have the cookie from form submission
		if(intval($resources_cookie) === 1):
			setcookie("resourcesUnlockedStatus", 2, 315360000000,"/");// Set a cookie for 10 years that will let them access as many resources as they want
			$download_file_url = wp_get_attachment_url(intval($resource_id));	
			header('Location:'.$download_file_url);// Send them to their download link		
		elseif(intval($resources_cookie) === 2):
			$download_file_url = wp_get_attachment_url(intval($resource_id));	
			header('Location:'.$download_file_url);// Send them to their download link
		else:
			// No cookie set
			$fs_custom_error = 1;
		endif;
	else:
		// The file doesnt exist
		$fs_custom_error = 2;
	endif;
}
get_header(); 
?>
		
	<div class="row content-area">		
	
		<div id="content" class="large-8 columns site-content" role="main">

			<?php
				if($fs_custom_error > 0):
					echo'<div style="border:1px solid red; border-radius:5px; padding:5px;margin:10px 0px 20px 0px;">';
					if($fs_custom_error == 1):
						echo 'You tried to access a resource file without submitting your email address and verifying it.';
					elseif($fs_custom_error == 2):
						echo'The resource file you are trying to access does not exist';
					endif;
					echo'</div>';
				endif;
			?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

			<div class="resource-files">
				<?php while(has_sub_fields('resources')): ?>
					<h4><?php the_sub_field('category_title'); ?></h4>
					<ul class="resource-list">
						<?php while(has_sub_field('files')): ?>
						<li>
							<?php
							$unlocked_resources = 0;
							$unlocked_resources = $_COOKIE['resourcesUnlockedStatus'];
							$file_url = wp_get_attachment_url( get_sub_field('file') );	
							
							// Check if they have a cookie from confirming their email address
							if(get_sub_field('locked') && $unlocked_resources != 2 ):							
							?>
								<a class="locked resource" data-file-id="<?php the_sub_field('file'); ?>" data-reveal-id="unlockResource" data-file-url="<?php echo $file_url; ?>" >
								<span><?php the_sub_field('title'); ?></span></a>
							<?php
							else:
							?>
								<a class="resource" href="<?php echo $file_url; ?>" target="_blank">
								<span><?php the_sub_field('title'); ?></span></a>
							<?php
							endif;
							?>
						</li>
						<?php endwhile; ?>
					</ul>

				<?php endwhile; ?>
			</div>


		</div><!-- #content -->

		<?php get_sidebar(); ?>

	</div>

	<div id="unlockResource" class="reveal-modal" data-reveal>
		<h2><?php the_field('resource_popup_title');?></h2>
		<p><?php the_field('resource_popup_body');?></p>
		<?php
			gravity_form(4, false, false, false, '', true, false);
		?>
		<a class="close-reveal-modal">&#215;</a>
	</div>	

	<script>
	// Function to create a cookie
	function createCookie(name, value, days) {
	    if (days) {
	        var date = new Date();
	        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
	        var expires = "; expires=" + date.toGMTString();
	    }
	    else var expires = "";
	    document.cookie = name + "=" + value + expires + "; path=/";
	}

	// Watch for clicks of download links
	jQuery( document ).ready(function( $ ) {
		$( ".resource-list" ).on( "click", ".locked.resource", function() {
			$('.locked.resource.active').removeClass('active');
			// Lets mark our active download so we know which link to send after the form completes			
			$(this).addClass("active");
			var fileid = $(this).data("file-id");
			// Put the file id into the hidden download id field of the gravity form
			$("#input_4_2").val(fileid);
		});
	});	

	// Watch for gravity form completions
	jQuery(document).bind('gform_confirmation_loaded', function(event, form_id){
		if(form_id == 4) {
			createCookie('resourcesUnlockedStatus',1,3650);//This saves a cookie saying they submitted the form
	    }
	});
	</script>
		
<?php get_footer(); ?>
