<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">

    <a class="skip-link screen-reader-text" href="#content">
        <?php esc_html_e( 'Aller au contenu principal', 'insuffle' ); ?>
    </a>

    <header id="site-header" class="site-header">
        <div class="container">
            <div class="header-inner">

                <div class="site-branding">
                    <?php
                    if ( has_custom_logo() ) :
                        the_custom_logo();
                    else :
                        ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
                        <?php
                    endif;
                    ?>
                </div>

                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="toggle-text"><?php esc_html_e( 'Menu', 'insuffle' ); ?></span>
                </button>

                <nav id="site-navigation" class="main-navigation">
                    <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'container'      => false,
                                'fallback_cb'    => false,
                            )
                        );
                    }
                    ?>
                </nav>

            </div><!-- .header-inner -->
        </div><!-- .container -->
    </header><!-- #site-header -->

    <div id="content" class="site-content">
