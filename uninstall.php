<?php

// Evita l'accesso diretto
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Recupera tutte le pagine create dal plugin
$pages = get_posts(array(
    'post_type'   => 'page',
    'meta_key'    => '_custom_page_maker',
    'meta_value'  => true,
    'numberposts' => -1
));

// Elimina tutte le pagine trovate
foreach ($pages as $page) {
    wp_delete_post($page->ID, true); // Elimina permanentemente la pagina
}

// Se il plugin ha salvato opzioni nel database, le puoi eliminare così:
// delete_option('custom_page_maker_options');
