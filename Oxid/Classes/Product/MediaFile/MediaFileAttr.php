<?php

Class MediaFileAttr {

    private $mediaFileAttr;
    private $mediaFileId;
    private $localeName;
    private $name;
    private $value;

    // <editor-fold defaultstate="collapsed" desc="Get/Setter">
    //MediaFileAttr
    public function setMediaFileAttr($mediaFileAttr) {
        $this->mediaFileAttr = $mediaFileAttr;
    }

    public function getMediaFileAttr() {
        return $this->mediaFileAttr;
    }

    //MediaFileId
    public function setMediaFileId($mediaFileId) {
        $this->mediaFileId = $mediaFileId;
    }

    public function getMediaFileId() {
        return $this->mediaFileId;
    }

    //LocaleName
    public function setLocaleName($localeName) {
        $this->$localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }

    //Name
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    //Value
    public function setValue($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }

    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Abfang Funktionen">
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
    // </editor-fold>
}

?>
