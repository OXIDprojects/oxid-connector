<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\Specific as SpecificModel;

class ProductAttrI18n extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {    
        $return = [];
        $specificTable = $this->getSpecific($data);
        
        foreach ($specificTable as $value)
        {
            $specificModel = new SpecificModel();
            
            //ToDo!!!
            
            $return[] = $productAttrModel;
        }
        return $return;
    }
    
    public function getSpecific($param)
    {
        $sqlResult = $this->db->query(" SELECT * FROM oxobject2attribute " .
                                       " INNER JOIN oxattribute " .
                                       " ON oxobject2attribute.OXATTRID = oxattribute.OXID " .
                                       " WHERE oxobject2attribute.OXOBJECTID = '{$params['OXID']}'");
        return $sqlResult;
    }  
}