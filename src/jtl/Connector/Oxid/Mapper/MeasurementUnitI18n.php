<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Model\MeasurementUnitI18n as MeasurementUnitI18nModel;

/**
 * Summary of MeasurementUnitI18n
 */
class MeasurementUnitI18n extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $measurementUnitI18nModel = new MeasurementUnitI18nModel();       
        $languages = $this->getLanguageIDs();
        
        foreach ($params as $value)
        {
            //Pro Sprache
            foreach ($languages as $language)
            {               
                if($this->getLocalCode($language['code']))
                {
                    if(!empty($value['OXUNITNAME']))
                    {
                        $identityModel = new IdentityModel();
                        $identityModel->setEndpoint($value['OXUNITNAME']);
                        $measurementUnitI18nModel->setMeasurementUnitId($identityModel);
                        
                        $measurementUnitI18nModel->setLocaleName($this->getLocalCode($language['code']));
                        $measurementUnitI18nModel->setName($this->getUnitCode($value['OXUNITNAME'], 1));
                        
                        $container->add('measurement_unitI18n', $measurementUnitI18nModel->getPublic(), false);
                    }
                }
            }   
        }
    }
    
    /**
     * Summary of getMeasurementUnitI18n
     * @return Array
     */
    public function getMeasurementUnitI18n()
    {   
        $sqlResult = $this->_db->query("SELECT OXID, OXTITLE, OXUNITNAME, OXUNITQUANTITY FROM oxarticles WHERE OXUNITNAME <> '' GROUP BY OXUNITNAME");
        
        return $sqlResult;
    }
}