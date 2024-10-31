<?php
/* 
Plugin Name: Magn QR Code WP
Plugin URI: http://www.netvivs.com/qr-code-for-wordpress/
Description: This plugin will help you embed a QR Code in your Wordpress posts
Version: 0.1
Author: Julian Magnone
Author URI: http://netvivs.com/

*/ 

require_once(dirname(__FILE__) . '/qrcodewp-ui.php');


add_action('plugins_loaded', 'widget_qrcodewp_init');
function widget_qrcodewp_init() {

	// Check for the required plugin functions. This will prevent fatal
	// errors occurring when you deactivate the dynamic-sidebar plugin.
	if ( !function_exists('register_sidebar_widget') ) {
		return;
	}
	
	//add_filter('template', 'ts_get_template');
	
	
	add_filter('stylesheet', 'magnqrcode_get_stylesheet');

	function magnqrcode_get_stylesheet()
	{
		wp_register_style($handle = 'magn-qrcode-admin-css-all', $src = plugins_url('qrcodewp.css', __FILE__), $deps = array(), $ver = '1.0.0', $media = 'all');	
		wp_enqueue_style('magn-qrcode-admin-css-all');
	}
	 
	
	// create custom plugin settings menu
	add_action('admin_menu', 'magnqrcode_create_menu');

	function magnqrcode_create_menu() {

		//create new top-level menu
		add_options_page('QR Code Options', 'QR Code', 'manage_options', 'magn_qrcode', 'magnqrcode_settings_page');
		//plugins_url('/images/dndmediaicon.png', __FILE__)
		
		//call register settings function
		add_action( 'admin_init', 'register_magnqrcode_settings' );
		add_action( 'admin_init', 'magnqrcode_add_meta_boxes' );
	}
	
	function magnqrcode_add_meta_boxes()
	{
		add_meta_box( 'qrcodewp_metabox', 'Magn QR Code for WP', 'qrcodewp_show_metabox_ui', 'post', 'normal', 'high' );
	}

	function register_magnqrcode_settings() {
		//register our settings
		register_setting( 'magnqrcode-settings-group', 'magnqrcode_default_href' );
		register_setting( 'magnqrcode-settings-group', 'magnqrcode_default_width' );
		register_setting( 'magnqrcode-settings-group', 'magnqrcode_default_height' );
	}
	
	function magnqrcode_settings_page()
	{
		$magnqrcode_form_action = $_POST['magnqrcodewp_form_action'];
		magnqrcode_show_ui_settings_page();
	}
	
	function magnqrcode_save_settings()
	{
		echo 'Options saved';
	}

}

add_shortcode("qrcode", "qrcodewp_handler");
function qrcodewp_handler($atts) {

	/*extract( shortcode_atts( array(  
        'href' => '',  
    ), $atts ) );*/

	$attr = shortcode_atts( array(  
        'href' => get_option('magnqrcode_default_href',''),  
		'width' => get_option('magnqrcode_default_width', '200'),
		'height' => get_option('magnqrcode_default_height', '200'),
    ), $atts );
	
	$output = qrcodewp_function($attr);
	return $output;
}


function qrcodewp_function($attr) {
  
  extract($attr);
  
  //if (empty($href=)) $href = get_the_
  $href = urlencode($href);
  
  // Invoke Google API Chart
  $str = "https://chart.googleapis.com/chart?";
  $str .= "cht=qr&";
  $str .= "chl={$href}&";
  $str .= "chs={$width}x{$height}&";
  $str .= "choe=UTF-8&";
  //$str .= "chld=L&";
  
  $html = "<img src=\"{$str}\" alt=\"\" />";
  
  //send back text to calling function
  return $html;
}
