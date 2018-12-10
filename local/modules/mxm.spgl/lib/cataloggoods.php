<?php
/*
 * SecurityPopulationGoodsLocation => Spgl
 */

namespace Mxm\Spgl;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Fields\Relations\OneToMany;

Loc::loadMessages(__FILE__);

class CatalogGoodsTable extends DataManager
{
    public static function getTableName()
    {
        return 'spgl_catalog_goods';
    }

    public static function getMap()
    {
        return array(
            (new Fields\IntegerField('ID'))
                ->configurePrimary(true)
                ->configureAutocomplete(true),
            (new Fields\StringField('EXTERNAL_ID'))
                ->configureRequired(true),
            new Fields\StringField('NAME'),
            (new OneToMany('QUANTITY_GOODS_LOCATION', QuantityGoodsLocationTable::class, 'GOODS'))
        );
    }
    public static function createTable()
    {
        $connection = Application::getInstance()->getConnection();
        if (!$connection->isTableExists(static::getTableName())) {
            static::getEntity()->createDbTable();
            return true;
        } else {
            return false;
        }
    }
}
