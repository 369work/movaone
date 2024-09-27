<?php

$tags = wp_get_post_tags($post->ID);
if ($tags) {

	$first_tag = $tags[0]->term_id;
	$args_related = array(
		'tag__in' => array($first_tag),
		'post__not_in' => array($post->ID),
		'posts_per_page' => 3,
		'ignore_sticky_posts' => 1
	);

	$the_query = new WP_Query($args_related);

	if ($the_query->have_posts()) : ?>
<div class="related-post-wrap">
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

    <div class="related-post">

        <a href="<?php the_permalink(); ?>">

            <div class="related-featured-image">
                <?php the_post_thumbnail(); ?>

            </div>

        </a>
        <div class="related-post-meta">
            <?php the_title(); ?> <br />
            <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?><?php esc_html_e('ago', 'movaone'); ?>

        </div>
    </div>

    <?php
	endwhile;
	wp_reset_postdata();
	echo "</div>";
endif;
}