<?php
/*
Plugin Name: WP Invoice Generator Lite
Description: Simple invoice generator tool using jsPDF, hosted entirely client-side via a shortcode.
Version: 1.0
Author: Parth Dave
*/

function wp_invoice_generator_assets() {
    wp_enqueue_style('invoice-generator-style', plugin_dir_url(__FILE__) . 'assets/style.css');
    wp_enqueue_script('invoice-generator-js', plugin_dir_url(__FILE__) . 'assets/script.js', [], false, true);
    wp_enqueue_script('jspdf', plugin_dir_url(__FILE__) . 'assets/jspdf.min.js', [], false, true);
    wp_enqueue_script('html2canvas', plugin_dir_url(__FILE__) . 'assets/html2canvas.min.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'wp_invoice_generator_assets');

function wp_invoice_generator_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/invoice-ui.php';
    return ob_get_clean();
}
add_shortcode('invoice_generator', 'wp_invoice_generator_shortcode');
