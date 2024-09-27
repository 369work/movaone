<div class="page-content">

    <h2><?php the_title(); ?></h2>

    <p><?php the_content(); ?></p>
    <?php wp_link_pages(array(
		'before' => '<div class="page-links">' . esc_html__('Pages:', 'movaone'),
		'after'  => '</div>',
	));
	?>
</div>