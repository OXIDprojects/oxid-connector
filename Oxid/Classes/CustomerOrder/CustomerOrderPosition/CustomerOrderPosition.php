<?php

Namespace jtl\Connector\Oxid\Classes\CustomerOrder\CustomerOrderPosition;

Class CustomerOrderPosition {

    private $id;
    private $customerOrderId;
    private $productId;
    private $shippingClassId;
    private $sku;
    private $price;
    private $vat;
    private $quantity;
    private $type;
    private $unique;
    private $configItemId;

    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //CustomerOrderId
    public function setCustomerOrderId($customerOrderId) {
        $this->customerOrderId = $customerOrderId;
    }

    public function getCustomerOrderId() {
        return $this->customerOrderId;
    }

    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        return $this->productId;
    }

    //ShippingClassId
    public function setShippingClassId($shippingClassId) {
        $this->shippingClassId = $shippingClassId;
    }

    public function getShippingClassId() {
        return $this->shippingClassId;
    }
	
	//Sku
	public function setSku($sku) {
        $this->sku = $sku;
    }

    public function getSku() {
        return $this->sku;
    }
	
	//Price
    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
	
	//Vat
    public function setVat($vat) {
        $this->vat = $vat;
    }

    public function getVat() {
        return $this->vat;
    }
	
	//Quantity
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getQuantity() {
        return $this->quantity;
    }
	
	//Type
    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }
	
	//Unique
    public function setUnique($unique) {
        $this->unique = $unique;
    }

    public function getUnique() {
        return $this->unique;
    }
	
	//ConfigItemId
    public function setConfigItemId($configItemId) {
        $this->configItemId = $configItemId;
    }

    public function getConfigItemId() {
        return $this->configItemId;
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
