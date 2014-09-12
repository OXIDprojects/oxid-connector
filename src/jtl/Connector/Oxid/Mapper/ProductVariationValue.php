<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductVariationValue as ProductVariationValueModel;
use jtl\Connector\Model\ProductVariationValueI18n as ProductVariationValueI18nModel;
use jtl\Connector\Oxid\Mapper\ProductVariationValueI18n as ProductVariationValueI18nMapper;

/**
 * Summary of ProductVariationValue
 */
class ProductVariationValue extends BaseMapper
{
    public function pull($oxId=null, $varArr=null ,$varKey=null, $varKeyPos=null, $data=null, $offset=0, $limit=null)
    {
        $return = [];

        foreach ($varArr[$varKey] as $varValueKey)
        {
            $productVariationValueModel = new ProductVariationValueModel;
            $productVariationValueI18nModel = new ProductVariationValueI18nModel;
            $productVariationValueI18nMapper = new ProductVariationValueI18nMapper;
            
            $varValueKeyPos = array_search($varValueKey, $varArr[$varKey]);
            
            $identity = new IdentityModel;
            $identity->setEndpoint($varValueKey);
            $productVariationValueModel->setId($identity);
 
            $identity = new IdentityModel;
            $identity->setEndpoint($oxId);
            $productVariationValueModel->setProductVariationId($identity);
            
            $productVariationValueI18nModel = $productVariationValueI18nMapper->pull($varValueKey, $varValueKeyPos, $varKey, $varKeyPos, $data, 0, null);
                
            foreach ($productVariationValueI18nModel as $I18nModel)
            {
                $productVariationValueModel->addi18n($I18nModel);
            }
                
            $return[] = $productVariationValueModel;
        }    
        return $return;
    }
}