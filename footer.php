<?php
/*
 * Name: footer
 * This is the site-footer template file.
 * This file contains the tags necessary to proofread the footer section of your site.
 */
?>
</div>
<!-- /.content__wrap -->

<footer>
    <div class="container">
        <div class="footer__wrap">
            <div id="menu-2" class="footer__menu">
                <?php wp_nav_menu(array(
                    'menu'                 => 'footer-menu',
                    'container'            => 'ul',
                    'container_class'      => '',
                    'container_id'         => '',
                    'container_aria_label' => '',
                    'menu_class'           => 'footer__link',
                    'menu_id'              => 'footer-menu',
                    'echo'                 => true,
                    'fallback_cb'          => 'wp_page_menu',
                    'before'               => '',
                    'after'                => '',
                    'link_before'          => '',
                    'link_after'           => '',
                    'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'item_spacing'         => 'preserve',
                    'depth'                => 1,
                    'walker'               => '',
                    'theme_location' => 'footer',
                )); ?>
            </div>
            <div class="footer__copyright">
                <p>
                    <?php esc_html_e('Powered by', 'movaone'); ?>
                    <span class="credit-link"><a href="http://wordpress.org" target="_blank">WordPress</a></span>.
                    <?php esc_html_e('Theme by ', 'movaone'); ?>
                    <span class=" credit-link"><a href="https://profiles.wordpress.org/369work/">369work</a></span>.
                </p>
                <p>&copy; <?php echo Date("Y"); ?>
                    <a href=" <?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </p>
            </div>
        </div>
    </div>
</footer>
</div><!-- /.body__wrap -->

<?php wp_footer(); ?>
</body>

</html>