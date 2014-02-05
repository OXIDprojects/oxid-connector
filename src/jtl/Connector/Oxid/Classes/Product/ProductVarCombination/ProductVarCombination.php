<?php
Namespace jtl\Connector\Oxid\Classes\Product\ProductVarCombination;

Class ProductVarCombination {
	
	private $product_id;
    private $productVariation_id;
    private $productVariationValue_id;
   
    //Product_id
    public function setProduct_id($product_id) {
        $this->product_id = $product_id;
    }

    public function getProduct_id() {
        return $this->product_id;
    }

    //ProductVariation_id
    public function setProductVariation_id($productVariation_id) {
        $this->productVariation_id = $productVariation_id;
    }
    
    public function getProductVariation_id() {
        return $this->productVariation_id;
    }

    //ProductVariationValue_id
    public function setProductVariationValue_id($productVariationValue_id) {
        $this->productVariationValue_id = $productVariationValue_id;
    }
    
    public function getProductVariationValue_id() {
        return $this->productVariationValue_id;
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