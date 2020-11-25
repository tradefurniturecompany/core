// 2020-11-25
define(['df-lodash', 'jquery', 'mage/utils/wrapper'], function(_, $, w) {'use strict'; return function(sb) {
$.extend(sb.prototype, {
	getShippingMethodTitle: w.wrap(sb.prototype.getShippingMethodTitle, function(_super) {return(
		// 2020-11-25 It removes the trailing blank space:
		// see the sceenshots here: https://github.com/tradefurniturecompany/site/issues/205#issue-750061982
		_.trim(
			// 2020-11-25
			// "`Amasty_ShippingTableRates`: a rate is wronly prefixed with «null» / «undefined» on the frontend cart page"
			// https://github.com/tradefurniturecompany/site/issues/205
			_.trimStart(_.trimStart(_super(), 'null - '), 'undefined - ')
		)
	);})
});
return sb;};});