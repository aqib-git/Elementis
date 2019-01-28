<?php

/**
 * Elementor Contact Form Shortcode Widget.
 *
 *
 * @since 1.0.0
 * @author aqib.rashid
 * @package Elementis\Widgets
 */
class Elementis_Contact_Form_7 extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'contct-form-7';

	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return __( 'Contact Form 7', 'elementis' );

	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return 'fa fa-envelope-o';

	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {

		return [ 'elementis' ];

	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'contact_form_7',
			[
				'label' => __( 'Contact Form 7', 'elementis' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'contact_form_7_select',
			[
				'label'   => __( 'Form', 'elementis' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_contact_forms(),
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $settings['contact_form_7_select'] ) ) {
			return;
		}

		echo do_shortcode( '[contact-form-7 id=" ' . $settings['contact_form_7_select'] . '"]' );

	}

	/**
	 * Get array of contact forms from database.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	protected function get_contact_forms() {

		$forms = get_posts( [ 'post_type' => 'wpcf7_contact_form' ] );

		return array_reduce(
			$forms,
			function ( $carry, $item ) {
				$carry[ $item->ID ] = $item->post_name;
				return $carry;
			},
			[]
		);
	}
}
