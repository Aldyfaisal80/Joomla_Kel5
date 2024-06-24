<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'restricted aceess' );

class SppagebuilderAddonUiTestimonial extends SppagebuilderAddons {

	public function render() {
		$settings                 = $this->addon->settings;
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

		$card                  = ( isset( $settings->card_style ) && $settings->card_style ) ? $settings->card_style : '';
		$card_size             = ( isset( $settings->card_size ) && $settings->card_size ) ? ' ' . $settings->card_size : '';
		$panel_content_padding = ( isset( $settings->card_content_padding ) && $settings->card_content_padding ) ? $settings->card_content_padding : '';

		$card_content_padding = ( $panel_content_padding && empty( $card ) ) ? 'uk-padding' . ( ( $panel_content_padding == 'default' ) ? ' uk-margin-remove-first-child' : '-' . $panel_content_padding . ' uk-margin-remove-first-child' ) : '';

		// Options.

		$message       = ( isset( $settings->message ) && $settings->message ) ? $settings->message : '';
		$client_review = ( isset( $settings->client_review ) && $settings->client_review ) ? $settings->client_review : '';
		$name          = ( isset( $settings->name ) && $settings->name ) ? $settings->name : '';
		$company       = ( isset( $settings->company ) && $settings->company ) ? $settings->company : '';
		$avatar        = ( isset( $settings->avatar ) && $settings->avatar ) ? $settings->avatar : '';
		$image_src     = isset( $avatar->src ) ? $avatar->src : $avatar;
		if ( strpos( $image_src, 'http://' ) !== false || strpos( $image_src, 'https://' ) !== false ) {
			$image_src = $image_src;
		} elseif ( $image_src ) {
			$image_src = JURI::base( true ) . '/' . $image_src;
		}
		$alt_text     = ( isset( $settings->alt_text ) && $settings->alt_text ) ? $settings->alt_text : '';
		$avatar_shape = ( isset( $settings->avatar_shape ) && $settings->avatar_shape ) ? ' ' . $settings->avatar_shape : '';
		$link         = ( isset( $settings->link ) && $settings->link ) ? $settings->link : '';
        if (isset($link->src)) $link = $link->src;
		$link_target  = ( isset( $settings->link_target ) && $settings->link_target ) ? ' target="' . $settings->link_target . '"' : '';

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

		$text_alignment          = ( isset( $settings->text_alignment ) && $settings->text_alignment ) ? ' uk-text-' . $settings->text_alignment : '';
		$text_breakpoint         = ( $text_alignment ) ? ( ( isset( $settings->text_breakpoint ) && $settings->text_breakpoint ) ? '@' . $settings->text_breakpoint : '' ) : '';
		$text_alignment_fallback = ( $text_alignment && $text_breakpoint ) ? ( ( isset( $settings->text_alignment_fallback ) && $settings->text_alignment_fallback ) ? ' uk-text-' . $settings->text_alignment_fallback : '' ) : '';
		$general                .= $text_alignment . $text_breakpoint . $text_alignment_fallback;

		$head_alignment          = ( isset( $settings->text_alignment ) && $settings->text_alignment ) ? ' uk-flex-' . $settings->text_alignment : '';
		$head_breakpoint         = ( $head_alignment ) ? ( ( isset( $settings->head_breakpoint ) && $settings->head_breakpoint ) ? '@' . $settings->head_breakpoint : '' ) : '';
		$head_alignment_fallback = ( $head_alignment && $head_breakpoint ) ? ( ( isset( $settings->head_alignment_fallback ) && $settings->head_alignment_fallback ) ? ' uk-flex-' . $settings->head_alignment_fallback : '' ) : '';
		$head_alignment         .= $head_breakpoint . $head_alignment_fallback;

		$header_alignment   = ( isset( $settings->header_alignment ) && $settings->header_alignment ) ? $settings->header_alignment : '';
		$vertical_alignment = ( isset( $settings->vertical_alignment ) && $settings->vertical_alignment ) ? 1 : 0;

		$vertical_alignment_cls = ( $vertical_alignment ) ? ' uk-flex-middle' : '';
		$image_grid_column_gap  = ( isset( $settings->image_grid_column_gap ) && $settings->image_grid_column_gap ) ? ' uk-grid-column-' . $settings->image_grid_column_gap : '';

		$heading_style    = ( isset( $settings->title_style ) && $settings->title_style ) ? ' uk-' . $settings->title_style : '';
		$heading_style   .= ( isset( $settings->title_text_transform ) && $settings->title_text_transform ) ? ' uk-text-' . $settings->title_text_transform : '';
		$heading_style   .= ( isset( $settings->title_text_color ) && $settings->title_text_color ) ? ' uk-text-' . $settings->title_text_color : '';
		$heading_style   .= ( isset( $settings->title_margin_top ) && $settings->title_margin_top ) ? ' uk-margin-' . $settings->title_margin_top . '-top' : ' uk-margin-top';
		$heading_selector = ( isset( $settings->heading_selector ) && $settings->heading_selector ) ? $settings->heading_selector : 'h3';

		$heading_style_cls      = ( isset( $settings->title_style ) && $settings->title_style ) ? ' uk-' . $settings->title_style : '';
		$heading_style_cls_init = ( empty( $heading_style_cls ) ) ? ' uk-card-title' : '';

		// Meta
		$meta_element   = ( isset( $settings->meta_element ) && $settings->meta_element ) ? $settings->meta_element : 'div';
		$meta_style_cls = ( isset( $settings->meta_style ) && $settings->meta_style ) ? $settings->meta_style : '';

		$meta_style  = ( isset( $settings->meta_style ) && $settings->meta_style ) ? ' uk-' . $settings->meta_style : '';
		$meta_style .= ( isset( $settings->meta_font_weight ) && $settings->meta_font_weight ) ? ' uk-text-' . $settings->meta_font_weight : '';
		$meta_style .= ( isset( $settings->meta_text_color ) && $settings->meta_text_color ) ? ' uk-text-' . $settings->meta_text_color : '';
		$meta_style .= ( isset( $settings->meta_text_transform ) && $settings->meta_text_transform ) ? ' uk-text-' . $settings->meta_text_transform : '';
		$meta_style .= ( isset( $settings->meta_margin_top ) && $settings->meta_margin_top ) ? ' uk-margin-' . $settings->meta_margin_top . '-top' : ' uk-margin-top';

		// Remove margin for heading element
		if ( $meta_element != 'div' || ( $meta_style_cls && $meta_style_cls != 'text-meta' ) ) {
			$meta_style .= ' uk-margin-remove-bottom';
		}

		// Content
		$content_style             = ( isset( $settings->content_style ) && $settings->content_style ) ? ' uk-' . $settings->content_style : '';
		$content_dropcap           = ( isset( $settings->content_dropcap ) && $settings->content_dropcap ) ? 1 : 0;
		$content_style            .= ( $content_dropcap ) ? ' uk-dropcap' : '';
		$content_style            .= ( isset( $settings->content_text_transform ) && $settings->content_text_transform ) ? ' uk-text-' . $settings->content_text_transform : '';
		$content_column            = ( isset( $settings->content_column ) && $settings->content_column ) ? ' uk-column-' . $settings->content_column : '';
		$content_column_breakpoint = ( $content_column ) ? ( ( isset( $settings->content_column_breakpoint ) && $settings->content_column_breakpoint ) ? '@' . $settings->content_column_breakpoint : '' ) : '';
		$content_column_divider    = ( $content_column ) ? ( ( isset( $settings->content_column_divider ) && $settings->content_column_divider ) ? ' uk-column-divider' : false ) : '';

		$content_style .= $content_column . $content_column_breakpoint . $content_column_divider;
		$content_style .= empty( $header_alignment ) ? ( ( isset( $settings->content_margin_top ) && $settings->content_margin_top ) ? ' uk-margin-' . $settings->content_margin_top . '-top' : ' uk-margin-top' ) : '';

		$content_style .= ( isset( $settings->content_margin_top ) && $settings->content_margin_top ) ? ' uk-margin-' . $settings->content_margin_top . '-top' : ' uk-margin-top';

		$image_position = ( isset( $settings->position ) && $settings->position ) ? $settings->position : '';

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

		$rating_alignment = ( isset( $settings->rating_alignment ) && $settings->rating_alignment ) ? $settings->rating_alignment : '';
		$center_cls       = ( $text_alignment == 'center' ) ? ' uk-text-center' : '';

		$img_center_cls = ( $rating_alignment == 'image' && empty( $text_alignment ) ) ? ' uk-text-center' : '';

		$header_margin_top = ( isset( $settings->header_margin_top ) && $settings->header_margin_top ) ? ' uk-margin-' . $settings->header_margin_top : ' uk-margin';
		$image_width       = ( isset( $settings->avatar_width ) && $settings->avatar_width ) ? ' width="' . $settings->avatar_width . '"' : '';

		// New options.

		$image_grid_cls    = ( isset( $settings->image_grid_width ) && $settings->image_grid_width ) ? 'uk-width-' . $settings->image_grid_width : '';
		$image_grid_cls_bp = ( isset( $settings->image_grid_breakpoint ) && $settings->image_grid_breakpoint ) ? '@' . $settings->image_grid_breakpoint : '';
		$cls_class         = ( $image_position == 'right' ) ? ' uk-flex-last' . $image_grid_cls_bp . '' : '';

		$image_svg_inline     = ( isset( $settings->image_svg_inline ) && $settings->image_svg_inline ) ? $settings->image_svg_inline : false;
		$image_svg_inline_cls = ( $image_svg_inline ) ? ' uk-svg' : '';
		$image_svg_color      = ( $image_svg_inline ) ? ( ( isset( $settings->image_svg_color ) && $settings->image_svg_color ) ? ' uk-text-' . $settings->image_svg_color : '' ) : false;

		$check_target      = ( isset( $settings->link_new_tab ) && $settings->link_new_tab ) ? $settings->link_new_tab : '';
		$render_linkscroll = ( empty( $check_target ) && strpos( $link, '#' ) === 0 ) ? ' uk-scroll' : '';

		$image_link       = ( isset( $settings->image_link ) && $settings->image_link ) ? 1 : 0;
		$panel_link       = ( isset( $settings->panel_link ) && $settings->panel_link ) ? 1 : 0;
		$link_title       = ( isset( $settings->link_title ) && $settings->link_title ) ? 1 : 0;
		$link_title_hover = ( isset( $settings->title_hover_style ) && $settings->title_hover_style ) ? ' class="uk-link-' . $settings->title_hover_style . '"' : '';

		$panel_cls  = ( $card ) ? 'uk-card uk-card-' . $card . $card_size . $zindex_cls . $general . $max_width_cfg : 'uk-panel' . $zindex_cls . $general . $max_width_cfg;
		$panel_cls .= ( $card && $card != 'hover' && $panel_link ) ? ' uk-card-hover' : '';
		$panel_cls .= ( $card ) ? ' uk-card-body uk-margin-remove-first-child' : '';

		$panel_cls .= ( empty( $card ) && empty( $panel_content_padding ) ) ? ' uk-margin-remove-first-child' : '';

		$font_weight   = ( isset( $settings->font_weight ) && $settings->font_weight ) ? ' uk-text-' . $settings->font_weight : '';
		$icon_rating   = ( isset( $settings->icon_rating ) && $settings->icon_rating ) ? $settings->icon_rating : '';
		$output        = '';
		$client_rating = '';

		if ( ! empty( $client_review ) ) {
			if ( $client_review == 1 ) {
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="far fa-star" aria-hidden="true"></i>' : '<span class="el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="far fa-star" aria-hidden="true"></i>' : '<span class="el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="far fa-star" aria-hidden="true"></i>' : '<span class="el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="far fa-star" aria-hidden="true"></i>' : '<span class="el-icon" uk-icon="icon: star;"></span>';
			} elseif ( $client_review == 2 ) {
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="far fa-star" aria-hidden="true"></i>' : '<span class="el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="far fa-star" aria-hidden="true"></i>' : '<span class="el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="far fa-star" aria-hidden="true"></i>' : '<span class="el-icon" uk-icon="icon: star;"></span>';
			} elseif ( $client_review == 3 ) {
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="far fa-star" aria-hidden="true"></i>' : '<span class="el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="far fa-star" aria-hidden="true"></i>' : '<span class="el-icon" uk-icon="icon: star;"></span>';
			} elseif ( $client_review == 4 ) {
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="far fa-star" aria-hidden="true"></i>' : '<span class="el-icon" uk-icon="icon: star;"></span>';
			} elseif ( $client_review == 5 ) {
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
				$client_rating .= ( empty( $icon_rating ) ) ? '<i class="voted far fa-star" aria-hidden="true"></i>' : '<span class="voted el-icon" uk-icon="icon: star;"></span>';
			}
		}

		if ( $title_addon ) {
			$output .= '<' . $title_heading_selector . ' class="tz-title' . $title_style . $title_heading_decoration . '">';

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '<span>' : '';

			$output .= nl2br( $title_addon );

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '</span>' : '';

			$output .= '</' . $title_heading_selector . '>';
		}

		if ( $panel_link && $link ) {
			$output .= '<a class="' . $panel_cls . '" href="' . $link . '"' . $link_target . $render_linkscroll . $animation . '>';
		} else {
			$output .= '<div class="' . $panel_cls . '"' . $animation . '>';
		}

		if ( $header_alignment == 'bottom' && $message ) {
			$output .= '<div class="ui-content uk-panel' . $content_style . $header_margin_top . '">';
			$output .= $message;
			$output .= '</div>';
		}

		$output .= ( $card_content_padding ) ? '<div class="' . $card_content_padding . '">' : '';

		if ( empty( $image_position ) || $image_position == 'right' ) {
			$output .= '<div class="uk-child-width-expand' . $head_alignment . $vertical_alignment_cls . $image_grid_column_gap . '" uk-grid>';
		}

		if ( ( empty( $image_position ) || $image_position == 'right' ) && $image_src ) {
			$output .= '<div class="ui-item ' . $image_grid_cls . $image_grid_cls_bp . $cls_class . $img_center_cls . '">';
			if ( $image_link && $link && $panel_link == false ) {
				$output .= '<a class="uk-link-reset" href="' . $link . '"' . $link_target . $render_linkscroll . '>';
			}
			$output .= '<img' . $image_width . ' class="uk-display-inline-block' . $avatar_shape . $image_svg_color . '" src="' . $image_src . '" alt="' . str_replace( '"', '', $alt_text ) . '"' . $image_svg_inline_cls . '>';
			if ( $image_link && $link && $panel_link == false ) {
				$output .= '</a>';
			}
			if ( ! empty( $client_review ) && $rating_alignment == 'image' ) {
				$output .= '<div class="ui-review uk-margin-small-top">';
				$output .= $client_rating;
				$output .= '</div>';
			}
			$output .= '</div>';

		}

			$output .= '<div class="ui-item' . $center_cls . '">';

		if ( $name ) {
			$output .= '<' . $heading_selector . ' class="ui-author uk-margin-remove-bottom' . $heading_style . $heading_style_cls_init . $font_weight . '">';
			if ( $link_title && $link && $panel_link == false ) {
				$output .= '<a' . $link_title_hover . ' href="' . $link . '"' . $link_target . $render_linkscroll . '>';
			}
			$output .= $name;
			if ( $link_title && $link && $panel_link == false ) {
				$output .= '</a>';
			}
			$output .= '</' . $heading_selector . '>';
		}

		if ( $company ) {
			$output .= '<' . $meta_element . ' class="ui-meta' . $meta_style . '">';
			$output .= $company;
			$output .= '</' . $meta_element . '>';
		}

		if ( ! empty( $client_review ) && empty( $image_src ) ) {
			$output .= '<div class="ui-review">';
			$output .= $client_rating;
			$output .= '</div>';
		}

		if ( ! empty( $client_review ) && $rating_alignment != 'image' ) {
			$output .= '<div class="ui-review">';
			$output .= $client_rating;
			$output .= '</div>';
		}

		if ( empty( $image_position ) || $image_position == 'right' ) {
			$output .= '</div>';
		}

			$output .= '</div>';

		if ( empty( $header_alignment ) && $message ) {

			$output .= '<div class="ui-content uk-panel' . $content_style . '">';
			$output .= $message;
			$output .= '</div>';
		}

		$output .= ( $card_content_padding ) ? '</div>' : '';

		if ( $panel_link && $link ) {
			$output .= '</a>';
		} else {
			$output .= '</div>';
		}

		return $output;
	}

	public function css() {
		$addon_id           = '#sppb-addon-' . $this->addon->id;
		$settings           = $this->addon->settings;
		$css                = '';
		$icon_style         = '';
		$card_style         = ( isset( $settings->card_style ) && $settings->card_style ) ? $settings->card_style : '';
		$card_background    = ( isset( $settings->card_background ) && $settings->card_background ) ? 'background-color: ' . $settings->card_background . ';' : '';
		$card_color         = ( isset( $settings->card_color ) && $settings->card_color ) ? 'color: ' . $settings->card_color . ';' : '';
		$title_color        = ( isset( $settings->title_text_color ) && $settings->title_text_color ) ? $settings->title_text_color : '';
		$custom_title_color = ( isset( $settings->custom_title_color ) && $settings->custom_title_color ) ? 'color: ' . $settings->custom_title_color . ';' : '';
		$meta_color         = ( isset( $settings->meta_color ) && $settings->meta_color ) ? $settings->meta_color : '';
		$custom_meta_color  = ( isset( $settings->custom_meta_color ) && $settings->custom_meta_color ) ? 'color: ' . $settings->custom_meta_color . ';' : '';
		$content_color      = ( isset( $settings->content_color ) && $settings->content_color ) ? 'color: ' . $settings->content_color . ';' : '';

		if ( empty( $title_color ) && $custom_title_color ) {
			$css .= $addon_id . ' .ui-author {' . $custom_title_color . '}';
		}
		if ( empty( $meta_color ) && $custom_meta_color ) {
			$css .= $addon_id . ' .ui-meta {' . $custom_meta_color . '}';
		}
		if ( $content_color ) {
			$css .= $addon_id . ' .ui-content, ' . $addon_id . ' .ui-content blockquote {' . $content_color . '}';
		}

		$icon_style .= ( isset( $settings->icon_color ) && $settings->icon_color ) ? 'color: ' . $settings->icon_color . ';' : '';

		if ( $card_style == 'custom' && $card_background ) {
			$css .= $addon_id . ' .uk-card-custom {' . $card_background . '}';
		}
		if ( $card_style == 'custom' && $card_color ) {
				$css .= $addon_id . ' .uk-card-custom.uk-card-body, ' . $addon_id . ' .uk-card-custom .ui-author, ' . $addon_id . ' .uk-card-custom .ui-meta {' . $card_color . '}';
		}
		if ( $icon_style ) {
			$css .= $addon_id . ' .ui-review .voted { ' . $icon_style . ' }';
		}
		return $css;
	}
}
