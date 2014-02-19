<?php
namespace jtl\Connector\Oxid\Models\GlobalData\CustomerGroup;

class CustomerGroupAttr
{

    private $id;
    private $customerGroupId;
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

    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId)
	{
        $this->customerGroupId = $customerGroupId;
    }

    public function getCustomerGroupId()
	{
        return $this->customerGroupId;
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