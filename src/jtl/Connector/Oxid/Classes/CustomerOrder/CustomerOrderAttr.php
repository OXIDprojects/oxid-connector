<?php

Namespace jtl\Connector\Oxid\Classes\CustomerOrder;

Class CustomerOrderAttr {

    private $id;
    private $customerOrderId;
    private $key;
    private $value;


    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //CustomerOrderId
    public function setCustomerOrderId($customerOrderId) {
        $this->customerOrderId = $customerOrderId;
    }

    public function getCustomerOrderId() {
        $this->customerOrderId;
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