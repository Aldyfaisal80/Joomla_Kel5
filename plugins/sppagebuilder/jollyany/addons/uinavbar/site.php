<?php
/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
// No direct access.

defined( '_JEXEC' ) or die( 'Restricted access' );

class SppagebuilderAddonUiNavbar extends SppagebuilderAddons {

	public function render() {
		// get pageid.
		$input                    = JFactory::getApplication()->input;
		$page_id                  = $input->get( 'id', 0, 'INT' );
		$settings                 = $this->addon->settings;
		$title_addon              = ( isset( $settings->title_addon ) && $settings->title_addon ) ? $settings->title_addon : '';
		$title_style              = ( isset( $settings->title_heading_style ) && $settings->title_heading_style ) ? ' uk-' . $settings->title_heading_style : '';
		$title_style             .= ( isset( $settings->title_heading_color ) && $settings->title_heading_color ) ? ' uk-' . $settings->title_heading_color : '';
		$title_style             .= ( isset( $settings->title_heading_margin ) && $settings->title_heading_margin ) ? ' ' . $settings->title_heading_margin : '';
		$title_heading_decoration = ( isset( $settings->title_heading_decoration ) && $settings->title_heading_decoration ) ? ' ' . $settings->title_heading_decoration : '';
		$title_heading_selector   = ( isset( $settings->title_heading_selector ) && $settings->title_heading_selector ) ? $settings->title_heading_selector : 'h3';

		$responsive_menu_class = ( isset( $settings->responsive_menu_class ) && $settings->responsive_menu_class ) ? ' ' . $settings->responsive_menu_class : '';
		$general               = '';
		$addon_margin          = ( isset( $settings->addon_margin ) && $settings->addon_margin ) ? $settings->addon_margin : '';
		$general              .= ( $addon_margin ) ? ' uk-margin' . ( ( $addon_margin == 'default' ) ? '' : '-' . $addon_margin ) : '';
		$box_shadow            = ( isset( $settings->box_shadow ) && $settings->box_shadow ) ? ' uk-box-shadow-' . $settings->box_shadow : '';
		$general              .= ( isset( $settings->visibility ) && $settings->visibility ) ? ' ' . $settings->visibility : '';
		$general              .= ( isset( $settings->class ) && $settings->class ) ? ' ' . $settings->class : '';

		$links            = ( isset( $settings->sp_link_list_item ) && $settings->sp_link_list_item ) ? $settings->sp_link_list_item : array();
		$type             = ( isset( $settings->type ) && $settings->type ) ? $settings->type : 'uk-navbar-nav';
		$align            = ( isset( $settings->align ) && $settings->align ) ? $settings->align : 'left';
		$icon_position    = ( isset( $settings->icon_position ) && $settings->icon_position ) ? $settings->icon_position : 'left';
		$scroll_to        = ( isset( $settings->scroll_to ) && $settings->scroll_to ) ? $settings->scroll_to : false;
		$sticky_menu      = ( isset( $settings->sticky_menu ) && $settings->sticky_menu ) ? $settings->sticky_menu : false;
		$transparent_menu = ( isset( $settings->transparent_menu ) && $settings->transparent_menu ) ? $settings->transparent_menu : false;
		$responsive_menu  = ( isset( $settings->responsive_menu ) ) ? $settings->responsive_menu : true;
		$flip             = ( isset( $settings->flip ) && $settings->flip ) ? $settings->flip : false;
		$right_menu       = ( isset( $settings->right_menu ) && $settings->right_menu ) ? $settings->right_menu : false;
		$text_transform   = ( isset( $settings->text_transform ) && $settings->text_transform ) ? ' uk-text-' . $settings->text_transform : '';

		$toggle_mode = ( isset( $settings->toggle_mode ) && $settings->toggle_mode ) ? ' ' . $settings->toggle_mode : 'slide';

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
		$image     = ( isset( $settings->image ) && $settings->image ) ? $settings->image : '';
		$image_src = isset( $image->src ) ? $image->src : $image;
		if ( strpos( $image_src, 'http://' ) !== false || strpos( $image_src, 'https://' ) !== false ) {
			$image_src = $image_src;
		} elseif ( $image_src ) {
			$image_src = JURI::base( true ) . '/' . $image_src;
		}

		$alt_text         = ( isset( $settings->alt_text ) && $settings->alt_text ) ? $settings->alt_text : '';
		$logo_link        = ( isset( $settings->logo_link ) && $settings->logo_link ) ? $settings->logo_link : '';
		$logo_link_target = ( isset( $settings->logo_link_target ) && $settings->logo_link_target ) ? 'target="' . $settings->logo_link_target . '"' : '';
		$logo_position    = ( isset( $settings->logo_position ) && $settings->logo_position ) ? $settings->logo_position : '';
		$logo_margin      = ( isset( $settings->logo_margin ) && $settings->logo_margin ) ? ' ' . $settings->logo_margin : '';
		$cards            = ( isset( $settings->card_style ) && $settings->card_style ) ? ' ' . $settings->card_style : '';
		$cards           .= ( isset( $settings->hover ) && $settings->hover ) ? ' ' . $settings->hover : '';
		$cards           .= ( isset( $settings->card_size ) && $settings->card_size ) ? ' ' . $settings->card_size : '';

		$label_text   = ( isset( $settings->label_text ) && $settings->label_text ) ? $settings->label_text : '';
		$label_styles = ( isset( $settings->label_styles ) && $settings->label_styles ) ? $settings->label_styles : '';

		$nav_type  = "${type}";
		$nav_align = "uk-navbar-${align}";

		$transparent_row_attr = $transparent_menu ? ' uk-navbar-transparent' : '';

		$sticky_row_attr = $sticky_menu ? ' uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky"' : '';

		$right_menu_cls = $right_menu ? ' uk-position-center-right' : '';

		$responsive_menu_cls = '';
		if ( $responsive_menu ) {
			$responsive_menu_cls = ' <a class="uk-navbar-toggle' . $right_menu_cls . $responsive_menu_class . '" uk-navbar-toggle-icon href="#tz-mobile-' . $this->addon->id . '" uk-toggle></a>';
		}

		$flip_cls = $flip ? ' flip: true' : '';

		$enable_dropbar = ( isset( $settings->enable_dropbar ) && $settings->enable_dropbar ) ? $settings->enable_dropbar : false;
		$dropbar_cls    = $enable_dropbar ? 'dropbar: true; dropbar-mode: push' : '';

		$enable_boundary = ( isset( $settings->enable_boundary ) && $settings->enable_boundary ) ? $settings->enable_boundary : false;

		$boundary_alignment = ( isset( $settings->boundary_alignment ) && $settings->boundary_alignment ) ? $settings->boundary_alignment : 'left';
		$boundary_cls       = $enable_boundary ? '; boundary-align: true; align: ' . $boundary_alignment . ';' : '';

		$scroll_offset = ( isset( $settings->scroll_offset ) && $settings->scroll_offset ) ? $settings->scroll_offset : '';
		$scroll_cls    = $scroll_offset ? '="offset: ' . $scroll_offset . '"' : '';

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

		if ( $nav_type == 'uk-nav uk-nav-default' ) {
			$output .= '<div class="uk-navbar-container uk-navbar-transparent' . $zindex_cls . $general . $max_width_cfg . $transparent_row_attr . '"' . $sticky_row_attr . $animation . '>';
		} else {
			$output .= '<div class="uk-navbar-container' . $zindex_cls . $general . $max_width_cfg . $transparent_row_attr . '"' . $sticky_row_attr . $animation . '>';
		}

		$output .= '<div class="uk-container-ui-custom' . $text_transform . '">';

		if ( $nav_type == 'uk-nav uk-nav-default' ) {

			$output .= '<div class="uk-card uk-card-body' . $cards . '">';
			$output .= ( $label_text ) ? '<div class="uk-position-top-right uk-card-badge uk-label ' . $label_styles . '">' . $label_text . '</div>' : '';

			$output .= ( $logo_position == 'right' ) ? '<div class="uk-flex uk-flex-right">' : '';
			if ( $image_src ) {
				$output .= ( $logo_link ) ? '<a class="uk-nav-item" ' . $logo_link_target . ' href="' . $logo_link . '" title="' . $alt_text . '">' : '';
				$output .= '<img class="uk-logo' . $logo_margin . '" src="' . $image_src . '" alt="' . $alt_text . '">';
				$output .= ( $logo_link ) ? '</a>' : '';
			}
			$output .= ( $logo_position == 'right' ) ? '</div>' : '';

			$output .= '<ul class="' . $nav_type . '">';
		} else {
			$output .= '<div class="uk-navbar" uk-navbar="' . $dropbar_cls . '' . $boundary_cls . '">';
			$output .= '<div class="' . $nav_align . '">';
			$output .= ( $responsive_menu ) ? $responsive_menu_cls : '<a class="uk-navbar-toggle uk-hidden@m' . $right_menu_cls . $responsive_menu_class . '" uk-navbar-toggle-icon href="#tz-mobile-' . $this->addon->id . '" uk-toggle></a>';
			if ( $logo_position == 'left' ) {
				if ( $image_src ) {
					$output .= ( $logo_link ) ? '<a class="uk-navbar-item" ' . $logo_link_target . ' href="' . $logo_link . '" title="' . $alt_text . '">' : '';
					$output .= '<img class="uk-logo' . $logo_margin . '" src="' . $image_src . '" alt="' . $alt_text . '">';
					$output .= ( $logo_link ) ? '</a>' : '';
				}
			}
			$output .= '<ul class="' . $nav_type . ' uk-visible@l">';
		}

		if ( count( (array) $links ) ) {
			foreach ( $links as $key => $link ) {
				$target           = isset( $link->target ) ? 'target="' . $link->target . '"' : '';
				$icon             = isset( $link->icon ) ? '<span class="uk-margin-small-right" uk-icon="icon: ' . $link->icon . '"></span>' : '';
				$scroll_to_attr   = ( $scroll_to ) ? ' uk-scroll' . $scroll_cls . '' : '';
				$active           = ( isset( $link->active ) && $link->active ) ? ' class="uk-active"' : '';
				$item_class       = ( isset( $link->item_class ) && $link->item_class ) ? ' ' . $link->item_class : '';
				$title            = ( isset( $link->title ) && $link->title ) ? $link->title : '';
				$dropdown         = ( isset( $link->dropdown ) && $link->dropdown ) ? $link->dropdown : '';
				$active           = ( isset( $link->active ) && $link->active ) ? ' uk-active' : '';
				$dropdown_columns = isset( $link->dropdown_columns ) ? $link->dropdown_columns : '1';

				$link_text = '';
				if ( $icon_position == 'right' ) {
					$link_text = $title . ' ' . ( isset( $link->icon ) ? '<span class="uk-margin-small-left" uk-icon="icon: ' . $link->icon . '"></span>' : '' );
				} elseif ( $icon_position == 'top' ) {
					$link_text = ( isset( $link->icon ) ? '<span class="uk-position-absolute uk-transform-center" uk-icon="icon: ' . $link->icon . '"></span>' : '' ) . '<br />' . $title;
				} else {
					$link_text = $icon . ' ' . $title;
				}
				if ( ! empty( $title ) || ! empty( isset( $link->icon ) && $link->icon ) ) {
					$output .= '<li class="el-item' . $item_class . $active . '"><a href="' . ( isset( $link->url ) ? $link->url : '' ) . '" ' . $target . $scroll_to_attr . '>' . $link_text . '</a>';
					if ( $dropdown ) {
						$output .= '<div class="uk-navbar-dropdown uk-navbar-dropdown-width-' . $dropdown_columns . '">';
						$output .= '<div class="uk-navbar-dropdown-grid uk-child-width-1-' . $dropdown_columns . '" uk-grid>';
						$output .= $dropdown;
						$output .= '</div>';
						$output .= '</div>';
					}
					$output .= '</li>';
				}
			}
		}

		if ( $nav_type == 'uk-nav uk-nav-default' ) {

			$output .= '</ul>';
			$output .= '</div>';
		} else {
			$output .= '</ul>';
			if ( $logo_position == 'right' ) {
				if ( $image_src ) {
					$output .= ( $logo_link ) ? '<a class="uk-navbar-item" ' . $logo_link_target . ' href="' . $logo_link . '" title="' . $alt_text . '">' : '';
					$output .= '<img class="uk-logo' . $logo_margin . '" src="' . $image_src . '" alt="' . $alt_text . '">';
					$output .= ( $logo_link ) ? '</a>' : '';
				}
			}

			$output .= '</div>';

			$output .= '</div>';
		}

		$output .= '</div>';
		$output .= '</div>';

		if ( $nav_type == 'uk-navbar-nav' ) {

			$output .= '<div id="tz-mobile-' . $this->addon->id . '" uk-offcanvas="mode:' . $toggle_mode . '; overlay: true;' . $flip_cls . '">';

			$output .= '<div class="uk-offcanvas-bar uk-flex uk-flex-column">';
			$output .= '<button class="uk-offcanvas-close" type="button" uk-close></button>';
			$output .= '<ul class="uk-nav-default uk-nav-parent-icon" uk-nav>';
			if ( count( (array) $links ) ) {
				foreach ( $links as $key => $link ) {
					$target         = isset( $link->target ) ? 'target="' . $link->target . '"' : '';
					$icon           = isset( $link->icon ) ? '<span class="uk-margin-small-right" uk-icon="icon: ' . $link->icon . '"></span>' : '';
					$scroll_to_attr = ( $scroll_to ) ? ' uk-scroll ' : '';

					$active = ( isset( $link->active ) && $link->active ) ? ' class="uk-active"' : '';
					$title  = ( isset( $link->title ) && $link->title ) ? $link->title : '';

					$dropdown = ( isset( $link->dropdown ) && $link->dropdown ) ? $link->dropdown : '';

					$link_text = '';
					if ( $icon_position == 'right' ) {
						$link_text = $title . ' ' . ( isset( $link->icon ) ? '<span class="uk-margin-small-left" uk-icon="icon: ' . $link->icon . '"></span>' : '' );
					} elseif ( $icon_position == 'top' ) {
						$link_text = $icon . '<br />' . $title;
					} else {
						$link_text = $icon . ' ' . $title;
					}
					if ( ! empty( $title ) || ! empty( isset( $link->icon ) && $link->icon ) ) {
						$output .= '<li ' . $active . '><a href="' . ( isset( $link->url ) ? $link->url : '' ) . '" ' . $target . $scroll_to_attr . '>' . $link_text . '</a>';
						if ( $dropdown ) {
							$output .= '<ul class="uk-nav-sub">';

							$features = explode( "\n", $dropdown );

							foreach ( $features as $feature ) {
								$output .= $feature;
							}

							$output .= '</ul>';
						}
						$output .= '</li>';
					}
				}
			}
			$output .= '</ul>';

			$output .= '</div>';
			$output .= '</div>';
		}

		return $output;
	}

	public function css() {
		$settings = $this->addon->settings;
		$addon_id = '#sppb-addon-' . $this->addon->id;

		// get pageid
		$input    = JFactory::getApplication()->input;
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$page_id  = '.page-' . $input->get( 'id', 0, 'INT' );
		$css      = '';
		$css     .= $page_id . ' .sppb-section, ' . $page_id . ' .sppb-column, ' . $page_id . ' .sppb-column-addons {
			z-index: inherit !important;
		}';
		$css     .= $page_id . ' .sppb-section {
			z-index: inherit !important;
		}';

		$navbar_bg  = '';
		$navbar_bg .= ( isset( $settings->navbar_bg ) && $settings->navbar_bg ) ? 'background: ' . $settings->navbar_bg . ';' : '';

		if ( $navbar_bg ) {
			$css .= $addon_id . ' .uk-navbar-container:not(.uk-navbar-transparent) {' . $navbar_bg . '}';
		}

		$nav_bg  = '';
		$nav_bg .= ( isset( $settings->nav_bg ) && $settings->nav_bg ) ? 'background: ' . $settings->nav_bg . ';' : '';
		if ( $nav_bg ) {
			$css .= $addon_id . ' .uk-navbar-container .uk-card {' . $nav_bg . '}';
		}

		$nav_item_color  = '';
		$nav_item_color .= ( isset( $settings->nav_item_color ) && $settings->nav_item_color ) ? 'color: ' . $settings->nav_item_color . ';' : '';
		$nav_item_color .= ( isset( $settings->nav_fontsize ) && $settings->nav_fontsize ) ? 'font-size: ' . $settings->nav_fontsize . 'px;' : '';
		if ( $nav_item_color ) {
			$css .= $addon_id . ' .uk-nav-default > li > a {' . $nav_item_color . 'text-transform: inherit;}';
		}

		$nav_item_color_active  = '';
		$nav_item_color_active .= ( isset( $settings->nav_item_color_active ) && $settings->nav_item_color_active ) ? 'color: ' . $settings->nav_item_color_active . ';' : '';
		if ( $nav_item_color_active ) {
			$css .= $addon_id . ' .uk-nav-default > li > a:hover {' . $nav_item_color_active . '}';
			$css .= $addon_id . ' .uk-nav-default > li > a:focus {' . $nav_item_color_active . '}';
		}

		$navbar_item_color  = '';
		$navbar_item_color .= ( isset( $settings->navbar_item_color ) && $settings->navbar_item_color ) ? 'color: ' . $settings->navbar_item_color . ';' : '';
		if ( $navbar_item_color ) {
			$css .= $addon_id . ' .uk-navbar-nav>li>a {' . $navbar_item_color . 'text-transform: inherit;}';
		}

		$navbar_item_color_active  = '';
		$navbar_item_color_active .= ( isset( $settings->navbar_item_color_active ) && $settings->navbar_item_color_active ) ? 'color: ' . $settings->navbar_item_color_active . ';' : '';
		if ( $navbar_item_color_active ) {
			$css .= $addon_id . ' .uk-navbar-nav > li:hover > a {' . $navbar_item_color_active . '}';
			$css .= $addon_id . ' .uk-navbar-nav > li > a:focus {' . $navbar_item_color_active . '}';
			$css .= $addon_id . ' .uk-navbar-nav > li > a.uk-open {' . $navbar_item_color_active . '}';
		}

		$toggle_color  = '';
		$toggle_color .= ( isset( $settings->toggle_color ) && $settings->toggle_color ) ? 'color: ' . $settings->toggle_color . ';' : '';
		if ( $toggle_color ) {
			$css .= $addon_id . ' .uk-navbar-toggle {' . $toggle_color . '}';
		}

		$toggle_color_active  = '';
		$toggle_color_active .= ( isset( $settings->toggle_color_active ) && $settings->toggle_color_active ) ? 'color: ' . $settings->toggle_color_active . ';' : '';
		if ( $toggle_color_active ) {
			$css .= $addon_id . ' .uk-navbar-toggle:hover {' . $toggle_color_active . '}';
			$css .= $addon_id . ' .uk-navbar-toggle:focus {' . $toggle_color_active . '}';
			$css .= $addon_id . ' .uk-navbar-toggle.uk-open {' . $toggle_color_active . '}';
		}
		$label_text = '';
		$label_text = ( isset( $settings->label_text ) && $settings->label_text ) ? $settings->label_text : '';
		if ( $label_text ) {
			$css .= $addon_id . ' .uk-label { border-radius: 0px; font-size: 12px;}';
		}
		return $css;
	}
}
