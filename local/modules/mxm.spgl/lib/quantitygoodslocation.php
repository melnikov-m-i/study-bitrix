<?php
/*
 * SecurityPopulationGoodsLocation => Spgl
 */

namespace Mxm\Spgl;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;

Loc::loadMessages(__FILE__);

class QuantityGoodsLocationTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'spgl_quantity_goods_location';
    }

    public static function getMap()
    {
        return array(
            new Entity\StringField('EXTERNAL_ID_LOCATION', array(
                'primary' => true
            )),
            new Entity\StringField('EXTERNAL_ID_GOODS', array(
                'required' => true
            )),
            new Entity\IntegerField('OLD_QUANTITY'),
            new Entity\IntegerField('NEW_QUANTITY'),
            new Entity\ReferenceField(
                'LOCATION',
                CatalogLocationTable::class,
                array('=this.EXTERNAL_ID_LOCATION' => 'ref.EXTERNAL_ID')
            ),
            new Entity\ReferenceField(
                'GOODS',
                CatalogGoodsTable::class,
                array('=this.EXTERNAL_ID_GOODS' => 'ref.EXTERNAL_ID')
            )
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

    public static function dropTable()
    {
        $connection = Application::getInstance()->getConnection();
        $connection->dropTable(static::getTableName());
        return true;
    }
}