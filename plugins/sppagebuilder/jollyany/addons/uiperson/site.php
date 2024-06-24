<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'Restricted access' );

class SppagebuilderAddonUiPerson extends SppagebuilderAddons {

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
		$image     = ( isset( $settings->image ) && $settings->image ) ? $settings->image : '';
		$image_src = isset( $image->src ) ? $image->src : $image;
        $image_properties   =   false;
		if ( strpos( $image_src, 'http://' ) !== false || strpos( $image_src, 'https://' ) !== false ) {
            $image_properties   =   getimagesize($image_src);
			$image_src = $image_src;
		} elseif ( $image_src ) {
            $image_properties   =   getimagesize(JURI::base() . '/' . $image_src);
			$image_src = JURI::base( true ) . '/' . $image_src;
		}

        if (is_array($image_properties) && count($image_properties) > 2) {
            $data_image_src = 'data-src="' . $image_src . '" data-width="' . $image_properties[0] . '" data-height="' . $image_properties[1] . '" uk-img';
        } else {
            $data_image_src = 'src="' . $image_src . '"';
        }

		$name        = ( isset( $settings->name ) && $settings->name ) ? $settings->name : '';
		$designation = ( isset( $settings->designation ) && $settings->designation ) ? $settings->designation : '';
		$email       = ( isset( $settings->email ) && $settings->email ) ? $settings->email : '';
		$introtext   = ( isset( $settings->introtext ) && $settings->introtext ) ? $settings->introtext : '';

		$use_social = ( isset( $settings->use_social ) && $settings->use_social ) ? 1 : 0;

		$facebook  = ( isset( $settings->facebook ) && $settings->facebook ) ? $settings->facebook : '';
        if (isset($facebook->src)) $facebook = $facebook->src;
		$twitter   = ( isset( $settings->twitter ) && $settings->twitter ) ? $settings->twitter : '';
        if (isset($twitter->src)) $twitter = $twitter->src;
		$youtube   = ( isset( $settings->youtube ) && $settings->youtube ) ? $settings->youtube : '';
        if (isset($youtube->src)) $youtube = $youtube->src;
		$linkedin  = ( isset( $settings->linkedin ) && $settings->linkedin ) ? $settings->linkedin : '';
        if (isset($linkedin->src)) $linkedin = $linkedin->src;
		$pinterest = ( isset( $settings->pinterest ) && $settings->pinterest ) ? $settings->pinterest : '';
        if (isset($pinterest->src)) $pinterest = $pinterest->src;
		$flickr    = ( isset( $settings->flickr ) && $settings->flickr ) ? $settings->flickr : '';
        if (isset($flickr->src)) $flickr = $flickr->src;
		$dribbble  = ( isset( $settings->dribbble ) && $settings->dribbble ) ? $settings->dribbble : '';
        if (isset($dribbble->src)) $dribbble = $dribbble->src;
		$behance   = ( isset( $settings->behance ) && $settings->behance ) ? $settings->behance : '';
        if (isset($behance->src)) $behance = $behance->src;
		$instagram = ( isset( $settings->instagram ) && $settings->instagram ) ? $settings->instagram : '';
        if (isset($instagram->src)) $instagram = $instagram->src;

		$social_position = ( isset( $settings->social_position ) && $settings->social_position ) ? $settings->social_position : '';

		$card      = ( isset( $settings->card_styles ) && $settings->card_styles ) ? $settings->card_styles : '';
		$card_size = ( isset( $settings->card_size ) && $settings->card_size ) ? ' uk-card-' . $settings->card_size : '';

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

		// New style options.

		$heading_selector = ( isset( $settings->heading_selector ) && $settings->heading_selector ) ? $settings->heading_selector : 'h3';
		$heading_style    = ( isset( $settings->heading_style ) && $settings->heading_style ) ? ' uk-' . $settings->heading_style : '';
		$heading_style   .= ( isset( $settings->name_color ) && $settings->name_color ) ? ' uk-' . $settings->name_color : '';
		$heading_style   .= ( isset( $settings->title_text_transform ) && $settings->title_text_transform ) ? ' uk-text-' . $settings->title_text_transform : '';
		$heading_style   .= ( isset( $settings->title_margin_top ) && $settings->title_margin_top ) ? ' uk-margin-' . $settings->title_margin_top . '-top' : ' uk-margin-top';
		$title_decoration = ( isset( $settings->title_decoration ) && $settings->title_decoration ) ? ' ' . $settings->title_decoration : '';

		// Meta.
		$meta_element   = ( isset( $settings->meta_element ) && $settings->meta_element ) ? $settings->meta_element : 'div';
		$meta_style_cls = ( isset( $settings->meta_style ) && $settings->meta_style ) ? $settings->meta_style : '';

		$meta_style  = ( isset( $settings->meta_style ) && $settings->meta_style ) ? ' uk-' . $settings->meta_style : '';
		$meta_style .= ( isset( $settings->meta_font_weight ) && $settings->meta_font_weight ) ? ' uk-text-' . $settings->meta_font_weight : '';
		$meta_style .= ( isset( $settings->designation_style ) && $settings->designation_style ) ? ' uk-text-' . $settings->designation_style : '';
		$meta_style .= ( isset( $settings->meta_text_transform ) && $settings->meta_text_transform ) ? ' uk-text-' . $settings->meta_text_transform : '';
		$meta_style .= ( isset( $settings->meta_margin_top ) && $settings->meta_margin_top ) ? ' uk-margin-' . $settings->meta_margin_top . '-top' : ' uk-margin-top';

		$meta_alignment = ( isset( $settings->meta_alignment ) && $settings->meta_alignment ) ? $settings->meta_alignment : '';

		// Remove margin for heading element
		if ( $meta_element != 'div' || ( $meta_style_cls && $meta_style_cls != 'text-meta' ) ) {
			$meta_style .= ' uk-margin-remove-bottom';
		}

		$content_style  = ( isset( $settings->content_style ) && $settings->content_style ) ? ' uk-' . $settings->content_style : '';
		$content_style .= ( isset( $settings->content_text_transform ) && $settings->content_text_transform ) ? ' uk-text-' . $settings->content_text_transform : '';
		$content_style .= ( isset( $settings->content_margin_top ) && $settings->content_margin_top ) ? ' uk-margin-' . $settings->content_margin_top . '-top' : ' uk-margin-top';

		$email_style  = ( isset( $settings->email_class ) && $settings->email_class ) ? ' uk-' . $settings->email_class : '';
		$email_style .= ( isset( $settings->email_style ) && $settings->email_style ) ? ' uk-text-' . $settings->email_style : '';
		$email_style .= ( isset( $settings->email_text_transform ) && $settings->email_text_transform ) ? ' uk-text-' . $settings->email_text_transform : '';
		$email_style .= ( isset( $settings->email_margin_top ) && $settings->email_margin_top ) ? ' uk-margin-' . $settings->email_margin_top . '-top' : ' uk-margin-top';

		$panel_image_padding = ( isset( $settings->image_padding ) && $settings->image_padding ) ? 1 : 0;
		$image_padding       = ( $card ) ? ( ( isset( $settings->image_padding ) && $settings->image_padding ) ? 1 : 0 ) : '';

		$vertical_icons    = ( $social_position == 'overlay' ) && ( isset( $settings->vertical_icons ) && $settings->vertical_icons ) ? ' uk-iconnav-vertical' : '';
		$overlay_alignment = ( isset( $settings->overlay_alignment ) && $settings->overlay_alignment ) ? ' uk-flex-' . $settings->overlay_alignment : '';
		$social_margin_top = ( $social_position != 'overlay' ) ? ( ( isset( $settings->social_margin_top ) && $settings->social_margin_top ) ? ' uk-margin-' . $settings->social_margin_top . '-top' : ' uk-margin-top' ) : '';

		$icons_button         = ( isset( $settings->icons_button ) && $settings->icons_button ) ? 1 : 0;
		$display_icons_button = ( $icons_button ) ? 'uk-icon-button' : 'uk-icon-link';

		$social_icons = '';

		if ( $facebook || $twitter || $youtube || $linkedin || $pinterest || $flickr || $dribbble || $behance || $instagram ) {
			$social_icons .= '<ul class="tz-social-list uk-iconnav uk-text-center' . $vertical_icons . $overlay_alignment . '">';
			$social_icons .= ( $facebook ) ? '<li><a class="' . $display_icons_button . '" target="_blank" rel="noopener noreferrer" href="' . $facebook . '" aria-label="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" title="Facebook"></i></a></li>' : '';
			$social_icons .= ( $twitter ) ? '<li><a class="' . $display_icons_button . '" target="_blank" rel="noopener noreferrer" href="' . $twitter . '" aria-label="Twitter"><i class="fab fa-twitter" aria-hidden="true" title="Twitter"></i></a></li>' : '';
			$social_icons .= ( $youtube ) ? '<li><a class="' . $display_icons_button . '" target="_blank" rel="noopener noreferrer" href="' . $youtube . '" aria-label="YouTube"><i class="fab fa-youtube" aria-hidden="true" title="YouTube"></i></a></li>' : '';
			$social_icons .= ( $linkedin ) ? '<li><a class="' . $display_icons_button . '" target="_blank" rel="noopener noreferrer" href="' . $linkedin . '" aria-label="LinkedIn"><i class="fab fa-linkedin-in" aria-hidden="true" title="LinkedIn"></i></a></li>' : '';
			$social_icons .= ( $pinterest ) ? '<li><a class="' . $display_icons_button . '" target="_blank" rel="noopener noreferrer" href="' . $pinterest . '" aria-label="Pinterest"><i class="fab fa-pinterest" aria-hidden="true" title="Pinterest"></i></a></li>' : '';
			$social_icons .= ( $flickr ) ? '<li><a class="' . $display_icons_button . '" target="_blank" rel="noopener noreferrer" href="' . $flickr . '" aria-label="Flickr"><i class="fab fa-flickr" aria-hidden="true" title="Flickr"></i></a></li>' : '';
			$social_icons .= ( $dribbble ) ? '<li><a class="' . $display_icons_button . '" target="_blank" rel="noopener noreferrer" href="' . $dribbble . '" aria-label="Dribble"><i class="fab fa-dribbble" aria-hidden="true" title="Dribble"></i></a></li>' : '';
			$social_icons .= ( $behance ) ? '<li><a class="' . $display_icons_button . '" target="_blank" rel="noopener noreferrer" href="' . $behance . '" aria-label="Behance"><i class="fab fa-behance" aria-hidden="true" title="Behance"></i></a></li>' : '';
			$social_icons .= ( $instagram ) ? '<li><a class="' . $display_icons_button . '" target="_blank" rel="noopener noreferrer" href="' . $instagram . '" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true" title="Instagram"></i></a></li>' : '';
			$social_icons .= '</ul>';
		}

		$overlay_on_hover = ( isset( $settings->overlay_on_hover ) && $settings->overlay_on_hover ) ? 1 : 0;

		$overlay_styles = ( isset( $settings->overlay_styles ) && $settings->overlay_styles ) ? ' uk-' . $settings->overlay_styles : '';

		$overlay_positions  = ( isset( $settings->overlay_positions ) && $settings->overlay_positions ) ? 'uk-position-' . $settings->overlay_positions : '';
		$overlay_styles_int = ( $overlay_styles ) ? 'uk-overlay' : 'uk-panel';

		$overlay_padding_init = '';
		$overlay_padding      = ( isset( $settings->overlay_padding ) && $settings->overlay_padding ) ? $settings->overlay_padding : '';

		if ( empty( $overlay_styles ) && empty( $overlay_padding ) ) {
			$overlay_padding_init = ' uk-padding';
		} elseif ( empty( $overlay_styles ) && $overlay_padding == 'remove' ) {
			$overlay_padding_init = '';
		} elseif ( ! empty( $overlay_padding ) ) {
			$overlay_padding_init = ' uk-padding-' . $overlay_padding;
		}

		$overlay_margin = ( $overlay_styles ) ? ( ( isset( $settings->overlay_margin ) && $settings->overlay_margin ) ? ' uk-position-' . $settings->overlay_margin : '' ) : '';

		$overlay_transition = ( $overlay_on_hover ) ? ( ( isset( $settings->overlay_transition ) && $settings->overlay_transition ) ? ' uk-transition-' . $settings->overlay_transition : '' ) : false;

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

		$panel_content_padding = ( isset( $settings->card_content_padding ) && $settings->card_content_padding ) ? $settings->card_content_padding : '';
		$card_content_padding  = ( $panel_content_padding && empty( $card ) ) ? 'uk-padding' . ( ( $panel_content_padding == 'default' ) ? ' uk-margin-remove-first-child' : '-' . $panel_content_padding . ' uk-margin-remove-first-child' ) : '';

		$image_border     = ( ! empty( $card ) && $image_padding ) ? false : ( ( isset( $settings->image_styles ) && $settings->image_styles ) ? ' uk-border-' . $settings->image_styles : '' );
		$box_shadow       = ( ! empty( $card ) ) ? false : ( ( isset( $settings->box_shadow ) && $settings->box_shadow ) ? ' uk-box-shadow-' . $settings->box_shadow : '' );
		$hover_box_shadow = ( ! empty( $card ) ) ? false : ( ( isset( $settings->hover_box_shadow ) && $settings->hover_box_shadow ) ? ' uk-box-shadow-hover-' . $settings->hover_box_shadow : '' );
		$image_transition = ( isset( $settings->image_transition ) && $settings->image_transition ) ? ' uk-transition-' . $settings->image_transition . '' : '';

		$image_panel      = ( isset( $settings->image_panel ) && $settings->image_panel ) ? 1 : 0;
		$media_background = ( $image_panel ) ? ( ( isset( $settings->media_background ) && $settings->media_background ) ? ' style="background-color: ' . $settings->media_background . ';"' : '' ) : '';
		$media_blend_mode = ( $image_panel && $media_background ) ? ( ( isset( $settings->media_blend_mode ) && $settings->media_blend_mode ) ? ' uk-blend-' . $settings->media_blend_mode : '' ) : false;
		$media_overlay    = ( $image_panel ) ? ( ( isset( $settings->media_overlay ) && $settings->media_overlay ) ? '<div class="uk-position-cover" style="background-color: ' . $settings->media_overlay . '"></div>' : '' ) : '';

		$image_alt      = ( isset( $settings->name ) && $settings->name ) ? $settings->name : '';
		$image_alt_init = ( ! empty( $image_alt ) ) ? 'alt="' . str_replace( '"', '', $image_alt ) . '"' : '';
		$font_weight    = ( isset( $settings->font_weight ) && $settings->font_weight ) ? ' uk-text-' . $settings->font_weight : '';

		$panel_cls  = ( $card ) ? 'uk-card uk-card-' . $card . $card_size : 'uk-panel';
		$panel_cls .= ( $card && $card != 'hover' ) ? ' uk-card-hover' : '';
		$panel_cls .= ( $card && $panel_image_padding == false ) ? ' uk-card-body uk-margin-remove-first-child' : '';

		$panel_cls .= ( empty( $card ) && empty( $panel_content_padding ) ) ? ' uk-margin-remove-first-child' : '';

		$output = '';

		$output .= '<div class="ui-person' . $zindex_cls . $general . $max_width_cfg . '"' . $animation . '>';

		if ( $title_addon ) {
			$output .= '<' . $title_heading_selector . ' class="tz-title' . $title_style . $title_heading_decoration . '">';

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '<span>' : '';

			$output .= nl2br( $title_addon );

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '</span>' : '';

			$output .= '</' . $title_heading_selector . '>';
		}

		$output .= '<div class="' . $panel_cls . '">';

		$output .= ( $image_padding ) ? '<div class="uk-card-media-top">' : '';

		if ( $image_src ) {

			$output .= ( $image_transition || $overlay_on_hover ) ? '<div class="uk-inline-clip uk-transition-toggle' . $box_shadow . $hover_box_shadow . '" tabindex="0"' . $media_background . '>' : '<div class="uk-inline-clip"' . $media_background . $box_shadow . $hover_box_shadow . '>';

			$output .= ( $image_transition ) ? '<img class="ui-image' . $media_blend_mode . $image_transition . ' uk-transition-opaque" ' . $data_image_src . ' ' . $image_alt_init . '>' : '<img class="ui-image' . $media_blend_mode . $image_border . '" ' . $data_image_src . ' ' . $image_alt_init . '>';
			$output .= $media_overlay;

			if ( $social_position == 'overlay' && $use_social && ! empty( $social_icons ) ) {
				$output .= '<div class="' . $overlay_positions . $overlay_margin . '">';
				$output .= '<div class="' . $overlay_styles_int . $overlay_padding_init . $overlay_transition . $overlay_styles . ' uk-margin-remove-first-child">';
				$output .= $social_icons;
				$output .= '</div>';
				$output .= '</div>';
			}

			$output .= '</div>';
		}

		$output .= ( $image_padding ) ? '</div>' : '';

		$output .= ( $image_padding ) ? '<div class="uk-card-body uk-margin-remove-first-child">' : '';
		$output .= ( $card_content_padding ) ? '<div class="' . $card_content_padding . '">' : '';

		if ( $meta_alignment == 'top' && $designation ) {
			$output .= '<' . $meta_element . ' class="ui-meta' . $meta_style . '">';
			$output .= $designation;
			$output .= '</' . $meta_element . '>';
		}

		if ( $name ) {
			$output .= '<' . $heading_selector . ' class="ui-title uk-margin-remove-bottom' . $heading_style . $title_decoration . $font_weight . '">';
			$output .= ( $title_decoration == ' uk-heading-line' ) ? '<span>' : '';
			$output .= $name;
			$output .= ( $title_decoration == ' uk-heading-line' ) ? '</span>' : '';
			$output .= '</' . $heading_selector . '>';
		}

		if ( empty( $meta_alignment ) && $designation ) {
			$output .= '<' . $meta_element . ' class="ui-meta' . $meta_style . '">';
			$output .= $designation;
			$output .= '</' . $meta_element . '>';
		}

		if ( $social_position == 'before' && $use_social && ! empty( $social_icons ) ) {
			$output .= '<div class="uk-text-center' . $social_margin_top . '">';
			$output .= $social_icons;
			$output .= '</div>';
		}

		if ( $email ) {
			$output .= '<div class="ui-email' . $email_style . '">';
			$output .= $email;
			$output .= '</div>';
		}

		if ( $introtext ) {
			$output .= '<div class="ui-content uk-panel' . $content_style . '">';
			$output .= $introtext;
			$output .= '</div>';
		}

		if ( $meta_alignment == 'after' && $designation ) {
			$output .= '<' . $meta_element . ' class="ui-meta' . $meta_style . '">';
			$output .= $designation;
			$output .= '</' . $meta_element . '>';
		}
		if ( $social_position == 'after' && $use_social && ! empty( $social_icons ) ) {
			$output .= '<div class="uk-text-center' . $social_margin_top . '">';
			$output .= $social_icons;
			$output .= '</div>';
		}

		$output .= ( $image_padding ) ? '</div>' : '';
		$output .= ( $card_content_padding ) ? '</div>' : '';

		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	public function css() {
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$settings = $this->addon->settings;

		$title_color        = ( isset( $settings->name_color ) && $settings->name_color ) ? $settings->name_color : '';
		$custom_title_color = ( isset( $settings->custom_title_color ) && $settings->custom_title_color ) ? 'color: ' . $settings->custom_title_color . ';' : '';
		$designation_style  = ( isset( $settings->designation_style ) && $settings->designation_style ) ? $settings->designation_style : '';
		$custom_meta_color  = ( isset( $settings->meta_color ) && $settings->meta_color ) ? 'color: ' . $settings->meta_color . ';' : '';
		$content_color      = ( isset( $settings->content_color ) && $settings->content_color ) ? 'color: ' . $settings->content_color . ';' : '';
		$email_style        = ( isset( $settings->email_style ) && $settings->email_style ) ? $settings->email_style : '';
		$email_color        = ( isset( $settings->email_color ) && $settings->email_color ) ? 'color: ' . $settings->email_color . ';' : '';

		$card_style      = ( isset( $settings->card_styles ) && $settings->card_styles ) ? $settings->card_styles : '';
		$card_background = ( isset( $settings->card_background ) && $settings->card_background ) ? 'background-color: ' . $settings->card_background . ';' : '';
		$card_color      = ( isset( $settings->card_color ) && $settings->card_color ) ? 'color: ' . $settings->card_color . ';' : '';

		$icons_button = ( isset( $settings->icons_button ) && $settings->icons_button ) ? 1 : 0;

		$icon_background = ( isset( $settings->icon_background ) && $settings->icon_background ) ? 'background-color: ' . $settings->icon_background . ';' : '';
		$icon_color      = ( isset( $settings->icon_color ) && $settings->icon_color ) ? 'color: ' . $settings->icon_color . ';' : '';

		$overlay_styles     = ( isset( $settings->overlay_styles ) && $settings->overlay_styles ) ? $settings->overlay_styles : '';
		$overlay_background = ( isset( $settings->overlay_background ) && $settings->overlay_background ) ? 'background-color: ' . $settings->overlay_background . ';' : '';

		$css = '';
		if ( $card_style == 'custom' && $card_background ) {
			$css .= $addon_id . ' .uk-card-custom {' . $card_background . '}';
		}

		if ( $card_style == 'custom' && $card_color ) {
			$css .= $addon_id . ' .uk-card-custom.uk-card-body, ' . $addon_id . ' .uk-card-custom>:not([class*=uk-card-media]) {' . $card_color . '}';
		}

		if ( $icons_button && $icon_background ) {
			$css .= $addon_id . ' .uk-icon-button {' . $icon_background . '}';
		}
		if ( $icons_button && $icon_color ) {
			$css .= $addon_id . ' .uk-icon-button {' . $icon_color . '}';
		} elseif ( $icon_color ) {
			$css .= $addon_id . ' .uk-icon-link {' . $icon_color . '}';
		}
		if ( $overlay_styles == 'overlay-custom' && $overlay_background ) {
			$css .= $addon_id . ' .uk-overlay-custom {' . $overlay_background . '}';
		}

		if ( empty( $title_color ) && $custom_title_color ) {
			$css .= $addon_id . ' .ui-title {' . $custom_title_color . '}';
		}
		if ( empty( $designation_style ) && $custom_meta_color ) {
			$css .= $addon_id . ' .ui-meta {' . $custom_meta_color . '}';
		}
		if ( empty( $email_style ) && $email_color ) {
			$css .= $addon_id . ' .ui-email {' . $email_color . '}';
		}
		if ( $content_color ) {
			$css .= $addon_id . ' .ui-content {' . $content_color . '}';
		}

		return $css;
	}
}
