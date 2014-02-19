<?php

namespace jtl\Connector\Oxid\Models\Category;

class CategoryCustomerGroup {

    private $customerGroupId;
    private $categoryId;
    private $discount;

   
    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId) {
        $this->customerGroupId = $customerGroupId;
    }

    public function getCustomerGroupId() {
        return $this->customerGroupId;
    }

    //CategoryId
    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    //Discount
    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    public function getDiscount() {
        return $this->discount;
    }
}


