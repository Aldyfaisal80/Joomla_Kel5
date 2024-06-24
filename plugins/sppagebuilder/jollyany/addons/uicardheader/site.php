<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'Restricted access' );

class SppagebuilderAddonUiCardHeader extends SppagebuilderAddons {

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
		$general     .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';
		$general     .= ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';

		// Options.

		$avatar_shape = ( isset( $settings->avatar_shape ) && $settings->avatar_shape ) ? $settings->avatar_shape : 'uk-border-circle';

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

		$general .= $text_alignment . $text_breakpoint . $text_alignment_fallback;
		$general .= $max_width_cfg;

		// New option.

		$grid_parallax = ( isset( $settings->parallax ) && $settings->parallax ) ? $settings->parallax : '';
		$parallax      = ( $grid_parallax ) ? 'parallax: ' . $grid_parallax . '' : '';

		$divider = ( isset( $settings->divider ) && $settings->divider ) ? 1 : 0;
		$grid    = ( isset( $settings->grid_column_gap ) && $settings->grid_column_gap ) ? ' uk-grid-column-' . $settings->grid_column_gap : '';
		$grid   .= ( isset( $settings->grid_row_gap ) && $settings->grid_row_gap ) ? ' uk-grid-row-' . $settings->grid_row_gap : '';
		$grid   .= ( isset( $settings->phone_portrait ) && $settings->phone_portrait ) ? ' uk-child-width-1-' . $settings->phone_portrait : '';
		$grid   .= ( isset( $settings->phone_landscape ) && $settings->phone_landscape ) ? ' uk-child-width-1-' . $settings->phone_landscape . '@s' : '';
		$grid   .= ( isset( $settings->tablet_landscape ) && $settings->tablet_landscape ) ? ' uk-child-width-1-' . $settings->tablet_landscape . '@m' : '';
		$grid   .= ( isset( $settings->desktop ) && $settings->desktop ) ? ' uk-child-width-1-' . $settings->desktop . '@l' : '';
		$grid   .= ( isset( $settings->large_screens ) && $settings->large_screens ) ? ' uk-child-width-1-' . $settings->large_screens . '@xl' : '';
		$grid   .= ( $divider ) ? ' uk-grid-divider' : '';

		$card       = ( isset( $settings->card_style ) && $settings->card_style ) ? ' uk-card-' . $settings->card_style : '';
		$card_width = ( isset( $settings->card_width ) && $settings->card_width ) ? ' uk-margin-auto uk-width-' . $settings->card_width : '';
		$card_size  = ( isset( $settings->card_size ) && $settings->card_size ) ? ' ' . $settings->card_size : '';

		$heading_selector = ( isset( $settings->heading_selector ) && $settings->heading_selector ) ? $settings->heading_selector : 'h3';
		$heading_style    = ( isset( $settings->heading_style ) && $settings->heading_style ) ? ' uk-' . $settings->heading_style : '';
		$heading_style   .= ( isset( $settings->title_color ) && $settings->title_color ) ? ' uk-text-' . $settings->title_color : '';
		$heading_style   .= ( isset( $settings->title_margin_top ) && $settings->title_margin_top ) ? ' uk-margin-' . $settings->title_margin_top . '-top' : ' uk-margin-top';
		$title_decoration = ( isset( $settings->title_decoration ) && $settings->title_decoration ) ? ' ' . $settings->title_decoration : '';

		// Meta.

		$meta_style  = ( isset( $settings->meta_style ) && $settings->meta_style ) ? ' uk-' . $settings->meta_style : '';
		$meta_style .= ( isset( $settings->meta_color ) && $settings->meta_color ) ? ' uk-text-' . $settings->meta_color : '';
		$meta_style .= ( isset( $settings->meta_margin_top ) && $settings->meta_margin_top ) ? ' uk-margin-' . $settings->meta_margin_top . '-top' : ' uk-margin-top';

		$meta_alignment = ( isset( $settings->meta_alignment ) && $settings->meta_alignment ) ? $settings->meta_alignment : '';

		// Content.

		$content_style  = ( isset( $settings->content_style ) && $settings->content_style ) ? ' uk-' . $settings->content_style : '';
		$content_style .= ( isset( $settings->content_margin_top ) && $settings->content_margin_top ) ? ' uk-margin-' . $settings->content_margin_top . '-top' : ' uk-margin-top';

		$attribs    = ( isset( $settings->link_new_tab ) && $settings->link_new_tab ) ? ' target="' . $settings->link_new_tab . '"' : '';
		$btn_styles = ( isset( $settings->link_button_style ) && $settings->link_button_style ) ? '' . $settings->link_button_style : '';

		$button_style_cls = '';
		if ( $btn_styles == 'primary' || $btn_styles == 'secondary' || $btn_styles == 'danger' || $btn_styles == 'text' || $btn_styles == 'custom' ) {
			$button_style_cls .= 'uk-button uk-button-' . $btn_styles . '';
		} elseif ( $btn_styles == 'link' || $btn_styles == 'link-muted' || $btn_styles == 'link-text' ) {
			$button_style_cls .= 'uk-' . $btn_styles . '';
		} else {
			$button_style_cls .= 'uk-button uk-button-default';
		}

		$link_button_size = ( isset( $settings->link_button_size ) && $settings->link_button_size ) ? ' ' . $settings->link_button_size : '';
		$btn_margin_top   = ( isset( $settings->button_margin_top ) && $settings->button_margin_top ) ? ' uk-margin-' . $settings->button_margin_top . '-top' : ' uk-margin-top';
		$all_button_title = ( isset( $settings->all_button_title ) && $settings->all_button_title ) ? $settings->all_button_title : 'Learn more';

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

		$viewport        = ( isset( $settings->viewport ) && $settings->viewport ) ? ( (int) $settings->viewport / 100 ) : '';
		$viewport_cls    = ( ! empty( $viewport ) ) ? 'viewport:' . $viewport . ';' : '';
		$parallax_target = ( isset( $settings->parallax_target ) && $settings->parallax_target ) ? $settings->parallax_target : false;
		$target_cls      = ( $parallax_target ) ? ' target: !.sppb-section;' : '';

		// Default Animation.

		$animation       = ( isset( $settings->animation ) && $settings->animation ) ? $settings->animation : '';
		$parallax_zindex = ( isset( $settings->parallax_zindex ) && $settings->parallax_zindex ) ? $settings->parallax_zindex : false;
		$zindex_cls      = ( $parallax_zindex && $animation == 'parallax' ) ? ' uk-position-z-index uk-position-relative' : '';

		$animation_repeat         = ( $animation ) ? ( ( isset( $settings->animation_repeat ) && $settings->animation_repeat ) ? ' repeat: true;' : '' ) : '';
		$delay_element_animations = ( isset( $settings->delay_element_animations ) && $settings->delay_element_animations ) ? $settings->delay_element_animations : '';
		$scrollspy_cls            = ( $delay_element_animations ) ? ' uk-scrollspy-class' : '';
		$scrollspy_target         = ( $delay_element_animations ) ? 'target: [uk-scrollspy-class]; ' : '';
		$animation_delay          = ( $delay_element_animations ) ? ' delay: 200' : '';

		if ( $animation == 'parallax' ) {
			$animation = ' uk-parallax="' . $horizontal . $vertical . $scale . $rotate . $opacity . $easing_cls . $viewport_cls . $breakpoint_cls . $target_cls . '"';
		} elseif ( ! empty( $animation ) ) {
			$animation = ' uk-scrollspy="' . $scrollspy_target . 'cls: uk-animation-' . $animation . ';' . $animation_repeat . $animation_delay . '"';
		}

		$output = '';

		$output .= '<div class="ui-card-header' . $zindex_cls . $general . '">';
		if ( $title_addon ) {
			$output .= '<' . $title_heading_selector . ' class="tz-title' . $title_style . $title_heading_decoration . '">';

			if ( $title_heading_decoration == ' uk-heading-line' ) {
				$output .= '<span>';
				$output .= nl2br( $title_addon );
				$output .= '</span>';
			} else {
				$output .= nl2br( $title_addon );
			}
			$output .= '</' . $title_heading_selector . '>';
		}
		if ( $parallax ) {
			$output .= '<ul class="uk-grid-match ' . $grid . '" uk-grid="' . $parallax . '">';
		} else {
			$output .= '<ul class="uk-grid-match ' . $grid . '" uk-grid ' . $animation . '>';
		}

		foreach ( $settings->ui_cardheader_item as $key => $value ) {
			$message      = ( isset( $value->message ) && $value->message ) ? $value->message : '';
			$button_title = ( isset( $value->button_title ) && $value->button_title ) ? $value->button_title : '';
			$title_link   = ( isset( $value->title_link ) && $value->title_link ) ? $value->title_link : '';
            if (isset($title_link->src)) $title_link = $title_link->src;
			if ( empty( $button_title ) ) {
				$button_title .= $all_button_title;
			}

			$check_target      = ( isset( $settings->link_new_tab ) && $settings->link_new_tab ) ? $settings->link_new_tab : '';
			$check_render_link = '';
			if ( empty( $value->title_link ) || strpos( $value->title_link, '#' ) === 0 ) {
				if ( $check_target != '_blank' ) {
					$check_render_link .= ' uk-scroll';
				}
			}
			$image     = ( isset( $value->avatar ) && $value->avatar ) ? $value->avatar : '';
			$image_src = isset( $image->src ) ? $image->src : $image;
			if ( strpos( $image_src, 'http://' ) !== false || strpos( $image_src, 'https://' ) !== false ) {
				$image_src = $image_src;
			} elseif ( $image_src ) {
				$image_src = JURI::base( true ) . '/' . $image_src;
			}
			$output .= '<li>';

			if ( ! empty( $card ) ) {
				$output .= '<div class="uk-card' . $card . $card_size . $card_width . '"' . $scrollspy_cls . '>';
			} else {
				$output .= '<div class="uk-panel' . $card_width . '"' . $scrollspy_cls . '>';
			}

			$name = ( isset( $value->title ) && $value->title ) ? $value->title : '';

			$company = ( isset( $value->company ) && $value->company ) ? $value->company : '';

			$output .= '<div class="uk-card-header">';

			$output .= '<div class="uk-grid-small uk-flex-middle" uk-grid>';

			$output .= '<div class="uk-width-auto">';
			$output .= $image_src ? '<img src="' . $image_src . '" class="' . $avatar_shape . '" alt="' . $name . '">' : '';
			$output .= '</div>';
			$output .= '<div class="uk-width-expand">';

			if ( $meta_alignment == 'top' && $company ) {
					$output .= '<div class="ui-meta' . $meta_style . '">';
					$output .= $company;
					$output .= '</div>';
			}

			if ( $name ) {
				$output .= '<' . $heading_selector . ' class="ui-title uk-margin-remove-bottom' . $heading_style . $title_decoration . '">';
				if ( $title_decoration == ' uk-heading-line' ) {
					$output .= '<span>';
					$output .= $name;
					$output .= '</span>';
				} else {
					$output .= $name;
				}
				$output .= '</' . $heading_selector . '>';
			}

			if ( $meta_alignment != 'top' && $company ) {
					$output .= '<div class="ui-meta' . $meta_style . '">';
					$output .= $company;
					$output .= '</div>';
			}

			$output .= '</div>';

			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="uk-card-body uk-margin-remove-first-child">';

			if ( $message ) {
				$output .= '<div class="ui-content uk-panel' . $content_style . '">';
				$output .= $message;
				$output .= '</div>';
			}

			$output .= '</div>';

			$output .= ( $title_link ) ? '<div class="uk-card-footer' . $btn_margin_top . '"><a class="' . $button_style_cls . $link_button_size . '" href="' . $title_link . '"' . $attribs . $check_render_link . '>' . $button_title . '</a></div>' : '';

			$output .= '</div>';

			$output .= '</li>';
		}
		$output .= '</ul>';

		$output .= '</div>';

		return $output;
	}

	public function css() {
		$settings = $this->addon->settings;
		$addon_id = '#sppb-addon-' . $this->addon->id;

		$title_color        = ( isset( $settings->title_color ) && $settings->title_color ) ? $settings->title_color : '';
		$custom_title_color = ( isset( $settings->custom_title_color ) && $settings->custom_title_color ) ? 'color: ' . $settings->custom_title_color . ';' : '';
		$meta_color         = ( isset( $settings->meta_color ) && $settings->meta_color ) ? $settings->meta_color : '';
		$custom_meta_color  = ( isset( $settings->custom_meta_color ) && $settings->custom_meta_color ) ? 'color: ' . $settings->custom_meta_color . ';' : '';
		$content_color      = ( isset( $settings->content_color ) && $settings->content_color ) ? 'color: ' . $settings->content_color . ';' : '';

		$link_button_style = ( isset( $settings->link_button_style ) && $settings->link_button_style ) ? $settings->link_button_style : '';
		$button_background = ( isset( $settings->button_background ) && $settings->button_background ) ? 'background-color: ' . $settings->button_background . ';' : '';
		$button_color      = ( isset( $settings->button_color ) && $settings->button_color ) ? 'color: ' . $settings->button_color . ';' : '';

		$button_background_hover = ( isset( $settings->button_background_hover ) && $settings->button_background_hover ) ? 'background-color: ' . $settings->button_background_hover . ';' : '';
		$button_hover_color      = ( isset( $settings->button_hover_color ) && $settings->button_hover_color ) ? 'color: ' . $settings->button_hover_color . ';' : '';

		$avatar_size = ( isset( $settings->avatar_width ) && $settings->avatar_width ) ? $settings->avatar_width : '40';
		$css         = '';

		if ( empty( $title_color ) && $custom_title_color ) {
			$css .= $addon_id . ' .ui-title {' . $custom_title_color . '}';
		}
		if ( empty( $meta_color ) && $custom_meta_color ) {
			$css .= $addon_id . ' .ui-meta {' . $custom_meta_color . '}';
		}
		if ( $content_color ) {
			$css .= $addon_id . ' .ui-content {' . $content_color . '}';
		}

		if ( $link_button_style == 'custom' ) {
			if ( $button_background || $button_color ) {
				$css .= $addon_id . ' .uk-button-custom {' . $button_background . $button_color . '}';
			}
			if ( $button_background_hover || $button_hover_color ) {
				$css .= $addon_id . ' .uk-button-custom:hover, ' . $addon_id . ' .uk-button-custom:focus, ' . $addon_id . ' .uk-button-custom:active {' . $button_background_hover . $button_hover_color . '}';
			}
		}

		$css .= $addon_id . ' .uk-card-header img {width:' . $avatar_size . 'px; height:' . $avatar_size . 'px;}';
		foreach ( $settings->ui_cardheader_item as $key => $value ) {
			$card = ( isset( $settings->card_style ) && $settings->card_style ) ? ' uk-card-' . $settings->card_style : '';
			if ( $card == ' uk-card-primary' ) {
				$css .= '#sppb-addon-' . $this->addon->id . ' .uk-card-primary .uk-card-header { border-bottom: 1px solid rgba(255,255,255,0.125) }
        .uk-card-primary .uk-card-footer { border-top: 1px solid rgba(255,255,255,0.125)}';
			}
			if ( $card == ' uk-card-secondary' ) {
				$css .= '#sppb-addon-' . $this->addon->id . ' .uk-card-secondary .uk-card-header { border-bottom: 1px solid rgba(255,255,255,0.125) }
        .uk-card-secondary .uk-card-footer { border-top: 1px solid rgba(255,255,255,0.125)}';
			}
		}
		return $css;
	}
}
