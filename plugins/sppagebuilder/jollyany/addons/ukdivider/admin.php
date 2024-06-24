<?php

/**
 * @package Jollyany Addons SP Page Builder
 * @author TemPlaza https://templaza.com
 * @copyright Copyright (c) 2011 - 2021 TemPlaza
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('restricted aceess');
use Jollyany\Helper\PageBuilder;
SpAddonsConfig::addonConfig(
	array(
		'type' => 'content',
		'addon_name' => 'ukdivider',
		'title' => JText::_('UK Divider'),
		'desc' => JText::_('Create dividers to separate content and apply different styles to them.'),
		'icon'=>JURI::root() . 'plugins/sppagebuilder/jollyany/addons/ukdivider/assets/images/icon.png',
		'category' => 'Jollyany',
		'attr' => array(
			'general' => array(
				'admin_label' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std' => '',
				),
				'divider_type' => array(
					'type' => 'select',
					'title' => JText::_('Style'),
					'desc' => JText::_('Choose a divider style.'),
					'values' => array(
						'uk-hr' => JText::_('Default'),
						'uk-divider-icon' => JText::_('Icon'),
						'uk-divider-small' => JText::_('Small'),
						'uk-divider-vertical' => JText::_('Vertical'),
					),
					'std' => 'uk-hr',
				),
                'icon_shape' => array(
                    'type' => 'select',
                    'title' => JText::_('Icon Shape'),
                    'values' => array(
                        '' => JText::_('Default'),
                        'circle' => JText::_('Circle'),
                        'square' => JText::_('Square'),
                    ),
                    'std' => '',
                    'depends' => array(
                        array('divider_type', '=', 'uk-divider-icon'),
                    ),
                ),
                'icon_size' => array(
                    'type' => 'slider',
                    'title' => JText::_('Icon Size'),
                    'min' => 1,
                    'max' => 40,
                    'std' => '20',
                ),
				'html_selector' => array(
					'type' => 'select',
					'title' => JText::_('HTML Element'),
					'desc' => JText::_('Choose the divider element to fit your semantic structure. Use the hr element for a thematic break and the div element for decorative reasons.'),
					'values' => array(
						'hr' => 'Hr',
						'div' => 'Div'
					),
					'std' => 'hr',
				),
                'divider_size' => array(
                    'type' => 'slider',
                    'title' => JText::_('Divider Size'),
                    'min' => 1,
                    'max' => 2000,
                    'std' => '',
                ),
				'border_width' => array(
					'type' => 'slider',
					'title' => JText::_('Border Top Width'),
					'min' => 1,
					'max' => 100,
				),
				'border_color' => array(
					'type' => 'color',
					'title' => JText::_('Border color'),
				),
				'class' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
					'std' => ''
				),
			),
            'options' => PageBuilder::general_options(),
		)
	)
);
