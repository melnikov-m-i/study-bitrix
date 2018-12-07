DROP TABLE IF EXISTS `spgl_catalog_locations`;
CREATE TABLE IF NOT EXISTS `spgl_catalog_locations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EXTERNAL_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LATITUDE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LONGITUDE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `spgl_catalog_goods`;
CREATE TABLE IF NOT EXISTS `spgl_catalog_goods` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EXTERNAL_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `spgl_quantity_goods_location`;
CREATE TABLE IF NOT EXISTS `spgl_quantity_goods_location` (
  `LOCATION_ID` int(11) NOT NULL,
  `GOODS_ID` int(11) NOT NULL,
  `OLD_QUANTITY` int(11) NOT NULL,
  `NEW_QUANTITY` int(11) NOT NULL,
  PRIMARY KEY (`LOCATION_ID`,`GOODS_ID`),
  KEY `GOODS_ID` (`GOODS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE `spgl_quantity_goods_location`
  ADD CONSTRAINT `spgl_quantity_goods_location_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `spgl_catalog_locations` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spgl_quantity_goods_location_ibfk_2` FOREIGN KEY (`GOODS_ID`) REFERENCES `spgl_catalog_goods` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
