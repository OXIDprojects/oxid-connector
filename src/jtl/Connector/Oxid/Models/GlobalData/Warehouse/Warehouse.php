<?php
namespace jtl\Connector\Oxid\Models\GlobalData\Warehouse;

class Warehouse
{

	private $id;

    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }
}