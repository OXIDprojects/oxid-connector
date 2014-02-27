<?php
namespace jtl\Connector\Oxid\Mapper\GlobalDatas;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\GlobalDataContainer;

/**
 * Summary of Tax
 */
class Tax extends BaseMapper
{
    public $TaxClass = array();
    public $TaxRate = array();
    public $TaxZone = array();
    public $TaxZoneCountry = array();

    protected $_config = array
     (
         "model" => "\\jtl\\Connector\\Model\\Taxclass",
         "table" => "",
         "mapPull" => array()
     );
}
