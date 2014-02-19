<?php

namespace jtl\Connector\Oxid\Models\CustomerOrder\CustomerOrderItem;

class CustomerOrderItemVariation {

    private $id;
    private $customerOrderItemId;
    private $productVariationId;
    private $productVariationValueId;
	private $productVariationName;
    private $productVariationValueName;
    private $freeField;
    private $surcharge;

    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //CustomerOrderItemId
    public function setCustomerOrderItemId($customerOrderItemId) {
        $this->customerOrderItemId = $customerOrderItemId;
    }

    public function getCustomerOrderItemId() {
        $this->customecustomerOrderItemId;
    }

    //ProductVariationId
    public function setProductVariationId($productVariationId) {
        $this->productVariationId = $productVariationId;
    }

    public function getProductVariationId() {
        return $this->productVariationId;
    }

    //ProductVariationValueId
    public function setProductVariationValueId($productVariationValueId) {
        $this->productVariationValueId = $productVariationValueId;
    }

    public function getProductVariationValueId() {
        return $this->productVariationValueId;
    }
	
	//ProductVariationName
    public function setProductVariationName($productVariationName) {
        $this->productVariationName = $productVariationName;
    }

    public function getProductVariationName() {
        return $this->productVariationName;
    }

    //ProductVariationValueName
    public function setProductVariationValueName($productVariationValueName) {
        $this->productVariationValueName = $productVariationValueName;
    }

    public function getProductVariationValueName() {
        $this->customeproductVariationValueName;
    }

    //FreeField
    public function setFreeField($freeField) {
        $this->freeField = $freeField;
    }

    public function getFreeField() {
        return $this->freeField;
    }

    //Surcharge
    public function setSurcharge($surcharge) {
        $this->surcharge = $surcharge;
    }

    public function getSurcharge() {
        return $this->surcharge;
    }
}

