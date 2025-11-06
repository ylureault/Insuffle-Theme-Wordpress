<?php
/**
 * Customizer Settings
 *
 * @package Insuffle
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Customizer settings
 */
function insuffle_customize_register( $wp_customize ) {

    /**
     * Section: Contact Information
     */
    $wp_customize->add_section( 'insuffle_contact', array(
        'title'    => __( 'Informations de Contact', 'insuffle' ),
        'priority' => 30,
    ) );

    // Phone
    $wp_customize->add_setting( 'insuffle_phone', array(
        'default'           => '09 80 80 89 62',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'insuffle_phone', array(
        'label'   => __( 'Téléphone', 'insuffle' ),
        'section' => 'insuffle_contact',
        'type'    => 'text',
    ) );

    // Email
    $wp_customize->add_setting( 'insuffle_email', array(
        'default'           => 'contact@insuffle-academie.com',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'insuffle_email', array(
        'label'   => __( 'Email', 'insuffle' ),
        'section' => 'insuffle_contact',
        'type'    => 'email',
    ) );

    // Address
    $wp_customize->add_setting( 'insuffle_address', array(
        'default'           => '410 RUE DE LA PRINCESSE TROUBETSKOI, 14800 Deauville, France',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'insuffle_address', array(
        'label'   => __( 'Adresse', 'insuffle' ),
        'section' => 'insuffle_contact',
        'type'    => 'textarea',
    ) );

    /**
     * Section: Social Links
     */
    $wp_customize->add_section( 'insuffle_social', array(
        'title'    => __( 'Réseaux Sociaux', 'insuffle' ),
        'priority' => 31,
    ) );

    // LinkedIn
    $wp_customize->add_setting( 'insuffle_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'insuffle_linkedin', array(
        'label'   => __( 'LinkedIn URL', 'insuffle' ),
        'section' => 'insuffle_social',
        'type'    => 'url',
    ) );

    // Facebook
    $wp_customize->add_setting( 'insuffle_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'insuffle_facebook', array(
        'label'   => __( 'Facebook URL', 'insuffle' ),
        'section' => 'insuffle_social',
        'type'    => 'url',
    ) );

    // Twitter
    $wp_customize->add_setting( 'insuffle_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'insuffle_twitter', array(
        'label'   => __( 'Twitter URL', 'insuffle' ),
        'section' => 'insuffle_social',
        'type'    => 'url',
    ) );

    /**
     * Section: Footer Settings
     */
    $wp_customize->add_section( 'insuffle_footer', array(
        'title'    => __( 'Paramètres Footer', 'insuffle' ),
        'priority' => 32,
    ) );

    // Footer text
    $wp_customize->add_setting( 'insuffle_footer_text', array(
        'default'           => '© ' . date( 'Y' ) . ' Insuffle Académie - Organisme de formation professionnelle en facilitation et intelligence collective à Deauville',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'insuffle_footer_text', array(
        'label'   => __( 'Texte Copyright Footer', 'insuffle' ),
        'section' => 'insuffle_footer',
        'type'    => 'textarea',
    ) );

    // Footer logo
    $wp_customize->add_setting( 'insuffle_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'insuffle_footer_logo', array(
        'label'    => __( 'Logo Footer', 'insuffle' ),
        'section'  => 'insuffle_footer',
        'settings' => 'insuffle_footer_logo',
    ) ) );

    /**
     * Section: Homepage Settings
     */
    $wp_customize->add_section( 'insuffle_homepage', array(
        'title'    => __( 'Page d\'Accueil', 'insuffle' ),
        'priority' => 33,
    ) );

    // Hero title
    $wp_customize->add_setting( 'insuffle_hero_title', array(
        'default'           => 'Formation Facilitation & Intelligence Collective',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'insuffle_hero_title', array(
        'label'   => __( 'Titre Hero', 'insuffle' ),
        'section' => 'insuffle_homepage',
        'type'    => 'text',
    ) );

    // Hero subtitle
    $wp_customize->add_setting( 'insuffle_hero_subtitle', array(
        'default'           => 'Insuffle Académie',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'insuffle_hero_subtitle', array(
        'label'   => __( 'Sous-titre Hero', 'insuffle' ),
        'section' => 'insuffle_homepage',
        'type'    => 'text',
    ) );

    // Hero description
    $wp_customize->add_setting( 'insuffle_hero_description', array(
        'default'           => 'Devenez facilitateur en 3 jours. Formation immersive en facilitation et intelligence collective.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'insuffle_hero_description', array(
        'label'   => __( 'Description Hero', 'insuffle' ),
        'section' => 'insuffle_homepage',
        'type'    => 'textarea',
    ) );
}
add_action( 'customize_register', 'insuffle_customize_register' );
