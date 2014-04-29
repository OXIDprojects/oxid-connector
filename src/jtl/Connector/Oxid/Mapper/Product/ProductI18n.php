<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\ProductI18n as ProductI18nModel;

/**
 * Summary of ProductI18n
 */
class ProductI18n extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $productI18nModel = new ProductI18nModel();       
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
                           !empty($value['OXEXTURL']) or 
                           !empty($value['OXLONGDESC']) or 
                           !empty($value['OXSHORTDESC']))
                        {
                            $productI18nModel->_localeName = $this->getLocalCode($language['code']);
                            $productI18nModel->_productId = $value['OXID'];
                            $productI18nModel->_name = $value['OXTITLE'];
                            $productI18nModel->_urlPath = $value['OXEXTURL'];
                            $productI18nModel->_description = $value['OXLONGDESC'];
                            $productI18nModel->_shortDescription = $value['OXSHORTDESC'];
                            
                            $container->add('product_i18n', $productI18nModel->getPublic(), false);
                        }
                    }
                }else{
                    if($this->getLocalCode($language['code']))
                    {
                        if(!empty($value["OXTITLE_{$langBaseId}"]) or
                           !empty($value["OXURLDESC_{$langBaseId}"]) or
                           !empty($value["OXLONGDESC_{$langBaseId}"]) or
                           !empty($value["OXSHORTDESC_{$langBaseId}"]))
                        {
                            $productI18nModel->_localeName = $this->getLocalCode($language['code']);
                            $productI18nModel->_productId = $value['OXID'];
                            $productI18nModel->_name = $value["OXTITLE_{$langBaseId}"];
                            $productI18nModel->_urlPath = $value["OXURLDESC_{$langBaseId}"];
                            $productI18nModel->_description = $value["OXLONGDESC_{$langBaseId}"];
                            $productI18nModel->_shortDescription = $value["OXSHORTDESC_{$langBaseId}"];
                            
                            $container->add('product_i18n', $productI18nModel->getPublic(), false);
                        }
                    }
                }
            }   
        }
    }
    
    public function getProductI18n()
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query("SELECT oxarticles.*, oxartextends.*" .
                                        " FROM oxarticles" .
                                        " INNER JOIN oxartextends" .
                                        " ON oxarticles.OXID = oxartextends.OXID;");
        return $sqlResult;
    }
}