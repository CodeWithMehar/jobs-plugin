<?php
if (!defined('ABSPATH')) {
    exit;
}

// Add Menu Page
function jobs_settings_page() {
    add_menu_page('Jobs Settings', 'Jobs Settings', 'manage_options', 'jobs-settings', 'jobs_settings_callback', 'dashicons-admin-settings', 100);
}
add_action('admin_menu', 'jobs_settings_page');

function jobs_settings_callback() {
    if (isset($_POST['default_salary'])) {
        update_option('default_salary', sanitize_text_field($_POST['default_salary']));
    }
    $default_salary = get_option('default_salary', '50000');

    echo '<h2>Jobs Settings</h2>';
    echo '<form method="POST">
            <label>Default Salary:</label>
            <input type="number" name="default_salary" value="' . esc_attr($default_salary) . '" />
            <input type="submit" value="Save" />
          </form>';
}
