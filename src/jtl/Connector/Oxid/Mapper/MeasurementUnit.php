<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Model\MeasurementUnit as MeasurementUnitModel;

/**
 * Summary of MeasurementUnit
 */
class MeasurementUnit extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $measurementUnit = new MeasurementUnitModel();
        
        foreach ($params as $value)
        {
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXUNITNAME']);
            $measurementUnit->setId($identityModel);
            
            $measurementUnit->setCode($this->getUnitCode($value['OXUNITNAME'], 0));
            $measurementUnit->setDisplayCode($this->getUnitCode($value['OXUNITNAME'], 1));
            
            $container->add('measurement_unit', $measurementUnit->getPublic(), false);
        }
    }
    
    /**
     * Summary of getMeasurementUnit
     * @return Array
     */
    public function getMeasurementUnit()
    {   
        $sqlResult = $this->_db->query("SELECT OXID, OXTITLE, OXUNITNAME, OXUNITQUANTITY FROM oxarticles WHERE OXUNITNAME <> '' GROUP BY OXUNITNAME");
        
        return $sqlResult;
    }
}