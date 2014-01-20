<?php

Class ProductWarehouseInfo {

    private $productId;
    private $warehouseId;
    private $stockLevel;
    private $inflowQuantity;
    private $inflowDate;

    // <editor-fold defaultstate="collapsed" desc="Get/Setter">
    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        return $this->productId;
    }

    //WarehouseId
    public function setWarehouseId($warehouseId) {
        $this->warehouseId = $warehouseId;
    }

    public function getWarehouseId() {
        return $this->warehouseId;
    }

    //StockLevel
    public function setStockLevel($stockLevel) {
        $this->stockLevel = $stockLevel;
    }

    public function getStockLevel() {
        return $this->stockLevel;
    }

    //InflowQuantity
    public function setInflowQuantity($inflowQuantity) {
        $this->inflowQuantity = $inflowQuantity;
    }

    public function getInflowQuantity() {
        return $this->inflowQuantity;
    }

    //InflowDate
    public function setInflowDate($inflowDate) {
        $this->inflowDate = $inflowDate;
    }

    public function getInflowDate() {
        return $this->inflowDate;
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
