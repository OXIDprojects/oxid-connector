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
use jtl\Connector\Oxid\Mapper\ProductVariationValue as ProductVariationValueMapper;

class ProductVariation extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $productVariationTable = $this->getProductVariation($data);
        
        $VariaionArray = $this->getProdVarArray($productVariationTable, 0);
        
        if (!empty($VariaionArray))
        {
            foreach ($productVariationTable as $value)
            {              
                if ($value['OXVARNAME']) {
                    
                    for ($i = 0; $i < count($VariaionArray); $i++)
                    {
                        $productVariationModel = new ProductVariationModel();
                        $productVariationI18nModel = new ProductVariationI18nModel();
                        $productVariationI18nMapper = new ProductVariationI18nMapper();
                        $productVariationValueModel = new ProductVariationValueModel();
                        $productVariationValueMapper = new ProductVariationValueMapper();
                        
                        $oxId = $value['OXID'] . '_' . array_keys($VariaionArray)[$i];
                        
                        $identity = new IdentityModel;
                        $identity->setEndpoint($oxId);
                        $productVariationModel->setId($identity);
                        
                        $identity = new IdentityModel;
                        $identity->setEndpoint($value['OXID']);
                        $productVariationModel->setProductId($identity);
                        
                        $productVariationModel->setSort(intval($value['OXSORT']));
                        
                        $productVariationI18nModel = $productVariationI18nMapper->pull($oxId, $i, $productVariationTable, 0, null);
                        
                        foreach ($productVariationI18nModel as $I18nModel)
                        {
                            $productVariationModel->addi18n($I18nModel);
                        }
                        
                        $productVariationValueModel = $productVariationValueMapper->pull($oxId, $VariaionArray, array_keys($VariaionArray)[$i], $i, $productVariationTable, 0, null);
                        
                        foreach ($productVariationValueModel as $ValueModel)
                        {
                            $productVariationModel->addValue($ValueModel);
                        }
                        $return[] = $productVariationModel;
                    }
                }
            }
        }
        return $return;
    }
    
    public function getProductVariation($param)
    {   
        $sqlResult = $this->db->query(" SELECT * FROM oxarticles " .
                                      " WHERE OXID = '{$param['OXID']}' " .
                                      " OR    OXPARENTID = '{$param['OXID']}' " .
                                      " ORDER BY OXPARENTID ASC ");
        return $sqlResult;
    }  
}