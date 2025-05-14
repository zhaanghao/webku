<?php
if ( ! class_exists( 'Fast_Food_Delivery_Plugin_Activation_WPElemento_Importer' ) ) {
    /**
     * Fast_Food_Delivery_Plugin_Activation_WPElemento_Importer initial setup
     *
     * @since 1.6.2
     */

    class Fast_Food_Delivery_Plugin_Activation_WPElemento_Importer {

        private static $fast_food_delivery_instance;
        public $fast_food_delivery_action_count;
        public $fast_food_delivery_recommended_actions;

        /** Initiator **/
        public static function get_instance() {
          if ( ! isset( self::$fast_food_delivery_instance) ) {
            self::$fast_food_delivery_instance = new self();
          }
          return self::$fast_food_delivery_instance;
        }

        /*  Constructor */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // ---------- wpelementoimpoter Plugin Activation -------
            add_filter( 'fast_food_delivery_recommended_plugins', array($this, 'fast_food_delivery_recommended_elemento_importer_plugins_array') );

            $fast_food_delivery_actions                   = $this->fast_food_delivery_get_recommended_actions();
            $this->fast_food_delivery_action_count        = $fast_food_delivery_actions['count'];
            $this->fast_food_delivery_recommended_actions = $fast_food_delivery_actions['actions'];

            add_action( 'wp_ajax_create_pattern_setup_builder', array( $this, 'create_pattern_setup_builder' ) );
        }

        public function fast_food_delivery_recommended_elemento_importer_plugins_array($fast_food_delivery_plugins){
            $fast_food_delivery_plugins[] = array(
                    'name'     => esc_html__('WPElemento Importer', 'fast-food-delivery'),
                    'slug'     =>  'wpelemento-importer',
                    'function' => 'WPElemento_Importer_ThemeWhizzie',
                    'desc'     => esc_html__('We highly recommend installing the WPElemento Importer plugin for importing the demo content with Elementor.', 'fast-food-delivery'),               
            );
            return $fast_food_delivery_plugins;
        }

        public function enqueue_scripts() {
            wp_enqueue_script('updates');      
            wp_register_script( 'fast-food-delivery-plugin-activation-script', esc_url(get_template_directory_uri()) . '/includes/getstart/js/plugin-activation.js', array('jquery') );
            wp_localize_script('fast-food-delivery-plugin-activation-script', 'fast_food_delivery_plugin_activate_plugin',
                array(
                    'installing' => esc_html__('Installing', 'fast-food-delivery'),
                    'activating' => esc_html__('Activating', 'fast-food-delivery'),
                    'error' => esc_html__('Error', 'fast-food-delivery'),
                    'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                    'wpelementoimpoter_admin_url' => esc_url(admin_url('admin.php?page=wpelemento-importer-tgmpa-install-plugins')),
                    'addon_admin_url' => esc_url(admin_url('admin.php?page=wpelementoimporter-wizard'))
                )
            );
            wp_enqueue_script( 'fast-food-delivery-plugin-activation-script' );

        }

        // --------- Plugin Actions ---------
        public function fast_food_delivery_get_recommended_actions() {

            $fast_food_delivery_act_count  = 0;
            $fast_food_delivery_actions_todo = get_option( 'recommending_actions', array());

            $fast_food_delivery_plugins = $this->fast_food_delivery_get_recommended_plugins();

            if ($fast_food_delivery_plugins) {
                foreach ($fast_food_delivery_plugins as $fast_food_delivery_key => $fast_food_delivery_plugin) {
                    $fast_food_delivery_action = array();
                    if (!isset($fast_food_delivery_plugin['slug'])) {
                        continue;
                    }

                    $fast_food_delivery_action['id']   = 'install_' . $fast_food_delivery_plugin['slug'];
                    $fast_food_delivery_action['desc'] = '';
                    if (isset($fast_food_delivery_plugin['desc'])) {
                        $fast_food_delivery_action['desc'] = $fast_food_delivery_plugin['desc'];
                    }

                    $fast_food_delivery_action['name'] = '';
                    if (isset($fast_food_delivery_plugin['name'])) {
                        $fast_food_delivery_action['title'] = $fast_food_delivery_plugin['name'];
                    }

                    $fast_food_delivery_link_and_is_done  = $this->fast_food_delivery_get_plugin_buttion($fast_food_delivery_plugin['slug'], $fast_food_delivery_plugin['name'], $fast_food_delivery_plugin['function']);
                    $fast_food_delivery_action['link']    = $fast_food_delivery_link_and_is_done['button'];
                    $fast_food_delivery_action['is_done'] = $fast_food_delivery_link_and_is_done['done'];
                    if (!$fast_food_delivery_action['is_done'] && (!isset($fast_food_delivery_actions_todo[$fast_food_delivery_action['id']]) || !$fast_food_delivery_actions_todo[$fast_food_delivery_action['id']])) {
                        $fast_food_delivery_act_count++;
                    }
                    $fast_food_delivery_recommended_actions[] = $fast_food_delivery_action;
                    $fast_food_delivery_actions_todo[]        = array('id' => $fast_food_delivery_action['id'], 'watch' => true);
                }
                return array('count' => $fast_food_delivery_act_count, 'actions' => $fast_food_delivery_recommended_actions);
            }

        }

        public function fast_food_delivery_get_recommended_plugins() {

            $fast_food_delivery_plugins = apply_filters('fast_food_delivery_recommended_plugins', array());
            return $fast_food_delivery_plugins;
        }

        public function fast_food_delivery_get_plugin_buttion($slug, $name, $function) {
                $fast_food_delivery_is_done      = false;
                $fast_food_delivery_button_html  = '';
                $fast_food_delivery_is_installed = $this->is_plugin_installed($slug);
                $fast_food_delivery_plugin_path  = $this->get_plugin_basename_from_slug($slug);
                $fast_food_delivery_is_activeted = (class_exists($function)) ? true : false;
                if (!$fast_food_delivery_is_installed) {
                    $fast_food_delivery_plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $slug,
                        ),
                        self_admin_url('update.php')
                    );
                    $fast_food_delivery_plugin_install_url = wp_nonce_url($fast_food_delivery_plugin_install_url, 'install-plugin_' . esc_attr($slug));
                    $fast_food_delivery_button_html        = sprintf('<a class="fast-food-delivery-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($fast_food_delivery_plugin_install_url),
                        sprintf(esc_html__('Install %s Now', 'fast-food-delivery'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Install & Activate', 'fast-food-delivery')
                    );
                } elseif ($fast_food_delivery_is_installed && !$fast_food_delivery_is_activeted) {

                    $fast_food_delivery_plugin_activate_link = add_query_arg(
                        array(
                            'action'        => 'activate',
                            'plugin'        => rawurlencode($fast_food_delivery_plugin_path),
                            'plugin_status' => 'all',
                            'paged'         => '1',
                            '_wpnonce'      => wp_create_nonce('activate-plugin_' . $fast_food_delivery_plugin_path),
                        ), self_admin_url('plugins.php')
                    );

                    $fast_food_delivery_button_html = sprintf('<a class="fast-food-delivery-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($fast_food_delivery_plugin_activate_link),
                        sprintf(esc_html__('Activate %s Now', 'fast-food-delivery'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Activate', 'fast-food-delivery')
                    );
                } elseif ($fast_food_delivery_is_activeted) {
                    $fast_food_delivery_button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'fast-food-delivery'));
                    $fast_food_delivery_is_done     = true;
                }

                return array('done' => $fast_food_delivery_is_done, 'button' => $fast_food_delivery_button_html);
            }
        public function is_plugin_installed($slug) {
            $fast_food_delivery_installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
            $fast_food_delivery_file_path         = $this->get_plugin_basename_from_slug($slug);
            return (!empty($fast_food_delivery_installed_plugins[$fast_food_delivery_file_path]));
        }
        public function get_plugin_basename_from_slug($slug) {
            $fast_food_delivery_keys = array_keys($this->get_installed_plugins());
            foreach ($fast_food_delivery_keys as $fast_food_delivery_key) {
                if (preg_match('|^' . $slug . '/|', $fast_food_delivery_key)) {
                    return $fast_food_delivery_key;
                }
            }
            return $slug;
        }

        public function get_installed_plugins() {

            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins();
        }
        public function create_pattern_setup_builder() {

            $edit_page = admin_url().'post-new.php?post_type=page&create_pattern=true';
            echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

            exit;
        }

    }
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Fast_Food_Delivery_Plugin_Activation_WPElemento_Importer::get_instance();

