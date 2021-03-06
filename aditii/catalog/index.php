<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?>
    <section>
        <div class="bg-main main">
            <? $APPLICATION->IncludeComponent(
                "bitrix:catalog",
                "aditii",
                array(
                    "COMPONENT_TEMPLATE" => "aditii",
                    "IBLOCK_TYPE" => "xmlcatalog",
                    "IBLOCK_ID" => "22",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "HIDE_NOT_AVAILABLE_OFFERS" => "Y",
                    "TEMPLATE_THEME" => "green",
                    "COMMON_SHOW_CLOSE_POPUP" => "N",
                    "SHOW_DISCOUNT_PERCENT" => "N",
                    "SHOW_OLD_PRICE" => "N",
                    "DETAIL_SHOW_MAX_QUANTITY" => "N",
                    "MESS_BTN_BUY" => "Купить",
                    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                    "MESS_BTN_COMPARE" => "Сравнение",
                    "MESS_BTN_DETAIL" => "Подробнее",
                    "MESS_NOT_AVAILABLE" => "Нет в наличии",
                    "DETAIL_USE_VOTE_RATING" => "N",
                    "DETAIL_USE_COMMENTS" => "N",
                    "DETAIL_BRAND_USE" => "N",
                    "USER_CONSENT" => "N",
                    "USER_CONSENT_ID" => "0",
                    "USER_CONSENT_IS_CHECKED" => "Y",
                    "USER_CONSENT_IS_LOADED" => "N",
                    "SEF_MODE" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "USE_MAIN_ELEMENT_SECTION" => "N",
                    "DETAIL_STRICT_SECTION_CHECK" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_TITLE" => "Y",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "ADD_ELEMENT_CHAIN" => "N",
                    "USE_SALE_BESTSELLERS" => "N",
                    "USE_FILTER" => "N",
                    "FILTER_VIEW_MODE" => "VERTICAL",
                    "USE_REVIEW" => "N",
                    "ACTION_VARIABLE" => "action",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "USE_COMPARE" => "N",
                    "PRICE_CODE" => array(
                        0 => "BASE",
                    ),
                    "USE_PRICE_COUNT" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "PRICE_VAT_INCLUDE" => "N",
                    "PRICE_VAT_SHOW_VALUE" => "N",
                    "CONVERT_CURRENCY" => "N",
                    "BASKET_URL" => "/personal/cart/index.php",
                    "USE_PRODUCT_QUANTITY" => "N",
                    "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                    "ADD_PROPERTIES_TO_BASKET" => "N",
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PARTIAL_PRODUCT_PROPERTIES" => "N",
                    "PRODUCT_PROPERTIES" => array(
                        0 => "COLOR,SIZE",
                    ),
                    "USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
                    "COMMON_ADD_TO_BASKET_ACTION" => "ADD",
                    "TOP_ADD_TO_BASKET_ACTION" => "ADD",
                    "SECTION_ADD_TO_BASKET_ACTION" => "ADD",
                    "DETAIL_ADD_TO_BASKET_ACTION" => array(
                        0 => "BUY",
                    ),
                    "SHOW_TOP_ELEMENTS" => "Y",
                    "TOP_ELEMENT_COUNT" => "6",
                    "TOP_LINE_ELEMENT_COUNT" => "3",
                    "TOP_ELEMENT_SORT_FIELD" => "sort",
                    "TOP_ELEMENT_SORT_ORDER" => "asc",
                    "TOP_ELEMENT_SORT_FIELD2" => "id",
                    "TOP_ELEMENT_SORT_ORDER2" => "desc",
                    "TOP_PROPERTY_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "TOP_VIEW_MODE" => "SECTION",
                    "SECTION_COUNT_ELEMENTS" => "Y",
                    "SECTION_TOP_DEPTH" => "2",
                    "SECTIONS_VIEW_MODE" => "TILE",
                    "SECTIONS_SHOW_PARENT_NAME" => "Y",
                    "PAGE_ELEMENT_COUNT" => "30",
                    "LINE_ELEMENT_COUNT" => "3",
                    "ELEMENT_SORT_FIELD" => "sort",
                    "ELEMENT_SORT_ORDER" => "asc",
                    "ELEMENT_SORT_FIELD2" => "id",
                    "ELEMENT_SORT_ORDER2" => "desc",
                    "LIST_PROPERTY_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "LIST_META_KEYWORDS" => "-",
                    "LIST_META_DESCRIPTION" => "-",
                    "LIST_BROWSER_TITLE" => "-",
                    "SECTION_BACKGROUND_IMAGE" => "-",
                    "DETAIL_PROPERTY_CODE" => array(
                        0 => "COLOR",
                        1 => "SIZE",
                        2 => "DELIVERY",
                        3 => "ABOUT_BRAND",
                        4 => "QUANTITY",
                        5 => "",
                    ),
                    "DETAIL_META_KEYWORDS" => "-",
                    "DETAIL_META_DESCRIPTION" => "-",
                    "DETAIL_BROWSER_TITLE" => "-",
                    "DETAIL_SET_CANONICAL_URL" => "N",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
                    "DETAIL_BACKGROUND_IMAGE" => "-",
                    "SHOW_DEACTIVATED" => "N",
                    "DETAIL_DISPLAY_NAME" => "Y",
                    "DETAIL_DETAIL_PICTURE_MODE" => array(
                        0 => "MAGNIFIER",
                    ),
                    "DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
                    "DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
                    "LINK_IBLOCK_TYPE" => "",
                    "LINK_IBLOCK_ID" => "",
                    "LINK_PROPERTY_SID" => "",
                    "LINK_ELEMENTS_URL" => "",
                    "USE_ALSO_BUY" => "N",
                    "USE_GIFTS_DETAIL" => "N",
                    "USE_GIFTS_SECTION" => "N",
                    "USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",
                    "GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
                    "GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
                    "GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
                    "GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
                    "GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
                    "GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
                    "GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
                    "GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
                    "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
                    "GIFTS_SHOW_OLD_PRICE" => "Y",
                    "GIFTS_SHOW_NAME" => "Y",
                    "GIFTS_SHOW_IMAGE" => "Y",
                    "GIFTS_MESS_BTN_BUY" => "Выбрать",
                    "GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
                    "GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
                    "GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
                    "USE_STORE" => "N",
                    "USE_BIG_DATA" => "Y",
                    "BIG_DATA_RCM_TYPE" => "personal",
                    "PAGER_TEMPLATE" => ".default",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Товары",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "COMPATIBLE_MODE" => "Y",
                    "USE_ELEMENT_COUNTER" => "N",
                    "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                    "DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
                    "PRODUCT_SUBSCRIPTION" => "N",
                    "SHOW_MAX_QUANTITY" => "N",
                    "MESS_BTN_SUBSCRIBE" => "Подписаться",
                    "SIDEBAR_SECTION_SHOW" => "Y",
                    "SIDEBAR_DETAIL_SHOW" => "N",
                    "SIDEBAR_PATH" => "",
                    "FILTER_HIDE_ON_MOBILE" => "N",
                    "INSTANT_RELOAD" => "N",
                    "DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
                        0 => "BUY",
                    ),
                    "SEARCH_PAGE_RESULT_COUNT" => "50",
                    "SEARCH_RESTART" => "N",
                    "SEARCH_NO_WORD_LOGIC" => "Y",
                    "SEARCH_USE_LANGUAGE_GUESS" => "Y",
                    "SEARCH_CHECK_DATES" => "Y",
                    "TOP_PROPERTY_CODE_MOBILE" => array(),
                    "TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                    "TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
                    "TOP_ENLARGE_PRODUCT" => "STRICT",
                    "TOP_SHOW_SLIDER" => "N",
                    "TOP_SLIDER_INTERVAL" => "3000",
                    "TOP_SLIDER_PROGRESS" => "N",
                    "DETAIL_MAIN_BLOCK_PROPERTY_CODE" => array(),
                    "DETAIL_IMAGE_RESOLUTION" => "16by9",
                    "DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
                    "DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
                    "DETAIL_SHOW_SLIDER" => "N",
                    "MESS_PRICE_RANGES_TITLE" => "Цены",
                    "MESS_DESCRIPTION_TAB" => "Описание",
                    "MESS_PROPERTIES_TAB" => "Характеристики",
                    "MESS_COMMENTS_TAB" => "Комментарии",
                    "DETAIL_SHOW_POPULAR" => "N",
                    "DETAIL_SHOW_VIEWED" => "N",
                    "USE_ENHANCED_ECOMMERCE" => "N",
                    "LAZY_LOAD" => "N",
                    "LOAD_ON_SCROLL" => "N",
                    "ADD_PICT_PROP" => "MORE_PHOTO",
                    "LABEL_PROP" => array(),
                    "LIST_PROPERTY_CODE_MOBILE" => array(),
                    "LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                    "LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
                    "LIST_ENLARGE_PRODUCT" => "STRICT",
                    "LIST_SHOW_SLIDER" => "N",
                    "SEF_FOLDER" => "/aditii/catalog/",
                    "LABEL_PROP_MOBILE" => "",
                    "LABEL_PROP_POSITION" => "top-left",
                    "SECTIONS_HIDE_SECTION_NAME" => "N",
                    "VARIABLE_ALIASES" => array(
                        "ELEMENT_ID" => "ELEMENT_ID",
                        "SECTION_ID" => "SECTION_ID",
                    )
                ),
                false
            ); ?>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>