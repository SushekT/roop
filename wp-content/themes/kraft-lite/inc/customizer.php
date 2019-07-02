<?php
/**
 * SKT kraft Theme Customizer
 *
 * @package SKT kraft
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kraftlite_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class kraftlite_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_section(
        'logo_sec',
        array(
            'title' => __('Logo (PRO Version)', 'kraft-lite'),
            'priority' => 1,
 			'description' => sprintf( __( 'Logo Settings available in<br /> %s.', 'kraft-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'kraft-lite' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('kraftlite_options[logo-info]',array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new kraftlite_Info( $wp_customize, 'logo_section', array(
        'section' => 'logo_sec',
        'settings' => 'kraftlite_options[logo-info]',
        'priority' => null
        ) )
    );
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#34c6f6',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','kraft-lite'),
 			'description' => sprintf( __( 'More color options in<br /> %s.', 'kraft-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'kraft-lite' )
						)
					),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	$wp_customize->add_section('header_details',array(
		'title'	=> __('Header Info','kraft-lite'),
		'description'	=> __('header phone number and time table','kraft-lite'),
		'priority'	=> null
	));
	$wp_customize->add_setting('header_info',array(
			'default'	=> __('<i class="fa fa-phone"></i><span class="phno"> +11 123 456 7890 </span>  Mon. - Fri. 10:00 - 21:00','kraft-lite'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'header_info', array(
				'label'	=> __('Add phone number','kraft-lite'),
				'setting'	=> 'header_info',
				'section'	=> 'header_details'
			)
		)
	);
	$wp_customize->add_section('fist_section_content', array(
		'title'	=> __('Homepage First Section','kraft-lite'),
		'description'	=> __('','kraft-lite'),
		'priority'	=> null
	));
	$wp_customize->add_setting('first_section', array(
			'default'	=> __('<p><i class="fa fa-pencil"></i><br />
<h2>Hey people! We are SKT and let us introduce our new Theme - "Kraft"</h2>
<p> Nunc sed lorem pretium, volutpat tortor id, adipiscing sem. Sed bibendum quis augue nec porta. Ut molestie tortor pulvinar, faucibus justo vitae</p>','kraft-lite'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'first_section', array(
				'label'	=> __('first section content','kraft-lite'),
				'setting'	=> 'first_section',
				'section'	=> 'fist_section_content'
			)
		)
	);
	$wp_customize->add_section('home_boxes', array(
		'title'	=> __('Homepage Boxes','kraft-lite'),
 		'description' => sprintf( __( 'More social icons can be found<br /> %s.', 'kraft-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_FONT_AWESOME_URL.'"' ), __( 'Social Icons', 'kraft-lite' )
						)
					),		
		'priority'	=> null
	));
	$wp_customize->add_setting('column_one', array(
			'default'	=> __('<div class="one_third "><a href="#"><i class="fa fa-desktop"></i></p>
<h4>Cool Animated Columns <span>Animated Columns</span></h4>
<p></a>Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a></div>','kraft-lite'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'column_one', array(
				'label'	=> __('First column content','kraft-lite'),
				'setting'	=> 'column_one',
				'section'	=> 'home_boxes'
			)
		)
	);
	$wp_customize->add_setting('column_two', array(
			'default'	=> __('<div class="one_third "><a href="#"><i class="fa fa-gears"></i></p>
<h4>Rich Customization Abilities <span>Color Change</span></h4>
<p></a> Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a></div>','kraft-lite'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'column_two', array(
				'label'	=> __('Second column content','kraft-lite'),
				'setting'	=> 'column_two',
				'section'	=> 'home_boxes'
			)
		)
	);
	$wp_customize->add_setting('column_three',array(
			'default'	=> __('<div class="one_third  last_column"><a href="#"><i class="fa fa-cloud-download"></i></p>
<h4>Gallery Plugin Compatibility <span>Nextgen Gallery</span></h4>
<p></a> Lorem ipsum dolor sit amet, consectetur adipiscinr sed gravida tortor, sed ullamcorper tellus. Cras id magna tempor, porta nunc quis.<a class="rdmore" href="#">Read More ></a></div> ','kraft-lite'),
			'sanitize_callback'	=> 'wptexturize'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'column_three', array(
				'label'	=> __('Third column content','kraft-lite'),
				'setting'	=> 'column_three',
				'section'	=> 'home_boxes'
			)
		)
	);
	
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','kraft-lite'),
 		'description' => sprintf( __( 'Featured Image Size (1420x591)<br>More slider settings available in %s.', 'kraft-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'kraft-lite' )
						)
					),			
		'priority'		=> null
	));
	
// Slider Section
	$wp_customize->add_setting('page-setting1',array(
			'sanitize_callback'	=> 'kraftlite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','kraft-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting2',array(
			'sanitize_callback'	=> 'kraftlite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','kraft-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting3',array(
			'sanitize_callback'	=> 'kraftlite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','kraft-lite'),
			'section'	=> 'slider_section'
	));	
 
// Slider Section

	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','kraft-lite'),
 			'description' => sprintf( __( 'Add social icons link here. <br>More icon available in %s.', 'kraft-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'kraft-lite' )
						)
					),				
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','kraft-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','kraft-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','kraft-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','kraft-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	$wp_customize->add_section('footer_text',array(
			'title'	=> __('Footer Area','kraft-lite'),
			'priority'	=> null,
			'description'	=> __('Add footer copyright text','kraft-lite')
	));
	$wp_customize->add_setting('kraftlite_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new kraftlite_Info( $wp_customize, 'cred_section', array(
		'label'	=> __('To remove credit &amp; copyright text upgrade to PRO version','kraft-lite'),
        'section' => 'footer_text',
        'settings' => 'kraftlite_options[credit-info]'
        ) )
    );
	$wp_customize->add_setting('about_title',array(
			'default'	=> __('About kraft','kraft-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> __('Add about title here','kraft-lite'),
			'section'	=> 'footer_text',
			'setting'	=> 'about_title'
	));
	
	$wp_customize->add_setting('about_description', array(
			'default'	=> __('<p>Nam aliquet aliquam ipsum eget volutpat. Duis nec porta purus. Integer adipiscing augue sit amet libero vulputate, et fermentum nibh rutrum. In bibendum nisi sed consequat hendrerit. Aliquam.</p>
<p>Quisque elementum, dolor nec tempus eleifend, nibh mauris aliquet ante, eu tempus sapien nisi non nunc. Nulla facilisi. Suspendisse lobortis laoreet risus, a posuere mauris facilisis at. In viverra euismod velit non cursus. </p>','kraft-lite'),
			'sanitize_callback'	=> 'wptexturize'
	));	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'about_description', array(
				'label'	=> __('Add about description for footer','kraft-lite'),
				'section'	=> 'footer_text',
				'setting'	=> 'about_description'
			)
		)
	);
	
	$wp_customize->add_setting('footer_right',array(
			'default'	=> __('<li><a href="#">Home</a></li><li><a href="#">About Us</a></li> <li><a href="#">Portfolio</a></li><li><a href="#">Contact Us</a></li>','kraft-lite'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'footer_right', array(
				'label'	=> __('Footer Menu','kraft-lite'),
				'section'	=> 'footer_text',
				'setting'	=> 'footer_right'
			)
		)
	);	
	$wp_customize->add_section('contact_sec',array(
			'title'	=> __('Contact Details','kraft-lite'),
			'description'	=> __('Add you contact details here','kraft-lite'),
			'priority'	=> null
	));
	
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('100 King St, Melbourne PIC 4000, Australia','kraft-lite'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'contact_add', array(
				'label'	=> __('Add contact address here','kraft-lite'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add'
			)
		)
	);
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('Phone: +123 456 7890','kraft-lite'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','kraft-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','kraft-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));
	
	$wp_customize->add_section(
        'theme_layout_sec',
        array(
            'title' => __('Layout Settings (PRO Version)', 'kraft-lite'),
            'priority' => null,
 			'description' => sprintf( __( 'Layout Settings available in<br /> %s.', 'kraft-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'kraft-lite' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('kraftlite_options[layout-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new kraftlite_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'kraftlite_options[layout-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_section(
        'theme_font_sec',
        array(
            'title' => __('Fonts Settings (PRO Version)', 'kraft-lite'),
            'priority' => null,
 			'description' => sprintf( __( 'Font Settings available in %s.', 'kraft-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'kraft-lite' )
						)
					),				
			
        )
    );  
    $wp_customize->add_setting('kraftlite_options[font-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new kraftlite_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'kraftlite_options[font-info]',
        'priority' => null
        ) )
    );
	
    $wp_customize->add_section(
        'theme_doc_sec',
        array(
            'title' => __('Documentation &amp; Support', 'kraft-lite'),
            'priority' => null,
 			'description' => sprintf( __( 'For documentation and support check this link %s.', 'kraft-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_DOC.'"' ), __( 'kraft Documentation', 'kraft-lite' )
						)
					),			
        )
    );  
    $wp_customize->add_setting('kraftlite_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new kraftlite_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'kraftlite_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'kraftlite_customize_register' );

//Integer
function kraftlite_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function kraftlite_custom_css(){
		?>
        	<style type="text/css">
					
					a, .header .header-inner .nav ul li a:hover, 
					.header .header-inner .nav ul li.current_page_item a,
					.social-icons a:hover, 
					.signin_wrap .right .fa, .wrap_one .fa,
					.services-wrap .one_third:hover h4,
					.services-wrap .one_third:hover a.rdmore,
					.blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,
					.cols-3 ul li a:hover, .cols-3 ul li.current_page_item a
					{ color:<?php echo get_theme_mod('color_scheme','#34c6f6'); ?>;}
					
					.searchbox-icon, .searchbox-submit, 
					.services-wrap .one_third:hover .fa, 
					h3.widget-title, 
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover{ background-color:<?php echo get_theme_mod('color_scheme','#34c6f6'); ?>;}
					
			</style>
<?php 
}
         
add_action('wp_head','kraftlite_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kraftlite_customize_preview_js() {
	wp_enqueue_script( 'kraftlite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'kraftlite_customize_preview_js' );


function kraftlite_custom_customize_enqueue() {
	wp_enqueue_script( 'kraft-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'kraftlite_custom_customize_enqueue' );