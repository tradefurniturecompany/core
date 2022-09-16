// 2022-09-16 Dmitry Fedyuk https://www.upwork.com/fl/mage2pro
// "Add a Google Tag Manager code to the `checkout/onepage/success` page":
// https://github.com/tradefurniturecompany/core/issues/42
define([], function() {return (
	/**
	 * @param {Object} cfg
	 * @param {String} cfg.amount
	 * @param {String} cfg.email
	 * @param {String} cfg.id
	 */
	function(cfg) {
		window.dataLayer.push({
			'enhanced_conversion_data': {'email': cfg.email}
			,'event':'ec_purchase'
			,'order_id': cfg.id
			,'order_value': cfg.amount
		})
	});
});