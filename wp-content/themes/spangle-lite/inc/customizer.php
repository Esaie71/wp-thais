<?php    
/**
 *Spangle Lite Theme Customizer
 *
 * @package Spangle Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function spangle_lite_customize_register( $wp_customize ) {	
	
	function spangle_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function spangle_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'spangle_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'spangle-lite' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('spangle_lite_layout_option',array(
		'title' => __('Site Layout','spangle-lite'),			
		'priority' => 1,
		'panel' => 	'spangle_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
		'sanitize_callback' => 'spangle_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	'section'   => 'spangle_lite_layout_option',    	 
		'label' => __('Check to Box Layout','spangle-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','spangle-lite'),
    	'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('color_scheme',array(
		'default' => '#be7b06',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','spangle-lite'),			
			'description' => __('More color options in PRO Version','spangle-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);	
	
	//Header Contact Info
	$wp_customize->add_section('spangle_lite_hdr_contactinfo_section',array(
		'title' => __('Header Contact Info','spangle-lite'),				
		'priority' => null,
		'panel' => 	'spangle_lite_panel_area',
	));
	
	$wp_customize->add_setting('hdr_phone_text',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('hdr_phone_text',array(	
		'type' => 'text',
		'label' => __('Add phone number here','spangle-lite'),
		'section' => 'spangle_lite_hdr_contactinfo_section',
		'setting' => 'hdr_phone_text'
	));	
	
	$wp_customize->add_setting('contact_emailid',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_emailid',array(
		'type' => 'text',
		'label' => __('Add email address here.','spangle-lite'),
		'section' => 'spangle_lite_hdr_contactinfo_section'
	));	
	 
	 //Header social icons
	$wp_customize->add_section('spangle_lite_social_section',array(
		'title' => __('Header social icons','spangle-lite'),
		'description' => __( 'Add social icons link here to display icons in header', 'spangle-lite' ),			
		'priority' => null,
		'panel' => 	'spangle_lite_panel_area', 
	));
	
	$wp_customize->add_setting('spangle_lite_fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('spangle_lite_fb_link',array(
		'label' => __('Add facebook link here','spangle-lite'),
		'section' => 'spangle_lite_social_section',
		'setting' => 'spangle_lite_fb_link'
	));	
	
	$wp_customize->add_setting('spangle_lite_twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('spangle_lite_twitt_link',array(
		'label' => __('Add twitter link here','spangle-lite'),
		'section' => 'spangle_lite_social_section',
		'setting' => 'spangle_lite_twitt_link'
	));
	
	$wp_customize->add_setting('spangle_lite_gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('spangle_lite_gplus_link',array(
		'label' => __('Add google plus link here','spangle-lite'),
		'section' => 'spangle_lite_social_section',
		'setting' => 'spangle_lite_gplus_link'
	));
	
	$wp_customize->add_setting('spangle_lite_linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('spangle_lite_linked_link',array(
		'label' => __('Add linkedin link here','spangle-lite'),
		'section' => 'spangle_lite_social_section',
		'setting' => 'spangle_lite_linked_link'
	));
	
	$wp_customize->add_setting('show_hdr_socialicons',array(
		'default' => false,
		'sanitize_callback' => 'spangle_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_hdr_socialicons', array(
	   'settings' => 'show_hdr_socialicons',
	   'section'   => 'spangle_lite_social_section',
	   'label'     => __('Check To show This Section','spangle-lite'),
	   'type'      => 'checkbox'
	 ));//Show Social icons Section 
	
	// Slider Section		
	$wp_customize->add_section( 'spangle_lite_hdr_slider_section', array(
		'title' => __('Slider Section', 'spangle-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 560 pixel.','spangle-lite'), 
		'panel' => 	'spangle_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('sliderpagearea1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'spangle_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpagearea1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','spangle-lite'),
		'section' => 'spangle_lite_hdr_slider_section'
	));	
	
	$wp_customize->add_setting('sliderpagearea2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'spangle_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpagearea2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','spangle-lite'),
		'section' => 'spangle_lite_hdr_slider_section'
	));	
	
	$wp_customize->add_setting('sliderpagearea3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'spangle_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpagearea3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','spangle-lite'),
		'section' => 'spangle_lite_hdr_slider_section'
	));	// Slider Section	
	
	$wp_customize->add_setting('sliderarea_readmore',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('sliderarea_readmore',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','spangle-lite'),
		'section' => 'spangle_lite_hdr_slider_section',
		'setting' => 'sliderarea_readmore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('show_hdr_slider',array(
		'default' => false,
		'sanitize_callback' => 'spangle_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_hdr_slider', array(
	    'settings' => 'show_hdr_slider',
	    'section'   => 'spangle_lite_hdr_slider_section',
	     'label'     => __('Check To Show This Section','spangle-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 
	 // four boxes Services panel
	$wp_customize->add_section('spangle_lite_four_boxes_section', array(
		'title' => __('Four Services box Section','spangle-lite'),
		'description' => __('Select pages from the dropdown for four box services section','spangle-lite'),
		'priority' => null,
		'panel' => 	'spangle_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('servicespagecol1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'spangle_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'servicespagecol1',array(
		'type' => 'dropdown-pages',			
		'section' => 'spangle_lite_four_boxes_section',
	));		
	
	$wp_customize->add_setting('servicespagecol2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'spangle_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'servicespagecol2',array(
		'type' => 'dropdown-pages',			
		'section' => 'spangle_lite_four_boxes_section',
	));
	
	$wp_customize->add_setting('servicespagecol3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'spangle_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'servicespagecol3',array(
		'type' => 'dropdown-pages',			
		'section' => 'spangle_lite_four_boxes_section',
	));
	
	$wp_customize->add_setting('servicespagecol4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'spangle_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'servicespagecol4',array(
		'type' => 'dropdown-pages',			
		'section' => 'spangle_lite_four_boxes_section',
	));
	
	
	$wp_customize->add_setting('show_services_bxes',array(
		'default' => false,
		'sanitize_callback' => 'spangle_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_services_bxes', array(
	   'settings' => 'show_services_bxes',
	   'section'   => 'spangle_lite_four_boxes_section',
	   'label'     => __('Check To Show This Section','spangle-lite'),
	   'type'      => 'checkbox'
	 ));//Show services Section	
	 
		 
}
add_action( 'customize_register', 'spangle_lite_customize_register' );

function spangle_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .default_articles_list h2 a:hover,
        #sidebar ul li a:hover,								
        .default_articles_list h3 a:hover,					
        .recent-post h6:hover,					
        .spngl_fourcolumn:hover .button,									
        .postmeta a:hover,
        .button:hover,
		.welcome_titlecolumn h3 span,
        .footercolumn ul li a:hover, 
        .footercolumn ul li.current_page_item a,      
        .spngl_fourcolumn:hover h3 a,
        .header-top a:hover,
        .header-menu ul li a:hover, 
        .header-menu ul li.current-menu-item a,
        .header-menu ul li.current-menu-parent a.parent,
        .header-menu ul li.current-menu-item ul.sub-menu li a:hover				
            { color:<?php echo esc_html( get_theme_mod('color_scheme','#be7b06')); ?>;}					 
            
        .header-top,
		.logo,
		h3.widget-title,
		.spngl_fourcolumn:hover .readmore,
		.pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,					
        .nivo-controlNav a.active,
        .learnmore,
		.nivo-caption .slide_more,											
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,
        .spngl_fourcolumn .thumbbx,	
        .social-icons a:hover,			
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('color_scheme','#be7b06')); ?>;}	
			
		
		.spngl_fourcolumn:hover .readmore
            { border-color:<?php echo esc_html( get_theme_mod('color_scheme','#be7b06')); ?>;}	
         	
    </style> 
<?php                 
}
         
add_action('wp_head','spangle_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function spangle_lite_customize_preview_js() {
	wp_enqueue_script( 'spangle_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20181017', true );
}
add_action( 'customize_preview_init', 'spangle_lite_customize_preview_js' );