<?php
/**
 * 404 Error Page Template
 *
 * @package Insuffle
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">

        <div class="error-404 text-center">

            <h1 class="page-title">
                <?php esc_html_e( '404', 'insuffle' ); ?>
            </h1>

            <h2>
                <?php esc_html_e( 'Page non trouvée', 'insuffle' ); ?>
            </h2>

            <p class="lead">
                <?php esc_html_e( 'Désolé, la page que vous recherchez n\'existe pas ou a été déplacée.', 'insuffle' ); ?>
            </p>

            <div class="error-404-actions" style="margin: 3rem 0;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-large">
                    <?php esc_html_e( 'Retour à l\'accueil', 'insuffle' ); ?>
                </a>
            </div>

            <div class="error-404-search">
                <h3><?php esc_html_e( 'Rechercher sur le site', 'insuffle' ); ?></h3>
                <?php get_search_form(); ?>
            </div>

            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <div class="error-404-widgets">
                    <h3><?php esc_html_e( 'Vous cherchez peut-être...', 'insuffle' ); ?></h3>
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
            <?php endif; ?>

        </div><!-- .error-404 -->

    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
