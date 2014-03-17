<?php
namespace jtl\Connector\Oxid\Mapper\Category;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\CategoryContainer;
use jtl\Connector\Model\CategoryAttrI18n as CategoryAttrI18nModel;

/**
 * Summary of CategoryAttrI18n
 */
class CategoryAttrI18n extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $categoryAttrI18nModel = new CategoryAttrI18nModel();       
        $languages = $this->getLanguageIDs();
        
        foreach ($params as $value)
        {
            //Pro Sprache
            foreach ($languages as $language)
            {
                $langBaseId = $language['baseId'];
                
                if(!isset($language['default']) or $language['default'] == 1)
                {   
                    if(!empty($value['OXTITLE']))
                    {
                        $categoryAttrI18nModel->_localeName = $language['name'];
                        $categoryAttrI18nModel->_categoryAttrId = $value['OXID'];
                        $categoryAttrI18nModel->_value = $value['OXTITLE'];
                        
                        $container->add('category_attr_i18n', $categoryAttrI18nModel->getPublic(array('_fields')));
                    }
                }else{
                    if(!empty($value["OXTITLE_{$langBaseId}"]))
                    {
                        $categoryAttrI18nModel->_localeName = $language['name'];
                        $categoryAttrI18nModel->_categoryAttrId = $value['OXID'];
                        $categoryAttrI18nModel->_value = $value["OXTITLE_{$langBaseId}"];
                        
                        $container->add('category_attr_i18n', $categoryAttrI18nModel->getPublic(array('_fields')));
                    }
                }
            }   
        }
    }
    
    public function getCategoryAttrI18n()
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query(" SELECT * FROM oxcategory2attribute " .
                                       " INNER JOIN oxattribute " .
                                       " ON oxcategory2attribute.OXATTRID = oxattribute.OXID;");
        return $sqlResult;
    }
}

/* non mapped properties
CategoryAttrI18n:
 * _key
 */