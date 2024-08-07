<?php

add_action( 'init' , 'learn_education_business_servicess' );
function learn_education_business_servicess(){

	Kirki::add_section( 'learn_education_business_services', array(
        'title'   => esc_html__( 'Services', 'learn-education-business' ),
        'section' => 'homepage'
    ) );

    Kirki::add_field( 'bizberg', [
		'type'        => 'checkbox',
		'settings'    => 'services_status',
		'label'       => esc_html__( 'Enable / Disable', 'learn-education-business' ),
		'section'     => 'learn_education_business_services',
		'default'     => false,
	] );

	Kirki::add_field( 'bizberg', [
		'type'     => 'select',
		'settings' => 'services_title_page',
		'choices'  => bizberg_get_all_pages(),
		'label'    => esc_html__( 'Title Page', 'learn-education-business' ),
		'section'  => 'learn_education_business_services',
		'active_callback' => [
			[
				'setting'  => 'services_status',
				'operator' => '==',
				'value'    => true,
			]
		],
	] );

	Kirki::add_field( 'bizberg', array(
    	'type'        => 'advanced-repeater',
    	'label'       => esc_html__( 'Services', 'learn-education-business' ),
	    'section'     => 'learn_education_business_services',
	    'settings'    => 'learn_education_business_services',
	    'active_callback' => [
			[
				'setting'  => 'services_status',
				'operator' => '==',
				'value'    => true,
			]
		],
	    'choices' => [
	        'button_label' => esc_html__( 'Add Services', 'learn-education-business' ),
	        'row_label' => [
	            'value' => esc_html__( 'Services', 'learn-education-business' ),
	        ],
	        'limit'  => 3,
	        'fields' => [
	            'page_id' => [
	                'type'        => 'select',
	                'label'       => esc_html__( 'Page', 'learn-education-business' ),
	                'choices'     => bizberg_get_all_pages()
	            ],
	        ],
	    ]
    ));

}