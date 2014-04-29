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
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value['OXTITLE']) or
                           !empty($value['OXLONGDESC']))
                        {
                            $categoryI18nModel->_localeName = $this->getLocalCode($language['code']);
                            $categoryI18nModel->_categoryId = $value['OXID'];
                            $categoryI18nModel->_name = $value['OXTITLE'];
                            $categoryI18nModel->_urlPath = $value['OXEXTLINK'];
                            $categoryI18nModel->_description = $value['OXLONGDESC'];
                                                      
                            $container->add('category_i18n', $categoryI18nModel->getPublic(), false);
                        }    
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]) or
                           !empty($value["OXLONGDESC_{$langBaseId}"]))
                        {
                            $categoryI18nModel->_localeName = $this->getLocalCode($language['code']);
                            $categoryI18nModel->_categoryId = $value['OXID'];
                            $categoryI18nModel->_name = $value["OXTITLE_{$langBaseId}"];
                            $categoryI18nModel->_urlPath = $value["OXEXTLINK"];
                            $categoryI18nModel->_description = $value["OXLONGDESC_{$langBaseId}"];
                            
                            $container->add('category_i18n', $categoryI18nModel->getPublic(), false);
                        }
                    }
                }
            }
        }
    }
    
    public function updateAll($container, $trid=null) {
        $result = new TransactionResult();
        $result->setTransactionId($trid);
        
        foreach ($container->get('categoryI18n') as $categoryI18n)
        {
            $obj = $this->mapDB($categoryI18n);
            
            $entry = new \stdClass();
            
            $entry->OXID = $categoryI18n->_categoryId;
            $entry->OXTITLE = $categoryI18n->_value;
            $entry->OXEXTLINK = $categoryI18n->_urlPath;
            $entry->OXLONGDESC = $categoryI18n->_description;
        }
        
        if(!empty($obj->OXID))
        {
            $this->_db->updateRow($obj, $this->_config['table'],$this->_config['pk'],$obj->customers_id);
            $result->setId($obj->customers_id);
            $result->setAction(TransactionResult::ACTION_UPDATE);
        }else{
            $result->setAction(TransactionResult::ACTION_CREATE);
        }
    }
    
    public function getCategoryI18n($params)
    {   
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT * " .
                                        " FROM oxcategories " .
                                        " WHERE oxcategories.OXID = '{$params['OXID']}'");        
        return $sqlResult;
    }
}

/* non mapped properties
CategoryI18n:
 * _metaDescription 
 * _metaKeywords
 * _titleTag
 */