<?php
namespace WP_Rules\ThirdParty\Plugins\ContactForm7\Triggers;

use WP_Rules\Core\Admin\Trigger\AbstractTrigger;
use WPCF7_ContactForm;

/**
 * Class BeforeSendEmail
 *
 * @package WP_Rules\ThirdParty\Plugins\CotactForm7\Triggers
 */
class BeforeSendEmail extends AbstractTrigger {

	/**
	 * Initialize trigger details like id, name, wp_action.
	 *
	 * @return array
	 */
	protected function init() {
		return [
			'id'                 => 'wpcf7_submit',
			'wp_action'          => 'wpcf7_submit',
			'name'               => __( 'Contact Form 7 - Form submission', 'rules' ),
			'wp_action_priority' => 10,
			'wp_action_args'     => [
				'cf7form',
				'result',
			],
		];
	}

	/**
	 * Return trigger options fields array.
	 *
	 * @return array Admin fields.
	 */
	protected function admin_fields() {
		return [];
	}

	protected function register_variable( $variable_name, $variable_value ) {
		if ( 'cf7form' !== $variable_name || ! ( $variable_value instanceof WPCF7_ContactForm ) ) {
			return null;
		}

		return array_merge(
			[
				'form_id' => $variable_value->id()
			],
			(array) $variable_value->get_properties()
		);

	}

}
