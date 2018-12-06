<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<script src="https://api-maps.yandex.ru/2.1/?apikey=20ac599d-ffe0-475a-842d-88c0e7867c0f&lang=ru_RU" type="text/javascript"></script>

<div id="map" style="width: <?= $this->arParams["WIDTH_MAP"]; ?>px; height: <?= $this->arParams["HEIGHT_MAP"]; ?>px"></div>

<script>
    (function() {
        document.addEventListener("DOMContentLoaded", ready);

        function ready() {
            ymaps.ready(init);
        };

        function init(){
            var myPlacemark;
            var tulaCoords = [54.1941, 37.6139];
            var myMap = new ymaps.Map("map", {
                center: tulaCoords,
                zoom: 7
            }, {
                balloonMaxWidth: 200,
                searchControlProvider: 'yandex#search'
            });

            data = JSON.parse(<?= json_encode($this->arResult["DATA"]); ?>);
            data.forEach(function(item, nameLoc) {
                var coords = [
                    item["LOC_LATITUDE"],
                    item["LOC_LONGITUDE"]
                ];

                var infoGoods = item["GOODS"].reduce(function(goods){
                    return '<p>' + goods["NAME"] + '<span class="' +
                    goods["DIFF_QUANTITY"] > 0 ? "goods-increased" :
                        goods["DIFF_QUANTITY"] < 0 ? "goods-decreased" : "goods-unchanged"
                        + '">' + goods["NEW_QUANTITY"] + '</span></p>';
                }, '');

                var propertiesPlacemark = {
                    hintContent: nameLoc,
                    balloonContentHeader: nameLoc,
                    balloonContentBody: infoGoods,
                    balloonContentFooter: coords.join(", ")
                };
                myMap.geoObjects.add(new ymaps.Placemark(coords, propertiesPlacemark));
            });
        }
    })();
</script>