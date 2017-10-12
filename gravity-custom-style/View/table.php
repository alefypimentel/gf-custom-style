<tbody id="input" class="box-element">
    <tr>
        <td rowspan="2" class="title">Input</td>
		<td><label for="wpal-field-input"><?php _e( 'Color Background Input', App::PLUGIN_SLUG ); ?></label></td>
    </tr>
    <tr>
        <td>
            <input data-component="color-picker"
                    data-default-color="#f9f9f9"
                    type="text" id="wpal-field-input"
                name="<?php echo Setting::OPTION_COLOR_INPUT; ?>"
                value="<?php echo esc_html( $model->input ); ?>">
        </td>
    </tr>
</tbody>
