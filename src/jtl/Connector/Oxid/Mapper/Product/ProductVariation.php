<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\ProductContainer;
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
            $productVariationModel->setId($value['OXID']);
            $productVariationModel->setProductId($value['OXOBJECTID']);
            $productVariationModel->setSort($value['OXPOS']);
            
            $container->add('product_variation', $this->editEmptyStringToNull($productVariationModel->getPublic(), false));
        }
    }
    
     public function updateAll($container, $trid=null)
     {
        
     }
    
    public function getProductVariation()
    {
        $oxidConf = new Config();
        
        $sqlResult = $this->_db->query(" SELECT * FROM oxobject2attribute, oxarticles " .
                                       " WHERE oxobject2attribute.OXOBJECTID = oxarticles.OXID " .
                                       " ORDER BY OXOBJECTID DESC;");
        return $sqlResult;
    }
}

/* non mapped properties
ProductVariation:
 * - _type
 * 
 */