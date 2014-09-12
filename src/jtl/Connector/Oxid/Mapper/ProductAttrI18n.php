<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductAttrI18n as ProductAttrI18nModel;

class ProductAttrI18n extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {    
        $return = [];
        $productAttrTable = $this->getProductAttrI18n($data);
        
        foreach ($productAttrTable as $value)
        {
            $productAttrI18nModel = new ProductAttrI18nModel();
            
            //ToDo!!!
            
            $return[] = $productAttrModel;
        }
        return $return;
    }
    
    public function getProductAttrI18n($param)
    {
        $sqlResult = $this->db->query(" SELECT * FROM oxobject2attribute " .
                                       " INNER JOIN oxattribute " .
                                       " ON oxobject2attribute.OXATTRID = oxattribute.OXID " .
                                       " WHERE oxobject2attribute.OXOBJECTID = '{$params['OXID']}'");
        return $sqlResult;
    }  
}