<?php
namespace TFC\Core\Observer;
use Df\Framework\Logger\Handler\System as E;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
/**
 * 2020-08-30
 * 1) Event: `df_can_log`
 * @see \Df\Framework\Logger\Handler\System::handle()
 * 		df_dispatch('df_can_log', ['message' => $d, 'result' => ($o = new O)]); /** @var O $o
 * 		$r = $o[self::SKIP] || parent::handle($d);
 * https://github.com/mage2pro/core/blob/6.8.1/Framework/Logger/Handler/System.php#L44-L45
 * 2) "Prevent Magento from logging the «PayPal NVP gateway errors: You do not have permissions to make this API call
 * (#10002: Authentication/Authorization Failed).» message": https://github.com/tradefurniturecompany/core/issues/38
 */
final class CanLog implements ObserverInterface {
	/**
	 * 2017-01-17
	 * @override
	 * @see ObserverInterface::execute()
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 * @param Observer $ob
	 */
	function execute(Observer $ob) {
		$m = $ob[E::P_MESSAGE]; /** @var array(string => mixed) $m */
		$ob[E::P_RESULT][E::V_SKIP] = df_contains(dfa($m, 'message'), 'You do not have permissions to make this API call');
	}
}