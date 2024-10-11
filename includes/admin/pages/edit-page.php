<?php

function cpm_edit_page_callback() {
    // Verifica se è stato passato un ID valido
    if (isset($_GET['page_id']) && is_numeric($_GET['page_id'])) {
        $page_id = intval($_GET['page_id']);
        
        // Recupera i dati della pagina
        $page = get_post($page_id);

        if ($page && $page->post_type === 'page' && get_post_meta($page_id, '_custom_page_maker', true)) {
            // Includi il template per modificare la pagina
            include CPM_PLUGIN_PATH . 'includes/admin/templates/edit-page-template.php';
        } else {
            echo '<div class="notice notice-error"><p>Pagina non trovata o non valida.</p></div>';
        }
    } else {
        echo '<div class="notice notice-error"><p>ID pagina non valido.</p></div>';
    }
}
