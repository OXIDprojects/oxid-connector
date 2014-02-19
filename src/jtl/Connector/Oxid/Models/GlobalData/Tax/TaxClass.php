<?php
namespace jtl\Connector\Oxid\Models\GlobalData\Tax;

class Taxclass {
    
    private $id;
    private $name;	
	private $isDefault;
	
	//Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //Name
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }
	
	//IsDefault
    public function setIsDefault($isDefault) {
        $this->isDefault = $isDefault;
    }
    
    public function getIsDefault() {
        return $this->isDefault;
    }
}
