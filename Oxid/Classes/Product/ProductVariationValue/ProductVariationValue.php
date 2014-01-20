<?php

Class ProductVariationValue {

    private $id;
    private $productVariationId;
    private $extraWeight;
    private $sku;
    private $sort;
    private $stockLevel;
    private $packagingUnitId;

    // <editor-fold defaultstate="collapsed" desc="Get/Setter">
    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //ProductVariationId
    public function setProductVariationId($productVariationId) {
        $this->productVariationId = $productVariationId;
    }

    public function getProductVariationId() {
        return $this->productVariationId;
    }

    //ExtraWeight
    public function setExtraWeight($extraWeight) {
        $this->extraWeight = $extraWeight;
    }

    public function getExtraWeight() {
        return $this->extraWeight;
    }

    //Sku
    public function setSku($sku) {
        $this->sku = $sku;
    }

    public function getSku() {
        return $this->sku;
    }

    //Sort
    public function setSort($sort) {
        $this->sort = $sort;
    }

    public function getSort() {
        return $this->sort;
    }

    //StockLevel
    public function setStockLevel($stockLevel) {
        $this->stockLevel = $stockLevel;
    }

    public function getStockLevel() {
        return $this->stockLevel;
    }

    //PackagingUnitId
    public function setPackagingUnitId($packagingUnitId) {
        $this->packagingUnitId = $packagingUnitId;
    }

    public function getPackagingUnitId() {
        return $this->packagingUnitId;
    }

    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Abfang Funktionen">
    //Undefinierte Methoden aufrufe abfangen
    public function __call($name, $arguments) {
        If (!empty($arguments)) {
            $ausgabe = "Die Methode: " . $name .
                    " mit dem Parameter: " . $arguments .
                    " existiert nicht.";
        } Else {
            $ausgabe = "Die Methode: " . $name .
                    " existiert nicht.";
        }
        echo $ausgabe;
    }

    //Undefinierte Eigenschaft aufrufe abfangen
    public function __get($name) {
        echo "Die Eigenschaft: " . $name . " existiert nicht.";
    }
    
    //Undefinierte Eigenschaft setzten abfangen
    public function __set($name, $wert) {
        echo "Die Eigenschaft: " . $name . " Existiert nicht. Der Wert: " . $wert . "konnte nicht zugeordnet werden.";
    }
    // </editor-fold>
}

?>
