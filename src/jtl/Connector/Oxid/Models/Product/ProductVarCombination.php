<?php
namespace jtl\Connector\Oxid\Models\Product;

class ProductVarCombination
{

	private $productId;
    private $productVariationId;
    private $productVariationValueId;

    //ProductId
    public function setProductId($productId)
	{
        $this->productId = $productId;
    }

    public function getProductId()
	{
        return $this->productId;
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

    //ProductVariationValueId
    public function setProductVariationValueId($productVariationValueId)
	{
        $this->productVariationValueId = $productVariationValueId;
    }

    public function getProductVariationValueId()
	{
        return $this->productVariationValueId;
    }
}