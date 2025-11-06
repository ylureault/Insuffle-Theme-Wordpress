<?php
/**
 * Front Page Template (Homepage)
 *
 * @package Insuffle
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main">

    <?php
    /**
     * HERO SECTION
     * Personnalisable via Customizer ou à remplacer par Gutenberg blocks
     */
    ?>
    <section class="hero">
        <div class="container">
            <div class="hero-content">

                <div class="hero-text">
                    <p class="hero-subtitle">
                        <?php echo esc_html( get_theme_mod( 'insuffle_hero_subtitle', 'Insuffle Académie' ) ); ?>
                    </p>

                    <h1>
                        <?php
                        $hero_title = get_theme_mod( 'insuffle_hero_title', 'Formation Facilitation & Intelligence Collective' );
                        // Split title to highlight part in yellow (using span)
                        $title_parts = explode( '&', $hero_title );
                        if ( count( $title_parts ) > 1 ) {
                            echo esc_html( $title_parts[0] ) . '<span>&amp; ' . esc_html( trim( $title_parts[1] ) ) . '</span>';
                        } else {
                            echo esc_html( $hero_title );
                        }
                        ?>
                    </h1>

                    <p>
                        <?php echo esc_html( get_theme_mod( 'insuffle_hero_description', 'Devenez facilitateur en 3 jours. Formation immersive en facilitation et intelligence collective.' ) ); ?>
                    </p>

                    <div class="hero-buttons">
                        <a href="#contact" class="btn btn-secondary btn-large">
                            <?php esc_html_e( 'Demander des informations', 'insuffle' ); ?>
                        </a>
                        <a href="tel:<?php echo esc_attr( str_replace( ' ', '', get_theme_mod( 'insuffle_phone', '0980808962' ) ) ); ?>" class="btn btn-outline btn-large">
                            <?php echo esc_html( '☎ ' . get_theme_mod( 'insuffle_phone', '09 80 80 89 62' ) ); ?>
                        </a>
                    </div>

                    <?php
                    /**
                     * HERO STATS (modifiable)
                     * TODO: Rendre ces stats dynamiques via Customizer ou Custom Fields
                     */
                    ?>
                    <div class="hero-stats">
                        <div class="hero-stat">
                            <div class="hero-stat-number">500+</div>
                            <div class="hero-stat-label"><?php esc_html_e( 'Participants formés', 'insuffle' ); ?></div>
                        </div>
                        <div class="hero-stat">
                            <div class="hero-stat-number">3 jours</div>
                            <div class="hero-stat-label"><?php esc_html_e( 'Formation intensive', 'insuffle' ); ?></div>
                        </div>
                        <div class="hero-stat">
                            <div class="hero-stat-number">98%</div>
                            <div class="hero-stat-label"><?php esc_html_e( 'Taux de satisfaction', 'insuffle' ); ?></div>
                        </div>
                    </div>

                </div><!-- .hero-text -->

                <div class="hero-image">
                    <?php
                    // Display featured image if set, otherwise placeholder
                    if ( has_post_thumbnail() ) :
                        the_post_thumbnail( 'insuffle-hero' );
                    else :
                        ?>
                        <div class="hero-image-placeholder">
                            <img src="<?php echo esc_url( INSUFFLE_THEME_URI . '/assets/images/hero-placeholder.jpg' ); ?>"
                                 alt="<?php esc_attr_e( 'Formation Insuffle', 'insuffle' ); ?>"
                                 loading="eager">
                        </div>
                        <?php
                    endif;
                    ?>
                    <div class="hero-badge">
                        <?php esc_html_e( 'Certifié Qualiopi', 'insuffle' ); ?>
                    </div>
                </div>

            </div><!-- .hero-content -->
        </div><!-- .container -->
    </section><!-- .hero -->

    <?php
    /**
     * MAIN CONTENT
     * Display the_content() for homepage content created in WordPress editor
     * Allows using Gutenberg blocks for flexible content
     */
    while ( have_posts() ) :
        the_post();
        ?>

        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'insuffle' ),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
        </div><!-- .container -->

        <?php
    endwhile;
    ?>

    <?php
    /**
     * SECTIONS EXEMPLE
     *
     * Ces sections sont en commentaire car le contenu doit être créé via Gutenberg.
     * Décommentez si vous souhaitez du contenu statique.
     */
    ?>

    <!-- SECTION LOGOS CLIENTS (exemple) -->
    <!--
    <section class="section section-grey">
        <div class="container">
            <div class="section-subtitle"><?php esc_html_e( 'Ils nous font confiance', 'insuffle' ); ?></div>
            <h2 class="section-title text-center"><?php esc_html_e( 'Nos clients', 'insuffle' ); ?></h2>

            <div class="logos-grid">
                // Ajouter logos clients ici
            </div>
        </div>
    </section>
    -->

    <!-- SECTION SERVICES (exemple) -->
    <!--
    <section class="section">
        <div class="container">
            <div class="section-subtitle"><?php esc_html_e( 'Nos formations', 'insuffle' ); ?></div>
            <h2 class="section-title text-center"><?php esc_html_e( 'Nos services', 'insuffle' ); ?></h2>

            <div class="grid-4">
                <div class="card">
                    <div class="card-icon">📚</div>
                    <h3 class="card-title"><?php esc_html_e( 'Facilitation Bootcamp', 'insuffle' ); ?></h3>
                    <p class="card-description"><?php esc_html_e( 'Formation intensive en 3 jours', 'insuffle' ); ?></p>
                </div>
                // Autres cards...
            </div>
        </div>
    </section>
    -->

    <?php
    /**
     * CTA SECTION (Contact)
     */
    ?>
    <section class="cta-section section" id="contact">
        <div class="container">
            <div class="cta-content text-center">
                <div class="section-subtitle" style="color: var(--secondary);">
                    <?php esc_html_e( 'Contactez-nous', 'insuffle' ); ?>
                </div>
                <h2 class="section-title">
                    <?php esc_html_e( 'Prêt à devenir facilitateur ?', 'insuffle' ); ?>
                </h2>
                <p>
                    <?php esc_html_e( 'Rejoignez notre prochaine session de formation et développez les compétences essentielles pour accompagner la transformation collective dans votre organisation.', 'insuffle' ); ?>
                </p>

                <div class="cta-buttons">
                    <a href="mailto:<?php echo esc_attr( get_theme_mod( 'insuffle_email', 'contact@insuffle-academie.com' ) ); ?>?subject=<?php echo rawurlencode( __( 'Demande d\'information - Formation Facilitation', 'insuffle' ) ); ?>" class="btn btn-large">
                        <?php esc_html_e( 'Demander des informations', 'insuffle' ); ?>
                    </a>
                    <a href="tel:<?php echo esc_attr( str_replace( ' ', '', get_theme_mod( 'insuffle_phone', '0980808962' ) ) ); ?>" class="btn btn-outline btn-large">
                        <?php echo esc_html( '☎ ' . get_theme_mod( 'insuffle_phone', '09 80 80 89 62' ) ); ?>
                    </a>
                </div>

                <p style="margin-top: 2rem; font-size: 0.95rem; opacity: 0.9;">
                    <?php esc_html_e( 'Formation accessible aux personnes en situation de handicap.', 'insuffle' ); ?><br>
                    <?php esc_html_e( 'Adaptation possible sur demande.', 'insuffle' ); ?>
                </p>
            </div><!-- .cta-content -->
        </div><!-- .container -->
    </section><!-- .cta-section -->

</main><!-- #main -->

<?php
get_footer();
