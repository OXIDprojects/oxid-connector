<?php
namespace jtl\Connector\Oxid\Mapper\Category;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\CategoryContainer;
use jtl\Connector\Model\CategoryInvisibility as CategoryInvisibilityModel;
use jtl\Connector\Model\Identity as IdentityModel;

/**
 * Summary of CategoryInvisibility
 */
class CategoryInvisibility extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $categoryInvisibilityModel = new CategoryInvisibilityModel();
                
        foreach ($params as $value)
        {
            if ($value['OXACTIVE'] == 0 or $value['OXHIDDEN'] == 1) {
            
                $identityModel = new IdentityModel();
                $identityModel->setEndpoint($value['CategoryID']);
                $categoryInvisibilityModel->setCategoryId($identityModel);                            
                
                $identityModel = new IdentityModel();
                $identityModel->setEndpoint($value['CustomerGroupID']);
                $categoryInvisibilityModel->setCustomerGroupId($identityModel);                            
                
                $container->add('category_invisibility', $categoryInvisibilityModel->getPublic(), false);   
            }
        }    
    }
    
    public function getCategoryInvisibility($params)
    {   
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT oxcategories.OXID AS CategoryID,
                                               oxgroups.OXID AS CustomerGroupID,  
		                                       oxcategories.OXACTIVE AS OXACTIVE,
		                                       oxcategories.OXHIDDEN AS OXHIDDEN
                                        FROM oxcategories, oxgroups 
                                        WHERE oxcategories.OXID = '{$params['OXID']}';");        
        return $sqlResult;
    }
}