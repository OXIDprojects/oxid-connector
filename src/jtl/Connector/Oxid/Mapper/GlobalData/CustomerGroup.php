<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\GlobalDataContainer;

/**
 * Summary of CustomerGroup
 */
class CustomerGroup extends BaseMapper
{
    protected $_config = array
            (
                "model" => "\\jtl\\Connector\\Model\\CustomerGroup",
                "table" => "oxgroups",
                "pk" => "OXID",
                "mapPull" => array(
                    "_id" => "OXID"
                )
            );
}

/* non mapped properties
 * CustomerGroup:
 * _discount
 * _isDefault
 * _applyNetPrice
 */