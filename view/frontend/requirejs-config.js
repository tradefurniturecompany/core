// 2020-11-25
// "`Amasty_ShippingTableRates`: a rate is wronly prefixed with «null» / «undefined» on the frontend cart page"
// https://github.com/tradefurniturecompany/site/issues/205
var config = {config: {mixins: {
	'Magento_Checkout/js/view/summary/shipping': {'TFC_Core/Magento_Checkout/js/view/summary/shipping': true}
}}};