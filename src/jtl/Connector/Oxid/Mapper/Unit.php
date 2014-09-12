<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Unit as UnitModel;
use jtl\Connector\Model\Identity as IdentityModel;

class Unit extends BaseMapper
{      
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $UnitTable = $this->getUnit();
        
        foreach ($UnitTable as $value)
        {
            $unit = new UnitModel();
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXUNITNAME']);
            $unit->setId($identityModel);
            
            $return[] =  $unit;
        }
        return $return;
    }
    
    public function getUnit()
    {   
        $sqlResult = $this->db->query("SELECT OXID, OXTITLE, OXUNITNAME, OXUNITQUANTITY FROM oxarticles WHERE OXUNITNAME <> '' GROUP BY OXUNITNAME");
        
        return $sqlResult;
    }
}