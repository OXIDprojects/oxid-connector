<?php
namespace jtl\Connector\Oxid\Mapper\Category;

use jtl\Core\Utilities;
use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\CategoryContainer;
use jtl\Connector\Result\Transaction as TransactionResult;
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
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value['OXTITLE']))
                        {
                            $categoryAttrI18nModel->_localeName = $this->getLocalCode($language['code']);
                            $categoryAttrI18nModel->_categoryAttrId = $value['OXID'];
                            $categoryAttrI18nModel->_value = $value['OXTITLE'];
                                                      
                            $container->add('category_attr_i18n', $this->editEmptyStringToNull($categoryAttrI18nModel->getPublic(), false));
                        }
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]))
                        {
                            $categoryAttrI18nModel->_localeName = $this->getLocalCode($language['code']);
                            $categoryAttrI18nModel->_categoryAttrId = $value['OXID'];
                            $categoryAttrI18nModel->_value = $value["OXTITLE_{$langBaseId}"];
                            
                            $container->add('category_attr_i18n', $this->editEmptyStringToNull($categoryAttrI18nModel->getPublic(), false));
                        }
                    }
                }
            }   
        }
    }
    
    public function updateAll($container, $trid=null) {
        $result = new TransactionResult();
        $result->setTransactionId($trid);
        
        foreach ($container->get('categoryAttrI18n') as $categoryAttrI18n)
        {
            $obj = $this->mapDB($categoryAttrI18n);
            
            $entry = new \stdClass();
            $entry->OXID = $categoryAttrI18n->_categoryAttrId;
            $entry->OXTITLE = $categoryAttrI18n->_value;
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