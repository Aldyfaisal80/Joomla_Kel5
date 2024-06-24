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
		'type' => 'general',
		'addon_name' => 'uicookie',
		'title' => JText::_('Cookie Notification'),
		'desc' => JText::_('Cookie Notification addon for alerting users about the use of cookies on your website.'),
		'icon'=>JURI::root() . 'plugins/sppagebuilder/jollyany/addons/uicookie/assets/images/icon.png',
		'category' => 'Jollyany',
		'attr' => array(
			'general' => array(
				'admin_label' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std' => '',
				),
				'position' => array(
					'type' => 'select',
					'title' => JText::_('Position'),
					'values' => array(
						'bottom' => JText::_('Banner bottom'),
						'top' => JText::_('Banner top'),
						'left' => JText::_('Floating left'),
						'right' => JText::_('Floating right'),
					),
					'std' => 'left',
				),
				'cookie_background' => array(
					'type' => 'color',
					'title' => JText::_('Background'),
					'std' => '#252e39',
				),
				'cookie_button_background' => array(
					'type' => 'color',
					'title' => JText::_('Button Background'),
					'std' => '#1e87f0',
				),
				'message' => array(
					'type' => 'editor',
					'title' => JText::_('Message'),
					'std' => 'This website uses cookies to ensure you get the best experience on our website.',
				),
				'dismiss' => array(
					'type' => 'text',
					'title' => JText::_('Dismiss'),
					'std' => 'Got it',
				),
				'url' => array(
					'type' => 'media',
					'format' => 'attachment',
					'title' => JText::_('Link'),
					'placeholder' => 'http://',
					'hide_preview' => true,
				),
				'link' => array(
					'type' => 'text',
					'title' => JText::_('Policy'),
					'std' => 'Learn more',
				),
				'target' => array(
					'type' => 'select',
					'title' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB'),
					'desc' => JText::_('COM_SPPAGEBUILDER_GLOBAL_LINK_NEWTAB_DESC'),
					'values' => array(
						'_self' => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_SAME_WINDOW'),
						'_blank' => JText::_('COM_SPPAGEBUILDER_ADDON_GLOBAL_TARGET_NEW_WINDOW'),
					),
				),
			),
		),
	)
);
