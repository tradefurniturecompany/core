<?php
namespace TFC\Core\Plugin\Catalog\Block\Product\View;
use Magento\Catalog\Block\Product\View\Gallery as G;
use Magento\Catalog\Block\Product\View\GalleryOptions as Sb;
use Magento\Framework\DataObject as _DO;
use Magento\Framework\Data\Collection as C;
# 2020-10-28 "Improve the frontend product page": https://github.com/tradefurniturecompany/site/issues/191
final class GalleryOptions {
	/**
	 * 2020-10-28
	 * @see \Magento\Catalog\Block\Product\View\GalleryOptions::getOptionsJson()
	 */
	function afterGetOptionsJson(Sb $sb, string $r):string {
		$g = df_product_gallery_b(); /** @var G $g */
		$gc = $g->getGalleryImages(); /** @var C $gc */
		if ($gc->count()) {
			/** @var _DO $i */
			if (!($i = df_find($gc, function(_DO $i) use($g) {return $g->isMainImage($i);}))) {
				$i = $gc->getFirstItem();
			}
			try {
				$r = df_json_encode(
					array_combine(['width', 'height'], array_slice(getimagesize(df_product_image_path2abs($i['file'])), 0, 2))
					+ ['maxheight' => '60%']
					+ df_json_decode($r)
				);
			}
			catch (\Exception $e) {}
		}
		return $r;
	}
}