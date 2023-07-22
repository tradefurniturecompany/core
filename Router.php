<?php
namespace TFC\Core;
use Magento\Framework\App\Action\Redirect;
use Magento\Framework\App\RequestInterface as IRequest;
use Magento\Framework\App\RouterInterface as IRouter;
use Magento\UrlRewrite\Service\V1\Data\UrlRewrite as Rewrite;
# 2021-05-11 Dmitrii Fediuk https://upwork.com/fl/mage2pro
# "Redirect frontend product requests to canonical URLs (without a category path included)":
# https://github.com/tradefurniturecompany/core/issues/40
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Router implements IRouter {
	/**
	 * 2021-05-11
	 * @override
	 * @see IRouter::match()
	 * @used-by \Magento\Framework\App\FrontController::dispatch()
	 * @return Redirect|null
	 */
	function match(IRequest $req) {return
		($rew = df_url_finder()->findOneByData([
			Rewrite::REQUEST_PATH => df_trim_ds_left($req->getPathInfo()), Rewrite::STORE_ID => df_store_id(),
		])) /** @var Rewrite|null $rew */
		&& 'product' === $rew->getEntityType()
		&& 1 < count($parts = df_explode_url($rew->getRequestPath()))
		? df_router_redirect($req, df_last($parts))
		: null
	;}
}