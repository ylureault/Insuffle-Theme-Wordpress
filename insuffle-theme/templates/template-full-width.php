<?php
/**
 * Template Name: Pleine largeur
 * Template Post Type: page
 *
 * Full width page template (no sidebar, no container padding)
 *
 * @package Insuffle
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main site-main--full-width">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'full-width-content' ); ?>>

            <?php if ( ! is_front_page() ) : ?>
                <header class="entry-header">
                    <div class="container">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </div>
                </header><!-- .entry-header -->
            <?php endif; ?>

            <div class="entry-content entry-content--full-width">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links container">' . esc_html__( 'Pages:', 'insuffle' ),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->

        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            ?>
            <div class="container">
                <?php comments_template(); ?>
            </div>
            <?php
        endif;

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
get_footer();
