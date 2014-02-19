<?php
namespace jtl\Connector\Oxid\Models\Product\ProductVariationValue;

class ProductVariationValue
{

    private $id;
    private $productVariationId;
    private $extraWeight;
    private $sku;
    private $sort;
    private $stockLevel;

    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //ProductVariationId
    public function setProductVariationId($productVariationId)
	{
        $this->productVariationId = $productVariationId;
    }

    public function getProductVariationId()
	{
        return $this->productVariationId;
    }

    //ExtraWeight
    public function setExtraWeight($extraWeight)
	{
        $this->extraWeight = $extraWeight;
    }

    public function getExtraWeight()
	{
        return $this->extraWeight;
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

    //Sort
    public function setSort($sort)
	{
        $this->sort = $sort;
    }

    public function getSort()
	{
        return $this->sort;
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
}