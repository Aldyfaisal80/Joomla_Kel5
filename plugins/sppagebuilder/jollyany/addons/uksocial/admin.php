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
		'type' => 'repeatable',
		'addon_name' => 'uksocial',
		'title' => JText::_('UK Social'),
		'desc' => JText::_('Defines different styles for a sub navigation.'),
		'icon'=>JURI::root() . 'plugins/sppagebuilder/jollyany/addons/uksocial/assets/images/icon.png',
		'category' => 'Jollyany',
		'attr' => array(
			'general' => array(
				'admin_label' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std' => ''
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
				// Repeatable Item
				'uk_subnav_items' => array(
					'title' => JText::_('Items'),
					'attr' => array(
						'brand_name' => array( // New Uikit Icon
							'type' => 'select',
							'title' => JText::_('Icon'),
							'desc' => JText::_('Select an SVG icon from the list. Learn more <a href="https://getuikit.com/docs/icon#library" target="_blank">https://getuikit.com/docs/icon</a>'),
							'values' => \Jollyany\Helper\PageBuilder::getUKIcon(),
							'std' => 'github',
						),
                        'title' => array(
                            'type' => 'text',
                            'title' => JText::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
                            'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
                            'std' =>  '',
                        ),
						'link' => array(
							'type' => 'media',
							'format' => 'attachment',
							'title' => JText::_('Link'),
							'desc' => JText::_('Enter or pick a link, an image or a video file.'),
							'placeholder' => 'http://',
							'hide_preview' => true,
						),
                        'color' => array(
                            'type' => 'color',
                            'title' => JText::_('Color'),
                            'std' => '#3d3d3d',
                        ),
                        'background' => array(
                            'type' => 'color',
                            'title' => JText::_('Background'),
                            'std' => '#f5f5f5',
                        ),
                        'color_hover' => array(
                            'type' => 'color',
                            'title' => JText::_('Hover Color'),
                            'std' => '#3d3d3d',
                        ),
                        'background_hover' => array(
                            'type' => 'color',
                            'title' => JText::_('Hover Background'),
                            'std' => '#f5f5f5',
                        ),
					),
				),
				'separator_subnav_options' => array(
					'type' => 'separator',
					'title' => JText::_('Social Icons'),
				),
                'social_style' => array(
                    'type' => 'select',
                    'title' => JText::_('Social Style'),
                    'values' => array(
                        '' => JText::_('Default'),
                        'magazine' => JText::_('Magazine'),
                    ),
                    'std' => '',
                ),
				'target' => array(
					'type' => 'select',
					'title' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB'),
					'desc' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB_DESC'),
					'values' => array(
						'' => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_SAME_WINDOW'),
						'_blank' => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_NEW_WINDOW'),
					),
				),
				'link_style' => array(
					'type' => 'select',
					'title' => JText::_('Link Style'),
					'values' => array(
						'' => JText::_('Default'),
						'link' => JText::_('Link'),
						'link-muted' => JText::_('Link Muted'),
						'link-text' => JText::_('Link Text'),
						'link-reset' => JText::_('Link Reset'),
					),
					'std' => '',
                    'depends' => array(
                        array('social_style', '!=', 'magazine')
                    )
				),
				'icons_button' => array(
					'type' => 'checkbox',
					'title' => JText::_('Display icons as buttons'),
					'values' => array(
						1 => JText::_('JYES'),
						0 => JText::_('JNO'),
					),
					'std' => 1,
                    'depends' => array(
                        array('social_style', '!=', 'magazine')
                    )
				),
				'icon_size'=>array(
					'type'=>'slider',
					'title'=>JText::_('Icon Size'),
					'placeholder'=>20,
					'std'=>'20',
					'max'=> 400,
					'depends' => array(
						array('icons_button', '=', 0)
					)
				),
                'columns_large_desktop' => array(
                    'type' => 'select',
                    'title' => JText::_('Columns Large Desktop'),
                    'desc' => JText::_('Set the grid gutter width.'),
                    'values' => array(
                        'auto' => JText::_('Auto'),
                        '1-1' => JText::_('1 Column'),
                        '1-2' => JText::_('2 Columns'),
                        '1-3' => JText::_('3 Columns'),
                        '1-4' => JText::_('4 Columns'),
                        '1-5' => JText::_('5 Columns'),
                        '1-6' => JText::_('6 Columns'),
                    ),
                    'std' => 'auto',
                ),
                'columns_desktop' => array(
                    'type' => 'select',
                    'title' => JText::_('Columns Desktop'),
                    'desc' => JText::_('Set the grid gutter width.'),
                    'values' => array(
                        'auto' => JText::_('Auto'),
                        '1-1' => JText::_('1 Column'),
                        '1-2' => JText::_('2 Columns'),
                        '1-3' => JText::_('3 Columns'),
                        '1-4' => JText::_('4 Columns'),
                        '1-5' => JText::_('5 Columns'),
                        '1-6' => JText::_('6 Columns'),
                    ),
                    'std' => 'auto',
                ),
                'columns_laptop' => array(
                    'type' => 'select',
                    'title' => JText::_('Columns Laptop'),
                    'desc' => JText::_('Set the grid gutter width.'),
                    'values' => array(
                        'auto' => JText::_('Auto'),
                        '1-1' => JText::_('1 Column'),
                        '1-2' => JText::_('2 Columns'),
                        '1-3' => JText::_('3 Columns'),
                        '1-4' => JText::_('4 Columns'),
                        '1-5' => JText::_('5 Columns'),
                        '1-6' => JText::_('6 Columns'),
                    ),
                    'std' => 'auto',
                ),
                'columns_tablet' => array(
                    'type' => 'select',
                    'title' => JText::_('Columns Tablet'),
                    'desc' => JText::_('Set the grid gutter width.'),
                    'values' => array(
                        'auto' => JText::_('Auto'),
                        '1-1' => JText::_('1 Column'),
                        '1-2' => JText::_('2 Columns'),
                        '1-3' => JText::_('3 Columns'),
                        '1-4' => JText::_('4 Columns'),
                        '1-5' => JText::_('5 Columns'),
                        '1-6' => JText::_('6 Columns'),
                    ),
                    'std' => 'auto',
                ),
                'columns_mobile' => array(
                    'type' => 'select',
                    'title' => JText::_('Columns Mobile'),
                    'desc' => JText::_('Set the grid gutter width.'),
                    'values' => array(
                        'auto' => JText::_('Auto'),
                        '1-1' => JText::_('1 Column'),
                        '1-2' => JText::_('2 Columns'),
                        '1-3' => JText::_('3 Columns'),
                        '1-4' => JText::_('4 Columns'),
                        '1-5' => JText::_('5 Columns'),
                        '1-6' => JText::_('6 Columns'),
                    ),
                    'std' => 'auto',
                ),
				'gutter' => array(
					'type' => 'select',
					'title' => JText::_('Gutter'),
					'desc' => JText::_('Set the grid gutter width.'),
					'values' => array(
						'' => JText::_('Default'),
						'small' => JText::_('Small'),
						'medium' => JText::_('Medium'),
						'large' => JText::_('Large'),
					),
					'std' => 'small',
				),
				'class' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
					'std' => ''
				),
			),
            'options' => \Jollyany\Helper\PageBuilder::general_options(),
		),
	)
);
