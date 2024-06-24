<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'Restricted access' );

class SppagebuilderAddonUiCookie extends SppagebuilderAddons {

	public function render() {}
	public function scripts() {
		$app       = JFactory::getApplication();
		$base_path = JURI::base( true ) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/uicookie/assets/js/';
		return array( $base_path . 'cookieconsent.min.js' );
	}
	public function stylesheets() {
		$app       = JFactory::getApplication();
		$base_path = JURI::base( true ) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/uicookie/assets/css/';
		return array( $base_path . 'cookieconsent.min.css' );
	}

	public function js() {
		$settings = $this->addon->settings;
		$target   = ( isset( $settings->target ) && $settings->target ) ? $settings->target : '';
		$message  = ( isset( $settings->message ) && $settings->message ) ? $settings->message : '';
		$dismiss  = ( isset( $settings->dismiss ) && $settings->dismiss ) ? $settings->dismiss : '';
		$link     = ( isset( $settings->link ) && $settings->link ) ? $settings->link : '';
		$position = ( isset( $settings->position ) && $settings->position ) ? $settings->position : 'left';

		$cookie_background        = ( isset( $settings->cookie_background ) && $settings->cookie_background ) ? $settings->cookie_background : '';
		$cookie_button_background = ( isset( $settings->cookie_button_background ) && $settings->cookie_button_background ) ? $settings->cookie_button_background : '';

		if ( $position == 'left' ) {
			$position_class = '
			"position": "bottom-left",';
		}
		if ( $position == 'right' ) {
			$position_class = '
			"position": "bottom-right",';
		}
		if ( $position == 'top' ) {
			$position_class = '
			"position": "top",
  		"static": true,';
		}
		if ( $position == 'bottom' ) {
			$position_class = '';
		}
		$url = ( isset( $settings->url ) && $settings->url ) ? $settings->url : '';
		$js  = 'jQuery(function($){
			window.addEventListener("load", function(){
			window.cookieconsent.initialise({
			  "palette": {
			    "popup": {
			      "background": "' . $cookie_background . '"
			    },
			    "button": {
			      "background": "' . $cookie_button_background . '"
			    }
			  },
			  ' . $position_class . '
			  "content": {
			    "message": "' . $message . '",
			    "dismiss": "' . $dismiss . '",
			    "link": "' . $link . '",
				"href": "' . $url . '",
				target: "' . $target . '",
			  }
			})});
		})';
		return $js;
	}
}
