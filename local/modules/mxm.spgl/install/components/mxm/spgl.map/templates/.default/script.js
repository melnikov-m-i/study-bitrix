(function() {
    document.addEventListener("DOMContentLoaded", ready);

    function ready() {
        ymaps.ready(init);
    };

    function init(){
        let tulaCoords = [54.1941, 37.6139];
        let myMap = new ymaps.Map("map", {
            center: tulaCoords,
            zoom: 4
        }, {
            balloonMaxWidth: 200,
            searchControlProvider: 'yandex#search'
        });

        let data = window.spglData;

        for (nameLoc in data) {
            let coords = [
                data[nameLoc]["LOC_LATITUDE"],
                data[nameLoc]["LOC_LONGITUDE"]
            ];

            var infoGoods = data[nameLoc]["GOODS"].reduce(function(strListGoods, goods) {
                let styleGoods = goods["DIFF_QUANTITY"] > 0 ? "goods-increased" :
                    goods["DIFF_QUANTITY"] < 0 ? "goods-decreased" : "goods-unchanged";
                return strListGoods + '<p>' + goods["NAME"] + ':&nbsp;<span class="' + styleGoods + '">' + goods["NEW_QUANTITY"] + '</span></p>';
            }, '');

            var propertiesPlacemark = {
                hintContent: nameLoc,
                balloonContentHeader: nameLoc,
                balloonContentBody: infoGoods,
                balloonContentFooter: coords.join(", ")
            };
            myMap.geoObjects.add(new ymaps.Placemark(coords, propertiesPlacemark));
            myMap.setBounds(myMap.geoObjects.getBounds());
        }
    }
})();
