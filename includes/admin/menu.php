<?php

function cpm_add_admin_menu() {
    // Aggiungi il menu principale per CustomPageMaker
    add_menu_page(
        'Custom Page Maker',       
        'CustomPageMaker',         
        'manage_options',          
        'custompagemaker',         
        'cpm_list_pages_callback', 
        'dashicons-admin-page',    
        6                          
    );

    // Aggiungi la sottovoce "Lista pagine"
    add_submenu_page(
        'custompagemaker',         
        'Lista pagine',            
        'Lista pagine',            
        'manage_options',          
        'custompagemaker',         
        'cpm_list_pages_callback'  
    );

    // Aggiungi la sottovoce "Crea nuova pagina"
    add_submenu_page(
        'custompagemaker',         
        'Crea nuova pagina',       
        'Crea nuova pagina',       
        'manage_options',          
        'cpm_create_page',         
        'cpm_create_page_callback' 
    );

    // Aggiungi la sottovoce "Modifica pagina"
    add_submenu_page(
        null,                      // Nascondi la voce dal menu
        'Modifica pagina',         
        'Modifica pagina',         
        'manage_options',          
        'cpm_edit_page',           
        'cpm_edit_page_callback'   
    );
    
}

add_action('admin_menu', 'cpm_add_admin_menu');

// Includi le pagine
require_once CPM_PLUGIN_PATH . 'includes/admin/pages/create-page.php';
require_once CPM_PLUGIN_PATH . 'includes/admin/pages/list-pages.php';
require_once CPM_PLUGIN_PATH . 'includes/admin/pages/edit-page.php';  // Includiamo anche la nuova pagina