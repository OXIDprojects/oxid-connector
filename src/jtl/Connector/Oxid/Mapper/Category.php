<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class Category extends BaseMapper
{
    protected $mapperConfig = array
    (
        "query" => "SELECT * FROM oxcategories ORDER BY OXID = OXROOTID DESC",
        "table" => "oxcategories",
        "mapPull" => array(
            "id" => "OXID",
            "parentCategoryId" => null,
            "sort" => "OXSORT",
            "isActive" => null,
            "i18ns" => "CategoryI18n|addI18n",
            "attributes" => "CategoryAttr|addAttribute",
    	    "invisibilities" => "CategoryInvisibility|addInvisibility"
        ),
        "mapPush" => array(
            "OXID" => "id",
            "OXPARENTID" => "parentCategoryId",
            "OXSORT" => "sort",
            "OXACTIVE" => "isActive",
            //"CategoryI18n|addI18n" => "i18ns",
            //"CategoryInvisibility|addInvisibility" => "invisibilities"
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
    
    //protected function OXPARENTID($data)
    //{
    //    if(is_null($data["parentCategoryId"]))
    //    {
    //        $oxParentId = "oxrootid";
    //    }else{
    //        $oxParentId = $data["parentCategoryId"];
    //    }
    //    return $oxParentId;
    //}
    
    //protected function OXACTIVE($data)
    //{
    //    if($data["isActive"] == true)
    //    {
    //        $oxActive = 1;
    //    }else{
    //        $oxActive = 0;
    //    }
    //    return $oxActive;
    //}
}