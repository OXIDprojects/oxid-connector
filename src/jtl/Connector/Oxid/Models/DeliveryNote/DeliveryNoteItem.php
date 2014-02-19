<?php

namespace jtl\Connector\Oxid\Models\DeliveryNote;

class DeliveryNoteItem
{

    private $id;
    private $customerOrderItemId;
    private $quantity;
    private $warehouseId;
    private $serialNumber;
	private $batchNumber;
	private $bestBefore;
    private $deliveryNoteId;

    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //CustomerOrderItemId
    public function setCustomerOrderItemId($customerOrderItemId)
	{
        $this->customerOrderItemId = $customerOrderItemId;
    }

    public function getCustomerOrderItemId()
	{
        return $this->customerOrderItemId;
    }

    //Quantity
    public function setQuantity($quantity)
	{
        $this->quantity = $quantity;
    }

    public function getQuantity()
	{
        return $this->quantity;
    }

    //WarehouseId
    public function setWarehouseId($warehouseId)
	{
        $this->warehouseId = $warehouseId;
    }

    public function getWarehouseId()
	{
        return $this->warehouseId;
    }

    //SerialNumber
    public function setSerialNumber($serialNumber)
	{
        $this->serialNumber = $serialNumber;
    }

    public function getSerialNumber()
	{
        return $this->serialNumber;
    }

	//BatchNumber
    public function setBatchNumber($batchNumber)
	{
        $this->batchNumber = $batchNumber;
    }

    public function getBatchNumber()
	{
        return $this->batchNumber;
    }

	//BestBefore
    public function setBestBefore($bestBefore)
	{
        $this->bestBefore = $bestBefore;
    }

    public function getBestBefore()
	{
        return $this->bestBefore;
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
}