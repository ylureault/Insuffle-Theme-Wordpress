<?php
/**
 * Template part for displaying a message when no content is found
 *
 * @package Insuffle
 * @since 1.0.0
 */
?>

<section class="no-results not-found">

    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Aucun contenu trouvé', 'insuffle' ); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) :

            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __( 'Prêt à publier votre premier article ? <a href="%1$s">Commencez ici</a>.', 'insuffle' ),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url( admin_url( 'post-new.php' ) )
            );

        elseif ( is_search() ) :
            ?>

            <p><?php esc_html_e( 'Désolé, aucun résultat ne correspond à votre recherche. Essayez avec d\'autres mots-clés.', 'insuffle' ); ?></p>
            <?php
            get_search_form();

        else :
            ?>

            <p><?php esc_html_e( 'Il semble que nous ne pouvons pas trouver ce que vous cherchez. Peut-être qu\'une recherche peut vous aider.', 'insuffle' ); ?></p>
            <?php
            get_search_form();

        endif;
        ?>
    </div><!-- .page-content -->

</section><!-- .no-results -->
