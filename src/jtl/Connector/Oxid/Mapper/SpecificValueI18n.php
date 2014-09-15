<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\SpecificValueI18n as SpecificValueI18nModel;

class SpecificValueI18n extends BaseMapper
{
    public function pull($specValId=null, $data=null, $offset=0, $limit=null)
    {    
        $return = [];
        $languages = $this->getLanguageIDs();
        
        foreach ($languages as $language)
        {
            if($this->getLocalCode($language['code']))
            {
                $specificValueI18nModel = new SpecificValueI18nModel();

                $identity = new IdentityModel;
                $identity->setEndpoint($specValId);
                $specificValueI18nModel->setSpecificValueId($identity);
                
                $specificValueI18nModel->setLocaleName($this->getLocalCode($language['code']));
                
                if($language['baseId'] == 0)
                {
                    $specificValueI18nModel->setValue($data['OXVALUE']);
                } else {
                    $specificValueI18nModel->setValue($data["OXVALUE_{$language['baseId']}"]);
                }
            }    
            $return[] = $specificValueI18nModel;               
        }
        return $return;
    }
}