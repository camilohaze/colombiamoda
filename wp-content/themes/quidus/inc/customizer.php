<?php
/**
 * Quidus Customizer functionality
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
 
require get_template_directory() . '/inc/customizer-sections.php';
 
global $font_choices;
$font_choices = 
        array(
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
            'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Raleway:400,100,200,300,500,600,700,800,900' => 'Raleway',
            'Droid Sans:400,700' => 'Droid Sans',
			'Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' => 'Titillium Web',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Oswald:400,700' => 'Oswald',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Exo:400,700,700italic,400italic' => 'Exo',
			'Exo+2:400,400italic,700,700italic' => 'Exo 2',
			'Alegreya+Sans+SC:400,400italic,700,700italic' => 'Alegreya Sans SC',
			'Alegreya+Sans:400,400italic,700,700italic' => 'Alegreya Sans',
			'Josefin+Slab:400,700,700italic,400italic' => 'Josefin Slab',
			'Merriweather+Sans:400,400italic,700,700italic' => 'Merriweather Sans',
			'Fira+Sans:400,400italic,700,700italic' => 'Fira Sans',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
    );

global $social_networks;

$social_networks = array('Facebook', 'Twitter', 'Linkedin', 'Pinterest', 'Googleplus', 'Tumblr', 'Instagram', 'Flickr', 'Youtube', 'Stumbleupon', 'Dribbble', 'Codepen', 'Digg', 'Reddit', 'Github', 'Wordpress', 'Polldaddy', 'Skype', 'Twitch', 'Foursquare');

function quidus_customizer_controls( $controls ) {

	global $social_networks;
	global $font_choices;
	
	foreach ($social_networks as $network) {

		$controls[] = array(
			'type'        => 'text',
			'setting'     => 'author_' . lcfirst($network),
			'label'       => $network,
			'section'     => 'quidus_author_social',
			'default'     => __( 'Author&rsquo;s social network url' , 'quidus' ),
			'priority'    => 10,
		);
	}
	
	foreach ($social_networks as $network) {

		$controls[] = array(
			'type'        => 'text',
			'setting'     => 'my_' . lcfirst($network),
			'label'       => $network,
			'section'     => 'quidus_header_social',
			'default'     => __( 'Social Network Url' , 'quidus' ),
			'priority'    => 10,
		);
	}
	
	foreach ($social_networks as $network) {

		$controls[] = array(
			'type'        => 'text',
			'setting'     => 'footer_' . lcfirst($network),
			'label'       => $network,
			'section'     => 'quidus_footer_social',
			'default'     => __( 'Social Network Url' , 'quidus' ),
			'priority'    => 10,
		);
	}
	
	/* General Color Options */
	
	/* Background Color */
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_color_background',
		'label'       => __( 'Background Color', 'quidus' ),
		'section'     => 'quidus_colors_general',
		'default'     => '#FCFCFC',
		'priority'    => 1
	);
	
	/* Main Color */
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_color_main',
		'label'       => __( 'Main Color', 'quidus' ),
		'section'     => 'quidus_colors_general',
		'default'     => '#3f3f40',
		'priority'    => 2
	);
	
	/* Secondary Color */
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_color_secondary',
		'label'       => __( 'Secondary Color', 'quidus' ),
		'section'     => 'quidus_colors_general',
		'default'     => '#515152',
		'priority'    => 3
	);
	
	/*  Color */
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_color_special',
		'label'       => __( 'Special Color', 'quidus' ),
		'section'     => 'quidus_colors_general',
		'default'     => '#d5574d',
		'priority'    => 4
	);
	
	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'enable_advanced_colors',
		'label'       => __( 'Enable Advanced Color Options', 'quidus' ),
		'description' => __( 'You can turn advanced color customization on if basic one isn\'t enough.', 'quidus' ),
		'section'     => 'quidus_colors_general',
		'default'     => 0,
		'priority'    => 5,
	);
	
	/* Advanced Color Options */
	
	/* Logo Colors */
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_color_site_title',
		'label'       => __( 'Site Title Color', 'quidus' ),
		'section'     => 'quidus_logo_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_color_site_description',
		'label'       => __( 'Site Description Color', 'quidus' ),
		'section'     => 'quidus_logo_colors',
		'default'     => '#515152',
		'priority'    => 2
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_hover_color_site_title',
		'label'       => __( 'Site Title Hover Color', 'quidus' ),
		'section'     => 'quidus_logo_colors',
		'default'     => '#d5574d',
		'priority'    => 2
	);
	
	/* Social Icon Colors */
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_social_icon_color',
		'label'       => __( 'Social Icon', 'quidus' ),
		'section'     => 'quidus_social_icon_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_social_icon_hover_color',
		'label'       => __( 'Social Icon Hover', 'quidus' ),
		'section'     => 'quidus_social_icon_colors',
		'default'     => '#d5574d',
		'priority'    => 2
	);
	
	/* Menu Colors */
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'menu_item_color',
		'label'       => __( 'Menu Item', 'quidus' ),
		'section'     => 'quidus_menu_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'menu_item_description_color',
		'label'       => __( 'Menu Item Description', 'quidus' ),
		'section'     => 'quidus_menu_colors',
		'default'     => '#515152',
		'priority'    => 2
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'menu_background_color',
		'label'       => __( 'Menu Background', 'quidus' ),
		'section'     => 'quidus_menu_colors',
		'default'     => '#d5574d',
		'priority'    => 3
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'pagination_background_color',
		'label'       => __( 'Pagination Background', 'quidus' ),
		'section'     => 'quidus_menu_colors',
		'default'     => '#3f3f40',
		'priority'    => 4
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'pagination_background_hover_color',
		'label'       => __( 'Pagination Background Hover', 'quidus' ),
		'section'     => 'quidus_menu_colors',
		'default'     => '#d5574d',
		'priority'    => 5
	);
	
	/* Header Colors */
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_h1_color',
		'label'       => __( 'H1 Heading', 'quidus' ),
		'section'     => 'quidus_header_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_h2_color',
		'label'       => __( 'H2 Heading', 'quidus' ),
		'section'     => 'quidus_header_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_h3_color',
		'label'       => __( 'H3 Heading', 'quidus' ),
		'section'     => 'quidus_header_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_h4_color',
		'label'       => __( 'H4 Heading', 'quidus' ),
		'section'     => 'quidus_header_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_h5_color',
		'label'       => __( 'H5 Heading', 'quidus' ),
		'section'     => 'quidus_header_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'quidus_h6_color',
		'label'       => __( 'H6 Heading', 'quidus' ),
		'section'     => 'quidus_header_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	/* Button Colors */
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'button_background_color',
		'label'       => __( 'Button Background', 'quidus' ),
		'section'     => 'quidus_button_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'button_background_hover_color',
		'label'       => __( 'Button Background Hover', 'quidus' ),
		'section'     => 'quidus_button_colors',
		'default'     => '#d5574d',
		'priority'    => 1
	);
	
	/* Paragraph Colors */
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'body_text_color',
		'label'       => __( 'Body Text', 'quidus' ),
		'section'     => 'quidus_post_colors',
		'default'     => '#515152',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'list_item_color',
		'label'       => __( 'List Item', 'quidus' ),
		'section'     => 'quidus_element_colors',
		'default'     => '#515152',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'post_meta_color',
		'label'       => __( 'Post Meta', 'quidus' ),
		'section'     => 'quidus_post_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'post_meta_icon_color',
		'label'       => __( 'Post Meta Icon', 'quidus' ),
		'section'     => 'quidus_post_colors',
		'default'     => '#515152',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'post_format_icon_color',
		'label'       => __( 'Post Format Icon', 'quidus' ),
		'section'     => 'quidus_post_colors',
		'default'     => '#515152',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'post_format_icon_background_color',
		'label'       => __( 'Post Format Icon Background', 'quidus' ),
		'section'     => 'quidus_post_colors',
		'default'     => '#d5574d',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'table_header_color',
		'label'       => __( 'Table Header', 'quidus' ),
		'section'     => 'quidus_element_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'table_item_color',
		'label'       => __( 'Table Item', 'quidus' ),
		'section'     => 'quidus_element_colors',
		'default'     => '#515152',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'blockquote_border_color',
		'label'       => __( 'Blockquote Border', 'quidus' ),
		'section'     => 'quidus_element_colors',
		'default'     => '#d5574d',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'definition_list_title_color',
		'label'       => __( 'Definition List Title', 'quidus' ),
		'section'     => 'quidus_element_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'address_color',
		'label'       => __( 'Address', 'quidus' ),
		'section'     => 'quidus_element_colors',
		'default'     => '#515152',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'code_color',
		'label'       => __( 'Code', 'quidus' ),
		'section'     => 'quidus_element_colors',
		'default'     => '#515152',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'post_pagination_background_color',
		'label'       => __( 'Post Pagination Background', 'quidus' ),
		'section'     => 'quidus_post_colors',
		'default'     => '#3f3f40',
		'priority'    => 1
	);
	
	$controls[] = array(
		'type'        => 'color',
		'setting'     => 'post_pagination_background_hover_color',
		'label'       => __( 'Post Pagination Background Hover', 'quidus' ),
		'section'     => 'quidus_post_colors',
		'default'     => '#d5574d',
		'priority'    => 1
	);
	
	/* General Font Family Options */
	
	/* Body Font Family */
	
	$controls[] = array(
		'type'        => 'select',
		'setting'     => 'quidus_body_font',
		'label'       => __( 'Body Font Family', 'quidus' ),
		'description' => __( 'Changes font of all non-header elements.', 'quidus'),
		'section'     => 'quidus_font_family_general',
		'default'     => 'Source Sans Pro:400,700,400italic,700italic',
		'priority'    => 1,
		'choices'     => $font_choices
	);
	
	/* Header Font Family */
	
	$controls[] = array(
		'type'        => 'select',
		'setting'     => 'quidus_header_font',
		'label'       => __( 'Headers Font Family', 'quidus' ),
		'description' => __( 'Changes font of all the header elements.', 'quidus'),
		'section'     => 'quidus_font_family_general',
		'default'     => 'Open Sans:400italic,700italic,400,700',
		'priority'    => 2,
		'choices'     => $font_choices
	);
	
	/* Layout */
	
	/* Sidebar width desktop */
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_sidebar_width_desktop',
		'label'       => __( 'Sidebar Width (desktop)', 'quidus' ),
		'description' => __( 'Changes width of the sidebar for screen sizes that are higher than 955px', 'quidus' ),
		'section'     => 'quidus_layout',
		'default'     => 25,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 15,
			'max'  => 30,
			'step' => 1
		),
	);
	
	/* Content width desktop */
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_content_width_desktop',
		'label'       => __( 'Content Width (desktop)', 'quidus' ),
		'description' => __( 'Changes width of the content for screen sizes that are higher than 955px', 'quidus' ),
		'section'     => 'quidus_layout',
		'default'     => 75,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 75,
			'step' => 1
		),
	);
	
	/* Logo Upload */
	
	$controls[] = array(
		'type'        => 'upload',
		'setting'     => 'quidus_logo',
		'label'       => __( 'Logo Upload', 'quidus' ),
		'description' => __( 'Recommended logo size is 340x136px.', 'quidus' ),
		'section'     => 'title_tagline',
		'default'     => '',
		'priority'    => 10,
	);
	
	/* Favicon Upload */
	
	$controls[] = array(
		'type'        => 'upload',
		'setting'     => 'quidus_site_favicon',
		'label'       => __( 'Favicon Upload', 'quidus' ),
		'description' => __( 'Recommended favicon size is 16x16px.', 'quidus' ),
		'section'     => 'title_tagline',
		'default'     => '',
		'priority'    => 10,
	);
	
	/* Excerpt Length */
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_excerpt_length',
		'label'       => __( 'Excerpt Length', 'quidus' ),
		'description' => __( 'Adjust length of excerpt', 'quidus' ),
		'section'     => 'quidus_excerpt',
		'default'     => 55,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 20,
			'max'  => 85,
			'step' => 1
		),
	);
	
	/* Font Sizes */
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_h1_size',
		'label'       => __( 'H1 Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_site_title_size',
		'label'       => __( 'Site Title Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_h2_size',
		'label'       => __( 'H2 Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_widget_title_size',
		'label'       => __( 'Widget Title Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_h3_size',
		'label'       => __( 'H3 Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_h4_size',
		'label'       => __( 'H4 Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_h5_size',
		'label'       => __( 'H5 Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_h6_size',
		'label'       => __( 'H6 Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_content_meta_size',
		'label'       => __( 'Content Meta Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_content_paragraph_size',
		'label'       => __( 'Content Paragraph Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_site_description_size',
		'label'       => __( 'Site Description Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_list_font_size',
		'label'       => __( 'Unordered & Ordered Lists Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_table_font_size',
		'label'       => __( 'Table & Calendar Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_definition_font_size',
		'label'       => __( 'Definition List Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_address_font_size',
		'label'       => __( 'Address Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_pre_font_size',
		'label'       => __( 'Code Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'quidus_enable_footer_widgets',
		'label'       => __( 'Enable Footer Widgets', 'quidus' ),
		'section'     => 'quidus_layout',
		'default'     => 0,
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'radio-image',
		'setting'     => 'quidus_footer_widgets_count',
		'label'       => __( 'Footer Widget Layout', 'quidus' ),
		'description' => __( 'Choose how many widgets you want to appear in footer.', 'quidus' ),
		'section'     => 'quidus_layout',
		'default'     => 'threecolumn',
		'priority'    => 10,
		'choices'     => array(
			'threecolumn' => get_template_directory_uri() . '/img/threecolumn.png',
			'twocolumn' => get_template_directory_uri() . '/img/twocolumn.png',
		),
	);
	
	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'quidus_disable_entry_meta_single',
		'label'       => __( 'Hide Entry Meta On Single Posts', 'quidus' ),
		'section'     => 'quidus_layout',
		'default'     => 0,
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'quidus_disable_featured_image_home',
		'label'       => __( 'Hide Featured Image On Home Page', 'quidus' ),
		'description' => __( 'Faster home page loading speed improves on-page SEO but may hurt aesthetics.', 'quidus'),
		'section'     => 'quidus_layout',
		'default'     => 0,
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'quidus_disable_featured_image_search',
		'label'       => __( 'Hide Featured Image On Search Page', 'quidus' ),
		'section'     => 'quidus_layout',
		'default'     => 0,
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_website_max_width',
		'label'       => __( 'Website Max Width', 'quidus' ),
		'section'     => 'quidus_layout',
		'default'     => 1403,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 1180,
			'max'  => 1905,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_logo_max_width_desktop',
		'label'       => __( 'Logo Max Width', 'quidus' ),
		'section'     => 'title_tagline',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 50,
			'max'  => 100,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_logo_max_width_tablet_large',
		'label'       => __( 'Logo Max Width (tablet large)', 'quidus' ),
		'section'     => 'title_tagline',
		'default'     => 50,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 60,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_logo_max_width_tablet_small',
		'label'       => __( 'Logo Max Width (tablet small)', 'quidus' ),
		'section'     => 'title_tagline',
		'default'     => 50,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 50,
			'max'  => 75,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_logo_max_width_mobile',
		'label'       => __( 'Logo Max Width (mobile)', 'quidus' ),
		'section'     => 'title_tagline',
		'default'     => 60,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 50,
			'max'  => 60,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_footer_font_size',
		'label'       => __( 'Footer Text Font Size', 'quidus' ),
		'section'     => 'quidus_font_size_advanced',
		'default'     => 100,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 40,
			'max'  => 150,
			'step' => 1
		),
	);

	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'quidus_body_font_custom_enable',
		'label'       => __( 'Enable Custom Body Font', 'quidus' ),
		'section'     => 'quidus_font_family_general',
		'default'     => 0,
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'text',
		'setting'     => 'quidus_body_font_custom',
		'label'       => __( 'Body Font (Custom)', 'quidus' ),
		'section'     => 'quidus_font_family_general',
		'default'     => 'Source Sans Pro:400,700,400italic,700italic',
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'text',
		'setting'     => 'quidus_body_font_family_custom',
		'label'       => __( 'Body Font Family (Custom)', 'quidus' ),
		'section'     => 'quidus_font_family_general',
		'default'     => 'Source Sans Pro, sans-serif',
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'quidus_header_font_custom_enable',
		'label'       => __( 'Enable Custom Header Font', 'quidus' ),
		'section'     => 'quidus_font_family_general',
		'default'     => 0,
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'text',
		'setting'     => 'quidus_header_font_custom',
		'label'       => __( 'Headers Font (Custom)', 'quidus' ),
		'section'     => 'quidus_font_family_general',
		'default'     => 'Open Sans:400italic,700italic,400,700',
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'text',
		'setting'     => 'quidus_header_font_family_custom',
		'label'       => __( 'Headers Font Family (Custom)', 'quidus' ),
		'section'     => 'quidus_font_family_general',
		'default'     => 'Open Sans, sans-serif',
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_site_distance_from_left',
		'label'       => __( 'Site Distance From Left (desktop/%)', 'quidus' ),
		'section'     => 'quidus_layout',
		'default'     => 5,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 0,
			'max'  => 15,
			'step' => 1
		),
	);
	
	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'quidus_switch_to_centered_layout',
		'label'       => __( 'Switch To Centered Site Layout', 'quidus' ),
		'description' => __( 'Distance from right and left sides will be the same.', 'quidus'),
		'section'     => 'quidus_layout',
		'default'     => 0,
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'quidus_post_title_align_left',
		'label'       => __( 'Post Title & Meta Align Left', 'quidus' ),
		'section'     => 'quidus_layout',
		'default'     => 1,
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'quidus_widget_title_align_left',
		'label'       => __( 'Widget Title Align Left', 'quidus' ),
		'section'     => 'quidus_layout',
		'default'     => 0,
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'checkbox',
		'setting'     => 'quidus_right_sidebar_enable',
		'label'       => __( 'Enable Right Sidebar', 'quidus' ),
		'section'     => 'quidus_right_sidebar',
		'default'     => 0,
		'priority'    => 10,
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'setting'     => 'quidus_right_sidebar_width',
		'label'       => __( 'Right Sidebar Width', 'quidus' ),
		'section'     => 'quidus_right_sidebar',
		'default'     => 25,
		'priority'    => 10,
		'choices'     => array(
			'min'  => 15,
			'max'  => 30,
			'step' => 1
		),
	);

    return $controls;
}
add_filter( 'kirki/fields', 'quidus_customizer_controls' );

function quidus_css_customizer() {
	global $font_choices;
	$header_font = esc_html(get_theme_mod('quidus_header_font'));
	$body_font = esc_html(get_theme_mod('quidus_body_font')); 
	$primary_body_font = 'Source Sans Pro, sans-serif';
	$primary_header_font = 'Open Sans, sans-serif';
?>

<style type="text/css">

<?php 
$main_color = "#3f3f40";
$secondary_color = "#515152";
$special_color = "#d5574d"; 
$white_color = "#fcfcfc";
?>

<?php
}

add_action('wp_head', 'quidus_css_customizer');

function quidus_author_social() {
	
	global $social_networks;

	echo '<div class="author-social-wrap">';
	foreach ($social_networks as $network) {
	$networks = array(); $networks['author_' . lcfirst($network)] = get_theme_mod('author_' . lcfirst($network));
		if(strpos($networks['author_' . lcfirst($network)], lcfirst($network)) !== false){ echo '<a class="author-social" href="' . esc_url($networks['author_' . lcfirst($network)]) . '"><span class="genericon genericon-' . lcfirst($network) . '"></span></a>'; }
	
	} $google_network = get_theme_mod('author_googleplus');
	if(strpos($google_network, 'plus.google.com') !== false){ echo '<a class="author-social" href="' . esc_url($google_network) . '"><span class="genericon genericon-googleplus"></span></a>'; }
	echo '</div>';
	
}

function quidus_my_social() {
	
	global $social_networks; 
	echo '<div class="my-social-wrap">';
	foreach ($social_networks as $network) {
	$networks = array(); $networks['my_' . lcfirst($network)] = get_theme_mod('my_' . lcfirst($network));
		if(strpos($networks['my_' . lcfirst($network)], lcfirst($network)) !== false){ echo '<a class="my-social" href="' . esc_url($networks['my_' . lcfirst($network)]) . '"><span class="genericon genericon-' . lcfirst($network) . '"></span></a>'; }
	
	} $google_network = get_theme_mod('my_googleplus');
	if(strpos($google_network, 'plus.google.com') !== false){ echo '<a class="my-social" href="' . esc_url($google_network) . '"><span class="genericon genericon-googleplus"></span></a>'; }
	echo '</div>';
	
}

function quidus_footer_social() {
	
	global $social_networks; 
	echo '<div class="footer-social-wrap">';
	foreach ($social_networks as $network) {
	$networks = array(); $networks['footer_' . lcfirst($network)] = get_theme_mod('footer_' . lcfirst($network));
		if(strpos($networks['footer_' . lcfirst($network)], lcfirst($network)) !== false){ echo '<a class="footer-social" href="' . esc_url($networks['footer_' . lcfirst($network)]) . '"><span class="genericon genericon-' . lcfirst($network) . '"></span></a>'; }
	
	} $google_network = get_theme_mod('footer_googleplus');
	if(strpos($google_network, 'plus.google.com') !== false){ echo '<a class="footer-social" href="' . esc_url($google_network) . '"><span class="genericon genericon-googleplus"></span></a>'; }
	echo '</div>';
	
}

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 */
function quidus_customize_preview_js() {
	wp_enqueue_script( 'quidus-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'quidus_customize_preview_js' );

