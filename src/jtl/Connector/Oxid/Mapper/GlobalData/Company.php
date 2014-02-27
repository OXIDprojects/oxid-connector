<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\GlobalDataContainer;

/**
 * Summary of Company
 */
class Company extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Company",
            "table" => "",
            "mapPull" => array()
        );
}
