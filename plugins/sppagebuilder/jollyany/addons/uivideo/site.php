<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.
defined( '_JEXEC' ) or die( 'Restricted access' );

class SppagebuilderAddonUiVideo extends SppagebuilderAddons {

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
		$general     .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';
		$general     .= ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';

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

		// Options.
		$url           = ( isset( $settings->url ) && $settings->url ) ? $settings->url : '';
		$url_mp4       = ( isset( $settings->url_mp4 ) && $settings->url_mp4 ) ? $settings->url_mp4 : '';
		$url_modal_mp4 = ( isset( $settings->url_modal_mp4 ) && $settings->url_modal_mp4 ) ? $settings->url_modal_mp4 : '';
		$image         = ( isset( $settings->image ) && $settings->image ) ? $settings->image : '';
		$image_src     = isset( $image->src ) ? $image->src : $image;
		if ( strpos( $image_src, 'http://' ) !== false || strpos( $image_src, 'https://' ) !== false ) {
			$image_src = $image_src;
		} elseif ( $image_src ) {
			$image_src = JURI::base( true ) . '/' . $image_src;
		}
		$alt_text = ( isset( $settings->alt_text ) && $settings->alt_text ) ? $settings->alt_text : '';

		$show_control = ( isset( $settings->show_control ) && $settings->show_control ) ? ' controls' : '';
		$loop_video   = ( isset( $settings->loop_video ) && $settings->loop_video ) ? ' loop' : '';
		$mute_video   = ( isset( $settings->mute_video ) && $settings->mute_video ) ? ' muted' : '';
		$play_inline  = ( isset( $settings->play_inline ) && $settings->play_inline ) ? ' playsinline' : '';
		$lazy_load    = ( isset( $settings->lazy_load ) && $settings->lazy_load ) ? ' preload="none"' : '';

		$autoplay = ( isset( $settings->autoplay ) && $settings->autoplay ) ? $settings->autoplay : '';

		$autoplay_init = '';

		if ( $autoplay == 'true' ) {
			$autoplay_init = ' autoplay';
		} elseif ( $autoplay == 'inview' ) {
			$autoplay_init = ' uk-video="inview"';
		}

		$video_source = ( isset( $settings->video_source ) && $settings->video_source ) ? $settings->video_source : '';

		$box_shadow        = ( isset( $settings->box_shadow ) && $settings->box_shadow ) ? ' ' . $settings->box_shadow : '';
		$video_modal_width = ( isset( $settings->width ) && $settings->width ) ? ' width="' . $settings->width . '"' : '';

		$video_width  = ( isset( $settings->video_width ) && $settings->video_width ) ? $settings->video_width : '';
		$video_height = ( isset( $settings->video_height ) && $settings->video_height ) ? $settings->video_height : '';

		$video_width_init  = ( isset( $settings->video_width ) && $settings->video_width ) ? ' width="' . $video_width . '"' : '';
		$video_height_init = ( isset( $settings->video_height ) && $settings->video_height ) ? ' height="' . $video_height . '"' : '';

		if ( $video_source == 'youtube-vimeo' ) {
			$video_width_init  .= ( $video_height && empty( $video_width ) ) ? ' width="' . round( ( (int) $video_height * 16 ) / 9 ) . '"' : '';
			$video_height_init .= ( $video_width && empty( $video_height ) ) ? ' height="' . round( ( (int) $video_width * 9 ) / 16 ) . '"' : '';
		}

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

		$overlay_styles = ( isset( $settings->overlay_styles ) && $settings->overlay_styles ) ? ' uk-' . $settings->overlay_styles : '';
		$icon_width     = ( isset( $settings->icon_width ) && $settings->icon_width ) ? $settings->icon_width : '60';
		$icon_tooltip   = ( isset( $settings->icon_tooltip ) && $settings->icon_tooltip ) ? ' uk-tooltip=" ' . $settings->icon_tooltip . '"' : '';

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

		$addon_id = $this->addon->id;
		$output   = '';

		$output .= '<div class="ui-video' . $zindex_cls . $general . $max_width_cfg . '"' . $animation . '>';
		if ( $title_addon ) {
			$output .= '<' . $title_heading_selector . ' class="tz-title' . $title_style . $title_heading_decoration . '">';

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '<span>' : '';

			$output .= nl2br( $title_addon );

			$output .= ( $title_heading_decoration == ' uk-heading-line' ) ? '</span>' : '';

			$output .= '</' . $title_heading_selector . '>';
		}
		if ( $video_source == 'youtube-vimeo' ) {
			if ( $url ) {

				$video = parse_url( $url );

				switch ( $video['host'] ) {
					case 'youtu.be':
						$id  = trim( $video['path'], '/' );
						$src = '//www.youtube.com/embed/' . $id.'?'.$video['query'];
						break;

					case 'www.youtube.com':
					case 'youtube.com':
						parse_str( $video['query'], $query );
						$id  = $query['v'];
						$src = '//www.youtube.com/embed/' . $id.'?'.$video['query'];
						break;

					case 'vimeo.com':
					case 'www.vimeo.com':
						$id  = trim( $video['path'], '/' );
						$src = '//player.vimeo.com/video/' . $id.'?'.$video['query'];
				}
				$output .= '<div class="sppb-embed-responsive sppb-embed-responsive-16by9"><iframe class="tz-video sppb-embed-responsive-item' . $box_shadow . '"' . $video_width_init . $video_height_init . ' src="' . $src . '" frameborder="0" allowfullscreen uk-responsive></iframe></div>';
			}
		} elseif ( $video_source == 'html5' ) {
			$output .= '<video class="html5-video' . $box_shadow . '"' . $video_width_init . $video_height_init . ' src="' . $url_mp4 . '"' . $show_control . $loop_video . $mute_video . $play_inline . $lazy_load . $autoplay_init . '></video>';
		} else {
			$output .= '<div class="uk-inline with-animation">';
			$output .= '<a href="#video-' . $addon_id . '" uk-toggle>';

			if ( $image_src ) {
				$output .= '<img class="img-video' . $box_shadow . '" src="' . $image_src . '" alt="' . $alt_text . '" title="' . $alt_text . '">';
			}

			$output .= '<div class="uk-position-cover uk-overlay' . $overlay_styles . ' uk-flex uk-flex-center uk-flex-middle"><div class="btn-play"' . $icon_tooltip . '><span class="uk-icon"><svg width="' . $icon_width . '" height="' . $icon_width . '" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="play-circle"><polygon fill="none" stroke="#000" stroke-width="1.1" points="8.5 7 13.5 10 8.5 13"></polygon><circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle></svg></span></div></div>';
			$output .= '</a>';
			$output .= '</div>';
			$output .= '<div id="video-' . $addon_id . '" class="tz-video uk-flex-top" uk-modal="container: true">';
			$output .= '<div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">';
			$output .= '<button class="uk-modal-close-outside" type="button" uk-close></button>';// uk-video
			$output .= '<video class="html5-video' . $box_shadow . '"' . $video_modal_width . ' src="' . $url_modal_mp4 . '"' . $show_control . $loop_video . $mute_video . $play_inline . $lazy_load . $autoplay_init . '></video>';
			$output .= '</div>';
			$output .= '</div>';

		}

		$output .= '</div>';

		return $output;
	}
	public function css() {
		$settings  = $this->addon->settings;
		$image     = ( isset( $settings->image ) && $settings->image ) ? $settings->image : '';
		$image_src = isset( $image->src ) ? $image->src : $image;
		if ( strpos( $image_src, 'http://' ) !== false || strpos( $image_src, 'https://' ) !== false ) {
			$image_src = $image_src;
		} elseif ( $image_src ) {
			$image_src = JURI::base( true ) . '/' . $image_src;
		}
		$css = '';
		if ( $image_src ) {
			$css .= ".with-animation .btn-play:before,.with-animation.btn-play:after{content:'';border:1px solid;border-color:inherit;width:150%;height:150%;-webkit-border-radius:50px;border-radius:50px;position:absolute;left:-25%;top:-25%;opacity:1;-webkit-animation:1s videomodule-anim linear infinite;animation:1s videomodule-anim linear infinite}.with-animation .btn-play:before{-webkit-animation-delay:.5s;animation-delay:.5s}@-webkit-keyframes videomodule-anim{0%{-webkit-transform:scale(.68);transform:scale(.68)}100%{-webkit-transform:scale(1.2);transform:scale(1.2);opacity:0}}@keyframes videomodule-anim{0%{-webkit-transform:scale(.68);transform:scale(.68)}100%{-webkit-transform:scale(1.2);transform:scale(1.2);opacity:0}}.btn-play{position:relative}";
		}
		$css .= '.tz-video.uk-modal {background: rgba(248,248,248,0.95);}.tz-video .uk-modal-close-outside {color: #888;}';
		return $css;
	}
}
