<?php

add_action( 'init' , 'learn_education_business_catogory' );
function learn_education_business_catogory(){

	Kirki::add_section( 'learn_education_business_catogory_section', array(
        'title'   => esc_html__( 'Category', 'learn-education-business' ),
        'section' => 'homepage'
    ) );

    Kirki::add_field( 'bizberg', [
		'type'        => 'checkbox',
		'settings'    => 'category_status',
		'label'       => esc_html__( 'Enable / Disable', 'learn-education-business' ),
		'section'     => 'learn_education_business_catogory_section',
		'default'     => false,
	] );

	Kirki::add_field( 'bizberg', [
		'type'     => 'select',
		'settings' => 'category_title_page',
		'choices'  => bizberg_get_all_pages(),
		'label'    => esc_html__( 'Title Page', 'learn-education-business' ),
		'section'  => 'learn_education_business_catogory_section',
		'active_callback' => [
			[
				'setting'  => 'category_status',
				'operator' => '==',
				'value'    => true,
			]
		],
	] );

	Kirki::add_field( 'bizberg', array(
    	'type'        => 'advanced-repeater',
    	'label'       => esc_html__( 'Categories', 'learn-education-business' ),
	    'section'     => 'learn_education_business_catogory_section',
	    'settings'    => 'learn_education_business_catogory_section',
	    'active_callback' => [
			[
				'setting'  => 'category_status',
				'operator' => '==',
				'value'    => true,
			]
		],
	    'choices' => [
	        'button_label' => esc_html__( 'Add Category', 'learn-education-business' ),
	        'row_label' => [
	            'value' => esc_html__( 'Category', 'learn-education-business' ),
	        ],
	        'fields' => [
	        	'icon'  => [
	                'type'        => 'fontawesome',
	                'label'       => esc_html__( 'Icon', 'learn-education-business' ),
	                'default'     => 'fab fa-accusoft',
	                'choices'     => bizberg_get_fontawesome_options(),
	            ],
	            'page_id' => [
	                'type'        => 'select',
	                'label'       => esc_html__( 'Page', 'learn-education-business' ),
	                'choices'     => bizberg_get_all_pages()
	            ],
	        ],
	    ]
    ));

}