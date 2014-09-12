<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductAttr as ProductAttrModel;

class ProductAttr extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {    
        $return = [];
        $productAttrTable = $this->getProductAttr($data);
        
        foreach ($productAttrTable as $value)
        {
            $productAttrModel = new ProductAttrModel();
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXOBJECTID']);
            $productAttrModel->setProductId($identityModel);
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXID']);
            $productAttrModel->setId($identityModel);
            
            $productAttrModel->setSort($value['OXPOS']);
            
            $return[] = $productAttrModel;
        }
        return $return;
    }
    
    public function getProductAttr($param)
    {
        $sqlResult = $this->db->query(" SELECT * FROM oxobject2attribute " .
                                       " INNER JOIN oxattribute " .
                                       " ON oxobject2attribute.OXATTRID = oxattribute.OXID " .
                                       " WHERE oxobject2attribute.OXOBJECTID = '{$params['OXID']}'");
        return $sqlResult;
    }  
}