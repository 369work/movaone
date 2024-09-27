<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package movaone
 */
?>
<?php get_header(); ?>

<main>
    <div class="main__wrap">
        <div class="container">
            <div class="inner-wrap">
                <div class="error-404 not-found">
                    <h1 class="page-title"><span class="error_red">404</span>
                        <span><?php esc_html_e('Oops!That page can&rsquo;t be found.', 'movaone'); ?></span>
                    </h1>
                    <div>
                        <p>
                            <?php esc_html_e('Sorry, the page you are looking for could not be found.', 'movaone') ?><br>
                            <?php esc_html_e('Please check the URL or return to the homepage.', 'movaone') ?>
                        </p>
                    </div>
                </div><!-- .error-404 -->

                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();