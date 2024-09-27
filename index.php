<?php
/*
 * This is the main template file Index.
 * This is the most generic template file in a WordPress theme
 * It is used to display a page when nothing more specific matches a query.

 */
get_header(); ?>
<main>
    <div class="main__wrap">
        <div class="container the-container">
            <section>
                <div class="contents">
                    <?php
                    if (have_posts()) : ?>
                    <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                get_template_part('parts/content', get_post_format()); ?>
                    <?php
                            endwhile;
                        else:
                            esc_html_e('Sorry, nothing found!', 'movaone');
                        endif;
                        ?>


                    <?php
                    else :
                        esc_html_e('Sorry, nothing to show here, Please check back later', 'movaone');
                    endif;
                    ?>
                    <div class="navigation">
                        <div class="previous">
                            <?php esc_html(previous_posts_link(__('&laquo; Previous Page', 'movaone'))); ?></div>
                        <div class="next"><?php esc_html(next_posts_link(__('Next Page &raquo;', 'movaone'))); ?></div>
                    </div>
                </div>
            </section>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php
get_footer();