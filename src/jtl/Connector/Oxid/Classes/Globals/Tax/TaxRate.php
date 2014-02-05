<?php
namespace jtl\Connector\Oxid\Classes\Globals\Tax;

class TaxRate {
  
    private $id;
    private $taxZoneId;
    private $taxClassId;
    private $rate;
    private $priority;

    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //TaxZoneId
    public function setTaxZoneId($taxZoneId) {
        $this->taxZoneId = $taxZoneId;
    }
    
    public function getTaxZoneId() {
        return $this->taxZoneId;
    }

    //TaxClassId
    public function setTaxClassId($taxClassId) {
        $this->taxClassId = $taxClassId;
    }
    
    public function getTaxClassId() {
        return $this->taxClassId;
    }
    
    //Rate
    public function setRate($rate) {
        $this->rate = $rate;
    }
    
    public function getRate() {
        return $this->rate;
    }
    
    //Priority
    public function setPriority($priority) {
        $this->priority = $priority;
    }
    
    public function getPriority() {
        return $this->priority;
    }	
}
?>