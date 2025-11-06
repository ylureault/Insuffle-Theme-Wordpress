<?php
/**
 * Template part for displaying post excerpts in archive/search
 *
 * @package Insuffle
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'insuffle-card' ); ?>
            </a>
        </div><!-- .post-thumbnail -->
    <?php endif; ?>

    <div class="card-content">

        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php
                insuffle_posted_on();
                echo ' | ';
                insuffle_entry_categories();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>

        <header class="entry-header">
            <?php the_title( '<h3 class="entry-title card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-excerpt card-description">
            <?php the_excerpt(); ?>
        </div><!-- .entry-excerpt -->

        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="read-more">
                <?php esc_html_e( 'Lire la suite &raquo;', 'insuffle' ); ?>
            </a>
        </footer><!-- .entry-footer -->

    </div><!-- .card-content -->

</article><!-- #post-<?php the_ID(); ?> -->
