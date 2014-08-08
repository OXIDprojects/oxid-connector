<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductVariationValue as ProductVariationValueModel;


/**
 * Summary of ProductVariationValue
 */
class ProductVariationValue extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $productVariationValueModel = new ProductVariationValueModel();
        
        // Array bauen
        foreach ($params as $value)
        {   
            $productVariationValuese[] = $value['OXVARSELECT'];
            $productVariations[] = $value['OXVARNAME'];
            
            //die(print_r($value['OXVARNAME']));
        }
        
        foreach ($productVariationValuese as $productVariationValues)
        {
            $variantValues = array_map('trim', split('\|', $productVariationValues));
            $countVariantValues = count($variantValues);
            
            die(print_r($productVariations));
            
            for ($i = 0; $i < $countVariantValues; $i++)
            {
                $variantValueID[$i][] = $variantValues[$i];
            }
        }
        
        // Removes all double entries
        for ($i = 0; $i < count($variantValueID); $i++)
        {    
            $variantValueIDs[] = array_unique($variantValueID[$i]);
        }
        
        foreach ($variantValueIDs as $variantValueID)
        {
            foreach ($variantValueID as $value)
            {
                die(print_r($variantValueID));  
            }
        }
        
        // ##### Bearbeiten ##### //
        if(!empty($value['OXVARSELECT']))
        {
            $variantIDs = array_map('trim', split('\|', $value['OXVARNAME']));
            $variantValues = array_map('trim', split('\|', $value['OXVARSELECT']));
                                
            for ($i = 0; $i < count($variantIDs); $i++)
            {
                $identity = new IdentityModel;
                $identity->setEndpoint(md5($variantValues[$i]));
                $productVariationValueModel->setId($identity);
                    
                $identity = new IdentityModel;
                $identity->setEndpoint(md5($variantIDs[$i]));
                $productVariationValueModel->setProductVariationId($identity);
                    
                $productVariationValueModel->set($variantValue);
                                    
                $container->add('product_variation_Value', $productVariationValueModel->getPublic(), false);
            }
        }
    }
    
    public function getProductVariationValue($param)
    {   
        // $sqlResult = $this->_db->query(" SELECT * FROM oxarticles WHERE oxarticles.OXPARENTID = '{$param['OXID']}' ");
        $sqlResult = $this->_db->query(" SELECT * FROM oxarticles WHERE oxarticles.OXPARENTID = '943ed656e21971fb2f1827facbba9bec' ");       
        
        return $sqlResult;
    }
}

/* non mapped properties
ProductVariationValue:
 * _key
 */