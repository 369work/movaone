<?php
/*
 * Name: header
 * This is the site-header template file.
 * This file contains the tags necessary to proofread the header section of your site.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!--- Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="body__wrap">
        <header>
            <div class="container">
                <div class="header__wrap">
                    <div class="header__logo">
                        <a class="header__logo__link" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php movaone_logo(); ?>
                            <span class="header__logo__title"><?php bloginfo('name') ?></span>
                        </a>
                    </div>
                    <div class="header__nav">
                        <div class="header__link">
                            <a href="#download" class="header__link__button">CTA BUTTON</a>
                        </div>
                        <button data-collapse-toggle="menu-1" type="button" class="header__menu__button"
                            aria-controls="menu-1" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="open" fill="currentColor" width="50" height="50" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <svg class="hidden close" fill="currentColor" width="50" height="50" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="menu-1" class="header__menu hidden">
                    <?php wp_nav_menu(array(
                        'menu'                 => 'header-menu',
                        'container'            => 'ul',
                        'container_class'      => '',
                        'container_id'         => '',
                        'container_aria_label' => '',
                        'menu_class'           => 'header__menu__list',
                        'menu_id'              => 'header-menu',
                        'echo'                 => true,
                        'fallback_cb'          => 'wp_page_menu',
                        'before'               => '',
                        'after'                => '',
                        'link_before'          => '',
                        'link_after'           => '',
                        'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'item_spacing'         => 'preserve',
                        'depth'                => 0,
                        'walker'               => '',
                        'theme_location' => 'primary',
                    )); ?>
                </div>
            </div>
        </header>

        <div class="content__wrap">
            <aside>
                <div class="container">
                    <div class="aside__title">
                        <?php
                        $page_id = get_page_by_path('aside');
                        if ($page_id) {
                            echo apply_filters('the_content', $page_id->post_content);
                        }
                        ?>
                    </div>
                </div>
            </aside>