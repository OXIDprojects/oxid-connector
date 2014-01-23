<?php

Namespace jtl\Connector\Oxid\Classes\Product\ProductVariationValue;

Class ProductVariationValueI18n {

    private $localeName;
    private $productVariationValueId;
    private $name;


    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }

    //ProductVariationValueId
    public function setProductVariationValueId($productVariationValueId) {
        $this->productVariationValueId = $productVariationValueId;
    }

    public function getProductVariationValueId() {
        return $this->productVariationValueId;
    }

    //Name
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }


    
    
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

}

?>
