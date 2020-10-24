<?php
namespace TFC\Core\Plugin\Catalog\Model;
use Magento\Catalog\Model\Category as Sb;
# 2020-10-24
# "Remove the «sort by position» option from the category page": https://github.com/tradefurniturecompany/site/issues/194
final class Category {
	/**
	 * 2020-10-24
	 * @see \Magento\Catalog\Model\Config::getAttributeUsedForSortByArray()
	 * @param Sb $sb
	 * @param string[] $r
	 * @return string[]
	 */
	function afterGetAvailableSortBy(Sb $sb, array $r) {return array_diff($r, [Sb::KEY_POSITION]);}
}