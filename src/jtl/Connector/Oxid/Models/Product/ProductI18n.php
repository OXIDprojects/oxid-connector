<?php

namespace jtl\Connector\Oxid\Models\Product;

class ProductI18n {

    private $localeName;
    private $productId;
    private $name;
    private $urlPath;
    private $description;
    private $shortDescription;

    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }

    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        return $this->productId;
    }

    //Name
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    //UrlPath
    public function setUrlPath($urlPath) {
        $this->urlPath = $urlPath;
    }

    public function getUrlPath() {
        return $this->urlPath;
    }

    //Description
    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    //ShortDescription
    public function setShortDescription($shortDescription) {
        $this->shortDescription = $shortDescription;
    }

    public function getShortDescription() {
        return $this->shortDescription;
    }
}


