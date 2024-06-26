<?php

/**
 * @package   Astroid Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2023 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */

defined('JPATH_BASE') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

if (ASTROID_JOOMLA_VERSION > 3) {
	\JLoader::registerAlias('ContentHelperRoute', 'Joomla\Component\Content\Site\Helper\RouteHelper');
} else {
	include_once(JPATH_COMPONENT . '/helpers/route.php');
}

?>
<dd class="category-name">
	<?php $title = $this->escape($displayData['item']->category_title); ?>
	<?php if ($displayData['params']->get('link_category') && !empty($displayData['item']->catid)) : ?>
		<?php $url = '<a href="' . Route::_(ContentHelperRoute::getCategoryRoute($displayData['item']->catid, @$displayData['item']->category_language)) . '" itemprop="genre">' . $title . '</a>'; ?>
		<?php echo Text::sprintf('COM_CONTENT_CATEGORY', $url); ?>
	<?php else : ?>
		<?php echo Text::sprintf('COM_CONTENT_CATEGORY', '<span itemprop="genre">' . $title . '</span>'); ?>
	<?php endif; ?>
</dd>