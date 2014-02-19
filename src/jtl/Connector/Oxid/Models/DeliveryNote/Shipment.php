<?php

namespace jtl\Connector\Oxid\Models\DeliveryNote;

class Shipment
{

    private $id;
    private $deliveryNoteId;
    private $logistic;
    private $logisticURL;
    private $identCode;
    private $created;
	private $note;

    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //DeliveryNoteId
    public function setDeliveryNoteId($deliveryNoteId)
	{
        $this->deliveryNoteId = $deliveryNoteId;
    }

    public function getDeliveryNoteId()
	{
        return $this->deliveryNoteId;
    }

    //Logistic
    public function setLogistic($logistic)
	{
        $this->logistic = $logistic;
    }

    public function getLogistic()
	{
        return $this->logistic;
    }

    //LogisticURL
    public function setLogisticURL($logisticURL)
	{
        $this->logisticURL = $logisticURL;
    }

    public function getLogisticURL()
	{
        return $this->logisticURL;
    }

    //IdentCode
    public function setIdentCode($identCode)
	{
        $this->identCode = $identCode;
    }

    public function getIdentCode()
	{
        return $this->identCode;
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

	//Note
    public function setNote($note)
	{
        $this->note = $note;
    }

    public function getNote()
	{
        return $this->note;
    }
}