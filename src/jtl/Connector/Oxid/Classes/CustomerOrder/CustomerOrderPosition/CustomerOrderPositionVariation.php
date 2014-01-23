<?php

Namespace jtl\Connector\Oxid\Classes\CustomerOrder\CustomerOrderPosition;

Class CustomerOrderPositionVariation {

    private $id;
    private $customerOrderPositionId;
    private $productVariationId;
    private $productVariationValueId;
    private $productVariationName;
    private $productVariationValueName;
    private $freeField;
    private $surcharge;


    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //CustomerOrderPositionId
    public function setCustomerOrderPositionId($customerOrderPositionId) {
        $this->customerOrderPositionId = $customerOrderPositionId;
    }

    public function getCustomerOrderPositionId() {
        return $this->customerOrderPositionId;
    }

    //ProductVariationId
    public function setProductVariationId($productVariationId) {
        $this->productVariationId = $productVariationId;
    }

    public function getProductVariationId() {
        return $this->productVariationId;
    }

    //ProductVariationValueId
    public function setProductVariationValueId($productVariationValueId) {
        $this->productVariationValueId = $productVariationValueId;
    }

    public function getProductVariationValueId() {
        return $this->productVariationValueId;
    }

    //ProductVariationName
    public function setProductVariationName($productVariationName) {
        $this->productVariationName = $productVariationName;
    }

    public function getProductVariationName() {
        return $this->productVariationName;
    }

    //ProductVariationValueName
    public function setProductVariationValueName($productVariationValueName) {
        $this->productVariationValueName = $productVariationValueName;
    }

    public function getProductVariationValueName() {
        return $this->productVariationValueName;
    }

    //FreeField
    public function setFreeField($freeField) {
        $this->freeField = $freeField;
    }

    public function getFreeField() {
        return $this->freeField;
    }

    //Surcharge
    public function setSurcharge($surcharge) {
        $this->surcharge = $surcharge;
    }

    public function getSurcharge() {
        return $this->surcharge;
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
