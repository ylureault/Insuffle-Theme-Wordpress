<?php
/**
 * Insuffle Theme Functions
 *
 * @package Insuffle
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Constants
 */
define( 'INSUFFLE_VERSION', '1.0.2' );
define( 'INSUFFLE_THEME_DIR', get_template_directory() );
define( 'INSUFFLE_THEME_URI', get_template_directory_uri() );

/**
 * Require Theme Files
 */
require_once INSUFFLE_THEME_DIR . '/inc/theme-setup.php';
require_once INSUFFLE_THEME_DIR . '/inc/enqueue-scripts.php';
require_once INSUFFLE_THEME_DIR . '/inc/template-functions.php';
require_once INSUFFLE_THEME_DIR . '/inc/customizer.php';
require_once INSUFFLE_THEME_DIR . '/inc/plugin-compatibility.php';
require_once INSUFFLE_THEME_DIR . '/inc/seo-structure.php';
require_once INSUFFLE_THEME_DIR . '/inc/performance.php';
