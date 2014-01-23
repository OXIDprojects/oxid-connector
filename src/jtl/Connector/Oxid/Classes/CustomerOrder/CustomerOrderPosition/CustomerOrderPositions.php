<?php
Namespace jtl\Connector\Oxid\Classes\CustomerOrder\CustomerOrderPosition;

//require_once("CustomerOrderPosition.php");

Class CustomerOrderPositions {
    
    private $CustomerOrderPosition = array();
    
    //CustomerOrderPosition
    public function setCustomerOrderPosition($CustomerOrderPosition) {
        $this->CustomerOrderPosition = $CustomerOrderPosition;
    }

    public function getCustomerOrderPosition() {
        return $this->CustomerOrderPosition;
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
