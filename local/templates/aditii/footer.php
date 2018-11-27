<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
        <footer>
            <div class="bg-body-footer">
                <div class="wrap">
                    <div class="footer">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "bottom",
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
                                "ROOT_MENU_TYPE" => "bottom",
                                "USE_EXT" => "Y",
                                "COMPONENT_TEMPLATE" => "bottom"
                            ),
                            false
                        );?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-bottom-line-footer">
                <div class="wrap">
                    <div class="footer">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "copyright",
                                "EDIT_TEMPLATE" => "",
                                "AREA_FILE_RECURSIVE" => "Y",
                                "PATH" => "index_copyright.php"
                            ),
                            false
                        );?>
                    </div>
                </div>
            </div>
        </footer>

        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH; ?>/js/html5shiv.min.js"></script>
        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH; ?>/js/html5shiv-printshiv.min.js"></script>
        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH; ?>/js/respond.min.js"></script>
        <![endif]-->

    </body>
</html>