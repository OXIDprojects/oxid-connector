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
        $categoryI18nModel = new CategoryI18nModel();       
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
                       !empty($value['OXLONGDESC']))
                    {
                        $categoryI18nModel->_localeName = $language['name'];
                        $categoryI18nModel->_categoryId = $value['OXID'];
                        $categoryI18nModel->_name = $value['OXTITLE'];
                        $categoryI18nModel->_urlPath = $value['OXEXTLINK'];
                        $categoryI18nModel->_description = $value['OXLONGDESC'];
                                                
                        $container->add('category_i18n', $categoryI18nModel->getPublic(array('_fields')));
                    }
                }else{
                    if(!empty($value["OXTITLE_{$langBaseId}"]) or
                       !empty($value["OXLONGDESC_{$langBaseId}"]))
                    {
                        $categoryI18nModel->_localeName = $language['name'];
                        $categoryI18nModel->_categoryId = $value['OXID'];
                        $categoryI18nModel->_name = $value["OXTITLE_{$langBaseId}"];
                        $categoryI18nModel->_urlPath = $value["OXEXTLINK"];
                        $categoryI18nModel->_description = $value["OXLONGDESC_{$langBaseId}"];
                        
                        $container->add('category_i18n', $categoryI18nModel->getPublic(array('_fields')));                    
                    }
                }
            }   
        }
    }
    
    public function getCategoryI18n()
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT * " .
                                        " FROM oxcategories;");
        return $sqlResult;
    }
}

/* non mapped properties
CategoryI18n:
 * _metaDescription 
 * _metaKeywords
 * _titleTag
 */