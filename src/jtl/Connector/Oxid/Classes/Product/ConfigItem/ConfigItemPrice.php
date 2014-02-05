<?php
Namespace jtl\Connector\Oxid\Classes\Product\ConfigGroup;

Class ConfigItemPrice {
    
	private $configItemId;
    private $customerGroupId;
    private $price;
	private $type;
	
	//ConfigItemId
    public function setConfigItemId($configItemId) {
        $this->configItemId = $configItemId;
    }

    public function getConfigItemId() {
        return $this->configItemId;
    }

    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId) {
        $this->customerGroupId = $customerGroupId;
    }
    
    public function getCustomerGroupId() {
        return $this->customerGroupId;
    }
	
	//Price
    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getPrice() {
        return $this->price;
    }
	
	//Type
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getType() {
        return $this->type;
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