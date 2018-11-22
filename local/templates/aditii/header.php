<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?=SITE_CHARSET; ?>">
        <!--[if lt IE 9]>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?
            $assets = \Bitrix\Main\Page\Asset::getInstance();
            /*
             * CSS
             */
            $assets->addString('<link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic" rel="stylesheet">');
            $assets->addString('<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&amp;subset=cyrillic" rel="stylesheet">');
            $assets->addString('<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">');
            /*
             * JS
            */
            \CJSCore::Init();
            $assets->addJs(SITE_TEMPLATE_PATH . '/js/jquery-3.3.1.min.js');
            $assets->addJS(SITE_TEMPLATE_PATH . '/js/prefixfree.min.js');

            /*
            $APPLICATION->ShowMeta("keywords", false);
            $APPLICATION->ShowMeta("description", false);
            $APPLICATION->ShowCSS(true, false);
            */
            $APPLICATION->ShowHead(false);
        ?>
        <title><? $APPLICATION->ShowTitle(); ?></title>
    </head>
    <body>
        <? $APPLICATION->ShowPAnel(); ?>
        <header>
            <div class="bg-header clearfix">
                <div class="wrap">
                    <div class="header clearfix">
                        <div class="logo">
                            <a href="<?=SITE_DIR; ?>/index.html">Aditii</a>
                        </div>
                        
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:sale.basket.basket.line",
                            "aditii",
                            array(
                                "HIDE_ON_BASKET_PAGES" => "Y",
                                "PATH_TO_AUTHORIZE" => "",
                                "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
                                "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                                "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                                "PATH_TO_PROFILE" => SITE_DIR."personal/",
                                "PATH_TO_REGISTER" => SITE_DIR."login/",
                                "POSITION_FIXED" => "N",
                                "SHOW_AUTHOR" => "N",
                                "SHOW_EMPTY_VALUES" => "Y",
                                "SHOW_NUM_PRODUCTS" => "N",
                                "SHOW_PERSONAL_LINK" => "N",
                                "SHOW_PRODUCTS" => "N",
                                "SHOW_REGISTRATION" => "N",
                                "SHOW_TOTAL_PRICE" => "Y",
                                "COMPONENT_TEMPLATE" => "aditii",
                                "SHOW_DELAY" => "Y",
                                "SHOW_NOTAVAIL" => "N",
                                "SHOW_IMAGE" => "Y",
                                "SHOW_PRICE" => "Y",
                                "SHOW_SUMMARY" => "Y",
                                "POSITION_HORIZONTAL" => "hcenter",
                                "POSITION_VERTICAL" => "vcenter"
                            ),
                            false
                        );?>

                        <!--
                        <div class="header-cart">
                            <img src="<?=SITE_TEMPLATE_PATH; ?>/images/shopping_basket.png" alt="pic_shopping_basket">
                                    <span>
                                        <a href="#">$300</a>
                                    </span>
                        </div>
                        -->

                        <?$APPLICATION->IncludeComponent(
                            "bitrix:search.form",
                            "search_head",
                            array(
                                "PAGE" => "#SITE_DIR#search/index.php",
                                "COMPONENT_TEMPLATE" => "search_head"
                            ),
                            false
                        );?>

                    </div>
                </div>
            </div>
            <div class="bg-bottom-line-header">
                <div class="wrap">
                    <div class="header-sub">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "main_menu",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "1",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "top",
                                "USE_EXT" => "N",
                                "COMPONENT_TEMPLATE" => "main_menu",
                                "MENU_THEME" => "site"
                            ),
                            false
                        );?>
                    </div>
                </div>
            </div>
        </header>