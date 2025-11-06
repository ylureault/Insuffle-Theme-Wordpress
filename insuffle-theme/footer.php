    </div><!-- #content -->

    <footer id="site-footer" class="site-footer">
        <div class="container">

            <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
                <div class="footer-content">

                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="footer-column">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <div class="footer-column">
                            <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <div class="footer-column">
                            <?php dynamic_sidebar( 'footer-3' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                        <div class="footer-column">
                            <?php dynamic_sidebar( 'footer-4' ); ?>
                        </div>
                    <?php endif; ?>

                </div><!-- .footer-content -->
            <?php endif; ?>

            <div class="footer-bottom">

                <?php
                // Footer logo
                $footer_logo_id = get_theme_mod( 'insuffle_footer_logo' );
                if ( $footer_logo_id ) :
                    $footer_logo_url = wp_get_attachment_image_url( $footer_logo_id, 'full' );
                    if ( $footer_logo_url ) :
                        ?>
                        <img src="<?php echo esc_url( $footer_logo_url ); ?>"
                             alt="<?php bloginfo( 'name' ); ?>"
                             class="footer-logo">
                        <?php
                    endif;
                endif;
                ?>

                <p class="copyright">
                    <?php
                    $footer_text = get_theme_mod( 'insuffle_footer_text', '' );
                    if ( ! empty( $footer_text ) ) {
                        echo wp_kses_post( $footer_text );
                    } else {
                        printf(
                            /* translators: %1$s: current year, %2$s: site name */
                            esc_html__( '&copy; %1$s %2$s - Tous droits réservés', 'insuffle' ),
                            date_i18n( 'Y' ),
                            get_bloginfo( 'name' )
                        );
                    }
                    ?>
                </p>

                <?php
                // Footer menu
                if ( has_nav_menu( 'footer' ) ) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'container'      => 'nav',
                            'container_class' => 'footer-navigation',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        )
                    );
                }
                ?>

            </div><!-- .footer-bottom -->

        </div><!-- .container -->
    </footer><!-- #site-footer -->

    <!-- Back to top button -->
    <a href="#page" class="back-to-top" aria-label="<?php esc_attr_e( 'Retour en haut', 'insuffle' ); ?>">
        ↑
    </a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
