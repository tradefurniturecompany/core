<?php
namespace TFC\Core\Observer;
use Df\Framework\Log\Dispatcher as D;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
/**
 * 2020-08-30, 2021-12-06
 * Event: `df_can_log`
 * @see \Df\Framework\Log\Dispatcher::handle()
 * 		df_dispatch('df_can_log', ['message' => $d, 'result' => ($o = new O)]);
 * 		if (!($r = !!$o[self::V_SKIP])) {
 * https://github.com/mage2pro/core/blob/8.0.0/Framework/Log/Dispatcher.php#L54-L55
 */
final class CanLog implements ObserverInterface {
	/**
	 * 2020-08-30
	 * @override
	 * @see ObserverInterface::execute()
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 */
	function execute(Observer $ob):void {
		$m = $ob[D::P_MESSAGE]; /** @var array(string => mixed) $m */
		$ob[D::P_RESULT][D::V_SKIP] = df_contains(dfa($m, 'message'), [
			# 2020-08-30
			# "Prevent Magento from logging the
			# «PayPal NVP gateway errors: You do not have permissions to make this API call
			# (#10002: Authentication/Authorization Failed).» message": https://github.com/tradefurniturecompany/core/issues/38
			'You do not have permissions to make this API call'
			# 2020-08-31
			# "Prevent Magento from logging the «Invalid state change requested» message to `exception.log`":
			# https://github.com/tradefurniturecompany/core/issues/39
			,'Invalid state change requested'
		]);
	}
}