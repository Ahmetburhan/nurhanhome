<?php
/**
 * The7 Elementor plugin compatibility class.
 *
 * @since 7.7.0
 *
 * @package The7
 */

defined( 'ABSPATH' ) || exit;

use Elementor\Controls_Manager;

/**
 * Class The7_Compatibility_Elementor
 */
class The7_Compatibility_Elementor {

	/**
	 * Custom Elementor controls.
	 *
	 * @var array $controls Controls array.
	 */
	protected $controls = [];

	/**
	 * Custom Elementor sections.
	 *
	 * @var array $sections Sections array.
	 */
	protected $sections = [];

	/**
	 * The7_Compatibility_Elementor constructor.
	 */
	public function __construct() {
		add_action( 'elementor/documents/register_controls', [ $this, 'add_controls' ] );
		add_filter( 'elementor/editor/localize_settings', [ $this, 'localize_settings' ], 10, 2 );
		add_action( 'elementor/document/after_save', [ $this, 'update_post_meta' ], 10, 2 );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'add_inline_scripts' ] );

		$this->sections = [
			'the7_document_title_section' => [
				'args'     => [
					'label' => __( 'Page header settings', 'the7mk2' ),
					'tab'   => Controls_Manager::TAB_SETTINGS,
				],
				'controls' => [
					'the7_document_title' => [
						'meta' => '_dt_header_title',
						'args' => [
							'label'     => __( 'Page title', 'the7mk2' ),
							'type'      => Controls_Manager::SELECT,
							'default'   => 'enabled',
							'options'   => [
								'enabled'  => 'Show page title',
								'disabled' => 'Hide page title',
							],
							'separator' => 'none',
						],
					],
				],
			],
			'the7_document_sidebar'       => [
				'args'     => [
					'label' => __( 'Sidebar settings', 'the7mk2' ),
					'tab'   => Controls_Manager::TAB_SETTINGS,
				],
				'controls' => [
					'the7_document_sidebar_position' => [
						'meta' => '_dt_sidebar_position',
						'args' => [
							'label'     => __( 'Sidebar position', 'the7mk2' ),
							'type'      => Controls_Manager::SELECT,
							'default'   => 'right',
							'options'   => [
								'left'     => 'Left',
								'right'    => 'Right',
								'disabled' => 'Disabled',
							],
							'separator' => 'none',
						],
					],
					'the7_document_sidebar_id'       => [
						'meta' => '_dt_sidebar_widgetarea_id',
						'args' => [
							'label'     => __( 'Sidebar', 'the7mk2' ),
							'type'      => Controls_Manager::SELECT,
							'default'   => 'sidebar_1',
							'options'   => 'presscore_get_widgetareas_options',
							'separator' => 'none',
							'condition' => [
								'the7_document_sidebar_position' => [ 'left', 'right' ],
							],
						],
					],
				],
			],
			'the7_document_footer'        => [
				'args'     => [
					'label' => __( 'Footer settings', 'the7mk2' ),
					'tab'   => Controls_Manager::TAB_SETTINGS,
				],
				'controls' => [
					'the7_document_show_footer_wa' => [
						'meta' => '_dt_footer_show',
						'args' => [
							'label'        => __( 'Hide Widgetized footer', 'the7mk2' ),
							'type'         => Controls_Manager::SWITCHER,
							'default'      => '1',
							'prefix_class' => 'elementor-',
							'label_on'     => 'Yes',
							'label_off'    => 'No',
							'return_value' => '0',
							'separator'    => 'none',
						],
					],
					'the7_document_footer_wa_id'   => [
						'meta' => '_dt_footer_widgetarea_id',
						'args' => [
							'label'     => __( 'Footer widget area', 'the7mk2' ),
							'type'      => Controls_Manager::SELECT,
							'default'   => 'sidebar_2',
							'options'   => 'presscore_get_widgetareas_options',
							'separator' => 'none',
							'condition' => [
								'the7_document_show_footer_wa' => [ '1', '' ],
							],
						],
					],
				],
			],
		];

		$controls = [[]];
		foreach ( $this->sections as $section ) {
			if ( ! empty( $section['controls'] ) ) {
				$controls[] = $section['controls'];
			}
		}
		$this->controls = call_user_func_array( 'array_merge', $controls );
	}

	/**
	 * Add Elementor controls for sidebar, footer and header.
	 *
	 * @param Elementor\Core\Base\Document $document Elementor document class.
	 */
	public function add_controls( $document ) {
		foreach ( $this->sections as $section_id => $section ) {
			$document->start_controls_section( $section_id, $section['args'] );

			if ( ! empty( $section['controls'] ) ) {
				foreach ( $section['controls'] as $control_id => $control ) {
					if ( isset( $control['args']['options'] ) && is_callable( $control['args']['options'] ) ) {
						$control['args']['options'] = call_user_func( $control['args']['options'] );
					}
					$document->add_control( $control_id, $control['args'] );
				}
			}

			$document->end_controls_section();
		}
	}

	/**
	 * Localize settings values to js front.
	 *
	 * @param array $settings Array of settings.
	 * @param int   $post_id Post ID.
	 *
	 * @return array
	 */
	public function localize_settings( $settings, $post_id ) {
		foreach ( $this->controls as $control_id => $control ) {
			if ( isset( $control['meta'] ) ) {
				$settings[ $control_id ] = get_post_meta( $post_id, $control['meta'], true );
			}
		}

		return $settings;
	}

	/**
	 * Update post meta.
	 *
	 * @param Elementor\Core\Base\Document $document Elementor document class.
	 * @param array                        $data Updated settings values.
	 */
	public function update_post_meta( $document, $data ) {
		$post_id = $document->get_post()->ID;
		foreach ( $this->controls as $control_id => $control ) {
			if ( isset( $control['meta'] ) ) {
				$val = $control['args']['default'];
				if ( isset( $data['settings'][ $control_id ] ) ) {
					$val = $data['settings'][ $control_id ];
				}
				update_post_meta( $post_id, $control['meta'], $val );
			}
		}
	}

	/**
	 * Add inline scripts to auto save and reload preview.
	 */
	public function add_inline_scripts() {
		$onChange = [];
		foreach ( $this->controls as $control_id => $control ) {
			$onChange[] = sprintf( '"%s"', $control_id );
		}
		$onChange = implode( ',', $onChange );

		wp_add_inline_script(
			'elementor-editor',
			'
		function the7_intersect(a, b) {
			var t;
			if (b.length > a.length) t = b, b = a, a = t;
			return a.filter(function (e) {
				return b.indexOf(e) > -1;
			});
		}
		elementor.settings.page.model.on("change", function(settings) {
			if (the7_intersect(Object.keys(settings.changed), [' . $onChange . ']).length > 0) {
				elementor.saver.saveAutoSave({
					onSuccess: function onSuccess() {
						elementor.reloadPreview();
						elementor.once("preview:loaded", function () {
							elementor.getPanelView().setPage("page_settings");
						});
					}
				});
			}
		});
		'
		);
	}
}
