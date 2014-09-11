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
    public function pull($varValueId=null, $varValueKeyPos=null, $varKey=null, $varKeyPos=null ,$data=null, $offset=0, $limit=null)
    {      
        $return = [];
        $languages = $this->getLanguageIDs();
        
        foreach ($languages as $language)
        {
            $langBaseId = $language['baseId'];
            
            $VariaionArray = $this->getProdVarArray($data, $langBaseId);
            
            $varKey = array_keys($VariaionArray)[$varKeyPos];
            
            if($language['baseId'] == 0)
            {                  
                if($this->getLocalCode($language['code']))
                {   
                    $productVariationValueI18nModel = new ProductVariationValueI18nModel();
                    
                    $identity = new IdentityModel;
                    $identity->setEndpoint($varValueId);
                    $productVariationValueI18nModel->setProductVariationValueId($identity);
                    
                    $productVariationValueI18nModel->setLocaleName($this->getLocalCode($language['code']));
                    $productVariationValueI18nModel->setName($VariaionArray[$varKey][$varValueKeyPos]);
                    
                    $return[] = $productVariationValueI18nModel;
                }
            }else{
                if($this->getLocalCode($language['code']))
                {   
                    $productVariationValueI18nModel = new ProductVariationValueI18nModel();
                    
                    $identity = new IdentityModel;
                    $identity->setEndpoint($varValueId);
                    $productVariationValueI18nModel->setProductVariationValueId($identity);
                    
                    $productVariationValueI18nModel->setLocaleName($this->getLocalCode($language['code']));
                    $productVariationValueI18nModel->setName($VariaionArray[$varKey][$varValueKeyPos]);
                    
                    $return[] = $productVariationValueI18nModel;
                }
            }
        } 
    return $return;
    }
}