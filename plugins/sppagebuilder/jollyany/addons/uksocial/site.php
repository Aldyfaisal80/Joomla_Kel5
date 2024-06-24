<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'restricted aceess' );

class SppagebuilderAddonUKSocial extends SppagebuilderAddons {

	public function render() {
		$settings = $this->addon->settings;

		$title_addon              = ( isset( $settings->title_addon ) && $settings->title_addon ) ? $settings->title_addon : '';
		$title_style              = ( isset( $settings->title_heading_style ) && $settings->title_heading_style ) ? ' uk-' . $settings->title_heading_style : '';
		$title_style             .= ( isset( $settings->title_heading_color ) && $settings->title_heading_color ) ? ' uk-' . $settings->title_heading_color : '';
		$title_style             .= ( isset( $settings->title_heading_margin ) && $settings->title_heading_margin ) ? ' ' . $settings->title_heading_margin : '';
		$title_heading_decoration = ( isset( $settings->title_heading_decoration ) && $settings->title_heading_decoration ) ? ' ' . $settings->title_heading_decoration : '';
		$title_heading_selector   = ( isset( $settings->title_heading_selector ) && $settings->title_heading_selector ) ? $settings->title_heading_selector : 'h3';

		$general      = '';
		$addon_margin = ( isset( $settings->addon_margin ) && $settings->addon_margin ) ? $settings->addon_margin : '';
		$general     .= ( $addon_margin ) ? ' uk-margin' . ( ( $addon_margin == 'default' ) ? '' : '-' . $addon_margin ) : '';

		$general .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';
		$general .= ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';

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

		$text_alignment          = ( isset( $settings->alignment ) && $settings->alignment ) ? ' uk-text-' . $settings->alignment : '';
		$text_breakpoint         = ( $text_alignment ) ? ( ( isset( $settings->alignment_breakpoint ) && $settings->alignment_breakpoint ) ? '@' . $settings->alignment_breakpoint : '' ) : '';
		$text_alignment_fallback = ( $text_alignment && $text_breakpoint ) ? ( ( isset( $settings->alignment_fallback ) && $settings->alignment_fallback ) ? ' uk-text-' . $settings->alignment_fallback : '' ) : '';
		$general                .= $text_alignment . $text_breakpoint . $text_alignment_fallback;

		$flex_alignment            = ( isset( $settings->alignment ) && $settings->alignment ) ? ' uk-flex-' . $settings->alignment : '';
		$flex_alignment_breakpoint = ( $flex_alignment ) ? ( ( isset( $settings->alignment_breakpoint ) && $settings->alignment_breakpoint ) ? '@' . $settings->alignment_breakpoint : '' ) : '';
		$flex_alignment_fallback   = ( $flex_alignment && $flex_alignment_breakpoint ) ? ( ( isset( $settings->alignment_fallback ) && $settings->alignment_fallback ) ? ' uk-flex-' . $settings->alignment_fallback : '' ) : '';
		$flex_alignment           .= $flex_alignment_breakpoint . $flex_alignment_fallback;

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

		$animation = ( isset( $settings->animation ) && $settings->animation ) ? $settings->animation : '';

		$parallax_zindex = ( isset( $settings->parallax_zindex ) && $settings->parallax_zindex ) ? $settings->parallax_zindex : false;
		$zindex_cls      = ( $parallax_zindex && $animation == 'parallax' ) ? ' uk-position-z-index uk-position-relative' : '';

		$animation_repeat   = ( $animation ) ? ( ( isset( $settings->animation_repeat ) && $settings->animation_repeat ) ? ' repeat: true;' : '' ) : '';
        $social_style       = ( isset( $settings->social_style ) && $settings->social_style ) ? $settings->social_style : '';
        $columns_large_desktop              = ( isset( $settings->columns_large_desktop ) && $settings->columns_large_desktop ) ? $settings->columns_large_desktop.'@xl' : 'auto@xl';
        $columns_desktop                    = ( isset( $settings->columns_desktop ) && $settings->columns_desktop ) ? $settings->columns_desktop.'@l' : 'auto@l';
        $columns_laptop                     = ( isset( $settings->columns_laptop ) && $settings->columns_laptop ) ? $settings->columns_laptop.'@m' : 'auto@m';
        $columns_tablet                     = ( isset( $settings->columns_tablet ) && $settings->columns_tablet ) ? $settings->columns_tablet.'@s' : 'auto@s';
        $columns_mobile                     = ( isset( $settings->columns_mobile ) && $settings->columns_mobile ) ? $settings->columns_mobile : 'auto';
		$icons_button       = ( isset( $settings->icons_button ) && $settings->icons_button && $social_style == '' ) ? 1 : 0;
        $target = ( isset( $settings->target ) && $settings->target ) ? ' target="' . $settings->target . '"' : '';

        $style = ( isset( $settings->link_style ) && $settings->link_style  && $social_style == '' ) ? 'uk-' . $settings->link_style : 'uk-icon-link';

        $gutter = ( isset( $settings->gutter ) && $settings->gutter ) ? ' uk-grid-' . $settings->gutter : '';

		$icons_button_cls = ( $icons_button ) ? ' uk-icon-button' : '';

		$icon_size = ( isset( $settings->icon_size ) && $settings->icon_size ) ? '; width: ' . $settings->icon_size . '' : '';
		if ( $animation == 'parallax' ) {
			$animation = ' uk-parallax="' . $horizontal . $vertical . $scale . $rotate . $opacity . $easing_cls . $viewport_cls . $breakpoint_cls . $target_cls . '"';
		} elseif ( ! empty( $animation ) ) {
			$animation = ' uk-scrollspy="cls: uk-animation-' . $animation . ';' . $animation_repeat . '"';
		}

		$output = '';

		$output .= '<div class="uk-social' . ($social_style != '' ? ' '. $social_style : '') . $zindex_cls . $general . $max_width_cfg . '"' . $animation . '>';
		if ( $title_addon ) {
			$output .= '<' . $title_heading_selector . ' class="tz-title' . $title_style . $title_heading_decoration . '">';

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '<span>' : '';

			$output .= nl2br( $title_addon );

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '</span>' : '';

			$output .= '</' . $title_heading_selector . '>';
		}

		$output .= '<div class="uk-child-width-'. $columns_large_desktop . ' uk-child-width-'. $columns_desktop . ' uk-child-width-'. $columns_laptop . ' uk-child-width-'. $columns_tablet . '  uk-child-width-'. $columns_mobile . $gutter . $flex_alignment . '" uk-grid>';

		if ( isset( $settings->uk_subnav_items ) && count( (array) $settings->uk_subnav_items ) ) {
			foreach ( $settings->uk_subnav_items as $key => $item ) {
				$link    = isset( $item->link ) ? $item->link : '';
				$brand   = isset( $item->brand_name ) ? $item->brand_name : '';
				$output .= '<div class="uk-social-item uk-social-item-'.$key.'">';
                if (isset($link->src)) $link = $link->src;
				$output .= ( $link ) ? '<a class="' . $style . $icons_button_cls . '" href="' . $link . '"' . $target . '>' : '';
				$output .= '<span class="uk-grid-item-match" data-uk-icon="icon: ' . $brand . ( $icons_button ? '' : $icon_size ) . '"></span>';
				$output .= $social_style == 'magazine' ? '<span class="uk-social-title uk-grid-item-match">'.$item->title.'</span>' : '';
				$output .= ( $link ) ? '</a>' : '';
				$output .= '</div>';
			}
		}

		$output .= '</div>';

		$output .= '</div>';

		return $output;
	}

    public function css() {
        $settings  = $this->addon->settings;
        $addon_id  = '#sppb-addon-' . $this->addon->id;

        $css = '';
        if ( isset( $settings->uk_subnav_items ) && count( (array) $settings->uk_subnav_items ) ) {
            foreach ( $settings->uk_subnav_items as $key => $item ) {
                $icon_color    = isset( $item->color ) && $item -> color ? $item->color : '';
                $icon_background    = isset( $item->background ) && $item -> background ? $item->background : '';
                if ( $icon_color ) {
                    $css .= $addon_id . ' .uk-social .uk-social-item-'.$key.' > a {color:' . $icon_color . ';}';
                }
                if ( $icon_background ) {
                    $css .= $addon_id . ' .uk-social .uk-social-item-'.$key.' > a {background-color:' . $icon_background . ';}';
                }

                $icon_color_hover         = isset( $item->color_hover ) && $item -> color_hover ? $item->color_hover : '';
                $icon_background_hover    = isset( $item->background_hover ) && $item -> background_hover ? $item->background_hover : '';
                if ( $icon_color_hover ) {
                    $css .= $addon_id . ' .uk-social .uk-social-item-'.$key.' > a:hover {color:' . $icon_color_hover . ';}';
                }
                if ( $icon_background_hover ) {
                    $css .= $addon_id . ' .uk-social .uk-social-item-'.$key.' > a:hover {background-color:' . $icon_background_hover . ';}';
                }
            }
        }

        return $css;
    }
}
