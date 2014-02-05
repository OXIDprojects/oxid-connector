<?php
namespace jtl\Connector\Oxid\Classes\Globals;

class Language {

    private $id;
    private $nameEnglish;
    private $nameGerman;
    private $localeName;
    private $isDefault;
	
    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //NameEnglish
    public function setNameEnglish($nameEnglish) {
        $this->nameEnglish = $nameEnglish;
    }
    
    public function getNameEnglish() {
        return $this->nameEnglish;
    }

    //NameGerman
    public function setNameGerman($nameGerman) {
        $this->nameGerman = $nameGerman;
    }
    
    public function getNameGerman() {
        return $this->nameGerman;
    }
    
    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }
    
    public function getLocaleName() {
        return $this->localeName;
    }
    
    //IsDefault
    public function setIsDefault($isDefault) {
        $this->isDefault = $isDefault;
    }
    
    public function getIsDefault() {
        return $this->isDefault;
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