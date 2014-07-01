<?php
namespace jtl\Connector\Oxid\Mapper\Category;


use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\Oxid\Mapper\Category\CategoryI18n as CategoryI18nMapper;
use jtl\Connector\Oxid\Mapper\Category\CategoryAttr as CategoryAttrMapper;
use jtl\Connector\Oxid\Mapper\Category\CategoryAttrI18n as CategoryAttrI18nMapper;
use jtl\Connector\Oxid\Mapper\Category\CategoryInvisibility as CategoryInvisibilityMapper;

use jtl\Core\Logger\Logger;
use jtl\Connector\ModelContainer\CategoryContainer;
use jtl\Connector\Result\Transaction as TransactionResult;


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
        
        try {
        
            $dbResult = $this->_db->query('SELECT * FROM oxcategories ORDER BY oxleft ASC LIMIT '.$params['offset'].','.$params['limit']);
        
            foreach($dbResult as $data) {
    	        $container = new CategoryContainer();
            
            
                    $model = $this->generate($data);
                
                    $container->add('category', $model->getPublic(),false);
                
                    // add i18n
                    $categoryI18nMapper = new CategoryI18nMapper();
                    $categoryI18nMapper->fetchAll($container,'category_i18n', $categoryI18nMapper->getCategoryI18n(array('OXID' => $model->_id)));
                
                    //add Attr
                    $categoryAttrMapper = new CategoryAttrMapper();
                    $categoryAttrMapper->fetchAll($container,'category_attr', $categoryAttrMapper->getCategoryAttr(array('OXID' => $model->_id)));
                
                    //add AttrI18n
                    $categoryAttrI18nMapper = new CategoryAttrI18nMapper();
                    $categoryAttrI18nMapper->fetchAll($container,'category_attr_i18n', $categoryAttrI18nMapper->getCategoryAttrI18n(array('OXID' => $model->_id)));
                
                    //add Invisibility
                    $categoryInvisibilityMapper = new CategoryInvisibilityMapper();
                    $categoryInvisibilityMapper->fetchAll($container,'category_invisibility', $categoryInvisibilityMapper->getCategoryInvisibility(array('OXID' => $model->_id)));
                
                    $result[] = $container->getPublic(array('items'));
                }
            
            } catch (\Exception $exc) { 
                Logger::write(ExceptionFormatter::format($exc), Logger::WARNING, 'mapper');
                
                $err = new Error();
                $err->setCode($exc->getCode());
                $err->setMessage($exc->getMessage());
                $action->setError($err);
            }
        
        return $result;
    }
    
    public function updateAll($container, $trid=null) {
        $result = new CategoryContainer;
        
        try {
            
            $category = $container->getMainModel();
            $identity = $category->getId();
        
            $obj = $this->mapDB($category);
              
            //add Invisibility
            $categoryI18nMapper = new CategoryI18nMapper();
            $categoryI18nMapper->updateAll($container,'category_i18n', $categoryInvisibilityMapper->getCategoryInvisibility(array('OXID' => $model->_id)));
        
            $result[] = $container->getPublic(array('items'));
        
            // loop every i18n category description
    	    if(!empty($obj->categories_id)) $this->_db->deleteRow($obj,'categories','categories_id',$obj->categories_id);
        
    	    foreach($container->get('category_i18n') as $categoryI18n) {
    		    $dObj = $categoryI18nMapper->mapDB($categoryI18n);
    		    if(empty($obj->categories_id) || empty($dObj->categories_id)) $dObj->categories_id = $insertResult->getKey();
    		
    		    $this->_db->insertRow($dObj,'categories');
    	    }
        
            $result->addIdentity('category',$identity);
        
        } catch (\Exception $exc) { 
            Logger::write(ExceptionFormatter::format($exc), Logger::WARNING, 'mapper');
                
            $err = new Error();
            $err->setCode($exc->getCode());
            $err->setMessage($exc->getMessage());
            $action->setError($err);
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