<?php

Namespace jtl\Connector\Oxid\Classes\Specific;

Class Specific {

    private $id;
    private $sort;
    private $global;
    private $name;
    private $type;


    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //Sort
    public function setSort($sort) {
        $this->sort = $sort;
    }

    public function getSort() {
        return $this->sort;
    }

    //Global
    public function setGlobal($global) {
        $this->global = $global;
    }

    public function getGlobal() {
        return $this->global;
    }

    //Name
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
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
