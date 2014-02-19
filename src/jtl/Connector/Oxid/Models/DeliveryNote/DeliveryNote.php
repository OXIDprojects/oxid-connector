<?php

namespace jtl\Connector\Oxid\Models\DeliveryNote;

class DeliveryNote
{

    private $id;
    private $customerOrderId;
    private $note;
    private $created;
    private $isFulfillment;
    private $status;

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
        return $this->customerOrderId;
    }

    //Note
    public function setNote($note)
	{
        $this->note = $note;
    }

    public function getNote()
	{
        return $this->note;
    }

    //Created
    public function setCreated($created)
	{
        $this->created = $created;
    }

    public function getCreated()
	{
        return $this->created;
    }

    //IsFulfillment
    public function setIsFulfillment($isFulfillment)
	{
        $this->isFulfillment = $isFulfillment;
    }

    public function getIsFulfillment()
	{
        return $this->isFulfillment;
    }

    //Status
    public function setStatus($status)
	{
        $this->status = $status;
    }

    public function getStatus()
	{
        return $this->status;
    }
}