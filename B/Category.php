<?php
namespace TFC\Core\B;
use Magento\Framework\View\Element\AbstractBlock as _P;
# 2020-05-15
# "Hide the text below the primary image from the «Collections» (`/more-collections`) page on narrow screens":
# https://github.com/tradefurniturecompany/core/issues/30
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Category extends _P {
	/**
	 * 2020-05-15
	 * @override
	 * @see _P::_toHtml()
	 * @used-by _P::toHtml():
	 *		$html = $this->_loadCache();
	 *		if ($html === false) {
	 *			if ($this->hasData('translate_inline')) {
	 *				$this->inlineTranslation->suspend($this->getData('translate_inline'));
	 *			}
	 *			$this->_beforeToHtml();
	 *			$html = $this->_toHtml();
	 *			$this->_saveCache($html);
	 *			if ($this->hasData('translate_inline')) {
	 *				$this->inlineTranslation->resume();
	 *			}
	 *		}
	 *		$html = $this->_afterToHtml($html);
	 * https://github.com/magento/magento2/blob/2.2.0/lib/internal/Magento/Framework/View/Element/AbstractBlock.php#L643-L689
	 */
	final protected function _toHtml():string {return df_js(__CLASS__, 'category');}
}