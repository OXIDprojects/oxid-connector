<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductVariationValueI18n as ProductVariationValueI18nModel;

class ProductVariationValueI18n extends BaseMapper
{   
    public function pull($varValueId=null, $varValueKeyPos=null, $varKey=null, $varKeyPos=null ,$data=null, $offset=0, $limit=null)
    {      
        $return = [];
        $languages = $this->getLanguageIDs();
        
        foreach ($languages as $language)
        {   
            $productVariationValueI18nModel = new ProductVariationValueI18nModel();
            
            $VariaionArray = $this->getProdVarArray($data, $language['baseId']);
            
            $varKey = array_keys($VariaionArray)[$varKeyPos];
            
            If(!empty($VariaionArray[$varKey][$varValueKeyPos]))
            {   
                if($this->getLocalCode($language['code']))
                {
                    if($language['baseId'] == 0)
                    {                  
                        $identity = new IdentityModel;
                        $identity->setEndpoint($varValueId);
                        $productVariationValueI18nModel->setProductVariationValueId($identity);
                        
                        $productVariationValueI18nModel->setLocaleName($this->getLocalCode($language['code']));
                        $productVariationValueI18nModel->setName($VariaionArray[$varKey][$varValueKeyPos]);
                    }else{  
                        
                        $identity = new IdentityModel;
                        $identity->setEndpoint($varValueId);
                        $productVariationValueI18nModel->setProductVariationValueId($identity);
                        
                        $productVariationValueI18nModel->setLocaleName($this->getLocalCode($language['code']));
                        
                        $productVariationValueI18nModel->setName($VariaionArray[$varKey][$varValueKeyPos]);
                    }    
                }
                $return[] = $productVariationValueI18nModel;
            }
            
        } 
    return $return;
    }
}