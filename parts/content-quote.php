<?php
/**
 * Template part for displaying quote posts.
 *
 * @package movaone
 */

?>

<?php global $post; ?>

<div class="post-wrap">
	<blockquote>
		<?php if ( $post->post_excerpt ) { ?>

			<?php the_excerpt(); ?>

			<?php
		} else {

			the_content();
		}
		?>
	</blockquote>
</div>