<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("iblock")) {
    return;
}

$iBlocks = [];
$arFilter = Array();
$arFilter['SITE_ID'] = SITE_ID;

if ($arParams['IBLOCK_TYPE_ID'] !== IMPORT_INFOBLOCK_DEFAULT_TYPE_ALL) {
    $arFilter['TYPE'] = $arParams['IBLOCK_TYPE_ID'];
}

$dbIblock = CIBlock::GetList(Array(), $arFilter, true);

while ($res = $dbIblock->Fetch()) {
    $iBlocks[] = $res;
}

$arResult['IBLOCKS'] = $iBlocks;
$this->IncludeComponentTemplate();
return $arResult;
?>
