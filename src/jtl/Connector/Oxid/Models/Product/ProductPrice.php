<?php
namespace jtl\Connector\Oxid\Models\Product;

class ProductPrice {

    private $customerGroupId;
    private $productId;
    private $netPrice;
    private $quantity;


    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId) {
        $this->customerGroupId = $customerGroupId;
    }

    public function getCustomerGroupId() {
        return $this->customerGroupId;
    }

    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        return $this->productId;
    }

    //NetPrice
    public function setNetPrice($netPrice) {
        $this->netPrice = $netPrice;
    }

    public function getNetPrice() {
        return $this->netPrice;
    }

    //Quantity
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getQuantity() {
        return $this->quantity;
    } 
}

