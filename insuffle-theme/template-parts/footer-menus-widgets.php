<?php
/**
 * Template part for footer menus and widgets section
 * This section appears BEFORE the main footer
 *
 * @package Insuffle
 * @since 1.0.0
 */

$has_footer_menu = has_nav_menu( 'footer' );
$has_social_menu = has_nav_menu( 'social' );
$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );

// Only display this section if at least one element is active
if ( ! $has_footer_menu && ! $has_social_menu && ! $has_sidebar_1 && ! $has_sidebar_2 ) {
    return;
}
?>

<div class="footer-nav-widgets-wrapper">
    <div class="container">

        <?php if ( $has_footer_menu || $has_social_menu ) : ?>
            <div class="footer-menus-wrapper">

                <?php
                // Footer navigation menu
                if ( $has_footer_menu ) {
                    ?>
                    <nav class="footer-menu-wrapper" aria-label="<?php esc_attr_e( 'Menu du footer', 'insuffle' ); ?>">
                        <h2 class="screen-reader-text"><?php esc_html_e( 'Menu du footer', 'insuffle' ); ?></h2>
                        <ul class="footer-menu reset-list-style">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'footer',
                                    'container'       => '',
                                    'items_wrap'      => '%3$s',
                                    'depth'           => 1,
                                    'fallback_cb'     => false,
                                )
                            );
                            ?>
                        </ul>
                    </nav><!-- .footer-menu-wrapper -->
                    <?php
                }

                // Social navigation menu
                if ( $has_social_menu ) {
                    ?>
                    <nav class="social-menu-wrapper" aria-label="<?php esc_attr_e( 'Menu réseaux sociaux', 'insuffle' ); ?>">
                        <h2 class="screen-reader-text"><?php esc_html_e( 'Menu réseaux sociaux', 'insuffle' ); ?></h2>
                        <ul class="social-menu reset-list-style">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'social',
                                    'container'       => '',
                                    'items_wrap'      => '%3$s',
                                    'depth'           => 1,
                                    'link_before'     => '<span class="screen-reader-text">',
                                    'link_after'      => '</span>',
                                    'fallback_cb'     => false,
                                )
                            );
                            ?>
                        </ul>
                    </nav><!-- .social-menu-wrapper -->
                    <?php
                }
                ?>

            </div><!-- .footer-menus-wrapper -->
        <?php endif; ?>

        <?php if ( $has_sidebar_1 || $has_sidebar_2 ) : ?>
            <aside class="footer-widgets-wrapper">

                <?php if ( $has_sidebar_1 ) : ?>
                    <div class="footer-widgets footer-widgets-1">
                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $has_sidebar_2 ) : ?>
                    <div class="footer-widgets footer-widgets-2">
                        <?php dynamic_sidebar( 'sidebar-2' ); ?>
                    </div>
                <?php endif; ?>

            </aside><!-- .footer-widgets-wrapper -->
        <?php endif; ?>

    </div><!-- .container -->
</div><!-- .footer-nav-widgets-wrapper -->
