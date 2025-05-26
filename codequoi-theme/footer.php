<footer class="site-footer border-t border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 p-6 mt-12">
    <div class="container mx-auto text-center text-sm text-gray-600 dark:text-gray-400 space-y-2">
        <nav class="footer-menu mb-4">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_class'     => 'flex justify-center space-x-6',
                'container'      => false,
                'fallback_cb'    => false,
            ) );
            ?>
        </nav>
        <p>Designed &amp; Developed by <a href="https://www.miacombeau.com" class="text-blue-600 hover:underline">Mia Combeau</a> with <a href="https://gohugo.io" class="text-blue-600 hover:underline">Hugo</a></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
