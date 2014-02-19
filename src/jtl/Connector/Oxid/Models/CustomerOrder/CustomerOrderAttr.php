<?php

namespace jtl\Connector\Oxid\Models\CustomerOrder;

class CustomerOrderAttr
{

    private $id;
    private $customerOrderId;
    private $key;
    private $value;


    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //CustomerOrderId
    public function setCustomerOrderId($customerOrderId)
	{
        $this->customerOrderId = $customerOrderId;
    }

    public function getCustomerOrderId()
	{
        $this->customerOrderId;
    }

    //Key
    public function setKey($key)
	{
        $this->key = $key;
    }

    public function getKey()
	{
        return $this->key;
    }

    //Value
    public function setValue($value)
	{
        $this->value = $value;
    }

    public function getValue()
	{
        return $this->value;
    }
}