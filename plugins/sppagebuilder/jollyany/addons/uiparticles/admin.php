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
    'addon_name' => 'uiparticles',
    'title' => JText::_('UI Particles'),
    'desc' => JText::_('A simple and easy to use addon for creating particles'),
    'icon'=>JURI::root() . 'plugins/sppagebuilder/jollyany/addons/uiparticles/assets/images/icon.png',
    'category' => 'Jollyany',
    'attr' => array(
      'general' => array(
        'admin_label' => array(
          'type' => 'text',
          'title' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
          'desc' => JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
          'std' => ''
        ),
        'ui_particle_list_items' => array(
          'title' => JText::_('Particle ID(s)'),
          'attr' =>  array(
            'type' => array(
              'type' => 'select',
              'title' => JText::_('Style'),
              'values' => array(
                '' => JText::_('Default'),
                'nasa' => JText::_('Nasa'),
                'bubble' => JText::_('Bubble'),
                'snow' => JText::_('Snow'),
                'nyancat2' => JText::_('Nyan'),
              ),
              'std' => '',
            ),
            'title' => array(
              'type' => 'text',
              'title' => JText::_('Section ID'),
              'desc' => 'Enter the section ID you wish to apply the particle effect. NOTE: You need to define the section ID for the section in page builder First.',
              'std' => 'your-section-id',
            ),
            'value' => array(
              'type' => 'number',
              'title' => JText::_('Value'),
              'desc' => 'Default: 80, Nasa: 160, Bubble: 160. Snow: 400, Nyan: 400',
              'placeholder' => '80',
              'std' => '80',
              'depends' => array(array('title', '!=', '')),
            ),
            'color' => array(
              'type' => 'color',
              'title' => JText::_('Color'),
              'desc' => 'Default: #ffffff, Nasa: #ffffff, Bubble: #1b1e34. Snow: #ffffff, Nyan: #ffffff',
              'std' => '',
              'depends' => array(array('title', '!=', '')),
            ),
            'shape' => array(
              'type' => 'select',
              'title' => JText::_('Shape'),
              'desc' => 'Shape types: "circle", "edge", "triangle", Style Bubble: Polygon, "star"',
              'values' => array(
                'circle' => JText::_('Circle'),
                'edge' => JText::_('Edge'),
                'triangle' => JText::_('Triangle'),
                'polygon' => JText::_('Polygon'),
                'star' => JText::_('Star'),
              ),
              'std' => 'circle',
              'depends' => array(array('title', '!=', '')),
            ),
            'size' => array(
              'type' => 'number',
              'title' => JText::_('Size'),
              'desc' => 'Default: 3, Nasa: 3, Bubble: 20. Snow: 10, Nyan: 4',
              'placeholder' => '3',
              'std' => '3',
              'depends' => array(array('title', '!=', '')),
            ),
            'line_linked' => array(
              'type' => 'color',
              'title' => JText::_('Line Linked'),
              'desc' => 'Default: #ffffff, Nasa: #ffffff, Bubble: #1b1e34. Snow: #ffffff, Nyan: #ffffff',
              'std' => '',
              'depends' => array(array('title', '!=', '')),
            ),
            'speed' => array(
              'type' => 'number',
              'title' => 'Speed of particles movement',
              'desc' => 'Enter the speed of particles movement. Default Style: Default - 6, Nasa - 1, Bubble - 8, Nyan - 14, Snow - 6.',
              'placeholder' => '6',
              'std' => '6',
            ),
            'outmode' => array(
              'type' => 'select',
              'title' => 'Out Mode',
              'desc' => 'Choose the mode when particles touch the edge',
              'values' => array(
                'out' => JText::_('Out'),
                'bounce' => JText::_('Bounce'),
              ),
              'std' => 'out',
            ),
            'direction' => array(
              'type' => 'select',
              'title' => 'Direction Mode',
              'desc' => 'Choose the direction mode when particles appear: "none, top, top-right, right, bottom-right, bottom, bottom-left, left, top-left',
              'values' => array(
                '' => JText::_('None'),
                'top' => JText::_('Top'),
                'top-right' => JText::_('Top Right'),
                'right' => JText::_('Right'),
                'bottom-right' => JText::_('Bottom Right'),
                'bottom' => JText::_('Bottom'),
                'bottom-left' => JText::_('Bottom Left'),
                'left' => JText::_('Left'),
                'top-left' => JText::_('Top Left'),
              ),
              'std' => '',
            ),
          )
        ),
      )
    )
  )
);
