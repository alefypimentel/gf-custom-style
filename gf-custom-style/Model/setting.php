<?php
namespace WPA\Login;

if ( ! function_exists( 'add_action' ) ) :
	exit(0);
endif;

class Setting
{
	/**
	 * Color Teste Hexa
	 *
	 * @since 1.0
	 * @var string
	 */
	 private $base;

	/**
	* Color Teste Hexa
	*
	* @since 1.0
	* @var string
	*/
	private $background;

	/**
	*
	* @since 1.0
	* @var string
	*/
	private $border;

	/**
	*
	* @since 1.0
	* @var string
	*/
	private $btn_back;

	/**
	*
	* @since 1.0
	* @var string
	*/
	private $btn_text;

	/**
	*
	* @since 1.0
	* @var string
	*/
	private $btn_back_hover;

	/**
	*
	* @since 1.0
	* @var string
	*/
	private $btn_text_hover;

	/**
	*
	* @since 1.0
	* @var int
	*/
	private $checked;

	/**
	*
	* @since 1.0
	* @var int
	*/
	private $error;
	/**
	 *
	 * @since 1.0
	 * @var string
	 */
	 private $focus;

	/**
	 *
	 * @since 1.0
	 * @var string
	 */
	private $color_button_txt;

	/**
	 *
	 * @since 1.0
	 * @var string
	 */
	private $color_txt;

	/**
	 *
	 * @since 1.0
	 * @var string
	 */
	private $color_form_txt;

	/**
	 *
	 * @since 1.0
	 * @var string
	 */
	private $hover;

	/**
	 *
	 * @since 1.0
	 * @var int
	 */
	private $input;

	/**
	 *
	 * @since 1.0
	 * @var int
	 */
	private $input_error;

	/**
	 *
	 * @since 1.0
	 * @var string
	 */
	 private $label;

	/**
	*
	* @since 1.0
	* @var int
	*/
	private $placeholder;

	/**
	*
	* @since 1.0
	* @var int
	*/
	private $text;

	/**
	 *
	 * @since 1.0
	 * @var string
	 */
	 private $success;

	/**
	*
	* @since 1.0
	* @var int
	*/
	private $border_size;

	/**
	*
	* @since 1.0
	* @var int
	*/
	private $input_size;

	/**
	*
	* @since 1.0
	* @var int
	*/
	private $textarea_size;

	/**
	*
	* @since 1.0
	* @var string
	*/
	private $border_radius;

	/**
	*
	* @since 1.0
	* @var int
	*/
	private $font_size;

	/**
	*
	* @since 1.0
	* @var int
	*/
	private $font_size_btn;

	/**
	 * Nonces
	 *
	 * @since 1.0
	 * @var string
	 */
	const NONCE_GENERAL_ACTION = 'wpal-setting-general-action';

	const NONCE_GENERAL_NAME   = 'wpal-setting-general-name';

	/**
	 * Options
	 *
	 * @since 1.0
	 * @var string
	 */
	const OPTION_COLOR_BASE = 'wpal-field-base';

	const OPTION_COLOR_BACKGROUND = 'wpal-field-background';

	const OPTION_COLOR_BORDER = 'wpal-field-border';

	const OPTION_COLOR_BTN_BACK = 'wpal-field-btn-back';

	const OPTION_COLOR_BTN_TEXT = 'wpal-field-btn-text';

	const OPTION_COLOR_BTN_BACK_HOVER = 'wpal-field-btn-back-hover';

	const OPTION_COLOR_BTN_TEXT_HOVER = 'wpal-field-btn-text-hover';

	const OPTION_COLOR_CHECKED = 'wpal-field-checked';

	const OPTION_COLOR_ERROR = 'wpal-field-error';

	const OPTION_COLOR_FOCUS = 'wpal-field-focus';

	const OPTION_COLOR_HOVER = 'wpal-field-hover';

	const OPTION_COLOR_INPUT = 'wpal-field-input';

	const OPTION_COLOR_INPUT_ERROR = 'wpal-field-input-error';

	const OPTION_COLOR_LABEL = 'wpal-field-label';

	const OPTION_COLOR_PLACEHOLDER = 'wpal-field-placeholder';

	const OPTION_COLOR_TEXT = 'wpal-field-text';

	const OPTION_COLOR_SUCCESS = 'wpal-field-success';

	const OPTION_BORDER_SIZE = 'wpal-field-border-size';

	const OPTION_INPUT_SIZE = 'wpal-field-input-size';

	const OPTION_TEXTAREA_SIZE = 'wpal-field-textarea-size';

	const OPTION_BORDER_RADIUS = 'wpal-field-border-radius';

	const OPTION_FONT_SIZE = 'wpal-field-font-size';

	const OPTION_FONT_SIZE_BTN = 'wpal-field-font-size-btn';

	/**
	 * Page slug
	 *
	 * @since 0.3
	 * @var String
	 */
	 const PAGE_SLUG = 'wpal-settings-theme';

	/**
	 * Methods
	 *
	 * @since 1.0
	 * @var string
	 */
	public function __get( $prop_name )
	{
		return $this->_get_property( $prop_name );
	}

	public function __set( $prop_name, $value )
	{
		return $this->_set_property( $prop_name, $value );
	}

	public function get_branding_url( $size = 'full' )
	{
		return Utils_Helper::get_thumbnail_url( $this->_get_property( 'branding' ), $size );
	}

	private function _set_property( $prop_name, $value )
	{
		switch ( $prop_name ) {
			case 'base' :
				update_option( self::OPTION_COLOR_BASE, $value );
					break;

			case 'bacground' :
				update_option( self::OPTION_COLOR_BACKGROUND, $value );
				break;

			case 'border' :
				update_option( self::OPTION_COLOR_BORDER, $value );
				break;

			case 'btn_back' :
				update_option( self::OPTION_COLOR_BTN_BACK, $value );
				break;

			case 'btn_text' :
				update_option( self::OPTION_COLOR_BTN_TEXT, $value );
				break;

			case 'btn_back_hover' :
				update_option( self::OPTION_COLOR_BTN_BACK_HOVER, $value );
				break;

			case 'btn_text_hover' :
				update_option( self::OPTION_COLOR_BTN_TEXT_HOVER, $value );
				break;

			case 'checked' :
				update_option( self::OPTION_COLOR_CHECKED, $value );
				break;

			case 'error' :
				update_option( self::OPTION_COLOR_ERROR, $value );
				break;

			case 'focus' :
				update_option( self::OPTION_COLOR_FOCUS, $value );
					break;

			case 'hover' :
				update_option( self::OPTION_COLOR_HOVER, $value );
				break;

			case 'input' :
				update_option( self::OPTION_COLOR_INPUT, $value );
				break;

			case 'input_error' :
				update_option( self::OPTION_COLOR_INPUT_ERROR, $value );
				break;

			case 'label' :
				update_option( self::OPTION_COLOR_LABEL, $value );
				break;

			case 'placeholder' :
				update_option( self::OPTION_COLOR_PLACEHOLDER, $value );
				break;

			case 'text' :
				update_option( self::OPTION_COLOR_TEXT, $value );
				break;

			case 'success' :
				update_option( self::OPTION_COLOR_SUCCESS, $value );
				break;

			case 'border_size' :
				update_option( self::OPTION_BORDER_SIZE, $value );
				break;

			case 'input_size' :
				update_option( self::OPTION_INPUT_SIZE, $value );
					break;

			case 'textarea_size' :
				update_option( self::OPTION_TEXTAREA_SIZE, $value );
				break;

			case 'border_radius' :
				update_option( self::OPTION_BORDER_RADIUS, $value );
				break;

			case 'font_size' :
				update_option( self::OPTION_FONT_SIZE, $value );
				break;

			case 'font_size_btn' :
				update_option( self::OPTION_FONT_SIZE_BTN, $value );
				break;
		}
	}

	private function _get_property( $prop_name )
	{
		switch ( $prop_name ) :

			case 'base' :
				if ( ! isset( $this->base ) )
					$this->base = get_option( self::OPTION_COLOR_BASE, '#7f6fce' );
				break;

			case 'bacground' :
				if ( ! isset( $this->bacground ) )
					$this->bacground = get_option( self::OPTION_COLOR_BACKGROUND, '#7f6fce' );
				break;

			case 'border' :
				if ( ! isset( $this->border ) )
					$this->border = get_option( self::OPTION_COLOR_BORDER, '#7f6fce' );
				break;

			case 'btn_back' :
				if ( ! isset( $this->btn_back ) )
					$this->btn_back = get_option( self::OPTION_COLOR_BTN_BACK, '#f9f9f9' );
				break;

			case 'btn_text' :
				if ( ! isset( $this->btn_text ) )
					$this->btn_text = get_option( self::OPTION_COLOR_BTN_TEXT, '#fff' );
				break;

			case 'btn_back_hover' :
				if ( ! isset( $this->btn_back_hover ) )
					$this->btn_back_hover = get_option( self::OPTION_COLOR_BTN_BACK_HOVER, '#ededed' );
				break;

			case 'btn_text_hover' :
				if ( ! isset( $this->btn_text_hover ) )
					$this->btn_text_hover = get_option( self::OPTION_COLOR_BTN_TEXT_HOVER, '#ffffff' );
				break;

			case 'checked' :
				if ( ! isset( $this->checked ) )
					$this->checked = get_option( self::OPTION_COLOR_CHECKED, '#7f6fce' );
				break;

			case 'error' :
				if ( ! isset( $this->error ) )
					$this->error = get_option( self::OPTION_COLOR_ERROR, '#eb0c0c' );
				break;

			case 'focus' :
				if ( ! isset( $this->focus ) )
					$this->focus = get_option( self::OPTION_COLOR_FOCUS, '#18e0c4' );
				break;

			case 'hover' :
				if ( ! isset( $this->hover ) )
					$this->hover = get_option( self::OPTION_COLOR_HOVER, '#18e0c4' );
				break;

			case 'input' :
				if ( ! isset( $this->input ) )
					$this->input = get_option( self::OPTION_COLOR_INPUT, '#f9f9f9' );
				break;

			case 'input_error' :
				if ( ! isset( $this->input_error ) )
					$this->input_error = get_option( self::OPTION_COLOR_INPUT_ERROR, '#ffeeee' );
				break;

			case 'label' :
				if ( ! isset( $this->label ) )
					$this->label = get_option( self::OPTION_COLOR_LABEL, '#525252' );
				break;

			case 'placeholder' :
				if ( ! isset( $this->placeholder ) )
					$this->placeholder = get_option( self::OPTION_COLOR_PLACEHOLDER, '#666666' );
				break;

			case 'text' :
				if ( ! isset( $this->text ) )
					$this->text = get_option( self::OPTION_COLOR_TEXT, '#595959' );
				break;

			case 'success' :
				if ( ! isset( $this->success ) )
					$this->success = get_option( self::OPTION_COLOR_SUCCESS, '#009d47' );
				break;

			case 'border_size' :
				if ( ! isset( $this->border_size ) )
					$this->border_size = get_option( self::OPTION_BORDER_SIZE, 3 );
				break;

			case 'input_size' :
					if ( ! isset( $this->input_size ) )
					$this->input_size = get_option( self::OPTION_INPUT_SIZE, 45 );
				break;

			case 'textarea_size' :
				if ( ! isset( $this->textarea_size ) )
					$this->textarea_size = get_option( self::OPTION_TEXTAREA_SIZE, 200 );
				break;

			case 'border_radius' :
				if ( ! isset( $this->border_radius ) )
					$this->border_radius = get_option( self::OPTION_BORDER_RADIUS, 3 );
				break;

			case 'font_size' :
				if ( ! isset( $this->font_size ) )
					$this->font_size = get_option( self::OPTION_FONT_SIZE, 16 );
				break;

			case 'font_size_btn' :
				if ( ! isset( $this->font_size_btn ) )
					$this->font_size_btn = get_option( self::OPTION_FONT_SIZE_BTN, 18 );
				break;

			default :
				return false;
				break;
		endswitch;

		return $this->$prop_name;
	}
}
