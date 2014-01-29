<?php

Namespace jtl\Connector\Oxid\Classes\CustomerOrder\CustomerOrderPosition;

Class CustomerOrderPositionVariations {

    private $CustomerOrderPositionVariation = array();
    
    //CustomerOrderPositionVariation
    public function setCustomerOrderPositionVariation($CustomerOrderPositionVariation) {
        $this->CustomerOrderPositionVariation = $CustomerOrderPositionVariation;
    }

    public function getCustomerOrderPositionVariation() {
        return $this->CustomerOrderPositionVariation;
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
