<?php
namespace jtl\Connector\Oxid\Models\Product;

class SpecialPrice
{

    private $customerGroupId;
    private $productSpecialPriceId;
    private $priceNet;

    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId)
	{
        $this->customerGroupId = $customerGroupId;
    }

    public function getCustomerGroupId()
	{
        return $this->customerGroupId;
    }

    //ProductSpecialPriceId
    public function setProductSpecialPriceId($productSpecialPriceId)
	{
        $this->productSpecialPriceId = $productSpecialPriceId;
    }

    public function getProductSpecialPriceId()
	{
        return $this->productSpecialPriceId;
    }

    //PriceNet
    public function setPriceNet($priceNet)
	{
        $this->priceNet = $priceNet;
    }

    public function getPriceNet()
	{
        return $this->priceNet;
    }
}