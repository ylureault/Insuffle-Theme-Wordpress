<?php
/**
 * Theme Setup
 *
 * @package Insuffle
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Setup theme defaults and register support for WordPress features
 */
function insuffle_theme_support() {

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 9999 );

    // Add custom image sizes
    add_image_size( 'insuffle-hero', 1920, 1080, true );
    add_image_size( 'insuffle-card', 600, 400, true );

    // Custom logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // HTML5 support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
        'navigation-widgets',
    ) );

    // Gutenberg support
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );

    // Gutenberg color palette (Insuffle colors)
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => __( 'Bleu Insuffle', 'insuffle' ),
            'slug'  => 'primary',
            'color' => '#1f3a8b',
        ),
        array(
            'name'  => __( 'Jaune Insuffle', 'insuffle' ),
            'slug'  => 'secondary',
            'color' => '#ffde59',
        ),
        array(
            'name'  => __( 'Bleu Clair', 'insuffle' ),
            'slug'  => 'accent',
            'color' => '#c3d1e4',
        ),
        array(
            'name'  => __( 'Gris Foncé', 'insuffle' ),
            'slug'  => 'dark',
            'color' => '#333333',
        ),
        array(
            'name'  => __( 'Blanc', 'insuffle' ),
            'slug'  => 'light',
            'color' => '#ffffff',
        ),
    ) );

    // Disable custom colors
    add_theme_support( 'disable-custom-colors' );

    // Content width
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 1200;
    }
}
add_action( 'after_setup_theme', 'insuffle_theme_support' );

/**
 * Register navigation menus
 */
function insuffle_register_menus() {
    register_nav_menus( array(
        'primary' => __( 'Menu Principal', 'insuffle' ),
        'footer'  => __( 'Menu Footer', 'insuffle' ),
        'social'  => __( 'Menu Réseaux Sociaux', 'insuffle' ),
    ) );
}
add_action( 'init', 'insuffle_register_menus' );

/**
 * Register widget areas
 */
function insuffle_register_widgets() {

    $widget_args = array(
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    );

    // Footer widgets (matching old theme structure)
    register_sidebar( array_merge( $widget_args, array(
        'name'        => __( 'Footer #1', 'insuffle' ),
        'id'          => 'sidebar-1',
        'description' => __( 'Première zone widget du footer', 'insuffle' ),
    ) ) );

    register_sidebar( array_merge( $widget_args, array(
        'name'        => __( 'Footer #2', 'insuffle' ),
        'id'          => 'sidebar-2',
        'description' => __( 'Deuxième zone widget du footer', 'insuffle' ),
    ) ) );
}
add_action( 'widgets_init', 'insuffle_register_widgets' );

/**
 * Add body classes
 */
function insuffle_body_classes( $classes ) {

    // Add singular class
    if ( is_singular() ) {
        $classes[] = 'singular';
    }

    // Add has-sidebar class
    if ( is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'templates/template-full-width.php' ) ) {
        $classes[] = 'has-sidebar';
    }

    return $classes;
}
add_filter( 'body_class', 'insuffle_body_classes' );
