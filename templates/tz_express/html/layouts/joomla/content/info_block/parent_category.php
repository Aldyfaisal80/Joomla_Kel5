<?php

/**
 * @package   Astroid Framework
 * @author    TemPlaza https://www.templaza.com
 * @copyright Copyright (C) 2023 TemPlaza.
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
defined('JPATH_BASE') or die;

use Joomla\CMS\Router\Route;

if (ASTROID_JOOMLA_VERSION > 3) {
	\JLoader::registerAlias('ContentHelperRoute', 'Joomla\Component\Content\Site\Helper\RouteHelper');
} else {
	include_once(JPATH_COMPONENT . '/helpers/route.php');
}

?>
<dd class="parent-category-name">
	<?php $title = $this->escape($displayData['item']->parent_title); ?>
	<?php if ($displayData['params']->get('link_parent_category') && !empty($displayData['item']->parent_slug)) : ?>
		<?php $url = '<a href="' . Route::_(ContentHelperRoute::getCategoryRoute($displayData['item']->parent_slug)) . '" itemprop="genre">' . $title . '</a>'; ?>
		<?php echo $url; ?>
	<?php else : ?>
		<?php echo '<span itemprop="genre">' . $title . '</span>'; ?>
	<?php endif; ?>
</dd>