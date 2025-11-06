<?php
/**
 * Enqueue Scripts and Styles
 *
 * @package Insuffle
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue styles
 */
function insuffle_enqueue_styles() {

    // Main stylesheet
    wp_enqueue_style(
        'insuffle-style',
        get_stylesheet_uri(),
        array(),
        INSUFFLE_VERSION
    );

    // Google Fonts - Montserrat
    wp_enqueue_style(
        'insuffle-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap',
        array(),
        null
    );

    // Main CSS file
    wp_enqueue_style(
        'insuffle-main',
        INSUFFLE_THEME_URI . '/assets/css/main.css',
        array( 'insuffle-style' ),
        INSUFFLE_VERSION
    );
}
add_action( 'wp_enqueue_scripts', 'insuffle_enqueue_styles' );

/**
 * Enqueue scripts
 */
function insuffle_enqueue_scripts() {

    // Navigation script
    wp_enqueue_script(
        'insuffle-navigation',
        INSUFFLE_THEME_URI . '/assets/js/navigation.js',
        array(),
        INSUFFLE_VERSION,
        true
    );

    // Main script
    wp_enqueue_script(
        'insuffle-main',
        INSUFFLE_THEME_URI . '/assets/js/main.js',
        array(),
        INSUFFLE_VERSION,
        true
    );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'insuffle_enqueue_scripts' );

/**
 * Add defer/async to scripts
 */
function insuffle_defer_scripts( $tag, $handle, $src ) {

    // Scripts to defer
    $defer_scripts = array(
        'insuffle-navigation',
        'insuffle-main',
    );

    if ( in_array( $handle, $defer_scripts, true ) ) {
        return str_replace( ' src', ' defer src', $tag );
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'insuffle_defer_scripts', 10, 3 );

/**
 * Preconnect to Google Fonts
 */
function insuffle_resource_hints( $urls, $relation_type ) {

    if ( 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'insuffle_resource_hints', 10, 2 );

/**
 * Editor styles
 */
function insuffle_editor_styles() {

    // Add editor styles
    add_editor_style( array(
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap',
        'assets/css/editor-style.css',
    ) );
}
add_action( 'after_setup_theme', 'insuffle_editor_styles' );
