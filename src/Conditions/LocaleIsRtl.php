<?php
namespace WP_Rules\Conditions;

use WP_Rules\Core\Admin\Condition\AbstractCondition;

/**
 * Class IsRtl
 *
 * @package WP_Rules\Conditions
 */
class LocaleIsRtl extends AbstractCondition {

	/**
	 * Initialize condition details like id, name.
	 *
	 * @return array
	 */
	protected function init() {
		return [
			'id'   => 'locale-is-rtl',
			'name' => __( 'Current Locale is RTL', 'rules' ),
		];
	}

	/**
	 * Return condition options fields array.
	 *
	 * @return array Admin fields.
	 */
	protected function admin_fields() {
		return [
			[
				'type'    => 'select',
				'label'   => __( 'Text Direction', 'rules' ),
				'name'    => 'is_rtl',
				'options' => [
					'no'  => __( 'LTR', 'rules' ),
					'yes' => __( 'RTL', 'rules' ),
				],
			],
		];
	}

	/**
	 * Evaluate current condition.
	 *
	 * @param array $condition_options Condition Options array.
	 * @param array $trigger_hook_args Current rule trigger hook arguments.
	 *
	 * @return bool If it passes or not.
	 */
	protected function evaluate( $condition_options, $trigger_hook_args ) {
		return ( is_rtl() && 'yes' === $condition_options['is_rtl'] ) || ( ! is_rtl() && 'yes' !== $condition_options['is_rtl'] );
	}
}