<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));

	Kirki::add_field( 'theme_config_id', [
        'type'        => 'slider',
        'settings'    => 'fast_food_delivery_logo_resizer',
        'label'       => __( 'Logo Size', 'fast-food-delivery' ),
        'section'     => 'title_tagline',
        'default'     => 150,
        'choices'     => [
            'min'   => 50,
            'max'   => 300,
            'step'  => 1,
        ],
    ] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fast_food_delivery_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'fast-food-delivery' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fast-food-delivery' ),
			'off' => esc_html__( 'Disable', 'fast-food-delivery' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fast_food_delivery_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'fast-food-delivery' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fast-food-delivery' ),
			'off' => esc_html__( 'Disable', 'fast-food-delivery' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'fast_food_delivery_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'fast_food_delivery_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	// Theme color

	Kirki::add_section( 'fast_food_delivery_theme_color_setting', array(
		'title'    => __( 'Color Option', 'fast-food-delivery' ),
		'priority' => 10,
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'fast_food_delivery_theme_color',
		'label'       => __( 'Theme color', 'fast-food-delivery'),
		'description'    => esc_html__( 'To customize the colors of the homepage, use the Elementor editor', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_theme_color_setting',
		'type'        => 'color',
		'default'     => '#F3CB00',
	) );

// TYPOGRAPHY SETTINGS

	Kirki::add_panel( 'fast_food_delivery_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'fast-food-delivery' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'fast_food_delivery_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_h1_typography_heading',
		'section'     => 'fast_food_delivery_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'fast_food_delivery_h1_typography_font',
		'section'   =>  'fast_food_delivery_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h1',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 2 Section

	Kirki::add_section( 'fast_food_delivery_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_h2_typography_heading',
		'section'     => 'fast_food_delivery_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'fast_food_delivery_h2_typography_font',
		'section'   =>  'fast_food_delivery_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'fast_food_delivery_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_h3_typography_heading',
		'section'     => 'fast_food_delivery_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'fast_food_delivery_h3_typography_font',
		'section'   =>  'fast_food_delivery_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'fast_food_delivery_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_h4_typography_heading',
		'section'     => 'fast_food_delivery_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'fast_food_delivery_h4_typography_font',
		'section'   =>  'fast_food_delivery_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'fast_food_delivery_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_h5_typography_heading',
		'section'     => 'fast_food_delivery_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'fast_food_delivery_h5_typography_font',
		'section'   =>  'fast_food_delivery_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'fast_food_delivery_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_h6_typography_heading',
		'section'     => 'fast_food_delivery_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'fast_food_delivery_h6_typography_font',
		'section'   =>  'fast_food_delivery_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'fast_food_delivery_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_body_typography_heading',
		'section'     => 'fast_food_delivery_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'fast_food_delivery_body_typography_font',
		'section'   =>  'fast_food_delivery_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Hind Madurai', sans-serif",
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) );

	// Theme Options Panel
	Kirki::add_panel( 'fast_food_delivery_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'fast-food-delivery' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'fast_food_delivery_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'fast-food-delivery' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'fast-food-delivery' ),
	    'panel'    => 'fast_food_delivery_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fast_food_delivery_login_enable',
		'label'       => esc_html__( 'Enable/Disable Login', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fast-food-delivery' ),
			'off' => esc_html__( 'Disable', 'fast-food-delivery' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fast_food_delivery_cart_box_enable',
		'label'       => esc_html__( 'Enable/Disable Shopping Cart', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fast-food-delivery' ),
			'off' => esc_html__( 'Disable', 'fast-food-delivery' ),
		],
	] );
	
	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'fast_food_delivery_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'fast-food-delivery' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'fast-food-delivery' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'fast-food-delivery' ),
		'settings'    => 'fast_food_delivery_shop_page_layout',
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'fast-food-delivery' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'fast-food-delivery' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'fast_food_delivery_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]

	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'fast-food-delivery' ),
		'settings'    => 'fast_food_delivery_products_per_row',
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'fast-food-delivery' ),
		'settings'    => 'fast_food_delivery_products_per_page',
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'fast-food-delivery' ),
		'settings'    => 'fast_food_delivery_single_product_sidebar_layout',
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'fast-food-delivery' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'fast-food-delivery' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'fast_food_delivery_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_products_button_border_radius_heading',
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'fast_food_delivery_products_button_border_radius',
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_sale_badge_position_heading',
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'fast_food_delivery_sale_badge_position',
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'fast-food-delivery' ),
			'left' => esc_html__( 'Left', 'fast-food-delivery' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_products_sale_font_size_heading',
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'fast_food_delivery_products_sale_font_size',
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_show_related_product_heading',
		'section'     => 'fast_food_delivery_woocommerce_settings',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Related Product', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_show_related_product',
		'label'       => esc_html__( 'Enable or Disable Related Product', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'fast_food_delivery_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'fast-food-delivery' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_theme_options_panel',
		'priority'       => 10,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_scroll_alignment_heading',
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Position', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'radio-buttonset',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_scroll_alignment',
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => 'right',
		'choices'     => [
			'left' => esc_html__( 'left', 'fast-food-delivery' ),
			'center' => esc_html__( 'center', 'fast-food-delivery' ),
			'right' => esc_html__( 'right', 'fast-food-delivery' ),
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_scroller_border_radius_heading',
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Border Radius', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'slider',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_scroller_border_radius',
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => '3',
		'choices'     => [
			'min'  => 0,
			'max'  => 25,
			'step' => 1,
		],
		'output' => array(
			array(
				'element'  => '.scroll-up a',
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_cursor_outline_heading',
		'section'     => 'fast_food_delivery_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Dot Cursor', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_cursor_outline',
		'label'       => esc_html__( 'Enable or Disable Dot Cursor', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_progress_bar_heading',
		'section'     => 'fast_food_delivery_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_progress_bar',
		'label'       => esc_html__( 'Enable or Disable Progress Bar', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_progress_bar_position_heading',
		'section'     => 'fast_food_delivery_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar Position', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
		'active_callback'  => [
			[
				'setting'  => 'fast_food_delivery_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_progress_bar_position',
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => 'top',
		'choices'     => [
			'top' => esc_html__( 'Top', 'fast-food-delivery' ),
			'bottom' => esc_html__( 'Bottom', 'fast-food-delivery' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'fast_food_delivery_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'fast_food_delivery_progress_bar_color_heading',
		'section'     => 'fast_food_delivery_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar Color', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
		'active_callback'  => [
			[
				'setting'  => 'fast_food_delivery_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'fast_food_delivery_progress_bar_color',
		'tab'      => 'general',
		'label'       => __( 'Color', 'fast-food-delivery' ),
		'type'        => 'color',
		'section'     => 'fast_food_delivery_additional_setting',
		'transport' => 'auto',
		'default'     => '#F3CB00',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '#elemento-progress-bar',
				'property' => 'background-color',
			),
		),
		'active_callback'  => [
			[
				'setting'  => 'fast_food_delivery_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_single_page_layout_heading',
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'fast_food_delivery_single_page_layout',
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'fast-food-delivery' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'fast-food-delivery' ),
			'One Column' => esc_html__( 'One Column', 'fast-food-delivery' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_header_background_attachment_heading',
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'fast_food_delivery_header_background_attachment',
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'fast-food-delivery' ),
			'fixed' => esc_html__( 'Fixed', 'fast-food-delivery' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_header_overlay_heading',
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'fast_food_delivery_header_overlay_setting',
		'label'       => __( 'Overlay Color', 'fast-food-delivery' ),
		'type'        => 'color',
		'section'     => 'fast_food_delivery_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000059',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'fast_food_delivery_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'fast-food-delivery' ),
		'description'    => esc_html__( 'Here you can add post information.', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_post_layout_heading',
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'fast_food_delivery_post_layout',
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'fast-food-delivery' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'fast-food-delivery' ),
			'One Column' => esc_html__( 'One Column', 'fast-food-delivery' ),
			'Three Columns' => esc_html__( 'Three Columns', 'fast-food-delivery' ),
			'Four Columns' => esc_html__( 'Four Columns', 'fast-food-delivery' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_length_setting_heading',
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'fast_food_delivery_length_setting',
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_show_pagination_heading',
		'section'     => 'fast_food_delivery_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Pagination', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_show_pagination',
		'label'       => esc_html__( 'Enable or Disable Blog Post Pagination', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_single_post_date_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Date', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_single_post_author_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Author', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_single_post_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Comment', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'fast-food-delivery' ),
		'settings'    => 'fast_food_delivery_single_post_tag',
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'fast-food-delivery' ),
		'settings'    => 'fast_food_delivery_single_post_category',
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_single_post_radius',
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'fast_food_delivery_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'fast-food-delivery' ),
		'type'        => 'text',
		'section'     => 'fast_food_delivery_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'fast_food_delivery_show_related_post_heading',
		'section'     => 'fast_food_delivery_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Related post', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'fast_food_delivery_show_related_post',
		'label'       => esc_html__( 'Enable or Disable Related post', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	// No Results Page Settings

	Kirki::add_section( 'fast_food_delivery_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_page_not_found_title_heading',
		'section'     => 'fast_food_delivery_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fast_food_delivery_page_not_found_title',
		'section'  => 'fast_food_delivery_no_result_section',
		'default'  => esc_html__('404 Error!', 'fast-food-delivery'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_page_not_found_text_heading',
		'section'     => 'fast_food_delivery_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fast_food_delivery_page_not_found_text',
		'section'  => 'fast_food_delivery_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'fast-food-delivery'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'fast_food_delivery_page_not_found_line_break',
		'section'  => 'fast_food_delivery_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_no_results_title_heading',
		'section'     => 'fast_food_delivery_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fast_food_delivery_no_results_title',
		'section'  => 'fast_food_delivery_no_result_section',
		'default'  => esc_html__('Nothing Found', 'fast-food-delivery'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_no_results_content_heading',
		'section'     => 'fast_food_delivery_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fast_food_delivery_no_results_content',
		'section'  => 'fast_food_delivery_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fast-food-delivery'),
	] );
	
	// FOOTER SECTION

	Kirki::add_section( 'fast_food_delivery_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'fast-food-delivery' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'fast-food-delivery' ),
        'panel'    => 'fast_food_delivery_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_show_footer_widget_heading',
		'section'     => 'fast_food_delivery_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_show_footer_widget',
		'label'       => esc_html__( 'Footer Widget', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_show_footer_copyright',
		'label'       => esc_html__( 'Footer Copyright', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_footer_text_heading',
		'section'     => 'fast_food_delivery_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fast_food_delivery_footer_text',
		'section'  => 'fast_food_delivery_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_footer_enable_heading',
		'section'     => 'fast_food_delivery_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fast_food_delivery_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fast-food-delivery' ),
			'off' => esc_html__( 'Disable', 'fast-food-delivery' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_footer_background_widget_heading',
		'section'     => 'fast_food_delivery_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'fast_food_delivery_footer_background_widget',
		'type'        => 'background',
		'section'     => 'fast_food_delivery_footer_section',
		'default'     => [
			'background-color'      => 'rgba(18, 18, 18,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],                        
	]);

	// Footer Social Icons Section

	Kirki::add_section( 'fast_food_delivery_footer_social_media_section', array(
		'title'          => esc_html__( 'Footer Social Icons', 'fast-food-delivery' ),
		'panel'    => 'fast_food_delivery_theme_options_panel',
		'priority'       => 160,
	) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_footer_social_icon_hide_heading',
		'section'     => 'fast_food_delivery_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable or Disable your Footer Social Icon', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fast_food_delivery_footer_social_icon_hide',
		'label'       => esc_html__( 'Enable or Disable Social Icon.', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_footer_social_media_section',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fast_food_delivery_enable_footer_socail_link_align_heading',
		'section'     => 'fast_food_delivery_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Text Align', 'fast-food-delivery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'fast_food_delivery_enable_footer_socail_link_align',
		'type'        => 'select',
		'priority'    => 10,
		'label'       => __( 'Text Align', 'fast-food-delivery' ),
		'section'     => 'fast_food_delivery_footer_social_media_section',
		'default'     => 'left',
		'choices'     => [
			'center' => esc_html__( 'center', 'fast-food-delivery' ),
			'right' => esc_html__( 'right', 'fast-food-delivery' ),
			'left' => esc_html__( 'left', 'fast-food-delivery' ),
		],
		'output' => array(
			array(
				'element'  => array( '.footer-links'),
				'property' => 'text-align',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'priority'    => 10,
		'settings'    => 'fast_food_delivery_enable_footer_socail_link',
		'section'     => 'fast_food_delivery_footer_social_media_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Link', 'fast-food-delivery' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'priority'    => 10,
		'section'     => 'fast_food_delivery_footer_social_media_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icons', 'fast-food-delivery' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'fast-food-delivery' ),
		'settings'     => 'fast_food_delivery_social_links_settings_footer',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'fast-food-delivery' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'fast-food-delivery' ). ' <a href="https://fontawesome.com/search?o=r&m=free&f=brands" target="_blank"><strong>' . esc_html__( 'View All', 'fast-food-delivery' ) . ' </strong></a>',
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'fast-food-delivery' ),
				'description' => esc_html__( 'Add the social icon url here.', 'fast-food-delivery' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );
}
