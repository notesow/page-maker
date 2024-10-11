<?php
/*
Plugin Name: CustomPageMaker
Description: Un plugin per creare pagine personalizzate in WordPress.
Version: 1.0
Author: Davide Perricone
*/

// Evita l'accesso diretto
if (!defined('ABSPATH')) {
    exit;
}

// Definisci costanti per il plugin
define('CPM_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('CPM_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include i file necessari
require_once CPM_PLUGIN_PATH . 'includes/init.php';

// Carica gli script
function cpm_enqueue_assets() {
    wp_enqueue_style('cpm-style', CPM_PLUGIN_URL . 'assets/css/style.css');
    wp_enqueue_script('cpm-script', CPM_PLUGIN_URL . 'assets/js/script.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'cpm_enqueue_assets');
