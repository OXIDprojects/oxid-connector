<?php

Namespace jtl\Connector\Oxid\Classes\Product;

Class SpecialPrice {

    private $customerGroupId;
    private $productSpecialPriceId;
    private $priceNet;


    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId) {
        $this->customerGroupId = $customerGroupId;
    }

    public function getCustomerGroupId() {
        return $this->customerGroupId;
    }

    //ProductSpecialPriceId
    public function setProductSpecialPriceId($productSpecialPriceId) {
        $this->productSpecialPriceId = $productSpecialPriceId;
    }

    public function getProductSpecialPriceId() {
        return $this->productSpecialPriceId;
    }

    //PriceNet
    public function setPriceNet($priceNet) {
        $this->priceNet = $priceNet;
    }

    public function getPriceNet() {
        return $this->priceNet;
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
