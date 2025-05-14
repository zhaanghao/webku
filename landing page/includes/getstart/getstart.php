<?php
//about theme info
add_action( 'admin_menu', 'fast_food_delivery_gettingstarted' );
function fast_food_delivery_gettingstarted() {
	add_theme_page( esc_html__('Fast Food Delivery', 'fast-food-delivery'), esc_html__('Fast Food Delivery', 'fast-food-delivery'), 'edit_theme_options', 'fast_food_delivery_about', 'fast_food_delivery_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function fast_food_delivery_admin_theme_style() {
	wp_enqueue_style('fast-food-delivery-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('fast-food-delivery-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'fast_food_delivery_admin_theme_style');

// Changelog
if ( ! defined( 'FAST_FOOD_DELIVERY_CHANGELOG_URL' ) ) {
    define( 'FAST_FOOD_DELIVERY_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function fast_food_delivery_changelog_screen() {	
	global $wp_filesystem;
	$fast_food_delivery_changelog_file = apply_filters( 'fast_food_delivery_changelog_file', FAST_FOOD_DELIVERY_CHANGELOG_URL );
	if ( $fast_food_delivery_changelog_file && is_readable( $fast_food_delivery_changelog_file ) ) {
		WP_Filesystem();
		$fast_food_delivery_changelog = $wp_filesystem->get_contents( $fast_food_delivery_changelog_file );
		$fast_food_delivery_changelog_list = fast_food_delivery_parse_changelog( $fast_food_delivery_changelog );
		echo wp_kses_post( $fast_food_delivery_changelog_list );
	}
}

function fast_food_delivery_parse_changelog( $fast_food_delivery_content ) {
	$fast_food_delivery_content = explode ( '== ', $fast_food_delivery_content );
	$fast_food_delivery_changelog_isolated = '';
	foreach ( $fast_food_delivery_content as $key => $fast_food_delivery_value ) {
		if (strpos( $fast_food_delivery_value, 'Changelog ==') === 0) {
	    	$fast_food_delivery_changelog_isolated = str_replace( 'Changelog ==', '', $fast_food_delivery_value );
	    }
	}
	$fast_food_delivery_changelog_array = explode( '= ', $fast_food_delivery_changelog_isolated );
	unset( $fast_food_delivery_changelog_array[0] );
	$fast_food_delivery_changelog = '<div class="changelog">';
	foreach ( $fast_food_delivery_changelog_array as $fast_food_delivery_value) {
		$fast_food_delivery_value = preg_replace( '/\n+/', '</span><span>', $fast_food_delivery_value );
		$fast_food_delivery_value = '<div class="block"><span class="heading">= ' . $fast_food_delivery_value . '</span></div><hr>';
		$fast_food_delivery_changelog .= str_replace( '<span></span>', '', $fast_food_delivery_value );
	}
	$fast_food_delivery_changelog .= '</div>';
	return wp_kses_post( $fast_food_delivery_changelog );
}

//guidline for about theme
function fast_food_delivery_mostrar_guide() { 
	//custom function about theme customizer
	$fast_food_delivery_return = add_query_arg( array()) ;
	$fast_food_delivery_theme = wp_get_theme( 'fast-food-delivery' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Fast Food Delivery', 'fast-food-delivery' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'fast-food-delivery' ); ?>: <?php echo esc_html($fast_food_delivery_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="fast_food_delivery_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'fast-food-delivery' ); ?></button>
				<button class="tablinks" onclick="fast_food_delivery_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'fast-food-delivery' ); ?></button>
				<button class="tablinks" onclick="fast_food_delivery_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'fast-food-delivery' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$fast_food_delivery_plugin_ins = Fast_Food_Delivery_Plugin_Activation_WPElemento_Importer::get_instance();
					$fast_food_delivery_actions = $fast_food_delivery_plugin_ins->fast_food_delivery_recommended_actions;
					?>
					<div class="fast-food-delivery-recommended-plugins ">
							<div class="fast-food-delivery-action-list">
								<?php if ($fast_food_delivery_actions): foreach ($fast_food_delivery_actions as $fast_food_delivery_key => $fast_food_delivery_actionValue): ?>
										<div class="fast-food-delivery-action" id="<?php echo esc_attr($fast_food_delivery_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($fast_food_delivery_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($fast_food_delivery_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($fast_food_delivery_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'fast-food-delivery'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'fast-food-delivery'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'fast-food-delivery'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'fast-food-delivery'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'fast-food-delivery'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'fast-food-delivery'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'fast-food-delivery'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'fast-food-delivery'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( FAST_FOOD_DELIVERY_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'fast-food-delivery'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'fast-food-delivery'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'fast-food-delivery'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( FAST_FOOD_DELIVERY_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'fast-food-delivery'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'fast-food-delivery'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'fast-food-delivery'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( FAST_FOOD_DELIVERY_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'fast-food-delivery'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'fast-food-delivery' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','fast-food-delivery'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','fast-food-delivery'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','fast-food-delivery'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','fast-food-delivery'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php fast_food_delivery_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'fast-food-delivery'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Food Delivery WordPress Theme', 'fast-food-delivery'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( FAST_FOOD_DELIVERY_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'fast-food-delivery'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( FAST_FOOD_DELIVERY_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'fast-food-delivery'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( FAST_FOOD_DELIVERY_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'fast-food-delivery'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'fast-food-delivery'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'fast-food-delivery' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'fast-food-delivery' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'fast-food-delivery' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'fast-food-delivery' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'fast-food-delivery' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'fast-food-delivery' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'fast-food-delivery'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( FAST_FOOD_DELIVERY_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'fast-food-delivery'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'fast-food-delivery' ); ?></h3>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<?php } ?>