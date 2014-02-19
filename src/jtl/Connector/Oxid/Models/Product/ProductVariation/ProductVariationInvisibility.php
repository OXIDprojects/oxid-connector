<?php
namespace jtl\Connector\Oxid\Models\Product\ProductVariation;

class ProductVariationInvisibility {

    private $customerGroupId;
    private $productVariationId;


    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId) {
        $this->customerGroupId = $customerGroupId;
    }

    public function getCustomerGroupId() {
        return $this->customerGroupId;
    }

    //ProductVariationId
    public function setProductVariationId($productVariationId) {
        $this->productVariationId = $productVariationId;
    }

    public function getProductVariationId() {
        return $this->productVariationId;
    }
}


