<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CategoryCustomerGroup As CategoryCustomerGroupModel;

class CategoryCustomerGroup extends BaseMapper
{  
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];        
        
        $categoryDiscountTable = $this->getCategoryDiscount($data);
        
        foreach ($categoryDiscountTable as $discountValue)
        {
            $discountCustomerGroupTable = $this->getDiscountCustomerGroup($discountValue);
            
            if(!empty($discountCustomerGroupTable)) {
                foreach ($discountCustomerGroupTable as $customerGroupvalue)
                {
                    $categoryCustomerGroupModel = new CategoryCustomerGroupModel();  
                    
                    $identityModel = new IdentityModel();
                    $identityModel->setEndpoint($discountValue['OXID']);
                    $categoryCustomerGroupModel->setCategoryId($identityModel);
                    
                    $identityModel = new IdentityModel();
                    $identityModel->setEndpoint($customerGroupvalue['OXOBJECTID']);
                    $categoryCustomerGroupModel->setCustomerGroupId($identityModel);
                    
                    $categoryCustomerGroupModel->setDiscount(round($discountValue['OXADDSUM'], 4));
                    
                    $return[] = $categoryCustomerGroupModel; 
                }
            } else {
                $allCustomerGroupTable = $this->getAllCustomerGroup();
                foreach ($allCustomerGroupTable as $customerGroupValue)
                {
                    $categoryCustomerGroupModel = new CategoryCustomerGroupModel();  
                    
                    $identityModel = new IdentityModel();
                    $identityModel->setEndpoint($discountValue['OXID']);
                    $categoryCustomerGroupModel->setCategoryId($identityModel);
                    
                    $identityModel = new IdentityModel();
                    $identityModel->setEndpoint($customerGroupValue['OXID']);
                    $categoryCustomerGroupModel->setCustomerGroupId($identityModel);
                    
                    $categoryCustomerGroupModel->setDiscount(round($discountValue['OXADDSUM'], 4));
                    
                    $return[] = $categoryCustomerGroupModel;
                }
            }
        }
        return $return;
    }
    
    public function getCategoryDiscount($params)
    {   
        $sqlResult = $this->db->query(" SELECT * FROM oxobject2discount, oxdiscount " .
                                      " WHERE oxobject2discount.OXDISCOUNTID = oxdiscount.OXID " .
                                      " AND   oxobject2discount.OXTYPE = 'oxcategories' " .
                                      " AND   oxobject2discount.OXOBJECTID = '{$params['OXID']}' " .
                                      " AND   oxdiscount.OXADDSUMTYPE = 'abs'");
        return $sqlResult;
    }
        
    public function getDiscountCustomerGroup($params)
    {   
        $sqlResult = $this->db->query(" SELECT * FROM oxobject2discount" .
                                        " WHERE oxobject2discount.OXTYPE = 'oxgroups' " .
                                        " AND   oxobject2discount.OXDISCOUNTID = '{$params['OXDISCOUNTID']}'");      
        return $sqlResult;
    }    
    
    public function getAllCustomerGroup() {
        $sqlResult = $this->db->query(" SELECT * FROM oxgroups ");       
        
        return $sqlResult;   
    }
}