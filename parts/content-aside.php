<div class="post-wrap">
    <?php if (has_post_thumbnail()) { ?>
    <div class="featured-image-wrap">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
    </div>
    <?php } ?>

    <!-- Display the date and a link to other posts. -->
    <div class="post-meta">
        <span class="post-time-stamp">
            <?php the_time(get_option('date_format')); ?>&nbsp;
        </span>
        <span class="post-category">
            <?php the_category(', '); ?>
        </span>
    </div>


    <!-- Display the Post's content in a div box. -->
    <div class="entry">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue reading...', 'movaone'); ?> </a>
    </div>
</div>