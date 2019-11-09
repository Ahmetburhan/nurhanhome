<?php

defined( 'ABSPATH' ) || exit;

return array(
	'weight'   => -1,
	'name'     => __( 'Button', 'the7mk2' ),
	'base'     => 'dt_default_button',
	'icon'     => 'dt_vc_ico_button',
	'class'    => 'dt_vc_default_button',
	'category' => __( 'by Dream-Theme', 'the7mk2' ),
	'params'   => array(
		/**
		 * General.
		 */
		array(
			'heading'     => __( 'Button text', 'the7mk2' ),
			'param_name'  => 'content',
			'type'        => 'textfield',
			'admin_label' => true,
			'value'       => 'Button name',
		),
		array(
			'heading'    => __( 'Link URL', 'the7mk2' ),
			'param_name' => 'link',
			'type'       => 'vc_link',
			'value'      => '',
		),
		array(
			'heading'     => __( 'Enable smooth scroll for anchor navigation', 'the7mk2' ),
			'param_name'  => 'smooth_scroll',
			'type'        => 'dt_switch',
			'value'       => 'n',
			'options'     => array(
				'Yes' => 'y',
				'No'  => 'n',
			),
			'description' => __( 'for #anchor navigation', 'the7mk2' ),
		),
		array(
			'heading'     => __( 'Button appearance', 'the7mk2' ),
			'param_name'  => 'size',
			'type'        => 'dropdown',
			'value'       => array(
				'Small'  => 'small',
				'Medium' => 'medium',
				'Large'  => 'big',
				'Custom' => 'custom',
			),
			'description' => __( 'Small, medium & large buttons be set up in Theme Options / Buttons.', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Button width', 'the7mk2' ),
			'param_name' => 'btn_width',
			'type'       => 'dropdown',
			'value'      => array(
				'Default'   => 'btn_auto_width',
				'Custom'    => 'btn_fixed_width',
				'Fullwidth' => 'btn_full_width',
			),
		),
		array(
			'heading'          => __( 'Width', 'the7mk2' ),
			'param_name'       => 'custom_btn_width',
			'type'             => 'dt_number',
			'value'            => '200px',
			'dependency'       => array(
				'element' => 'btn_width',
				'value'   => 'btn_fixed_width',
			),
			'edit_field_class' => 'vc_col-sm-3 vc_column dt_col_custom',
		),
		array(
			'heading'    => __( 'Button alignment', 'the7mk2' ),
			'param_name' => 'button_alignment',
			'type'       => 'dropdown',
			'value'      => array(
				'Inline left'  => 'btn_inline_left',
				'Inline right' => 'btn_inline_right',
				'Left'         => 'btn_left',
				'Center'       => 'btn_center',
				'Right'        => 'btn_right',
			),
		),
		array(
			'heading'    => __( 'Animation', 'the7mk2' ),
			'param_name' => 'animation',
			'type'       => 'dropdown',
			'value'      => presscore_get_vc_animation_options(),
		),
		array(
			'heading'     => __( 'Extra class name', 'the7mk2' ),
			'param_name'  => 'el_class',
			'type'        => 'textfield',
			'value'       => '',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'the7mk2' ),
		),
		/**
		 * Custom settings.
		 */
		array(
			'heading'    => __( 'General settings', 'the7mk2' ),
			'param_name' => 'general_settings',
			'type'       => 'dt_title',
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Font size', 'the7mk2' ),
			'param_name' => 'font_size',
			'type'       => 'dt_number',
			'value'      => '14px',
			'units'      => 'px',
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Icon size', 'the7mk2' ),
			'param_name' => 'icon_size',
			'type'       => 'dt_number',
			'value'      => '11px',
			'units'      => 'px',
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Padding', 'the7mk2' ),
			'param_name' => 'button_padding',
			'type'       => 'dt_spacing',
			'value'      => '12px 18px 12px 18px',
			'units'      => 'px',
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Border width', 'the7mk2' ),
			'param_name' => 'border_width',
			'type'       => 'dt_number',
			'value'      => '0px',
			'units'      => 'px',
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Border radius', 'the7mk2' ),
			'param_name' => 'border_radius',
			'type'       => 'dt_number',
			'value'      => '1px',
			'units'      => 'px',
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Decoration', 'the7mk2' ),
			'param_name' => 'btn_decoration',
			'type'       => 'dropdown',
			'value'      => array(
				'None'   => 'none',
				'3D'     => 'btn_3d',
				'Shadow' => 'btn_shadow',
			),
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Normal', 'the7mk2' ),
			'param_name' => 'normal_settings',
			'type'       => 'dt_title',
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'     => __( 'Text and icon color', 'the7mk2' ),
			'param_name'  => 'text_color',
			'type'        => 'colorpicker',
			'value'       => '',
			'description' => __( 'Leave empty to use default color from Theme Options/Buttons ', 'the7mk2' ),
			'group'       => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Border color', 'the7mk2' ),
			'param_name' => 'default_btn_border',
			'type'       => 'dt_switch',
			'value'      => 'y',
			'options'    => array(
				'Yes' => 'y',
				'No'  => 'n',
			),
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'param_name'  => 'default_btn_border_color',
			'type'        => 'colorpicker',
			'value'       => '',
			'description' => __( 'Leave empty to use default color from Theme Options/Buttons ', 'the7mk2' ),
			'dependency'  => array(
				'element' => 'default_btn_border',
				'value'   => 'y',
			),
			'group'       => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Background color', 'the7mk2' ),
			'param_name' => 'default_btn_bg',
			'type'       => 'dt_switch',
			'value'      => 'y',
			'options'    => array(
				'Yes' => 'y',
				'No'  => 'n',
			),
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'param_name'  => 'default_btn_bg_color',
			'type'        => 'colorpicker',
			'value'       => '',
			'description' => __( 'Leave empty to use default color from Theme Options/Buttons ', 'the7mk2' ),
			'dependency'  => array(
				'element' => 'default_btn_bg',
				'value'   => 'y',
			),
			'group'       => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Hover', 'the7mk2' ),
			'param_name' => 'hover_settings',
			'type'       => 'dt_title',
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Enable hover', 'the7mk2' ),
			'param_name' => 'default_btn_hover',
			'type'       => 'dt_switch',
			'value'      => 'y',
			'options'    => array(
				'Yes' => 'y',
				'No'  => 'n',
			),
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'     => __( 'Text and icon color', 'the7mk2' ),
			'param_name'  => 'text_hover_color',
			'type'        => 'colorpicker',
			'value'       => '',
			'description' => __( 'Leave empty to use default color from Theme Options/Buttons ', 'the7mk2' ),
			'dependency'  => array(
				'element' => 'default_btn_hover',
				'value'   => 'y',
			),
			'group'       => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Border color', 'the7mk2' ),
			'param_name' => 'default_btn_border_hover',
			'type'       => 'dt_switch',
			'value'      => 'y',
			'options'    => array(
				'Yes' => 'y',
				'No'  => 'n',
			),
			'dependency' => array(
				'element' => 'default_btn_hover',
				'value'   => 'y',
			),
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'param_name'  => 'default_btn_border_hover_color',
			'type'        => 'colorpicker',
			'value'       => '',
			'dependency'  => array(
				'element' => 'default_btn_border_hover',
				'value'   => 'y',
			),
			'description' => __( 'Leave empty to use default color from Theme Options/Buttons ', 'the7mk2' ),
			'group'       => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Background color', 'the7mk2' ),
			'param_name' => 'default_btn_bg_hover',
			'type'       => 'dt_switch',
			'value'      => 'y',
			'options'    => array(
				'Yes' => 'y',
				'No'  => 'n',
			),
			'dependency' => array(
				'element' => 'default_btn_hover',
				'value'   => 'y',
			),
			'group'      => __( 'Custom settings', 'the7mk2' ),
		),
		array(
			'param_name'  => 'bg_hover_color',
			'type'        => 'colorpicker',
			'value'       => '',
			'description' => __( 'Leave empty to use default color from Theme Options/Buttons ', 'the7mk2' ),
			'dependency'  => array(
				'element' => 'default_btn_bg_hover',
				'value'   => 'y',
			),
			'group'       => __( 'Custom settings', 'the7mk2' ),
		),
		/**
		 * Icon.
		 */
		array(
			'heading'    => __( 'Icon selector', 'the7mk2' ),
			'param_name' => 'icon_type',
			'type'       => 'dropdown',
			'std'        => 'html',
			'value'      => array(
				'No icon'     => 'none',
				'Plain HTML'  => 'html',
				'Icon picker' => 'picker',
			),
			'group'      => __( 'Icon', 'the7mk2' ),
		),
		array(
			'heading'          => __( 'Icon', 'the7mk2' ),
			'param_name'       => 'icon',
			'type'             => 'textarea_raw_html',
			'value'            => '',
			'description'      => 'f.e. <code>&lt;i class="fa fa-arrow-circle-right"&gt;&lt;/i&gt;</code> <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>.',
			'edit_field_class' => 'custom-textarea-height vc_col-xs-12  vc_column',
			'dependency'       => array(
				'element' => 'icon_type',
				'value'   => 'html',
			),
			'group'            => __( 'Icon', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Icon', 'the7mk2' ),
			'param_name' => 'icon_picker',
			'type'       => 'dt_navigation',
			'value'      => '',
			'dependency' => array(
				'element' => 'icon_type',
				'value'   => 'picker',
			),
			'group'      => __( 'Icon', 'the7mk2' ),
		),
		array(
			'heading'    => __( 'Icon alignment', 'the7mk2' ),
			'param_name' => 'icon_align',
			'type'       => 'dropdown',
			'value'      => array(
				'Left'  => 'left',
				'Right' => 'right',
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value'   => array( 'picker', 'html' ),
			),
			'group'      => __( 'Icon', 'the7mk2' ),
		),
		/**
		 * Design Options.
		 */
		array(
			'heading'          => __( 'CSS box', 'the7mk2' ),
			'param_name'       => 'css',
			'type'             => 'css_editor',
			'edit_field_class' => 'vc_col-sm-12 vc_column no-vc-background no-vc-padding no-vc-border',
			'group'            => __( 'Design Options ', 'the7mk2' ),
		),
	),
);

