<?php
namespace jtl\Connector\Oxid\Mapper\Category;


use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\Oxid\Mapper\Category\CategoryI18n as CategoryI18nMapper;

use jtl\Connector\ModelContainer\CategoryContainer;


/**
 * Summary of Category
 */
class Category extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Category",
            "query" => "SELECT * FROM oxcategories ORDER BY OXID = OXROOTID DESC;",
            "table" => "oxcategories",
            "pk" => "OXID",
            "mapPull" => array(
                "_id" => "OXID",
                "_parentCategoryId" => null,
                "_sort" => "OXSORT"
            ),
            "mapPush" => array(
                "OXID" => "_id",
                "OXPARENTID" => "_parentCategoryId",
                "OXSORT" => "_sort"
            )
       );
    
    
    public function fetchAll($container=null,$type=null,$params=array()) {
        $result = [];
        
        $dbResult = $this->_db->query('SELECT * FROM oxcategories ORDER BY oxleft ASC LIMIT '.$params['offset'].','.$params['limit']);
        
        foreach($dbResult as $data) {
    	    $container = new CategoryContainer();
    		
    		$model = $this->generate($data);
    		
    		$container->add('category', $model->getPublic(),false);
    		
    		// add i18n
    		$categoryI18nMapper = new CategoryI18nMapper();
    		$categoryI18nMapper->fetchAll($container,'category_i18n', $categoryI18nMapper->getCategoryI18n(array('OXID' => $model->_id)));
            
            $result[] = $container->getPublic(array('items'));
    	} 
        return $result;
    }
        
    
    public function _parentCategoryId($data)
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