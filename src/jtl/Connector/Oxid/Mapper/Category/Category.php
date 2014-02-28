<?php
namespace jtl\Connector\Oxid\Mapper\Category;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\CategoryContainer;

/**
 * Summary of Category
 */
class Category extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Category",
            "table" => "",
            "mapPull" => array()
        );
}