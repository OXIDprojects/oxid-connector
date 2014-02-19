<?php

namespace jtl\Connector\Oxid\Models\Category;

class CategoryAttr {

    private $id;
    private $categoryId;
    private $sort;
   
    //Id 
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //CategoryId
    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    //Sort
    public function setSort($sort) {
        $this->sort = $sort;
    }

    public function getSort() {
        return $this->sort;
    }
}


