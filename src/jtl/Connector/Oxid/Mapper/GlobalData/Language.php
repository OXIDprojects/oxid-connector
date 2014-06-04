<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\Model\Language as LanguageModel;
use jtl\Connector\ModelContainer\GlobalDataContainer;
use jtl\Connector\Model\Identity as IdentityModel;
/**
 * Summary of Language
 */
class Language extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $language = new LanguageModel();
        
        foreach ($params as $value)
        {
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['baseId']);
            $language->setId($identityModel);
            
            $language->setNameEnglish = $value['name'];
            $language->setNameGerman = $value['name'];
            $language->setLocaleName = $this->getLocalCode($value['code']);
            
            if(!isset($value['default']) or $value['default'] == 1)
            {
                $language->setIsDefault = true;
            }else{
                $language->setIsDefault = false;
            }
            
            $container->add('language', $language->getPublic(), false);
        }
    }   
}