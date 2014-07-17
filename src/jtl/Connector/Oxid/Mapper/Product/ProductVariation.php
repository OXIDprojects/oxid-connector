<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\ProductVariation as ProductVariationModel;


/**
 * Summary of ProductVariation
 */
class ProductVariation extends BaseMapper
{
    public function fetchAll($container = null, $type = null, $params = array())
    {
        $productVariationModel = new ProductVariationModel();       
        
            foreach ($params as $value)
            {              
                if ($value['OXVARNAME']) {
                
                    $variantIDs = split("\|", $value['OXVARNAME']);
                    
                    die(print_r($variantIDs));
                    
                    foreach ($variantIDs as $variantID) {
                        
                        $identity = new IdentityModel;
                        $identity->setEndpoint($variantID);
                        $productVariationModel->setId($identity);
                        
                        $identity = new IdentityModel;
                        $identity->setEndpoint($value['OXOBJECTID']);
                        $productVariationModel->setProductId($identity);
                    }
                    
                    $productVariationModel->setSort($value['OXPOS']);
                
                    die(print_r($productVariationModel));
                    
                    $container->add('product_variation', $productVariationModel->getPublic(), false);
                }
            }
        
    }
    
    public function getProductVariation($param)
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query(" SELECT * FROM oxarticles " .
                               " WHERE OXID = '943ed656e21971fb2f1827facbba9bec' OR OXPARENTID = '943ed656e21971fb2f1827facbba9bec' " .
                               " ORDER BY OXPARENTID");
        
        //$sqlResult = $this->_db->query(" SELECT * FROM oxarticles " .
        //                               " WHERE OXID = '{$param['OXID']}' " .
        //                               " OR OXID = (SELECT OXPARENTID FROM oxarticles WHERE OXID = '{$param['OXID']}') " .
        //                               " ORDER BY OXPARENTID");
        return $sqlResult;
    }
}

/* non mapped properties
ProductVariation:
 * - _type
 * 
 */