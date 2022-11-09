<?php
namespace TFC\Core\B\Home;
use Magento\Framework\View\Element\Template as _P;
// 2020-01-18
class Slider extends _P {
	/**
	 * 2020-01-18
	 * @override
	 * @see _P::getTemplate():
	 * 		public function getTemplate() {return $this->_template;}  
	 * https://github.com/magento/magento2/blob/2.3.4/lib/internal/Magento/Framework/View/Element/Template.php#L187-L195
	 * @used-by \Magento\Framework\View\Element\Template::_toHtml()
	 * @used-by \Magento\Framework\View\Element\Template::fetchView()
	 * @used-by \Magento\Framework\View\Element\Template::getCacheKeyInfo()
	 * @used-by \Magento\Framework\View\Element\Template::getTemplateFile()
	 * @return string
	 */
    function getTemplate() {return 'TFC_Core::home/slider.phtml';}

	/**
	 * 2020-03-18
	 * @used-by vendor/tradefurniturecompany/core/view/frontend/templates/home/slider.phtml
	 * @param string $n
	 * @param string $u [optional]
	 * @return string
	 */
    function i($n, $u = '') {
		$f = function($s) use($n) {return strtolower(str_replace(' ', $s, $n));};
		$i = $f('_'); /** @var string $i */
		$u = $u ?: $f('-');
		return df_cc_n(
			df_tag('a', ['href' => df_url("more-collections/$u")], df_tag('img', [
				'alt' => $n, 'data-lazy' => df_asset_url("TFC_Core::i/home/slider/$i.jpg")
			]))
			,df_tag('p', 'heading', $n)
		);
	}
}