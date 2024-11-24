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

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="body__wrap">
        <header>
            <div class="container">
                <div class="header__wrap">
                    <a class="skip-link" href="#main"><?php _e('Skip to content', 'movaone'); ?></a>
                    <div class="header__logo">
                        <a class="header__logo__link" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php movaone_logo(); ?>
                            <span class="header__logo__title"><?php bloginfo('name') ?></span>
                        </a>
                    </div>
                    <div class="header__nav">
                        <div class="header__link">
                            <a href="<?php echo movaone_cta_link(); ?>"
                                class="header__link__button"><?php echo esc_html(get_theme_mod('cta_button_text', 'CTA BUTTON')); ?></a>
                        </div>
                        <button data-collapse-toggle="header-menu-dialog" type="button" class="header__menu__button"
                            aria-controls="header-menu-dialog" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <img class="open" src="<?php echo esc_url(THEME_IMAGES . 'bar.webp') ?>" alt="menu-open">
                            <img class="close hidden" src="<?php echo esc_url(THEME_IMAGES . 'times.webp') ?>"
                                alt="menu-close">
                        </button>
                    </div>
                </div>
                <dialog id="header-menu-dialog" class="header__menu" role="dialog" aria-modal="true"
                    aria-label="header-menu">
                    <?php
                    wp_nav_menu(array(
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
                    ));

                    ?>
                </dialog>
            </div>
        </header>

        <div class="content__wrap">
            <aside>
                <div class="aside__wrap">
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