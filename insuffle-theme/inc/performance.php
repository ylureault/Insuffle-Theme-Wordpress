<?php
/**
 * Performance Optimizations
 *
 * @package Insuffle
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Remove unnecessary WordPress features for performance
 */
function insuffle_remove_bloat() {

    // Remove WordPress version from head
    remove_action( 'wp_head', 'wp_generator' );

    // Remove Windows Live Writer manifest
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // Remove RSD link
    remove_action( 'wp_head', 'rsd_link' );

    // Remove shortlink
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );

    // Remove feed links (optional - uncomment if not needed)
    // remove_action( 'wp_head', 'feed_links', 2 );
    // remove_action( 'wp_head', 'feed_links_extra', 3 );

    // Remove REST API link
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Disable emoji scripts
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'insuffle_remove_bloat' );

/**
 * Disable emoji DNS prefetch
 */
function insuffle_disable_emoji_dns_prefetch( $urls, $relation_type ) {

    if ( 'dns-prefetch' === $relation_type ) {
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'insuffle_disable_emoji_dns_prefetch', 10, 2 );

/**
 * Enable lazy loading for images
 */
function insuffle_enable_lazy_loading( $attr, $attachment, $size ) {

    if ( ! isset( $attr['loading'] ) ) {
        $attr['loading'] = 'lazy';
    }

    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'insuffle_enable_lazy_loading', 10, 3 );

/**
 * Add responsive images support
 */
function insuffle_responsive_images( $attr, $attachment, $size ) {

    if ( ! isset( $attr['sizes'] ) ) {
        $attr['sizes'] = '(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw';
    }

    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'insuffle_responsive_images', 10, 3 );

/**
 * Dequeue block library CSS if not using Gutenberg
 * Uncomment if you're not using Gutenberg blocks
 */
/*
function insuffle_dequeue_block_css() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'insuffle_dequeue_block_css', 100 );
*/

/**
 * Limit post revisions
 */
if ( ! defined( 'WP_POST_REVISIONS' ) ) {
    define( 'WP_POST_REVISIONS', 3 );
}

/**
 * Optimize WordPress database queries
 */
function insuffle_optimize_queries( $query ) {

    if ( ! is_admin() && $query->is_main_query() ) {

        // Limit posts per page for archive pages
        if ( is_archive() || is_search() ) {
            $query->set( 'posts_per_page', 12 );
        }

        // Disable attachment pages (if not needed)
        if ( is_attachment() ) {
            global $wp_query;
            $wp_query->set_404();
            status_header( 404 );
        }
    }
}
add_action( 'pre_get_posts', 'insuffle_optimize_queries' );

/**
 * Disable jQuery Migrate in production
 */
function insuffle_remove_jquery_migrate( $scripts ) {

    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {

        $script = $scripts->registered['jquery'];

        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
add_action( 'wp_default_scripts', 'insuffle_remove_jquery_migrate' );

/**
 * Add critical CSS inline (above the fold)
 * This should contain minimal CSS for header and hero sections
 */
function insuffle_critical_css() {

    $critical_css = "
    :root{--primary:#1f3a8b;--secondary:#ffde59;--light:#fff;--dark:#333}
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'Montserrat',sans-serif;color:var(--dark);background:var(--light);overflow-x:hidden}
    .site-header{background:var(--primary);position:sticky;top:0;z-index:1000;box-shadow:0 2px 10px rgba(0,0,0,.1)}
    .header-inner{display:flex;justify-content:space-between;align-items:center;padding:1rem 0;max-width:1200px;margin:0 auto}
    .custom-logo{max-height:50px}
    .site-title{color:var(--light);font-size:1.5rem;font-weight:800;margin:0}
    .main-navigation ul{display:flex;list-style:none;gap:2rem}
    .main-navigation a{color:var(--light);font-weight:600;text-decoration:none}
    .hero{background:linear-gradient(135deg,var(--primary),#2d4fa8);color:var(--light);padding:6rem 0 8rem;position:relative}
    ";

    echo '<style id="insuffle-critical-css">' . $critical_css . '</style>' . "\n";
}
add_action( 'wp_head', 'insuffle_critical_css', 1 );

/**
 * Optimize excerpt length
 */
function insuffle_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'insuffle_excerpt_length' );

/**
 * Remove query strings from static resources
 */
function insuffle_remove_query_strings( $src ) {

    if ( strpos( $src, '?ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }

    return $src;
}
add_filter( 'style_loader_src', 'insuffle_remove_query_strings', 10, 1 );
add_filter( 'script_loader_src', 'insuffle_remove_query_strings', 10, 1 );

/**
 * Disable Gutenberg block editor for post types (optional)
 * Uncomment if you want to disable Gutenberg completely
 */
/*
function insuffle_disable_gutenberg( $current_status, $post_type ) {
    $disabled_post_types = array( 'post', 'page' );
    if ( in_array( $post_type, $disabled_post_types, true ) ) {
        return false;
    }
    return $current_status;
}
add_filter( 'use_block_editor_for_post_type', 'insuffle_disable_gutenberg', 10, 2 );
*/
