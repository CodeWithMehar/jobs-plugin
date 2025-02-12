<?php
/*
Plugin Name: Jobs Custom Post Type
Plugin URI: https://yourwebsite.com
Description: A custom plugin to create a Jobs post type with custom fields.
Version: 1.0
Author: Mehar
Author URI: https://yourwebsite.com
License: GPL2
*/

// Direct access prevent
if (!defined('ABSPATH')) {
    exit;
}

// Define the plugin path
define('JOBS_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Include necessary files
require_once JOBS_PLUGIN_PATH . 'includes/cpt.php';
require_once JOBS_PLUGIN_PATH . 'includes/meta-fields.php';
require_once JOBS_PLUGIN_PATH . 'includes/shortcode.php';
require_once JOBS_PLUGIN_PATH . 'includes/settings.php';

// Activation & Deactivation Hooks
function jobs_plugin_activate() {
    require_once JOBS_PLUGIN_PATH . 'includes/cpt.php';
    jobs_register_post_type();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'jobs_plugin_activate');

function jobs_plugin_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'jobs_plugin_deactivate');
