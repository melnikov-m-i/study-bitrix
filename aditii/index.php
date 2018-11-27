<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Aditii");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Aditii");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:advertising.banner", 
	"top", 
	array(
		"COMPONENT_TEMPLATE" => "top",
		"TYPE" => "TOP",
		"NOINDEX" => "N",
		"QUANTITY" => "1",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0"
	),
	false
);?>


<?$APPLICATION->IncludeComponent("bitrix:furniture.catalog.index", "main", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "xmlcatalog",
		"IBLOCK_ID" => "22",
		"IBLOCK_BINDING" => "element",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000",
		"CACHE_GROUPS" => "N",
	),
	false
);?>

	<div class="bg-header-main">
		<div class="wrap">
			<div class="header-main">
				<h2>featured products</h2>
			</div>
		</div>
	</div>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top", 
	"main", 
	array(
		"COMPONENT_TEMPLATE" => "main",
		"IBLOCK_TYPE" => "xmlcatalog",
		"IBLOCK_ID" => "22",
		"FILTER_NAME" => "",
		"CUSTOM_FILTER" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ELEMENT_COUNT" => "6",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE_MOBILE" => array(
		),
		"OFFERS_LIMIT" => "6",
		"VIEW_MODE" => "SECTION",
		"TEMPLATE_THEME" => "green",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => array(
			0 => "COLOR",
		),
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"ENLARGE_PRODUCT" => "STRICT",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"SECTION_URL" => "#SITE_DIR#/catalog/?SECTION_ID=#SECTION_ID#/",
		"DETAIL_URL" => "#SITE_DIR#/catalog/?SECTION_ID=#SECTION_ID#&ELEMENT_ID=#ELEMENT_ID#/",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"SEF_MODE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"CACHE_FILTER" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRICE_CODE" => array(
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/cart/",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "N",
		"MESS_BTN_COMPARE" => "Сравнить",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"COMPATIBLE_MODE" => "Y",
		"ROTATE_TIMER" => "30",
		"SHOW_PAGINATION" => "Y",
		"LABEL_PROP_MOBILE" => array(
		),
		"LABEL_PROP_POSITION" => "top-left"
	),
	false
);?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>