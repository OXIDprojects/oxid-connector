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
    public function pull($varPos=null, $varValPos=null, $mainI18n=null, $data=null, $offset=0, $limit=null)
    {      
        $languages = $this->getLanguageIDs();
        
        //Pro Sprache
        foreach ($languages as $language)
        {
            $langBaseId = $language['baseId'];
            
            if($language['baseId'] == 0)
            {   
                if($this->getLocalCode($language['code']))
                {   
                    $productVariationValueI18nModel = new ProductVariationValueI18nModel();
                    
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
                    foreach ($data as $value)
                    {   
                        if(!empty($value["OXVARSELECT_{$langBaseId}"]))
                        {
                            $variantValueI18ns[] = array_map('trim', split('\|', $value["OXVARSELECT_{$langBaseId}"]))[0];
                        }
                    }           
                        
                    // Removes all double entries 
                    $variantValueI18n =  array_values(array_unique($variantValueI18ns))[$varValPos];
                    
                    $productVariationValueI18nModel = new ProductVariationValueI18nModel();
                    
                    $identity = new IdentityModel;
                    $identity->setEndpoint(md5($mainI18n));
                    $productVariationValueI18nModel->setProductVariationValueId($identity);
                            
                    $productVariationValueI18nModel->setLocaleName($this->getLocalCode($language['code'])); 
                    
                    $productVariationValueI18nModel->setName($variantValueI18n);
                            
                    $return[] = $productVariationValueI18nModel;
                    }
                }
            } 
        return $return;
        }
     }