<?php

/**
 * @package   Astroid Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2023 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
defined('JPATH_BASE') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

?>
<dd class="create">
	<time datetime="<?php echo HTMLHelper::_('date', $displayData['item']->created, 'c'); ?>" itemprop="dateCreated">
		<span><?php echo Text::sprintf('COM_CONTENT_CREATED_DATE_ON', HTMLHelper::_('date', $displayData['item']->created, Text::_('DATE_FORMAT_LC3'))); ?></span>
	</time>
</dd>