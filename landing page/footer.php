<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fast Food Delivery
 */

?>

<footer class="footer-side">
  <?php if( get_theme_mod( 'fast_food_delivery_show_footer_widget',true)) : ?>
    <div class="footer-widget">
      <div class="container">
        <?php
          // Check if any footer sidebar is active
          $fast_food_delivery_any_sidebar_active = false;
          for ( $fast_food_delivery_i = 1; $fast_food_delivery_i <= 4; $fast_food_delivery_i++ ) {
            if ( is_active_sidebar( "footer{$fast_food_delivery_i}-sidebar" ) ) {
              $fast_food_delivery_any_sidebar_active = true;
              break;
            }
          }
          // Count active for responsive column classes
          $fast_food_delivery_active_sidebars = 0;
          if ( $fast_food_delivery_any_sidebar_active ) {
            for ( $fast_food_delivery_i = 1; $fast_food_delivery_i <= 4; $fast_food_delivery_i++ ) {
              if ( is_active_sidebar( "footer{$fast_food_delivery_i}-sidebar" ) ) {
                $fast_food_delivery_active_sidebars++;
              }
            }
          }
          $fast_food_delivery_col_class = $fast_food_delivery_active_sidebars > 0 ? 'col-lg-' . (12 / $fast_food_delivery_active_sidebars) . ' col-md-6 col-sm-12' : 'col-lg-3 col-md-6 col-sm-12';
        ?>
        <div class="row pt-2">
          <?php for ( $fast_food_delivery_i = 1; $fast_food_delivery_i <= 4; $fast_food_delivery_i++ ) : ?>
            <div class="footer-area <?php echo esc_attr($fast_food_delivery_col_class); ?>">
              <?php if ( $fast_food_delivery_any_sidebar_active && is_active_sidebar("footer{$fast_food_delivery_i}-sidebar") ) : ?>
                <?php dynamic_sidebar("footer{$fast_food_delivery_i}-sidebar"); ?>
              <?php elseif ( ! $fast_food_delivery_any_sidebar_active ) : ?>
                  <?php if ( $fast_food_delivery_i === 1 ) : ?>
                    <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer1', 'fast-food-delivery' ); ?>" id="Search" class="sidebar-widget">
                      <h4 class="title" ><?php esc_html_e( 'Search', 'fast-food-delivery' ); ?></h4>
                      <?php get_search_form(); ?>
                    </aside>

                  <?php elseif ( $fast_food_delivery_i === 2 ) : ?>
                      <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer2', 'fast-food-delivery' ); ?>" id="archives" class="sidebar-widget">
                      <h4 class="title" ><?php esc_html_e( 'Archives', 'fast-food-delivery' ); ?></h4>
                      <ul>
                          <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                      </ul>
                      </aside>
                  <?php elseif ( $fast_food_delivery_i === 3 ) : ?>
                    <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer3', 'fast-food-delivery' ); ?>" id="meta" class="sidebar-widget">
                      <h4 class="title"><?php esc_html_e( 'Meta', 'fast-food-delivery' ); ?></h4>
                      <ul>
                        <?php wp_register(); ?>
                        <li><?php wp_loginout(); ?></li>
                        <?php wp_meta(); ?>
                      </ul>
                    </aside>
                  <?php elseif ( $fast_food_delivery_i === 4 ) : ?>
                    <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer4', 'fast-food-delivery' ); ?>" id="categories" class="sidebar-widget">
                      <h4 class="title" ><?php esc_html_e( 'Categories', 'fast-food-delivery' ); ?></h4>
                      <ul>
                          <?php wp_list_categories('title_li=');  ?>
                      </ul>
                    </aside>
                  <?php endif; ?>
              <?php endif; ?>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php if( get_theme_mod( 'fast_food_delivery_show_footer_copyright',true)) : ?>
    <div class="footer-copyright">
      <div class="container">
        <div class="row pt-2">
          <div class="col-lg-6 col-md-6 align-self-center">
            <p class="mb-0 py-3 text-center text-md-start">
              <?php
                if (!get_theme_mod('fast_food_delivery_footer_text') ) { ?>
                  <a href="<?php echo esc_url(__('https://www.wpelemento.com/products/free-food-delivery-wordpress-theme', 'fast-food-delivery' )); ?>" target="_blank">
                    <?php esc_html_e('Fast Food Delivery WordPress Theme','fast-food-delivery'); ?>
                  </a>
            <?php } else {
                  echo esc_html(get_theme_mod('fast_food_delivery_footer_text'));
                }
              ?>
              <?php if ( get_theme_mod('fast_food_delivery_copyright_enable', true) == true ) : ?>
              <?php
                /* translators: %s: WP Elemento */
                printf( esc_html__( ' By %s', 'fast-food-delivery' ), 'WP Elemento' ); ?>
              <?php endif; ?>
            </p>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center text-center text-md-end">
            <?php if ( get_theme_mod('fast_food_delivery_copyright_enable', true) == true ) : ?>
              <a href="<?php echo esc_url(__('https://wordpress.org','fast-food-delivery') ); ?>" rel="generator"><?php  /* translators: %s: WordPress */ printf( esc_html__( 'Proudly powered by %s', 'fast-food-delivery' ), 'WordPress' ); ?></a>
            <?php endif; ?>
          </div>
        </div>
        <?php if(get_theme_mod('fast_food_delivery_footer_social_icon_hide', false )== true){ ?>
          <div class="row">
            <div class="col-12 align-self-center py-1">
              <div class="footer-links">
                <?php $fast_food_delivery_settings_footer = get_theme_mod( 'fast_food_delivery_social_links_settings_footer' ); ?>
                <?php if ( is_array($fast_food_delivery_settings_footer) || is_object($fast_food_delivery_settings_footer) ){ ?>
                  <?php foreach( $fast_food_delivery_settings_footer as $fast_food_delivery_setting_footer ) { ?>
                    <a href="<?php echo esc_url( $fast_food_delivery_setting_footer['link_url'] ); ?>" target="_blank">
                      <i class="<?php echo esc_attr( $fast_food_delivery_setting_footer['link_text'] ); ?> me-2"></i>
                    </a>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php endif; ?>
  <?php if ( get_theme_mod('fast_food_delivery_scroll_enable_setting')) : ?>
    <div class="scroll-up">
      <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
    </div>
  <?php endif; ?>
  <?php if(get_theme_mod('fast_food_delivery_progress_bar', true )== true): ?>
    <div id="elemento-progress-bar" class="theme-progress-bar <?php if( get_theme_mod( 'fast_food_delivery_progress_bar_position','top') == 'top') { ?> top <?php } else { ?> bottom <?php } ?>"></div>
  <?php endif; ?>
  <?php if(get_theme_mod('fast_food_delivery_cursor_outline', false )== true): ?>
			<!-- Custom cursor -->
			<div class="cursor-point-outline"></div>
			<div class="cursor-point"></div>
			<!-- .Custom cursor -->
  <?php endif; ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>