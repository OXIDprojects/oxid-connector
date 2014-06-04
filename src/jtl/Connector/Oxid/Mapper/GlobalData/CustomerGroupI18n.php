<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Model\CustomerGroupI18n as CustomerGroupI18nModel;
use jtl\Connector\Model\Identity as IdentityModel;

/**
 * Summary of CustomerGroupI18n
 */
class CustomerGroupI18n extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $customerGroupI18nModel = new CustomerGroupI18nModel();       
        $languages = $this->getLanguageIDs();
        
        foreach ($params as $value)
        {
            //Pro Sprache
            foreach ($languages as $language)
            {
                $langBaseId = $language['baseId'];
                
                if($language['baseId'] == 0)
                { 
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value['OXTITLE']))
                        {
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $customerGroupI18nModel->setCustomerGroupId($identityModel);
                            
                            $customerGroupI18nModel->setLocaleName = $this->getLocalCode($language['code']);
                            $customerGroupI18nModel->setName = $value['OXTITLE'];
                            
                            $container->add('customer_group_i18n', $customerGroupI18nModel->getPublic(), false);
                        }
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]))
                        {
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $customerGroupI18nModel->setCustomerGroupId($identityModel);
                            
                            $customerGroupI18nModel->setLocaleName = $this->getLocalCode($language['code']);
                            $customerGroupI18nModel->setName = $value["OXTITLE_{$langBaseId}"];
                            
                            $container->add('customer_group_i18n', $customerGroupI18nModel->getPublic(), false); 
                        }
                    }
                }
            }   
        }
    }
    
    public function getCustomerGroupI18n()
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT * " .
                                        " FROM oxgroups;");
        return $sqlResult;
    }
}

/* non mapped properties
CustomerGroupI18n:
 * _metaDescription 
 * _metaKeywords
 */