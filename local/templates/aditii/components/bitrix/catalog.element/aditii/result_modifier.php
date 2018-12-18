<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$arResult['TABS_DESC'] = array(
    array(
        "NAME" => "Описание",
        "VALUE" => $arResult['DETAIL_TEXT']
    ),
    array(
        "NAME" => $arResult['DISPLAY_PROPERTIES']['ABOUT_BRAND']['NAME'],
        "VALUE" => $arResult['DISPLAY_PROPERTIES']['ABOUT_BRAND']['DISPLAY_VALUE']
    ),
    array(
        "NAME" => $arResult['DISPLAY_PROPERTIES']['DELIVERY']['NAME'],
        "VALUE" => $arResult['DISPLAY_PROPERTIES']['DELIVERY']['DISPLAY_VALUE']
    )
);