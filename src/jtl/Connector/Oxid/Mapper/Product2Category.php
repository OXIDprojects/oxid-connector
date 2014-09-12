<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\Product2Category as Product2CategoryModel;

class Product2Category extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {    
        $return = [];
        $product2CategoryTable = $this->getProduct2Category($data);
        
        foreach ($product2CategoryTable as $value)
        {
            $product2CategoryModel = new Product2CategoryModel();
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXCATNID']);
            $product2CategoryModel->setCategoryId($identityModel);
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXID']);
            $product2CategoryModel->setId($identityModel);
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXOBJECTID']);
            $product2CategoryModel->setProductId($identityModel);
            
            $return[] = $product2CategoryModel;
        }
        return $return;
    }
    
    public function getProduct2Category($param)
    {
        $sqlResult = $this->db->query(" SELECT * FROM oxobject2category " .
                                      " WHERE OXOBJECTID = '{$param['OXID']}' " .
                                      " ORDER BY OXCATNID ASC ");
        return $sqlResult;
    }  
}