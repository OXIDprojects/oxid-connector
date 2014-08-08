<?php
namespace jtl\Connector\Oxid\Mapper\Category;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class Category extends BaseMapper
{
    protected $mapperConfig = array
        (
            "query" => "SELECT * FROM oxcategories ORDER BY OXID = OXROOTID DESC;",
            "table" => "oxcategories",
            "mapPull" => array(
                "id" => "OXID",
                "parentCategoryId" => null,
                "sort" => "OXSORT"
            ),
            "mapPush" => array(
                "OXID" => "_id",
                "OXPARENTID" => "_parentCategoryId",
                "OXSORT" => "_sort"
            )
       );
  
    protected function parentCategoryId($data)
    {
        if($data["OXPARENTID"] == "oxrootid")
        {
            $oxParentId = null;
        }else{
            $oxParentId = $data["OXPARENTID"];
        }
        return $oxParentId;
    }
    
}

/* non mapped properties
Category:
_level 
 */