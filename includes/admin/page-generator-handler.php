<?php

function cpm_handle_page_creation() {
    if (isset($_POST['custom_page_nonce']) && wp_verify_nonce($_POST['custom_page_nonce'], 'generate_custom_page')) {
        // Recupera i dati dal form
        $page_title = sanitize_text_field($_POST['page_title']);
        $page_content = sanitize_textarea_field($_POST['page_content']);

        // Crea la nuova pagina
        $new_page = array(
            'post_title'   => $page_title,
            'post_content' => $page_content,
            'post_status'  => 'publish',
            'post_type'    => 'page',
        );

        $post_id = wp_insert_post($new_page);

        if ($post_id) {
            // Aggiunge una meta key per identificare la pagina creata dal plugin
            add_post_meta($post_id, '_custom_page_maker', true);

            echo '<div class="notice notice-success"><p>Pagina creata con successo!</p></div>';
        } else {
            echo '<div class="notice notice-error"><p>Errore nella creazione della pagina.</p></div>';
        }
    }
}
add_action('admin_init', 'cpm_handle_page_creation');
