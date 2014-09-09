<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CustomerGroupI18n as CustomerGroupI18nModel;

class CustomerGroupI18n extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $languages = $this->getLanguageIDs();
        
        foreach ($languages as $language)
        {               
            if($language['baseId'] == 0)
            { 
                if($this->getLocalCode($language['code']))
                {
                    if(!empty($data['OXTITLE']))
                    {
                        $customerGroupI18nModel = new CustomerGroupI18nModel();
                        
                        $identityModel = new IdentityModel();
                        $identityModel->setEndpoint($data['OXID']);
                        $customerGroupI18nModel->setCustomerGroupId($identityModel);
                            
                        $customerGroupI18nModel->setLocaleName($this->getLocalCode($language['code']));
                        $customerGroupI18nModel->setName($data['OXTITLE']);
                            
                        $return[] = $customerGroupI18nModel;
                    }
                }
            }else{
                if($this->getLocalCode($language['code']))
                {   
                    if(!empty($data["OXTITLE_{$language['baseId']}"]))
                    {
                        $customerGroupI18nModel = new CustomerGroupI18nModel();
                        
                        $identityModel = new IdentityModel();
                        $identityModel->setEndpoint($data['OXID']);
                        $customerGroupI18nModel->setCustomerGroupId($identityModel);
                            
                        $customerGroupI18nModel->setLocaleName($this->getLocalCode($language['code']));
                        $customerGroupI18nModel->setName($data["OXTITLE_{$language['baseId']}"]);
                            
                        $return[] = $customerGroupI18nModel;
                    }
                }
            }
        }   
        return $return;
    }
    
}