<?php


/**
 * Meed Network Customizer functionality
 *
 * @package MeedNetworks
 * @subpackage Meed_NetwWorks
 * @since Meed Networks 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Meed Networks 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
*/

function twentyfifteen_customize_register( $wp_customize ) {
	//$color_scheme = twentyfifteen_get_color_scheme();

	$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//add control for the header and tagline
	$wp_customize->add_section( 'Home-Header' , array(
    'title'      => __( 'Text Description For The Home', 'meednetworks' ),
    'priority'   => 15,
	) );
	$wp_customize->add_setting( 'home_header', array(
		'default'           => 'Nigeria Leading Network Infrastructure',
		//'sanitize_callback' => 'twentyfifteen_sanitize_color_scheme',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control('home_header', array(
		'label'    => __( 'header_text', 'meednetworks' ),
		'section'  => 'Home-Header',
		'type'     => 'text',
		'priority' => 1,
	) );
		$wp_customize->add_setting( 'home_header_text', array(
		'default'           => 'We have a strong focus on using information technology to improve the operational efficiencies of institutions and organisations of different sizes. From integrated networks, fiber optics, cabling systems, Wireless/LAN, telecom infrastructure, biometrics, test and network security, our portfolio of ground-breaking solutions speak volume about our experience. See why you should work with us?',
		//'sanitize_callback' => 'twentyfifteen_sanitize_color_scheme',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control('home_header_text', array(
		'label'    => __( 'Home Header Text', 'meednetworks' ),
		'section'  => 'Home-Header',
		'type'     => 'textarea',
		'priority' => 2,
	) );
	

	// Add control for the blog scheme setting and control.
	$wp_customize->add_section( 'Blog_summary' , array(
    'title'      => __( 'Blog Summary', 'meednetworks' ),
    'priority'   => 30,
	) );
	$wp_customize->add_setting( 'Blog_post_header', array(
		'default'           => 'Blog Post header',
		//'sanitize_callback' => 'twentyfifteen_sanitize_color_scheme',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control('Blog_post_header', array(
		'label'    => __( 'Blog Post', 'meednetworks' ),
		'section'  => 'Blog_summary',
		'type'     => 'text',
		'priority' => 1,
	) );
		$wp_customize->add_setting( 'Blog_post_sub', array(
		'default'           => 'Latest Blog Posts',
		//'sanitize_callback' => 'twentyfifteen_sanitize_color_scheme',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control('Blog_post_sub', array(
		'label'    => __( 'Blog Post', 'meednetworks' ),
		'section'  => 'Blog_summary',
		'type'     => 'text',
		'priority' => 2,
	) );
	$wp_customize->add_setting( 'Blog_post_summary', array(
		'default'           => 'We use the Meed Blog as a medium to articulate and share some of the knowledge and experiences we gain from the field. The objective is simply to improve the industry.',
		//'sanitize_callback' => 'twentyfifteen_sanitize_color_scheme',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control('Blog_post_summary', array(
		'label'    => __( 'Blog Post Text', 'meednetworks' ),
		'section'  => 'Blog_summary',
		'type'     => 'textarea',
		'priority' => 3,
	) );

	//footer texts

		// Add control for the blog scheme setting and control.
	$wp_customize->add_section( 'Footer_text' , array(
    'title'      => __( 'Footer Bar', 'meednetworks' ),
    'priority'   => 30,
	) );
	$wp_customize->add_setting( 'copyright', array(
		'default'           => '© Copyright 2014 Meed Networks Limited. Website by Ultractiv. All Rights Reserved.',
		//'sanitize_callback' => 'twentyfifteen_sanitize_color_scheme',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control('copyright', array(
		'label'    => __( 'copyright', 'meednetworks' ),
		'section'  => 'Footer_text',
		'type'     => 'text',
		'priority' => 1,
	) );



}
add_action( 'customize_register', 'twentyfifteen_customize_register', 11 );




?>