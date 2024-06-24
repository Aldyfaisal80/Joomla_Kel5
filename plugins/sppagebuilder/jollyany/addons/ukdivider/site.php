<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'restricted aceess' );
use Jollyany\Helper\PageBuilder;
class SppagebuilderAddonUkDivider extends SppagebuilderAddons {

	public function render() {
		$settings       = $this->addon->settings;

		$divider_type   = ( isset( $settings->divider_type ) && $settings->divider_type ) ? $settings->divider_type : '';
		$icon_shape     = ( isset( $settings->icon_shape ) && $settings->icon_shape ) ? $settings->icon_shape : '';
		$html_selector  = ( isset( $settings->html_selector ) && $settings->html_selector ) ? $settings->html_selector : 'hr';
        $icon_class     = '';
        switch ($icon_shape) {
            case 'circle':
                $icon_class = ' uk-border-pill';
                break;
        }

        $general        =   PageBuilder::general_styles($settings);
		$output = '';
		if ( $html_selector == 'div' ) {
			$output .= '<div class="uk-margin-remove-bottom d-flex align-items-center justify-content-center ' . $divider_type . $general['container'] . $general['class'] . '"' . $general['animation'] . '>'.($icon_shape ? '<span class="divider-icon divider-icon-'.$icon_shape.$icon_class.' "></span>' : '').'</div>';
		} else {
			$output .= '<hr class="uk-margin-remove-bottom ' . $divider_type . $general['container'] . $general['class'] . '"' . $general['animation'] . '>';
		}

		return $output;
	}
	public function css() {
		$settings     = $this->addon->settings;
		$addon_id     = '#sppb-addon-' . $this->addon->id;
		$divider      = ( isset( $settings->divider_type ) && $settings->divider_type ) ? $settings->divider_type : '';
		$divider_size = ( isset( $settings->divider_size ) && $settings->divider_size ) ? $settings->divider_size : '';
		$icon_size    = ( isset( $settings->icon_size ) && $settings->icon_size ) ? $settings->icon_size : '';
		$icon_shape   = ( isset( $settings->icon_shape ) && $settings->icon_shape ) ? $settings->icon_shape : '';
		$border_color = ( isset( $settings->border_color ) && $settings->border_color ) ? $settings->border_color : '';
		$border_width = ( isset( $settings->border_width ) && $settings->border_width ) ? $settings->border_width : '1';

		$css = '';
        if ($divider_size) {
            $css .= $addon_id . ' .' . $divider . ' {max-width:'.$divider_size.'px;}';
        }
		if ( ! empty( $border_color ) && $divider != 'uk-divider-icon' ) {
			$css .= $addon_id . ' .' . $divider . ( $divider == 'uk-divider-small' ? '::after' : '' ) . ' { border-' . ( $divider == 'uk-divider-vertical' ? 'left' : 'top' ) . ': ' . $border_width . 'px solid ' . $border_color . ';}';
		}
		if ( empty( $border_color ) && $border_width && $divider != 'uk-divider-icon' ) {
			$css .= $addon_id . ' .' . $divider . ( $divider == 'uk-divider-small' ? '::after' : '' ) . ' { border-' . ( $divider == 'uk-divider-vertical' ? 'left' : 'top' ) . ': ' . $border_width . 'px solid #f1f1f1;}';
		}

        if ($divider == 'uk-divider-icon' && $icon_shape) {
            $css .= $addon_id . ' .' . $divider . ' {background: none;}';
            $css .= $addon_id . ' .' . $divider . ' .divider-icon {background-color:'.($border_color ? $border_color : '#e5e5e5').';width:' . $icon_size . 'px;height:' . $icon_size . 'px;}';
            if ($border_width) {
                $css .= $addon_id . ' .uk-divider-icon::before, '.$addon_id.' .uk-divider-icon::after {border-width:'.$border_width.'px;'. ($border_width > 1 ? 'transform: translateY(-50%);' : '') .'}';
            }
            if ($border_color) {
                $css .= $addon_id . ' .uk-divider-icon::before, '.$addon_id.' .uk-divider-icon::after {border-color:'.$border_color.';}';
            }
        }

		return $css;
	}
}
