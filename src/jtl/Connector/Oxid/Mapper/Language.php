<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Language as LanguageModel;
use jtl\Connector\Model\Identity as IdentityModel;

class Language extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $languageTable = $this->getLanguageIDs();
        
        foreach ($languageTable as $value)
        {
            $language = new LanguageModel();
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['baseId']);
            $language->setId($identityModel);
            
            $language->setNameEnglish($value['name']);
            $language->setNameGerman($value['name']);
            $language->setLocaleName($this->getLocalCode($value['code']));
            
            if(!isset($value['default']) or $value['default'] == 1)
            {
                $language->setIsDefault(true);
            }else{
                $language->setIsDefault(false);
            }
            $return[] = $language;
        }
        return $return;
    }   
}