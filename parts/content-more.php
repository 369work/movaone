<?php
/**
 * Template part for displaying more posts.
 *
 * @package movaone
 */

if ( is_single() ) {
	return;
}

if ( is_search() ) {
	return;
}

$except = get_the_excerpt();

if ( mb_strlen( $except ) > 48 ) {
	$except = mb_substr( $except, 0, 48, 'utf-8' ) . '...';

	$except .= '<p class="align-right"><a class="readmore" href="' . esc_url( get_the_permalink() ) . '">' . esc_html__( 'read more', 'movaone' ) . '</a></p>';
}

echo wp_kses_post( $except );
