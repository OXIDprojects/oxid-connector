<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductVariationI18n as ProductVariationI18nModel;

class ProductVariationI18n extends BaseMapper
{
    public function pull($oxId=null, $varKeyPos=null ,$data=null, $offset=0, $limit=null)
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
                    $productVariationI18nModel = new ProductVariationI18nModel();
                                
                    $identity = new IdentityModel;
                    $identity->setEndpoint($oxId . '_' . array_keys($VariaionArray)[$varKeyPos]);
                    $productVariationI18nModel->setProductVariationId($identity);
                                    
                    $productVariationI18nModel->setLocaleName($this->getLocalCode($language['code']));
                    $productVariationI18nModel->setName(array_keys($VariaionArray)[$varKeyPos]);
                    
                    $return[] = $productVariationI18nModel;
                }
            }else{
                if($this->getLocalCode($language['code']))
                {           
                    $productVariationI18nModel = new ProductVariationI18nModel();
                                
                    $identity = new IdentityModel;
                    $identity->setEndpoint($oxId . '_' . $varKey);
                    $productVariationI18nModel->setProductVariationId($identity);
                                
                    $productVariationI18nModel->setLocaleName($this->getLocalCode($language['code']));
                    $productVariationI18nModel->setName(array_keys($VariaionArray)[$varKeyPos]);
                    
                    $return[] = $productVariationI18nModel;
                }
            }
        }
        return $return;
    } 
}