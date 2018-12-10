<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Карта ОТНМ");
$APPLICATION->SetPageProperty("keywords", "карта, товары, население, местоположение");
$APPLICATION->SetPageProperty("description", "Карта обеспеченности товарами населения в определенном местоположении");
$APPLICATION->SetTitle("Карта ОТНМ");
?>
    <section>
        <div class="bg-main">
            <div class="wrap">
                <div class="main">
                    <? $APPLICATION->IncludeComponent(
                        "mxm:spgl.map",
                        "",
                        Array(
                            "HEIGHT_MAP" => "400",
                            "WIDTH_MAP" => "900"
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>