<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductVariation as ProductVariationModel;
use jtl\Connector\Model\ProductVariationI18n as ProductVariationI18nModel;
use jtl\Connector\Model\ProductVariationValue as ProductVariationValueModel;
use jtl\Connector\Oxid\Mapper\ProductVariationI18n as ProductVariationI18nMapper;

class ProductVariation extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $productVariationTable = $this->getProductVariation($data);
        
        foreach ($productVariationTable as $value)
            {              
                if ($value['OXVARNAME']) {
                    
                    $variantIDs = array_map('trim', split('\|', $value['OXVARNAME']));
                    
                    for ($i = 0; $i < count($variantIDs); $i++)
                    {
                        $productVariationModel = new ProductVariationModel();
                        $productVariationI18nModel = new ProductVariationI18nModel();
                        $productVariationValueModel = new ProductVariationValueModel();
                        
                        $productVariationI18nMapper = new ProductVariationI18nMapper();
                        $productVariationValueMapper = new ProductVariationValueMapper();
                                                
                        $identity = new IdentityModel;
                        $identity->setEndpoint(md5($variantIDs[$i]));
                        $productVariationModel->setId($identity);
                        
                        $identity = new IdentityModel;
                        $identity->setEndpoint($value['OXID']);
                        $productVariationModel->setProductId($identity);
                        
                        $productVariationModel->setSort(intval($value['OXSORT']));
                        
                        $productVariationI18nModel = $productVariationI18nMapper->pull($i, $value, 0, null);
                        
                        foreach ($productVariationI18nModel as $I18nModel)
                        {
                            $productVariationModel->addi18n($I18nModel);
                        }
                        
                        $productVariationValueModel = $productVariationValueMapper->pull($i, $value, 0, null);
                        
                        foreach ($productVariationI18nModel as $ValueModel)
                        {
                            $productVariationModel->addValue($ValueModel);
                        }
                        
                        $return[] = $productVariationModel;
                    }
                }
            }
        return $return;
        
    }
    
    public function getProductVariation($param)
    {   
        //$sqlResult = $this->db->query(" SELECT * FROM oxarticles " .
        //                              " WHERE OXID = '{$param['OXID']}' ");
        
        $sqlResult = $this->db->query(" SELECT * FROM oxarticles " .
                                      " WHERE OXID = '531f91d4ab8bfb24c4d04e473d246d0b' ");
        
        return $sqlResult;
    }
}