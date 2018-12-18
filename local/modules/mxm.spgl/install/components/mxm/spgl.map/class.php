<?php
use Mxm\Spgl\QuantityGoodsLocationTable;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class SpglMap extends CBitrixComponent
{
    const DEFAULT_WIDTH = 600;
    const DEFAULT_HEIGHT = 200;

    public function onPrepareComponentParams($arParams)
    {
        $result = [];

        if (is_numeric($arParams["WIDTH_MAP"])) {
            $result["WIDTH_MAP"] = abs(intval($arParams["WIDTH_MAP"]));
        } else {
            $result["WIDTH_MAP"] = self::DEFAULT_WIDTH;
        }

        if (is_numeric($arParams["HEIGHT_MAP"])) {
            $result["HEIGHT_MAP"] = abs(intval($arParams["HEIGHT_MAP"]));
        } else {
            $result["HEIGHT_MAP"] = self::DEFAULT_HEIGHT;
        }

        return $result;
    }

    public function executeComponent()
    {
        $this->arResult["DATA"] = $this->getData();
        $this->includeComponentTemplate();
        return $this->arResult;
    }

    public function getData()
    {
        if(!\Bitrix\Main\Loader::includeModule("mxm.spgl")) {
            return;
        }

        $data = QuantityGoodsLocationTable::getList(array(
            "select" => [
                "OLD_QUANTITY",
                "NEW_QUANTITY",
                "LOC_NAME" => "LOCATION.NAME",
                "LOC_LATITUDE" => "LOCATION.LATITUDE",
                "LOC_LONGITUDE" => "LOCATION.LONGITUDE",
                "GOODS_NAME" => "GOODS.NAME"
            ],
        ))->fetchAll();

        $result = [];

        foreach ($data as $item) {
            $locName = $item["LOC_NAME"];

            if(!is_array($result[$locName])) {
                $result[$locName] = [];
            }

            $result[$locName] += [
                'LOC_LATITUDE' => $item["LOC_LATITUDE"],
                'LOC_LONGITUDE' => $item["LOC_LONGITUDE"],
                'GOODS' => [],
            ];
            $result[$locName]['GOODS'][]  = [
                "NAME" => $item["GOODS_NAME"],
                "OLD_QUANTITY" => $item["OLD_QUANTITY"],
                "NEW_QUANTITY" => $item["NEW_QUANTITY"],
                "DIFF_QUANTITY" => $item["NEW_QUANTITY"] - $item["OLD_QUANTITY"]
            ];
        }

        return $result;
    }
}
