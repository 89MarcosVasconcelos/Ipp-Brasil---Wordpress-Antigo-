<?php
defined( 'ABSPATH' ) or die();


/**
 * Radio buttons control
 */
class Nanofit_Options_RadioButtons extends Nanofit_Options_Control
{
	public $type = 'radio-buttons';

	public function render_content() {
		?>

			<div class="options-control-inputs">
				<radio-buttons v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></radio-buttons>
			</div>

		<?php
	}
}
