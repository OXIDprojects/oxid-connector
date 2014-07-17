<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Model\UnitI18n as UnitI18nModel;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\ModelContainer\GlobalDataContainer;

/**
 * Summary of UnitI18n
 */
class UnitI18n extends BaseMapper
{
    
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $unitI18nModel = new UnitI18nModel();       
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
                        $unitI18nModel->setUnitId($identityModel);
                            
                        $unitI18nModel->setLocaleName($this->getLocalCode($language['code']));
                        $unitI18nModel->setName($this->getUnitCode($value['OXUNITNAME'], 2));
                            
                        $container->add('unit_i18n', $unitI18nModel->getPublic(), false);
                    }
                }
            }   
        }
    }
    
    /**
     * Summary of getUnitI18n
     * @return Array
     */
    public function getUnitI18n()
    {   
        $sqlResult = $this->_db->query("SELECT OXID, OXTITLE, OXUNITNAME, OXUNITQUANTITY FROM oxarticles WHERE OXUNITNAME <> '' GROUP BY OXUNITNAME;");
               
        return $sqlResult;
    }
}
/* non mapped properties
 * UnitI18n:
 */