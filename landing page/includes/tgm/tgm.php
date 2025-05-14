<?php
	
require get_template_directory() . '/includes/tgm/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function fast_food_delivery_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'fast-food-delivery' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WPElemento Importer', 'fast-food-delivery' ),
			'slug'             => 'wpelemento-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Advanced Product Search For WooCommerce', 'fast-food-delivery' ),
			'slug'             => 'advanced-product-search-for-woo',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Royal Elementor Addons', 'fast-food-delivery' ),
			'slug'             => 'royal-elementor-addons',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'ShopLentor – WooCommerce Builder for Elementor & Gutenberg', 'fast-food-delivery' ),
			'slug'             => 'woolentor-addons',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Essential Addons for Elementor ', 'fast-food-delivery' ),
			'slug'             => 'essential-addons-for-elementor-lite',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'fast-food-delivery' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	fast_food_delivery_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'fast_food_delivery_register_recommended_plugins' );
