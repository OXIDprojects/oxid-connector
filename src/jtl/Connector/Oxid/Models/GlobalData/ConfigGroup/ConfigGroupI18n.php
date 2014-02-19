<?php
namespace jtl\Connector\Oxid\Models\GlobalData\ConfigGroup;

class ConfigGroupI18n {

	private $configGroupId;
    private $localeName;
    private $name;
    private $description;
    
	//ConfigGroupId
    public function setConfigGroupId($configGroupId) {
        $this->configGroupId = $configGroupId;
    }

    public function getConfigGroupId() {
        return $this->configGroupId;
    }

    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }
    
    public function getLocaleName() {
        return $this->localeName;
    }
	
	//Name
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    //Description
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getDescription() {
        return $this->description;
    }
}
