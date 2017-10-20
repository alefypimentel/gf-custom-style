<?php
namespace GCS\Custom;

// Avoid that files are directly loaded
if ( ! function_exists( 'add_action' ) ) :
	exit(0);
endif;

class Settings_View
{
	public static function render_general()
	{
		$model = new Setting();

		?>
		<div class="wrap">
			<form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" data-component="form">
				<!-- header da tabela -->
				<div class="tab">
					<span class="tablinks active" onclick="openTab(event, 'tab1')">Form Style</span>
					<span class="tablinks" onclick="openTab(event, 'tab2')">Class Grid</span>
					<span class="tablinks" onclick="openTab(event, 'tab3')">Example Themes</span>
				</div>

				<!-- Items da tabela -->
				<div id="tab1" class="tabcontent" style="display: block;">
					<div class="table-items">
						<table class="form-table">
							<thead class="header-table">
								<tr>
									<th colspan="6">
										<h1>Configuration Manager - GF Custom Style </h1>
									</th>
								</tr>
							</thead>

							<tbody id="base" class="box-element">
								<tr>
									<td rowspan="2" class="title">Base</td>
									<td><label for="gcs-field-base"><?php _e( 'Color Base', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-checked"><?php _e( 'Color Checkbox and Radio', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-btn-float"><?php _e( 'Button position', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-btn-size"><?php _e( 'Button Size', App::PLUGIN_SLUG ); ?></label></td>
									<td></td>
								</tr>
								<tr>
									<td>
										<input data-component="color-picker"
										data-default-color="#7f6fce"
										type="text" id="gcs-field-base"
										name="<?php echo Setting::OPTION_COLOR_BASE; ?>"
										value="<?php echo esc_html( $model->base ); ?>">
									</td>
									<td>
										<input data-component="color-picker"
										data-default-color="#7f6fce"
										type="text" id="gcs-field-checked"
										name="<?php echo Setting::OPTION_COLOR_CHECKED; ?>"
										value="<?php echo esc_html( $model->checked ); ?>">
									</td>
									<td>
										<script type="text/javascript">
										jQuery("#name").live("change", function() {
											jQuery("#gcs-field-btn-float").val(jQuery(this).find("option:selected").attr("value"));
										});
										</script>

										<select id="name" name="name" style="width: 17px;height: 25px;">
											<option value="">Please select...</option>
											<option value="left">Left</option>
											<option value="right">Right</option>
											<option value="center">Center</option>
										</select>

										<input type="text" id="gcs-field-btn-float" name="<?php echo Setting::OPTION_BTN_FLOAT; ?>" value="<?php echo esc_html( $model->btn_float ); ?>" readonly="readonly" style="float: left; width: 55px;">
									</td>
									<td>
										<input type="text" id="gcs-field-btn-size"
										name="<?php echo Setting::OPTION_BTN_SIZE; ?>"
										value="<?php echo esc_html( $model->btn_size ); ?>">
										<span>px</span>
										or
										<span style="margin-left: 5px; border-color: orange;">%</span>
									</td>
									<td></td>
								</tr>
							</tbody>

							<tbody id="Text" class="box-element">
								<tr>
									<td rowspan="2" class="title">Text</td>
									<td><label for="gcs-field-label"><?php _e( 'Color Title', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-placeholder"><?php _e( 'Color Placeholder', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-text"><?php _e( 'Color Text', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-font-size"><?php _e( 'Font Size', App::PLUGIN_SLUG ); ?></label></td>
									<td></td>
								</tr>
								<tr>
									<td>
										<input data-component="color-picker"
										data-default-color="#525252"
										type="text" id="gcs-field-label"
										name="<?php echo Setting::OPTION_COLOR_LABEL; ?>"
										value="<?php echo esc_html( $model->label ); ?>">
									</td>
									<td>
										<input data-component="color-picker"
										data-default-color="#666666"
										type="text" id="gcs-field-placeholder"
										name="<?php echo Setting::OPTION_COLOR_PLACEHOLDER; ?>"
										value="<?php echo esc_html( $model->placeholder ); ?>">
									</td>
									<td>
										<input data-component="color-picker"
										data-default-color="#595959"
										type="text" id="gcs-field-text"
										name="<?php echo Setting::OPTION_COLOR_TEXT; ?>"
										value="<?php echo esc_html( $model->text ); ?>">
									</td>
									<td>
										<input type="number" id="gcs-field-font-size"
										name="<?php echo Setting::OPTION_FONT_SIZE; ?>"
										value="<?php echo intval( $model->font_size ); ?>">
										<span>px</span>
									</td>
									<td></td>
								</tr>
							</tbody>

							<tbody id="input" class="box-element">
								<tr>
									<td rowspan="2" class="title">Input</td>
									<td><label for="gcs-field-input"><?php _e( 'Color Background Input', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-input_error"><?php _e( 'Color Background Input Error', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-focus"><?php _e( 'Color Focus Input', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-input-size"><?php _e( 'Input Size', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-textarea-size"><?php _e( 'Textarea Size', App::PLUGIN_SLUG ); ?></label></td>
								</tr>
								<tr>
									<td>
										<input data-component="color-picker"
										data-default-color="#f9f9f9"
										type="text" id="gcs-field-input"
										name="<?php echo Setting::OPTION_COLOR_INPUT; ?>"
										value="<?php echo esc_html( $model->input ); ?>">
									</td>
									<td>
										<input data-component="color-picker"
										data-default-color="#ffeeee"
										type="text" id="gcs-field-input-error"
										name="<?php echo Setting::OPTION_COLOR_INPUT_ERROR; ?>"
										value="<?php echo esc_html( $model->input_error ); ?>">
									</td>
									<td>
										<input data-component="color-picker"
										data-default-color="#18e0c4"
										type="text" id="gcs-field-focus"
										name="<?php echo Setting::OPTION_COLOR_FOCUS; ?>"
										value="<?php echo esc_html( $model->focus ); ?>">
									</td>
									<td>
										<input type="number" id="gcs-field-input-size"
										name="<?php echo Setting::OPTION_INPUT_SIZE; ?>"
										value="<?php echo intval( $model->input_size ); ?>">
										<span>px</span>
									</td>
									<td>
										<input type="number" id="gcs-field-textarea-size"
										name="<?php echo Setting::OPTION_TEXTAREA_SIZE; ?>"
										value="<?php echo intval( $model->textarea_size ); ?>">
										<span>px</span>
									</td>
								</tr>
							</tbody>

							<tbody id="btn" class="box-element">
								<tr>
									<td rowspan="3" class="title">Button</td>
									<td><label for="gcs-field-btn_back"><?php _e( 'Color Button Background', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-btn_text"><?php _e( 'Color Button Text', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-btn_back_hover"><?php _e( 'Color Button Backgound Hover', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-btn_text_hover"><?php _e( 'Color Button Text Hover', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-font-size-btn"><?php _e( 'Font Size Button', App::PLUGIN_SLUG ); ?></label></td>
								</tr>
								<tr>
									<td>
										<input data-component="color-picker"
										data-default-color="#7f6fce"
										type="text" id="gcs-field-btn-back"
										name="<?php echo Setting::OPTION_COLOR_BTN_BACK; ?>"
										value="<?php echo esc_html( $model->btn_back ); ?>">
									</td>
									<td>
										<input data-component="color-picker"
										data-default-color="#ffffff"
										type="text" id="gcs-field-btn-text"
										name="<?php echo Setting::OPTION_COLOR_BTN_TEXT; ?>"
										value="<?php echo esc_html( $model->btn_text ); ?>">
									</td>
									<td>
										<input data-component="color-picker"
										data-default-color="#ededed"
										type="text" id="gcs-field-btn-back-hover"
										name="<?php echo Setting::OPTION_COLOR_BTN_BACK_HOVER; ?>"
										value="<?php echo esc_html( $model->btn_back_hover ); ?>">
									</td>
									<td>
										<input data-component="color-picker"
										data-default-color="#7f6fce"
										type="text" id="gcs-field-btn-text-hover"
										name="<?php echo Setting::OPTION_COLOR_BTN_TEXT_HOVER; ?>"
										value="<?php echo esc_html( $model->btn_text_hover ); ?>">
									</td>
									<td>
										<input type="number" id="gcs-field-font-size-btn"
										name="<?php echo Setting::OPTION_FONT_SIZE_BTN; ?>"
										value="<?php echo intval( $model->font_size_btn ); ?>">
										<span>px</span>
									</td>
								</tr>
							</tbody>

							<tbody id="border" class="box-element">
								<tr>
									<td rowspan="2" class="title">Border</td>
									<td><label for="gcs-field-border"><?php _e( 'Color Border', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-border-size"><?php _e( 'Border Size', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-border-radius"><?php _e( 'Border Radius', App::PLUGIN_SLUG ); ?></label></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>
										<input data-component="color-picker"
										data-default-color="#7f6fce"
										type="text" id="gcs-field-border"
										name="<?php echo Setting::OPTION_COLOR_BORDER; ?>"
										value="<?php echo esc_html( $model->border ); ?>">
									</td>
									<td>
										<input type="number" id="gcs-field-border-size"
										name="<?php echo Setting::OPTION_BORDER_SIZE; ?>"
										value="<?php echo intval( $model->border_size ); ?>">
										<span>px</span>
									</td>
									<td>
										<input type="number" id="gcs-field-border-radius"
										name="<?php echo Setting::OPTION_BORDER_RADIUS; ?>"
										value="<?php echo intval( $model->border_radius ); ?>">
										<span>px</span>
									</td>
									<td></td>
									<td></td>
								</tr>
							</tbody>

							<tbody id="validation" class="box-element">
								<tr>
									<td rowspan="2" class="title">Validation</td>
									<td><label for="gcs-field-success"><?php _e( 'Color Message Success', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-error"><?php _e( 'Color Error Message', App::PLUGIN_SLUG ); ?></label></td>
									<td><label for="gcs-field-theme"><?php _e( 'Model Theme', App::PLUGIN_SLUG ); ?></label></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>
										<input data-component="color-picker"
										data-default-color="#009d47"
										type="text" id="gcs-field-success"
										name="<?php echo Setting::OPTION_COLOR_SUCCESS; ?>"
										value="<?php echo esc_html( $model->success ); ?>">
									</td>
									<td>
										<input data-component="color-picker"
										data-default-color="#eb0c0c"
										type="text" id="gcs-field-error"
										name="<?php echo Setting::OPTION_COLOR_ERROR; ?>"
										value="<?php echo esc_html( $model->error ); ?>">
									</td>
									<td>
										<script type="text/javascript">
										jQuery("#nameTheme").live("change", function() {
											jQuery("#gcs-field-theme").val(jQuery(this).find("option:selected").attr("value"));
										});
										</script>

										<select id="nameTheme" name="nameTheme" style="width: 17px;height: 25px;">
											<option value="">Theme select...</option>
											<option value="alfa">Alfa</option>
											<option value="beta">Beta</option>
											<option value="default">Default</option>
										</select>

										<input type="text" id="gcs-field-theme" name="<?php echo Setting::OPTION_THEME; ?>" value="<?php echo esc_html( $model->theme ); ?>" readonly="readonly" style="float: left;">
									</td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div id="tab2" class="tabcontent" style="display: none;">
					<div class="table-items">
						<?php
							echo '<img src="' . plugins_url( 'images/grid.png', dirname(__FILE__) ) . '" > ';
						?>
					</div>
				</div>

				<div id="tab3" class="tabcontent" style="display: none;">
					<div class="table-items">
					</div>
				</div>

				<script>
					function openTab(evt, tabName) {
						var i, tabcontent, tablinks;
						tabcontent = document.getElementsByClassName("tabcontent");
						for (i = 0; i < tabcontent.length; i++) {
							tabcontent[i].style.display = "none";
						}
						tablinks = document.getElementsByClassName("tablinks");
						for (i = 0; i < tablinks.length; i++) {
							tablinks[i].className = tablinks[i].className.replace(" active", "");
						}
						document.getElementById(tabName).style.display = "block";
						evt.currentTarget.className += " active";
					}
				</script>

				<p class="submit">
					<?php
						wp_nonce_field(
							Setting::NONCE_GENERAL_ACTION,
							Setting::NONCE_GENERAL_NAME
						);
					?>

					<input type="hidden" name="action" value="general_save_settings">
					<input type="submit" class="button button-primary" value="<?php echo esc_attr_e( 'Save', App::PLUGIN_SLUG ); ?>" data-element="submit">
				</p>
			</form>
		</div>
		<?php
	}

	public static function render_config_css_inline()
	{
		$model			= new Setting();
		$base			= htmlentities( $model->base );
		// $background		= htmlentities( $model->background );
		$border			= htmlentities( $model->border );
		$btn_back		= htmlentities( $model->btn_back );
		$btn_text		= htmlentities( $model->btn_text );
		$btn_back_hover	= htmlentities( $model->btn_back_hover );
		$btn_text_hover	= htmlentities( $model->btn_text_hover );
		$btn_float		= htmlentities( $model->btn_float );
		$btn_size		= htmlentities( $model->btn_size );
		$theme			= htmlentities( $model->theme );
		$checked		= htmlentities( $model->checked );
		$error			= htmlentities( $model->error );
		$focus			= htmlentities( $model->focus );
		$input			= htmlentities( $model->input );
		$input_error	= htmlentities( $model->input_error );
		$label			= htmlentities( $model->label );
		$placeholder	= htmlentities( $model->placeholder );
		$text			= htmlentities( $model->text );
		$success		= htmlentities( $model->success );
		$border_size	= htmlentities( $model->border_size );
		$input_size		= htmlentities( $model->input_size );
		$textarea_size	= htmlentities( $model->textarea_size );
		$border_radius	= htmlentities( $model->border_radius );
		$font_size		= htmlentities( $model->font_size );
		$font_size_btn	= htmlentities( $model->font_size_btn );

		echo "
		<style type=\"text/css\">
			.gcs-form .gfield_radio li label,
			.gcs-form .gfield_checkbox li label {
				color: {$text} !important;
			}
			.gcs-form .col .gfield_label {
				color: {$label} !important;
			}
			.gcs-form input[type='checkbox']:after {
				background-color: {$input} !important;
			}
			.gcs-form input[type='checkbox']:checked:after {
				background-color: {$checked} !important;
			}
			.gcs-form input[type='radio']:after {
				background-color: {$input} !important;
			}
			.gcs-form input[type='radio']:checked:after {
				background-color: {$checked} !important;
				border-color: {$border} !important;
			}
			.col select,
			.col textarea,
			.col input {
				background: {$input} !important;
				border-radius: {$border_radius}px !important;
				color: {$text} !important;
				font-size: {$font_size}px !important;
			}
			.col select:focus,
			.col textarea:focus,
			.col input:focus {
				box-shadow: 0px 0px 5px 0px {$focus} !important;
			}
			.col select,
			.col input {
				height: {$input_size}px !important;
			}
			.col textarea {
				height: {$textarea_size}px !important;
			}
			.col .gfield_label {
				font-size: {$font_size}px !important;
			}
			.gcs-form.beta select,
			.gcs-form.beta textarea,
			.gcs-form.beta input {
				border-bottom: {$border_size}px solid {$border} !important;
			}
			.gcs-form.beta select:focus,
			.gcs-form.beta textarea:focus,
			.gcs-form.beta input:focus {
				box-shadow: none!important;
				border-bottom-color: {$focus} !important;
			}
			.gcs-form.alfa select,
			.gcs-form.alfa textarea,
			.gcs-form.alfa input {
				border-radius: {$border_radius}px !important;
				border-width: {$border_size}px !important;
				border-color: {$border} !important;
			}
			.gcs-form.alfa select:focus,
			.gcs-form.alfa textarea:focus,
			.gcs-form.alfa input:focus {
				border-color: {$focus} !important;
			}
			.gcs-form.alfa input[type='checkbox']:after,
			.gcs-form.alfa input[type='checkbox']:checked:after,
			.gcs-form.alfa input[type='radio']:after,
			.gcs-form.alfa input[type='radio']:checked:after {
				border-width: {$border_size}px !important;
				border-color: {$border} !important;
			}
			.gcs-form .gform_footer {
				float: {$btn_float}!important;
			}
			.gcs-form.alfa .gform_button {
				color: {$btn_text} !important;
				background: {$btn_back} !important;
				width: {$btn_size} !important;
			}
			.gcs-form.alfa .gform_button:hover {
				background: {$btn_back_hover} !important;
			}
			.ui-datepicker {
				background: {$input} !important;
			}
			.ui-datepicker-header {
				background: {$base} !important;
			}
			.ui-datepicker-calendar th span {
				color: {$base} !important;
			}
			.ui-datepicker-calendar td:hover {
				background: {$input} !important;
			}
			.gcs-form .gform_button {
				background: {$btn_back} !important;
				border-radius: {$border_radius}px !important;
				color: {$btn_text} !important;
				font-size: {$font_size_btn}px !important;
			}
			.gcs-form .gform_button:hover {
				background: {$btn_back_hover} !important;
				color: {$btn_text_hover} !important;
			}
			.gform_wrapper .gfield_error input,
			.gform_wrapper .gfield_error select,
			.gform_wrapper .gfield_error textarea {
				background: {$input_error} !important;
			}
			.validation_error {
				background: {$error} !important;
				border-radius: {$border_radius}px !important;
			}
			.gfield_description.validation_message {
				color: {$error} !important;
			}
			.gform_confirmation_wrapper .gform_confirmation_message {
				background: {$success} !important;
				border-radius: {$border_radius}px !important;
				font-size: {$font_size}px !important;
			}
			.gcs-form .gfield_error input[type='radio']:after,
			.gcs-form .gfield_error input[type='checkbox']:after {
				background: {$error} !important;
			}
			.gcs-form .gfield_error input[type='radio']:checked:after,
			.gcs-form .gfield_error input[type='checkbox']:checked:after {
				background: {$checked} !important;
			}
			.gcs-form.beta .gfield_error input,
			.gcs-form.beta .gfield_error select,
			.gcs-form.beta .gfield_error textarea {
				background: {$input} !important;
				border-bottom: {$border_size}px solid {$error} !important;
			}
			.gcs-form.beta .gfield_error input[type='radio']:after,
			.gcs-form.beta .gfield_error input[type='checkbox']:after {
				border-color: {$error} !important;
				background: {$input} !important;
			}
			.gcs-form.beta .gfield_error input[type='radio']:checked:after,
			.gcs-form.beta .gfield_error input[type='checkbox']:checked:after {
				background: {$checked} !important;
			}
			.gcs-form.alfa .gfield_error input,
			.gcs-form.alfa .gfield_error select,
			.gcs-form.alfa .gfield_error textarea {
				background: {$input} !important;
				border-color: {$error} !important;
			}
			.gcs-form.alfa .gfield_error input[type='radio']:after,
			.gcs-form.alfa .gfield_error input[type='checkbox']:after {
				border-color: {$error} !important;
				background: {$input} !important;
			}
			.gcs-form.alfa .gfield_error input[type='radio']:checked:after,
			.gcs-form.alfa .gfield_error input[type='checkbox']:checked:after {
				background: {$checked} !important;
			}
			.gcs-form ::-webkit-input-placeholder {
				color: {$placeholder} !important;
			}
			.gcs-form ::-moz-placeholder {
				color: {$placeholder} !important;
			}
			.gcs-form :-ms-input-placeholder {
				color: {$placeholder} !important;
			}
			.gcs-form :-moz-placeholder {
				color: {$placeholder} !important;
			}
			.gcs-form .gform_wrapper .gf_progressbar {
				background: {$base} !important;
			}

			.gcs-form ::-webkit-input-placeholder {
				color: {$placeholder} !important;
			}
		</style>
		";
	}
}