<?php
function quidus_sections( $wp_customize ) {


	// Remove the core header textcolor control, as it shares the sidebar text color.
	$wp_customize->remove_control( 'header_textcolor' );
	

	$wp_customize->remove_section( 'colors' );

    $wp_customize->add_panel( 'quidus_color_panel', array(
        'priority'    => 10,
        'title'       => __( 'Advanced Color Options', 'quidus' ),
        'description' => __( 'Please use these with caution. Good Luck!', 'quidus' ),
    ) );
	
    $wp_customize->add_panel( 'quidus_typography_panel', array(
        'priority'    => 10,
        'title'       => __( 'Typography', 'quidus' ),
        'description' => __( 'Typography Options', 'quidus' ),
    ) );
	
    $wp_customize->add_panel( 'quidus_social_panel', array(
        'priority'    => 10,
        'title'       => __( 'Social', 'quidus' ),
        'description' => __( 'Social Options', 'quidus' ),
    ) );
	
	$wp_customize->add_section( 'quidus_colors_general' , array(
		'title'      => __('General Color Options','quidus'),
		'description' => __( 'For quick optimization only.', 'quidus' ),
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_logo_colors' , array(
		'title'      => __('Logo','quidus'),
		'panel' => 'quidus_color_panel',
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_social_icon_colors' , array(
		'title'      => __('Social Icons','quidus'),
		'panel' => 'quidus_color_panel',
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_menu_colors' , array(
		'title'      => __('Menu','quidus'),
		'panel' => 'quidus_color_panel',
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_button_colors' , array(
		'title'      => __('Buttons','quidus'),
		'panel' => 'quidus_color_panel',
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_header_colors' , array(
		'title'      => __('Headings','quidus'),
		'panel' => 'quidus_color_panel',
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_post_colors' , array(
		'title'      => __('Post Items','quidus'),
		'panel' => 'quidus_color_panel',
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_element_colors' , array(
		'title'      => __('Elements','quidus'),
		'panel' => 'quidus_color_panel',
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_header_social' , array(
		'title'      => __('Header Social Icons','quidus'),
		'panel' => 'quidus_social_panel',
		'priority'   => 10
	) );
	
	$wp_customize->add_section( 'quidus_author_social' , array(
		'title'      => __('Author Social Icons','quidus'),
		'panel' => 'quidus_social_panel',
		'priority'   => 10
	) );
	
	$wp_customize->add_section( 'quidus_footer_social' , array(
		'title'      => __('Footer Social Icons','quidus'),
		'panel' => 'quidus_social_panel',
		'priority'   => 10
	) );
	
	$wp_customize->add_section( 'quidus_font_family_general' , array(
		'title'      => __('General Font Family Options','quidus'),
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_font_size_advanced' , array(
		'title'      => __('Advanced Font Size Options','quidus'),		'description' => __( 'Adjust the ratio of font size. The minimum step is 1.', 'quidus'),
		'panel' => 'quidus_typography_panel',
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_excerpt' , array(
		'title'      => __('Excerpt','quidus'),
		'panel' => 'quidus_typography_panel',
		'priority'   => 10,
	) );
	
	$wp_customize->add_section( 'quidus_layout' , array(
		'title'      => __('Layout','quidus'),
		'priority'   => 10,
	) );

	$wp_customize->add_section( 'quidus_right_sidebar' , array(
		'title'      => __('Right Sidebar','quidus'),
		'priority'   => 10,
	) );
	
}

add_action('customize_register', 'quidus_sections');