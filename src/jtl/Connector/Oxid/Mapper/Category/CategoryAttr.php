<?php
namespace jtl\Connector\Oxid\Mapper\Category;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\CategoryContainer;

/**
 * Summary of CategoryAttr
 */
class CategoryAttr extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\CategoryAttr",
            "table" => "oxobject2attribute",
            "pk" => "OXID",
            "mapPull" => array(
                "_id" => "OXID",
                "_categoryId" => "OXATTRID",
                "_sort" => "OXSORT"
            )
       );
}