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
		'type' => 'content',
		'addon_name' => 'uinotification',
		'title' => JText::_('UI Notification'),
		'desc' => JText::_('Create toggleable notifications that fade out automatically.'),
		'icon'=>JURI::root() . 'plugins/sppagebuilder/jollyany/addons/uinotification/assets/images/icon.png',
		'category' => 'Jollyany',
		'attr' => array(
			'general' => array(
				'admin_label' => array(
					'type' => 'text',
					'title' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std' => '',
				),
				'notification_styles' => array(
					'type' => 'select',
					'title' => JText::_('Notification Style'),
					'desc' => JText::_('A notification can be styled by adding a status to the message to indicate a primary, success, warning or a danger status.'),
					'values' => array(
						'' => JText::_('Default'),
						'primary' => JText::_('Primary'),
						'success' => JText::_('Success'),
						'warning' => JText::_('Warning'),
						'danger' => JText::_('Danger'),
					),
					'std' => 'primary',
				),
				'notification_positions' => array(
					'type' => 'select',
					'title' => JText::_('Position'),
					'desc' => JText::_('Select one of the following parameters to adjust the notification\'s position to different corners.'),
					'values' => array(
						'top-left' => JText::_('Top Left'),
						'top-center' => JText::_('Top Center'),
						'top-right' => JText::_('Top Right'),
						'bottom-left' => JText::_('Bottom Left'),
						'bottom-center' => JText::_('Bottom Center'),
						'bottom-right' => JText::_('Bottom Right'),
					),
					'std' => 'bottom-left',
				),
				'notification_content' => array(
					'type' => 'textarea',
					'title' => JText::_('Message'),
					'desc' => JText::_('Custom notification message that fade out automatically.'),
					'std' => 'You can turn your popup into a notification that can easily server as a banner to inform your visitors.',
				),
			),
		),
	)
);
