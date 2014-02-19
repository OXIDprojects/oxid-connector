<?php
namespace jtl\Connector\Oxid\Models\GlobalData\ConfigItem;

class ConfigItemPrice {
    
	private $configItemId;
    private $customerGroupId;
    private $price;
	private $type;
	
	//ConfigItemId
    public function setConfigItemId($configItemId) {
        $this->configItemId = $configItemId;
    }

    public function getConfigItemId() {
        return $this->configItemId;
    }

    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId) {
        $this->customerGroupId = $customerGroupId;
    }
    
    public function getCustomerGroupId() {
        return $this->customerGroupId;
    }
	
	//Price
    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getPrice() {
        return $this->price;
    }
	
	//Type
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getType() {
        return $this->type;
    }
}

