<?php
/*
 * Template Name: Single Post
 * This is the single posy template file for a WordPress theme.
 */
?>

<?php get_header(); ?>

<main>
    <div class="main__wrap">
        <div class="container">
            <div class="inner-wrap">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                ?>
                <article class="post-<?php the_ID(); ?> single-post" <?php post_class(); ?>>

                    <div class="heading">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>

                    <div class="featured-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    }
                                    ?>
                        </a>
                    </div>

                    <p class="post-info">
                        <?php esc_html_e('By', 'movaone'); ?><span class="post-author"> <a
                                href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span>
                        &#8212;
                        <time
                            datetime="<?php the_time('Y-m-d H:i:s'); ?>"><?php the_time(get_option('date_format')); ?></time>

                        <?php esc_html_e(' &#8212; Posted in', 'movaone'); ?>
                        <span class="category"><?php the_category(', '); ?></span>

                    </p>


                    <div class="content-area">
                        <?php the_content(); ?>

                        <?php wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'movaone'),
                                    'after'  => '</div>',
                                ));
                                ?>

                        <?php
                                if (has_tag()) { ?> <p class="post-tags">
                            <?php the_tags('<span>' . ('Tags:') . '</span> ', ', ', '</p>'); ?> <br>

                            <?php } else { ?>
                            <br>
                            <?php }    ?>
                    </div>
                    <?php
                            get_template_part('parts/related-posts');
                            ?>
                    <?php
                            get_template_part('parts/author-infobox');
                            ?>

                    <?php
                            get_template_part('parts/pagination');
                            ?>

                    <div class="comment-block">
                        <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if (comments_open() || '0' != get_comments_number()) :
                                    comments_template();
                                endif;
                        ?>
                    </div>

                </article>
                <?php endwhile;

                else:
                    esc_html_e('Sorry, nothing found!', 'movaone');

                endif;
                ?>

                <?php get_sidebar(); ?>
            </div>
            <!--/ inner wrap-->
        </div>
        <!--/ container-->
    </div>
    <!--/ main__wrap-->
</main>

<?php get_footer();