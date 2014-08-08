<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\ProductVariationI18n as ProductVariationI18nModel;
use jtl\Connector\Model\Identity as IdentityModel;

/**
 * Summary of ProductVariationI18n
 */
class ProductVariationI18n extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $productVariationI18nModel = new ProductVariationI18nModel();       
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
                        if(!empty($value['OXVARNAME']))
                        {
                            $variantIDs = array_map('trim', split('\|', $value['OXVARNAME']));
                                
                            foreach ($variantIDs as $variantID)
                            {
                                $identity = new IdentityModel;
                                $identity->setEndpoint(md5($variantID));
                                $productVariationI18nModel->setProductVariationId($identity);
                                    
                                $productVariationI18nModel->setLocaleName($this->getLocalCode($language['code']));
                                $productVariationI18nModel->setName($variantID);
                                    
                                $container->add('product_variation_i18n', $productVariationI18nModel->getPublic(), false);
                            }
                        }
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXVARNAME_{$langBaseId}"]))
                        {
                            $variantIDs = array_map('trim', split('\|', $value["OXVARNAME"]));
                            $variantLangIDs = array_map('trim', split('\|', $value["OXVARNAME_{$langBaseId}"]));
                            
                            for ($i = 0; $i < count($variantIDs); $i++)
                            {
                                $identity = new IdentityModel;
                                $identity->setEndpoint(md5($variantIDs[$i]));
                                $productVariationI18nModel->setProductVariationId($identity);
                                
                                $productVariationI18nModel->setLocaleName($this->getLocalCode($language['code']));
                                $productVariationI18nModel->setName($variantLangIDs[$i]);
                                
                                $container->add('product_variation_i18n', $productVariationI18nModel->getPublic(), false);
                            }
                        }
                    }
                } 
            }                
            
        }
    }
    
    public function getProductVariationI18n($param)
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query(" SELECT * FROM oxarticles " .
                                       " WHERE OXID = '{$param['OXID']}' ");
        
        return $sqlResult;
    }
}

/* non mapped properties
ProductVariationI18n:
 * _key
 */