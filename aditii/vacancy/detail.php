<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Вакансия");
$APPLICATION->SetPageProperty("description", "Описание вакансии");
$APPLICATION->SetTitle("Описание вакансии");
?>
    <section>
        <div class="bg-main">
            <div class="wrap">
                <div class="main">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.detail",
                        "vacancy_detail",
                        array(
                            "COMPONENT_TEMPLATE" => "vacancy_detail",
                            "IBLOCK_TYPE" => "vacancy",
                            "IBLOCK_ID" => "23",
                            "ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
                            "ELEMENT_CODE" => "",
                            "CHECK_DATES" => "Y",
                            "FIELD_CODE" => array(
                                0 => "DATE_ACTIVE_FROM",
                                1 => "DATE_ACTIVE_TO",
                                2 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "POST",
                                1 => "",
                            ),
                            "IBLOCK_URL" => "index.php?ID=#IBLOCK_ID#",
                            "DETAIL_URL" => "",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "CACHE_GROUPS" => "Y",
                            "SET_TITLE" => "Y",
                            "SET_CANONICAL_URL" => "N",
                            "SET_BROWSER_TITLE" => "Y",
                            "BROWSER_TITLE" => "NAME",
                            "SET_META_KEYWORDS" => "Y",
                            "META_KEYWORDS" => "-",
                            "SET_META_DESCRIPTION" => "Y",
                            "META_DESCRIPTION" => "-",
                            "SET_LAST_MODIFIED" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "ADD_ELEMENT_CHAIN" => "N",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "USE_PERMISSIONS" => "N",
                            "STRICT_SECTION_CHECK" => "N",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "USE_SHARE" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "PAGER_TITLE" => "Страница",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SET_STATUS_404" => "Y",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => "",
                            "TEMPLATE_THEME" => "blue",
                            "MEDIA_PROPERTY" => "",
                            "SLIDER_PROPERTY" => "",
                            "SHARE_HIDE" => "N",
                            "SHARE_TEMPLATE" => "",
                            "SHARE_HANDLERS" => array(
                                0 => "delicious",
                                1 => "facebook",
                                2 => "lj",
                                3 => "mailru",
                                4 => "twitter",
                                5 => "vk",
                            ),
                            "SHARE_SHORTEN_URL_LOGIN" => "",
                            "SHARE_SHORTEN_URL_KEY" => ""
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>