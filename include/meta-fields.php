<?php
if (!defined('ABSPATH')) {
    exit;
}

// Add Meta Box
function jobs_add_meta_boxes() {
    add_meta_box('job_details', 'Job Details', 'jobs_meta_box_callback', 'job', 'normal', 'high');
}
add_action('add_meta_boxes', 'jobs_add_meta_boxes');

function jobs_meta_box_callback($post) {
    wp_nonce_field('jobs_save_meta_data', 'jobs_meta_box_nonce');

    $company_name = get_post_meta($post->ID, '_company_name', true);
    $location = get_post_meta($post->ID, '_location', true);
    $salary = get_post_meta($post->ID, '_salary', true);

    echo '<label>Company Name:</label>';
    echo '<input type="text" name="company_name" value="' . esc_attr($company_name) . '" style="width:100%;" />';
    
    echo '<label>Location:</label>';
    echo '<input type="text" name="location" value="' . esc_attr($location) . '" style="width:100%;" />';
    
    echo '<label>Salary:</label>';
    echo '<input type="number" name="salary" value="' . esc_attr($salary) . '" style="width:100%;" />';
}

function jobs_save_meta_data($post_id) {
    if (!isset($_POST['jobs_meta_box_nonce']) || !wp_verify_nonce($_POST['jobs_meta_box_nonce'], 'jobs_save_meta_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['company_name'])) {
        update_post_meta($post_id, '_company_name', sanitize_text_field($_POST['company_name']));
    }

    if (isset($_POST['location'])) {
        update_post_meta($post_id, '_location', sanitize_text_field($_POST['location']));
    }

    if (isset($_POST['salary'])) {
        update_post_meta($post_id, '_salary', sanitize_text_field($_POST['salary']));
    }
}

add_action('save_post', 'jobs_save_meta_data');
