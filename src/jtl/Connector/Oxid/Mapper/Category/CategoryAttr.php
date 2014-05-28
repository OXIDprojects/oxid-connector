<?php
namespace jtl\Connector\Oxid\Mapper\Category;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\CategoryContainer;
use jtl\Connector\Model\CategoryAttr as CategoryAttrModel;

/**
 * Summary of CategoryAttr
 */
class CategoryAttr extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $categoryAttrModel = new CategoryAttrModel();  
        
        foreach ($params as $value)
        {
            $categoryAttrModel->_id = $value['OXID'];
            $categoryAttrModel->_categoryId = $value['OXOBJECTID'];
            $categoryAttrModel->_sort = $value['OXSORT'];
        }
        
        $container->add('category_attr', $categoryAttrModel->getPublic(), false);
    }
    
    public function getCategoryAttr($params)
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query(" SELECT * FROM oxcategory2attribute " .
                                       " INNER JOIN oxattribute " .
                                       " ON oxcategory2attribute.OXATTRID = oxattribute.OXID " .
                                       " WHERE oxcategory2attribute.OXOBJECTID = '{$params['OXID']}';");
        return $sqlResult;
    }    
}