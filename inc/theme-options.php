<?php
/*
* Movaone Theme Options
* @package movaone
* @since 2.0
* @author Movaone
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// add admin menu for theme options
function movaone_theme_add_admin_menu()
{
    add_menu_page(
        __('Movaone Theme Description', 'movaone'),
        __('Movaone', 'movaone'),
        'manage_options',
        'movaone-theme-description',
        'movaone_theme_description_page',
        'dashicons-pets',
        59 // Position (just above Appearance menu which is at 60)
    );
}
add_action('admin_menu', 'movaone_theme_add_admin_menu');


// Display the theme options page
function movaone_theme_description_page()
{
    $lang = get_bloginfo('language');
?>
    <style>
        #wpwrap .admin-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        #wpwrap .admin-sub-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            padding-bottom: .5rem;
            border-bottom: 1px solid #5e96ff;
        }

        #wpwrap p {
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        #wpwrap .content {
            box-sizing: border-box;
            width: 100%;
            margin-top: 1rem;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        #wpwrap .content-pro {
            box-sizing: border-box;
            width: 100%;
            margin-top: 1rem;
            padding: 1rem;
            border: 3px solid #b4ffa1;
            border-radius: 5px;
            background-color: #feffef;
        }

        .content .border {
            border: 1px solid #5e96ff;
        }

        .content .bold {
            font-weight: bold;
        }

        .content a {
            color: #fff;
            font-size: 1rem;
        }
    </style>
    <div class="wrap">
        <h1 class="admin-title"><?php esc_html_e('Movaone Theme Options', 'movaone'); ?></h1>
        <div class="notice notice-success is-dismissible">
            <h3 class="admin-sub-title"><?php esc_html_e('Thank you for using the Movaone theme!', 'movaone'); ?></h3>
            <p><?php esc_html_e('Here you can customize the Movaone theme.', 'movaone'); ?></p>
        </div>

        <div class="content">
            <h2 class="admin-sub-title"><?php esc_html_e('Getting Started', 'movaone'); ?></h2>
            <p><?php esc_html_e('To get started with the Movaone theme, you can customize the theme using the Customizer.', 'movaone'); ?></p>
            <a href="<?php echo esc_url(admin_url('customize.php?movaone-theme-options')); ?>" style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;"><?php esc_html_e('Customize', 'movaone'); ?></a>

        </div>

        <div class="content">
            <h3 class="admin-sub-title"><?php esc_html_e('Basic usage of Movaone theme', 'movaone'); ?></h3>
            <p><?php esc_html_e('The Customizer allows you to easily customize the look of your site. You can customize the following elements:', 'movaone'); ?></p>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">

                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Custom logo', 'movaone'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Custom Header', 'movaone'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Custom background Color', 'movaone'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Custom background', 'movaone'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Menu placement', 'movaone'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Sidebar Widget', 'movaone'); ?></p>
                </div>

            </div>
            <a href="<?php echo esc_url(admin_url('customize.php?movaone-theme-options')); ?>" style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;">
                <?php esc_html_e('Customize', 'movaone'); ?>
            </a>

        </div>

        <div class="content">
            <h2 class="admin-sub-title"><?php esc_html_e('Theme Support', 'movaone'); ?></h2>
            <p><?php esc_html_e('If you have any questions or need help with the movaone theme, please visit the support page.', 'movaone'); ?></p>
            <a href="https://369theme.com/theme/movaone" target="_blank" style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;"><?php esc_html_e('Go Details Page', 'movaone'); ?></a>
        </div>

        <div class="content">
            <h2 class="admin-sub-title"><?php esc_html_e('Review the Movaone Theme', 'movaone'); ?></h2>
            <p><?php esc_html_e('Thank you for using the Movaone theme!', 'movaone'); ?></p>
            <p><?php esc_html_e('We would love to hear your feedback on the Movaone theme. Please take a moment to leave a review.', 'movaone'); ?></p>
            <a href="https://wordpress.org/support/theme/movaone/reviews/" target="_blank" style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;">
                <?php esc_html_e('Leave a Review', 'movaone'); ?>
            </a>
        </div>

    </div>
<?php
}

// title tag separator
function movaone_title_separator()
{
    return '|';
}
add_filter('document_title_separator', 'movaone_title_separator');
