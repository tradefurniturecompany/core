<?php
namespace TFC\Core\Plugin\Tax\Helper;
use Magento\Customer\Model\Address;
use Magento\Store\Model\Store;
use Magento\Tax\Helper\Data as Sb;
use TFC\Core\Plugin\Tax\Model\Config;
/**
 * 2019-10-07
 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
 * "Transfer the `\Magento\Tax\Helper\Data::getShippingPrice()`
 * and `\Magento\Tax\Model\Config::needPriceConversion()` methods modifications
 * to the `tradefurniturecompany/core` module": https://github.com/tradefurniturecompany/core/issues/14
 */
class Data extends Sb {
	/** 2019-10-07 */
	function __construct() {}

	/**
	 * 2019-10-07
	 * @see \Magento\Tax\Helper\Data::getShippingPrice()
	 * @param bool|null $includingTax [optional]
	 * @param int|null $ctc [optional]
	 * @param null|string|bool|int|Store $store [optional]
	 */
	function aroundGetShippingPrice(
		Sb $sb, \Closure $f, float $price, $includingTax = null, Address $sa = null, $ctc = null, $store = null
	):float {
		$pseudoProduct = new \Magento\Framework\DataObject();
		$pseudoProduct->setTaxClassId($sb->getShippingTaxClass($store));
		$billingAddress = false;
		if ($sa && $sa->getQuote() && $sa->getQuote()->getBillingAddress()) {
			$billingAddress = $sa->getQuote()->getBillingAddress();
		}
		# 2019-09-20 Dmitrii Fediuk https://upwork.com/fl/mage2pro
		# "The «Delivery and Installation» fee should be shown with taxes":
		# https://github.com/tradefurniturecompany/core/issues/3
		Config::shippingModeSet(true);
		$price = $sb->catalogHelper->getTaxPrice(
			$pseudoProduct,
			$price,
			$includingTax,
			$sa,
			$billingAddress,
			$ctc,
			$store,
			$sb->shippingPriceIncludesTax($store)
		);
		# 2019-09-20 Dmitrii Fediuk https://upwork.com/fl/mage2pro
		# "The «Delivery and Installation» fee should be shown with taxes":
		# https://github.com/tradefurniturecompany/core/issues/3
		Config::shippingModeSet(false);
		return $price;
	}
}