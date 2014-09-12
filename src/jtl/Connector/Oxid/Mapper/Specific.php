<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class Specific extends BaseMapper
{
    protected $mapperConfig = array
    (
        "table" => "oxattribute",
        "mapPull" => array(
            "id" => "OXID",
            "sort" => "OXSORT",
            "i18ns" => "SpecificI18n|addI18n",
            "values" => "SpecificValue|addValue",
        ),
        "mapPush" => array(
            "OXID" => "id",
            "OXSORT" => "sort",
            "SpecificI18n|addI18n" => "i18ns",
            "SpecificValue|addValues" => "values",
        )
       );
}