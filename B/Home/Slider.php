<?php
namespace TFC\Core\B\Home;
use Magento\Framework\View\Element\Template as _P;
use Magento\Framework\ObjectManager\NoninterceptableInterface as INonInterceptable;
# 2020-01-18, 2022-11-09
final class Slider extends _P implements INonInterceptable {
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
	 */
    function getTemplate():string {return 'TFC_Core::home/slider.phtml';}

	/**
	 * 2022-11-09
	 * @used-by vendor/tradefurniturecompany/core/view/frontend/templates/home/slider.phtml
	 * @param array(string|string[]) $a
	 */
    function p():string {return df_cc_n(df_map(array_chunk(df_module_json($this, 'slider'), 2), function(array $c):string {return
		df_tag('div', 'furniture-link', df_cc_n(df_map($c, function($i):string {return $this->i(...df_array($i));})))
	;}));}

	/**
	 * 2020-03-18
	 * @used-by self::p()
	 */
    private function i(string $n, string $u = ''):string {
		$f = function($s) use($n):string {return strtolower(str_replace(' ', $s, $n));};
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