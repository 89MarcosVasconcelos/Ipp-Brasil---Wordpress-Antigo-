<?php
defined( 'ABSPATH' ) or die();


/**
 * Select control
 */
class Nanofit_Options_DropdownPages extends Nanofit_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'dropdown';

	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		$name = '_options-dropdown-' . $this->id;
		?>
		<div class="options-control-inputs">
			<label>
				<span class="options-control-preview"></span>
				<?php
					wp_dropdown_pages(
						array(
							'name'              => $name,
							'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'nanofit' ),
							'option_none_value' => '0',
							'selected'          => $this->value(),
						)
					);
				?>
			</label>
		</div><?php
	}
}
