<?php

namespace jtl\Connector\Oxid\Models\Product;

/**
 * class Product
 */
class Product
{

    private $id;
    private $masterProductId;
    private $manufacturerId;
    private $deliveryStatusId;
    private $unitId;
    private $basePriceUnitId;
    private $shippingclassId;
    private $sku;
    private $note;
    private $stockLevel;
    private $vat;
    private $minimumOrderQuantity;
    private $ean;
    private $isTopProduct;
    private $productWeight;
    private $shippingWeight;
    private $isnew;
    private $recommendedRetailPrice;
    private $considerStock;
    private $permitNegativeStock;
    private $considerVariationStock;
    private $isDivisible;
    private $considerBasePrice;
    private $basePriceValue;
    private $keywords;
    private $sort;
    private $created;
    private $availableFrom;
    private $manufacturerNumber;
    private $serialNumber;
    private $isbn;
    private $asin;
    private $unNumber;
    private $hazardIdNumber;
    private $taric;
    private $isMasterProduct;
    private $takeOffQuantity;
    private $setArticleId;
    private $upc;
    private $originCountry;
    private $epid;
    private $productTypeId;
    private $inflowQuantity;
    private $inflowDate;
    private $supplierStockLevel;
    private $supplierDeliveryTime;
    private $bestBefore;


    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //MasterProductId
    public function setMasterProductId($masterProductId)
	{
        $this->masterProductId = $masterProductId;
    }

    public function getMasterProductId()
	{
        return $this->masterProductId;
    }

    //ManufacturerId
    public function setManufacturerId($manufacturerId)
	{
        $this->manufacturerId = $manufacturerId;
    }

    public function getManufacturerId()
	{
        return $this->manufacturerId;
    }

    //DeliveryStatusId
    public function setDeliveryStatusId($deliveryStatusId)
	{
        $this->deliveryStatusId = $deliveryStatusId;
    }

    public function getDeliveryStatusId()
	{
        return $this->deliveryStatusId;
    }

    //UnitId
    public function setUnitId($unitId)
	{
        $this->unitId = $unitId;
    }

    public function getUnitId()
	{
        return $this->unitId;
    }

    //BasePriceUnitId
    public function setBasePriceUnitId($basePriceUnitId)
	{
        $this->basePriceUnitId = $basePriceUnitId;
    }

    public function getBasePriceUnitId()
	{
        return $this->basePriceUnitId;
    }

    //ShippingclassId
    public function setShippingclassId($shippingclassId)
	{
        $this->shippingclassId = $shippingclassId;
    }

    public function getShippingclassId()
	{
        return $this->shippingclassId;
    }

    //Sku
    public function setSku($sku)
	{
        $this->sku = $sku;
    }

    public function getSku()
	{
        return $this->sku;
    }

    //Note
    public function setNote($note)
	{
        $this->note = $note;
    }

    public function getNote()
	{
        return $this->note;
    }

    //StockLevel
    public function setStockLevel($stockLevel)
	{
        $this->stockLevel = $stockLevel;
    }

    public function getStockLevel()
	{
        return $this->stockLevel;
    }

    //Vat
    public function setVat($vat)
	{
        $this->vat = $vat;
    }

    public function getVat()
	{
        return $this->vat;
    }

    //MinimumOrderQuantity
    public function setMinimumOrderQuantity($minimumOrderQuantity)
	{
        $this->minimumOrderQuantity = $minimumOrderQuantity;
    }

    public function getMinimumOrderQuantity()
	{
        return $this->minimumOrderQuantity;
    }

    //Ean
    public function setEan($ean)
	{
        $this->ean = $ean;
    }

    public function getEan()
	{
        return $this->ean;
    }

    //IsTopProduct
    public function setIsTopProduct($isTopProduct)
	{
        $this->isTopProduct = $isTopProduct;
    }

    public function getIsTopProduct()
	{
        return $this->isTopProduct;
    }

    //ProductWeight
    public function setProductWeight($productWeight)
	{
        $this->productWeight = $productWeight;
    }

    public function getProductWeight()
	{
        return $this->productWeight;
    }

    //ShippingWeight
    public function setShippingWeight($shippingWeight)
	{
        $this->shippingWeight = $shippingWeight;
    }

    public function getShippingWeight()
	{
        return $this->shippingWeight;
    }

    //Isnew
    public function setIsnew($isnew)
	{
        $this->isnew = $isnew;
    }

    public function getIsnew()
	{
        return $this->isnew;
    }

    //RecommendedRetailPrice
    public function setRecommendedRetailPrice($recommendedRetailPrice)
	{
        $this->recommendedRetailPrice = $recommendedRetailPrice;
    }

    public function getRecommendedRetailPrice()
	{
        return $this->recommendedRetailPrice;
    }

    //ConsiderStock
    public function setConsiderStock($considerStock)
	{
        $this->considerStock = $considerStock;
    }

    public function getConsiderStock()
	{
        return $this->considerStock;
    }

    //PermitNegativeStock
    public function setPermitNegativeStock($permitNegativeStock)
	{
        $this->permitNegativeStock = $permitNegativeStock;
    }

    public function getPermitNegativeStock()
	{
        return $this->permitNegativeStock;
    }

    //ConsiderVariationStock
    public function setConsiderVariationStock($considerVariationStock)
	{
        $this->considerVariationStock = $considerVariationStock;
    }

    public function getConsiderVariationStock()
	{
        return $this->considerVariationStock;
    }

    //IsDivisible
    public function setIsDivisible($isDivisible)
	{
        $this->isDivisible = $isDivisible;
    }

    public function getIsDivisible()
	{
        return $this->isDivisible;
    }

    //ConsiderBasePrice
    public function setConsiderBasePrice($considerBasePrice)
	{
        $this->considerBasePrice = $considerBasePrice;
    }

    public function getConsiderBasePrice()
	{
        return $this->considerBasePrice;
    }

    //BasePriceValue
    public function setBasePriceValue($basePriceValue)
	{
        $this->basePriceValue = $basePriceValue;
    }

    public function getBasePriceValue()
	{
        return $this->basePriceValue;
    }

    //Keywords
    public function setKeywords($keywords)
	{
        $this->keywords = $keywords;
    }

    public function getKeywords()
	{
        return $this->keywords;
    }

    //Sort
    public function setSort($sort)
	{
        $this->sort = $sort;
    }

    public function getSort()
	{
        return $this->sort;
    }

    //Created
    public function setCreated($created)
	{
        $this->created = $created;
    }

    public function getCreated()
	{
        return $this->created;
    }

    //AvailableFrom
    public function setAvailableFrom($availableFrom)
	{
        $this->availableFrom = $availableFrom;
    }

    public function getAvailableFrom()
	{
        return $this->availableFrom;
    }

    //ManufacturerNumber
    public function setManufacturerNumber($manufacturerNumber)
	{
        $this->manufacturerNumber = $manufacturerNumber;
    }

    public function getManufacturerNumber()
	{
        return $this->manufacturerNumber;
    }

    //SerialNumber
    public function setSerialNumber($serialNumber)
	{
        $this->serialNumber = $serialNumber;
    }

    public function getSerialNumber()
	{
        return $this->serialNumber;
    }

    //Isbn
    public function setIsbn($isbn)
	{
        $this->isbn = $isbn;
    }

    public function getIsbn()
	{
        return $this->isbn;
    }

    //Asin
    public function setAsin($asin)
	{
        $this->asin = $asin;
    }

    public function getAsin()
	{
        return $this->asin;
    }

    //UnNumber
    public function setUnNumber($unNumber)
	{
        $this->unNumber = $unNumber;
    }

    public function getUnNumber()
	{
        return $this->unNumber;
    }

    //HazardIdNumber
    public function setHazardIdNumber($hazardIdNumber)
	{
        $this->hazardIdNumber = $hazardIdNumber;
    }

    public function getHazardIdNumber()
	{
        return $this->hazardIdNumber;
    }

    //Taric
    public function setTaric($taric)
	{
        $this->taric = $taric;
    }

    public function getTaric()
	{
        return $this->taric;
    }

    //IsMasterProduct
    public function setIsMasterProduct($isMasterProduct)
	{
        $this->isMasterProduct = $isMasterProduct;
    }

    public function getIsMasterProduct()
	{
        return $this->isMasterProduct;
    }

    //TakeOffQuantity
    public function setTakeOffQuantity($takeOffQuantity)
	{
        $this->takeOffQuantity = $takeOffQuantity;
    }

    public function getTakeOffQuantity()
	{
        return $this->takeOffQuantity;
    }

    //SetArticleId
    public function setSetArticleId($setArticleId)
	{
        $this->setArticleId = $setArticleId;
    }

    public function getSetArticleId()
	{
        return $this->setArticleId;
    }

    //Upc
    public function setUpc($upc)
	{
        $this->upc = $upc;
    }

    public function getUpc()
	{
        return $this->upc;
    }

    //OriginCountry
    public function setOriginCountry($originCountry)
	{
        $this->originCountry = $originCountry;
    }

    public function getOriginCountry()
	{
        return $this->originCountry;
    }

    //Epid
    public function setEpid($epid)
	{
        $this->epid = $epid;
    }

    public function getEpid()
	{
        return $this->epid;
    }

    //ProductTypeId
    public function setProductTypeId($productTypeId)
	{
        $this->productTypeId = $productTypeId;
    }

    public function getProductTypeId()
	{
        return $this->productTypeId;
    }

    //InflowQuantity
    public function setInflowQuantity($inflowQuantity)
	{
        $this->inflowQuantity = $inflowQuantity;
    }

    public function getInflowQuantity()
	{
        return $this->inflowQuantity;
    }

    //InflowDate
    public function setInflowDate($inflowDate)
	{
        $this->inflowDate = $inflowDate;
    }

    public function getInflowDate()
	{
        return $this->inflowDate;
    }

    //SupplierStockLevel
    public function setSupplierStockLevel($supplierStockLevel)
	{
        $this->supplierStockLevel = $supplierStockLevel;
    }

    public function getSupplierStockLevel()
	{
        return $this->supplierStockLevel;
    }

    //SupplierDeliveryTime
    public function setSupplierDeliveryTime($supplierDeliveryTime)
	{
        $this->supplierDeliveryTime = $supplierDeliveryTime;
    }

    public function getSupplierDeliveryTime()
	{
        return $this->supplierDeliveryTime;
    }

    //BestBefore
    public function setBestBefore($bestBefore)
	{
        $this->bestBefore = $bestBefore;
    }

    public function getBestBefore()
	{
        return $this->bestBefore;
    }
}