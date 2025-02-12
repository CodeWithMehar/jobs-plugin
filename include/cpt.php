<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Register Custom Post Type: Jobs
function jobs_register_post_type() {
    $labels = array(
        'name'               => 'Jobs',
        'singular_name'      => 'Job',
        'menu_name'          => 'Jobs',
        'name_admin_bar'     => 'Job',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Job',
        'new_item'           => 'New Job',
        'edit_item'          => 'Edit Job',
        'view_item'          => 'View Job',
        'all_items'          => 'All Jobs',
        'search_items'       => 'Search Jobs',
        'not_found'          => 'No Jobs found.',
        'not_found_in_trash' => 'No Jobs found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array('title', 'editor', 'custom-fields'),
        'has_archive'        => true,
        'show_in_rest'       => true,
    );

    register_post_type('job', $args);
}

add_action('init', 'jobs_register_post_type');
