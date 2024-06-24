<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'restricted aceess' );

class SppagebuilderAddonUiMap extends SppagebuilderAddons {

	public function render() {
		$settings                 = $this->addon->settings;
		$title_addon              = ( isset( $settings->title_addon ) && $settings->title_addon ) ? $settings->title_addon : '';
		$title_style              = ( isset( $settings->title_heading_style ) && $settings->title_heading_style ) ? ' uk-' . $settings->title_heading_style : '';
		$title_style             .= ( isset( $settings->title_heading_color ) && $settings->title_heading_color ) ? ' uk-' . $settings->title_heading_color : '';
		$title_style             .= ( isset( $settings->title_heading_margin ) && $settings->title_heading_margin ) ? ' ' . $settings->title_heading_margin : '';
		$title_heading_decoration = ( isset( $settings->title_heading_decoration ) && $settings->title_heading_decoration ) ? ' ' . $settings->title_heading_decoration : '';
		$title_heading_selector   = ( isset( $settings->title_heading_selector ) && $settings->title_heading_selector ) ? $settings->title_heading_selector : 'h3';

		$max_width_cfg              = ( isset( $settings->addon_max_width ) && $settings->addon_max_width ) ? ' uk-width-' . $settings->addon_max_width : '';
		$addon_max_width_breakpoint = ( $max_width_cfg ) ? ( ( isset( $settings->addon_max_width_breakpoint ) && $settings->addon_max_width_breakpoint ) ? '@' . $settings->addon_max_width_breakpoint : '' ) : '';

		$block_align            = ( isset( $settings->block_align ) && $settings->block_align ) ? $settings->block_align : '';
		$block_align_breakpoint = ( isset( $settings->block_align_breakpoint ) && $settings->block_align_breakpoint ) ? '@' . $settings->block_align_breakpoint : '';
		$block_align_fallback   = ( isset( $settings->block_align_fallback ) && $settings->block_align_fallback ) ? $settings->block_align_fallback : '';

		// Block Alignment CLS.
		$block_cls[] = '';

		if ( empty( $block_align ) ) {
			if ( ! empty( $block_align_breakpoint ) && ! empty( $block_align_fallback ) ) {
				$block_cls[] = ' uk-margin-auto-right' . $block_align_breakpoint;
				$block_cls[] = 'uk-margin-remove-left' . $block_align_breakpoint . ( $block_align_fallback == 'center' ? ' uk-margin-auto' : ' uk-margin-auto-left' );
			}
		}

		if ( $block_align == 'center' ) {
			$block_cls[] = ' uk-margin-auto' . $block_align_breakpoint;
			if ( ! empty( $block_align_breakpoint ) && ! empty( $block_align_fallback ) ) {
				$block_cls[] = 'uk-margin-auto' . ( $block_align_fallback == 'right' ? '-left' : '' );
			}
		}

		if ( $block_align == 'right' ) {
			$block_cls[] = ' uk-margin-auto-left' . $block_align_breakpoint;
			if ( ! empty( $block_align_breakpoint ) && ! empty( $block_align_fallback ) ) {
				$block_cls[] = $block_align_fallback == 'center' ? 'uk-margin-remove-right' . $block_align_breakpoint . ' uk-margin-auto' : 'uk-margin-auto-left';
			}
		}

		$block_cls = implode( ' ', array_filter( $block_cls ) );

		$max_width_cfg .= $addon_max_width_breakpoint . ( $max_width_cfg ? $block_cls : '' );

		$general      = '';
		$addon_margin = ( isset( $settings->addon_margin ) && $settings->addon_margin ) ? $settings->addon_margin : '';
		$general     .= ( $addon_margin ) ? ' uk-margin' . ( ( $addon_margin == 'default' ) ? '' : '-' . $addon_margin ) : '';
		$general     .= ( isset( $settings->box_shadow ) && $settings->box_shadow ) ? ' ' . $settings->box_shadow : '';
		$general     .= ( isset( $settings->hover_box_shadow ) && $settings->hover_box_shadow ) ? ' ' . $settings->hover_box_shadow : '';
		$general     .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';
		$general     .= ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';

		$powered_by_leaflet = ( isset( $settings->powered_by_leaflet ) && $settings->powered_by_leaflet ) ? 1 : 0;
		$copyright          = '';
		if ( $powered_by_leaflet ) {
			$copyright .= 'attribution: \'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, \' +
	\'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, \' +
	\'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>\',';
		}

		$zoom = ( isset( $settings->map_zoom ) && $settings->map_zoom ) ? $settings->map_zoom : '12';

		$token     = ( isset( $settings->token ) && $settings->token ) ? $settings->token : '';
		$style_url = ( isset( $settings->style_url ) && $settings->style_url ) ? $settings->style_url : '';

		$popup = ( isset( $settings->popup ) && $settings->popup ) ? $settings->popup : '';

		// Parallax Animation.
		$horizontal_start = ( isset( $settings->horizontal_start ) && $settings->horizontal_start ) ? $settings->horizontal_start : '0';
		$horizontal_end   = ( isset( $settings->horizontal_end ) && $settings->horizontal_end ) ? $settings->horizontal_end : '0';
		$horizontal       = ( ! empty( $horizontal_start ) || ! empty( $horizontal_end ) ) ? 'x: ' . $horizontal_start . ',' . $horizontal_end . ';' : '';

		$vertical_start = ( isset( $settings->vertical_start ) && $settings->vertical_start ) ? $settings->vertical_start : '0';
		$vertical_end   = ( isset( $settings->vertical_end ) && $settings->vertical_end ) ? $settings->vertical_end : '0';
		$vertical       = ( ! empty( $vertical_start ) || ! empty( $vertical_end ) ) ? 'y: ' . $vertical_start . ',' . $vertical_end . ';' : '';

		$scale_start = ( isset( $settings->scale_start ) && $settings->scale_start ) ? ( (int) $settings->scale_start / 100 ) : 1;
		$scale_end   = ( isset( $settings->scale_end ) && $settings->scale_end ) ? ( (int) $settings->scale_end / 100 ) : 1;
		$scale       = ( ! empty( $scale_start ) || ! empty( $scale_end ) ) ? 'scale: ' . $scale_start . ',' . $scale_end . ';' : '';

		$rotate_start = ( isset( $settings->rotate_start ) && $settings->rotate_start ) ? $settings->rotate_start : '0';
		$rotate_end   = ( isset( $settings->rotate_end ) && $settings->rotate_end ) ? $settings->rotate_end : '0';
		$rotate       = ( ! empty( $rotate_start ) || ! empty( $rotate_end ) ) ? 'rotate: ' . $rotate_start . ',' . $rotate_end . ';' : '';

		$opacity_start = ( isset( $settings->opacity_start ) && $settings->opacity_start ) ? ( (int) $settings->opacity_start / 100 ) : 1;
		$opacity_end   = ( isset( $settings->opacity_end ) && $settings->opacity_end ) ? ( (int) $settings->opacity_end / 100 ) : 1;
		$opacity       = ( ! empty( $opacity_start ) || ! empty( $opacity_end ) ) ? 'opacity: ' . $opacity_start . ',' . $opacity_end . ';' : '';

		$easing     = ( isset( $settings->easing ) && $settings->easing ) ? ( (int) $settings->easing / 100 ) : '';
		$easing_cls = ( ! empty( $easing ) ) ? 'easing:' . $easing . ';' : '';

		$breakpoint     = ( isset( $settings->breakpoint ) && $settings->breakpoint ) ? $settings->breakpoint : '';
		$breakpoint_cls = ( ! empty( $breakpoint ) ) ? 'media: @' . $breakpoint . ';' : '';

		$viewport     = ( isset( $settings->viewport ) && $settings->viewport ) ? ( (int) $settings->viewport / 100 ) : '';
		$viewport_cls = ( ! empty( $viewport ) ) ? 'viewport:' . $viewport . ';' : '';

		$parallax_target = ( isset( $settings->parallax_target ) && $settings->parallax_target ) ? $settings->parallax_target : false;
		$target_cls      = ( $parallax_target ) ? ' target: !.sppb-section;' : '';

		// Default Animation.

		$animation       = ( isset( $settings->animation ) && $settings->animation ) ? $settings->animation : '';
		$parallax_zindex = ( isset( $settings->parallax_zindex ) && $settings->parallax_zindex ) ? $settings->parallax_zindex : false;
		$zindex_cls      = ( $parallax_zindex && $animation == 'parallax' ) ? ' uk-position-z-index uk-position-relative' : '';

		$animation_repeat = ( $animation ) ? ( ( isset( $settings->animation_repeat ) && $settings->animation_repeat ) ? ' repeat: true;' : '' ) : '';

		if ( $animation == 'parallax' ) {
			$animation = ' uk-parallax="' . $horizontal . $vertical . $scale . $rotate . $opacity . $easing_cls . $viewport_cls . $breakpoint_cls . $target_cls . '"';
		} elseif ( ! empty( $animation ) ) {
			$animation = ' uk-scrollspy="cls: uk-animation-' . $animation . ';' . $animation_repeat . '"';
		}

		$output = '';

		$output .= '<div class="ui-map' . $zindex_cls . $general . $max_width_cfg . '"' . $animation . '>';
		if ( $title_addon ) {
			$output .= '<' . $title_heading_selector . ' class="tz-title' . $title_style . $title_heading_decoration . '">';

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '<span>' : '';

			$output .= nl2br( $title_addon );

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '</span>' : '';

			$output .= '</' . $title_heading_selector . '>';
		}

		$output .= '<div id="mapid-' . $this->addon->id . '"></div>';

		$output .= '<script>';
		if ( isset( $settings->ui_map_item ) && count( (array) $settings->ui_map_item ) ) {
			foreach ( $settings->ui_map_item as $key => $item ) {
				if ( $key == 0 ) {
					$longitude = ( isset( $item->longitude ) && $item->longitude ) ? $item->longitude : '';
					$latitude  = ( isset( $item->latitude ) && $item->latitude ) ? $item->latitude : '';
				}
			}
			$output .= 'var mymap = L.map(\'mapid-' . $this->addon->id . '\',{scrollWheelZoom:false}).setView([' . $latitude . ', ' . $longitude . '], 12);';
		}

		$base_path = JURI::base( true ) . '/plugins/sppagebuilder/jollyany/assets/css/images/';
		$output   .= 'var LeafIcon = L.Icon.extend({
		options: {
			shadowUrl: \'' . $base_path . '/marker-shadow.png\',
			iconSize: [25, 41],
			iconAnchor: [12, 41],
			popupAnchor: [1, -41],
			shadowSize: [41, 41]
		}
	});';

		if ( isset( $settings->ui_map_item ) && count( (array) $settings->ui_map_item ) ) {
			foreach ( $settings->ui_map_item as $key => $item ) {
				$marker      = ( isset( $item->marker ) && $item->marker ) ? $item->marker : '';
				$pop_content = ( isset( $item->pop_content ) && $item->pop_content ) ? $item->pop_content : '';
				if ( ( isset( $item->latlong ) && $item->latlong ) ) {

					if ( empty( $marker ) ) {

						if ( empty( $popup ) ) {
							$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . ']).addTo(mymap);';

							if ( $pop_content ) {
								$output .= 'marker.bindPopup("' . $item->pop_content . '");';
							}
						} else {

							if ( $pop_content ) {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . ']).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							} else {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . ']).addTo(mymap);';
							}

							$output     .= 'marker.on(\'mouseover\', function (e) {';
								$output .= 'this.openPopup();';
								$output .= '});';
								$output .= 'marker.on(\'mouseout\', function (e) {';
								$output .= 'this.closePopup();';
								$output .= '});';

						}
					} elseif ( $marker == 'red' ) {
						$output .= 'var redIcon = new LeafIcon({iconUrl: \'' . $base_path . '/marker-icon-2x-red.png\'});';
						if ( empty( $popup ) ) {
							if ( $pop_content ) {
								$output .= 'L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: redIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							}
						} else {
							if ( $pop_content ) {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: redIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							} else {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: redIcon}).addTo(mymap);';
							}

							$output     .= 'marker.on(\'mouseover\', function (e) {';
								$output .= 'this.openPopup();';
								$output .= '});';
								$output .= 'marker.on(\'mouseout\', function (e) {';
								$output .= 'this.closePopup();';
								$output .= '});';
						}
					} elseif ( $marker == 'green' ) {
						$output .= 'var greenIcon = new LeafIcon({iconUrl: \'' . $base_path . 'marker-icon-2x-green.png\'});';
						if ( empty( $popup ) ) {
							if ( $pop_content ) {
								$output .= 'L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: greenIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							}
						} else {
							if ( $pop_content ) {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: greenIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							} else {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: greenIcon}).addTo(mymap);';
							}
							$output     .= 'marker.on(\'mouseover\', function (e) {';
								$output .= 'this.openPopup();';
								$output .= '});';
								$output .= 'marker.on(\'mouseout\', function (e) {';
								$output .= 'this.closePopup();';
								$output .= '});';
						}
					} elseif ( $marker == 'orange' ) {
						$output .= 'var orangeIcon = new LeafIcon({iconUrl: \'' . $base_path . 'marker-icon-2x-orange.png\'});';
						if ( empty( $popup ) ) {
							if ( $pop_content ) {
								$output .= 'L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: orangeIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							}
						} else {
							if ( $pop_content ) {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: orangeIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							} else {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: orangeIcon}).addTo(mymap);';
							}
							$output     .= 'marker.on(\'mouseover\', function (e) {';
								$output .= 'this.openPopup();';
								$output .= '});';
								$output .= 'marker.on(\'mouseout\', function (e) {';
								$output .= 'this.closePopup();';
								$output .= '});';
						}
					} elseif ( $marker == 'yellow' ) {
						$output .= 'var yellowIcon = new LeafIcon({iconUrl: \'' . $base_path . 'marker-icon-2x-yellow.png\'});';
						if ( empty( $popup ) ) {
							if ( $pop_content ) {
								$output .= 'L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: yellowIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							}
						} else {
							if ( $pop_content ) {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: yellowIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							} else {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: yellowIcon}).addTo(mymap);';
							}
							$output     .= 'marker.on(\'mouseover\', function (e) {';
								$output .= 'this.openPopup();';
								$output .= '});';
								$output .= 'marker.on(\'mouseout\', function (e) {';
								$output .= 'this.closePopup();';
								$output .= '});';
						}
					} elseif ( $marker == 'violet' ) {
						$output .= 'var violetIcon = new LeafIcon({iconUrl: \'' . $base_path . 'marker-icon-2x-violet.png\'});';
						if ( empty( $popup ) ) {
							if ( $pop_content ) {
								$output .= 'L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: violetIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							}
						} else {
							if ( $pop_content ) {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: violetIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							} else {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: violetIcon}).addTo(mymap);';
							}

							$output     .= 'marker.on(\'mouseover\', function (e) {';
								$output .= 'this.openPopup();';
								$output .= '});';
								$output .= 'marker.on(\'mouseout\', function (e) {';
								$output .= 'this.closePopup();';
								$output .= '});';
						}
					} elseif ( $marker == 'grey' ) {
						$output .= 'var greyIcon = new LeafIcon({iconUrl: \'' . $base_path . 'marker-icon-2x-grey.png\'});';
						if ( empty( $popup ) ) {
							if ( $pop_content ) {
								$output .= 'L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: greyIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							}
						} else {
							if ( $pop_content ) {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: greyIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							} else {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: greyIcon}).addTo(mymap);';
							}
							$output     .= 'marker.on(\'mouseover\', function (e) {';
								$output .= 'this.openPopup();';
								$output .= '});';
								$output .= 'marker.on(\'mouseout\', function (e) {';
								$output .= 'this.closePopup();';
								$output .= '});';
						}
					} elseif ( $marker == 'black' ) {
						$output .= 'var blackIcon = new LeafIcon({iconUrl: \'' . $base_path . 'marker-icon-2x-black.png\'});';
						if ( empty( $popup ) ) {
							if ( $pop_content ) {
								$output .= 'L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: blackIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							}
						} else {
							if ( $pop_content ) {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: blackIcon}).bindPopup("' . $item->pop_content . '").addTo(mymap);';
							} else {
								$output .= 'var marker = L.marker([' . $item->latitude . ', ' . $item->longitude . '], {icon: blackIcon}).addTo(mymap);';
							}
							$output     .= 'marker.on(\'mouseover\', function (e) {';
								$output .= 'this.openPopup();';
								$output .= '});';
								$output .= 'marker.on(\'mouseout\', function (e) {';
								$output .= 'this.closePopup();';
								$output .= '});';
						}
					}
				}
			}
		}

		$output .= 'L.tileLayer(\'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}\', {
			maxZoom: ' . $zoom . ',
			' . $copyright . '
			id: \'' . str_replace( 'mapbox://styles/', '', $style_url ) . '\',
			accessToken: \'' . $token . '\'
		}).addTo(mymap);';
		$output .= '</script>';

		$output .= '</div>';

		return $output;
	}

	public function css() {
		$settings = $this->addon->settings;
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$height   = ( isset( $settings->map_height ) && $settings->map_height ) ? 'height: ' . $settings->map_height . 'px;' : '';
		$css      = '';
		$css     .= $addon_id . ' #mapid-' . $this->addon->id . ' {';
		$css     .= $height;
		$css     .= "\n" . '}' . "\n";
		$css     .= '.leaflet-popup-content-wrapper {border-radius: 2px;}';
		return $css;
	}
	public function scripts() {
		return array(
			JURI::base( true ) . '/plugins/sppagebuilder/jollyany/assets/js/leaflet.js',
		);
	}
	public function stylesheets() {
		return array(
			JURI::base( true ) . '/plugins/sppagebuilder/jollyany/assets/css/leaflet.css',
		);
	}
}
