<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Exception\TransactionException;
use jtl\Core\Exception\DatabaseException;

use jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Result\Transaction as TransactionResult;
use jtl\Connector\Transaction\Handler as TransactionHandler;

use jtl\Connector\Oxid\Controller\BaseController;
use jtl\Connector\Oxid\Mapper\Product\ProductFileDownload as ProductFileDownloadMapper;
use jtl\Connector\Oxid\Mapper\Product\Product as ProductMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductI18n as ProductI18nMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductPrice as ProductPriceMapper;
use jtl\Connector\Oxid\Mapper\Product\Product2Category as Product2CategoryMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductVariation as ProductVariationMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductVariationI18n as ProductVariationI18nMapper;
use jtl\Connector\Oxid\Mapper\Product\CrossSelling as CrossSellingMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductWarehouseInfo as ProductWarehouseInfoMapper;
use jtl\Connector\Oxid\Mapper\Product\MediaFile as MediaFileMapper;

class Product extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try
        {
            $container = new ProductContainer();
            
            $productFileDownloadMapper = new ProductFileDownloadMapper();
            $productMapper = new ProductMapper();          
            $productI18nMapper = new ProductI18nMapper();
            $productPriceMapper = new ProductPriceMapper();
            $product2CategoryMapper = new Product2CategoryMapper();
            $productVariationMapper = new ProductVariationMapper();
            $productVariationI18nMapper = new ProductVariationI18nMapper();
            $crossSellingMapper = new CrossSellingMapper();
            $productWarehouseInfoMapper = new ProductWarehouseInfoMapper();
            $mediaFileMapper = new MediaFileMapper();
            
            $productFileDownloadMapper->fetchAll($container, 'product_file_download');
            $productMapper->fetchAll($container, 'product');
            $productI18nMapper->fetchAll($container, 'product_i18n', $productI18nMapper->getProductI18n());
            $productPriceMapper->fetchAll($container, 'product_price');
            $product2CategoryMapper->fetchAll($container, 'product2_category');
            $productVariationMapper->fetchAll($container, 'product_variation', $productVariationMapper->getProductVariation());
            $productVariationI18nMapper->fetchAll($container, 'product_variation_i18n', $productVariationI18nMapper->getProductVariationI18n());
            $crossSellingMapper->fetchAll($container, 'cross_selling');
            $productWarehouseInfoMapper->fetchAll($container, 'product_warehouse_info');
            $mediaFileMapper->fetchAll($container, 'media_file', $mediaFileMapper->getMediaFile());
            
            $result[] = $container->getPublic(array('items'));
			
            $action->setResult($result);
        }
        catch (\Exception $exc)
        {
            $err = new Error();
            $err->setCode($exc->getCode());
            $err->setMessage($exc->getMessage());
            $action->setError($err);
        }
        
        return $action;
        
    }
}

/* non mapped class
 * - ProductSpecialPrice
 * - ProductAttr
 * - ProductAttrI18n
 * - ProductInvisibility
 * - ProductFunctionAttr
 * - ProductVariationInvisibility
 * - ProductVariationValue
 * - ProductVariationValueI18n
 * - ProductVariationValueExtraCharge
 * - ProductVariationValueInvisibility
 * - ProductVariationValueDependency
 * - ProductVarCombination
 * - ProductSpecific
 * - MediaFileAttr
 * - ProductConfigGroup
 */
