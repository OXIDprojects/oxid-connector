<?php
namespace jtl\Connector\Oxid\Models\GlobalData;

class Shippingclass {
 
    private $id;
    private $name;

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
}
