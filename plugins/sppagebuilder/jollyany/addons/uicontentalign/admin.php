<?php

/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2011 - 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('restricted aceess');

SpAddonsConfig::addonConfig(
	array(
		'type' => 'content',
		'addon_name' => 'uicontentalign',
		'title' => JText::_('UI Content Align'),
		'desc' => JText::_('Control the alignment of inline elements depending on the viewport size.'),
		'icon'=>JURI::root() . 'plugins/sppagebuilder/jollyany/addons/uicontentalign/assets/images/icon.png',
		'category' => 'Jollyany',
		'attr' => array(
			'general' => array(
				'admin_label' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std' => '',
				),
				'card_title' => array(
					'type' => 'text',
					'title' => JText::_('Title'),
					'std' =>  'Title',
				),
				// Repeatable Items
				'ui_slideshow_items' => array(
					'title' => JText::_('Image Items'),
					'attr' => array(
						'media_item' => array(
							'type' => 'media',
							'title' => JText::_('Select Image'),
							'placeholder' => 'http://www.example.com/my-photo.jpg',
						),
						'image_alt' => array(
							'type' => 'text',
							'title' => JText::_('Image Alt'),
							'std' => 'Image Alt',
						),
						'image_panel' => array(
							'type' => 'checkbox',
							'title' => JText::_('Blend Mode Settings'),
							'values' => array(
								1 => JText::_('JYES'),
								0 => JText::_('JNO'),
							),
							'std' => 0,
						),
						'media_background'=>array(
							'type'=>'color',
							'title'=>JText::_('Background Color'),
							'desc'=>JText::_('Use the background color in combination with blend modes.'),
							'depends'=>array(
								array('image_panel', '=', 1)
							),
						),
						'media_blend_mode' => array(
							'type' => 'select',
							'title' => JText::_('Blend modes'),
							'desc' => JText::_('Determine how the image will blend with the background color.'),
							'values' => array(
								'' => JText::_('None'),
								'multiply' => JText::_('Multiply'),
								'screen' => JText::_('Screen'),
								'overlay' => JText::_('Overlay'),
								'darken' => JText::_('Darken'),
								'lighten' => JText::_('Lighten'),
								'color-dodge' => JText::_('Color Dodge'),
								'color-burn' => JText::_('Color Burn'),
								'hard-light' => JText::_('Hard Light'),
								'soft-light' => JText::_('Soft Light'),
								'difference' => JText::_('Difference'),
								'exclusion' => JText::_('Exclusion'),
								'hue' => JText::_('Hue'),
								'color' => JText::_('Color'),
								'luminosity' => JText::_('Luminosity'),
							),
							'std' => '',
							'depends'=>array(
								array('image_panel', '=', 1),
								array('media_background', '!=', '')
							),
						),
						'media_overlay'=>array(
							'type'=>'color',
							'title'=>JText::_('Overlay Color'),
							'desc'=>JText::_('Set an additional transparent overlay to soften the image.'),
							'depends'=>array(
								array('image_panel', '=', 1)
							),
						),
						'navigation_image_item' => array(
							'type' => 'media',
							'title' => JText::_('Navigation Thumbnail'),
							'desc' => JText::_('This option is only used if the thumbnail navigation is set.'),
							'placeholder' => 'http://www.example.com/my-photo.jpg',
						),
					),
				),
				'text' => array(
					'type' => 'editor',
					'title' => JText::_('Content'),
					'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>'
				),
				'title_link' => array(
					'type' => 'media',
					'format' => 'attachment',
					'title' => JText::_('Link'),
					'placeholder' => 'http://www.example.com',
					'hide_preview' => true,
				),
				'link_new_tab' => array(
					'type' => 'select',
					'title' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB'),
					'desc' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB_DESC'),
					'values' => array(
						'' => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_SAME_WINDOW'),
						'_blank' => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_NEW_WINDOW'),
					),
					'depends' => array(array('title_link', '!=', '')),
				),
				'button_title' => array(
					'type' => 'text',
					'title' => JText::_('Link Text'),
					'std' => 'Read more',
					'placeholder' => 'Read more',
					'depends' => array(array('title_link', '!=', '')),
				),
				'separator_slideshow_options' => array(
					'type' => 'separator',
					'title' => JText::_('SlideShow'),
				),
				'ratio' => array(
					'type' => 'text',
					'title' => JText::_('Ratio'),
					'desc' => JText::_('Set a ratio. It\'s recommended to use the same ratio of the background image. Just use its width and height, like 1600:900'),
					'std' => '',
					'placeholder' => '16:9',
					'depends' => array(
						array('height', '=', ''),
					),
				),
				'min_height' => array(
					'type' => 'slider',
					'title' => JText::_('Min Height'),
					'min' => 200,
					'max' => 800,
					'desc' => JText::_('Set the minimum height. This is useful if the content is too large on small devices'),
					'std' => 300,
				),
				'max_height' => array(
					'type' => 'slider',
					'title' => JText::_('Max Height'),
					'min' => 500,
					'max' => 1600,
					'desc' => JText::_('Set the maximum height'),
				),
				'box_shadow' => array(
					'type' => 'select',
					'title' => JText::_('Box Shadow'),
					'desc' => JText::_('Select the slideshow\'s box shadow size.'),
					'values' => array(
						'' => JText::_('None'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
					),
					'std' => '',
				),

				'separator_animations_options' => array(
					'type' => 'separator',
					'title' => JText::_('Animation'),
				),
				'slideshow_transition' => array(
					'type' => 'select',
					'title' => JText::_('Transition'),
					'desc' => JText::_('Select the transition between two slides'),
					'values' => array(
						'' => JText::_('Slide'),
						'pull' => JText::_('Pull'),
						'push' => JText::_('Push'),
						'fade' => JText::_('Fade'),
						'scale' => JText::_('Scale'),
					),
					'std' => '',
				),
				'velocity' => array(
					'type' => 'slider',
					'title' => JText::_('Velocity'),
					'desc' => JText::_('Set the velocity in pixels per milliseconds.'),
					'min' => 20,
					'max' => 300,
				),
				'autoplay' => array(
					'type' => 'checkbox',
					'title' => JText::_('Autoplay'),
					'desc' => JText::_('To activate Slideslide autoplays to the attribute. '),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
				),
				'pause' => array(
					'type' => 'checkbox',
					'title' => JText::_('Pause autoplay on hover'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('autoplay', '=', 1),
					)
				),
				'autoplay_interval' => array(
					'type' => 'slider',
					'title' => JText::_('Interval'),
					'desc' => JText::_('Set the autoplay interval in seconds.'),
					'placeholder'=>'7',
					'min' => 5,
					'max' => 15,
					'depends' => array(
						array('autoplay', '=', 1),
					)
				),
				'kenburns_transition' => array(
					'type' => 'select',
					'title' => JText::_('Ken Burns Effect'),
					'desc' => JText::_('Select the transformation origin for the Ken Burns animation'),
					'values' => array(
						'' => JText::_('None'),
						'top-left' => JText::_('Top Left'),
						'top-center' => JText::_('Top Center'),
						'top-right' => JText::_('Top Right'),
						'center-left' => JText::_('Center Left'),
						'center-center' => JText::_('Center Center'),
						'center-right' => JText::_('Center Right'),
						'bottom-left' => JText::_('Bottom Left'),
						'bottom-center' => JText::_('Bottom Center'),
						'bottom-right' => JText::_('Bottom Right'),
					),
					'std' => '',
				),
				'kenburns_duration' => array(
					'type' => 'slider',
					'title' => JText::_('Duration'),
					'min' => 10,
					'max' => 30,
					'std' => 15,
					'desc' => JText::_('Set the duration for the Ken Burns effect in seconds.'),
					'depends' => array(
						array('kenburns_transition', '!=', ''),
					),
				),
				'separator_navigation_options' => array(
					'type' => 'separator',
					'title' => JText::_('Navigation'),
				),
				'navigation' => array(
					'type' => 'select',
					'title' => JText::_('Navigation Display'),
					'desc' => JText::_('Select the navigation type.'),
					'values' => array(
						'' => JText::_('None'),
						'dotnav' => JText::_('Dotnav'),
						'thumbnav' => JText::_('Thumbnav'),
					),
					'std' => 'dotnav',
				),
				'navigation_below' => array(
					'type' => 'checkbox',
					'title' => JText::_('Show below slideshow'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('navigation', '!=', ''),
					),
				),
				'navigation_below_position' => array(
					'type' => 'select',
					'title' => JText::_('Position'),
					'desc' => JText::_('Select the position of the navigation.'),
					'values' => array(
						'left' => JText::_('Left'),
						'center' => JText::_('Center'),
						'right' => JText::_('Right'),
					),
					'std' => 'center',
					'depends' => array(
						array('navigation_below', '=', 1),
						array('navigation', '!=', ''),
					),
				),
				'navigation_below_margin' => array(
					'type' => 'select',
					'title' => JText::_('Margin'),
					'values' => array(
						'small-top' => JText::_('Small'),
						'top' => JText::_('Default'),
						'medium-top' => JText::_('Medium'),
					),
					'std' => 'top',
					'depends' => array(
						array('navigation_below', '=', 1),
						array('navigation', '!=', ''),
					),
				),
				'navigation_vertical' => array(
					'type' => 'checkbox',
					'title' => JText::_('Vertical navigation'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('navigation_below', '!=', 1),
						array('navigation', '!=', ''),
					),
				),
				'navigation_position' => array(
					'type' => 'select',
					'title' => JText::_('Position'),
					'desc' => JText::_('Select the position of the navigation.'),
					'values' => array(
						'top-left' => JText::_('Top Left'),
						'top-right' => JText::_('Top Right'),
						'center-left' => JText::_('Center Left'),
						'center-right' => JText::_('Center Right'),
						'bottom-left' => JText::_('Bottom Left'),
						'bottom-center' => JText::_('Bottom Center'),
						'bottom-right' => JText::_('Bottom Right'),
					),
					'std' => 'bottom-center',
					'depends' => array(
						array('navigation', '!=', ''),
					),
				),
				'navigation_margin' => array(
					'type' => 'select',
					'title' => JText::_('Margin'),
					'values' => array(
						'' => JText::_('None'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
					),
					'std' => 'medium',
					'depends' => array(
						array('navigation', '!=', ''),
					),
				),
				'navigation_breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Breakpoint'),
					'desc' => JText::_('Display the navigation only on this device width and larger'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone Landscape)'),
						'm' => JText::_('Medium (Tablet Landscape)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => 's',
					'depends' => array(
						array('navigation', '!=', ''),
					),
				),
				'navigation_color' => array(
					'type' => 'select',
					'title' => JText::_('Color'),
					'desc' => JText::_('Set light or dark color if the navigation is below the slideshow.'),
					'values' => array(
						'light' => JText::_('Light'),
						'' => JText::_('None'),
						'dark' => JText::_('Dark'),
					),
					'std' => '',
					'depends' => array(
						array('navigation', '!=', '')
					),
				),
				'thumbnav_wrap' => array(
					'type' => 'checkbox',
					'title' => JText::_('Thumbnav Wrap'),
					'desc' => JText::_('Don\'t wrap into multiple lines. Define whether thumbnails wrap into multiple lines or not if the container is too small.'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('navigation', '=', 'thumbnav'),
					),
				),
				'thumbnail_width' => array(
					'type' => 'slider',
					'title' => JText::_('Thumbnail Width'),
					'min' => 0,
					'max' => 400,
					'desc' => JText::_('Settings just one value preserves the original proportions. The image will be resized and croped automatically, and where possible, high resolution images will be auto-generated.'),
					'std' => 100,
					'depends' => array(
						array('navigation', '=', 'thumbnav'),
					),
				),

				'thumbnail_height' => array(
					'type' => 'slider',
					'title' => JText::_('Thumbnail Height'),
					'min' => 0,
					'max' => 400,
					'desc' => JText::_('Settings just one value preserves the original proportions. The image will be resized and croped automatically, and where possible, high resolution images will be auto-generated.'),
					'std' => 75,
					'depends' => array(
						array('navigation', '=', 'thumbnav'),
					),
				),
				'image_svg_inline' => array(
					'type' => 'checkbox',
					'title' => JText::_('Make SVG stylable with CSS'),
					'desc' => JText::_('Inject SVG images into the page markup, so that they can easily be styled with CSS.'),
					'std' => 0,
					'depends' => array(
						array('navigation', '=', 'thumbnav'),
					),
				),
				'image_svg_color' => array(
					'type' => 'select',
					'title' => JText::_('SVG Color'),
					'desc' => JText::_('Select the SVG color. It will only apply to supported elements defined in the SVG.'),
					'values' => array(
						'' => JText::_('None'),
						'muted' => JText::_('Muted'),
						'emphasis' => JText::_('Emphasis'),
						'primary' => JText::_('Primary'),
						'secondary' => JText::_('Secondary'),
						'success' => JText::_('Success'),
						'warning' => JText::_('Warning'),
						'danger' => JText::_('Danger'),
					),
					'std' => '',
					'depends' => array(
						array('navigation', '=', 'thumbnav'),
						array('image_svg_inline', '=', 1)
					),
				),
				'separator_slidenav_options' => array(
					'type' => 'separator',
					'title' => JText::_('SlideNav'),
				),
				'slidenav_position' => array(
					'type' => 'select',
					'title' => JText::_('Position'),
					'desc' => JText::_('Select the position of the slidenav.'),
					'values' => array(
						'' => JText::_('None'),
						'default' => JText::_('Default'),
						'outside' => JText::_('Outside'),
						'top-left' => JText::_('Top Left'),
						'top-right' => JText::_('Top Right'),
						'center-left' => JText::_('Center Left'),
						'center-right' => JText::_('Center Right'),
						'bottom-left' => JText::_('Bottom Left'),
						'bottom-center' => JText::_('Bottom Center'),
						'bottom-right' => JText::_('Bottom Right'),
					),
					'std' => 'default',
				),
				'slidenav_on_hover' => array(
					'type' => 'checkbox',
					'title' => JText::_('Show on hover only'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(array('slidenav_position', '!=', '')),
				),
				'larger_style' => array(
					'type' => 'checkbox',
					'title' => JText::_('Larger style'),
					'desc' => JText::_('To increase the size of the slidenav icons'),
					'values' => array(
						'0' => JText::_('JYES'),
						'1' => JText::_('JNO'),
					),
					'std' => '0',
					'depends' => array(array('slidenav_position', '!=', '')),
				),
				'slidenav_margin' => array(
					'type' => 'select',
					'title' => JText::_('Margin'),
					'desc' => JText::_('Apply a margin between the slidnav and the slideshow container.'),
					'values' => array(
						'' => JText::_('None'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
					),
					'std' => 'medium',
					'depends' => array(array('slidenav_position', '!=', '')),
				),
				'slidenav_breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Breakpoint'),
					'desc' => JText::_('Display the slidenav on this device width and larger.'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone Landscape)'),
						'm' => JText::_('Medium (Tablet Landscape)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => 's',
					'depends' => array(array('slidenav_position', '!=', '')),
				),

				'slidenav_outside_breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Outside Breakpoint'),
					'desc' => JText::_('Display the slidenav only outside on this device width and larger. Otherwise it will be displayed inside'),
					'values' => array(
						's' => JText::_('Small (Phone Landscape)'),
						'm' => JText::_('Medium (Tablet Landscape)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => 'xl',
					'depends' => array(
						array('slidenav_position', '=', 'outside')
					),
				),
				'slidenav_outside_color' => array(
					'type' => 'select',
					'title' => JText::_('Color'),
					'desc' => JText::_('Set light or dark color for slidenav.'),
					'values' => array(
						'light' => JText::_('Light'),
						'' => JText::_('Default'),
						'dark' => JText::_('Dark'),
					),
					'std' => '',
					'depends' => array(
						array('slidenav_position', '!=', ''),
					),
				),
				'separator_img_options' => array(
					'type' => 'separator',
					'title' => JText::_('Image'),
				),
				'image_alignment' => array(
					'type' => 'select',
					'title' => JText::_('Alignment'),
					'desc' => JText::_('Align the image to the top,left,right or place it between the title and the content'),
					'values' => array(
						'top' => JText::_('Top'),
						'bottom' => JText::_('Bottom'),
						'left' => JText::_('Left'),
						'right' => JText::_('Right'),
					),
					'std' => 'top',
				),
				'grid_width' => array(
					'type' => 'select',
					'title' => JText::_('Grid Width'),
					'desc' => JText::_('Define the width of the image within the grid. Choose between percent and fixed widths or expand columns to the width of their content.'),
					'values' => array(
						'1-2' => JText::_('50%'),
						'1-3' => JText::_('33%'),
						'1-4' => JText::_('25%'),
						'1-5' => JText::_('20%'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
						'2xlarge' => JText::_('2X-Large'),
					),
					'std' => '1-2',
					'depends' => array(
						array('image_alignment', '!=', 'top'),
						array('image_alignment', '!=', 'bottom'),
					),
				),
				'grid_column_gap' => array( 
					'type' => 'select',
					'title' => JText::_('Column Gap'),
					'desc' => JText::_('Set the size of the gap between the grid columns.'),
					'values' => array(
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'' => JText::_('Default'),
						'large' => JText::_('Large'),
						'collapse' => JText::_('None'),
					),
					'std' => '',
					'depends' => array(
						array('image_alignment', '!=', 'top'),
						array('image_alignment', '!=', 'bottom'),
					),
				),
				'grid_row_gap' => array( 
					'type' => 'select',
					'title' => JText::_('Row Gap'),
					'desc' => JText::_('Set the size of the gap between the grid rows.'),
					'values' => array(
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'' => JText::_('Default'),
						'large' => JText::_('Large'),
						'collapse' => JText::_('None'),
					),
					'std' => '',
					'depends' => array(
						array('image_alignment', '!=', 'top'),
						array('image_alignment', '!=', 'bottom'),
					),
				),
				'grid_breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Grid Breakpoint'),
					'desc' => JText::_('Set the breakpoint from which grid cells will stack.'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone Landscape)'),
						'm' => JText::_('Medium (Tablet Landscape)'),
						'l' => JText::_('Large (Desktop)'),
					),
					'std' => 'm',
					'depends' => array(
						array('image_alignment', '!=', 'top'),
						array('image_alignment', '!=', 'bottom'),
					),
				),
				'vertical_alignment' => array(
					'type' => 'checkbox',
					'title' => JText::_('Vertical Alignment'),
					'desc' => JText::_('Vertically center grid cells.'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 1,
					'depends' => array(
						array('image_alignment', '!=', 'top'),
						array('image_alignment', '!=', 'bottom'),
					),
				),
				'image_margin_top' => array(
					'type' => 'select',
					'title' => JText::_('Margin Top'),
					'desc' => JText::_('Set the top margin.'),
					'values' => array(
						'' => JText::_('Default'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
						'remove' => JText::_('None'),
					),
					'std' => '',
					'depends' => array(
						array('image_alignment', '!=', 'top'),
						array('image_alignment', '!=', 'left'),
						array('image_alignment', '!=', 'right'),
					),
				),
				'separator_title_style_options' => array(
					'type' => 'separator',
					'title' => JText::_('Title'),
				),
				'title_font_family'=>array(
					'type'=>'fonts',
					'title'=>JText::_('Font Family'),
					'selector'=> array(
						'type'=>'font',
						'font'=>'{{ VALUE }}',
						'css'=>'.ui-title { font-family: {{ VALUE }}; }',
					)
				),
				'heading_style' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Heading styles differ in font-size but may also come with a predefined color, size and font'),
					'values' => array(
						'' => JText::_('Default'),
						'heading-2xlarge' => JText::_('2XLarge'),
						'heading-xlarge' => JText::_('XLarge'),
						'heading-large' => JText::_('Large'),
						'heading-medium' => JText::_('Medium'),
						'heading-small' => JText::_('Small'),
						'h1' => JText::_('H1'),
						'h2' => JText::_('H2'),
						'h3' => JText::_('H3'),
						'h4' => JText::_('H4'),
						'h5' => JText::_('H5'),
						'h6' => JText::_('H6'),
					),
					'std' => '',
				),
				'title_decoration' => array(
					'type' => 'select',
					'title' => JText::_('Decoration'),
					'desc' => JText::_('Decorate the title with a divider, bullet or a line that is vertically centered to the title'),
					'values' => array(
						'' => JText::_('None'),
						'uk-heading-divider' => JText::_('Divider'),
						'uk-heading-bullet' => JText::_('Bullet'),
						'uk-heading-line' => JText::_('Line'),
					),
					'std' => '',
				),
				'title_color' => array(
					'type' => 'select',
					'title' => JText::_('Predefined Color'),
					'desc' => JText::_('Select the predefined title text color.'),
					'values' => array(
						'' => JText::_('Default'),
						'muted' => JText::_('Muted'),
						'emphasis' => JText::_('Emphasis'),
						'primary' => JText::_('Primary'),
						'secondary' => JText::_('Secondary'),
						'success' => JText::_('Success'),
						'warning' => JText::_('Warning'),
						'danger' => JText::_('Danger'),
					),
					'std' => '',
				),
				'custom_title_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Custom Color'),
					'depends' => array(
						array('title_color', '=', '')
					),
				),
				'heading_selector' => array(
					'type' => 'select',
					'title' => JText::_('HTML Element'),
					'desc' => JText::_('Choose one of the six heading elements to fit your semantic structure.'),
					'values' => array(
						'h1' => JText::_('h1'),
						'h2' => JText::_('h2'),
						'h3' => JText::_('h3'),
						'h4' => JText::_('h4'),
						'h5' => JText::_('h5'),
						'h6' => JText::_('h6'),
						'div' => JText::_('div'),
					),
					'std' => 'h3',
				),
				'title_margin_top' => array(
					'type' => 'select',
					'title' => JText::_('Margin Top'),
					'desc' => JText::_('Set the top margin.'),
					'values' => array(
						'' => JText::_('Default'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
						'remove' => JText::_('None'),
					),
					'std' => '',
				),
				'separator_content_style_options' => array(
					'type' => 'separator',
					'title' => JText::_('Content'),
				),
				'content_font_family'=>array(
					'type'=>'fonts',
					'title'=>JText::_('Font Family'),
					'selector'=> array(
						'type'=>'font',
						'font'=>'{{ VALUE }}',
						'css'=>'.ui-content { font-family: {{ VALUE }}; }',
					)
				),
				'content_style' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Select a predefined meta text style, including color, size and font-family'),
					'values' => array(
						'' => JText::_('Default'),
						'text-lead' => JText::_('Lead'),
					),
					'std' => '',
				),
				'content_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Color'),
				),
				'content_margin_top' => array(
					'type' => 'select',
					'title' => JText::_('Margin Top'),
					'desc' => JText::_('Set the top margin.'),
					'values' => array(
						'' => JText::_('Default'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
						'remove' => JText::_('None'),
					),
					'std' => '',
				),

				'separator_button_style_options' => array(
					'type' => 'separator',
					'title' => JText::_('Link'),
				),
				'link_button_style' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Set the button style.'),
					'values' => array(
						'' => JText::_('Default'),
						'primary' => JText::_('Primary'),
						'secondary' => JText::_('Secondary'),
						'danger' => JText::_('Danger'),
						'text' => JText::_('Text'),
						'link' => JText::_('Link'),
						'link-muted' => JText::_('Link Muted'),
						'link-text' => JText::_('Link Text'),
						'custom' => JText::_('Custom'),
					),
					'std' => '',
				),
				'separator_button_custom_options' => array(
					'type' => 'separator',
					'title' => JText::_('Custom Button Style'),
					'depends' => array(
						array('link_button_style', '=', 'custom'),
					),
				),
				'button_font_family' => array(
					'type' => 'fonts',
					'title' => JText::_('Font Family'),
					'depends' => array(
						array('link_button_style', '=', 'custom'),
					),
					'selector' => array(
						'type' => 'font',
						'font' => '{{ VALUE }}',
						'css' => '.uk-button-custom { font-family: {{ VALUE }}; }',
					)
				),
				'button_background' => array(
					'type' => 'color',
					'title' => JText::_('Background Color'),
					'std' => '#1e87f0',
					'depends' => array(
						array('link_button_style', '=', 'custom'),
					),
				),
				'button_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Button Color'),
					'depends' => array(
						array('link_button_style', '=', 'custom'),
					),
				),
				'button_background_hover' => array(
					'type' => 'color',
					'title' => JText::_('Hover Background Color'),
					'std' => '#0f7ae5',
					'depends' => array(
						array('link_button_style', '=', 'custom'),
					),
				),
				'button_hover_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Hover Button Color'),
					'depends' => array(
						array('link_button_style', '=', 'custom'),
					),
				),
				'link_button_size' => array(
					'type' => 'select',
					'title' => JText::_('Button Size'),
					'values' => array(
						'' => JText::_('Default'),
						'uk-button-small' => JText::_('Small'),
						'uk-button-large' => JText::_('Large'),
					),
					'std' => '',
				),
				'button_margin_top' => array(
					'type' => 'select',
					'title' => JText::_('Margin Top'),
					'desc' => JText::_('Set the top margin.'),
					'values' => array(
						'' => JText::_('Default'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
						'remove' => JText::_('None'),
					),
					'std' => '',
				),

				'separator_general_options' => array(
					'type' => 'separator',
					'title' => JText::_('General'),
				),
				'addon_margin' => array(
					'type' => 'select',
					'title' => JText::_('Margin'),
					'desc' => JText::_('Set the vertical margin. Note: The first element\'s top margin and the last element\'s bottom margin are always removed. Define those in the grid settings instead.'),
					'values' => array(
						'' => JText::_('Keep existing'),
						'small' => JText::_('Small'),
						'default' => JText::_('Default'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
						'remove-vertical' => JText::_('None'),
					),
					'std' => '',
				),
				'addon_max_width' => array(
					'type' => 'select',
					'title' => JText::_('Max Width'),
					'desc' => JText::_('Set the maximum content width.'),
					'values' => array(
						'' => JText::_('None'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
						'2xlarge' => JText::_('2X-Large'),
					),
					'std' => '',
				),
				'addon_max_width_breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Max Width Breakpoint'),
					'desc' => JText::_('Define the device width from which the element\'s max-width will apply.'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone Landscape)'),
						'm' => JText::_('Medium (Tablet Landscape)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => '',
					'depends' => array(array('addon_max_width', '!=', '')),
				),
				'block_align'=>array(
					'type'=>'select',
					'title'=>JText::_('Block Alignment'),
					'desc'=>JText::_('Define the alignment in case the container exceeds the element\'s max-width.'),
					'values'=>array(
						''=>JText::_('Left'),
						'center'=>JText::_('Center'),
						'right'=>JText::_('Right'),
					),
					'std'=>'',
					'depends'=>array(array('addon_max_width', '!=', '')),
				),
				'block_align_breakpoint'=>array(
					'type'=>'select',
					'title'=>JText::_('Block Alignment Breakpoint'),
					'desc'=>JText::_('Define the device width from which the alignment will apply.'),
					'values'=>array(
						''=>JText::_('Always'),
						's'=>JText::_('Small (Phone Landscape)'),
						'm'=>JText::_('Medium (Tablet Landscape)'),
						'l'=>JText::_('Large (Desktop)'),
						'xl'=>JText::_('X-Large (Large Screens)'),
					),
					'std'=>'',
					'depends'=>array(array('addon_max_width', '!=', '')),
				),
				'block_align_fallback'=>array(
					'type'=>'select',
					'title'=>JText::_('Block Alignment Fallback'),
					'desc'=>JText::_('Define the alignment in case the container exceeds the element\'s max-width.'),
					'values'=>array(
						''=>JText::_('Left'),
						'center'=>JText::_('Center'),
						'right'=>JText::_('Right'),
					),
					'std'=>'',
					'depends'=>array(
					  array('addon_max_width', '!=', ''),
					  array('block_align_breakpoint', '!=', '')
					),
				),
				'alignment' => array(
					'type' => 'select',
					'title' => JText::_('Text Alignment'),
					'desc' => JText::_('Center, left and right alignment.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'uk-text-left' => JText::_('Left'),
						'uk-text-center' => JText::_('Center'),
						'uk-text-right' => JText::_('Right'),
						'uk-text-justify' => JText::_('Justify'),
					),
					'std' => '',
				),
				'text_breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Text Alignment Breakpoint'),
					'desc' => JText::_('Display the text alignment only on this device width and larger'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone Landscape)'),
						'm' => JText::_('Medium (Tablet Landscape)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => '',
					'depends' => array(array('alignment', '!=', '')),
				),
				'text_alignment_fallback' => array(
					'type' => 'select',
					'title' => JText::_('Text Alignment Fallback'),
					'desc' => JText::_('Define an alignment fallback for device widths below the breakpoint'),
					'values' => array(
						'' => JText::_('Inherit'),
						'left' => JText::_('Left'),
						'center' => JText::_('Center'),
						'right' => JText::_('Right'),
						'justify' => JText::_('Justify'),
					),
					'std' => '',
					'depends' => array(
						array('text_breakpoint', '!=', ''),
						array('alignment', '!=', '')
					),
				),
				'animation' => array(
					'type' => 'select',
					'title' => JText::_('Animation'),
					'desc' => JText::_('A collection of smooth animations to use within your page.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'fade' => JText::_('Fade'),
						'scale-up' => JText::_('Scale Up'),
						'scale-down' => JText::_('Scale Down'),
						'slide-top-small' => JText::_('Slide Top Small'),
						'slide-bottom-small' => JText::_('Slide Bottom Small'),
						'slide-left-small' => JText::_('Slide Left Small'),
						'slide-right-small' => JText::_('Slide Right Small'),
						'slide-top-medium' => JText::_('Slide Top Medium'),
						'slide-bottom-medium' => JText::_('Slide Bottom Medium'),
						'slide-left-medium' => JText::_('Slide Left Medium'),
						'slide-right-medium' => JText::_('Slide Right Medium'),
						'slide-top' => JText::_('Slide Top 100%'),
						'slide-bottom' => JText::_('Slide Bottom 100%'),
						'slide-left' => JText::_('Slide Left 100%'),
						'slide-right' => JText::_('Slide Right 100%'),
						'parallax' => JText::_('Parallax'),
					),
					'std' => '',
				),
				'animation_repeat' => array(
					'type' => 'checkbox',
					'title' => JText::_('Repeat Animation'),
					'desc' => JText::_('Applies the animation class every time the element is in view'),
					'std' => 0,
					'depends' => array(
						array('animation', '!=', ''),
						array('animation', '!=', 'parallax'),
					),
				),

				'separator_parallax_options' => array(
					'type' => 'separator',
					'title' => JText::_('Parallax Animation Settings'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'horizontal_start' => array(
					'type' => 'slider',
					'title' => JText::_('Horizontal Start'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the horizontal position (translateX) in pixels.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'horizontal_end' => array(
					'type' => 'slider',
					'title' => JText::_('Horizontal End'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the horizontal position (translateX) in pixels.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'vertical_start' => array(
					'type' => 'slider',
					'title' => JText::_('Vertical Start'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the vertical position (translateY) in pixels.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'vertical_end' => array(
					'type' => 'slider',
					'title' => JText::_('Vertical End'),
					'min' => -600,
					'max' => 600,
					'desc' => JText::_('Animate the vertical position (translateY) in pixels.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'scale_start' => array(
					'type' => 'slider',
					'title' => JText::_('Scale Start'),
					'min' => 50,
					'max' => 200,
					'desc' => JText::_('Animate the scaling. Min: 50, Max: 200 =>  100 means 100% scale, 200 means 200% scale, and 50 means 50% scale.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'scale_end' => array(
					'type' => 'slider',
					'title' => JText::_('Scale End'),
					'min' => 50,
					'max' => 200,
					'desc' => JText::_('Animate the scaling. Min: 50, Max: 200 =>  100 means 100% scale, 200 means 200% scale, and 50 means 50% scale.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'rotate_start' => array(
					'type' => 'slider',
					'title' => JText::_('Rotate Start'),
					'min' => 0,
					'max' => 360,
					'desc' => JText::_('Animate the rotation clockwise in degrees.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'rotate_end' => array(
					'type' => 'slider',
					'title' => JText::_('Rotate End'),
					'min' => 0,
					'max' => 360,
					'desc' => JText::_('Animate the rotation clockwise in degrees.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'opacity_start' => array(
					'type' => 'slider',
					'title' => JText::_('Opacity Start'),
					'min' => 0,
					'max' => 100,
					'desc' => JText::_('Animate the opacity. 100 means 100% opacity, and 0 means 0% opacity.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'opacity_end' => array(
					'type' => 'slider',
					'title' => JText::_('Opacity End'),
					'min' => 0,
					'max' => 100,
					'desc' => JText::_('Animate the opacity. 100 means 100% opacity, and 0 means 0% opacity.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'easing' => array(
					'type' => 'slider',
					'title' => JText::_('Easing'),
					'min' => -200,
					'max' => 200,
					'desc' => JText::_('Set the animation easing. A value below 100 is faster in the beginning and slower towards the end while a value above 100 behaves inversely.'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'viewport' => array(
					'type' => 'slider',
					'title' => JText::_('Viewport'),
					'min' => 10,
					'max' => 100,
					'desc' => JText::_('Set the animation end point relative to viewport height, e.g. 50 for 50% of the viewport'),
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'parallax_target' => array(
					'type' => 'checkbox',
					'title' => JText::_('Target'),
					'desc' => JText::_('Animate the element as long as the section is visible.'),
					'std' => 0,
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'parallax_zindex' => array(
					'type' => 'checkbox',
					'title' => JText::_('Z Index'),
					'desc' => JText::_('Set a higher stacking order.'),
					'std' => 0,
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'breakpoint' => array(
					'type' => 'select',
					'title' => JText::_('Breakpoint'),
					'desc' => JText::_('Display the parallax effect only on this device width and larger. It is useful to disable the parallax animation on small viewports.'),
					'values' => array(
						'' => JText::_('Always'),
						's' => JText::_('Small (Phone)'),
						'm' => JText::_('Medium (Tablet)'),
						'l' => JText::_('Large (Desktop)'),
						'xl' => JText::_('X-Large (Large Screens)'),
					),
					'std' => '',
					'depends' => array(array('animation', '=', 'parallax')),
				),
				'visibility' => array(
					'type' => 'select',
					'title' => JText::_('Visibility'),
					'desc' => JText::_('Display the element only on this device width and larger.'),
					'values' => array(
						'' => JText::_('Always'),
						'uk-visible@s' => JText::_('Small (Phone Landscape)'),
						'uk-visible@m' => JText::_('Medium (Tablet Landscape)'),
						'uk-visible@l' => JText::_('Large (Desktop)'),
						'uk-visible@xl' => JText::_('X-Large (Large Screens)'),
						'uk-hidden@s' => JText::_('Hidden Small (Phone Landscape)'),
						'uk-hidden@m' => JText::_('Hidden Medium (Tablet Landscape)'),
						'uk-hidden@l' => JText::_('Hidden Large (Desktop)'),
						'uk-hidden@xl' => JText::_('Hidden X-Large (Large Screens)'),
					),
					'std' => '',
				),
				'class' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
					'std' => '',
				),
			),
		),
	)
);
