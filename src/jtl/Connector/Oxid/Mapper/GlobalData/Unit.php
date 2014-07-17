<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Model\Unit as UnitModel;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\ModelContainer\GlobalDataContainer;


/**
 * Summary of Unit
 */
class Unit extends BaseMapper
{
   
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $unit = new UnitModel();
        
        foreach ($params as $value)
        {
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXUNITNAME']);
            $unit->setId($identityModel);
            
            $container->add('unit', $unit->getPublic(), false);
        }
    }
    
    /**
     * Summary of getUnit
     * @return Array
     */
    public function getUnit()
    {   
        $sqlResult = $this->_db->query("SELECT OXID, OXTITLE, OXUNITNAME, OXUNITQUANTITY FROM oxarticles WHERE OXUNITNAME <> '' GROUP BY OXUNITNAME;");
        
        return $sqlResult;
    }
}
/* non mapped properties
 * Unit:
 */