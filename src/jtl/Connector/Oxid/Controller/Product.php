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


class Product extends BaseController {
    
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
