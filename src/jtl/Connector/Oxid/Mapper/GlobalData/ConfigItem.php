<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\GlobalDataContainer;

/**
 * Summary of ConfigItem
 */
class ConfigItem extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\ConfigGroup",
            "table" => "",
            "mapPull" => array()
        );
}
