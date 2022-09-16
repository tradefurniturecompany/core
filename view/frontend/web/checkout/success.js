// 2022-09-16 Dmitry Fedyuk https://www.upwork.com/fl/mage2pro
// "Add a Google Tag Manager code to the `checkout/onepage/success` page":
// https://github.com/tradefurniturecompany/core/issues/42
define([], function() {return (
	/**
	 * @param {Object} cfg
	 */
	function(cfg) {
		window.dataLayer.push({
			'event':'ec_purchase',
			'order_value':'',
			'order_id':'',
			'enhanced_conversion_data': {
				"email": 'yourEmailVariable',
			}
		})
	});
});