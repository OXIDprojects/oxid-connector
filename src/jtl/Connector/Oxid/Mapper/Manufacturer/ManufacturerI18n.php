<?php
namespace jtl\Connector\Oxid\Mapper\Manufacturer;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\ManufacturerContainer;
use jtl\Connector\Model\ManufacturerI18n as ManufacturerI18nModel;

/**
 * Summary of ManufacturerI18n
 */
class ManufacturerI18n extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $manufacturerI18nModel = new ManufacturerI18nModel();       
        $languages = $this->getLanguageIDs();
        
        foreach ($params as $value)
        {
            //Pro Sprache
            foreach ($languages as $language)
            {
                $langBaseId = $language['baseId'];
                
                if(!isset($language['default']) or $language['default'] == 1)
                {   
                    if(!empty($value['OXTITLE']) or
                       !empty($value['OXSHORTDESC']))
                    {
                        $manufacturerI18nModel->_manufacturerId = $value['OXID'];
                        $manufacturerI18nModel->_localeName = $language['name'];
                        $manufacturerI18nModel->_description = $value['OXSHORTDESC'];
                        $manufacturerI18nModel->_titleTag = $value['OXTITLE'];
                        
                        $container->add('manufacturer_i18n', $manufacturerI18nModel->getPublic(array('_fields')));
                    }
                }else{
                    if(!empty($value["OXTITLE_{$langBaseId}"]) or
                       !empty($value["OXSHORTDESC_{$langBaseId}"]))
                    {
                        $manufacturerI18nModel->_manufacturerId = $value['OXID'];
                        $manufacturerI18nModel->_localeName = $language['name'];
                        $manufacturerI18nModel->_description = $value["OXSHORTDESC_{$langBaseId}"];
                        $manufacturerI18nModel->_titleTag = $value["OXTITLE_{$langBaseId}"];
                        
                        $container->add('manufacturer_i18n', $manufacturerI18nModel->getPublic(array('_fields')));
                    }
                }
            }   
        }
    }
    
    public function getManufacturerI18n()
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT * " .
                                        " FROM oxmanufacturers;");
        return $sqlResult;
    }
}

/* non mapped properties
ManufacturerI18n:
 * _metaDescription 
 * _metaKeywords
*/