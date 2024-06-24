<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'restricted aceess' );

class SppagebuilderAddonUiList extends SppagebuilderAddons {

	public function render() {
		$settings = $this->addon->settings;

		$title_addon              = ( isset( $settings->title ) && $settings->title ) ? $settings->title : '';
		$title_style              = ( isset( $settings->title_heading_style ) && $settings->title_heading_style ) ? ' uk-' . $settings->title_heading_style : '';
		$title_style             .= ( isset( $settings->title_heading_color ) && $settings->title_heading_color ) ? ' uk-' . $settings->title_heading_color : '';
		$title_style             .= ( isset( $settings->title_heading_margin ) && $settings->title_heading_margin ) ? ' ' . $settings->title_heading_margin : '';
		$title_heading_decoration = ( isset( $settings->title_heading_decoration ) && $settings->title_heading_decoration ) ? ' ' . $settings->title_heading_decoration : '';
		$title_heading_selector   = ( isset( $settings->title_heading_selector ) && $settings->title_heading_selector ) ? $settings->title_heading_selector : 'h3';

		$class  = ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';
		$class .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';

		$general      = '';
		$addon_margin = ( isset( $settings->addon_margin ) && $settings->addon_margin ) ? $settings->addon_margin : '';
		$general     .= ( $addon_margin ) ? ' uk-margin' . ( ( $addon_margin == 'default' ) ? '' : '-' . $addon_margin ) : '';

		$list_element = ( isset( $settings->list_element ) && $settings->list_element ) ? $settings->list_element : 'ul';

		$list_style  = ( isset( $settings->list_style ) && $settings->list_style ) ? ' ' . $settings->list_style : '';
		$list_style .= ( isset( $settings->list_marker ) && $settings->list_marker ) ? ' uk-list-' . $settings->list_marker : '';
		$list_style .= ( isset( $settings->list_marker_color ) && $settings->list_marker_color ) ? ' uk-list-' . $settings->list_marker_color : '';
		$list_style .= ( isset( $settings->list_size ) && $settings->list_size ) ? ' uk-list-' . $settings->list_size : '';

		$list_column            = ( isset( $settings->column ) && $settings->column ) ? ' uk-column-' . $settings->column : '';
		$list_column_breakpoint = ( $list_column ) ? ( ( isset( $settings->column_breakpoint ) && $settings->column_breakpoint ) ? '@' . $settings->column_breakpoint : '' ) : '';
		$list_column_divider    = ( $list_column ) ? ( ( isset( $settings->column_divider ) && $settings->column_divider ) ? ' uk-column-divider' : '' ) : '';

		$list_style .= $list_column . $list_column_breakpoint . $list_column_divider;

		$content_style = ( isset( $settings->content_style ) && $settings->content_style ) ? ' uk-' . $settings->content_style : '';

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

		$text_alignment          = ( isset( $settings->text_alignment ) && $settings->text_alignment ) ? ' ' . $settings->text_alignment : '';
		$text_breakpoint         = ( $text_alignment ) ? ( ( isset( $settings->text_breakpoint ) && $settings->text_breakpoint ) ? '@' . $settings->text_breakpoint : '' ) : '';
		$text_alignment_fallback = ( $text_alignment && $text_breakpoint ) ? ( ( isset( $settings->text_alignment_fallback ) && $settings->text_alignment_fallback ) ? ' uk-text-' . $settings->text_alignment_fallback : '' ) : '';
		$general                .= $text_alignment . $text_breakpoint . $text_alignment_fallback;

		$link_style               = ( isset( $settings->link_style ) && $settings->link_style ) ? ' uk-link-' . $settings->link_style : '';
		$image_vertical_alignment = ( isset( $settings->image_vertical_alignment ) && $settings->image_vertical_alignment ) ? 1 : 0;

		$image_styles                 = ( isset( $settings->image_border ) && $settings->image_border ) ? ' uk-border-' . $settings->image_border : '';
		$image_vertical_alignment_cls = ( $image_vertical_alignment ) ? ' uk-flex-middle' : '';

		$image_svg_inline     = ( isset( $settings->image_svg_inline ) && $settings->image_svg_inline ) ? $settings->image_svg_inline : false;
		$image_svg_inline_cls = ( $image_svg_inline ) ? ' uk-svg' : '';
		$image_svg_color      = ( $image_svg_inline ) ? ( ( isset( $settings->image_svg_color ) && $settings->image_svg_color ) ? ' uk-text-' . $settings->image_svg_color : '' ) : false;

		$image_positions     = ( isset( $settings->image_positions ) && $settings->image_positions ) ? $settings->image_positions : '';
		$image_width         = ( isset( $settings->img_width ) && $settings->img_width ) ? ' width="' . $settings->img_width . '"' : '';
		$image_positions_cls = ( ! empty( $image_positions ) ) ? ' uk-flex-last' : '';

		$icon_color = ( isset( $settings->icon_color ) && $settings->icon_color ) ? ' uk-text-' . $settings->icon_color : '';

		$card      = ( isset( $settings->card_style ) && $settings->card_style ) ? ' uk-card-' . $settings->card_style : '';
		$card_size = ( isset( $settings->card_size ) && $settings->card_size ) ? ' uk-card-' . $settings->card_size : '';

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

		$animation_repeat         = ( $animation ) ? ( ( isset( $settings->animation_repeat ) && $settings->animation_repeat ) ? ' repeat: true;' : '' ) : '';
		$delay_element_animations = ( isset( $settings->delay_element_animations ) && $settings->delay_element_animations ) ? $settings->delay_element_animations : '';
		$scrollspy_cls            = ( $delay_element_animations ) ? ' uk-scrollspy-class' : '';
		$scrollspy_target         = ( $delay_element_animations ) ? 'target: [uk-scrollspy-class]; ' : '';
		$animation_delay          = ( $delay_element_animations ) ? ' delay: 200;' : '';

		if ( $animation == 'parallax' ) {
			$animation = ' uk-parallax="' . $horizontal . $vertical . $scale . $rotate . $opacity . $easing_cls . $viewport_cls . $breakpoint_cls . $target_cls . '"';
		} elseif ( ! empty( $animation ) ) {
			$animation = ' uk-scrollspy="' . $scrollspy_target . 'cls: uk-animation-' . $animation . ';' . $animation_repeat . $animation_delay . '"';
		}

		$title_position = ( isset( $settings->title_position ) && $settings->title_position ) ? $settings->title_position : '';
		$uk_icon_size   = ( isset( $settings->faw_icon_size ) && $settings->faw_icon_size ) ? '; width: ' . $settings->faw_icon_size . '' : '';

		$output = '';

		if ( $title_position == 'outside' ) {
			if ( $title_addon ) {
				$output .= '<' . $title_heading_selector . ' class="tz-addon-title' . $title_style . $title_heading_decoration . '">';
				if ( $title_heading_decoration == ' uk-heading-line' ) {
					$output .= '<span>';
					$output .= nl2br( $title_addon );
					$output .= '</span>';
				} else {
					$output .= nl2br( $title_addon );
				}
				$output .= '</' . $title_heading_selector . '>';
			}
		}

		$output .= '<div class="ui-list' . $zindex_cls . $general . $class . $max_width_cfg . '"' . $animation . '>';
		if ( empty( $title_position ) ) {
			if ( $title_addon ) {
				$output .= '<' . $title_heading_selector . ' class="tz-addon-title' . $title_style . $title_heading_decoration . '">';
				if ( $title_heading_decoration == ' uk-heading-line' ) {
					$output .= '<span>';
					$output .= nl2br( $title_addon );
					$output .= '</span>';
				} else {
					$output .= nl2br( $title_addon );
				}
				$output .= '</' . $title_heading_selector . '>';
			}
		}
		if ( ! empty( $card ) ) {
			$output .= '<div class="uk-card uk-card-body' . $card . $card_size . '">';
		} else {
			$output .= '<div class="uk-panel">';
		}

		$output .= '<' . $list_element . ' class="uk-list' . $list_style . '">';

		if ( isset( $settings->sp_uilist_item ) && count( (array) $settings->sp_uilist_item ) ) {
			foreach ( $settings->sp_uilist_item as $key => $item ) {

				$title           = ( isset( $item->title ) && $item->title ) ? $item->title : '';
				$item_icon_color = ( isset( $item->icon_item_color ) && $item->icon_item_color ) ? ' uk-text-' . $item->icon_item_color : '';

				$source    = ( isset( $item->source ) && $item->source ) ? $item->source : '';
				$image     = ( isset( $item->image ) && $item->image ) ? $item->image : '';
				$image_src = isset( $image->src ) ? $image->src : $image;

				if ( strpos( $image_src, 'http://' ) !== false || strpos( $image_src, 'https://' ) !== false ) {
					$image_src = $image_src;
				} elseif ( $image_src ) {
					$image_src = JURI::base( true ) . '/' . $image_src;
				}

				$faw_icon = ( isset( $item->faw_icon ) && $item->faw_icon ) ? $item->faw_icon : '';
				$uk_icon  = ( isset( $item->uikit ) && $item->uikit ) ? $item->uikit : '';

				$icon_arr = array_filter( explode( ' ', $faw_icon ) );
				if ( count( $icon_arr ) === 1 ) {
					$faw_icon = 'fa ' . $faw_icon;
				}

				if ( empty( $item_icon_color ) ) {
					$item_icon_color .= $icon_color;
				}

				$image_alt      = ( isset( $item->image_alt ) && $item->image_alt ) ? $item->image_alt : '';
				$title_alt_text = ( isset( $item->title ) && $item->title ) ? $item->title : '';
				$image_alt_init = '';

				if ( empty( $image_alt ) ) {
					$image_alt_init .= 'alt="' . str_replace( '"', '', $title_alt_text ) . '"';
				} else {
					$image_alt_init .= 'alt="' . str_replace( '"', '', $image_alt ) . '"';
				}

				$link   = isset( $item->link ) ? $item->link : '';
				$target = ( isset( $item->target ) && $item->target ) ? ' target="' . $item->target . '"' : '';

				$render_linkscroll = ( empty( $target ) && strpos( $link, '#' ) === 0 ) ? ' uk-scroll' : '';

				if ( $source === 'fontawesome_icon' ) {
					$media_render = '<div class="tz-custom-icon"><i class="' . $faw_icon . '" aria-hidden="true"></i></div>';
				} elseif ( $source === 'uikit_icon' ) {
					$media_render = '<div class="tz-custom-icon"><span uk-icon="icon: ' . $uk_icon . $uk_icon_size . '"></span></div>';
				} else {
					$media_render = '<img' . $image_width . ' class="ui-img' . $image_styles . $image_svg_color . '" src="' . $image_src . '" ' . $image_alt_init . $image_svg_inline_cls . '>';
				}

				$output .= '<li class="tz-item"' . $scrollspy_cls . '>';

				if ( ! empty( $source ) && ( ! empty( $image_src ) || ! empty( $uk_icon ) || ! empty( $faw_icon ) ) ) {

					$output .= '<div class="uk-grid-small uk-child-width-expand uk-flex-nowrap' . $image_vertical_alignment_cls . '" uk-grid>';
					$output .= '<div class="uk-width-auto' . $image_positions_cls . '">';

					$output .= ( $link ) ? '<a class="uk-link-reset" href="' . $link . '"' . $target . $render_linkscroll . '>' : '';

					$output .= $media_render;

					$output .= ( $link ) ? '</a>' : '';
					$output .= '</div>   ';
					$output .= '<div>';
					if ( $title ) {
						$output .= '<div class="tz-content uk-panel' . $content_style . '">';
						$output .= ( $link ) ? '<a class="ui-link' . $link_style . '" href="' . $link . '"' . $target . $render_linkscroll . '>' : '';
						$output .= $item->title;
						$output .= ( $link ) ? '</a>' : '';
						$output .= '</div>';
					}
					$output .= '</div>';
					$output .= '</div>';
				} else {
					if ( $title ) {
						$output .= '<div class="tz-content uk-panel' . $content_style . '">';
						$output .= ( $link ) ? '<a class="ui-link' . $link_style . '" href="' . $link . '"' . $target . $render_linkscroll . '>' : '';
						$output .= $item->title;
						$output .= ( $link ) ? '</a>' : '';
						$output .= '</div>';
					}
				}

				$output .= '</li>';
			}
		}

		$output .= '</' . $list_element . '>';

		$output .= '</div>';

		$output .= '</div>';

		return $output;
	}
	public function css() {
		$settings          = $this->addon->settings;
		$addon_id          = '#sppb-addon-' . $this->addon->id;
		$icon_size         = ( isset( $settings->faw_icon_size ) && $settings->faw_icon_size ) ? $settings->faw_icon_size : '';
		$font_size         = ( isset( $icon_size ) && $icon_size ) ? 'font-size:' . $icon_size . 'px;' : '';
		$icon_color        = ( isset( $settings->icon_color ) && $settings->icon_color ) ? $settings->icon_color : '';
		$custom_icon_color = ( isset( $settings->custom_icon_color ) && $settings->custom_icon_color ) ? 'color: ' . $settings->custom_icon_color . ';' : '';
		$content_color     = ( isset( $settings->content_color ) && $settings->content_color ) ? 'color: ' . $settings->content_color . ';' : '';

		$css = '';
		if ( empty( $icon_color ) && $custom_icon_color ) {
			$css .= $addon_id . ' .tz-custom-icon > i, ' . $addon_id . ' .tz-custom-icon > span {' . $custom_icon_color . '}';
		}
		if ( $content_color ) {
			$css .= $addon_id . ' .uk-list li, ' . $addon_id . ' .uk-list li a {' . $content_color . '}';
		}
		if ( $font_size ) {
			$css .= $addon_id . ' .tz-custom-icon > i {';
			$css .= $font_size;
			$css .= '}';
		}
		return $css;
	}
}
