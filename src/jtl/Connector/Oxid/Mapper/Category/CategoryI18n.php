<?php
namespace jtl\Connector\Oxid\Mapper\Category;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\CategoryContainer;
use jtl\Connector\Model\CategoryI18n as CategoryI18nModel;
use jtl\Connector\Model\Identity as IdentityModel;

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
                
                if($language['baseId'] == 0)
                {   
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value['OXTITLE']) or
                           !empty($value['OXLONGDESC']))
                        {
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $categoryI18nModel->setCategoryId($identityModel);                            
                            
                            $categoryI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $categoryI18nModel->setName($value['OXTITLE']);
                            $categoryI18nModel->setUrlPath($value['OXEXTLINK']);
                            $categoryI18nModel->setDescription($value['OXLONGDESC']);
                                                      
                            $container->add('category_i18n', $categoryI18nModel->getPublic(), false);
                        }    
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]) or
                           !empty($value["OXLONGDESC_{$langBaseId}"]))
                        {                          
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $categoryI18nModel->setCategoryId($identityModel); 
                            
                            $categoryI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $categoryI18nModel->setName($value["OXTITLE_{$langBaseId}"]);
                            $categoryI18nModel->setUrlPath($value["OXEXTLINK"]);
                            $categoryI18nModel->setDescription($value["OXLONGDESC_{$langBaseId}"]);
                            
                            $container->add('category_i18n', $categoryI18nModel->getPublic(), false);
                        }
                    }
                }
            }
        }
    }
    
    public function updateAll($container, $trid=null) {
        $result = new CategoryI18nContainer;
        
        $categoryI18n = $container->getMainModel();
        $identity = $categoryI18n->getId();
        
        $obj = $this->mapDB($categoryI18n);
        
        $result->addIdentity('category_i18n',$identity);
        
        return $result;
    }
    
    public function getCategoryI18n($params)
    {   
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT * " .
                                        " FROM oxcategories " .
                                        " WHERE oxcategories.OXID = '{$params['OXID']}';");        
        return $sqlResult;
    }
}

/* non mapped properties
CategoryI18n:
 * _metaDescription 
 * _metaKeywords
 * _titleTag
 */