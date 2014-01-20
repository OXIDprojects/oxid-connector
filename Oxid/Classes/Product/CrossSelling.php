<?php

Class CrossSelling {

    private $id;
    private $crossSellingProductId;
    private $crossSellingGroupId;
    private $productId;

    // <editor-fold defaultstate="collapsed" desc="Get/Setter">
    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //CrossSellingProductId
    public function setCrossSellingProductId($crossSellingProductId) {
        $this->crossSellingProductId = $crossSellingProductId;
    }

    public function getCrossSellingProductId() {
        return $this->crossSellingProductId;
    }

    //CrossSellingGroupId
    public function setCrossSellingGroupId($crossSellingGroupId) {
        $this->crossSellingGroupId = $crossSellingGroupId;
    }

    public function getCrossSellingGroupId() {
        return $this->crossSellingGroupId;
    }

    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        return $this->productId;
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
