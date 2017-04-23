<?php 
/**
 * Forge Saas Custom Post Types
 *
 * @package Forge Saas
 */

// let's create the function for the custom type
function forge_register_post_types() { 

	// pass in an array of post types. Define their post slug and labels
	$the_post_types = array(
		array( 
			'post_slug' 	=>	'press', 
			'post_label' 	=>	'Press Releases', 
			'post_single' 	=>	'Press Release',
			'has_archive' 	=>  true,
			'rewrite_slug'	=>  'our-press',
		),
		array( 
			'post_slug' 	=>	'technical-tips', 
			'post_label' 	=>	'Technical Tips', 
			'post_single' 	=>	'Technical Tip',
			'has_archive' 	=>  true,
			'rewrite_slug'	=>  'our-technical-tips',
		),		
		array( 
			'post_slug' 	=>	'jobs', 
			'post_label' 	=>	'Jobs', 
			'post_single' 	=>	'Job',
			'has_archive' 	=>  false,
			'rewrite_slug'	=>  'our-jobs',	
		),
		array( 
			'post_slug' 	=>	'features', 
			'post_label' 	=>	'Features', 
			'post_single' 	=>	'Feature',
			'has_archive' 	=>  false,
			'rewrite_slug'	=>  'core-system',		
		),
		array( 
			'post_slug' 	=>	'products', 
			'post_label' 	=>	'Products', 
			'post_single' 	=>	'Product',
			'has_archive' 	=>  false,
			'rewrite_slug'	=>  'solutions',		
		)		
	); 

	// loop through post type array and register post types
	foreach($the_post_types as $post_type){

		register_post_type( $post_type['post_slug'], /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		 	// let's now add all the options for this post type
			array('labels' => array(
				'name' 					=> __($post_type['post_label'], 'post type general name'), /* This is the Title of the Group */
				'singular_name' 		=> __($post_type['post_single'], 'post type singular name'), /* This is the individual type */
				'add_new' 				=> __('Add New', 'custom post type item'), /* The add new menu item */
				'add_new_item'			=> __('Add New '.$post_type['post_single'].''), /* Add New Display Title */
				'edit'					=> __( 'Edit' ), /* Edit Dialog */
				'edit_item'				=> __('Edit '.$post_type['post_single'].''), /* Edit Display Title */
				'new_item'				=> __('New '.$post_type['post_single']), /* New Display Title */
				'view_item'				=> __('View '.$post_type['post_single']), /* View Display Title */
				'search_items'			=> __('Search '.$post_type['post_single']), /* Search Custom Type Title */ 
				'not_found'				=>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
				'not_found_in_trash'	=> __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
				'parent_item_colon'		=> ''
				), /* end of arrays */
				'public' 				=> true,
				'publicly_queryable'	=> true,
				'exclude_from_search'	=> false,
				'has_archive'        	=> $post_type['has_archive'],
				'show_ui' 				=> true,
				'query_var' 			=> true,
				'menu_position'			=> 5, /* this is what order you want it to appear in on the left hand side menu */ 
				'rewrite'				=> array('with_front' => false, 'slug' => $post_type['rewrite_slug']),
				'capability_type'		=> 'post',
				'hierarchical'			=> false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports'				=> array( 'title', 'editor', 'author', 'thumbnail',  'comments', 'revisions')
		 	) /* end of options */
		); /* end of register post type */
		
		
	}

	// array used to register taxonomies for post types. 
	$taxonomy_types = array(
		array(
			'tax_slug'		=>	'product-types',
			'tax_label'		=>	'Product Types',
			'tax_single'	=>	'Product Type',	
			'post_type'		=>	'products'
		) 
	
	);

	// loop through $taxonomy_types and register taxonomies. 
	foreach($taxonomy_types as $taxonomy){
		
		register_taxonomy( $taxonomy['tax_slug'], 
	    	array($taxonomy['post_type']), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	    	array('hierarchical' => true,     /* if this is true it acts like categories */             
	    		'labels' => array(
	    			'name' 				=> __( $taxonomy['tax_label'] ), /* name of the custom taxonomy */
	    			'singular_name' 	=> __( $taxonomy['tax_single'] ), /* single taxonomy name */
	    			'search_items'		=>  __( 'Search '.$taxonomy['tax_label'] ), /* search title for taxomony */
	    			'all_items'			=> __( 'All '.$taxonomy['tax_label'] ), /* all title for taxonomies */
	    			'parent_item'		=> __( 'Parent '.$taxonomy['tax_single'] ), /* parent title for taxonomy */
	    			'parent_item_colon' => __( 'Parent '.$taxonomy['tax_single'].':' ), /* parent taxonomy title */
	    			'edit_item'			=> __( 'Edit '.$taxonomy['tax_single'] ), /* edit custom taxonomy title */
	    			'update_item'		=> __( 'Update '.$taxonomy['tax_single'] ), /* update title for taxonomy */
	    			'add_new_item'		=> __( 'Add New '.$taxonomy['tax_single'] ), /* add new title for taxonomy */
	    			'new_item_name'		=> __( 'New '.$taxonomy['tax_single'].' Name' ) /* name title for taxonomy */
	    		),
	    		'show_ui' => true,
	    		'query_var' => true,
	    	)
	    );  
		
		/* this ads your post categories to your custom post type */
		register_taxonomy_for_object_type($taxonomy['tax_slug'], $taxonomy['post_type']);

	}
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'forge_register_post_types');
