<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductVariationValueI18n as ProductVariationValueI18nModel;

/**
 * Summary of ProductVariationValueI18n
 */
class ProductVariationValueI18n extends BaseMapper
{   
    public function pull($varPos=null, $mainI18n=null, $data=null, $offset=0, $limit=null)
    {
        $productVariationValueI18nModel = new ProductVariationValueI18nModel();       
        $languages = $this->getLanguageIDs();
        
        //Pro Sprache
        foreach ($languages as $language)
        {
            $langBaseId = $language['baseId'];
            
            if($language['baseId'] == 0)
            {   
                if($this->getLocalCode($language['code']))
                {
                    $identity = new IdentityModel;
                    $identity->setEndpoint(md5($mainI18n));
                    $productVariationValueI18nModel->setProductVariationValueId($identity);

                    $productVariationValueI18nModel->setLocaleName($this->getLocalCode($language['code']));
                    $productVariationValueI18nModel->setName($mainI18n);

                    $return[] = $productVariationValueI18nModel;
                }
            }else{
                if($this->getLocalCode($language['code']))
                {
                            if(!empty($value["OXVARSELECT_{$langBaseId}"]))
                            {
                                $variantValues[] = array_map('trim', split('\|', $value["OXVARSELECT"]))[$varPos];
                                
                                die(print_r($variantValues));
                                
                                for ($i = 0; $i < count($variantValues); $i++)
                                {
                                    if($variantValues[$i] == $mainI18n)
                                    {
                                        die(print_r($value));
                                        $variantValueI18n = array_map('trim', split('\|', $value["OXVARSELECT_{$langBaseId}"]))[$varPos];
                                    }
                                }
                            }
                        
                        die(print_r($variantValueI18n));

                        $identity = new IdentityModel;
                        $identity->setEndpoint(md5($variantValueI18ns[$varPos]));
                        $productVariationValueI18nModel->setProductVariationValueId($identity);
                            
                        $productVariationValueI18nModel->setLocaleName($this->getLocalCode($language['code']));
                        $productVariationValueI18nModel->setName($variantValueI18ns[$varPos]);
                            
                        $return[] = $productVariationValueI18nModel;
                    }
                }
            } 
        return $return;
        }
     }