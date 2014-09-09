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
    public function pull($varKey=null, $varPos=null, $data=null, $offset=0, $limit=null)
    {
        $return = [];
        $productVariationValueTable = $this->getProductVariationValue($data);
        $productVariationValueModel = new ProductVariationValueModel;
        $productVariationValueI18nModel = new ProductVariationValueI18nModel;
        $productVariationValueI18nMapper = new ProductVariationValueI18nMapper;
                
        foreach ($productVariationValueTable as $value)
        {   
            if(!empty($value['OXVARSELECT']))
            {
                $variantValues[] = array_map('trim', split('\|', $value['OXVARSELECT']))[$varPos];
            }
        }              
        
        // Removes all double entries 
        $variantValues =  array_values(array_unique($variantValues));
        
        for ($varValPos = 0; $varValPos < count($variantValues); $varValPos++)
            {                
                $identity = new IdentityModel;
                $identity->setEndpoint(md5($variantValues[$varPos]));
                $productVariationValueModel->setId($identity);
                    
                $identity = new IdentityModel;
                $identity->setEndpoint(md5($varKey));
                $productVariationValueModel->setProductVariationId($identity);
                    
                $productVariationValueI18nModel = $productVariationValueI18nMapper->pull($varPos, $varValPos, $variantValues[$varPos], $productVariationValueTable, 0, null);
                    
                //die(print_r($productVariationValueI18nModel));
                
                foreach ($productVariationValueI18nModel as $I18nModel)
                {
                    $productVariationValueModel->addi18n($I18nModel);
                }
                    
                $return[] = $productVariationValueModel;
            }
            return $return;
    }
    
    public function getProductVariationValue($param)
    {   
        // $sqlResult = $this->db->query(" SELECT * FROM oxarticles WHERE oxarticles.OXPARENTID = '{$param['OXID']}' ");
        $sqlResult = $this->db->query(" SELECT * FROM oxarticles WHERE oxarticles.OXPARENTID = '943ed656e21971fb2f1827facbba9bec' ");
                
        return $sqlResult;
    }
}