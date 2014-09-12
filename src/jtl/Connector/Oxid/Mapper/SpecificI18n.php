<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\SpecificI18n as SpecificI18nModel;

class SpecificI18n extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {    
        $return = [];
        $languages = $this->getLanguageIDs();
        
        foreach ($languages as $language)
        {   
            if($this->getLocalCode($language['code']))
            {
                $specificI18nModel = new SpecificI18nModel();
                
                $identity = new IdentityModel;
                $identity->setEndpoint($data['OXID']);
                $specificI18nModel->setSpecificId($identity);
                
                $specificI18nModel->setLocaleName($this->getLocalCode($language['code']));
                
                if($language['baseId'] == 0)
                {   
                    $specificI18nModel->setName($data['OXTITLE']);
                }else{
                    $specificI18nModel->setName($data["OXTITLE_{$language['baseId']}"]);
                }       
                $return[] = $specificI18nModel;               
            }
        }
        return $return;
    }
}