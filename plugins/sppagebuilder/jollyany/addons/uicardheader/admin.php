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
		'addon_name' => 'uicardheader',
		'title' => JText::_('UI Card Header'),
		'desc' => JText::_('Card Header & footer'),
		'icon'=>JURI::root() . 'plugins/sppagebuilder/jollyany/addons/uicardheader/assets/images/icon.png',
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
				'ui_cardheader_item' => array(
					'title' => JText::_('Items'),
					'attr' => array(
						'title' => array(
							'type' => 'text',
							'title' => JText::_('Title'),
							'std' => 'Robert Frost',
						),
						'company' => array(
							'type' => 'text',
							'title' => JText::_('Meta'),
							'std' =>  'Product Manager',
						),
						'avatar' => array(
							'type' => 'media',
							'title' => JText::_('Image'),
						),
						'message' => array(
							'type' => 'editor',
							'title' => JText::_('Content'),
							'std' => 'Our Sales Consultant will be available to advise and guide you throughout the move process. Our coordinators are focused on ensuring that every move runs smoothly.',
						),
						'title_link' => array(
							'type' => 'media',
							'format' => 'attachment',
							'title' => JText::_('Link'),
							'desc' => JText::_('COM_SPPAGEBUILDER_GLOBAL_BUTTON_URL_DESC'),
							'placeholder' => 'http://',
							'hide_preview' => true,
						),
						'button_title' => array(
							'type' => 'text',
							'title' => JText::_('Link Text'),
							'std' => 'Read more',
							'depends' => array(array('title_link', '!=', '')),
						),
					),
				),
				'separator_card_options' => array(
					'type' => 'separator',
					'title' => JText::_('Card'),
				),
				'card_style' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Select on of the boxed card styles or a blank card.'),
					'values' => array(
						'' => JText::_('None'),
						'default' => JText::_('Card Default'),
						'primary' => JText::_('Card Primary'),
						'secondary' => JText::_('Card Secondary'),
						'hover' => JText::_('Card Hover'),
					),
					'std' => 'default',
				),
				'card_size' => array(
					'type' => 'select',
					'title' => JText::_('Size'),
					'desc' => JText::_('Define the card\'s size by selecting the padding between the card and its content.'),
					'values' => array(
						'' => JText::_('Default'),
						'uk-card-small' => JText::_('Small'),
						'uk-card-large' => JText::_('Large'),
					),
					'std' => '',
					'depends' => array(array('card_style', '!=', '')),
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

				'separator_image_options' => array(
					'type' => 'separator',
					'title' => JText::_('Image'),
				),
				'avatar_width' => array(
					'type' => 'slider',
					'title' => JText::_('Image width'),
					'desc' => JText::_('Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.'),
					'std' => 40,
					'min' => 16,
					'max' => 128,
				),

				'avatar_shape' => array(
					'type' => 'select',
					'title' => JText::_('Image Border'),
					'desc' => JText::_('Select the image\'s border style.'),
					'values' => array(
						'' => JText::_('Default'),
						'uk-border-rounded' => JText::_('Rounded'),
						'uk-border-circle' => JText::_('Circle'),
						'uk-border-pill' => JText::_('Pill'),
					),
					'std' => 'uk-border-circle',
				),
				'separator_item_options' => array(
					'type' => 'separator',
					'title' => JText::_('Item'),
				),
				'parallax' => array(
					'type' => 'slider',
					'title' => JText::_('Parallax'),
					'desc' => JText::_('To move single columns of a grid at different speeds while scrolling. Turn off global animation if you use parallax feature.'),
					'min' => 0,
					'max' => 600,
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
				),
				
				'separator_columns_options' => array(
					'type' => 'separator',
					'title' => JText::_('Columns'),
				),
				'phone_portrait' => array(
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
					),
					'std' => '1',
				),
				'phone_landscape' => array(
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
					),
					'std' => '',
				),
				'tablet_landscape' => array(
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
					),
					'std' => '3',
				),
				'desktop' => array(
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
					),
					'std' => '',
				),
				'large_screens' => array(
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
					),
					'std' => '',
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
					'title' => JText::_('Custom'),
					'desc' => JText::_('Select the title text color.'),
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
				'separator_meta_style_options' => array(
					'type' => 'separator',
					'title' => JText::_('Meta'),
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
				'meta_color' => array(
					'type' => 'select',
					'title' => JText::_('Color'),
					'desc' => JText::_('Select the title text color.'),
					'values' => array(
						'' => JText::_('Custom'),
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
				'custom_meta_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Custom Color'),
					'depends' => array(
						array('meta_color', '=', '')
					),
				),
				'meta_alignment' => array(
					'type' => 'select',
					'title' => JText::_('Alignment'),
					'desc' => JText::_('Align the meta text above or below the title.'),
					'values' => array(
						'top' => JText::_('Top'),
						'' => JText::_('Bottom'),
					),
					'std' => '',
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
				'all_button_title' => array(
					'type' => 'text',
					'title' => JText::_('Text'),
					'std' => 'Read more',
				),
				'link_new_tab' => array(
					'type' => 'select',
					'title' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB'),
					'desc' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB_DESC'),
					'values' => array(
						'' => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_SAME_WINDOW'),
						'_blank' => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_NEW_WINDOW'),
					),
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
					)
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
					)
				),
				'button_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Button Color'),
					'depends' => array(
						array('link_button_style', '=', 'custom'),
					)
				),
				'button_background_hover' => array(
					'type' => 'color',
					'title' => JText::_('Hover Background Color'),
					'std' => '#0f7ae5',
					'depends' => array(
						array('link_button_style', '=', 'custom'),
					)
				),
				'button_hover_color'=>array(
					'type'=>'color',
					'title'=>JText::_('Hover Button Color'),
					'depends' => array(
						array('link_button_style', '=', 'custom'),
					)
				),
				'link_button_size' => array(
					'type' => 'select',
					'title' => JText::_('Button Size'),
					'values' => array(
						'' => JText::_('Default'),
						'uk-button-small' => JText::_('Small'),
						'uk-button-large' => JText::_('Large'),
					),
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
					'std' => 'remove',
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
				'addon_max_width_alignment' => array(
					'type' => 'select',
					'title' => JText::_('Max Width Alignment'),
					'desc' => JText::_('Define the alignment in case the container exceeds the element\'s max-width.'),
					'values' => array(
						'' => JText::_('Left'),
						'auto' => JText::_('Center'),
						'auto-left' => JText::_('Right'),
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
						array('animation', '!=', 'parallax')
					),
				),
				'delay_element_animations' => array(
					'type' => 'checkbox',
					'title' => JText::_('Delay Element Animations'),
					'desc' => JText::_('Delay element animations so that animations are slightly delayed and don\'t play all at the same time. Slide animations can come into effect with a fixed offset or at 100% of the element\’s own size.'),
					'std' => 0,
					'depends' => array(
						array('animation', '!=', ''),
						array('animation', '!=', 'parallax')
					),
				),
				'separator_parallax_options' => array(
					'type' => 'separator',
					'title' => JText::_('Customizing Parallax'),
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
