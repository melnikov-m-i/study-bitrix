<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Импорт данных");
$APPLICATION->SetPageProperty("keywords", "импорт, инфоблок, XML");
$APPLICATION->SetPageProperty("description", "Импорт данных в инфоблок из файла формата XML");
$APPLICATION->SetTitle("Импорт данных");
?>
    <section>
        <div class="bg-main">
            <div class="wrap">
                <div class="main">
                    <? $APPLICATION->IncludeComponent(
                        "demo:import.data.xml",
                        ".default",
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "IBLOCK_TYPE_ID" => "allTypes"
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>