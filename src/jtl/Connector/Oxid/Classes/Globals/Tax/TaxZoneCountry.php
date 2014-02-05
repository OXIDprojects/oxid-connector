<?php
namespace jtl\Connector\Oxid\Classes\Globals\Tax;

class TaxZoneCountry {
	
    private $id;
    private $taxZoneId;
    private $countryIso;

	//Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //TaxZoneId
    public function setTaxZoneId($taxZoneId) {
        $this->taxZoneId = $taxZoneId;
    }
    
    public function getTaxZoneId() {
        return $this->taxZoneId;
    }

    //CountryIso
    public function setCountryIso($countryIso) {
        $this->countryIso = $countryIso;
    }
    
    public function getCountryIso() {
        return $this->countryIso;
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