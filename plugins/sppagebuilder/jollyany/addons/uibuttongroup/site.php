<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'Restricted access' );

class SppagebuilderAddonUiButtonGroup extends SppagebuilderAddons {

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
		$general     .= ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';
		$general     .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';
		$general     .= $max_width_cfg;

		$button_alignment          = ( isset( $settings->alignment ) && $settings->alignment ) ? ' ' . $settings->alignment : '';
		$button_breakpoint         = ( $button_alignment ) ? ( ( isset( $settings->button_breakpoint ) && $settings->button_breakpoint ) ? '@' . $settings->button_breakpoint : '' ) : '';
		$button_alignment_fallback = ( $button_alignment && $button_breakpoint ) ? ( ( isset( $settings->button_alignment_fallback ) && $settings->button_alignment_fallback ) ? ' ' . $settings->button_alignment_fallback : '' ) : '';
		$button_alignment         .= $button_breakpoint . $button_alignment_fallback;

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

		$animation        = ( isset( $settings->animation ) && $settings->animation ) ? $settings->animation : '';
		$animation_repeat = ( $animation ) ? ( ( isset( $settings->animation_repeat ) && $settings->animation_repeat ) ? ' repeat: true;' : '' ) : '';

		$parallax_zindex = ( isset( $settings->parallax_zindex ) && $settings->parallax_zindex ) ? $settings->parallax_zindex : false;
		$zindex_cls      = ( $parallax_zindex && $animation == 'parallax' ) ? ' uk-position-z-index uk-position-relative' : '';

		$delay_element_animations = ( isset( $settings->delay_element_animations ) && $settings->delay_element_animations ) ? $settings->delay_element_animations : '';
		$scrollspy_cls            = ( $delay_element_animations ) ? ' uk-scrollspy-class' : '';
		$scrollspy_target         = ( $delay_element_animations ) ? 'target: [uk-scrollspy-class]; ' : '';
		$animation_delay          = ( $delay_element_animations ) ? ' delay: 200;' : '';

		if ( $animation == 'parallax' ) {
			$animation = ' uk-parallax="' . $horizontal . $vertical . $scale . $rotate . $opacity . $easing_cls . $viewport_cls . $breakpoint_cls . $target_cls . '"';
		} elseif ( ! empty( $animation ) ) {
			$animation = ' uk-scrollspy="' . $scrollspy_target . 'cls: uk-animation-' . $animation . ';' . $animation_repeat . $animation_delay . '"';
		}

		$size = ( isset( $settings->size ) && $settings->size ) ? ' ' . $settings->size : '';

		$font_weight = ( isset( $settings->font_weight ) && $settings->font_weight ) ? ' uk-text-' . $settings->font_weight : '';

		$output = '';

		$output .= '<div class="uikit-addon-button-group uk-flex' . $button_alignment . $zindex_cls . $general . '"' . $animation . '>';
		if ( $title_addon ) {
			$output .= '<' . $title_heading_selector . ' class="tz-title' . $title_style . $title_heading_decoration . '">';

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '<span>' : '';

			$output .= nl2br( $title_addon );

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '</span>' : '';

			$output .= '</' . $title_heading_selector . '>';
		}
		$output .= '<div class="uk-button-group">';

		if ( isset( $settings->ui_button_group_item ) && count( (array) $settings->ui_button_group_item ) ) {
			foreach ( $settings->ui_button_group_item as $key => $value ) {
				if ( ( isset( $value->title ) && $value->title ) || ( isset( $value->icon ) && $value->icon ) ) {
					$link         = ( isset( $value->url ) && $value->url ) ? $value->url : '';
                    if (isset($link->src)) $link = $link->src;
					$button_style = ( isset( $value->button_style ) && $value->button_style ) ? $value->button_style : '';

					$button_style_cls = '';
					if ( empty( $button_style ) ) {
						$button_style_cls .= ' uk-button uk-button-default' . $size;
					} elseif ( $button_style == 'link' || $button_style == 'link-muted' || $button_style == 'link-text' ) {
						$button_style_cls .= ' uk-' . $button_style;
					} else {
						$button_style_cls .= ' uk-button uk-button-' . $button_style . $size;
					}
					$attribs  = ( isset( $value->url ) && $value->url ) ? ' href="' . $value->url . '"' : '';
					$attribs .= ( isset( $value->target ) && $value->target ) ? ' target="' . $value->target . '"' : '';
					$attribs .= ( isset( $value->link_title ) && $value->link_title ) ? ' title="' . $value->link_title . '"' : '';

					$check_target      = ( isset( $value->target ) && $value->target ) ? $value->target : '';
					$render_linkscroll = ( empty( $check_target ) && strpos( $link, '#' ) === 0 ) ? ' uk-scroll' : '';

					$text          = ( isset( $value->title ) && $value->title ) ? $value->title : '';
					$icon          = ( isset( $value->btn_icon ) && $value->btn_icon ) ? $value->btn_icon : '';
					$icon_position = ( isset( $value->icon_position ) && $value->icon_position ) ? $value->icon_position : 'left';
					$icon_arr      = array_filter( explode( ' ', $icon ) );
					if ( count( $icon_arr ) === 1 ) {
						$icon = 'fa ' . $icon;
					}

					if ( $icon_position == 'left' ) {
						$text = ( $icon ) ? '<i class="' . $icon . '" aria-hidden="true"></i> ' . $text : $text;
					} else {
						$text = ( $icon ) ? $text . ' <i class="' . $icon . '" aria-hidden="true"></i>' : $text;
					}

					$output .= '<a class="ui-item-' . $key . $button_style_cls . $font_weight . '"' . $attribs . $render_linkscroll . $scrollspy_cls . '>' . $text . '</a>';
				}
			}
		}
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	public function css() {
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$settings = $this->addon->settings;
		$css      = '';

		// Buttons style
		if ( isset( $settings->ui_button_group_item ) && count( (array) $settings->ui_button_group_item ) ) {
			foreach ( $settings->ui_button_group_item as $key => $value ) {
				$link_button_style = ( isset( $value->button_style ) && $value->button_style ) ? $value->button_style : '';
				$button_background = ( isset( $value->button_background ) && $value->button_background ) ? 'background-color: ' . $value->button_background . ';' : '';
				$button_color      = ( isset( $value->button_color ) && $value->button_color ) ? 'color: ' . $value->button_color . ';' : '';

				$button_background_hover = ( isset( $value->button_background_hover ) && $value->button_background_hover ) ? 'background-color: ' . $value->button_background_hover . ';' : '';
				$button_hover_color      = ( isset( $value->button_hover_color ) && $value->button_hover_color ) ? 'color: ' . $value->button_hover_color . ';' : '';

				if ( $link_button_style == 'custom' ) {
					if ( $button_background || $button_color ) {
						$css .= $addon_id . ' .ui-item-' . $key . '.uk-button-custom {' . $button_background . $button_color . '}';
					}
					if ( $button_background_hover || $button_hover_color ) {
						$css .= $addon_id . ' .ui-item-' . $key . '.uk-button-custom:hover, ' . $addon_id . ' .ui-item-' . $key . '.uk-button-custom:focus, ' . $addon_id . ' .ui-item-' . $key . '.uk-button-custom:active {' . $button_background_hover . $button_hover_color . '}';
					}
				}
			}
		}

		return $css;
	}
}
