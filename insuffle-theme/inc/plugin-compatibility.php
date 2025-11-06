<?php
/**
 * Plugin Compatibility
 *
 * Integrations for Contact Form 7, HubSpot, Rank Math, YARPP, Spectra
 *
 * @package Insuffle
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Contact Form 7 - Custom Styles
 */
function insuffle_cf7_styles() {

    if ( ! function_exists( 'wpcf7_enqueue_styles' ) ) {
        return;
    }

    // Add custom CF7 styles
    $custom_css = "
        .wpcf7-form {
            background: var(--light);
            padding: 2rem;
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-sm);
        }

        .wpcf7-form p {
            margin-bottom: 1.5rem;
        }

        .wpcf7-form label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .wpcf7-form input[type='text'],
        .wpcf7-form input[type='email'],
        .wpcf7-form input[type='tel'],
        .wpcf7-form input[type='url'],
        .wpcf7-form textarea,
        .wpcf7-form select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--grey);
            border-radius: var(--border-radius-sm);
            font-family: var(--font-primary);
            font-size: 1rem;
            transition: border-color var(--transition-base);
        }

        .wpcf7-form input:focus,
        .wpcf7-form textarea:focus,
        .wpcf7-form select:focus {
            outline: none;
            border-color: var(--primary);
        }

        .wpcf7-form textarea {
            min-height: 150px;
            resize: vertical;
        }

        .wpcf7-form input[type='submit'],
        .wpcf7-form button {
            background: var(--gradient-primary);
            color: var(--light);
            border: none;
            padding: 1rem 2.5rem;
            border-radius: var(--border-radius-full);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all var(--transition-base);
            box-shadow: var(--shadow-sm);
        }

        .wpcf7-form input[type='submit']:hover,
        .wpcf7-form button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .wpcf7-not-valid-tip {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .wpcf7-validation-errors,
        .wpcf7-mail-sent-ok {
            padding: 1rem;
            border-radius: var(--border-radius-sm);
            margin-top: 1rem;
            font-weight: 600;
        }

        .wpcf7-validation-errors {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .wpcf7-mail-sent-ok {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    ";

    wp_add_inline_style( 'insuffle-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'insuffle_cf7_styles', 20 );

/**
 * Rank Math SEO - Breadcrumbs Support
 */
function insuffle_rankmath_breadcrumbs() {

    if ( ! function_exists( 'rank_math_the_breadcrumbs' ) ) {
        return;
    }

    // Add breadcrumbs styles
    $breadcrumb_css = "
        .rank-math-breadcrumb {
            padding: 1rem 0;
            font-size: 0.875rem;
        }

        .rank-math-breadcrumb a {
            color: var(--primary);
            transition: color var(--transition-base);
        }

        .rank-math-breadcrumb a:hover {
            color: var(--primary-dark);
        }

        .rank-math-breadcrumb span {
            color: var(--grey-dark);
        }
    ";

    wp_add_inline_style( 'insuffle-style', $breadcrumb_css );
}
add_action( 'wp_enqueue_scripts', 'insuffle_rankmath_breadcrumbs', 20 );

/**
 * YARPP (Yet Another Related Posts Plugin) - Custom Template
 */
function insuffle_yarpp_styles() {

    if ( ! function_exists( 'yarpp_related' ) ) {
        return;
    }

    $yarpp_css = "
        .yarpp-related {
            margin-top: 3rem;
            padding-top: 3rem;
            border-top: 2px solid var(--grey);
        }

        .yarpp-related h3 {
            color: var(--primary);
            font-size: 1.8rem;
            margin-bottom: 2rem;
        }

        .yarpp-related .related-posts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .yarpp-related article {
            background: var(--light);
            border-radius: var(--border-radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: all var(--transition-base);
        }

        .yarpp-related article:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .yarpp-related article img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .yarpp-related article .entry-content {
            padding: 1.5rem;
        }

        .yarpp-related article h4 {
            color: var(--primary);
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .yarpp-related article .entry-meta {
            font-size: 0.875rem;
            color: var(--grey-dark);
        }
    ";

    wp_add_inline_style( 'insuffle-style', $yarpp_css );
}
add_action( 'wp_enqueue_scripts', 'insuffle_yarpp_styles', 20 );

/**
 * Spectra (Gutenberg Blocks) - Compatibility
 */
function insuffle_spectra_compatibility() {

    // Ensure Spectra blocks inherit theme colors
    $spectra_css = "
        .wp-block-uagb-container {
            font-family: var(--font-primary);
        }

        .uagb-block-primary {
            color: var(--primary) !important;
        }

        .uagb-block-secondary {
            color: var(--secondary) !important;
        }
    ";

    wp_add_inline_style( 'insuffle-style', $spectra_css );
}
add_action( 'wp_enqueue_scripts', 'insuffle_spectra_compatibility', 20 );

/**
 * HubSpot Tracking - Add tracking code to footer
 * Note: Add your HubSpot tracking code in Customizer or directly here
 */
function insuffle_hubspot_tracking() {

    // Get HubSpot tracking code from Customizer (if set)
    $hubspot_code = get_theme_mod( 'insuffle_hubspot_code', '' );

    if ( ! empty( $hubspot_code ) ) {
        echo $hubspot_code;
    }

    // Alternative: Add HubSpot code directly here
    /*
    ?>
    <!-- Start of HubSpot Embed Code -->
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/YOUR_HUBSPOT_ID.js"></script>
    <!-- End of HubSpot Embed Code -->
    <?php
    */
}
add_action( 'wp_footer', 'insuffle_hubspot_tracking', 100 );
