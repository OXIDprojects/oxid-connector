<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\SpecificValueI18n as SpecificValueI18nModel;

class SpecificValueI18n extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {    
        $return = [];
        $specificValueI18nTable = $this->getSpecificValueI18n($data);
        
        foreach ($specificValueI18nTable as $value)
        {
            $specificValueI18nModel = new SpecificValueI18nModel();
            
            //ToDo!!!
            
            $return[] = $specificValueI18nModel;
        }
        return $return;
    }
    
    public function getSpecificValueI18n($param)
    {
        $sqlResult = $this->db->query(" SELECT * FROM oxobject2attribute " .
                                       " INNER JOIN oxattribute " .
                                       " ON oxobject2attribute.OXATTRID = oxattribute.OXID " .
                                       " WHERE oxobject2attribute.OXOBJECTID = '{$params['OXID']}'");
        return $sqlResult;
    }  
}