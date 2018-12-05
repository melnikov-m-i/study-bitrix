<?php
/*
 * SecurityPopulationGoodsLocation => Spgl
 */

namespace Mxm\Spgl;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use \Mxm\Spgl\Traits\MethodsCreatingAndDeletingTablesInDBTrait;

Loc::loadMessages(__FILE__);

class QuantityGoodsLocationTable extends DataManager
{
    use MethodsCreatingAndDeletingTablesInDBTrait;

    public static function getTableName()
    {
        return 'spgl_quantity_goods_location';
    }

    public static function getMap()
    {
        return array(
            (new Fields\IntegerField('LOCATION_ID'))
                ->configurePrimary(true),
            (new Fields\IntegerField('GOODS_ID'))
                ->configurePrimary(true),
            new Fields\IntegerField('OLD_QUANTITY'),
            new Fields\IntegerField('NEW_QUANTITY'),
            (new Reference('LOCATION', CatalogLocationsTable::class, Join::on('this.LOCATION_ID', 'ref.ID')))
                ->configureJoinType('inner'),
            (new Reference('GOODS', CatalogGoodsTable::class, Join::on('this.GOODS_ID', 'ref.ID')))
                ->configureJoinType('inner')
        );
    }
}