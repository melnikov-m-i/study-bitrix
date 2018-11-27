<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Контакты");
$APPLICATION->SetPageProperty("keywords", "контакт, информация");
$APPLICATION->SetPageProperty("description", "Контактная информация для связи с нами");
$APPLICATION->SetTitle("Контакты");
?>

    <section class="wrap">
        <div class="contact clearfix">
            <div class="contact_info">
                <h2>Адрес</h2>
                <div class="map">

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:map.yandex.view",
                        ".default",
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "CONTROLS" => array(
                                0 => "SMALLZOOM",
                                1 => "SCALELINE",
                            ),
                            "INIT_MAP_TYPE" => "MAP",
                            "MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:54.19293401732118;s:10:\"yandex_lon\";d:37.61546796273018;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.613989149771;s:3:\"LAT\";d:54.193956207124;s:4:\"TEXT\";s:0:\"\";}}}",
                            "MAP_HEIGHT" => "250",
                            "MAP_ID" => "",
                            "MAP_WIDTH" => "100%",
                            "OPTIONS" => array(
                                0 => "ENABLE_SCROLL_ZOOM",
                                1 => "ENABLE_DBLCLICK_ZOOM",
                                2 => "ENABLE_DRAGGING",
                            )
                        ),
                        false
                    );?>

                </div>
            </div>
            <div class="contact-form">
                <h2>Связаться с нами</h2>
                <form method="post" action="">
                    <div>
                            <span>
                                <label>Имя</label>
                            </span>
                            <span>
                                <input name="userName" type="text">
                            </span>
                    </div>
                    <div>
                            <span>
                                <label>E-mail</label>
                            </span>
                            <span>
                                <input name="userEmail" type="text">
                            </span>
                    </div>
                    <div>
                            <span>
                                <label>Телефон</label>
                            </span>
                            <span>
                                <input name="userPhone" type="text">
                            </span>
                    </div>
                    <div>
                            <span>
                                <label>Сообщение</label>
                            </span>
                            <span>
                                <textarea name="userMsg"></textarea>
                            </span>
                    </div>
                    <div>
                            <span>
                                <input type="submit" class="" value="Отправить">
                            </span>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>