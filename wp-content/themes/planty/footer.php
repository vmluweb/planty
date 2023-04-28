<footer class="footer">
    <?php wp_nav_menu(
        array(
            'theme_location' => 'menu-footer',
            'container' => false,
            'link_before' => '<span itemprop="name">',
            'link_after' => '</span>'
        )
    ); ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>