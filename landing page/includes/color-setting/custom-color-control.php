<?php

  $fast_food_delivery_theme_custom_setting_css = '';

	// Global Color
	$fast_food_delivery_theme_color = get_theme_mod('fast_food_delivery_theme_color', '#F3CB00');

	$fast_food_delivery_theme_custom_setting_css .=':root {';
		$fast_food_delivery_theme_custom_setting_css .='--primary-theme-color: '.esc_attr($fast_food_delivery_theme_color ).'!important;';
	$fast_food_delivery_theme_custom_setting_css .='}';

	// Scroll to top alignment
	$fast_food_delivery_scroll_alignment = get_theme_mod('fast_food_delivery_scroll_alignment', 'right');

    if($fast_food_delivery_scroll_alignment == 'right'){
        $fast_food_delivery_theme_custom_setting_css .='.scroll-up{';
            $fast_food_delivery_theme_custom_setting_css .='right: 30px;!important;';
			$fast_food_delivery_theme_custom_setting_css .='left: auto;!important;';
        $fast_food_delivery_theme_custom_setting_css .='}';
    }else if($fast_food_delivery_scroll_alignment == 'center'){
        $fast_food_delivery_theme_custom_setting_css .='.scroll-up{';
            $fast_food_delivery_theme_custom_setting_css .='left: calc(50% - 10px) !important;';
        $fast_food_delivery_theme_custom_setting_css .='}';
    }else if($fast_food_delivery_scroll_alignment == 'left'){
        $fast_food_delivery_theme_custom_setting_css .='.scroll-up{';
            $fast_food_delivery_theme_custom_setting_css .='left: 30px;!important;';
			$fast_food_delivery_theme_custom_setting_css .='right: auto;!important;';
        $fast_food_delivery_theme_custom_setting_css .='}';
    }	

	// Related Product

	$fast_food_delivery_show_related_product = get_theme_mod('fast_food_delivery_show_related_product', true );

	if($fast_food_delivery_show_related_product != true){
		$fast_food_delivery_theme_custom_setting_css .='.related.products{';
			$fast_food_delivery_theme_custom_setting_css .='display: none;';
		$fast_food_delivery_theme_custom_setting_css .='}';
	}    