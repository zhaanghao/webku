<?php

class Whizzie {

	public function __construct() {
		$this->init();
	}

	public function init()
	{
	
	}

	public static function fast_food_delivery_setup_widgets(){

	$fast_food_delivery_product_image_gallery = array();
	$fast_food_delivery_product_ids = array();

	$fast_food_delivery_product_category= array(
		'Banner Product'       => array(
			'Veg Chees Pizza',
			'Veg Pasta',
			'Chicken Chili',
		),
		'Pizza'       => array(
			'Noodle With Black Beans',
			'Japanese Noodles',
			'Indian Noodles',
		),
		'Burger'       => array(
			'Japanese Noodles',
			'Indian Noodles',
			'Noodle With Black Beans',
		),
		'Noodles'       => array(
			'Indian Noodles',
			'Noodle With Black Beans',
			'Japanese Noodles',
		),
		'Cakes'       => array(
			'Japanese Noodles',
			'Noodle With Black Beans',
			'Indian Noodles',
		),
		'Soft Drinks'       => array(
			'Japanese Noodles',
			'Noodle With Black Beans',
			'Indian Noodles',
		),
	);
	$fast_food_delivery_k = 1;
	foreach ( $fast_food_delivery_product_category as $fast_food_delivery_product_cats => $fast_food_delivery_products_name ) { 
	// Insert porduct cats Start
	$content = 'This is sample product category';
	$fast_food_delivery_parent_category	=	wp_insert_term(
	$fast_food_delivery_product_cats, // the term
	'product_cat', // the taxonomy
		array(
		'description'=> $content,
		'slug' => str_replace( ' ', '-', $fast_food_delivery_product_cats)
		)
	);

// -------------- create subcategory END -----------------

	$fast_food_delivery_n=1;
	// create Product START
	foreach ( $fast_food_delivery_products_name as $key => $fast_food_delivery_product_title ) {
	$content = '
		<div class="main_content">
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		</div>';

	// Create post object
	$fast_food_delivery_my_post = array(
		'post_title'    => wp_strip_all_tags( $fast_food_delivery_product_title ),
		'post_content'  => $content,
		'post_status'   => 'publish',
		'post_type'     => 'product',
		'post_category' => [$fast_food_delivery_parent_category['term_id']]
	);

	// Insert the post into the database

	$fast_food_delivery_uqpost_id = wp_insert_post($fast_food_delivery_my_post);
	wp_set_object_terms( $fast_food_delivery_uqpost_id, str_replace( ' ', '-', $fast_food_delivery_product_cats), 'product_cat', true );

	$fast_food_delivery_product_price = array('39','49','69');
	$fast_food_delivery_product_regular_price = array('99','98','97');
	$fast_food_delivery_product_sale_price = array('39','49','69');
	
	update_post_meta( $fast_food_delivery_uqpost_id, '_regular_price', $fast_food_delivery_product_regular_price[$fast_food_delivery_n-1] );
	update_post_meta( $fast_food_delivery_uqpost_id, '_price', $fast_food_delivery_product_price[$fast_food_delivery_n-1] );
	update_post_meta( $fast_food_delivery_uqpost_id, '_sale_price', $fast_food_delivery_product_sale_price[$fast_food_delivery_n-1] );
	array_push( $fast_food_delivery_product_ids,  $fast_food_delivery_uqpost_id );

	// Now replace meta w/ new updated value array
	$fast_food_delivery_image_url = get_template_directory_uri().'/assets/images/product/'.$fast_food_delivery_product_cats.'/' . str_replace(' ', '_', strtolower($fast_food_delivery_product_title)).'.png';
	$fast_food_delivery_image_name  = $fast_food_delivery_product_title.'.png';
	$fast_food_delivery_upload_dir = wp_upload_dir();
	// Set upload folder
	$fast_food_delivery_image_data = file_get_contents(esc_url($fast_food_delivery_image_url));
	// Get image data
	$unique_file_name = wp_unique_filename($fast_food_delivery_upload_dir['path'], $fast_food_delivery_image_name);
	// Generate unique name
	$fast_food_delivery_filename = basename($unique_file_name);
	// Create image file name
	// Check folder permission and define file location
	if (wp_mkdir_p($fast_food_delivery_upload_dir['path'])) {
	$fast_food_delivery_file = $fast_food_delivery_upload_dir['path'].'/'.$fast_food_delivery_filename;
	} else {
	$fast_food_delivery_file = $fast_food_delivery_upload_dir['basedir'].'/'.$fast_food_delivery_filename;
	}
	
	file_put_contents($fast_food_delivery_file, $fast_food_delivery_image_data);
	// Check image file type
	$wp_filetype = wp_check_filetype($fast_food_delivery_filename, null);
	// Set attachment data
	$attachment = array(
	'post_mime_type' => $wp_filetype['type'],
	'post_title'     => sanitize_file_name($fast_food_delivery_filename),
	'post_type'      => 'product',
	'post_status'    => 'inherit',
	);

	// Create the attachment
	$fast_food_delivery_attach_id = wp_insert_attachment($attachment, $fast_food_delivery_file, $fast_food_delivery_uqpost_id);

	// Define attachment metadata
	$attach_data = wp_generate_attachment_metadata($fast_food_delivery_attach_id, $fast_food_delivery_file);

	// Assign metadata to attachment
	wp_update_attachment_metadata($fast_food_delivery_attach_id, $attach_data);
	if ( count( $fast_food_delivery_product_image_gallery ) < 3 ) {
		array_push( $fast_food_delivery_product_image_gallery, $fast_food_delivery_attach_id );
	}
	// // And finally assign featured image to post
	set_post_thumbnail($fast_food_delivery_uqpost_id, $fast_food_delivery_attach_id);
	++$fast_food_delivery_n;
	}
	// Create product END
	++$fast_food_delivery_k;
	}
	// Add Gallery in first simple product and second variable product START
	$fast_food_delivery_product_image_gallery = implode( ',', $fast_food_delivery_product_image_gallery );
	foreach ( $fast_food_delivery_product_ids as $fast_food_delivery_product_id ) {
	update_post_meta( $fast_food_delivery_product_id, 'fast_food_delivery_product_image_gallery', $fast_food_delivery_product_image_gallery );
	}
}

}
 