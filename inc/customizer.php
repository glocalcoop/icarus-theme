<?php
/**
 * Icarus Theme Customizer.
 *
 * @package Icarus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function icarus_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'icarus_customize_register' );

/**
 * Add Customizer Settings
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function icarus_add_customizer_settings( $wp_customize ) {
    $wp_customize->add_section( 'footer_settings_section', array(
        'title'          => 'Footer'
    ));

    $wp_customize->add_setting( 'license_text_setting', array(
        'default'        => '',
    ));

    $wp_customize->add_control( 'license_text_setting', array(
        'label'   => __( 'License Text', 'icarus' ),
        'section' => 'footer_settings_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting( 'site_info_text_setting', array(
        'default'        => '',
    ));
    
    $wp_customize->add_control( 'site_info_text_setting', array(
        'label'   => __( 'Site Info', 'icarus' ),
        'section' => 'footer_settings_section',
        'type'    => 'textarea',
    ));

}
add_action( 'customize_register', 'icarus_add_customizer_settings' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function icarus_customize_preview_js() {
	wp_enqueue_script( 'icarus_customizer', get_template_directory_uri() . '/dist/scripts/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'icarus_customize_preview_js' );
