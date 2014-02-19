<?php
namespace jtl\Connector\Oxid\Models\Product\ProductVariationValue;

class ProductVariationValueExtraCharge {

    private $customerGroupId;
    private $productVariationValueId;
    private $extraChargeNet;


    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId) {
        $this->customerGroupId = $customerGroupId;
    }

    public function getCustomerGroupId() {
        return $this->customerGroupId;
    }

    //ProductVariationValueId
    public function setProductVariationValueId($productVariationValueId) {
        $this->productVariationValueId = $productVariationValueId;
    }

    public function getProductVariationValueId() {
        return $this->productVariationValueId;
    }

    //ExtraChargeNet
    public function setExtraChargeNet($extraChargeNet) {
        $this->extraChargeNet = $extraChargeNet;
    }

    public function getExtraChargeNet() {
        return $this->extraChargeNet;
    }
}


