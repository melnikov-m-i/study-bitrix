<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<script src="https://api-maps.yandex.ru/2.1/?apikey=20ac599d-ffe0-475a-842d-88c0e7867c0f&lang=ru_RU" type="text/javascript"></script>

<div id="map" style="width: <?= $arParams["WIDTH_MAP"]; ?>px; height: <?= $arParams["HEIGHT_MAP"]; ?>px"></div>

<script>
    window.spglData = <?= json_encode($arResult["DATA"]); ?>;
</script>