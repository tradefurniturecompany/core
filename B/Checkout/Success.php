<?php
namespace TFC\Core\B\Checkout;
use Magento\Framework\View\Element\AbstractBlock as _P;
use Magento\Sales\Model\Order as O;
# 2022-09-16
# "Add a Google Tag Manager code to the `checkout/onepage/success` page":
# https://github.com/tradefurniturecompany/core/issues/42
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Success extends _P {
	/**
	 * 2022-09-16
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
	final protected function _toHtml():string {
		# 2022-09-16
		# I have already impemented a similar task in the Justuno project:
		# https://github.com/JustunoCom/m2/blob/1.7.7/Block/Js.php#L39-L51
		$o = df_order_last(); /** @var O $o */
		return df_js(__CLASS__, 'checkout/success', [
			'amount' => dff_2($o->getGrandTotal()), 'email' => $o->getCustomerEmail(), 'id' => $o->getIncrementId()
		]);
	}
}