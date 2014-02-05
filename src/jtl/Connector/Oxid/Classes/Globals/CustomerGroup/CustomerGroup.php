<?php
Namespace jtl\Connector\Oxid\Classes\Globals\CustomerGroup;

class CustomerGroup {
	
	private $id;
    private $discount;
    private $isDefault;
    private $applyNetPrice;
	
	
	 //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //Discount
    public function setDiscount($discount) {
        $this->discount = $discount;
    }
    
    public function getDiscount() {
        return $this->discount;
    } 
	
	//IsDefault
    public function setIsDefault($isDefault) {
        $this->isDefault = $isDefault;
    }

    public function getIsDefault() {
        return $this->isDefault;
    }

    //ApplyNetPrice
    public function setApplyNetPrice($applyNetPrice) {
        $this->applyNetPrice = $applyNetPrice;
    }
    
    public function getApplyNetPrice() {
        return $this->applyNetPrice;
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