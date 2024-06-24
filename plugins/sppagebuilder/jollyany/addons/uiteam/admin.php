<?php

/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2011 - 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('Restricted access');

SpAddonsConfig::addonConfig(
	array(
		'type' => 'repeatable',
		'addon_name' => 'uiteam',
		'title' => JText::_('UI Team'),
		'desc' => JText::_('Create a responsive team slider.'),
		'icon'=>JURI::root() . 'plugins/sppagebuilder/jollyany/addons/uiteam/assets/images/icon.png',
		'category' => 'Jollyany',
		'attr' => array(
			'general' => array(
				'admin_label' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std' => '',
				),
				'title_addon' => array(
					'type' => 'text',
					'title' => JText::_('Title'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
					'std' =>  '',
				),
				'title_heading_style' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Heading styles differ in font-size but may also come with a predefined color, size and font'),
					'values' => array(
						'' => JText::_('None'),
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
					'std' => 'h3',
					'depends' => array(array('title_addon', '!=', '')),
				),
				'title_heading_margin' => array(
					'type' => 'select',
					'title' => JText::_('Title Margin'),
					'desc' => JText::_('Set the vertical margin for title.'),
					'values' => array(
						'' => JText::_('Keep existing'),
						'uk-margin-small' => JText::_('Small'),
						'uk-margin' => JText::_('Default'),
						'uk-margin-medium' => JText::_('Medium'),
						'uk-margin-large' => JText::_('Large'),
						'uk-margin-xlarge' => JText::_('X-Large'),
						'uk-margin-remove-vertical' => JText::_('None'),
					),
					'std' => 'uk-margin',
					'depends' => array(array('title_addon', '!=', '')),
				),
				'title_heading_decoration' => array(
					'type' => 'select',
					'title' => JText::_('Decoration'),
					'desc' => JText::_('Decorate the heading with a divider, bullet or a line that is vertically centered to the heading'),
					'values' => array(
						'' => JText::_('None'),
						'uk-heading-divider' => JText::_('Divider'),
						'uk-heading-bullet' => JText::_('Bullet'),
						'uk-heading-line' => JText::_('Line'),
					),
					'std' => '',
					'depends' => array(array('title_addon', '!=', '')),
				),
				'title_heading_color' => array(
					'type' => 'select',
					'title' => JText::_('Color'),
					'desc' => JText::_('Select the text color. If the Background option is selected, styles that don\'t apply a background image use the primary color instead.'),
					'values' => array(
						'' => JText::_('None'),
						'text-muted' => JText::_('Muted'),
						'text-emphasis' => JText::_('Emphasis'),
						'text-primary' => JText::_('Primary'),
						'text-secondary' => JText::_('Secondary'),
						'text-success' => JText::_('Success'),
						'text-warning' => JText::_('Warning'),
						'text-danger' => JText::_('Danger'),
						'text-background' => JText::_('Background'),
					),
					'std' => '',
					'depends' => array(array('title_addon', '!=', '')),
				),
				'title_heading_selector' => array(
					'type' => 'select',
					'title' => JText::_('HTML Element'),
					'desc' => JText::_('Choose one of the seven heading elements to fit your semantic structure.'),
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
					'depends' => array(array('title_addon', '!=', '')),
				),
				// Repeatable Items
				'ui_team_item' => array(
					'title' => JText::_('Items'),
					'attr' => array(
						'avatar' => array(
							'type' => 'media',
							'title' => JText::_('Image'),
							'placeholder' => 'http://www.example.com/my-photo.jpg',
						),
						'image_panel' => array(
							'type' => 'checkbox',
							'title' => JText::_('Image Settings'),
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
						'title' => array(
							'type' => 'text',
							'title' => JText::_('Name'),
							'desc' => JText::_('Input the name of the person'),
							'std' => 'Jane Ayres',
						),
						'email' => array(
							'type' => 'text',
							'title' => JText::_('Email'),
							'desc' => JText::_('Input the person\'s email.'),
							'placeholder' => 'hello@example.com',
							'std' => '',
						),
						'designation' => array(
							'type' => 'text',
							'title' => JText::_('Designation'),
							'desc' => JText::_('Input the person\'s designation.'),
							'placeholder' => 'Designer',
							'std' => 'Designer',
						),
						'introtext' => array(
							'type' => 'editor',
							'title' => JText::_('Description'),
							'desc' => JText::_('Input the person\'s description'),
							'std' => '',
						),

						'socials' => array(
							'type' => 'checkbox',
							'title' => JText::_('Social Icons'),
							'desc' => JText::_('Show social icons link for team'),
							'std' => 0,
						),
						'facebook' => array(
							'type' => 'text',
							'title' => JText::_('Facebook'),
							'std' => 'http://www.facebook.com/TemPlaza',
							'depends' => array('socials' => 1)
						),

						'twitter' => array(
							'type' => 'text',
							'title' => JText::_('Twitter'),
							'std' => 'http://twitter.com/TemPlaza',
							'depends' => array('socials' => 1)
						),

						'youtube' => array(
							'type' => 'text',
							'title' => JText::_('Youtube'),
							'depends' => array('socials' => 1),
						),

						'linkedin' => array(
							'type' => 'text',
							'title' => JText::_('Linkedin'),
							'depends' => array('socials' => 1),
						),

						'pinterest' => array(
							'type' => 'text',
							'title' => JText::_('Pinterest'),
							'depends' => array('socials' => 1),
						),

						'flickr' => array(
							'type' => 'text',
							'title' => JText::_('Flickr'),
							'depends' => array('socials' => 1),
						),

						'dribbble' => array(
							'type' => 'text',
							'title' => JText::_('Dribbble'),
							'depends' => array('socials' => 1),
						),

						'behance' => array(
							'type' => 'text',
							'title' => JText::_('Behance'),
							'depends' => array('socials' => 1),
						),

						'instagram' => array(
							'type' => 'text',
							'title' => JText::_('Instagram'),
							'depends' => array('socials' => 1),
							'std' => 'https://www.instagram.com',
						),
					),
				),
				'layout_mode' => array(
					'type' => 'select',
					'title' => JText::_('Layout Mode'),
					'values' => array(
						'grid' => JText::_('Grid'),
						'' => JText::_('Slider'),
					),
					'std' => '',
				),

				'separator_card_options' => array(
					'type' => 'separator',
					'title' => JText::_('Card'),
				),
				'card_styles' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Select on of the boxed card styles or a blank card.'),
					'values' => array(
						'' => JText::_('None'),
						'default' => JText::_('Card Default'),
						'primary' => JText::_('Card Primary'),
						'secondary' => JText::_('Card Secondary'),
						'hover' => JText::_('Card Hover'),
						'custom' => JText::_('Custom'),
					),
					'std' => '',
				),
				'card_background' => array(
					'type' => 'color',
					'title' => JText::_('Background Color'),
					'std' => '#1e87f0',
					'depends' => array(array('card_styles', '=', 'custom')),
				),
				'card_color' => array(
					'type' => 'color',
					'title' => JText::_('Color'),
					'depends' => array(array('card_styles', '=', 'custom')),
				),
				'card_size' => array(
					'type' => 'select',
					'title' => JText::_('Size'),
					'desc' => JText::_('Define the card\'s size by selecting the padding between the card and its content.'),
					'values' => array(
						'' => JText::_('Default'),
						'small' => JText::_('Small'),
						'large' => JText::_('Large'),
					),
					'std' => '',
					'depends' => array(array('card_styles', '!=', '')),
				),
				'image_padding' => array(
					'type' => 'checkbox',
					'title' => JText::_('Align image without padding'),
					'desc' => JText::_('Top, left or right aligned images can be attached to the card\'s edge. If image is aligned to the left or right, it will also exten to cover the whole space'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends'=>array(array('card_styles', '!=', '')),
				),
				'card_content_padding' => array(
					'type' => 'select',
					'title' => JText::_('Padding'),
					'desc' => JText::_('Add padding to the content if the image is top, bottom, left or right aligned.'),
					'values' => array(
						'' => JText::_('None'),
						'small' => JText::_('Small'),
						'default' => JText::_('Default'),
						'large' => JText::_('Large'),
					),
					'std' => '',
					'depends' => array(array('card_styles', '=', '')),
				),
				'card_width' => array(
					'type' => 'select',
					'title' => JText::_('Max Width'),
					'desc' => JText::_('Set the maximum width.'),
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
				'separator_person_options' => array(
					'type' => 'separator',
					'title' => JText::_('Image'),
				),
				'image_styles' => array(
					'type' => 'select',
					'title' => JText::_('Border'),
					'desc' => JText::_('To modify the border radius of an element, like an image.'),
					'values' => array(
						'' => JText::_('Default'),
						'rounded' => JText::_('Rounded'),
						'circle' => JText::_('Circle'),
						'pill' => JText::_('Pill'),
					),
					'std' => '',
					'depends' => array(
						array('image_padding', '!=', 1)
					),
				),
				'image_transition' => array(
					'type' => 'select',
					'title' => JText::_('Image Transition'),
					'desc' => JText::_('Select the image\'s transition style.'),
					'values' => array(
						'' => JText::_('None'),
						'scale-up' => JText::_('Scales Up'),
						'scale-down' => JText::_('Scales Down'),
					),
					'std' => '',
				),
				'box_shadow' => array(
					'type' => 'select',
					'title' => JText::_('Box Shadow'),
					'desc' => JText::_('Select the card\'s box shadow size.'),
					'values' => array(
						'' => JText::_('None'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
					),
					'std' => '',
					'depends' => array(
						array('card_styles', '=', '')
					),
				),
				'hover_box_shadow' => array(
					'type' => 'select',
					'title' => JText::_('Hover Box Shadow'),
					'desc' => JText::_('Select the card\'s box shadow size on hover.'),
					'values' => array(
						'' => JText::_('None'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
						'xlarge' => JText::_('X-Large'),
					),
					'std' => '',
					'depends' => array(
						array('card_styles', '=', '')
					),
				),

				'separator_grid_options' => array(
					'type' => 'separator',
					'title' => JText::_('Grid'),
					'depends' => array(
						array('layout_mode', '=', 'grid'),
					),
				),

				'masonry' => array(
					'type' => 'checkbox',
					'title' => JText::_('Enable masonry effect'),
					'desc' => JText::_('The masonry effect creates a layout free of gap even if grid cell have different height.'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('layout_mode', '=', 'grid'),
					),
				),
				'grid_parallax' => array(
					'type' => 'slider',
					'title' => JText::_('Parallax'),
					'desc' => JText::_('To move single columns of a grid at different speeds while scrolling'),
					'min' => 0,
					'max' => 600,
					'std' => '',
					'depends' => array(
						array('layout_mode', '=', 'grid'),
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
						array('layout_mode', '=', 'grid'),
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
						array('layout_mode', '=', 'grid'),
					),
				),				
				'grid_divider' => array(
					'type' => 'checkbox',
					'title' => JText::_('Show dividers'),
					'desc' => JText::_('Select this option to separate grid cells with lines.'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('layout_mode', '=', 'grid'),
						array('grid_column_gap', '!=', 'collapse'),
						array('grid_row_gap', '!=', 'collapse'),
					),
				),
				'grid_column_align' => array(
					'type' => 'checkbox',
					'title' => JText::_('Center columns'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('layout_mode', '=', 'grid'),
					),
				),
				'grid_row_align' => array(
					'type' => 'checkbox',
					'title' => JText::_('Center rows'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('layout_mode', '=', 'grid'),
					),
				),
				'separator_grid_columns_options' => array(
					'type' => 'separator',
					'title' => JText::_('Columns'),
					'depends' => array(
						array('layout_mode', '=', 'grid'),
					),
				),
				'g_phone_portrait' => array(
					'type' => 'select',
					'title' => JText::_('Phone Portrait'),
					'desc' => JText::_('Set the number of grid columns for each breakpoint. Inherit refers to the number of columns on the next smaller screen size.'),
					'values' => array(
						'1' => JText::_('1 Columns'),
						'2' => JText::_('2 Columns'),
						'3' => JText::_('3 Columns'),
						'4' => JText::_('4 Columns'),
						'5' => JText::_('5 Columns'),
						'6' => JText::_('6 Columns'),
						'auto' => JText::_('Auto'),
					),
					'std' => '1',
					'depends' => array(
						array('layout_mode', '=', 'grid'),
					),
				),
				'g_phone_landscape' => array(
					'type' => 'select',
					'title' => JText::_('Phone Landscape'),
					'desc' => JText::_('Set the number of grid columns for each breakpoint. Inherit refers to the number of columns on the next smaller screen size.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'1' => JText::_('1 Columns'),
						'2' => JText::_('2 Columns'),
						'3' => JText::_('3 Columns'),
						'4' => JText::_('4 Columns'),
						'5' => JText::_('5 Columns'),
						'6' => JText::_('6 Columns'),
						'auto' => JText::_('Auto'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '=', 'grid'),
					),
				),
				'g_tablet_landscape' => array(
					'type' => 'select',
					'title' => JText::_('Tablet Landscape'),
					'desc' => JText::_('Set the number of grid columns for each breakpoint. Inherit refers to the number of columns on the next smaller screen size.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'1' => JText::_('1 Columns'),
						'2' => JText::_('2 Columns'),
						'3' => JText::_('3 Columns'),
						'4' => JText::_('4 Columns'),
						'5' => JText::_('5 Columns'),
						'6' => JText::_('6 Columns'),
						'auto' => JText::_('Auto'),
					),
					'std' => '3',
					'depends' => array(
						array('layout_mode', '=', 'grid'),
					),
				),
				'g_desktop' => array(
					'type' => 'select',
					'title' => JText::_('Desktop'),
					'desc' => JText::_('Set the number of grid columns for each breakpoint. Inherit refers to the number of columns on the next smaller screen size.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'1' => JText::_('1 Columns'),
						'2' => JText::_('2 Columns'),
						'3' => JText::_('3 Columns'),
						'4' => JText::_('4 Columns'),
						'5' => JText::_('5 Columns'),
						'6' => JText::_('6 Columns'),
						'auto' => JText::_('Auto'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '=', 'grid'),
					),
				),
				'g_large_screens' => array(
					'type' => 'select',
					'title' => JText::_('Large Screens'),
					'desc' => JText::_('Set the number of grid columns for each breakpoint. Inherit refers to the number of columns on the next smaller screen size.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'1' => JText::_('1 Columns'),
						'2' => JText::_('2 Columns'),
						'3' => JText::_('3 Columns'),
						'4' => JText::_('4 Columns'),
						'5' => JText::_('5 Columns'),
						'6' => JText::_('6 Columns'),
						'auto' => JText::_('Auto'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '=', 'grid'),
					),
				),

				'separator_slider_options' => array(
					'type' => 'separator',
					'title' => JText::_('Slider'),
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'width_mode' => array(
					'type' => 'select',
					'title' => JText::_('Item Width Mode'),
					'desc' => JText::_('Define whether the width of the slider items is fixed or automatically expanded by its content widths'),
					'values' => array(
						'fixed' => JText::_('Fixed'),
						'' => JText::_('Auto'),
					),
					'std' => 'fixed',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'height' => array(
					'type' => 'select',
					'title' => JText::_('Height'),
					'desc' => JText::_('The height will adapt automatically based on its content. Alternatively, the height can adapt to the height of viewport. <br/> Note: Make sure, no height is set in the section settings when using on of the viewport options.'),
					'values' => array(
						'' => JText::_('Auto'),
						'full' => JText::_('Viewport'),
						'percent' => JText::_('Viewport (Minus 20%)'),
						'section' => JText::_('Viewport (Minus the following section)'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('width_mode', '!=', '')
					),
				),
				'min_height' => array(
					'type' => 'slider',
					'title' => JText::_('Min Height'),
					'desc' => JText::_('Set the minimum height. This is useful if the content is too large on small devices.'),
					'min' => -600,
					'max' => 600,
					'std' => 300,
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('width_mode', '!=', ''),
						array('height', '!=', '')
					),
				),
				'team_grid_column_gap' => array( 
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
						array('layout_mode', '!=', 'grid'),
					),
				),
				'divider' => array(
					'type' => 'checkbox',
					'title' => JText::_('Show dividers'),
					'desc' => JText::_('Select this option to separate grid cells with lines.'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('width_mode', '!=', ''),
						array('team_grid_column_gap', '!=', 'collapse'),
					),
				),
				'separator_columns_options' => array(
					'type' => 'separator',
					'title' => JText::_('Item Width'),
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('width_mode', '!=', '')
					),
				),
				'phone_portrait' => array(
					'type' => 'select',
					'title' => JText::_('Phone Portrait'),
					'desc' => JText::_('Set the number of grid columns for each breakpoint. Inherit refers to the number of columns on the next smaller screen size.'),
					'values' => array(
						'1-1' => JText::_('100%'),
						'5-6' => JText::_('83%'),
						'4-5' => JText::_('80%'),
						'3-5' => JText::_('60%'),
						'1-2' => JText::_('50%'),
						'1-3' => JText::_('33%'),
						'1-4' => JText::_('25%'),
						'1-5' => JText::_('20%'),
						'1-6' => JText::_('16%'),
					),
					'std' => '1-1',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('width_mode', '!=', '')
					),
				),
				'phone_landscape' => array(
					'type' => 'select',
					'title' => JText::_('Phone Landscape'),
					'desc' => JText::_('Set the number of grid columns for each breakpoint. Inherit refers to the number of columns on the next smaller screen size.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'1-1' => JText::_('100%'),
						'5-6' => JText::_('83%'),
						'4-5' => JText::_('80%'),
						'3-5' => JText::_('60%'),
						'1-2' => JText::_('50%'),
						'1-3' => JText::_('33%'),
						'1-4' => JText::_('25%'),
						'1-5' => JText::_('20%'),
						'1-6' => JText::_('16%'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('width_mode', '!=', '')
					),
				),
				'tablet_landscape' => array(
					'type' => 'select',
					'title' => JText::_('Tablet Landscape'),
					'desc' => JText::_('Set the number of grid columns for each breakpoint. Inherit refers to the number of columns on the next smaller screen size.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'1-1' => JText::_('100%'),
						'5-6' => JText::_('83%'),
						'4-5' => JText::_('80%'),
						'3-5' => JText::_('60%'),
						'1-2' => JText::_('50%'),
						'1-3' => JText::_('33%'),
						'1-4' => JText::_('25%'),
						'1-5' => JText::_('20%'),
						'1-6' => JText::_('16%'),
					),
					'std' => '1-3',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('width_mode', '!=', '')
					),
				),
				'desktop' => array(
					'type' => 'select',
					'title' => JText::_('Desktop'),
					'desc' => JText::_('Set the number of grid columns for each breakpoint. Inherit refers to the number of columns on the next smaller screen size.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'1-1' => JText::_('100%'),
						'5-6' => JText::_('83%'),
						'4-5' => JText::_('80%'),
						'3-5' => JText::_('60%'),
						'1-2' => JText::_('50%'),
						'1-3' => JText::_('33%'),
						'1-4' => JText::_('25%'),
						'1-5' => JText::_('20%'),
						'1-6' => JText::_('16%'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('width_mode', '!=', '')
					),
				),
				'large_screens' => array(
					'type' => 'select',
					'title' => JText::_('Large Screens'),
					'desc' => JText::_('Set the number of grid columns for each breakpoint. Inherit refers to the number of columns on the next smaller screen size.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'1-1' => JText::_('100%'),
						'5-6' => JText::_('83%'),
						'4-5' => JText::_('80%'),
						'3-5' => JText::_('60%'),
						'1-2' => JText::_('50%'),
						'1-3' => JText::_('33%'),
						'1-4' => JText::_('25%'),
						'1-5' => JText::_('20%'),
						'1-6' => JText::_('16%'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('width_mode', '!=', '')
					),
				),
				'separator_animation_options' => array(
					'type' => 'separator',
					'title' => JText::_('Animation'),
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'slidesets' => array(
					'type' => 'checkbox',
					'title' => JText::_('Slide all visible items at once'),
					'desc' => JText::_('To loop through a set of slides instead of single items.'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'center_slide' => array(
					'type' => 'checkbox',
					'title' => JText::_('Center the active slide'),
					'desc' => JText::_('Check this option to center the list items.'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'velocity' => array(
					'type' => 'slider',
					'title' => JText::_('Velocity'),
					'desc' => JText::_('Set the velocity in pixels per milliseconds.'),
					'min' => 20,
					'max' => 300,
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'finite_slide' => array(
					'type' => 'checkbox',
					'title' => JText::_('Disable infinite scrolling'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'autoplay' => array(
					'type' => 'checkbox',
					'title' => JText::_('Autoplay'),
					'desc' => JText::_('To activate Slider autoplays to the attribute. '),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
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
						array('layout_mode', '!=', 'grid'),
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
						array('layout_mode', '!=', 'grid'),
						array('autoplay', '=', 1),
					)
				),
				'separator_navigation_options' => array(
					'type' => 'separator',
					'title' => JText::_('Navigation'),
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'navigation' => array(
					'type' => 'select',
					'title' => JText::_('Navigation Display'),
					'desc' => JText::_('Select the navigation type, show or hide navigation control.'),
					'values' => array(
						'' => JText::_('Hide'),
						'dotnav' => JText::_('Dotnav'),
					),
					'std' => 'dotnav',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'navigation_position' => array(
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
						array('layout_mode', '!=', 'grid'),
						array('navigation', '!=', '')
					),
				),
				'nav_margin' => array(
					'type' => 'select',
					'title' => JText::_('Margin'),
					'desc' => JText::_('Set the vertical margin.'),
					'values' => array(
						'small' => JText::_('Small'),
						'' => JText::_('Default'),
						'medium' => JText::_('Medium'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('navigation', '!=', '')
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
					'std' => '',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('navigation', '!=', '')
					),
				),
				'navigation_color' => array(
					'type' => 'select',
					'title' => JText::_('Color'),
					'desc' => JText::_('Set light or dark color if the navigation is below the slideshow.'),
					'values' => array(
						'' => JText::_('None'),
						'light' => JText::_('Light'),
						'dark' => JText::_('Dark'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('navigation', '!=', '')
					),
				),

				'separator_slidenav_options' => array(
					'type' => 'separator',
					'title' => JText::_('SlideNav'),
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'slidenav_position' => array(
					'type' => 'select',
					'title' => JText::_('Position'),
					'desc' => JText::_('Select the position of the slidenav.'),
					'values' => array(
						'' => JText::_('Hide'),
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
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
					),
				),
				'slidenav_margin' => array(
					'type' => 'select',
					'title' => JText::_('Margin'),
					'desc' => JText::_('Apply a margin between the slidnav and the slider container.'),
					'values' => array(
						'' => JText::_('None'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
					),
					'std' => 'medium',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('slidenav_position', '!=', '')
					),
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
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('slidenav_position', '!=', 'outside'),
						array('slidenav_position', '!=', '')
					),
				),
				'slidenav_color' => array(
					'type' => 'select',
					'title' => JText::_('Color'),
					'desc' => JText::_('Set light or dark color mode for the slidenav.'),
					'values' => array(
						'' => JText::_('None'),
						'light' => JText::_('Light'),
						'dark' => JText::_('Dark'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('slidenav_position', '!=', 'outside'),
						array('slidenav_position', '!=', '')
					),
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
						array('layout_mode', '!=', 'grid'),
						array('slidenav_position', '=', 'outside')
					),
				),
				'slidenav_outside_color' => array(
					'type' => 'select',
					'title' => JText::_('Outside Color'),
					'desc' => JText::_('Set light or dark color if the slidenav is outside of the slider'),
					'values' => array(
						'' => JText::_('None'),
						'light' => JText::_('Light'),
						'dark' => JText::_('Dark'),
					),
					'std' => '',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('slidenav_position', '=', 'outside')
					),
				),
				'slidenav_on_hover' => array(
					'type' => 'checkbox',
					'title' => JText::_('Show on hover only'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('slidenav_position', '!=', '')
					),
				),

				'larger_style' => array(
					'type' => 'checkbox',
					'title' => JText::_('Larger style'),
					'desc' => JText::_('To increase the size of the slidenav icons'),
					'values' => array(
						'0' => JText::_('JNO'),
						'1' => JText::_('JYES'),
					),
					'std' => '0',
					'depends' => array(
						array('layout_mode', '!=', 'grid'),
						array('slidenav_position', '!=', '')
					),
				),

				'separator_title_style_options' => array(
					'type' => 'separator',
					'title' => JText::_('Name'),
				),
				'heading_font_family'=>array(
					'type'=>'fonts',
					'title'=>JText::_('Font Family'),
					'selector'=> array(
						'type'=>'font',
						'font'=>'{{ VALUE }}',
						'css'=>'.ui-title { font-family: {{ VALUE }}; }',
					)
				),
				'font_weight' => array(
					'type' => 'select',
					'title' => JText::_('Font weight'),
					'desc' => JText::_('Add one of the following classes to modify the font weight of your text.'),
					'values' => array(
					  '' => JText::_('Default'),
					  'light' => JText::_('Light'),
					  'normal' => JText::_('Normal'),
					  'bold' => JText::_('Bold'),
					  'lighter' => JText::_('Lighter'),
					  'bolder' => JText::_('Bolder'),
					),
				),
				'heading_style' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Heading styles differ in font-size but may also come with a predefined color, size and font'),
					'values' => array(
						'' => JText::_('None'),
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
					'std' => 'h3',
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
				'name_color' => array(
					'type' => 'select',
					'title' => JText::_('Predefined Color'),
					'desc' => JText::_('Select the predefined title text color.'),
					'values' => array(
						'' => JText::_('None'),
						'text-muted' => JText::_('Muted'),
						'text-emphasis' => JText::_('Emphasis'),
						'text-primary' => JText::_('Primary'),
						'text-secondary' => JText::_('Secondary'),
						'text-success' => JText::_('Success'),
						'text-warning' => JText::_('Warning'),
						'text-danger' => JText::_('Danger'),
						'light' => JText::_('Light'),
						'dark' => JText::_('Dark'),
					),
					'std' => '',
				),
				'custom_title_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Custom Color'),
					'depends' => array(
						array('name_color', '=', '')
					),
				),
				'title_text_transform' => array(
					'type' => 'select',
					'title' => JText::_('Transform'),
					'desc' => JText::_('The following options will transform text into uppercased, capitalized or lowercased characters.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'uppercase' => JText::_('Uppercase'),
						'capitalize' => JText::_('Capitalize'),
						'lowercase' => JText::_('Lowercase'),
					),
					'std' => '',
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
				'separator_meta_style_options' => array(
					'type' => 'separator',
					'title' => JText::_('Designation'),
				),
				'meta_font_family'=>array(
					'type'=>'fonts',
					'title'=>JText::_('Font Family'),
					'selector'=> array(
						'type'=>'font',
						'font'=>'{{ VALUE }}',
						'css'=>'.ui-meta { font-family: {{ VALUE }}; }',
					)
				),
				'meta_style' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Select a predefined meta text style, including color, size and font-family'),
					'values' => array(
						'' => JText::_('None'),
						'text-meta' => JText::_('Meta'),
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
				'meta_font_weight' => array(
					'type' => 'select',
					'title' => JText::_('Font weight'),
					'desc' => JText::_('Add one of the following classes to modify the font weight of your text.'),
					'values' => array(
					  '' => JText::_('Default'),
					  'light' => JText::_('Light'),
					  'normal' => JText::_('Normal'),
					  'bold' => JText::_('Bold'),
					  'lighter' => JText::_('Lighter'),
					  'bolder' => JText::_('Bolder'),
					),
				),
				'designation_style' => array(
					'type' => 'select',
					'title' => JText::_('Predefined Color'),
					'desc' => JText::_('Predefined text style for designation.'),
					'values' => array(
						'' => JText::_('None'),
						'muted' => JText::_('Muted'),
						'emphasis' => JText::_('Emphasis'),
						'primary' => JText::_('Primary'),
						'secondary' => JText::_('Secondary'),
						'success' => JText::_('Success'),
						'warning' => JText::_('Warning'),
						'danger' => JText::_('Danger'),
						'light' => JText::_('Light'),
						'dark' => JText::_('Dark'),
					),
					'std' => 'muted',
				),
				'custom_meta_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Custom Color'),
					'depends' => array(
						array('designation_style', '=', '')
					),
				),
				'text_transform' => array(
					'type' => 'select',
					'title' => JText::_('Transform'),
					'desc' => JText::_('The following options will transform text into uppercased, capitalized or lowercased characters.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'uppercase' => JText::_('Uppercase'),
						'capitalize' => JText::_('Capitalize'),
						'lowercase' => JText::_('Lowercase'),
					),
					'std' => '',
				),
				'meta_alignment' => array(
					'type' => 'select',
					'title' => JText::_('Alignment'),
					'desc' => JText::_('Align the meta text above or below the title.'),
					'values' => array(
						'top' => JText::_('Above Price'),
						'' => JText::_('Below Title'),
						'content' => JText::_('Below Content'),
					),
					'std' => '',
				),
				'meta_element' => array(
					'type' => 'select',
					'title' => JText::_('HTML Element'),
					'desc' => JText::_('Choose one of the seven heading elements to fit your semantic structure.'),
					'values' => array(
						'h1' => JText::_('h1'),
						'h2' => JText::_('h2'),
						'h3' => JText::_('h3'),
						'h4' => JText::_('h4'),
						'h5' => JText::_('h5'),
						'h6' => JText::_('h6'),
						'div' => JText::_('div'),
					),
					'std' => 'div',
				),
				'meta_margin_top' => array(
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
					'std' => 'small',
				),

				'separator_email_style_options' => array(
					'type' => 'separator',
					'title' => JText::_('Email'),
				),
				'email_font_family'=>array(
					'type'=>'fonts',
					'title'=>JText::_('Font Family'),
					'selector'=> array(
						'type'=>'font',
						'font'=>'{{ VALUE }}',
						'css'=>'.ui-email { font-family: {{ VALUE }}; }',
					)
				),
				'email_style' => array(
					'type' => 'select',
					'title' => JText::_('Predefined Color'),
					'desc' => JText::_('Add predefined text color to email elements.'),
					'values' => array(
						'' => JText::_('None'),
						'muted' => JText::_('Muted'),
						'emphasis' => JText::_('Emphasis'),
						'primary' => JText::_('Primary'),
						'secondary' => JText::_('Secondary'),
						'success' => JText::_('Success'),
						'warning' => JText::_('Warning'),
						'danger' => JText::_('Danger'),
						'light' => JText::_('Light'),
						'dark' => JText::_('Dark'),
					),
					'std' => 'muted',
				),
				'email_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Color'),
					'std' => '#999999',
					'depends' => array(
						array('email_style', '=', '')
					),
				),
				'email_class' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Select a predefined text style, including color, size and font-family'),
					'values' => array(
						'' => JText::_('None'),
						'text-meta' => JText::_('Meta'),
						'h4' => JText::_('H4'),
						'h5' => JText::_('H5'),
						'h6' => JText::_('H6'),
					),
					'std' => 'h6',
				),
				'email_text_transform' => array(
					'type' => 'select',
					'title' => JText::_('Transform'),
					'desc' => JText::_('The following options will transform text into uppercased, capitalized or lowercased characters.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'uppercase' => JText::_('Uppercase'),
						'capitalize' => JText::_('Capitalize'),
						'lowercase' => JText::_('Lowercase'),
					),
					'std' => '',
				),
				'email_margin_top' => array(
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
					'std' => 'small',
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
						'' => JText::_('None'),
						'text-lead' => JText::_('Lead'),
						'text-meta' => JText::_('Meta'),
					),
					'std' => '',
				),
				'content_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Color'),
				),
				'content_text_transform' => array(
					'type' => 'select',
					'title' => JText::_('Transform'),
					'desc' => JText::_('The following options will transform text into uppercased, capitalized or lowercased characters.'),
					'values' => array(
						'' => JText::_('Inherit'),
						'uppercase' => JText::_('Uppercase'),
						'capitalize' => JText::_('Capitalize'),
						'lowercase' => JText::_('Lowercase'),
					),
					'std' => '',
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
					'std' => 'small',
				),

				'separator_social_style_options' => array(
					'type' => 'separator',
					'title' => JText::_('Social'),
				),
				'icons_button' => array(
					'type' => 'checkbox',
					'title' => JText::_('Display icons as buttons'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 1,
				),
				'icon_background' => array(
					'type' => 'color',
					'title' => JText::_('Background Color'),
					'depends' => array(
						array('icons_button', '=', 1)
					)
				),
				'icon_color' => array(
					'type' => 'color',
					'title' => JText::_('Color'),
				),				
				'social_position' => array(
					'type' => 'select',
					'title' => JText::_('Position'),
					'desc' => JText::_('Place social links before, after description text or overlay (place content on top of an image).'),
					'values' => array(
						'before' => JText::_('Before'),
						'after' => JText::_('After'),
						'overlay' => JText::_('Overlay'),
					),
					'std' => 'after',

				),
				'social_margin_top' => array(
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
					'depends' => array(array('social_position', '!=', 'overlay')),
				),
				'overlay_on_hover' => array(
					'type' => 'checkbox',
					'title' => JText::_('Display overlay on hover'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 1,
					'depends' => array(array('social_position', '=', 'overlay'))
				),
				'vertical_icons' => array(
					'type' => 'checkbox',
					'title' => JText::_('Vertical Social Icons'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 0,
					'depends' => array(array('social_position', '=', 'overlay'))
				),
				'overlay_styles' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Select a style for the overlay.'),
					'values' => array(
						'' => JText::_('None'),
						'overlay-default' => JText::_('Overlay Default'),
						'overlay-primary' => JText::_('Overlay Primary'),
						'tile-default' => JText::_('Tile Default'),
						'tile-muted' => JText::_('Tile Muted'),
						'tile-primary' => JText::_('Tile Primary'),
						'tile-secondary' => JText::_('Tile Secondary'),
						'overlay-custom' => JText::_('Custom'),
					),
					'std' => 'overlay-primary',
					'depends' => array(array('social_position', '=', 'overlay'))
				),
				'overlay_background' => array(
					'type' => 'color',
					'title' => JText::_('Background Color'),
					'std' => '#ffd49b',
					'depends' => array(
						array('social_position', '=', 'overlay'),
						array('overlay_styles', '=', 'overlay-custom'),
					), 
				),
				'overlay_padding' => array(
					'type' => 'select',
					'title' => JText::_('Padding'),
					'desc' => JText::_('Set the padding between the overlay and its content.'),
					'values' => array(
						'' => JText::_('Default'),
						'small' => JText::_('Small'),
						'large' => JText::_('Large'),
						'remove' => JText::_('None'),
					),
					'std' => '',
					'depends' => array(array('social_position', '=', 'overlay'))
				),
				'overlay_positions' => array(
					'type' => 'select',
					'title' => JText::_('Overlay Positions'),
					'desc' => JText::_('A collection of utility classes to position content.'),
					'values' => array(
						'top' => JText::_('Top'),
						'bottom' => JText::_('Bottom'),
						'left' => JText::_('Left'),
						'right' => JText::_('Right'),
						'top-left' => JText::_('Top Left'),
						'top-center' => JText::_('Top Center'),
						'top-right' => JText::_('Top Right'),
						'bottom-left' => JText::_('Bottom Left'),
						'bottom-center' => JText::_('Bottom Center'),
						'bottom-right' => JText::_('Bottom Right'),
						'center' => JText::_('Center'),
						'center-left' => JText::_('Center Left'),
						'center-right' => JText::_('Center Right'),
					),
					'std' => 'center',
					'depends' => array(array('social_position', '=', 'overlay'))
				),
				'overlay_margin' => array(
					'type' => 'select',
					'title' => JText::_('Margin'),
					'desc' => JText::_('Apply a margin between the overlay and the image container.'),
					'values' => array(
						'' => JText::_('None'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
					),
					'std' => '',
					'depends' => array(array('social_position', '=', 'overlay'))
				),
				'overlay_alignment' => array(
					'type' => 'select',
					'title' => JText::_('Alignment'),
					'values' => array(
						'' => JText::_('None'),
						'left' => JText::_('Left'),
						'center' => JText::_('Center'),
						'right' => JText::_('Right'),
					),
					'std' => 'center',
					'depends' => array(array('social_position', '=', 'overlay'))
				),
				'overlay_transition' => array(
					'type' => 'select',
					'title' => JText::_('Overlay Transition'),
					'desc' => JText::_('Select a hover transition for the overlay.'),
					'values' => array(
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
					),
					'std' => 'fade',
					'depends' => array(
						array('social_position', '=', 'overlay'),
						array('overlay_on_hover', '=', 1)
					)
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
						array('alignment', '!=', ''),
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
				'delay_element_animations' => array(
					'type' => 'checkbox',
					'title' => JText::_('Delay Element Animations'),
					'desc' => JText::_('Delay element animations so that animations are slightly delayed and don\'t play all at the same time. Slide animations can come into effect with a fixed offset or at 100% of the element\’s own size.'),
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
