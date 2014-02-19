<?php
namespace jtl\Connector\Oxid\Models\GlobalData;

class DeliveryStatus
{

    private $id;
	private $localeName;
    private $name;

	//Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

	//LocaleName
    public function setLocaleName($localeName)
	{
        $this->localeName = $localeName;
    }

    public function getLocaleName()
	{
        return $this->localeName;
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