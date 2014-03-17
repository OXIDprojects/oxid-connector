<?php
namespace jtl\Connector\Oxid\Mapper\Category;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\CategoryContainer;
use jtl\Connector\Model\CategoryI18n as CategoryI18nModel;

/**
 * Summary of CategoryI18n
 */
class CategoryI18n extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $CategoryI18nModel = new CategoryI18nModel();       
        $Languages = $this->getLanguageIDs();
        
        foreach ($params as $value)
        {
            //Pro Sprache
            foreach ($Languages as $language)
            {
                $langBaseId = $language['baseId'];
                
                if(!isset($language['default']) or $language['default'] == 1)
                {   
                    if(!empty($value['OXTITLE']) or
                       !empty($value['OXLONGDESC']))
                    {
                        $CategoryI18nModel->_localeName = $language['name'];
                        $CategoryI18nModel->_categoryId = $value['OXID'];
                        $CategoryI18nModel->_name = $value['OXTITLE'];
                        $CategoryI18nModel->_urlPath = $value['OXEXTLINK'];
                        $CategoryI18nModel->_description = $value['OXLONGDESC'];
                                                
                        $container->add('category_i18n', $CategoryI18nModel->getPublic(array('_fields')));
                    }
                }else{
                    if(!empty($value["OXTITLE_{$langBaseId}"]) or
                       !empty($value["OXLONGDESC_{$langBaseId}"]))
                    {
                        $CategoryI18nModel->_localeName = $language['name'];
                        $CategoryI18nModel->_categoryId = $value['OXID'];
                        $CategoryI18nModel->_name = $value["OXTITLE_{$langBaseId}"];
                        $CategoryI18nModel->_urlPath = $value["OXEXTLINK"];
                        $CategoryI18nModel->_description = $value["OXLONGDESC_{$langBaseId}"];
                        
                        $container->add('category_i18n', $CategoryI18nModel->getPublic(array('_fields')));                    
                    }
                }
            }   
        }
    }
    
    public function getCategoryI18n()
    {
        $OxidConf = new Config();
        
        $SQLResult = $this->_db->query("SELECT * " .
                                        " FROM oxcategories;");
        return $SQLResult;
    }
}

/* non mapped properties
Category:
 * _metaDescription 
 * _metaKeywords
 * _titleTag
 */