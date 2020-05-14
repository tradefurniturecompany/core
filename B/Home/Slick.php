<?php
namespace TFC\Core\B\Home;
use Magento\Framework\View\Element\Template as _P;
// 2020-01-18
class Slick extends _P {
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
    function getTemplate() {return 'TFC_Core::home/slick.phtml';}

	/**               
	 * 2020-03-18
	 * @used-by vendor/tradefurniturecompany/core/view/frontend/templates/home/slick.phtml
	 * @param string $page
	 * @param string $img
	 * @param int $w [optional]
	 * @param int $h [optional]
	 * @param string $alt [optional]
	 * @return string
	 */
    function i($page, $img, $w = 0, $h = 0, $alt = '') {return df_tag('a',
		['href' => df_url("more-collections/$page")]
		,df_tag('img', df_clean([
			'alt' => $alt
			,'data-lazy' => df_media_path2url("wysiwyg/furniture_links/$img.jpg")
			,'height' => $h
			,'width' => $w
		], 0))
	);}
}