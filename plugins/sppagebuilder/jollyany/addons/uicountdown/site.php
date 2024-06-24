<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'restricted aceess' );

class SppagebuilderAddonUiCountdown extends SppagebuilderAddons {

    public function render() {
        $settings = $this->addon->settings;

        $title_addon              = ( isset( $settings->title_addon ) && $settings->title_addon ) ? $settings->title_addon : '';
        $title_style              = ( isset( $settings->title_heading_style ) && $settings->title_heading_style ) ? ' uk-' . $settings->title_heading_style : '';
        $title_style             .= ( isset( $settings->title_heading_color ) && $settings->title_heading_color ) ? ' uk-' . $settings->title_heading_color : '';
        $title_style             .= ( isset( $settings->title_heading_margin ) && $settings->title_heading_margin ) ? ' ' . $settings->title_heading_margin : '';
        $title_heading_decoration = ( isset( $settings->title_heading_decoration ) && $settings->title_heading_decoration ) ? ' ' . $settings->title_heading_decoration : '';
        $title_heading_selector   = ( isset( $settings->title_heading_selector ) && $settings->title_heading_selector ) ? $settings->title_heading_selector : 'h3';

        $general         = '';
        $addon_margin    = ( isset( $settings->addon_margin ) && $settings->addon_margin ) ? $settings->addon_margin : '';
        $general        .= ( $addon_margin ) ? ' uk-margin' . ( ( $addon_margin == 'default' ) ? '' : '-' . $addon_margin ) : '';
        $general        .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';
        $general        .= ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';
        $grid            = '';
        $grid_column_gap = ( isset( $settings->grid_column_gap ) && $settings->grid_column_gap ) ? $settings->grid_column_gap : '';
        $grid_row_gap    = ( isset( $settings->grid_row_gap ) && $settings->grid_row_gap ) ? $settings->grid_row_gap : '';

        if ( $grid_column_gap == $grid_row_gap ) {
            $grid .= ( ! empty( $grid_column_gap ) && ! empty( $grid_row_gap ) ) ? ' uk-grid-' . $grid_column_gap : '';
        } else {
            $grid .= ! empty( $grid_column_gap ) ? ' uk-grid-column-' . $grid_column_gap : '';
            $grid .= ! empty( $grid_row_gap ) ? ' uk-grid-row-' . $grid_row_gap : '';
        }

        $separators = ( isset( $settings->separators ) && $settings->separators ) ? 1 : 0;
        $show_label = ( isset( $settings->show_label ) && $settings->show_label ) ? 1 : 0;

        $label_content_style  = ( isset( $settings->label_content_style ) && $settings->label_content_style ) ? ' uk-' . $settings->label_content_style : '';
        $label_content_style .= ( isset( $settings->label_transform ) && $settings->label_transform ) ? ' ' . $settings->label_transform : '';
        $label_content_style .= ( isset( $settings->title_margin_top ) && $settings->title_margin_top ) ? ' uk-margin-' . $settings->title_margin_top . '-top' : ' uk-margin-top';

        $number_color         = ( isset( $settings->number_color ) && $settings->number_color ) ? ' ' . $settings->number_color : '';
        $number_content_style = ( isset( $settings->number_content_style ) && $settings->number_content_style ) ? ' uk-' . $settings->number_content_style : '';

        $date = ( isset( $settings->date ) && $settings->date ) ? $settings->date : '';

        $days    = ( isset( $settings->days ) && $settings->days ) ? $settings->days : '';
        $hours   = ( isset( $settings->hours ) && $settings->hours ) ? $settings->hours : '';
        $minutes = ( isset( $settings->minutes ) && $settings->minutes ) ? $settings->minutes : '';
        $seconds = ( isset( $settings->seconds ) && $settings->seconds ) ? $settings->seconds : '';

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

        $text_alignment          = ( isset( $settings->alignment ) && $settings->alignment ) ? ' uk-flex-' . $settings->alignment : '';
        $text_breakpoint         = ( $text_alignment ) ? ( ( isset( $settings->text_breakpoint ) && $settings->text_breakpoint ) ? '@' . $settings->text_breakpoint : '' ) : '';
        $text_alignment_fallback = ( $text_alignment && $text_breakpoint ) ? ( ( isset( $settings->text_alignment_fallback ) && $settings->text_alignment_fallback ) ? ' uk-flex-' . $settings->text_alignment_fallback : '' ) : '';

        $general .= $text_alignment . $text_breakpoint . $text_alignment_fallback;
        $general .= $max_width_cfg;

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

        $animation        = ( isset( $settings->animation ) && $settings->animation ) ? $settings->animation : '';
        $animation_repeat = ( $animation ) ? ( ( isset( $settings->animation_repeat ) && $settings->animation_repeat ) ? ' repeat: true;' : '' ) : '';
        $parallax_zindex  = ( isset( $settings->parallax_zindex ) && $settings->parallax_zindex ) ? $settings->parallax_zindex : false;
        $zindex_cls       = ( $parallax_zindex && $animation == 'parallax' ) ? ' uk-position-z-index uk-position-relative' : '';

        if ( $animation == 'parallax' ) {
            $animation = ' uk-parallax="' . $horizontal . $vertical . $scale . $rotate . $opacity . $easing_cls . $viewport_cls . $breakpoint_cls . $target_cls . '"';
        } elseif ( ! empty( $animation ) ) {
            $animation = ' uk-scrollspy="cls: uk-animation-' . $animation . ';' . $animation_repeat . '"';
        }

        $output = '';

        $output .= '<div class="ui-countdown' . $zindex_cls . $general . '"' . $animation . '>';

        if ( $title_addon ) {
            $output .= '<' . $title_heading_selector . ' class="tz-title' . $title_style . $title_heading_decoration . '">';

            $output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '<span>' : '';

            $output .= nl2br( $title_addon );

            $output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '</span>' : '';

            $output .= '</' . $title_heading_selector . '>';
        }

        if ( ! empty( $date ) ) {

            $output .= '<div class="uk-child-width-auto' . $grid . '" uk-grid uk-countdown="date: ' . $date . '">';

            $output .= '<div>';

            $output .= '<div class="uk-countdown-number uk-countdown-days' . $number_color . $number_content_style . '"></div>';

            $output .= ( $show_label ) ? '<div class="uk-countdown-label uk-text-center uk-visible@s' . $label_content_style . '">' . $days . '</div>' : '';

            $output .= '</div>';

            $output .= ( $separators ) ? '<div class="uk-countdown-separator'.$number_color.'">:</div>' : '';

            $output .= '<div>';

            $output .= ' <div class="uk-countdown-number uk-countdown-hours' . $number_color . $number_content_style . '"></div>';

            $output .= ( $show_label ) ? '<div class="uk-countdown-label uk-text-center uk-visible@s' . $label_content_style . '">' . $hours . '</div>' : '';

            $output .= '</div>';

            $output .= ( $separators ) ? '<div class="uk-countdown-separator'.$number_color.'">:</div>' : '';

            $output .= '<div>';

            $output .= '<div class="uk-countdown-number uk-countdown-minutes' . $number_color . $number_content_style . '"></div>';

            $output .= ( $show_label ) ? '<div class="uk-countdown-label uk-text-center uk-visible@s' . $label_content_style . '">' . $minutes . '</div>' : '';

            $output .= '</div>';

            $output .= ( $separators ) ? '<div class="uk-countdown-separator'.$number_color.'">:</div>' : '';

            $output .= '<div>';

            $output .= '<div class="uk-countdown-number uk-countdown-seconds' . $number_color . $number_content_style . '"></div>';

            $output .= ( $show_label ) ? '<div class="uk-countdown-label uk-text-center uk-visible@s' . $label_content_style . '">' . $seconds . '</div>' : '';

            $output .= '</div>';

            $output .= '</div>';
        }

        $output .= '</div>';

        return $output;
    }
    public function css() {
        $settings = $this->addon->settings;
        $addon_id = '#sppb-addon-' . $this->addon->id;
        // Label.
        $label_style         = '';
        $label_style        .= ( isset( $settings->label_color ) && $settings->label_color ) ? 'color: ' . $settings->label_color . ';' : '';
        $number_color        = ( isset( $settings->number_color ) && $settings->number_color ) ? $settings->number_color : '';
        $custom_number_color = ( isset( $settings->custom_number_color ) && $settings->custom_number_color ) ? 'color: ' . $settings->custom_number_color . ';' : '';
        $custom_separator_color = ( isset( $settings->custom_separator_color ) && $settings->custom_separator_color ) ? 'color: ' . $settings->custom_separator_color . ';' : $custom_number_color;
        $css                 = '';

        if ( empty( $number_color ) && $custom_number_color ) {
            $css .= $addon_id . ' .uk-countdown-number {' . $custom_number_color . '}';
            $css .= $addon_id . ' .uk-countdown-separator {' . $custom_separator_color . '}';
        }

        if ( $label_style ) {
            $css .= $addon_id . ' .uk-countdown-label {';
            $css .= $label_style;
            $css .= '}';
        }

        return $css;
    }
}
