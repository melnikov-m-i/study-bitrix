<?php
/*
 * SecurityPopulationGoodsLocation => Spgl
 */

namespace Mxm\Spgl\Traits;

//use Bitrix\Main\Application;

trait MethodsCreatingAndDeletingTablesInDBTrait
{
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