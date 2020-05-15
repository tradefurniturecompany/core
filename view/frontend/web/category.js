// 2020-05-15 Dmitry Fedyuk https://www.upwork.com/fl/mage2pro
// "Hide the text below the primary image from the «Collections» (`/more-collections`) page on narrow screens":
// https://github.com/tradefurniturecompany/core/issues/30
define([], function() {return function() {require(['jquery', 'df-scroll', 'domReady!'], function($) {
	var $c = $('body.catalog-category-view .category-view');
	var $text = $('.category-description', $c);
	var $toggle = $("<div class='tfc-toggle closed'><div>…</div></div>");
	$text.after($toggle);
	var $toggleLabel = $toggle.children('div');
	var $cms = $('div.category-cms');
	if ('' === $.trim($cms.text())) {
		$cms.remove();
	}
	$toggle.click(function() {
		var show = !$text.is(':visible');
		$text.css('display', show ? 'block' : 'none');
		$toggleLabel.text(show ? '×' : '…');
		$toggle.toggleClass('closed', !show);
		if (!show) {
			$(window).scrollTo($c, 500);
		}
	});
});}});