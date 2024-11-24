<?php

/**
 * Template Name: Page Default
 * This is the basic static page template.
 */

get_header(); ?>

<main id="main">
    <div class="main__wrap">
        <div class="container the-container">
            <div class="inner-wrap">
                <div class="row">
                    <div class="col-md-8">
                        <div class="content">
                            <?php while (have_posts()) : the_post();
                                get_template_part('parts/content', 'page'); ?>
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;
                            endwhile; ?>
                        </div>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
                <!--/ row-->
            </div> <!-- /inner-wrap-->
        </div>
        <!--/ container-->
    </div>
</main>

<?php get_footer();