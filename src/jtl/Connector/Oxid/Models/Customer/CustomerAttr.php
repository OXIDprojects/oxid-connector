<?php

namespace jtl\Connector\Oxid\Models\Customer;

class CustomerAttr
{

    private $id;
    private $customerId;
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

    //CustomerId
    public function setCustomerId($customerId)
	{
        $this->customerId = $customerId;
    }

    public function getCustomerId()
	{
        return $this->customerId;
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