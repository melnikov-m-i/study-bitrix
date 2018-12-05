<?php
/*
 * SecurityPopulationGoodsLocation => Spgl
 */

namespace Mxm\Spgl;

use Bitrix\Main\SystemException;
use Mxm\Spgl\DataService;
use Mxm\Spgl\CatalogLocationsTable;
use Mxm\Spgl\QuantityGoodsLocationTable;

class Locations extends DataService
{
    public function writeDataLocationsInDB()
    {
        $data = $this->getDataFromExternalService();
        $catalogLocations = json_decode($data);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new SystemException("The data is not in the correct format");
        } elseif (!empty($catalogLocations)) {

            $oldLocations = CatalogLocationsTable::getList()->fetchAll();
            $oldExternalIdLocations = array_column($oldLocations, "EXTERNAL_ID", "ID");
            $newExternalIdLocations = array_column($catalogLocations, "id");
            $delId = array_diff($oldExternalIdLocations, $newExternalIdLocations);
            $newId = array_diff($newExternalIdLocations, $oldExternalIdLocations);
            $oldId = array_intersect($oldExternalIdLocations, $newExternalIdLocations);

            if (!empty($newId)) {
                foreach ($catalogLocations as $location) {
                    if (array_search($location["id"], $newId) !== false) {
                        $fields = [
                            "EXTERNAL_ID" => $location["id"],
                            "NAME" => $location["name"],
                            "LATITUDE" => $location["latitude"],
                            "LONGITUDE" => $location["longitude"]
                        ];
                        $result = CatalogLocationsTable::add($fields);

                        if (!$result->isSuccess()) {
                            throw new SystemException(implode(",", $result->getErrorMessages()));
                        }
                    }
                }
            }

            if (!empty($oldId)) {
                foreach ($catalogLocations as $location) {
                    $id = array_search($location["id"], $oldId);
                    $fields = [
                        "NAME" => $location["name"],
                        "LATITUDE" => $location["latitude"],
                        "LONGITUDE" => $location["longitude"]
                    ];

                    if ($id !== false) {
                        $result = CatalogLocationsTable::update($id, $fields);

                        if (!$result->isSuccess()) {
                            throw new SystemException(implode(",", $result->getErrorMessages()));
                        }
                    }
                }
            }

            if (!empty($delId)) {
                foreach ($delId as $id => $extId) {
                    /*$result = QuantityGoodsLocationTable::delete([
                        "LOCATION_ID" => $id,
                        "GOODS_ID" => ""
                    ]);

                    if (!$result->isSuccess()) {
                        throw new SystemException(implode(",", $result->getErrorMessages()));
                    }*/

                    $result = CatalogLocationsTable::delete($id);

                    if (!$result->isSuccess()) {
                        throw new SystemException(implode(",", $result->getErrorMessages()));
                    }
                }
            }
        }
    }
}