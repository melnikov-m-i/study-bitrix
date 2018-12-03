<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CModule::IncludeModule("iblock");
$dbIBlockType = CIBlockType::GetList(
    array("sort" => "asc"),
    array("ACTIVE" => "Y")
);
define("IMPORT_INFOBLOCK_DEFAULT_TYPE_ALL", "allTypes");
$arIblockType[IMPORT_INFOBLOCK_DEFAULT_TYPE_ALL] = GetMessage("IMPORT_INFOBLOCK_DEFAULT_TYPE_ALL");

while ($arIBlockType = $dbIBlockType->Fetch()) {
    if ($arIBlockTypeLang = CIBlockType::GetByIDLang($arIBlockType["ID"], LANGUAGE_ID)) {
        $arIblockType[$arIBlockType["ID"]] = "[" . $arIBlockType["ID"] . "] " . $arIBlockTypeLang["NAME"];
    }
}

$arComponentParameters = array(
    "PARAMETERS" => array(
        "IBLOCK_TYPE_ID" => array(
            "PARENT" => "DATA_SOURCE",
            "NAME" => GetMessage("IMPORT_INFOBLOCK_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arIblockType,
            "REFRESH" => "Y"
        ),
    )
);
