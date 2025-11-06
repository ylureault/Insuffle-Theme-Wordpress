<?php
/**
 * Single Post Template
 *
 * @package Insuffle
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">

        <?php
        while ( have_posts() ) :
            the_post();

            // Breadcrumbs
            if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
                rank_math_the_breadcrumbs();
            }
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                    <div class="entry-meta">
                        <?php
                        insuffle_posted_on();
                        echo ' | ';
                        insuffle_posted_by();
                        echo ' | ';
                        insuffle_entry_categories();
                        ?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div><!-- .post-thumbnail -->
                <?php endif; ?>

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

                <footer class="entry-footer">
                    <?php insuffle_entry_tags(); ?>
                </footer><!-- .entry-footer -->

            </article><!-- #post-<?php the_ID(); ?> -->

            <?php
            // Post navigation (prev/next)
            insuffle_post_navigation();

            // YARPP related posts
            if ( function_exists( 'yarpp_related' ) ) :
                ?>
                <div class="yarpp-related">
                    <h3><?php esc_html_e( 'Articles liés', 'insuffle' ); ?></h3>
                    <?php yarpp_related(); ?>
                </div>
                <?php
            endif;

            // Comments
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile;
        ?>

    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
