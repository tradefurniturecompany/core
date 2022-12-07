<?php
namespace TFC\Core\B\Home;
use Magento\Framework\View\Element\Template as _P;
# 2020-05-14
# "Hide the text between sliders into a collapsible box on narrow screens":
# https://github.com/tradefurniturecompany/core/issues/29
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Welcome extends _P {
	/**
	 * 2020-05-14
	 * @override
	 * @see _P::getTemplate():
	 * 		public function getTemplate() {return $this->_template;}  
	 * https://github.com/magento/magento2/blob/2.3.4/lib/internal/Magento/Framework/View/Element/Template.php#L187-L195
	 * @used-by \Magento\Framework\View\Element\Template::_toHtml()
	 * @used-by \Magento\Framework\View\Element\Template::fetchView()
	 * @used-by \Magento\Framework\View\Element\Template::getCacheKeyInfo()
	 * @used-by \Magento\Framework\View\Element\Template::getTemplateFile()
	 */
    function getTemplate():string {return 'TFC_Core::home/welcome.phtml';}
}