<div class="post-wrap">
    <!-- Display the date and a link to other posts. -->
    <div class="post-meta">
        <span class="post-time-stamp">!@
            <?php the_time(get_option('date_format')); ?>&nbsp;
        </span>
    </div>


    <!-- Display the Post's content in a div box. -->
    <div class="entry">
        <?php the_excerpt(); ?>
    </div>
</div>