<?php
/*
 * Template Name: Front Page
 * This is the site top only template file.
 * This is the general top page template file for a WordPress theme.
 */
?>

<?php get_header(); ?>

<main id="main">
    <div class="main__wrap">
        <section>
            <div class="container">
                <?php
                if (have_posts()) : ?>
                <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            get_template_part('parts/content-front', get_post_format()); ?>

                <?php endwhile;

                    else:
                        esc_html_e('Sorry, nothing found!', 'movaone');
                    endif; ?>


                <?php
                else :
                    esc_html_e('Sorry, nothing to show here, Please check back later', 'movaone');
                endif
                ?>
            </div>
        </section>
        <?php get_sidebar(); ?>
    </div>
</main>


<?php get_footer(); ?>