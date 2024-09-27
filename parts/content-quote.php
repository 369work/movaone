<div class="post-wrap">
    <blockquote>
        <?php if ($post->post_excerpt) { ?>

        <?php the_excerpt(); ?>

        <?php } else {

            the_content();
        } ?>
    </blockquote>
</div>