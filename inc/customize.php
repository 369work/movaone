<?php

function movaone_customizer($wp_customize)
{

	$wp_customize->add_section('movaone_toggle_features', array(
		'title' 	=> __('Movaone Features', 'movaone'),
		'priority' 	=> 30,
	));

	//header background color 1
	$header_text_color = '#fefef1';
	$wp_customize->add_setting('header_text_color', array(
		'default' 	=> $header_text_color,
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_text_color', array(
		'label' 	=> __('Header Text color', 'movaone'),
		'section' 	=> 'movaone_toggle_features',
		'settings' 	=> 'header_text_color',
	)));

	//header background color 1
	$header_bg_color_1 = '#313131';
	$wp_customize->add_setting('header_bgcolor_1', array(
		'default' 	=> $header_bg_color_1,
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bgcolor_1', array(
		'label' 	=> __('Header Background color(gradation 2color select)', 'movaone'),
		'section' 	=> 'movaone_toggle_features',
		'settings' 	=> 'header_bgcolor_1',
	)));

	//header background color 2
	$header_bg_color_2 = '#444444';
	$wp_customize->add_setting('header_bgcolor_2', array(
		'default' 	=> $header_bg_color_2,
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bgcolor_2', array(
		'section' 	=> 'movaone_toggle_features',
		'settings' 	=> 'header_bgcolor_2',
	)));

	//add CTA Button link and text
	$wp_customize->add_setting('cta_button_text', array(
		'default' 	=> 'CTA BUTTON',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('cta_button_text', array(
		'label' 	=> __('CTA Button Text', 'movaone'),
		'section' 	=> 'movaone_toggle_features',
		'settings' 	=> 'cta_button_text',
	));

	$wp_customize->add_setting('cta_button_link', array(
		'default' 	=> '#main',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('cta_button_link', array(
		'label' 	=> __('CTA Button Link', 'movaone'),
		'section' 	=> 'movaone_toggle_features',
		'settings' 	=> 'cta_button_link',
	));


}

add_action('customize_register', 'movaone_customizer');

//the custom css output

//adding custom css
function movaone_customize_css()
{
?>
<style type="text/css">
header {
    background: linear-gradient(to right, <?php echo esc_html(get_theme_mod('header_bgcolor_1', '#313131')); ?>, <?php echo esc_html(get_theme_mod('header_bgcolor_2', '#444444')); ?>);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.header__logo__title {
    color: <?php echo esc_html(get_theme_mod('header_text_color', '#fefef1'));
    ?>;
}

a.header__link__button {
    color: <?php echo esc_html(get_theme_mod('header_text_color', '#fefef1'));
    ?>;
}
</style>
<?php
}
add_action('wp_head', 'movaone_customize_css');


function movaone_sanitize_all_checkbox($input)
{
	if ($input == 1) {
		return 1;
	} else {
		return '';
	}
}