<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>
    <section>
        <div class="bg-main">
            <div class="wrap">
                <div class="main">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:sale.order.payment",
                        "",
                        Array()
                    ); ?>
                </div>
            </div>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>