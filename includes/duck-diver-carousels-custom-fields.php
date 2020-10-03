<?php
// Define path and URL to the ACF plugin.
define( 'DUCK_CAROUSEL_ACF_PATH', plugin_dir_path(__DIR__) . 'vendor/advanced-custom-fields/' );
define( 'DUCK_CAROUSEL_ACF_URL', plugin_dir_url(__DIR__) . 'vendor/advanced-custom-fields/' );

// Include the ACF plugin.
include_once( DUCK_CAROUSEL_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'duck_carousel_acf_settings_url');
function duck_carousel_acf_settings_url( $url ) {
    return DUCK_CAROUSEL_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'duck_carousel_acf_settings_show_admin');
function duck_carousel_acf_settings_show_admin( $show_admin ) {
    return false;
}

acf_add_local_field_group(array(
	'key' => 'group_5f6cb5bf60b35',
	'title' => 'Carousel Options',
	'fields' => array(
		array(
			'key' => 'field_5f6cb5ce23e18',
			'label' => 'Loop Carousel',
			'name' => 'dd_carousel_loop',
			'type' => 'true_false',
			'instructions' => 'Show carousel in continuous loop',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5f6cb7eb23e19',
			'label' => 'Duration',
			'name' => 'dd_carousel_duration',
			'type' => 'number',
			'instructions' => 'Duration in seconds.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 5,
			'placeholder' => 5,
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f6cb85923e1a',
			'label' => 'Transition',
			'name' => 'dd_carousel_transition',
			'type' => 'number',
			'instructions' => 'Transition Speed in Miliseconds',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 400,
			'placeholder' => 400,
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f6cb8ba23e1b',
			'label' => 'Stop on Hover',
			'name' => 'dd_carousel_stop',
			'type' => 'true_false',
			'instructions' => 'Stop carousel on mouse hover?',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5f6cb91da9428',
			'label' => 'Show Dots?',
			'name' => 'dd_carousel_dots',
			'type' => 'true_false',
			'instructions' => 'Show the dots (navigation)',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5f6cb97da9429',
			'label' => 'Margin',
			'name' => 'dd_carousel_margin',
			'type' => 'number',
			'instructions' => 'Margin-right for each carousel (if multiple items are shown)',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => 0,
			'prepend' => '',
			'append' => 'px',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5f6cce0a6a86f',
			'label' => 'Show Navs (arrows)',
			'name' => 'dd_carousel_navs',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'dd_carousel_anything',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5f6b7c226cd53',
	'title' => 'Custom Carousels',
	'fields' => array(
		array(
			'key' => 'field_5f6b7c2c00f10',
			'label' => 'Carousel Content',
			'name' => 'carousel_content',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add A Slide',
			'sub_fields' => array(
				array(
					'key' => 'field_5f6b7e0ba7b07',
					'label' => 'Slide Wrapper Extra CSS',
					'name' => 'slide_wrapper_extra_css',
					'type' => 'text',
					'instructions' => 'Include additional CSS Classes here.	No dots',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5f6b7c4b00f11',
					'label' => 'Slide Content',
					'name' => 'slide_content',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'dd_carousel_anything',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));