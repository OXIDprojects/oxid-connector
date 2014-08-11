<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CategoryInvisibility as CategoryInvisibilityModel;

class CategoryInvisibility extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
             
        $categoryInvisibilityTable = $this->getCategoryInvisibility($data);
        
        foreach ($categoryInvisibilityTable as $value)
        {
            if ($value['OXHIDDEN'] == 1) {
            
                $categoryInvisibilityModel = new CategoryInvisibilityModel();
                
                $identityModel = new IdentityModel();
                $identityModel->setEndpoint($value['CategoryID']);
                $categoryInvisibilityModel->setCategoryId($identityModel);
                
                $identityModel = new IdentityModel();
                $identityModel->setEndpoint($value['CustomerGroupID']);
                $categoryInvisibilityModel->setCustomerGroupId($identityModel);
                
                $return[] = $categoryInvisibilityModel;
            } 
        }
        return $return;
    }
    
    protected function getCategoryInvisibility($params)
    {   
        $sqlResult = $this->db->query("SELECT oxcategories.OXID AS CategoryID,
                                               oxgroups.OXID AS CustomerGroupID,
		                                       oxcategories.OXACTIVE AS OXACTIVE,
		                                       oxcategories.OXHIDDEN AS OXHIDDEN
                                        FROM oxcategories, oxgroups
                                        WHERE oxcategories.OXID = '{$params['OXID']}';");
        return $sqlResult;
    }
}