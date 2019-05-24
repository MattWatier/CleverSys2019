<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the custom type
function custom_post_example() { 
	
	
	register_post_type( 'csi_behavioral_task', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Behavioral Tasks', 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __('Behavioral Task', 'post type singular name'), /* This is the individual type */
			'add_new' => __('Add Behavior', 'gallery panel item'), /* The add new menu item */
			'add_new_item' => __('Add New Behavioral Task'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Behavior'), /* Edit Display Title */
			'new_item' => __('New Behavior'), /* New Display Title */
			'view_item' => __('View Behavior'), /* View Display Title */
			'search_items' => __('Search Behaviors'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Behavioral Tasks are associated with software and hardware' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', 'revisions')
				 	) /* end of options */
	); /* end of register post type */
		
		
	
	/* this ads your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'csi_behavioral_task');
	/* this ads your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'csi_behavioral_task');
	
} 
function custom_post_example2() { 
	// creating (registering) the custom type 
	/*  Product Type  */
	register_post_type( 'csi_products', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Products & Services', 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __('Product', 'post type singular name'), /* This is the individual type */
			'add_new' => __('Add Product', 'gallery panel item'), /* The add new menu item */
			'add_new_item' => __('Add New Product'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Product'), /* Edit Display Title */
			'new_item' => __('New Product'), /* New Display Title */
			'view_item' => __('View Product'), /* View Display Title */
			'search_items' => __('Search Products'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is a basic product or service provided by cleversys inc.' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor',  'revisions')
			
	 	) /* end of options */
	); /* end of register post type */
	/* this ads your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'csi_product');
	/* this ads your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'csi_product');
} 






	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_example');
	add_action( 'init', 'custom_post_example2');
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'custom_product_cat', 
    	array('csi_products'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Product Type' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Product Type' ), /* single taxonomy name */
    			'search_items' =>  __( 'Product Type' ), /* search title for taxomony */
    			'all_items' => __( 'All Products' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Type' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Product Type:' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Product Type' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Product Type' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Product Type' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Product Type Name' ) /* name title for taxonomy */
    		),
    		'show_ui' => true,
    		'query_var' => true,
    	)
    ); 
    register_taxonomy( 'software-suite', 
    	array('csi_products'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Software Suite' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Suite Group' ), /* single taxonomy name */
    			'search_items' =>  __( 'Suite Group' ), /* search title for taxomony */
    			'all_items' => __( 'All Suites' ), /* all title for taxonomies */
    			'parent_item' => __( 'Suite' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Software Suite:' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Software Suite' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Software Suite' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Software Suite' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Software Suite' ) /* name title for taxonomy */
    		),
    		'show_ui' => true,
    		'query_var' => true,
    	)
    );   
	 register_taxonomy( 'behaviors', 
    	array('csi_products'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Detectable Behaviors' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Behavior' ), /* single taxonomy name */
    			'search_items' =>  __( 'Detectable Behaviors' ), /* search title for taxomony */
    			'all_items' => __( 'All Behaviors' ), /* all title for taxonomies */
    			'parent_item' => __( 'Detectable Behaviors' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Detectable Behaviors:' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Detectable Behaviors' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Detectable Behaviors' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Detectable Behaviors' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Detectable Behaviors' ) /* name title for taxonomy */
    		),
    		'show_ui' => true,
    		'query_var' => true,
    	)
    );   
    
    
      
   register_taxonomy( 'custom_behavior_cat', 
   	array('csi_behavioral_task'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
   	array('hierarchical' => false,     /* if this is true it acts like categories */             
   		'labels' => array(
   			'name' => __( 'Behavior Groups' ), /* name of the custom taxonomy */
   			'singular_name' => __( 'Behavior Group' ), /* single taxonomy name */
   			'search_items' =>  __( 'Behavior Group' ), /* search title for taxomony */
   			'all_items' => __( 'All Behavior Groups' ), /* all title for taxonomies */
   			'parent_item' => __( 'Parent Group' ), /* parent title for taxonomy */
   			'parent_item_colon' => __( 'Parent Groups:' ), /* parent taxonomy title */
   			'edit_item' => __( 'Edit Behavior Group' ), /* edit custom taxonomy title */
   			'update_item' => __( 'Update Behavior Group' ), /* update title for taxonomy */
   			'add_new_item' => __( 'Add New Behavior Group' ), /* add new title for taxonomy */
   			'new_item_name' => __( 'New Group Name' ) /* name title for taxonomy */
   		),
   		'show_ui' => true,
   		'query_var' => true,
   	)
 );   

// CREATE COLUMNS IN CUSTOM POST TYPE LISTING

add_filter( 'manage_edit-csi_products_columns', 'my_columns' );

function my_columns( $columns ) {
        $columns['custom_product_cat'] = 'Type';
		unset( $columns['comments'] );
return $columns;
}
add_action( 'manage_posts_custom_column', 'populate_columns' );

function populate_columns( $column ) 
{
                     if ( 'custom_product_cat' == $column ) {
                     		$products_type =  wp_get_post_terms( get_the_ID(),'custom_product_cat', array("fields" => "names") ) ;
                            echo $products_type[0];
                         } 

 } 
    

?>