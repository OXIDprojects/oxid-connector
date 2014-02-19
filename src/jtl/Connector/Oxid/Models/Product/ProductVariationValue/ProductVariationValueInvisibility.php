<?php
namespace jtl\Connector\Oxid\Models\Product\ProductVariationValue;

class ProductVariationValueInvisibility
{

    private $customerGroupId;
    private $productVariationValueId;


    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId)
	{
        $this->customerGroupId = $customerGroupId;
    }

    public function getCustomerGroupId()
	{
        return $this->customerGroupId;
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