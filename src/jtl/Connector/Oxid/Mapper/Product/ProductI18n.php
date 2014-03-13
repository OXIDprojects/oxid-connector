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
        $ProductI18nModel = new ProductI18nModel();       
        $Languages = $this->getLanguageIDs();
        
        foreach ($params as $value)
        {
            //Pro Sprache
            foreach ($Languages as $language)
            {
                $langBaseId = $language['baseId'];
                
                if(!isset($language['default']) or $language['default'] == 1)
                {   
                    if(!empty($value['OXTITLE']) or
                       !empty($value['OXEXTURL']) or 
                       !empty($value['OXLONGDESC']) or 
                       !empty($value['OXSHORTDESC']))
                    {
                        $ProductI18nModel->_localeName = $language['name'];
                        $ProductI18nModel->_productId = $value['OXID'];
                        $ProductI18nModel->_name = $value['OXTITLE'];
                        $ProductI18nModel->_urlPath = $value['OXEXTURL'];
                        $ProductI18nModel->_description = $value['OXLONGDESC'];
                        $ProductI18nModel->_shortDescription = $value['OXSHORTDESC'];
                        
                        $container->add('product_i18n', $ProductI18nModel->getPublic(array('_fields')));
                    }
                }else{
                    if(!empty($value["OXTITLE_{$langBaseId}"]) or
                       !empty($value["OXURLDESC_{$langBaseId}"]) or
                       !empty($value["OXLONGDESC_{$langBaseId}"]) or
                       !empty($value["OXSHORTDESC_{$langBaseId}"]))
                    {
                        $ProductI18nModel->_localeName = $language['name'];
                        $ProductI18nModel->_productId = $value['OXID'];
                        $ProductI18nModel->_name = $value["OXTITLE_{$langBaseId}"];
                        $ProductI18nModel->_urlPath = $value["OXURLDESC_{$langBaseId}"];
                        $ProductI18nModel->_description = $value["OXLONGDESC_{$langBaseId}"];
                        $ProductI18nModel->_shortDescription = $value["OXSHORTDESC_{$langBaseId}"];
                        
                        $container->add('product_i18n', $ProductI18nModel->getPublic(array('_fields')));                    
                    }
                }
            }   
        }
    }
    
    public function getProductI18n()
    {
        $OxidConf = new Config();
        
        $SQLResult = $this->_db->query("SELECT oxarticles.*, oxartextends.*" .
                                        " FROM oxarticles" .
                                        " INNER JOIN oxartextends" .
                                        " ON oxarticles.OXID = oxartextends.OXID;");
        return $SQLResult;
    }
}