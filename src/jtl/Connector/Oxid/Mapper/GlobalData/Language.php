<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Language AS LanguageModel;
use jtl\Connector\ModelContainer\GlobalDataContainer;
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
            $language->_id = $value['baseId'];
            $language->_nameEnglish = $value['name'];
            $language->_nameGerman = $value['name'];
            $language->_localeName = $value['name'];
            
            $container->add('language', $language->getPublic(array('_fields')));
        }
    }   
}