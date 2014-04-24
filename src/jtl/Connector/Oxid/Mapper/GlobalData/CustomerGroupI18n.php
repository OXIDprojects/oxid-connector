<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Model\CustomerGroupI18n as CustomerGroupI18nModel;

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
                
                if(!isset($language['default']) or $language['default'] == 1)
                { 
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value['OXTITLE']))
                        {
                            $customerGroupI18nModel->_localeName = $this->getLocalCode($language['code']);
                            $customerGroupI18nModel->_customerGroupId = $value['OXID'];
                            $customerGroupI18nModel->_name = $value['OXTITLE'];
                            
                            $container->add('customer_group_i18n', $this->editEmptyStringToNull($customerGroupI18nModel->getPublic(), false));
                        }
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]))
                        {
                            $customerGroupI18nModel->_localeName = $this->getLocalCode($language['code']);
                            $customerGroupI18nModel->_customerGroupId = $value['OXID'];
                            $customerGroupI18nModel->_name = $value["OXTITLE_{$langBaseId}"];
                            
                            $container->add('customer_group_i18n', $this->editEmptyStringToNull($customerGroupI18nModel->getPublic(), false));                    
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