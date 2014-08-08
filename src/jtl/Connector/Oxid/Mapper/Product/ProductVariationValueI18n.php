<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\ProductVariationValueI18n as ProductVariationValueI18nModel;
use jtl\Connector\Model\Identity as IdentityModel;

/**
 * Summary of ProductVariationValueI18n
 */
class ProductVariationValueI18n extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $productVariationValueI18nModel = new ProductVariationValueI18nModel();       
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
                        if(!empty($value['OXVARSELECT']))
                        {
                            $variantValues = array_map('trim', split('\|', $value['OXVARSELECT']));
                                
                            foreach ($variantValues as $variantValue)
                            {
                                $identity = new IdentityModel;
                                $identity->setEndpoint($value['OXID']);
                                $productVariationValueI18nModel->setProductVariationId($identity);
                                    
                                $productVariationValueI18nModel->setLocaleName($this->getLocalCode($language['code']));
                                $productVariationValueI18nModel->setName($variantValue);
                                    
                                $container->add('product_variation_i18n', $productVariationI18nModel->getPublic(), false);
                            }
                        }
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXVARSELECT_{$langBaseId}"]))
                        {
                            $variantValues = array_map('trim', split('\|', $value['OXVARSELECT']));
                            
                            foreach ($variantValues as $variantValue)
                            {
                                $identity = new IdentityModel;
                                $identity->setEndpoint($value['OXID']);
                                $productVariationValueI18nModel->setProductVariationId($identity);
                                
                                $productVariationValueI18nModel->setLocaleName($this->getLocalCode($language['code']));
                                $productVariationValueI18nModel->setName($variantValue);
                                
                                $container->add('product_variation_i18n', $productVariationI18nModel->getPublic(), false);    
                            }
                        }
                    }
                } 
            }                
            
        }
    }
    
    public function getProductVariationValueI18n($param)
    {
        $oxidConf = new Config();
        
        // $sqlResult = $this->_db->query(" SELECT * FROM oxarticles WHERE oxarticles.OXPARENTID = '{$param['OXID']}' ");
        
        $sqlResult = $this->_db->query(" SELECT * FROM oxarticles WHERE oxarticles.OXPARENTID = '943ed656e21971fb2f1827facbba9bec' ");
        
        return $sqlResult;
    }
}

/* non mapped properties
ProductVariationValueI18n:
 * 
 */