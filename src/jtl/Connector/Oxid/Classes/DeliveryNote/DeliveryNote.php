<?php

Namespace jtl\Connector\Oxid\Classes\DeliveryNote;

Class DeliveryNote {

    private $id;
    private $customerOrderId;
    private $note;
    private $created;
    private $isFulfillment;
    private $status;

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
    
    //Note
    public function setNote($note) {
        $this->note = $note;
    }

    public function getNote() {
        return $this->note;
    }
    
    //Created
    public function setCreated($created) {
        $this->created = $created;
    }
    
    public function getCreated() {
        return $this->created;
    }
    
    //IsFulfillment
    public function setIsFulfillment($isFulfillment) {
        $this->isFulfillment = $isFulfillment;
    }
    
    public function getIsFulfillment() {
        return $this->isFulfillment;
    }
    
    //Status
    public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getStatus() {
        return $this->status;
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