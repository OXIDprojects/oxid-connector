<?php

Namespace jtl\Connector\Oxid\Classes\Product;

Class setArticle {

    private $id;
    private $productId;
    private $quantity;


    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        return $this->productId;
    }

    //Quantity
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getQuantity() {
        return $this->quantity;
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
