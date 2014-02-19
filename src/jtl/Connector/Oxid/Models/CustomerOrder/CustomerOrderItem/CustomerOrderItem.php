<?php

namespace jtl\Connector\Oxid\Models\CustomerOrder\CustomerOrderItem;

class CustomerOrderItem {

    private $id;
    private $productId;
    private $shippingclassId;
    private $customerOrderId;
	private $name;
    private $sku;
    private $price;
    private $vat;
	private $quantity;
    private $type;
    private $unique;
    private $configItemId;
    private $customerOrderItemVariations = array();
	

    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        $this->customeproductId;
    }

    //ShippingclassId
    public function setShippingclassId($shippingclassId) {
        $this->shippingclassId = $shippingclassId;
    }

    public function getShippingclassId() {
        return $this->shippingclassId;
    }

    //CustomerOrderId
    public function setCustomerOrderId($customerOrderId) {
        $this->customerOrderId = $customerOrderId;
    }

    public function getCustomerOrderId() {
        return $this->customerOrderId;
    }

	//Name
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    //Sku
    public function setSku($sku) {
        $this->sku = $sku;
    }

    public function getSku() {
        $this->customesku;
    }

    //Price
    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    //Vat
    public function setVat($vat) {
        $this->vat = $vat;
    }

    public function getVat() {
        return $this->vat;
    }
	
	//Quantity
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    //Type
    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        $this->custometype;
    }

    //Unique
    public function setUnique($unique) {
        $this->unique = $unique;
    }

    public function getUnique() {
        return $this->unique;
    }

    //ConfigItemId
    public function setConfigItemId($configItemId) {
        $this->configItemId = $configItemId;
    }

    public function getConfigItemId() {
        return $this->configItemId;
    }
    
    //CustomerOrderItemVariations
    public function setCustomerOrderItemVariations($customerOrderItemVariations) {
        $this->customerOrderItemVariations = $customerOrderItemVariations;
    }
    
    public function getCustomerOrderItemVariations() {
        return $this->customerOrderItemVariations;
    }
}

