<?php

Namespace jtl\Connector\Oxid\Classes\DeliveryNote;

Class Shipment {

    private $id;
    private $deliveryNoteId;
    private $logistic;
    private $logisticURL;
    private $identCode;
    private $created;
	private $shippingWeight;
	private $fulfillmentCenter;
	private $arrivalDate;
	private $shipmentDate;
	private $note;

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
    
    //Logistic
    public function setLogistic($logistic) {
        $this->logistic = $logistic;
    }

    public function getLogistic() {
        return $this->logistic;
    }
    
    //LogisticURL
    public function setLogisticURL($logisticURL) {
        $this->logisticURL = $logisticURL;
    }
    
    public function getLogisticURL() {
        return $this->logisticURL;
    }
    
    //IdentCode
    public function setIdentCode($identCode) {
        $this->identCode = $identCode;
    }
    
    public function getIdentCode() {
        return $this->identCode;
    }
    
    //Created
    public function setCreated($created) {
        $this->created = $created;
    }
    
    public function getCreated() {
        return $this->created;
    }
	
	//ShippingWeight
    public function setShippingWeight($shippingWeight) {
        $this->shippingWeight = $shippingWeight;
    }

    public function getshippingWeight() {
        return $this->shippingWeight;
    }
	
	//FulfillmentCenter
    public function setFulfillmentCenter($fulfillmentCenter) {
        $this->fulfillmentCenter = $fulfillmentCenter;
    }

    public function getFulfillmentCenter() {
        return $this->fulfillmentCenter;
    }
	
	//ArrivalDate
    public function setArrivalDate($arrivalDate) {
        $this->arrivalDate = $arrivalDate;
    }

    public function getArrivalDate() {
        return $this->arrivalDate;
    }
	
	//ShipmentDate
    public function setShipmentDate($shipmentDate) {
        $this->shipmentDate = $shipmentDate;
    }

    public function getShipmentDate() {
        return $this->shipmentDate;
    }
	
	//Note
    public function setNote($note) {
        $this->note = $note;
    }

    public function getNote() {
        return $this->note;
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