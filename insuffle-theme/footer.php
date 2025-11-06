    </div><!-- #content -->

    <?php
    // Display footer menus and widgets section (before main footer)
    get_template_part( 'template-parts/footer-menus-widgets' );
    ?>

    <footer id="site-footer" class="site-footer">
        <div class="container">
            <div class="footer-credits">

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

                <!-- Back to top link (inline with copyright) -->
                <a href="#page" class="back-to-top-link" aria-label="<?php esc_attr_e( 'Retour en haut', 'insuffle' ); ?>">
                    <?php esc_html_e( 'Haut de page', 'insuffle' ); ?> ↑
                </a>

            </div><!-- .footer-credits -->
        </div><!-- .container -->
    </footer><!-- #site-footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
