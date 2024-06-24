<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'restricted aceess' );

class SppagebuilderAddonUiImage extends SppagebuilderAddons {

	public function render() {
		$settings = $this->addon->settings;

		$title                    = ( isset( $settings->title ) && $settings->title ) ? $settings->title : '';
		$title_style              = ( isset( $settings->title_heading_style ) && $settings->title_heading_style ) ? ' uk-' . $settings->title_heading_style : '';
		$title_style             .= ( isset( $settings->title_heading_color ) && $settings->title_heading_color ) ? ' uk-' . $settings->title_heading_color : '';
		$title_style             .= ( isset( $settings->title_heading_margin ) && $settings->title_heading_margin ) ? ' ' . $settings->title_heading_margin : '';
		$title_heading_decoration = ( isset( $settings->title_heading_decoration ) && $settings->title_heading_decoration ) ? ' ' . $settings->title_heading_decoration : '';
		$title_heading_selector   = ( isset( $settings->title_heading_selector ) && $settings->title_heading_selector ) ? $settings->title_heading_selector : 'h3';

		$title_position = ( isset( $settings->title_position ) && $settings->title_position ) ? $settings->title_position : 'top';

		// Options.
		$image     = ( isset( $settings->image ) && $settings->image ) ? $settings->image : '';
		$image_src = isset( $image->src ) ? $image->src : $image;
        $image_webp_enable      = ( isset( $settings->image_webp_enable )) ? $settings->image_webp_enable : 0;
        $image_webp             = ( isset( $settings->image_webp ) && $settings->image_webp ) ? $settings->image_webp : '';
        $image_webp_src         = isset( $image_webp->src ) ? $image_webp->src : $image_webp;

		$image_properties   =   false;
		if ( strpos( $image_src, 'http://' ) !== false || strpos( $image_src, 'https://' ) !== false ) {
            $image_properties   =   getimagesize($image_src);
		} elseif ( $image_src ) {
		    if (file_exists(JPATH_BASE . '/' . $image_src)) $image_properties   =   getimagesize(JPATH_BASE . '/' . $image_src);
			$image_src = JURI::base( true ) . '/' . $image_src;
		}
        $data_image_src     =   $image_src;

        if ($image_webp_enable && $image_webp_src) {
            if ( $image_webp_src && (!strpos( $image_webp_src, 'http://' ) !== false && !strpos( $image_webp_src, 'https://' ) !== false )) {
                $image_webp_src = JURI::base( true ) . '/' . $image_webp_src;
            }
            $data_image_src     =   $image_webp_src;
        }

        if ($image_properties && is_array($image_properties) && count($image_properties) > 2) {
            $data_image_src = 'data-src="' . $data_image_src . '" data-origin="'.$image_src.'" data-type="'.$image_properties['mime'].'" data-width="' . $image_properties[0] . '" data-height="' . $image_properties[1] . '" uk-img';
        } else {
            $data_image_src = 'src="' . $data_image_src . '"';
        }
		$alt_text = ( isset( $settings->alt_text ) && $settings->alt_text ) ? $settings->alt_text : '';

		$link_type = ( isset( $settings->link_type ) && $settings->link_type ) ? $settings->link_type : '';

		$link_type_cls = $link_type == 'use_modal' ? ' uk-lightbox="toggle: a[data-type]"' : '';

		$title_link  = ( isset( $settings->title_link ) && $settings->title_link ) ? $settings->title_link : '';
        if (isset($title_link->src)) $title_link = $title_link->src;
		$link_target = ( isset( $settings->link_new_tab ) && $settings->link_new_tab ) ? 'target="_blank"' : '';

		$image_styles  = ( isset( $settings->image_border ) && $settings->image_border ) ? ' ' . $settings->image_border : '';
		$image_styles .= ( isset( $settings->box_shadow ) && $settings->box_shadow ) ? ' ' . $settings->box_shadow : '';
		$image_styles .= ( isset( $settings->hover_box_shadow ) && $settings->hover_box_shadow ) ? ' ' . $settings->hover_box_shadow : '';

		$general      = '';
		$addon_margin = ( isset( $settings->addon_margin ) && $settings->addon_margin ) ? $settings->addon_margin : '';
		$general     .= ( $addon_margin ) ? ' uk-margin' . ( ( $addon_margin == 'default' ) ? '' : '-' . $addon_margin ) : '';
		$general     .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';
		$general     .= ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';

		$image_panel      = ( isset( $settings->image_panel ) && $settings->image_panel ) ? 1 : 0;
		$media_background = ( $image_panel ) ? ( ( isset( $settings->blend_bg_color ) && $settings->blend_bg_color ) ? ' style="background-color: ' . $settings->blend_bg_color . ';"' : '' ) : '';
		$media_blend_mode = ( $image_panel && $media_background ) ? ( ( isset( $settings->image_blend_modes ) && $settings->image_blend_modes ) ? ' ' . $settings->image_blend_modes : '' ) : false;
		$media_overlay    = ( $image_panel ) ? ( ( isset( $settings->media_overlay ) && $settings->media_overlay ) ? '<div class="uk-position-cover" style="background-color: ' . $settings->media_overlay . '"></div>' : '' ) : '';

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

		$image_transition = ( isset( $settings->image_transition ) && $settings->image_transition ) ? ' uk-transition-' . $settings->image_transition . ' uk-transition-opaque' : '';

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

		$image_svg_inline     = ( isset( $settings->image_svg_inline ) && $settings->image_svg_inline ) ? $settings->image_svg_inline : false;
		$image_svg_inline_cls = ( $image_svg_inline ) ? ' uk-svg' : '';
		$image_svg_color      = ( $image_svg_inline ) ? ( ( isset( $settings->image_svg_color ) && $settings->image_svg_color ) ? ' uk-text-' . $settings->image_svg_color : '' ) : false;

		$lightbox_init = ( ! empty( $title_link ) ) ? ' data-type="iframe"' : ' data-type="image"';

		if ( $link_type == 'use_modal' && empty( $title_link ) ) {
			$title_link .= $image_src;
		}

		$output = '';
		if ( $image_src ) {

			$output .= '<div class="ui-addon-image' . $zindex_cls . $general . $max_width_cfg . '"' . $animation . $link_type_cls . '>';

			if ( $title && $title_position == 'top' ) {
				$output .= '<' . $title_heading_selector . ' class="tz-addon-title' . $title_style . $title_heading_decoration . '">';
				if ( $title_heading_decoration == ' uk-heading-line' ) {
					$output .= '<span>';
					$output .= nl2br( $title );
					$output .= '</span>';
				} else {
					$output .= nl2br( $title );
				}
				$output .= '</' . $title_heading_selector . '>';
			}

			$output .= ( $link_type == 'use_modal' && $title_link ) ? '<a href="' . $title_link . '" ' . $lightbox_init . ' data-caption="<h4 class=\'uk-margin-remove\'>' . str_replace( '"', '', $alt_text ) . '</h4>">' : '';

			$output .= ( $link_type == 'use_link' && $title_link ) ? '<a ' . $link_target . ' href="' . $title_link . '">' : '';

			$output .= ( $image_transition ) ? '<div class="uk-inline-clip uk-transition-toggle" tabindex="0"' . $media_background . '>' : '<div' . $media_background . '>';
            $output .= '<picture>';
//            if ($image_webp_enable && $image_webp_src) {
//                $output .= '<source srcset="'.$image_webp_src.'" type="image/webp">';
//            }
//            $output .= '<source srcset="'.$image_src.'" type="'.$image_properties['mime'].'">';
			$output .= '<img class="el-image' . $image_svg_color . $image_transition . $image_styles . $media_blend_mode . '" ' . $data_image_src . ' alt="' . str_replace( '"', '', $alt_text ) . '"' . $image_svg_inline_cls . '>';
			$output .= '</picture>';
			$output .= $media_overlay;
			$output .= ( $image_transition ) ? '</div>' : '</div>';

			$output .= ( $link_type == 'use_link' && $title_link ) ? '</a>' : '';

			$output .= ( $link_type == 'use_modal' && $title_link ) ? '</a>' : '';

			if ( $title && $title_position == 'bottom' ) {
				$output .= '<' . $title_heading_selector . ' class="tz-title' . $title_style . $title_heading_decoration . '">';
				if ( $title_heading_decoration == ' uk-heading-line' ) {
					$output .= '<span>';
					$output .= nl2br( $title );
					$output .= '</span>';
				} else {
					$output .= nl2br( $title );
				}
				$output .= '</' . $title_heading_selector . '>';
			}
			$output .= '</div>';
		}

		return $output;
	}
}
