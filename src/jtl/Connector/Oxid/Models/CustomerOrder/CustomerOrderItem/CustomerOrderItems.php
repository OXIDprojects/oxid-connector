<?php

namespace jtl\Connector\Oxid\Models\CustomerOrder\CustomerOrderItem;

class CustomerOrderItems
{

    private $CustomerOrderItem = array();

    //CustomerOrderItem
    public function setCustomerOrderItem($CustomerOrderItem)
	{
        $this->CustomerOrderItem = $CustomerOrderItem;
    }

    public function getCustomerOrderItem()
	{
        return $this->CustomerOrderItem;
    }
}