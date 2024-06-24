<?php
/**
 * @package Jollyany
 * @author TemPlaza http://www.templaza.com
 * @copyright Copyright (c) 2010 - 2022 Jollyany
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined ('_JEXEC') or die ('Restricted access');
use Jollyany\Helper\PageBuilder;
class SppagebuilderAddonUKSlider extends SppagebuilderAddons {

	public function render() {
        
        $settings = $this->addon->settings;
		$heading_selector = (isset($settings->heading_selector) && $settings->heading_selector) ? $settings->heading_selector : 'h3';

        $column_gutter  = (isset($settings->column_gutter) && $settings->column_gutter) ? ' uk-grid-'.$settings->column_gutter : '';
        $enable_center  = (isset($settings->enable_center)) ? $settings->enable_center : 0;
        $loop           = (isset($settings->loop)) ? $settings->loop : 1;
        $show_button    = (isset($settings->show_button)) ? $settings->show_button : 1;
        $column_divider = (isset($settings->column_divider)) ? $settings->column_divider : 0;
        $column_divider = $column_divider ? ' uk-grid-divider' : '';
        $column_width   = (isset($settings->column_width) && $settings->column_width) ? ' uk-child-width-'.$settings->column_width : ' uk-child-width-1-1';
        $column_width   .= (isset($settings->column_width_xl) && $settings->column_width_xl) ? ' uk-child-width-'.$settings->column_width_xl.'@xl' : ' uk-child-width-1-3@xl';
        $column_width   .= (isset($settings->column_width_l) && $settings->column_width_l) ? ' uk-child-width-'.$settings->column_width_l.'@l' : ' uk-child-width-1-3@l';
        $column_width   .= (isset($settings->column_width_m) && $settings->column_width_m) ? ' uk-child-width-'.$settings->column_width_m.'@m' : ' uk-child-width-1-2@m';
        $column_width   .= (isset($settings->column_width_s) && $settings->column_width_s) ? ' uk-child-width-'.$settings->column_width_s.'@s' : ' uk-child-width-1-2@s';

        $viewport_offset    = ( isset( $settings->viewport_offset ) && $settings->viewport_offset ) ? $settings->viewport_offset : 30;
        $viewport_offset    = 100 - $viewport_offset;
        $min_height         = ( isset( $settings->min_height ) && $settings->min_height ) ? 'min-height: ' . $settings->min_height . ';' : 'min-height: 500;';

        $button_style       = ( isset( $settings->button_size ) && $settings->button_size ) ? ' uk-button-' . $settings->button_size : '';
        $button_style       .=( isset( $settings->grid_width ) && $settings->grid_width ) ? ' uk-width-1-1' : '';
        $button_shape       = (isset($settings->button_shape) && $settings->button_shape) ? ' uk-button-' . $settings->button_shape : ' uk-button-square';

        $enable_navigation      = (isset($settings->enable_navigation)) ? $settings->enable_navigation : 1;
        $navigation_position    = (isset($settings->navigation_position)) ? $settings->navigation_position : '';
        $enable_dotnav          = (isset($settings->enable_dotnav)) ? $settings->enable_dotnav : 1;
        $dotnav_margin          = (isset($settings->dotnav_margin) && $settings->dotnav_margin) ? ' '.$settings->dotnav_margin : ' uk-margin-top';

        $overlay_type = (isset($settings->overlay_type) && $settings->overlay_type) ? $settings->overlay_type : '';

        $general     =   PageBuilder::general_styles($settings);

		//Output
		$output  = '<div class="ukslider ' . $general['container'] . $general['class'] . '" data-uk-slider="'.($loop ? '' : 'finite: true;').($enable_center ? 'center: true;' : '').'"' . $general['animation'] . '>';
		$output .= '<div class="ukslider-container uk-position-relative uk-visible-toggle uk-light" tabindex="-1">';

		//Tab Title
		$output .='<ul class="uk-slider-items uk-grid uk-grid-match'.$column_width.$column_gutter.$column_divider.'" uk-height-viewport="offset-top: true; ' . $min_height . 'offset-bottom: '.$viewport_offset.'">';
		foreach ($settings->ukslider_items as $key => $item) {
            $image      = ( isset( $item->image ) && $item->image ) ? $item->image : '';
            $title      = ( isset( $item->title ) && $item->title ) ? $item->title : '';
            $content    = ( isset( $item->content ) && $item->content ) ? $item->content : '';
            $link       = ( isset( $item->link ) && $item->link ) ? $item->link : '';
            if (isset($link->src)) $link = $link->src;
            $link_text  = ( isset( $item->link_text ) && $item->link_text ) ? $item->link_text : '';
            $uk_icon     = ( isset( $item->uikit_icon ) && $item->uikit_icon ) ? $item->uikit_icon : '';

            $image_src  = isset( $image->src ) ? $image->src : $image;
            if ( strpos( $image_src, 'http://' ) !== false || strpos( $image_src, 'https://' ) !== false ) {
                $image_src = $image_src;
            } elseif ( $image_src ) {
                $image_src = JURI::base( true ) . '/' . $image_src;
            }
            $output .= '<li>';
            $output .= '<div class="uk-cover-container">';
            $output .= '<img class="uk-image" src="' . $image_src . '" alt="'.$title.'" data-uk-cover>';
            if ($overlay_type != 'none') {
                $output .= '<div class="uk-overlay uk-overlay-primary uk-position-cover"></div>';
            }
            $output .= '<div class="uk-position-bottom uk-position-large uk-panel">';
            if ($title) {
                if ($link && !$show_button) {
                    $title  =   '<a href="'.$link.'" class="uk-link-reset">'.$title.'</a>';
                }
                $output .= '<'.$heading_selector.' class="ukslider-title sppb-addon-title">'.$title.'</'.$heading_selector.'>';
            }
            $output .= '<div class="ukslider-desc">'.$content.'</div>';
            if ($link && $show_button) {
                $output .= '<div class="uk-margin-top"><a class="uk-button uk-button-secondary'.$button_style.$button_shape.($uk_icon ? ' d-flex justify-content-between': '').'" href="'.$link.'"'.($uk_icon ? ' data-uk-icon="icon: '.$uk_icon.'"' : '').'>'.$link_text.'</a></div>';
            }
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</li>';
		}
		$output .='</ul>';
        if ($enable_navigation) {
            $output .= '<div class="'.($navigation_position == 'inside' ? '' : 'uk-hidden@l ').'uk-light"><a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a><a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a></div>';
            $output .= $navigation_position == 'inside' ? '' : '<div class="uk-visible@l"><a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a><a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a></div>';
        }

		$output .= '</div>';
        if ($enable_dotnav) {
            $output .= '<ul class="uk-slider-nav uk-dotnav uk-flex-center'.$dotnav_margin.'"></ul>';
        }
		$output .= '</div>';

		return $output;

	}

	public function css() {
        $addon_id = '#sppb-addon-' . $this->addon->id;
        $settings = $this->addon->settings;

        $css    =   '';

        $overlay_type = (isset($settings->overlay_type) && $settings->overlay_type) ? $settings->overlay_type : '';
        $media_overlay_style = '';
        if($overlay_type == 'color'){
            $media_overlay_style = (isset($settings->overlay_color) && $settings->overlay_color)  ? 'background-color: '.$settings->overlay_color.';' : '';
        } elseif ($overlay_type=='gradient'){
            $overlay_gradient = isset( $settings->overlay_gradient ) && $settings->overlay_gradient  ? $settings->overlay_gradient : '';
            $gradient_color1 = (isset($overlay_gradient->color) && $overlay_gradient->color) ? $overlay_gradient->color : 'rgba(127, 0, 255, 0.8)';
            $gradient_color2 = (isset($overlay_gradient->color2) && $overlay_gradient->color2) ? $overlay_gradient->color2 : 'rgba(225, 0, 255, 0.7)';
            $degree = $overlay_gradient->deg ?? 0;

            $type = $overlay_gradient->type ?? 'linear';
            $radialPos = (isset($overlay_gradient->radialPos) && $overlay_gradient->radialPos) ? $overlay_gradient->radialPos : 'Center Center';
            $radial_angle1 = (isset($overlay_gradient->pos) && $overlay_gradient->pos) ? $overlay_gradient->pos : '0';
            $radial_angle2 = (isset($overlay_gradient->pos2) && $overlay_gradient->pos2) ? $overlay_gradient->pos2 : '100';
            if($type!=='radial'){
                $media_overlay_style = 'background: -webkit-linear-gradient('.$degree.'deg, '.$gradient_color1.' '.$radial_angle1.'%, '.$gradient_color2.' '.$radial_angle2.'%) transparent;';
                $media_overlay_style .= 'background: linear-gradient('.$degree.'deg, '.$gradient_color1.' '.$radial_angle1.'%, '.$gradient_color2.' '.$radial_angle2.'%) transparent;';
            } else {
                $media_overlay_style .= 'background: -webkit-radial-gradient(at '.$radialPos.', '.$gradient_color1.' '.$radial_angle1.'%, '.$gradient_color2.' '.$radial_angle2.'%) transparent;';
                $media_overlay_style .= 'background: radial-gradient(at '.$radialPos.', '.$gradient_color1.' '.$radial_angle1.'%, '.$gradient_color2.' '.$radial_angle2.'%) transparent;';
            }
        }

        if (!isset($settings->overlay_type) && !$media_overlay_style) {
            $media_overlay_style = (isset($settings->overlay_color) && $settings->overlay_color)  ? 'background-color: '.$settings->overlay_color.';' : '';
        }

        if ($media_overlay_style) {
            $css .= $addon_id . ' .uk-overlay-primary {' . $media_overlay_style . '}';
        }

        //Title style
        $title_style = '';
        $title_style .= (isset($settings->title_text_color) && $settings->title_text_color) ? 'color:'.$settings->title_text_color . ';' : '';
        if (isset($settings->title_fontsize->md)) $settings->title_fontsize = $settings->title_fontsize->md;
        $title_style .= (isset($settings->title_fontsize) && $settings->title_fontsize) ? 'font-size:'.$settings->title_fontsize . 'px;' : '';
        if (isset($settings->title_lineheight->md)) $settings->title_lineheight = $settings->title_lineheight->md;
        $title_style .= (isset($settings->title_lineheight) && $settings->title_lineheight) ? 'line-height:'.$settings->title_lineheight . 'px;' : '';
        $title_style .= (isset($settings->title_letterspace) && $settings->title_letterspace) ? 'letter-spacing:'.$settings->title_letterspace . ';' : '';
        $title_style .= (isset($settings->title_margin_top) && $settings->title_margin_top) ? 'margin-top:'.$settings->title_margin_top . 'px;' : '';
        if (isset($settings->title_margin_bottom->md)) $settings->title_margin_bottom = $settings->title_margin_bottom->md;
        $title_style .= (isset($settings->title_margin_bottom) && $settings->title_margin_bottom) ? 'margin-bottom:'.$settings->title_margin_bottom . 'px;' : '';
        $title_font_style = (isset($settings->title_font_style) && $settings->title_font_style) ? $settings->title_font_style : '';
        if(isset($title_font_style->underline) && $title_font_style->underline){
            $title_style .= 'text-decoration:underline;';
        }
        if(isset($title_font_style->italic) && $title_font_style->italic){
            $title_style .= 'font-style:italic;';
        }
        if(isset($title_font_style->uppercase) && $title_font_style->uppercase){
            $title_style .= 'text-transform:uppercase;';
        }
        if(!isset($title_font_style->weight)){
            $title_style .= 'font-weight:700;';
        }
        if(isset($title_font_style->weight) && $title_font_style->weight){
            $title_style .= 'font-weight:'.$title_font_style->weight.';';
        }
        if($title_style){
            $css .= '#sppb-addon-' . $this->addon->id . ' .ukslider-title {';
            $css .= $title_style;
            $css .= '}';
        }

        //Text style
        $text_style =   '';
        $text_style .= (isset($settings->text_fontsize) && $settings->text_fontsize) ? "font-size: " . $settings->text_fontsize . "px;" : "";
        $text_style .= (isset($settings->text_lineheight) && $settings->text_lineheight) ? "line-height: " . $settings->text_lineheight . "px;" : "";
        $text_style .= (isset($settings->text_letterspace) && $settings->text_letterspace) ? "letter-spacing: " . $settings->text_letterspace . ";" : "";
        $text_font_style = (isset($settings->text_font_style) && $settings->text_font_style) ? $settings->text_font_style : '';
        if(isset($text_font_style->underline) && $text_font_style->underline){
            $text_style .= 'text-decoration:underline;';
        }
        if(isset($text_font_style->italic) && $text_font_style->italic){
            $text_style .= 'font-style:italic;';
        }
        if(isset($text_font_style->uppercase) && $text_font_style->uppercase){
            $text_style .= 'text-transform:uppercase;';
        }
        if(isset($text_font_style->weight) && $text_font_style->weight){
            $text_style .= 'font-weight:'.$text_font_style->weight.';';
        }

        if($text_style){
            $css .= '#sppb-addon-' . $this->addon->id . ' .ukslider-desc { ' . $text_style . ' }';
        }

        //Button style
        $button_style = '';
        $button_style .= (isset($settings->button_text_color) && $settings->button_text_color) ? 'color:'.$settings->button_text_color . ';' : '';
        if (isset($settings->button_fontsize->md)) $settings->button_fontsize = $settings->button_fontsize->md;
        $button_style .= (isset($settings->button_fontsize) && $settings->button_fontsize) ? 'font-size:'.$settings->button_fontsize . 'px;' : '';
        if (isset($settings->button_lineheight->md)) $settings->button_lineheight = $settings->button_lineheight->md;
        $button_style .= (isset($settings->button_lineheight) && $settings->button_lineheight) ? 'line-height:'.$settings->button_lineheight . 'px;' : '';
        $button_style .= (isset($settings->button_letterspace) && $settings->button_letterspace) ? 'letter-spacing:'.$settings->button_letterspace . ';' : '';
        $button_style .= (isset($settings->button_margin_top) && $settings->button_margin_top) ? 'margin-top:'.$settings->button_margin_top . 'px;' : '';
        if (isset($settings->button_margin_bottom->md)) $settings->button_margin_bottom = $settings->button_margin_bottom->md;
        $button_style .= (isset($settings->button_margin_bottom) && $settings->button_margin_bottom) ? 'margin-bottom:'.$settings->button_margin_bottom . 'px;' : '';
        $button_font_style = (isset($settings->button_font_style) && $settings->button_font_style) ? $settings->button_font_style : '';
        if(isset($button_font_style->underline) && $button_font_style->underline){
            $button_style .= 'text-decoration:underline;';
        }
        if(isset($button_font_style->italic) && $button_font_style->italic){
            $button_style .= 'font-style:italic;';
        }
        if(isset($button_font_style->uppercase) && $button_font_style->uppercase){
            $button_style .= 'text-transform:uppercase;';
        }
        if(isset($button_font_style->weight) && $button_font_style->weight){
            $button_style .= 'font-weight:'.$button_font_style->weight.';';
        }
        if($button_style){
            $css .= '#sppb-addon-' . $this->addon->id . ' .uk-button {';
            $css .= $button_style;
            $css .= '}';
        }

        //Style for Tablet
        $title_fontsize_sm = (isset($settings->title_fontsize_sm) && $settings->title_fontsize_sm) ? 'font-size:' . $settings->title_fontsize_sm . 'px;' : '';
        $title_lineheight_sm = (isset($settings->title_lineheight_sm) && $settings->title_lineheight_sm) ? 'line-height:' . $settings->title_lineheight_sm . 'px;' : '';
        $title_margin_top_sm = (isset($settings->title_margin_top_sm) && $settings->title_margin_top_sm) ? 'margin-top:' . $settings->title_margin_top_sm . 'px;' : '';
        $title_margin_bottom_sm = (isset($settings->title_margin_bottom_sm) && $settings->title_margin_bottom_sm) ? 'margin-bottom:' . $settings->title_margin_bottom_sm . 'px;' : '';

        if( $title_fontsize_sm || $title_lineheight_sm || $title_margin_top_sm || $title_margin_bottom_sm ){
            $css .= '@media (min-width: 768px) and (max-width: 991px) {';
            $css .= '#sppb-addon-' . $this->addon->id . ' .ukslider-title {';
            $css .= $title_fontsize_sm;
            $css .= $title_lineheight_sm;
            $css .= $title_margin_top_sm;
            $css .= $title_margin_bottom_sm;
            $css .= '}';
            $css .= '}';
        }
        //Mobile
        $title_fontsize_xs = (isset($settings->title_fontsize_xs) && $settings->title_fontsize_xs) ? 'font-size:' . $settings->title_fontsize_xs . 'px;' : '';
        $title_lineheight_xs = (isset($settings->title_lineheight_xs) && $settings->title_lineheight_xs) ? 'line-height:' . $settings->title_lineheight_xs . 'px;' : '';
        $title_margin_top_xs = (isset($settings->title_margin_top_xs) && $settings->title_margin_top_xs) ? 'margin-top:' . $settings->title_margin_top_xs . 'px;' : '';
        $title_margin_bottom_xs = (isset($settings->title_margin_bottom_xs) && $settings->title_margin_bottom_xs) ? 'margin-bottom:' . $settings->title_margin_bottom_xs . 'px;' : '';

        if($title_fontsize_xs || $title_lineheight_xs || $title_margin_top_xs || $title_margin_bottom_xs){
            $css .= '@media (max-width: 767px) {';
            $css .= '#sppb-addon-' . $this->addon->id . ' .ukslider-title {';
            $css .= $title_fontsize_xs;
            $css .= $title_lineheight_xs;
            $css .= $title_margin_top_xs;
            $css .= $title_margin_bottom_xs;
            $css .= '}';
            $css .= '}';
        }
		return $css;
	}
}