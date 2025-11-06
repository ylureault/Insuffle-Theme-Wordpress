<?php
/**
 * Search Results Template
 *
 * @package Insuffle
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">

        <header class="page-header">
            <h1 class="page-title">
                <?php
                /* translators: %s: search query */
                printf( esc_html__( 'Résultats de recherche pour : %s', 'insuffle' ), '<span>' . get_search_query() . '</span>' );
                ?>
            </h1>

            <?php if ( have_posts() ) : ?>
                <p class="search-results-count">
                    <?php
                    /* translators: %d: number of search results */
                    printf( esc_html( _n( '%d résultat trouvé', '%d résultats trouvés', $wp_query->found_posts, 'insuffle' ) ), $wp_query->found_posts );
                    ?>
                </p>
            <?php endif; ?>
        </header><!-- .page-header -->

        <?php if ( have_posts() ) : ?>

            <div class="posts-grid grid-3">
                <?php
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content', 'excerpt' );
                endwhile;
                ?>
            </div><!-- .posts-grid -->

            <?php
            // Pagination
            insuffle_pagination();

        else :
            ?>

            <div class="no-results">
                <p><?php esc_html_e( 'Aucun résultat trouvé pour votre recherche. Essayez avec d\'autres mots-clés.', 'insuffle' ); ?></p>

                <?php get_search_form(); ?>
            </div><!-- .no-results -->

            <?php
        endif;
        ?>

    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
