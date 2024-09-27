<?php
/**
 * The template for displaying archive pages
 */

get_header(); ?>

<main>
    <div class="main__wrap">
        <div class="container the-container">
            <div class="inner-wrap">
                <?php
				if (have_posts()) : ?>
                <div class="relative">
                    <div class="contents">
                        <div class="entry-header">
                            <h1 class="page-title"><?php the_archive_title(); ?> </h1>
                        </div><!-- .page-header -->

                        <?php
							if (have_posts()) :
								while (have_posts()) : the_post();
									get_template_part('parts/content', get_post_format());
								endwhile;
							else:
								esc_html_e('Sorry, nothing found!', 'movaone');
							endif;
							?>
                        <div class="navigation">
                            <div class="previous">
                                <?php esc_html(previous_posts_link(__('&laquo; Previous Page', 'movaone'))); ?></div>
                            <div class="next"><?php esc_html(next_posts_link(__('Next Page &raquo;', 'movaone'))); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
				else :
					esc_html_e('Sorry, nothing to show here, Please check back later', 'movaone');
				endif;
				?>
                <?php get_sidebar(); ?>
            </div>
        </div>

    </div>
</main>

<?php get_footer();