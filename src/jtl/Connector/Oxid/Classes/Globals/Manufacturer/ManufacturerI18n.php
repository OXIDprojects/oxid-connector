<?php

Namespace jtl\Connector\Oxid\Classes\Globals\Manufacturer;

Class ManufacturerI18n {

    private $manufacturerId;
    private $localeName;
    private $description;
    private $metaDescription;
    private $metaKeywords;
    private $titleTag;

    //ManufacturerId
    public function setManufacturerId($manufacturerId) {
        $this->manufacturerId = $manufacturerId;
    }

    public function getManufacturerId() {
        return $this->manufacturerId;
    }

    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }
    
    //Description
    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }
    
    //MetaDescription
    public function setMetaDescription($metaDescription) {
        $this->metaDescription = $metaDescription;
    }
    
    public function getMetaDescription() {
        return $this->metaDescription;
    }
    
    //MetaKeywords
    public function setMetaKeywords($metaKeywords) {
        $this->metaKeywords = $metaKeywords;
    }
    
    public function getMetaKeywords() {
        return $this->metaKeywords;
    }
    
    //TitleTag
    public function setTitleTag($titleTag) {
        $this->titleTag = $titleTag;
    }
    
    public function getTitleTag() {
        return $this->titleTag;
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