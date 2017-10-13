<?php
namespace GCS\Custom;

// Avoid that files are directly loaded
if ( ! function_exists( 'add_action' ) ) :
	exit(0);
endif;

App::uses( 'settings', 'View' );
App::uses( 'setting', 'Model' );

class Settings_Controller
{
	public function __construct()
	{
		add_action( 'admin_menu', array( &$this, 'menu' ) );
		add_action( 'wp_ajax_general_save_settings', array( &$this, 'save' ) );
		add_filter( 'upload_mimes', array( &$this, 'available_svg_upload' ) );
		add_action( 'wp_head', array( 'GCS\Custom\Settings_View', 'render_config_css_inline' ) );
		add_filter( 'login_headerurl', array( &$this, 'custom_login_header_url' ) );
		add_filter( 'plugin_action_links_' . App::plugin_basename_file(), array( &$this, 'add_action_links' ) );
	}

	public function add_action_links( $links )
	{
		$links[] = '<a href="' . admin_url( 'themes.php?page=gcs-settings-theme' ) . '">' . __( 'Settings', App::PLUGIN_SLUG ) . '</a>';
		return $links;
	}

	public function custom_login_header_url( $url ) {
		return home_url( '/' );
	}

	public function available_svg_upload( $svg_mime )
	{
    	$svg_mime['svg'] = 'image/svg+xml';
    	return $svg_mime;
	}

	public function menu()
	{
		add_theme_page(
			App::PLUGIN_NAME,
			App::PLUGIN_NAME,
			'manage_options',
			Setting::PAGE_SLUG,
			array( __NAMESPACE__ . '\Settings_View', 'render_general' )
		);
	}

	public function save()
	{
		if ( ! Utils_Helper::verify_nonce_post( Setting::NONCE_GENERAL_NAME, Setting::NONCE_GENERAL_ACTION ) ) :
			Utils_Helper::error_server_json( 'not_permission_nonce' );
			http_response_code( 511 );
			exit(0);
		endif;

		$this->save_fields();

		Utils_Helper::success_server_json( 'config_save_success', 'Operação realizada com sucesso.' );
		exit(1);
	}

	public function save_fields()
	{
		$model                   = new Setting();
		$model->base			= Utils_Helper::post( Setting::OPTION_COLOR_BASE, false, 'esc_html' );
		$model->background		= Utils_Helper::post( Setting::OPTION_COLOR_BACKGROUND, false, 'esc_html' );
		$model->border			= Utils_Helper::post( Setting::OPTION_COLOR_BORDER, false, 'esc_html' );
		$model->btn_back		= Utils_Helper::post( Setting::OPTION_COLOR_BTN_BACK, false, 'esc_html' );
		$model->btn_text     	= Utils_Helper::post( Setting::OPTION_COLOR_BTN_TEXT, false, 'esc_html' );
		$model->btn_back_hover  = Utils_Helper::post( Setting::OPTION_COLOR_BTN_BACK_HOVER, false, 'esc_html' );
		$model->btn_text_hover  = Utils_Helper::post( Setting::OPTION_COLOR_BTN_TEXT_HOVER, false, 'esc_html' );
		$model->checked         = Utils_Helper::post( Setting::OPTION_COLOR_CHECKED, false, 'esc_html' );
		$model->error  			= Utils_Helper::post( Setting::OPTION_COLOR_ERROR, false, 'esc_html' );
		$model->focus	     	= Utils_Helper::post( Setting::OPTION_COLOR_FOCUS, false, 'esc_html' );
		$model->hover    		= Utils_Helper::post( Setting::OPTION_COLOR_HOVER, false, 'esc_html' );
		$model->input  			= Utils_Helper::post( Setting::OPTION_COLOR_INPUT, false, 'esc_html' );
		$model->input_error 	= Utils_Helper::post( Setting::OPTION_COLOR_INPUT_ERROR, false, 'esc_html' );
		$model->label        	= Utils_Helper::post( Setting::OPTION_COLOR_LABEL, false, 'esc_html' );
		$model->placeholder   	= Utils_Helper::post( Setting::OPTION_COLOR_PLACEHOLDER, false, 'esc_html' );
		$model->text   			= Utils_Helper::post( Setting::OPTION_COLOR_TEXT, false, 'esc_html' );
		$model->success         = Utils_Helper::post( Setting::OPTION_COLOR_SUCCESS, false, 'esc_html' );
		$model->border_size  	= Utils_Helper::post( Setting::OPTION_BORDER_SIZE, false, 'intval' );
		$model->input_size	    = Utils_Helper::post( Setting::OPTION_INPUT_SIZE, false, 'intval' );
		$model->textarea_size   = Utils_Helper::post( Setting::OPTION_TEXTAREA_SIZE, false, 'intval' );
		$model->border_radius  	= Utils_Helper::post( Setting::OPTION_BORDER_RADIUS, false, 'intval' );
		$model->font_size       = Utils_Helper::post( Setting::OPTION_FONT_SIZE, false, 'intval' );
		$model->font_size_btn   = Utils_Helper::post( Setting::OPTION_FONT_SIZE_BTN, false, 'intval' );
	}
}