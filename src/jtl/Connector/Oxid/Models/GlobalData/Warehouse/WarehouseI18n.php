<?php
namespace jtl\Connector\Oxid\Models\GlobalData\Warehouse;

class WarehouseI18n
{

    private $warehouseId;
    private $name;

    //Id
    public function setWarehouseId($warehouseId)
	{
        $this->warehouseId = $warehouseId;
    }

    public function getWarehouseId()
	{
        return $this->warehouseId;
    }

    //Name
    public function setName($name)
	{
        $this->name = $name;
    }

    public function getName()
	{
        return $this->name;
    }
}