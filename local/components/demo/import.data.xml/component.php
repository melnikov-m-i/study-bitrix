<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Loader;
use \Bitrix\Iblock\IblockTable;

if(!Loader::includeModule('iblock')) {
    return;
}

/*$dbIblock = IblockTable::getList(array(
    'select' => array('*'),
    'filter' => array('SITE_ID' => SITE_ID)
));*/

$iBlocks = [];

$dbIblock = CIBlock::GetList(
    Array(),
    Array(
        'SITE_ID' => SITE_ID
    ), true
);

while($res = $dbIblock->Fetch())
{
    $iBlocks[] = $res;
}

$arResult['IBLOCKS'] = $iBlocks;

$this->IncludeComponentTemplate();

return $arResult;
?>
