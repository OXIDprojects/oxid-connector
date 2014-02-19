<?php
namespace jtl\Connector\Oxid\Models\Product\ProductVariationValue;

class ProductVariationValueDependency {

    private $productVariationValueId;
    private $productVariationValueTargetId;


    //ProductVariationValueId
    public function setProductVariationValueId($productVariationValueId) {
        $this->productVariationValueId = $productVariationValueId;
    }

    public function getProductVariationValueId() {
        return $this->productVariationValueId;
    }

    //ProductVariationValueTargetId
    public function setProductVariationValueTargetId($productVariationValueTargetId) {
        $this->productVariationValueTargetId = $productVariationValueTargetId;
    }

    public function getProductVariationValueTargetId() {
        return $this->productVariationValueTargetId;
    }
}


