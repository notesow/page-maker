<?php

// Nascondi le pagine create da CustomPageMaker nell'admin di WordPress
function cpm_hide_custom_pages_from_admin($query) {
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'page') {
        // Modifica la query per escludere le pagine con la meta key '_custom_page_maker'
        $meta_query = array(
            array(
                'key'     => '_custom_page_maker',
                'compare' => 'NOT EXISTS'
            ),
        );
        $query->set('meta_query', $meta_query);
    }
}
add_action('pre_get_posts', 'cpm_hide_custom_pages_from_admin');
