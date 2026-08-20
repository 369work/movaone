<?php
/**
 * Comment Block
 *
 * @package movaone
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
	<h3 class="comments-title">
		<?php
			$comments_number = get_comments_number();
		if ( 1 === $comments_number ) {
			/* translators: %s: post title */
			printf( esc_html( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'movaone' ) ), esc_html( get_the_title() ) );
		} else {
			printf(
				esc_html(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s thought on &ldquo;%2$s&rdquo;',
						'%1$s thoughts on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'movaone'
					)
				),
				esc_html( number_format_i18n( $comments_number ) ),
				esc_html( get_the_title() )
			);
		}
		?>
	</h3>

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through.
			?>
	<nav id="comment-nav-above" class="comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'movaone' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'movaone' ) ); ?>
		</div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'movaone' ) ); ?></div>
	</nav><!-- #comment-nav-above -->
			<?php
	endif; // Check for comment navigation.
		?>

	<ul class="comment-list">
		<?php wp_list_comments(); ?>
	</ul><!-- .comment-list -->

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through.
			?>
	<nav id="comment-nav-below" class="comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'movaone' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'movaone' ) ); ?>
		</div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'movaone' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
			<?php
endif; // Check for comment navigation.
		?>

		<?php
	endif; // have_comments().
	?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we.
	if ( ! comments_open() && '0' !== get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
	<p class="no-comments"><?php esc_html_e( 'Comments for this topic is closed.', 'movaone' ); ?></p>
	<?php endif; ?>

	<?php comment_form( array( 'title_reply' => 'Add your Thoughts' ) ); ?>

</div><!-- #comments -->