<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\ProductVariationI18n as ProductVariationI18nModel;

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
                        if(!empty($value['OXTITLE']))
                        {
                            $productVariationI18nModel->_localeName = $this->getLocalCode($language['code']);
                            $productVariationI18nModel->_productVariationId = $value['OXOBJECTID'];
                            $productVariationI18nModel->_name = $value['OXTITLE'];
                            
                            $container->add('product_variation_i18n', $productVariationI18nModel->getPublic(), false);
                        }
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]))
                        {
                            $productVariationI18nModel->_localeName = $this->getLocalCode($language['code']);
                            $productVariationI18nModel->_productVariationId = $value['OXOBJECTID'];
                            $productVariationI18nModel->_name = $value["OXTITLE_{$langBaseId}"];
                            
                            $container->add('product_variation_i18n', $productVariationI18nModel->getPublic(), false);
                        }
                    }
                }
            }   
        }
    }
    
    public function getProductVariationI18n($param)
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query(" SELECT * FROM oxobject2attribute, oxarticles " .
                                       " WHERE oxarticles.OXID = '{$param['OXID']}' AND oxobject2attribute.OXOBJECTID = oxarticles.OXID " .
                                       " ORDER BY OXOBJECTID DESC;");
        return $sqlResult;
    }
}

/* non mapped properties
ProductVariationI18n:
 * _key
 */