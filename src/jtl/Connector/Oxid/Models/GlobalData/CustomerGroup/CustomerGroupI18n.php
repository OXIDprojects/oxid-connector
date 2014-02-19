<?php
namespace jtl\Connector\Oxid\Models\GlobalData\CustomerGroup;

class CustomerGroupI18n {
	
	private $localeName;
    private $customerGroupId;
    private $name;

	//LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }

    //CustomerGroupId
    public function setCustomerGroupId($customerGroupId) {
        $this->customerGroupId = $customerGroupId;
    }
    
    public function getCustomerGroupId() {
        return $this->customerGroupId;
    }

    //Name
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }
}
