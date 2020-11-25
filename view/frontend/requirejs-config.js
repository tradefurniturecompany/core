// 2020-11-25
var config = {config: {mixins: {
	// 2020-11-25
	// "`Amasty_ShippingTableRates`: a rate is wronly prefixed with «null» / «undefined» on the frontend cart page"
	// https://github.com/tradefurniturecompany/site/issues/205
	'Magento_Checkout/js/view/summary/shipping': {'TFC_Core/Magento_Checkout/js/view/summary/shipping': true}
	// 2020-11-25
	// "Remove brackets around the shipping method's name on the frontend cart page"
	// https://github.com/tradefurniturecompany/site/issues/208
	,'Magento_Tax/js/view/checkout/cart/totals/shipping': {'TFC_Core/Magento_Tax/js/view/checkout/cart/totals/shipping': true}
}}};