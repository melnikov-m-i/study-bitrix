<?php
/*
 * SecurityPopulationGoodsLocation => Spgl
 */

namespace Mxm\Spgl;

use Bitrix\Main\SystemException;
use Mxm\Spgl\DataService;
use Mxm\Spgl\CatalogGoodsTable;
use Mxm\Spgl\QuantityGoodsLocationTable;

class Goods extends DataService
{
    public function writeDataGoodsInDB()
    {
        $data = $this->getDataFromExternalService();
        $catalogGoods = json_decode($data);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new SystemException('The data is not in the correct format');
        } elseif(!empty($catalogGoods)) {
            $oldGoods = CatalogGoodsTable::getList()->fetchAll();
            $oldExternalIdGoods = array_column($oldGoods, "EXTERNAL_ID", "ID");
            $newExternalIdGoods = array_column($catalogGoods, "id");
            $delId = array_diff($oldExternalIdGoods, $newExternalIdGoods);
            $newId = array_diff($newExternalIdGoods, $oldExternalIdGoods);
            $oldId = array_intersect($oldExternalIdGoods, $newExternalIdGoods);

            foreach ($catalogGoods as $goods) {
                if (!empty($newId)) {
                    if (array_search($goods["id"], $newId) !== false) {
                        $fields = [
                            "EXTERNAL_ID" => $goods["id"],
                            "NAME" => $goods["name"]
                        ];
                        $result = CatalogGoodsTable::add($fields);

                        if (!$result->isSuccess()) {
                            throw new SystemException(implode(",", $result->getErrorMessages()));
                        }
                    }
                }

                if (!empty($oldId)) {
                    $id = array_search($goods["id"], $oldId);
                    $fields = [
                        "NAME" => $goods["name"]
                    ];

                    if ($id !== false) {
                        $result = CatalogGoodsTable::update($id, $fields);

                        if (!$result->isSuccess()) {
                            throw new SystemException(implode(",", $result->getErrorMessages()));
                        }
                    }
                }
            }

            if (!empty($delId)) {
                foreach ($delId as $id => $extId) {
                    /*$result = QuantityGoodsLocationTable::delete([
                        "LOCATION_ID" => "",
                        "GOODS_ID" => $id
                    ]);

                    if (!$result->isSuccess()) {
                        throw new SystemException(implode(",", $result->getErrorMessages()));
                    }*/

                    $result = CatalogGoodsTable::delete($id);

                    if (!$result->isSuccess()) {
                        throw new SystemException(implode(",", $result->getErrorMessages()));
                    }
                }
            }
        }
    }
}