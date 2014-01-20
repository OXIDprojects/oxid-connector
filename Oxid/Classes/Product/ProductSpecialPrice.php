<?php

class ProductSpecialPrice {

    private $id;
    private $productId;
    private $isActive;
    private $activeFrom;
    private $activeUntil;
    private $quantityLimit;
    private $considerQuantityLimit;
    private $considerDateLimit;

    // <editor-fold defaultstate="collapsed" desc="Get/Setter">
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

    //IsActive
    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    //ActiveFrom
    public function setActiveFrom($activeFrom) {
        $this->activeFrom = $activeFrom;
    }

    public function getActiveFrom() {
        return $this->activeFrom;
    }

    //ActiveUntil
    public function setActiveUntil($activeUntil) {
        $this->activeUntil = $activeUntil;
    }

    public function getActiveUntil() {
        return $this->activeUntil;
    }

    //QuantityLimit
    public function setQuantityLimit($quantityLimit) {
        $this->quantityLimit = $quantityLimit;
    }

    public function getQuantityLimit() {
        return $this->quantityLimit;
    }

    //ConsiderQuantityLimit
    public function setConsiderQuantityLimit($considerQuantityLimit) {
        $this->considerQuantityLimit = $considerQuantityLimit;
    }

    public function getConsiderQuantityLimit() {
        return $this->considerQuantityLimit;
    }

    //ConsiderDateLimit
    public function setConsiderDateLimit($considerDateLimit) {
        $this->considerDateLimit = $considerDateLimit;
    }

    public function getConsiderDateLimit() {
        return $this->considerDateLimit;
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
