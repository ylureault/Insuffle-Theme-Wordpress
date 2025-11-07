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
     * Homepage content - uses Gutenberg blocks
     */
    while ( have_posts() ) :
        the_post();
        ?>

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

        <?php
    endwhile;
    ?>

</main><!-- #main -->

<?php
get_footer();
