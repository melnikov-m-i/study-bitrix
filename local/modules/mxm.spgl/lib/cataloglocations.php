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
use \Mxm\Spgl\Traits\MethodsCreatingAndDeletingTablesInDBTrait;

Loc::loadMessages(__FILE__);

class CatalogLocationsTable extends DataManager
{
    use MethodsCreatingAndDeletingTablesInDBTrait;

    public static function getTableName()
    {
        return 'spgl_catalog_locations';
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
            new Fields\StringField('LATITUDE'),
            new Fields\StringField('LONGITUDE'),
            (new OneToMany('LOCATION_QUANTITY_GOODS', QuantityGoodsLocationTable::class, 'LOCATION'))
        );
    }
}