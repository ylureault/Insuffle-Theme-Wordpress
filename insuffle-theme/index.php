<?php
/**
 * Main Index Template
 *
 * Fallback template for all pages
 *
 * @package Insuffle
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
                if ( is_home() && ! is_front_page() ) :
                    ?>
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                    <?php
                elseif ( is_archive() ) :
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                endif;
                ?>
            </header><!-- .page-header -->

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

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>

    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
