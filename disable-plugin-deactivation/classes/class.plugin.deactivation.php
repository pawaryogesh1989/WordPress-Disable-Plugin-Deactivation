<?php

class Disable_Plugin_Deactivation {

    static $instance;

    //Constructor of the Class
    public function __construct() {

        self::$instance = $this;

        add_action('admin_menu', array($this, 'wp_disable_plugin_menu'));
        add_action('admin_init', array($this, 'wp_disable_deactivation_words_settings'));
        add_filter('plugin_action_links', array($this, 'wp_disable_plugin_deactivation'), 10, 4);
        add_filter('bulk_actions-plugins', array($this, 'plugin_bulk_actions'));
    }

    public function wp_disable_plugin_menu() {
        add_plugins_page('Plugin Deactivation Settings', 'Plugin Deactivation Settings', 'manage_options', 'plugin-deactivation-settings', array($this, 'load_disable_plugin_settings_page'), '', 87);
    }

    public function load_disable_plugin_settings_page() {

        if (current_user_can('manage_options')) {
            if (file_exists(plugin_dir_path(__DIR__) . '/views/disable-deactivation-settings.php')) {
                require plugin_dir_path(__DIR__) . '/views/disable-deactivation-settings.php';
            } else {
                die('<br /><h3>Plugin Installation is Incomplete. Please install the plugin again or make sure you have copied all the plugin files.</h3>');
            }
        } else {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }
    }

    public function wp_disable_deactivation_words_settings() {

        register_setting('disable-deactivation-words-group', 'disable_plugin_deactivation');
        register_setting('disable-deactivation-words-group', 'disable_plugin_activation');
        register_setting('disable-deactivation-words-group', 'disable_plugin_deletion');
        register_setting('disable-deactivation-words-group', 'disable_plugin_update');
    }

    public function wp_disable_plugin_deactivation($actions, $plugin_file, $plugin_data, $context) {

        if (get_option('disable_plugin_deactivation') == "true") {

            if (array_key_exists('edit', $actions)) {
                unset($actions['edit']);
            }

            if (array_key_exists('deactivate', $actions)) {
                unset($actions['deactivate']);
            }
        }

        if (get_option('disable_plugin_activation') == "true") {

            if (array_key_exists('activate', $actions)) {
                unset($actions['activate']);
            }
        }

        if (get_option('disable_plugin_deletion') == "true") {

            if (array_key_exists('delete', $actions)) {
                unset($actions['delete']);
            }
        }

        return $actions;
    }

    public function plugin_bulk_actions($actions) {

        if (get_option('disable_plugin_deactivation') == "true") {

            if (array_key_exists('deactivate-selected', $actions)) {
                unset($actions['deactivate-selected']);
            }
        }

        if (get_option('disable_plugin_activation') == "true") {

            if (array_key_exists('activate-selected', $actions)) {
                unset($actions['activate-selected']);
            }
        }

        if (get_option('disable_plugin_deletion') == "true") {

            if (array_key_exists('delete-selected', $actions)) {
                unset($actions['delete-selected']);
            }
        }

        if (get_option('disable_plugin_update') == "true") {

            if (array_key_exists('update-selected', $actions)) {
                unset($actions['update-selected']);
                remove_action('load-update-core.php', 'wp_update_plugins');
                add_filter('pre_site_transient_update_plugins', '__return_null');
            }
        }

        return $actions;
    }

}

?>