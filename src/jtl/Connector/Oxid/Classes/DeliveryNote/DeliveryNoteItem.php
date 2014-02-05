<?php

Namespace jtl\Connector\Oxid\Classes\DeliveryNote;

Class DeliveryNoteItem {

    private $id;
    private $deliveryNoteId;
    private $orderPositionId;
    private $quantity;
    private $warehouseId;
    private $serialNumber;
	private $batchNumber;
	private $bestBefore;

    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //DeliveryNoteId
    public function setDeliveryNoteId($deliveryNoteId) {
        $this->deliveryNoteId = $deliveryNoteId;
    }

    public function getDeliveryNoteId() {
        return $this->deliveryNoteId;
    }
    
    //OrderPositionId
    public function setOrderPositionId($orderPositionId) {
        $this->orderPositionId = $orderPositionId;
    }

    public function getOrderPositionId() {
        return $this->orderPositionId;
    }
    
    //Quantity
    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    
    public function getQuantity() {
        return $this->quantity;
    }
    
    //WarehouseId
    public function setWarehouseId($warehouseId) {
        $this->warehouseId = $warehouseId;
    }
    
    public function getWarehouseId() {
        return $this->warehouseId;
    }
    
    //SerialNumber
    public function setSerialNumber($serialNumber) {
        $this->serialNumber = $serialNumber;
    }
    
    public function getSerialNumber() {
        return $this->serialNumber;
    }
	
	//BatchNumber
    public function setBatchNumber($batchNumber) {
        $this->batchNumber = $batchNumber;
    }
    
    public function getBatchNumber() {
        return $this->batchNumber;
    }
	
	//BestBefore
    public function setBestBefore($bestBefore) {
        $this->bestBefore = $bestBefore;
    }
    
    public function getBestBefore() {
        return $this->bestBefore;
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