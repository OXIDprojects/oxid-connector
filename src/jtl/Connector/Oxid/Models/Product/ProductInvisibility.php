<?php
namespace jtl\Connector\Oxid\Models\Product;

class ProductInvisibility
{

    private $customerGroupId;
    private $productId;


    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId)
	{
        $this->customerGroupId = $customerGroupId;
    }

    public function getCustomerGroupId()
	{
        return $this->customerGroupId;
    }

    //ProductId
    public function setProductId($productId)
	{
        $this->productId = $productId;
    }

    public function getProductId()
	{
        return $this->productId;
    }
}