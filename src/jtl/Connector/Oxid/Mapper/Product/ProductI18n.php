<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\ProductI18n as ProductI18nModel;
use jtl\Connector\Model\Identity as IdentityModel;

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
                
                if($this->getLocalCode($language['code']))
                {
                    if($language['baseId'] == 0)
                    {   
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $productI18nModel->setProductId($identityModel);
                            
                            $productI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $productI18nModel->setName($value['OXTITLE']);
                            $productI18nModel->setUrlPath($value['OXEXTURL']);
                            $productI18nModel->setDescription($value['OXLONGDESC']);
                            $productI18nModel->setShortDescription($value['OXSHORTDESC']);
                            
                            $container->add('product_i18n', $productI18nModel->getPublic(), false);
                    }else{
                        if(!empty($value["OXTITLE_{$langBaseId}"]) or
                           !empty($value["OXURLDESC_{$langBaseId}"]) or
                           !empty($value["OXLONGDESC_{$langBaseId}"]) or
                           !empty($value["OXSHORTDESC_{$langBaseId}"]))
                        {
                            $identityModel = new IdentityModel();
                            $identityModel->setEndpoint($value['OXID']);
                            $productI18nModel->setProductId($identityModel);
                            
                            $productI18nModel->setLocaleName($this->getLocalCode($language['code']));
                            $productI18nModel->setName($value["OXTITLE_{$langBaseId}"]);
                            $productI18nModel->setUrlPath($value["OXURLDESC_{$langBaseId}"]);
                            $productI18nModel->setDescription($value["OXLONGDESC_{$langBaseId}"]);
                            $productI18nModel->setShortDescription($value["OXSHORTDESC_{$langBaseId}"]);
                            
                            $container->add('product_i18n', $productI18nModel->getPublic(), false);
                        }
                    }
                }
            }   
        }
    }
    
    public function getProductI18n($param)
    {      
        $sqlResult = $this->_db->query("SELECT oxarticles.*, oxartextends.*" .
                                        " FROM oxarticles" .
                                        " LEFT JOIN oxartextends" .
                                        " ON oxarticles.OXID = oxartextends.OXID " .
                                        " WHERE oxarticles.OXID = '{$param['OXID']}';");
        
        return $sqlResult;
    }
}