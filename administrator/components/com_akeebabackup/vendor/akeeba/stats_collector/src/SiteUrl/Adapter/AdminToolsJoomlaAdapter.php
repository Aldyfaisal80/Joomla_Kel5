<?php
/*
 * @package   stats_collector
 * @copyright Copyright (c)2023-2024 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

namespace Akeeba\UsageStats\Collector\SiteUrl\Adapter;

/**
 * Site URL adapter for Admin Tools for Joomla!
 *
 * @since  1.0.0
 */
final class AdminToolsJoomlaAdapter extends AbstractJoomlaComponentAdapter
{
	public function __construct()
	{
		$this->componentName = 'com_admintools';
		$this->paramName     = 'siteurl';
	}

}