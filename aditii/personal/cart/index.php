<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>
    <section>
        <div class="bg-main">
            <div class="wrap">
                <div class="main">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:sale.basket.basket",
                        ".default",
                        array(
                            "COLUMNS_LIST" => array(
                                0 => "NAME",
                                1 => "PRICE",
                                2 => "QUANTITY",
                                3 => "DELETE",
                                4 => "DISCOUNT",
                            ),
                            "PATH_TO_ORDER" => SITE_DIR . "personal/order/make/",
                            "HIDE_COUPON" => "Y",
                            "SET_TITLE" => "Y",
                            "COMPONENT_TEMPLATE" => ".default",
                            "DEFERRED_REFRESH" => "N",
                            "USE_DYNAMIC_SCROLL" => "Y",
                            "SHOW_FILTER" => "N",
                            "SHOW_RESTORE" => "Y",
                            "COLUMNS_LIST_EXT" => array(
                                0 => "PREVIEW_PICTURE",
                                1 => "DISCOUNT",
                                2 => "DELETE",
                                3 => "DELAY",
                                4 => "TYPE",
                                5 => "SUM",
                                6 => "PROPERTY_COLOR",
                                7 => "PROPERTY_SIZE",
                                8 => "PROPERTY_QUANTITY",
                            ),
                            "COLUMNS_LIST_MOBILE" => array(
                                0 => "PREVIEW_PICTURE",
                                1 => "DISCOUNT",
                                2 => "DELETE",
                                3 => "DELAY",
                                4 => "TYPE",
                                5 => "SUM",
                            ),
                            "TEMPLATE_THEME" => "blue",
                            "TOTAL_BLOCK_DISPLAY" => array(
                                0 => "top",
                            ),
                            "DISPLAY_MODE" => "extended",
                            "PRICE_DISPLAY_MODE" => "Y",
                            "SHOW_DISCOUNT_PERCENT" => "Y",
                            "DISCOUNT_PERCENT_POSITION" => "bottom-right",
                            "PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
                            "USE_PRICE_ANIMATION" => "Y",
                            "LABEL_PROP" => array(),
                            "PRICE_VAT_SHOW_VALUE" => "N",
                            "USE_PREPAYMENT" => "N",
                            "QUANTITY_FLOAT" => "N",
                            "CORRECT_RATIO" => "Y",
                            "AUTO_CALCULATION" => "Y",
                            "ACTION_VARIABLE" => "basketAction",
                            "COMPATIBLE_MODE" => "Y",
                            "LABEL_PROP_MOBILE" => "",
                            "LABEL_PROP_POSITION" => "",
                            "ADDITIONAL_PICT_PROP_22" => "MORE_PHOTO",
                            "BASKET_IMAGES_SCALING" => "adaptive",
                            "USE_GIFTS" => "N",
                            "GIFTS_PLACE" => "BOTTOM",
                            "GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
                            "GIFTS_HIDE_BLOCK_TITLE" => "N",
                            "GIFTS_TEXT_LABEL_GIFT" => "Подарок",
                            "GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
                            "GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
                            "GIFTS_SHOW_OLD_PRICE" => "N",
                            "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
                            "GIFTS_SHOW_NAME" => "Y",
                            "GIFTS_SHOW_IMAGE" => "Y",
                            "GIFTS_MESS_BTN_BUY" => "Выбрать",
                            "GIFTS_MESS_BTN_DETAIL" => "Подробнее",
                            "GIFTS_PAGE_ELEMENT_COUNT" => "4",
                            "GIFTS_CONVERT_CURRENCY" => "N",
                            "GIFTS_HIDE_NOT_AVAILABLE" => "N",
                            "USE_ENHANCED_ECOMMERCE" => "N",
                            "ADDITIONAL_PICT_PROP_6" => "-",
                            "ADDITIONAL_PICT_PROP_8" => "-",
                            "ADDITIONAL_PICT_PROP_21" => "-"
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>