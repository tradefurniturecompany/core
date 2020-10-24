<?php
namespace TFC\Core\Plugin\SpringImport\CatalogDropdownSort\Block\Product\ProductList;
use SpringImport\CatalogDropdownSort\Block\Product\ProductList\Toolbar as Sb;
# 2020-10-24
# "Remove the «sort by position» option from the category page": https://github.com/tradefurniturecompany/site/issues/194
final class Toolbar {
	/**
	 * 2020-10-24
	 * @see \SpringImport\CatalogDropdownSort\Block\Product\ProductList\Toolbar::loadAvailableOrdersForView()
	 * @param Sb $sb
	 * @param array(string => string) $r
	 * @return array(string => string)
	 */
	function afterLoadAvailableOrdersForView(Sb $sb, array $r) {return dfa_unset($r, 'position-ASC');}
}