<?php
/**
 * Plugin Name: Elementor Chiffres en Lettres
 * Description: A plugin to convert numbers to French words.
 * Version: 1.0
 * Author: Dhia Abedraba
 */

// Ensure WordPress has been loaded
defined( 'ABSPATH' ) || exit;

// Include the functions file
require_once plugin_dir_path( __FILE__ ) . 'includes/functions.php';

// Register the Elementor widget
function register_chiffres_en_lettres_widget( $widgets_manager ) {
    require_once plugin_dir_path( __FILE__ ) . 'widgets/chiffres-en-lettres-widget.php';
    $widgets_manager->register( new \Elementor_Chiffres_En_Lettres_Widget() );
}
add_action( 'elementor/widgets/register', 'register_chiffres_en_lettres_widget' );
