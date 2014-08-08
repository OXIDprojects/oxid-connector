<?php
namespace jtl\Connector\Oxid\Mapper;

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
                "sort" => "OXSORT",
                "isActive" => null,
                "i18ns" => "CategoryI18n|addI18n",
    	        "invisibilities" => "CategoryInvisibility|addInvisibility"
            ),
            "mapPush" => array(
                "OXID" => "_id",
                "OXPARENTID" => "_parentCategoryId",
                "OXSORT" => "_sort",
                "OXACTIVE" => "_isActive"
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
    
    protected function isActive($data)
    {
        if($data["OXACTIVE"] == 1)
        {
            $isActive = true;
        }else{
            $isActive = false;
        }
        return $isActive;
    }
    
}