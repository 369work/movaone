<?php

/**
 * The template part for displaying content-more
 *  more-link made by the_excerpt
 *
 * @package movaone
 */


    if (is_single()) {
        return;
    }

    if (is_search()) {
        return;
    }

    $except = get_the_excerpt();


    if (mb_strlen($except) > 48) {
        $except = mb_substr($except, 0, 48, 'utf-8') . '...';

        $except .= '<p class="align-right">' . '<a class="readmore" href="' . get_the_permalink() . '">' . esc_html__('read more', 'movaone') . '</a></p>';
    }

    echo $except;
?>