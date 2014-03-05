<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\GlobalDataContainer;

/**
 * Summary of Currency
 */
class Currency extends BaseMapper
{
    protected $_config = array
     (
         "model" => "\\jtl\\Connector\\Model\\Currency",
         "table" => "",
         "mapPull" => array()
     );
}