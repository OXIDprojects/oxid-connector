<?php

namespace jtl\Connector\Oxid\Models\Category;

class CategoryAttrI18n {

    private $localeName;
    private $categoryAttrId;
    private $key;
    private $value;

    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }
    
    //CategoryAttrId
    public function setCategoryAttrId($categoryAttrId) {
        $this->categoryAttrId = $categoryAttrId;
    }

    public function getCategoryAttrId() {
        return $this->categoryAttrId;
    }

    //Key
    public function setKey($key) {
        $this->key = $key;
    }

    public function getKey() {
        return $this->key;
    }

    //Value
    public function setValue($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }
}


