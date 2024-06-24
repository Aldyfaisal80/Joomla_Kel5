<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'restricted aceess' );

class SppagebuilderAddonUiHeadingHighLighted extends SppagebuilderAddons {

	public function render() {
		$settings     = $this->addon->settings;
		$general      = '';
		$addon_margin = ( isset( $settings->addon_margin ) && $settings->addon_margin ) ? $settings->addon_margin : '';
		$general     .= ( $addon_margin ) ? ' uk-margin' . ( ( $addon_margin == 'default' ) ? '' : '-' . $addon_margin ) : '';
		$general     .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';
		$general     .= ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';

		$title            = ( isset( $settings->title ) && $settings->title ) ? $settings->title : '';
		$heading_selector = ( isset( $settings->heading_selector ) && $settings->heading_selector ) ? $settings->heading_selector : 'h3';
		$before_title     = ( isset( $settings->before_title ) && $settings->before_title ) ? $settings->before_title : '';
		$after_title      = ( isset( $settings->after_title ) && $settings->after_title ) ? $settings->after_title : '';
		$heading_style    = ( isset( $settings->heading_style ) && $settings->heading_style ) ? $settings->heading_style : '';

		$title_style  = ( isset( $settings->title_heading_style ) && $settings->title_heading_style ) ? ' uk-' . $settings->title_heading_style : '';
		$title_style .= ( isset( $settings->title_heading_margin ) && $settings->title_heading_margin ) ? ' uk-margin-' . $settings->title_heading_margin . '-top' : ' uk-margin-top';

		$use_link       = ( isset( $settings->use_link ) && $settings->use_link ) ? $settings->use_link : false;
		$title_link     = ( $use_link ) ? ( ( isset( $settings->title_link ) && $settings->title_link ) ? $settings->title_link : '' ) : false;
        if (isset($title_link->src)) $title_link = $title_link->src;
		$link_target    = ( isset( $settings->link_new_tab ) && $settings->link_new_tab ) ? ' target="' . $settings->link_new_tab . '"' : '';
		$text_transform = ( isset( $settings->text_transform ) && $settings->text_transform ) ? ' uk-text-' . $settings->text_transform : '';

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

		$general .= $text_alignment . $text_breakpoint . $text_alignment_fallback . $max_width_cfg;

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

		if ( ! empty( $title ) ) {

			if ( $heading_style == 'circle' ) {
				$output .= '<' . $heading_selector . ' class="tz-title' . $zindex_cls . $general . $title_style . $text_transform . '"' . $animation . '>';
				$output .= '<span class="heading-highlighted-wrapper">';
				$output .= ( $title_link ) ? '<a class="uk-link-heading"' . $link_target . ' href="' . $title_link . '">' : '';
				$output .= ( $before_title ) ? '<span class="heading-plain-text">' . $before_title . '</span>' : '';
				$output .= '<span class="heading-highlighted-text heading-highlighted-text-active">';
				$output .= nl2br( $title );
				$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M325,18C228.7-8.3,118.5,8.3,78,21C22.4,38.4,4.6,54.6,5.6,77.6c1.4,32.4,52.2,54,142.6,63.7 c66.2,7.1,212.2,7.5,273.5-8.3c64.4-16.6,104.3-57.6,33.8-98.2C386.7-4.9,179.4-1.4,126.3,20.7"></path></svg>';
				$output .= '</span>';
				$output .= ( $after_title ) ? '<span class="heading-plain-text">' . $after_title . '</span>' : '';
				$output .= ( $title_link ) ? '</a>' : '';
				$output .= '</span>';
				$output .= '</' . $heading_selector . '>';
				return $output;
			} elseif ( $heading_style == 'curly-line' ) {
				$output .= '<' . $heading_selector . ' class="tz-title' . $zindex_cls . $general . $title_style . $text_transform . '"' . $animation . '>';
				$output .= '<span class="heading-highlighted-wrapper">';
				$output .= ( $title_link ) ? '<a class="uk-link-heading"' . $link_target . ' href="' . $title_link . '">' : '';
				$output .= ( $before_title ) ? '<span class="heading-plain-text">' . $before_title . '</span>' : '';
				$output .= '<span class="heading-highlighted-text heading-highlighted-text-active">';
				$output .= nl2br( $title );
				$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M3,146.1c17.1-8.8,33.5-17.8,51.4-17.8c15.6,0,17.1,18.1,30.2,18.1c22.9,0,36-18.6,53.9-18.6 c17.1,0,21.3,18.5,37.5,18.5c21.3,0,31.8-18.6,49-18.6c22.1,0,18.8,18.8,36.8,18.8c18.8,0,37.5-18.6,49-18.6c20.4,0,17.1,19,36.8,19 c22.9,0,36.8-20.6,54.7-18.6c17.7,1.4,7.1,19.5,33.5,18.8c17.1,0,47.2-6.5,61.1-15.6"></path></svg>';
				$output .= '</span>';
				$output .= ( $after_title ) ? '<span class="heading-plain-text">' . $after_title . '</span>' : '';
				$output .= ( $title_link ) ? '</a>' : '';
				$output .= '</span>';
				$output .= '</' . $heading_selector . '>';
				return $output;
			} elseif ( $heading_style == 'double' ) {
				$output .= '<' . $heading_selector . ' class="tz-title' . $zindex_cls . $general . $title_style . $text_transform . '"' . $animation . '>';
				$output .= '<span class="heading-highlighted-wrapper">';
				$output .= ( $title_link ) ? '<a class="uk-link-heading"' . $link_target . ' href="' . $title_link . '">' : '';
				$output .= ( $before_title ) ? '<span class="heading-plain-text">' . $before_title . '</span>' : '';
				$output .= '<span class="heading-highlighted-text heading-highlighted-text-active">';
				$output .= nl2br( $title );
				$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M8.4,143.1c14.2-8,97.6-8.8,200.6-9.2c122.3-0.4,287.5,7.2,287.5,7.2"></path><path d="M8,19.4c72.3-5.3,162-7.8,216-7.8c54,0,136.2,0,267,7.8"></path></svg>';
				$output .= '</span>';
				$output .= ( $after_title ) ? '<span class="heading-plain-text">' . $after_title . '</span>' : '';
				$output .= ( $title_link ) ? '</a>' : '';
				$output .= '</span>';
				$output .= '</' . $heading_selector . '>';
				return $output;
			} elseif ( $heading_style == 'double-line' ) {
				$output .= '<' . $heading_selector . ' class="tz-title' . $zindex_cls . $general . $title_style . $text_transform . '"' . $animation . '>';
				$output .= '<span class="heading-highlighted-wrapper">';
				$output .= ( $title_link ) ? '<a class="uk-link-heading"' . $link_target . ' href="' . $title_link . '">' : '';
				$output .= ( $before_title ) ? '<span class="heading-plain-text">' . $before_title . '</span>' : '';
				$output .= '<span class="heading-highlighted-text heading-highlighted-text-active">';
				$output .= nl2br( $title );
				$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M5,125.4c30.5-3.8,137.9-7.6,177.3-7.6c117.2,0,252.2,4.7,312.7,7.6"></path><path d="M26.9,143.8c55.1-6.1,126-6.3,162.2-6.1c46.5,0.2,203.9,3.2,268.9,6.4"></path></svg>';
				$output .= '</span>';
				$output .= ( $after_title ) ? '<span class="heading-plain-text">' . $after_title . '</span>' : '';
				$output .= ( $title_link ) ? '</a>' : '';
				$output .= '</span>';
				$output .= '</' . $heading_selector . '>';
				return $output;
			} elseif ( $heading_style == 'zigzag' ) {
				$output .= '<' . $heading_selector . ' class="tz-title' . $zindex_cls . $general . $title_style . $text_transform . '"' . $animation . '>';
				$output .= '<span class="heading-highlighted-wrapper">';
				$output .= ( $title_link ) ? '<a class="uk-link-heading"' . $link_target . ' href="' . $title_link . '">' : '';
				$output .= ( $before_title ) ? '<span class="heading-plain-text">' . $before_title . '</span>' : '';
				$output .= '<span class="heading-highlighted-text heading-highlighted-text-active">';
				$output .= nl2br( $title );
				$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"></path></svg>';
				$output .= '</span>';
				$output .= ( $after_title ) ? '<span class="heading-plain-text">' . $after_title . '</span>' : '';
				$output .= ( $title_link ) ? '</a>' : '';
				$output .= '</span>';
				$output .= '</' . $heading_selector . '>';
				return $output;
			} elseif ( $heading_style == 'diagonal' ) {
				$output .= '<' . $heading_selector . ' class="tz-title' . $zindex_cls . $general . $title_style . $text_transform . '"' . $animation . '>';
				$output .= '<span class="heading-highlighted-wrapper">';
				$output .= ( $title_link ) ? '<a class="uk-link-heading"' . $link_target . ' href="' . $title_link . '">' : '';
				$output .= ( $before_title ) ? '<span class="heading-plain-text">' . $before_title . '</span>' : '';
				$output .= '<span class="heading-highlighted-text heading-highlighted-text-active">';
				$output .= nl2br( $title );
				$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M13.5,15.5c131,13.7,289.3,55.5,475,125.5"></path></svg>';
				$output .= '</span>';
				$output .= ( $after_title ) ? '<span class="heading-plain-text">' . $after_title . '</span>' : '';
				$output .= ( $title_link ) ? '</a>' : '';
				$output .= '</span>';
				$output .= '</' . $heading_selector . '>';
				return $output;
			} elseif ( $heading_style == 'underline' ) {
				$output .= '<' . $heading_selector . ' class="tz-title' . $zindex_cls . $general . $title_style . $text_transform . '"' . $animation . '>';
				$output .= '<span class="heading-highlighted-wrapper">';
				$output .= ( $title_link ) ? '<a class="uk-link-heading"' . $link_target . ' href="' . $title_link . '">' : '';
				$output .= ( $before_title ) ? '<span class="heading-plain-text">' . $before_title . '</span>' : '';
				$output .= '<span class="heading-highlighted-text heading-highlighted-text-active">';
				$output .= nl2br( $title );
				$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg>';
				$output .= '</span>';
				$output .= ( $after_title ) ? '<span class="heading-plain-text">' . $after_title . '</span>' : '';
				$output .= ( $title_link ) ? '</a>' : '';
				$output .= '</span>';
				$output .= '</' . $heading_selector . '>';
				return $output;
			} elseif ( $heading_style == 'delete' ) {
				$output .= '<' . $heading_selector . ' class="tz-title' . $zindex_cls . $general . $title_style . $text_transform . '"' . $animation . '>';
				$output .= '<span class="heading-highlighted-wrapper">';
				$output .= ( $title_link ) ? '<a class="uk-link-heading"' . $link_target . ' href="' . $title_link . '">' : '';
				$output .= ( $before_title ) ? '<span class="heading-plain-text">' . $before_title . '</span>' : '';
				$output .= '<span class="heading-highlighted-text heading-highlighted-text-active">';
				$output .= nl2br( $title );
				$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M497.4,23.9C301.6,40,155.9,80.6,4,144.4"></path><path d="M14.1,27.6c204.5,20.3,393.8,74,467.3,111.7"></path></svg>';
				$output .= '</span>';
				$output .= ( $after_title ) ? '<span class="heading-plain-text">' . $after_title . '</span>' : '';
				$output .= ( $title_link ) ? '</a>' : '';
				$output .= '</span>';
				$output .= '</' . $heading_selector . '>';
				return $output;
			} elseif ( $heading_style == 'strike' ) {
				$output .= '<' . $heading_selector . ' class="tz-title' . $zindex_cls . $general . $title_style . $text_transform . '"' . $animation . '>';
				$output .= '<span class="heading-highlighted-wrapper">';
				$output .= ( $title_link ) ? '<a class="uk-link-heading"' . $link_target . ' href="' . $title_link . '">' : '';
				$output .= ( $before_title ) ? '<span class="heading-plain-text">' . $before_title . '</span>' : '';
				$output .= '<span class="heading-highlighted-text heading-highlighted-text-active">';
				$output .= nl2br( $title );
				$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M3,75h493.5"></path></svg>';
				$output .= '</span>';
				$output .= ( $after_title ) ? '<span class="heading-plain-text">' . $after_title . '</span>' : '';
				$output .= ( $title_link ) ? '</a>' : '';
				$output .= '</span>';
				$output .= '</' . $heading_selector . '>';
				return $output;
			}
		}

		return $output;
	}

	public function css() {
		$settings    = $this->addon->settings;
		$addon_id    = '#sppb-addon-' . $this->addon->id;
        $title_style = '';
        $title_style .= (isset($settings->title_color) && $settings->title_color) ? 'color:'.$settings->title_color . ';' : '';
        $title_style .= (isset($settings->title_fontsize) && $settings->title_fontsize) ? 'font-size:'.$settings->title_fontsize . 'px;' : '';
        $title_style .= (isset($settings->title_lineheight) && $settings->title_lineheight) ? 'line-height:'.$settings->title_lineheight . 'px;' : '';
        $title_style .= (isset($settings->title_letterspace) && $settings->title_letterspace) ? 'letter-spacing:'.$settings->title_letterspace . ';' : '';
        $title_highlight_color = (isset($settings->title_highlight_color) && $settings->title_highlight_color) ? 'color:'.$settings->title_highlight_color . ';' : '';
		$css         = '';
		$svg         = '';
		if ( $title_style ) {
			$css .= $addon_id . ' .heading-highlighted-wrapper {' . $title_style . '}';
		}
        if ( $title_highlight_color ) {
            $css .= $addon_id . ' .heading-highlighted-text {' . $title_highlight_color . '}';
        }
		$svg .= ( isset( $settings->color ) && $settings->color ) ? ' stroke: ' . $settings->color . ';' : '';
		$svg .= ( isset( $settings->shapes_width ) && $settings->shapes_width ) ? ' stroke-width: ' . $settings->shapes_width . ';' : '';
		if ( $svg ) {
			$css .= "\n";
			$css .= $addon_id . ' .heading-highlighted-wrapper svg path {' . $svg . '}';
			$css .= "\n";
		}
		return $css;
	}
	public function stylesheets() {
		return array(
			JURI::base( true ) . '/plugins/sppagebuilder/jollyany/assets/css/heading-highlighted.css',
		);
	}
}
