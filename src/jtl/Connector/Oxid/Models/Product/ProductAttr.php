<?php
namespace jtl\Connector\Oxid\Models\Product;

class ProductAttr {

    private $id;
    private $productId;
    private $sort;


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
        return $this->productId;
    }

    //Sort
    public function setSort($sort) {
        $this->sort = $sort;
    }

    public function getSort() {
        return $this->sort;
    }
}


