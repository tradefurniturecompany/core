// 2020-11-25
// "Remove brackets around the shipping method's name on the frontend cart page"
// https://github.com/tradefurniturecompany/site/issues/208
define(['df-lodash', 'jquery', 'mage/utils/wrapper'], function(_, $, w) {'use strict'; return function(sb) {
$.extend(sb.prototype, {
	getShippingMethodTitle: w.wrap(sb.prototype.getShippingMethodTitle, function(_super) {return(
		_.trimEnd(_.trimStart(_super(), '('), ')')
	);})
});
return sb;};});