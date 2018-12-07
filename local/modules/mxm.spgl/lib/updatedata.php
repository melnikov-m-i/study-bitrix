<?php
/*
 * SecurityPopulationGoodsLocation => Spgl
 */

namespace Mxm\Spgl;

use Mxm\Spgl\Locations;
use Mxm\Spgl\Goods;
use Mxm\Spgl\QuantityGoods;
use Bitrix\Main\SystemException;
use Mxm\Spgl\CatalogLocationsTable;

class UpdateData
{
    public static function update()
    {
        $service = "http://test-symf.local/api/";
        $locations = new Locations($service . "catalog-locations");
        $goods = new Goods($service . "catalog-goods");
        
        try {
            $locations->writeDataLocationsInDB();
            $goods->writeDataGoodsInDB();
        } catch (SystemException $e) {
            return null;
        }

        try {
            $catalogLocations = CatalogLocationsTable::getList()->fetchAll();
            $idExternalLocations = array_column($catalogLocations, "EXTERNAL_ID", "ID");
            foreach ($idExternalLocations as $extId) {
                $quantityGoods = new QuantityGoods($service . "quantity-goods-location/" . $extId);
                $quantityGoods->writeDataQuantityGoodsInDB($extId);
            }
        } catch(SystemException $e) {
            return null;
        }

        return "UpdateData::update()";
    }
}