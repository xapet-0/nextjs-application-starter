<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
    <title><?php wp_title('|', true, 'right'); ?></title>
</head>
<body <?php body_class(); ?>>
<header class="site-header p-4 border-b border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900">
    <div class="container mx-auto flex flex-wrap items-center justify-between">
        <div class="site-branding">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold text-blue-600 hover:text-blue-800">
                CodeQuoi
            </a>
        </div>

        <nav class="primary-navigation flex items-center space-x-4">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'flex space-x-4',
                'container'      => false,
                'fallback_cb'    => false,
            ) );
            ?>
        </nav>

        <div class="header-controls flex items-center space-x-4">
            <!-- Language Switcher Placeholder -->
            <div class="language-switcher">
                <?php
                if ( function_exists( 'pll_the_languages' ) ) {
                    pll_the_languages( array( 'dropdown' => 1 ) );
                } elseif ( function_exists( 'icl_get_languages' ) ) {
                    // WPML language switcher code here
                    do_action( 'wpml_add_language_selector' );
                } else {
                    // Fallback language switcher
                    echo '<select onchange="location = this.value;">';
                    echo '<option value="' . esc_url(home_url('/')) . '">EN</option>';
                    echo '<option value="' . esc_url(home_url('/fr/')) . '">FR</option>';
                    echo '<option value="' . esc_url(home_url('/ar/')) . '">AR</option>';
                    echo '</select>';
                }
                ?>
            </div>

            <!-- Dark/Light Theme Switcher -->
            <button id="theme-toggle" aria-label="Toggle Dark Mode" class="p-2 rounded border border-gray-400 dark:border-gray-600">
                🌙
            </button>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-bar container mx-auto mt-4">
        <?php get_search_form(); ?>
    </div>
</header>
</body>
</html>
