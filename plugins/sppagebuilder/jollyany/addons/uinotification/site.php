<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'Restricted access' );

class SppagebuilderAddonUiNotification extends SppagebuilderAddons {

	public function render() {   }
	public function js() {
		$settings               = $this->addon->settings;
		$notification_positions = ( isset( $settings->notification_positions ) && $settings->notification_positions ) ? $settings->notification_positions : 'top-center';
		$notification_styles    = ( isset( $settings->notification_styles ) && $settings->notification_styles ) ? $settings->notification_styles : '';
		$notification_content   = ( isset( $settings->notification_content ) && $settings->notification_content ) ? $settings->notification_content : '';
		$js                     = 'jQuery(function($){
			UIkit.notification({message: \'' . $notification_content . '\', pos: \'' . $notification_positions . '\', status:\'' . $notification_styles . '\'})
		})';
		return $js;
	}
}
