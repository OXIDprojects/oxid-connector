<?php
namespace jtl\Connector\Oxid\Models\GlobalData\ConfigItem;

class ConfigItemI18n
{

	private $configItemId;
    private $localeName;
    private $name;
	private $description;

	//ConfigItemId
    public function setConfigItemId($configItemId)
	{
        $this->configItemId = $configItemId;
    }

    public function getConfigItemId()
	{
        return $this->configItemId;
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

	//Description
    public function setDescription($description)
	{
        $this->description = $description;
    }

    public function getDescription()
	{
        return $this->description;
    }
}