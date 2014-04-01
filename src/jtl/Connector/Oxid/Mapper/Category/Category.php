<?php
namespace jtl\Connector\Oxid\Mapper\Category;


use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\CategoryContainer;

/**
 * Summary of Category
 */
class Category extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Category",
            "table" => "oxcategories",
            "pk" => "OXID",
            "mapPull" => array(
                "_id" => "OXID",
                "_parentCategoryId" => "OXPARENTID",
                "_sort" => "OXSORT"
            )
       );
}

/* non mapped properties
Category:
_level 
 */