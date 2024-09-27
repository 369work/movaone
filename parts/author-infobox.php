<?php if (get_theme_mod('author_info_post_page') == 0) { ?>
<div class="author-block">
    <h3><?php esc_html_e('About ', 'movaone'); ?> <?php the_author_meta('display_name'); ?></h3>

    <p class="author-details">
        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
            <?php echo get_avatar(get_the_author_meta('user_email'), 90); ?>
        </a>
    </p>
    <div class="author-cont">
        <p class="author-description"> <?php the_author_meta('description') ?>
        </p>
    </div>

</div>
<?php } ?>