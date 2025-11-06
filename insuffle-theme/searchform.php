<?php
/**
 * Search Form Template
 *
 * @package Insuffle
 * @since 1.0.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="search-form-<?php echo esc_attr( uniqid() ); ?>">
        <span class="screen-reader-text"><?php esc_html_e( 'Rechercher :', 'insuffle' ); ?></span>
    </label>
    <div class="search-form-wrapper">
        <input type="search"
               id="search-form-<?php echo esc_attr( uniqid() ); ?>"
               class="search-field"
               placeholder="<?php echo esc_attr_x( 'Rechercher...', 'placeholder', 'insuffle' ); ?>"
               value="<?php echo get_search_query(); ?>"
               name="s" />
        <button type="submit" class="search-submit btn">
            <span class="search-submit-text"><?php esc_html_e( 'Rechercher', 'insuffle' ); ?></span>
            <span class="search-submit-icon" aria-hidden="true">🔍</span>
        </button>
    </div>
</form>
