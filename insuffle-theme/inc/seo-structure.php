<?php
/**
 * SEO Structure
 *
 * Schema.org markup, OG tags, breadcrumbs
 *
 * @package Insuffle
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add Schema.org Organization markup
 */
function insuffle_schema_organization() {

    if ( ! is_front_page() ) {
        return;
    }

    $phone = get_theme_mod( 'insuffle_phone', '09 80 80 89 62' );
    $email = get_theme_mod( 'insuffle_email', 'contact@insuffle-academie.com' );
    $address = get_theme_mod( 'insuffle_address', '410 RUE DE LA PRINCESSE TROUBETSKOI, 14800 Deauville, France' );

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Organization',
        'name'        => get_bloginfo( 'name' ),
        'url'         => home_url( '/' ),
        'logo'        => get_custom_logo() ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : '',
        'description' => get_bloginfo( 'description' ),
        'address'     => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => '410 RUE DE LA PRINCESSE TROUBETSKOI',
            'addressLocality' => 'Deauville',
            'postalCode'      => '14800',
            'addressCountry'  => 'FR',
        ),
        'contactPoint' => array(
            '@type'       => 'ContactPoint',
            'telephone'   => $phone,
            'email'       => $email,
            'contactType' => 'Customer Service',
        ),
    );

    // Add social media profiles
    $social_profiles = array();

    if ( $linkedin = get_theme_mod( 'insuffle_linkedin' ) ) {
        $social_profiles[] = $linkedin;
    }

    if ( $facebook = get_theme_mod( 'insuffle_facebook' ) ) {
        $social_profiles[] = $facebook;
    }

    if ( $twitter = get_theme_mod( 'insuffle_twitter' ) ) {
        $social_profiles[] = $twitter;
    }

    if ( ! empty( $social_profiles ) ) {
        $schema['sameAs'] = $social_profiles;
    }

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}
add_action( 'wp_head', 'insuffle_schema_organization', 5 );

/**
 * Add Schema.org LocalBusiness markup
 */
function insuffle_schema_local_business() {

    if ( ! is_front_page() ) {
        return;
    }

    $phone = get_theme_mod( 'insuffle_phone', '09 80 80 89 62' );
    $email = get_theme_mod( 'insuffle_email', 'contact@insuffle-academie.com' );

    $schema = array(
        '@context'      => 'https://schema.org',
        '@type'         => 'LocalBusiness',
        'name'          => get_bloginfo( 'name' ),
        'image'         => get_custom_logo() ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : '',
        'url'           => home_url( '/' ),
        'telephone'     => $phone,
        'email'         => $email,
        'priceRange'    => '€€',
        'address'       => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => '410 RUE DE LA PRINCESSE TROUBETSKOI',
            'addressLocality' => 'Deauville',
            'postalCode'      => '14800',
            'addressCountry'  => 'FR',
        ),
        'geo' => array(
            '@type'     => 'GeoCoordinates',
            'latitude'  => 49.3587,
            'longitude' => 0.0764,
        ),
        'openingHoursSpecification' => array(
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
            'opens'     => '09:00',
            'closes'    => '18:00',
        ),
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}
add_action( 'wp_head', 'insuffle_schema_local_business', 6 );

/**
 * Add Open Graph tags (fallback if Rank Math is not active)
 */
function insuffle_og_tags() {

    // Don't add OG tags if Rank Math or Yoast is active
    if ( class_exists( 'RankMath' ) || class_exists( 'WPSEO_Frontend' ) ) {
        return;
    }

    global $post;

    // OG Type
    $og_type = is_single() ? 'article' : 'website';
    echo '<meta property="og:type" content="' . esc_attr( $og_type ) . '" />' . "\n";

    // OG Title
    $og_title = is_singular() ? get_the_title() : get_bloginfo( 'name' );
    echo '<meta property="og:title" content="' . esc_attr( $og_title ) . '" />' . "\n";

    // OG Description
    if ( is_singular() && has_excerpt() ) {
        $og_description = get_the_excerpt();
    } else {
        $og_description = get_bloginfo( 'description' );
    }
    echo '<meta property="og:description" content="' . esc_attr( wp_trim_words( $og_description, 30 ) ) . '" />' . "\n";

    // OG URL
    $og_url = is_singular() ? get_permalink() : home_url( '/' );
    echo '<meta property="og:url" content="' . esc_url( $og_url ) . '" />' . "\n";

    // OG Image
    if ( is_singular() && has_post_thumbnail() ) {
        $og_image = get_the_post_thumbnail_url( null, 'large' );
    } else {
        $og_image = get_custom_logo() ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : '';
    }

    if ( $og_image ) {
        echo '<meta property="og:image" content="' . esc_url( $og_image ) . '" />' . "\n";
    }

    // OG Site Name
    echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";

    // Twitter Card
    echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr( $og_title ) . '" />' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr( wp_trim_words( $og_description, 30 ) ) . '" />' . "\n";

    if ( $og_image ) {
        echo '<meta name="twitter:image" content="' . esc_url( $og_image ) . '" />' . "\n";
    }

    // Article metadata for posts
    if ( is_single() && 'post' === get_post_type() ) {
        echo '<meta property="article:published_time" content="' . esc_attr( get_the_date( 'c' ) ) . '" />' . "\n";
        echo '<meta property="article:modified_time" content="' . esc_attr( get_the_modified_date( 'c' ) ) . '" />' . "\n";

        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                echo '<meta property="article:section" content="' . esc_attr( $category->name ) . '" />' . "\n";
            }
        }

        $tags = get_the_tags();
        if ( ! empty( $tags ) ) {
            foreach ( $tags as $tag ) {
                echo '<meta property="article:tag" content="' . esc_attr( $tag->name ) . '" />' . "\n";
            }
        }
    }
}
add_action( 'wp_head', 'insuffle_og_tags', 7 );

/**
 * Display Rank Math breadcrumbs if available
 */
function insuffle_breadcrumbs() {

    if ( is_front_page() ) {
        return;
    }

    if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
        rank_math_the_breadcrumbs();
    }
}
