<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function creative_one_page_logo_customize_register( $wp_customize ) {
	// Logo Resizer additions
	$wp_customize->add_setting( 'logo_size', array(
		'default'              => 50,
		'type'                 => 'theme_mod',
		'theme_supports'       => 'custom-logo',
		'transport'            => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );

	$wp_customize->add_control( 'logo_size', array(
		'label'       => esc_html__( 'Logo Size','creative-one-page' ),
		'section'     => 'title_tagline',
		'priority'    => 9,
		'type'        => 'range',
		'settings'    => 'logo_size',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 100,
			'aria-valuemin'    => 0,
			'aria-valuemax'    => 100,
			'aria-valuenow'    => 50,
			'aria-orientation' => 'horizontal',
		),
	) );

	$wp_customize->add_setting('creative_one_page_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'creative_one_page_sanitize_checkbox'
    ));
    $wp_customize->add_control('creative_one_page_site_title',array(
       'type' => 'checkbox',
       'label' => __('Site Title','creative-one-page'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('creative_one_page_site_title_size_option',array(
		'default'	=> 30,
		'sanitize_callback'	=> 'creative_one_page_sanitize_float'
	));
	$wp_customize->add_control('creative_one_page_site_title_size_option',array(
		'label'	=> __('Site Title Size option','creative-one-page'),
		'section'	=> 'title_tagline',
		'setting'	=> 'creative_one_page_site_title_size_option',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

    $wp_customize->add_setting('creative_one_page_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'creative_one_page_sanitize_checkbox'
    ));
    $wp_customize->add_control('creative_one_page_tagline',array(
       'type' => 'checkbox',
       'label' => __('Tagline','creative-one-page'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('creative_one_page_site_tagline_size_option',array(
		'default'	=> 12,
		'sanitize_callback'	=> 'creative_one_page_sanitize_float'
	));
	$wp_customize->add_control('creative_one_page_site_tagline_size_option',array(
		'label'	=> __('Site Tagline Size option','creative-one-page'),
		'section'	=> 'title_tagline',
		'setting'	=> 'creative_one_page_site_tagline_size_option',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));
}
add_action( 'customize_register', 'creative_one_page_logo_customize_register' );

/**
 * Add support for logo resizing by filtering `get_custom_logo`
 */
function creative_one_page_customize_logo_resize( $html ) {
	$size = get_theme_mod( 'logo_size' );
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	// set the short side minimum
	$min = 48;

	// don't use empty() because we can still use a 0
	if ( is_numeric( $size ) && is_numeric( $custom_logo_id ) ) {

		// we're looking for $img['width'] and $img['height'] of original image
		$logo = wp_get_attachment_metadata( $custom_logo_id );
		if ( ! $logo ) return $html;

		// get the logo support size
		$sizes = get_theme_support( 'custom-logo' );

		// Check for max height and width, default to image sizes if none set in theme
		$max['height'] = isset( $sizes[0]['height'] ) ? $sizes[0]['height'] : $logo['height'];
		$max['width'] = isset( $sizes[0]['width'] ) ? $sizes[0]['width'] : $logo['width'];

		// landscape or square
		if ( $logo['width'] >= $logo['height'] ) {
			$output = creative_one_page_min_max( $logo['height'], $logo['width'], $max['height'], $max['width'], $size, $min );
			$img = array(
				'height'	=> $output['short'],
				'width'		=> $output['long']
			);
		// portrait
		} else if ( $logo['width'] < $logo['height'] ) {
			$output = creative_one_page_min_max( $logo['width'], $logo['height'], $max['width'], $max['height'], $size, $min );
			$img = array(
				'height'	=> $output['long'],
				'width'		=> $output['short']
			);
		}

		// add the CSS
		$css = '
<style>
.custom-logo {
	height: ' . $img['height'] . 'px;
	max-height: ' . $max['height'] . 'px;
	max-width: ' . $max['width'] . 'px;
	width: ' . $img['width'] . 'px;
}
</style>';

		$html = $css . $html;
	}

	return $html;
}
add_filter( 'get_custom_logo', 'creative_one_page_customize_logo_resize' );

/* Helper function to determine the max size of the logo */
function creative_one_page_min_max( $short, $long, $short_max, $long_max, $percent, $min ){
	$ratio = ( $long / $short );
	$max['long'] = ( $long_max >= $long ) ? $long : $long_max;
	$max['short'] = ( $short_max >= ( $max['long'] / $ratio ) ) ? floor( $max['long'] / $ratio ) : $short_max;

	$ppp = ( $max['short'] - $min ) / 100;

	$size['short'] = round( $min + ( $percent * $ppp ) );
	$size['long'] = round( $size['short'] / ( $short / $long ) );

	return $size;
}

/**
 * JS handlers for Customizer Controls
 */
function creative_one_page_customize_controls_js() {
	wp_enqueue_script( 'creative-one-page-customizer-controls', esc_url(get_template_directory_uri()) . '/inc/logo/js/customize-controls.js', array( 'jquery', 'customize-preview' ), '201709071000', true );
}
add_action( 'customize_controls_enqueue_scripts', 'creative_one_page_customize_controls_js' );

/**
 * Adds CSS to the Customizer controls.
 */
function creative_one_page_customize_css() {
	wp_add_inline_style( 'customize-controls', '#customize-control-logo_size input[type=range] { width: 100%; }' );
}
add_action( 'customize_controls_enqueue_scripts', 'creative_one_page_customize_css' );

/**
 * Testing function to remove logo_size theme mod
 */
function creative_one_page_remove_theme_mod() {
	if ( isset( $_GET['remove_logo_size'] ) && 'true' == $_GET['remove_logo_size'] ){
		set_theme_mod( 'logo_size', '' );
	}
}
add_action( 'wp_loaded', 'creative_one_page_remove_theme_mod' );