<?php
namespace WP_Rules\Conditions;

use WP_Rules\Core\Admin\Condition\AbstractCondition;

/**
 * Class IsRobots
 *
 * @package WP_Rules\Conditions
 */
class IsRobots extends AbstractCondition {

	/**
	 * Initialize condition details like id, name.
	 *
	 * @return array
	 */
	protected function init() {
		return [
			'id'   => 'is-robots',
			'name' => __( 'Is On Robots.txt Page', 'rules' ),
		];
	}

	/**
	 * Return condition options fields array.
	 *
	 * @return array Admin fields.
	 */
	protected function admin_fields() {
		return [];
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
		return is_robots();
	}
}
