<?php

Namespace jtl\Connector\Oxid\Classes\Globals\Manufacturer;

Class Manufacturer {

    private $id;
    private $name;
    private $www;
    private $sort;
    private $url;

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
    
    //WWW
    public function setWWW($www) {
        $this->www = $www;
    }

    public function getWWW() {
        return $this->www;
    }
    
    //Sort
    public function setSort($sort) {
        $this->sort = $sort;
    }
    
    public function getSort() {
        return $this->sort;
    }
    
    //Url
    public function setUrl($url) {
        $this->url = $url;
    }
    
    public function getUrl() {
        return $this->url;
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