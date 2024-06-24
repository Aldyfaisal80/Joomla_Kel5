<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'Restricted access' );

class SppagebuilderAddonUiIcon extends SppagebuilderAddons {

	public function render() {
		$settings = $this->addon->settings;

		$title_addon              = ( isset( $settings->title_addon ) && $settings->title_addon ) ? $settings->title_addon : '';
		$title_style              = ( isset( $settings->title_heading_style ) && $settings->title_heading_style ) ? ' uk-' . $settings->title_heading_style : '';
		$title_style             .= ( isset( $settings->title_heading_color ) && $settings->title_heading_color ) ? ' uk-' . $settings->title_heading_color : '';
		$title_style             .= ( isset( $settings->title_heading_margin ) && $settings->title_heading_margin ) ? ' ' . $settings->title_heading_margin : '';
		$title_heading_decoration = ( isset( $settings->title_heading_decoration ) && $settings->title_heading_decoration ) ? ' ' . $settings->title_heading_decoration : '';
		$title_heading_selector   = ( isset( $settings->title_heading_selector ) && $settings->title_heading_selector ) ? $settings->title_heading_selector : 'h3';

		$name         = ( isset( $settings->name ) && $settings->name ) ? $settings->name : '';
		$general      = '';
		$addon_margin = ( isset( $settings->addon_margin ) && $settings->addon_margin ) ? $settings->addon_margin : '';
		$general     .= ( $addon_margin ) ? ' uk-margin' . ( ( $addon_margin == 'default' ) ? '' : '-' . $addon_margin ) : '';
		$general     .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';
		$general     .= ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';

		$icon_box = ( isset( $settings->icon_box ) && $settings->icon_box ) ? 1 : 0;

		$icon_box_cls = ( $icon_box ) ? ' uk-icon-button' : '';

		$title_link = ( isset( $settings->title_link ) && $settings->title_link ) ? $settings->title_link : '';
        if (isset($title_link->src)) $title_link = $title_link->src;
		$link_target = ( isset( $settings->link_new_tab ) && $settings->link_new_tab ) ? ' target="' . $settings->link_new_tab . '"' : '';

		$size          = ( isset( $settings->size ) && $settings->size ) ? $settings->size : '1';
		$border_radius = ( isset( $settings->border_radius ) && $settings->border_radius ) ? ' ' . $settings->border_radius : '';

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

		$text_alignment          = ( isset( $settings->alignment ) && $settings->alignment ) ? ' ' . $settings->alignment : '';
		$text_breakpoint         = ( $text_alignment ) ? ( ( isset( $settings->text_breakpoint ) && $settings->text_breakpoint ) ? '@' . $settings->text_breakpoint : '' ) : '';
		$text_alignment_fallback = ( $text_alignment && $text_breakpoint ) ? ( ( isset( $settings->text_alignment_fallback ) && $settings->text_alignment_fallback ) ? ' uk-text-' . $settings->text_alignment_fallback : '' ) : '';
		$general                .= $text_alignment . $text_breakpoint . $text_alignment_fallback;

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

		$icon_size = ( isset( $settings->icon_size ) && $settings->icon_size ) ? '; width: ' . $settings->icon_size . '' : '';

		if ( $name ) {
			$output = '<div class="ui-icon' . $zindex_cls . $general . $max_width_cfg . '"' . $animation . '>';
			if ( $title_addon ) {
				$output .= '<' . $title_heading_selector . ' class="tz-title' . $title_style . $title_heading_decoration . '">';

				$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '<span>' : '';

				$output .= nl2br( $title_addon );

				$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '</span>' : '';

				$output .= '</' . $title_heading_selector . '>';
			}
			$output .= ( $title_link ) ? '<a class="uk-link" href="' . $title_link . '"' . $link_target . '>' : '';

			$output .= '<span class="tz-icon-inner' . $icon_box_cls . $border_radius . '" >';
			$output .= '<span uk-icon="icon: ' . $name . $icon_size . '"></span>';
			$output .= '</span>';
			$output .= ( $title_link ) ? '</a>' : '';
			$output .= '</div>';
			return $output;
		}
	}

	public function css() {
		$settings  = $this->addon->settings;
		$addon_id  = '#sppb-addon-' . $this->addon->id;
		$icon_box  = ( isset( $settings->icon_box ) && $settings->icon_box ) ? 1 : 0;
		$use_hover = ( isset( $settings->use_hover ) && $settings->use_hover ) ? 1 : 0;

		$icon_style  = '';
		$icon_style .= ( isset( $settings->color ) && $settings->color ) ? 'color: ' . $settings->color . ';' : '';
		$icon_style .= ( isset( $settings->background ) && $settings->background ) ? 'background-color: ' . $settings->background . ';' : '';
		$icon_color  = ( isset( $settings->icon_color ) && $settings->icon_color ) ? 'color: ' . $settings->icon_color . ';' : '';
		// Mouse Hover.
		$icon_style_hover = '';

		$icon_style_hover .= ( isset( $settings->hover_color ) && $settings->hover_color ) ? 'color: ' . $settings->hover_color . ';' : '';
		$icon_style_hover .= ( isset( $settings->hover_background ) && $settings->hover_background ) ? 'background-color: ' . $settings->hover_background . ';' : '';

		$css = '';

		if ( $icon_color ) {
			$css .= $addon_id . ' .tz-icon-inner {' . $icon_color . '}';
		}

		if ( $icon_box ) {
			if ( $icon_style ) {
				$css .= $addon_id . ' .tz-icon-inner {';
				$css .= $icon_style;
				$css .= "\n" . '}' . "\n";
			}
		}
		if ( $use_hover ) {
			if ( $icon_style_hover ) {
				$css .= $addon_id . ' .tz-icon-inner:hover {';
				$css .= $icon_style_hover;
				$css .= "\n" . '}' . "\n";
			}
		}
		return $css;
	}
}
