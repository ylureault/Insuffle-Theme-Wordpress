<?php
/**
 * Template Functions
 *
 * @package Insuffle
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Display site logo or title
 */
function insuffle_site_branding() {

    if ( has_custom_logo() ) {
        the_custom_logo();
    } else {
        ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?>
            </a>
        </h1>
        <?php
    }
}

/**
 * Display posted on date
 */
function insuffle_posted_on() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );

    printf( '<span class="posted-on">%s</span>', $time_string );
}

/**
 * Display posted by author
 */
function insuffle_posted_by() {

    printf(
        '<span class="byline">%s <a href="%s" rel="author">%s</a></span>',
        esc_html__( 'par', 'insuffle' ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_html( get_the_author() )
    );
}

/**
 * Display post categories
 */
function insuffle_entry_categories() {

    if ( 'post' === get_post_type() ) {
        $categories_list = get_the_category_list( esc_html__( ', ', 'insuffle' ) );
        if ( $categories_list ) {
            printf( '<span class="cat-links">%s</span>', $categories_list );
        }
    }
}

/**
 * Display post tags
 */
function insuffle_entry_tags() {

    if ( 'post' === get_post_type() ) {
        $tags_list = get_the_tag_list( '', esc_html__( ', ', 'insuffle' ) );
        if ( $tags_list ) {
            printf( '<span class="tags-links">%s</span>', $tags_list );
        }
    }
}

/**
 * Display excerpt with custom length
 */
function insuffle_excerpt( $length = 20 ) {

    $excerpt = get_the_excerpt();
    $excerpt = wp_trim_words( $excerpt, $length, '...' );

    echo '<p>' . esc_html( $excerpt ) . '</p>';
}

/**
 * Display pagination
 */
function insuffle_pagination() {

    the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => __( '&laquo; Précédent', 'insuffle' ),
        'next_text' => __( 'Suivant &raquo;', 'insuffle' ),
    ) );
}

/**
 * Display post navigation (prev/next)
 */
function insuffle_post_navigation() {

    the_post_navigation( array(
        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Article précédent', 'insuffle' ) . '</span> <span class="nav-title">%title</span>',
        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Article suivant', 'insuffle' ) . '</span> <span class="nav-title">%title</span>',
    ) );
}

/**
 * Shortcode: Liens Réseau (preserved from old theme)
 */
function insuffle_afficher_liens_reseau() {

    ob_start();

    $json_url = 'https://www.insuffle.com/site-insuffle.json';
    $class_container = 'liens-reseau';

    $json_data = @file_get_contents( $json_url );

    if ( false === $json_data ) {
        return '<!-- Impossible de charger les liens -->';
    }

    $liens = json_decode( $json_data, true );

    if ( ! is_array( $liens ) ) {
        return '<!-- Format JSON invalide -->';
    }

    echo '<div class="' . esc_attr( $class_container ) . '" aria-label="' . esc_attr__( 'Liens vers nos autres sites', 'insuffle' ) . '">';

    foreach ( $liens as $lien ) {
        $url = esc_url( $lien['url'] ?? '#' );
        $title = esc_attr( $lien['title'] ?? '' );
        $alt = esc_attr( $lien['alt'] ?? $title );
        $anchor = esc_html( $lien['anchor'] ?? $url );

        echo '<a href="' . $url . '" title="' . $title . '" alt="' . $alt . '" rel="noopener noreferrer">' . $anchor . '</a><br>';
    }

    echo '</div>';

    return ob_get_clean();
}
add_shortcode( 'liens_reseau', 'insuffle_afficher_liens_reseau' );

/**
 * Skip link for accessibility
 */
function insuffle_skip_link() {

    echo '<a class="skip-link screen-reader-text" href="#content">' . esc_html__( 'Aller au contenu principal', 'insuffle' ) . '</a>';
}
add_action( 'wp_body_open', 'insuffle_skip_link', 5 );

/**
 * Add read more link to excerpt
 */
function insuffle_excerpt_more( $more ) {

    if ( ! is_single() ) {
        $more = sprintf(
            '<a class="read-more" href="%1$s">%2$s</a>',
            esc_url( get_permalink( get_the_ID() ) ),
            esc_html__( 'Lire la suite &raquo;', 'insuffle' )
        );
    }

    return $more;
}
add_filter( 'excerpt_more', 'insuffle_excerpt_more' );
