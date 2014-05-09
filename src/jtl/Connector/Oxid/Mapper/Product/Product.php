<?php
namespace jtl\Connector\Oxid\Mapper\Product;


use jtl\Connector\ModelContainer\ProductContainer;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;

use jtl\Connector\Oxid\Mapper\Product\Product as ProductMapper;
use jtl\Connector\Oxid\Mapper\Product\MediaFile as MediaFileMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductI18n as ProductI18nMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductPrice as ProductPriceMapper;
use jtl\Connector\Oxid\Mapper\Product\CrossSelling as CrossSellingMapper;
use jtl\Connector\Oxid\Mapper\Product\Product2Category as Product2CategoryMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductVariation as ProductVariationMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductFileDownload as ProductFileDownloadMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductVariationI18n as ProductVariationI18nMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductWarehouseInfo as ProductWarehouseInfoMapper;

/**
 * Summary of Product
 */
class Product extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Product",
            "table" => "oxarticles",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "_id" => "OXID",
                    "_masterProductId" => "OXPARENTID",
                    "_manufacturerId" => "OXMANUFACTURERID",
                    "_unitId" => "OXUNITNAME",
                    "_basePriceUnitId" => null,
                    "_sku" => "OXARTNUM",
                    "_stockLevel" => "OXSTOCK",
                    "_vat" => null,
                    "_minimumOrderQuantity" => "OXUNITQUANTITY",
                    "_ean" => "OXEAN",
                    "_productWeight" => "OXWEIGHT",
                    "_recommendedRetailPrice" => "OXTPRICE",
                    "_keywords" => "OXSEARCHKEYS",
                    "_sort" => "OXSORT",
                    "_created" => "OXINSERT",
                    "_availableFrom" => null,
                    "_manufacturerNumber" => "OXMPN",
                    "_isMasterProduct" => null,
                ),
               "mapPush" => array(
                    "OXID" => "_id",
                    "OXPARENTID" => "_masterProductId",
                    "OXMANUFACTURERID" => "_manufacturerId",
                    "OXUNITNAME" => "_unitId",
                    "OXARTNUM" => "_sku",
                    "OXSTOCK" => "_stockLevel",
                    "OXUNITQUANTITY" => "_minimumOrderQuantity",
                    "OXEAN" => "_ean",
                    "OXWEIGHT" => "_productWeight",
                    "OXTPRICE" => "_recommendedRetailPrice",
                    "OXSEARCHKEYS" => "_keywords",
                    "OXSORT" => "_sort",
                    "OXINSERT" => "_created",
                    "OXACTIVEFROM" => "_availableFrom",
                    "OXMPN" => "_manufacturerNumber"
               )
        );
       
    public function fetchAll($container=null,$type=null,$params=array()) {
        $result = [];
        
        $dbResult = $this->_db->query("SELECT * FROM oxarticles WHERE OXPARENTID = '' ORDER BY OXPARENTID ASC LIMIT {$params['offset']},{$params['limit']};");
        
        foreach($dbResult as $data) {
    	    $container = new ProductContainer();
    		
    		$model = $this->generate($data);
    		
    		$container->add('product', $model->getPublic(),false);
    		          
            //add mediaFile
            $mediaFileMapper = new MediaFileMapper();
            $mediaFileMapper->fetchAll($container,'media_file', $mediaFileMapper->getMediaFile(array('OXID' => $model->_id)));
            
            //add i18n
            $productI18nMapper = new ProductI18nMapper();
            $productI18nMapper->fetchAll($container,'product_i18n', $productI18nMapper->getProductI18n(array('OXID' => $model->_id)));
            
            //add price
            $productPriceMapper = new ProductPriceMapper();
            $productPriceMapper->fetchAll($container,'product_price', array('data' => $data));
            
            //add crossSelling
            $crossSellingMapper = new CrossSellingMapper();
            $crossSellingMapper->fetchAll($container,'cross_selling', array('data' => $data));
            
            //add product2Category
            $product2CategoryMapper = new Product2CategoryMapper();
            $product2CategoryMapper->fetchAll($container,'product2_category', array('query' => "SELECT * FROM oxobject2category WHERE OXOBJECTID = '{$data['OXID']}' ORDER BY OXCATNID ASC;"));
            
            //add variation
            //$productVariationMapper = new ProductVariationMapper();
            //$productVariationMapper->fetchAll($container,'product_variation', $productVariationMapper->getProductVariation(array('OXID' => $model->_id)));
            
            //add fileDownload
            $productFileDownloadMapper = new ProductFileDownloadMapper();
            $productFileDownloadMapper->fetchAll($container,'product_file_download', array('data' => $data));
            
            //add variationI18n
            //$productVariationI18nMapper = new ProductVariationI18nMapper();
            //$productVariationI18nMapper->fetchAll($container,'product_variation_i18n', $productVariationI18nMapper->getProductVariationI18n(array('OXID' => $model->_id)));
            
            //add warehouseInfo
            $productWarehouseInfoMapper = new ProductWarehouseInfoMapper();
            $productWarehouseInfoMapper->fetchAll($container,'product_warehouse_info', array('data' => $data));
            
            $result[] = $container->getPublic(array('items'));
    	} 
        return $result;
    }
    
    public function fetchCount() {	    	
	    $objs = $this->_db->query("SELECT count(*) as count FROM oxarticles WHERE OXPARENTID = '' LIMIT 1", array("return" => "object"));
        
        if ($objs !== null) {
	        return intval($objs[0]->count);
	    }
        
	    return 0;
	}
    
    public function _created($data)
    {
        return $this->stringToDateTime($data['OXINSERT']);
    }
    
    public function _availableFrom($data)
    {
        return $this->stringToDateTime($data['OXACTIVEFROM']);
    }
    
    public function _isMasterProduct($data)
    {            
            $oxidConf = new Config();
            
            $sqlResult = $this->_db->query("SELECT Count(OXPARENTID) AS ParentCount FROM oxid_michele.oxarticles
                                            WHERE OXPARENTID = '{$data['OXID']}';");
            
            if(($sqlResult[0]['ParentCount'] != 0))
            {
                return true;
            }            
        return false;
    }   
    
    public function _vat($data)
    {
        if($data['OXVAT'])
        {
            return $data['OXVAT'];
        }else{
            return $this->getDefaultVAT('dDefaultVAT');
        }
    }
}

/* non mapped properties
Product:
_deliveryStatusId
_shippingClassId
_note
_isTopProduct
_shippingWeight
_isNew
_considerStock
_permitNegativeStock
_considerVariationStock
_isDivisible
_considerBasePrice
_serialNumber
_isbn
_asin
_unNumber
_hazardIdNumber
_taric
_takeOffQuantity
_setArticleId
_upc
_originCountry
_epid
_basePriceUnitId
_basePriceDivisor
_productTypeId
_inflowQuantity
_inflowDate
_bestBefore
_supplierStockLevel
_supplierDeliveryTime
*/