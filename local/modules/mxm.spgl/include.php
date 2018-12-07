<?php

\Bitrix\Main\Loader::registerAutoLoadClasses(
    "mxm.spgl",
    array(
        "\\Mxm\\Spgl\\CatalogLocationsTable" => "/local/modules/mxm.spgl/lib/cataloglocations.php",
        "\\Mxm\\Spgl\\CatalogGoodsTable" => "/local/modules/mxm.spgl/lib/cataloggoods.php",
        "\\Mxm\\Spgl\\QuantityGoodsLocationTable" => "/local/modules/mxm.spgl/lib/quantitygoodslocation.php",
        "\\Mxm\\Spgl\\Locations" => "/local/modules/mxm.spgl/lib/locations.php",
        "\\Mxm\\Spgl\\Goods" => "/local/modules/mxm.spgl/lib/goods.php",
        "\\Mxm\\Spgl\\QuantityGoods" => "/local/modules/mxm.spgl/lib/quantitygoods.php",
        "\\Mxm\\Spgl\\DataService" => "/local/modules/mxm.spgl/lib/dataservice.php",
        "\\Mxm\\Spgl\\Traits\\MethodsCreatingAndDeletingTablesInDBTrait" => "/local/modules/mxm.spgl/lib/traits/methodscreatinganddeletingtablesindbtrait.php",
        "\\Mxm\\Spgl\\UpdateData" => "/local/modules/mxm.spgl/lib/updatedata.php",
    )
);

CAgent::AddAgent(
    "UpdateData::update()",
    "mxm_spgl",
    "Y",
    3600);
