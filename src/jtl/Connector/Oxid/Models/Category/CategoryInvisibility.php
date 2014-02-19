<?php

namespace jtl\Connector\Oxid\Models\Category;

class CategoryInvisibility {

    private $customerGroupId;
    private $categoryId;


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
}


