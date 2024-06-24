<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'restricted aceess' );

class SppagebuilderAddonUiSubnav extends SppagebuilderAddons {

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

		$style = ( isset( $settings->style ) && $settings->style ) ? ' uk-subnav-' . $settings->style : '';

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

		$animation_repeat = ( $animation ) ? ( ( isset( $settings->animation_repeat ) && $settings->animation_repeat ) ? ' repeat: true;' : '' ) : '';

		if ( $animation == 'parallax' ) {
			$animation = ' uk-parallax="' . $horizontal . $vertical . $scale . $rotate . $opacity . $easing_cls . $viewport_cls . $breakpoint_cls . $target_cls . '"';
		} elseif ( ! empty( $animation ) ) {
			$animation = ' uk-scrollspy="cls: uk-animation-' . $animation . ';' . $animation_repeat . '"';
		}

		$output = '';

		$output .= '<div class="ui-subnav' . $zindex_cls . $general . $max_width_cfg . '"' . $animation . '>';
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
		$output .= '<ul class="uk-subnav uk-margin-remove-bottom' . $style . $flex_alignment . '">';

		if ( isset( $settings->ui_subnav_items ) && count( (array) $settings->ui_subnav_items ) ) {
			foreach ( $settings->ui_subnav_items as $key => $item ) {
				$link       = isset( $item->link ) ? $item->link : '';
                if (isset($link->src)) $link = $link->src;
				$target     = ( isset( $item->target ) && $item->target ) ? ' target="' . $item->target . '"' : '';
				$link_title = ( isset( $item->link_title ) && $item->link_title ) ? ' title="' . $item->link_title . '"' : '';
				$title      = isset( $item->title ) ? $item->title : '';
				$output    .= '<li class="ui-item">';
				$output    .= ( $link ) ? '<a class="ui-link" href="' . $link . '"' . $target . '' . $link_title . '>' : '';
				$output    .= $title;
				$output    .= ( $link ) ? '</a>' : '';
				$output    .= '</li>';
			}
		}

		$output .= '</ul>';

		$output .= '</div>';

		return $output;
	}

    public function css() {
        $addon_id = '#sppb-addon-' .$this->addon->id;
        $settings = $this->addon->settings;
        $css        =   '';

        //Title style
        $menu_style = '';
        $menu_style .= (isset($settings->menu_text_color) && $settings->menu_text_color) ? 'color:'.$settings->menu_text_color . ';' : '';
        if (isset($settings->menu_fontsize->md)) $settings->menu_fontsize = $settings->menu_fontsize->md;
        $menu_style .= (isset($settings->menu_fontsize) && $settings->menu_fontsize) ? 'font-size:'.$settings->menu_fontsize . 'px;' : '';
        if (isset($settings->menu_lineheight->md)) $settings->menu_lineheight = $settings->menu_lineheight->md;
        $menu_style .= (isset($settings->menu_lineheight) && $settings->menu_lineheight) ? 'line-height:'.$settings->menu_lineheight . 'px;' : '';
        $menu_style .= (isset($settings->menu_letterspace) && $settings->menu_letterspace) ? 'letter-spacing:'.$settings->menu_letterspace . ';' : '';
        $menu_font_style = (isset($settings->menu_font_style) && $settings->menu_font_style) ? $settings->menu_font_style : '';
        if(isset($menu_font_style->underline) && $menu_font_style->underline){
            $menu_style .= 'text-decoration:underline;';
        }
        if(isset($menu_font_style->italic) && $menu_font_style->italic){
            $menu_style .= 'font-style:italic;';
        }
        if(isset($menu_font_style->uppercase) && $menu_font_style->uppercase){
            $menu_style .= 'text-transform:uppercase;';
        }
        if(isset($menu_font_style->weight) && $menu_font_style->weight){
            $menu_style .= 'font-weight:'.$menu_font_style->weight.';';
        }
        if($menu_style){
            $css .= '#sppb-addon-' . $this->addon->id . ' .ui-item > a{';
            $css .= $menu_style;
            $css .= '}';
        }

        return $css;
    }
}
