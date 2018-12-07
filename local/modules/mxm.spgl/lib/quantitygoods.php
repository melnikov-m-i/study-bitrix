<?php
/*
 * SecurityPopulationGoodsLocation => Spgl
 */

namespace Mxm\Spgl;

use Bitrix\Main\SystemException;
use Mxm\Spgl\DataService;
use Mxm\Spgl\QuantityGoodsLocationTable;
use Mxm\Spgl\CatalogLocationsTable;
use Mxm\Spgl\CatalogGoodsTable;

class QuantityGoods extends DataService
{
    public function writeDataQuantityGoodsInDB($externalIdLocation)
    {
        $data = $this->getDataFromExternalService();
        $quantityGoods = json_decode($data, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new SystemException('The data is not in the correct format');
        } elseif(!empty($quantityGoods)) {
            $row = CatalogLocationsTable::getRow([
                "select" => ["ID"],
                "filter" => ["=EXTERNAL_ID" => $externalIdLocation]
            ]);

            if (array_key_exists("ID", $row)) {
                $interiorIdLocation = $row["ID"];
                $oldQuantityGoods = QuantityGoodsLocationTable::getList([
                    "select" => ["*", 'EXTERNAL_ID' => "GOODS.EXTERNAL_ID"],
                    "filter" => ["=LOCATION_ID" => $interiorIdLocation]
                ])->fetchAll();

                $oldExternalIdGoodsInQuantity = array_column($oldQuantityGoods, "EXTERNAL_ID", "GOODS_ID");
                $newExternalIdGoodsInQuantity = array_keys($quantityGoods);
                $delIdGoodsInQuantity = array_diff($oldExternalIdGoodsInQuantity, $newExternalIdGoodsInQuantity);
                $newIdGoodsInQuantity = array_diff($newExternalIdGoodsInQuantity, $oldExternalIdGoodsInQuantity);
                $oldIdGoodsInQuantity = array_intersect($oldExternalIdGoodsInQuantity, $newExternalIdGoodsInQuantity);

                if (!empty($newIdGoodsInQuantity)) {
                    $goods = CatalogGoodsTable::getList([
                        "filter" => ["=EXTERNAL_ID" => $newIdGoodsInQuantity]
                    ])->fetchAll();
                    $interiorIdGoods = array_column($goods, "ID", "EXTERNAL_ID");
                }

                if (!empty($oldIdGoodsInQuantity)) {
                    $qntGoods = array_column($oldQuantityGoods, "NEW_QUANTITY", "GOODS_ID");
                }

                foreach ($quantityGoods as $externalIdGoods => $quantity) {
                    if (!empty($newIdGoodsInQuantity)) {
                        if (array_search($externalIdGoods, $newIdGoodsInQuantity) !== false) {
                            $fields = [
                                "LOCATION_ID" => $interiorIdLocation,
                                "GOODS_ID" => $interiorIdGoods[$externalIdGoods],
                                "OLD_QUANTITY" => $quantity,
                                "NEW_QUANTITY" => $quantity
                            ];
                            $result = QuantityGoodsLocationTable::add($fields);

                            if (!$result->isSuccess()) {
                                throw new SystemException(implode(",", $result->getErrorMessages()));
                            }
                        }
                    }

                    if (!empty($oldIdGoodsInQuantity)) {
                        $id = array_search($externalIdGoods, $oldIdGoodsInQuantity);
                        $fields = [
                            "OLD_QUANTITY" => $qntGoods[$id],
                            "NEW_QUANTITY" => $quantity
                        ];

                        if ($id !== false) {
                            $result = QuantityGoodsLocationTable::update(
                                [
                                    "LOCATION_ID" => $interiorIdLocation,
                                    "GOODS_ID" => $id
                                ],
                                $fields
                            );

                            if (!$result->isSuccess()) {
                                throw new SystemException(implode(",", $result->getErrorMessages()));
                            }
                        }
                    }
                }

                if (!empty($delIdGoodsInQuantity)) {
                    foreach ($delIdGoodsInQuantity as $id => $extId) {
                        $result = QuantityGoodsLocationTable::delete([
                            "LOCATION_ID" => $interiorIdLocation,
                            "GOODS_ID" => $id
                        ]);

                        if (!$result->isSuccess()) {
                            throw new SystemException(implode(",", $result->getErrorMessages()));
                        }
                    }
                }
            } else {
                throw new SystemException("There is no location with this value");
            }
        }
    }
}