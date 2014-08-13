<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductVariation as ProductVariationModel;

class ProductVariation extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $productVariationTable = $this->getProductVariation($data);
        
        foreach ($productVariationTable as $value)
            {              
                $productVariationModel = new ProductVariationModel();
                
                if ($value['OXVARNAME']) {
                    
                    $variantIDs = array_map('trim', split('\|', $value['OXVARNAME']));
                    
                    foreach ($variantIDs as $variantID) {
                        
                        $identity = new IdentityModel;
                        $identity->setEndpoint(md5($variantID));
                        $productVariationModel->setId($identity);
                        
                        $identity = new IdentityModel;
                        $identity->setEndpoint($value['OXID']);
                        $productVariationModel->setProductId($identity);
                        
                        $productVariationModel->setSort(intval($value['OXSORT']));
                        //$productVariationModel->addI18n($value);
                        
                        $return[] = $productVariationModel;
                    }
                }
            }
        return $return;
        
    }
    
    public function getProductVariation($param)
    {   
        $sqlResult = $this->db->query(" SELECT * FROM oxarticles " .
                                " WHERE OXID = '{$param['OXID']}'; ");
        
        return $sqlResult;
    }
}