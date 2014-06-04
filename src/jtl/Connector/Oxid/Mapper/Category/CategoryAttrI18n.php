<?php
namespace jtl\Connector\Oxid\Mapper\Category;

use jtl\Core\Utilities;
use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\CategoryContainer;
use jtl\Connector\Result\Transaction as TransactionResult;
use jtl\Connector\Model\CategoryAttrI18n as CategoryAttrI18nModel;
use jtl\Connector\Model\Identity as IdentityModel;

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
                
                if($this->getLocalCode($language['code']))
                {
                    if($language['baseId'] == 0)
                    {   
                        if(!empty($value['OXTITLE']))
                        {
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $categoryAttrI18nModel->setCategoryAttrId($identityModel);

                            $categoryAttrI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $categoryAttrI18nModel->setValue($value['OXTITLE']);
                                                      
                            $container->add('category_attr_i18n', $categoryAttrI18nModel->getPublic(), false);
                        }
                    }else{
                        if(!empty($value["OXTITLE_{$langBaseId}"]))
                        {
                            
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $categoryAttrI18nModel->setCategoryAttrId($identityModel);
                            
                            $categoryAttrI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $categoryAttrI18nModel->setValue($value["OXTITLE_{$langBaseId}"]);
                            
                            $container->add('category_attr_i18n', $categoryAttrI18nModel->getPublic(), false);
                        }
                    }
                }
            }   
        }
    }

    public function getCategoryAttrI18n($params)
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query(" SELECT * FROM oxcategory2attribute " .
                                       " INNER JOIN oxattribute " .
                                       " ON oxcategory2attribute.OXATTRID = oxattribute.OXID " .
                                       " WHERE oxcategory2attribute.OXOBJECTID = '{$params['OXID']}';");
        return $sqlResult;
    }
}

/* non mapped properties
CategoryAttrI18n:
 * _key
 */