<?php

namespace jtl\Connector\Oxid\Models\CustomerOrder\CustomerOrderItem;

class CustomerOrderItemVariations {

    private $CustomerOrderItemVariation = array();
    
    //CustomerOrderItemVariation
    public function setCustomerOrderItemVariation($CustomerOrderItemVariation) {
        $this->CustomerOrderItemVariation = $CustomerOrderItemVariation;
    }

    public function getCustomerOrderItemVariation() {
        return $this->CustomerOrderItemVariation;
    }
}

