<?php

acf_add_local_field_group(array (
	'key' => 'group_5487669c1ce18',
	'title' => 'Featured Image Option',
	'fields' => array (
		array (
			'key' => 'field_548766bf5eede',
			'label' => 'Hide Featured Image in Article',
			'name' => 'hide_featured_image_in_article',
			'type' => 'checkbox',
			'instructions' => 'Check the box if you would like to hide the featured image on the article page.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'hide' => 'Hide Featured Image',
			),
			'default_value' => array (
			),
			'layout' => 'vertical',
			'allow_custom' => 0,
			'save_custom' => 0,
			'toggle' => 0,
			'return_format' => 'value',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

