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
        $identity = new IdentityModel;
        $productVariationModel = new ProductVariationModel();       
        
        foreach ($params as $value)
        {
            $identity->setEndpoint($value['OXID']);
            $productVariationModel->setId($identity);
            
            $identity->setEndpoint($value['OXOBJECTID']);
            $productVariationModel->setProductId($identity);
            
            $productVariationModel->setSort($value['OXPOS']);
            
            $container->add('product_variation', $productVariationModel->getPublic(), false);
        }
    }
    
     public function updateAll($container, $trid=null)
     {
        
     }
    
    public function getProductVariation($param)
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query(" SELECT * FROM oxobject2attribute, oxarticles " .
                                       " WHERE oxarticles.OXID = '{$param['OXID']}' " . 
                                       " AND oxobject2attribute.OXOBJECTID = oxarticles.OXID " .
                                       " ORDER BY OXOBJECTID DESC;");
        return $sqlResult;
    }
}

/* non mapped properties
ProductVariation:
 * - _type
 * 
 */