<?php
if (!defined('ABSPATH')) {
    exit;
}

// Shortcode function
function jobs_shortcode() {
    $args = array(
        'post_type'      => 'job',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);
    $output = '<div class="job-listings">';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $company_name = get_post_meta(get_the_ID(), '_company_name', true);
            $location = get_post_meta(get_the_ID(), '_location', true);
            $salary = get_post_meta(get_the_ID(), '_salary', true);
            $output .= '<div class="job-item">
                            <h2>' . get_the_title() . '</h2>
                            <p><strong>Company:</strong> ' . esc_html($company_name) . '</p>
                            <p><strong>Location:</strong> ' . esc_html($location) . '</p>
                            <p><strong>Salary:</strong> ' . esc_html($salary) . '</p>
                            <p>' . get_the_content() . '</p>
                        </div>';
        }
        wp_reset_postdata();
    } else {
        $output .= '<p>No job listings found.</p>';
    }

    $output .= '</div>';
    return $output;
}

add_shortcode('job_listings', 'jobs_shortcode');
