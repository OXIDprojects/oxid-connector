<?php
namespace jtl\Connector\Oxid\Classes\Globals;

class Currency {
    
    private $id;
    private $name;
    private $iso;
    private $nameHtml;
    private $factor;
    private $isDefault;
    private $hasCurrencySignBeforeValue;
    private $delimiterCent;
    private $delimiterThousand;
    
    
    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //Name
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }

    //ISO
    public function setISO($iso) {
        $this->iso = $iso;
    }
    
    public function getISO() {
        return $this->iso;
    }
    
    //NameHtml
    public function setNameHtml($nameHtml) {
        $this->nameHtml = $nameHtml;
    }
    
    public function getNameHtml() {
        return $this->nameHtml;
    }
    
    //Factor
    public function setFactor($factor) {
        $this->factor = $factor;
    }
    
    public function getFactor() {
        return $this->factor;
    }
    
    //IsDefault
    public function setIsDefault($isDefault) {
        $this->isDefault = $isDefault;
    }
    
    public function getIsDefault() {
        return $this->isDefault;
    }
    
    //HasCurrencySignBeforeValue
    public function setHasCurrencySignBeforeValue($hasCurrencySignBeforeValue) {
        $this->hasCurrencySignBeforeValue = $hasCurrencySignBeforeValue;
    }
    
    public function getHasCurrencySignBeforeValue() {
        return $this->hasCurrencySignBeforeValue;
    }
    
    //DelimiterCent
    public function setDelimiterCent($delimiterCent) {
        $this->delimiterCent = $delimiterCent;
    }
    
    public function getDelimiterCent() {
        return $this->delimiterCent;
    }
	
	//DelimiterThousand
    public function setDelimiterThousand($delimiterThousand) {
        $this->delimiterThousand = $delimiterThousand;
    }
    
    public function getDelimiterThousand() {
        return $this->delimiterThousand;
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