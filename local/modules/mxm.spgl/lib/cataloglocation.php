<?php
/*
 * SecurityPopulationGoodsLocation => Spgl
 */

namespace Mxm\Spgl;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;

Loc::loadMessages(__FILE__);

class CatalogLocationTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'spgl_catalog_location';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('EXTERNAL_ID', array(
                'required' => true
            )),
            new Entity\StringField('NAME'),
            new Entity\StringField('COORDINATES')
        );
    }

    public static function createTable()
    {
        $connection = Application::getInstance()->getConnection();
        if (!$connection->isTableExists(static::getTableName()))
        {
            static::getEntity()->createDbTable();
            return true;
        }
        else {
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