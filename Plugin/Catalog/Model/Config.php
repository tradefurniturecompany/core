<?php
namespace TFC\Core\Plugin\Catalog\Model;
use Magento\Catalog\Model\Config as Sb;
use Magento\Framework\Phrase;
# 2020-10-24
# "Remove the «sort by position» option from the category page": https://github.com/tradefurniturecompany/site/issues/194
final class Config {
	/**
	 * 2020-10-24
	 * @see \Magento\Catalog\Model\Config::getAttributeUsedForSortByArray()
	 * @param Sb $sb
	 * @param array(string => Phrase) $r
	 * @return array(string => Phrase)
	 */
	function afterGetAttributeUsedForSortByArray(Sb $sb, array $r) {return df_tail($r);}
}