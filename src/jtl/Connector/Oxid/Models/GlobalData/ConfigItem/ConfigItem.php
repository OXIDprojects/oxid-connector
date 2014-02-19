<?php
namespace jtl\Connector\Oxid\Models\GlobalData\ConfigItem;

class ConfigItem {

	private $id;
    private $configGroupId;
    private $productId;
	private $type;
	private $isPreSelected;
    private $isRecommended;
    private $inheritProductName;
	private $inheritProductPrice;
    private $showDiscount;
    private $showSurcharge;
	private $ignoreMultiplier;
	private $minQuantity;
    private $maxQuantity;
    private $initialQuantity;
	private $sort;
    private $vat;
	
	
	//Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //ConfigGroupId
    public function setConfigGroupId($configGroupId) {
        $this->configGroupId = $configGroupId;
    }
    
    public function getConfigGroupId() {
        return $this->configGroupId;
    }
	
	//ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }
    
    public function getProductId() {
        return $this->productId;
    }
	
	//Type
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getType() {
        return $this->type;
    }
	
	//IsPreSelected
    public function setIsPreSelected($isPreSelected) {
        $this->isPreSelected = $isPreSelected;
    }

    public function getIsPreSelected() {
        return $this->isPreSelected;
    }

    //IsRecommended
    public function setIsRecommended($isRecommended) {
        $this->isRecommended = $isRecommended;
    }
    
    public function getIsRecommended() {
        return $this->isRecommended;
    }
	
	//InheritProductName
    public function setInheritProductName($inheritProductName) {
        $this->inheritProductName = $inheritProductName;
    }
    
    public function getInheritProductName() {
        return $this->inheritProductName;
    }
	
	//InheritProductPrice
    public function setInheritProductPrice($inheritProductPrice) {
        $this->inheritProductPrice = $inheritProductPrice;
    }
    
    public function getInheritProductPrice() {
        return $this->inheritProductPrice;
    }
	
	//Vat
    public function setVat($vat) {
        $this->vat = $vat;
    }

    public function getVat() {
        return $this->vat;
    }

    //ShowDiscount
    public function setShowDiscount($showDiscount) {
        $this->showDiscount = $showDiscount;
    }
    
    public function getShowDiscount() {
        return $this->showDiscount;
    }
	
	//ShowSurcharge
    public function setShowSurcharge($showSurcharge) {
        $this->showSurcharge = $showSurcharge;
    }
    
    public function getShowSurcharge() {
        return $this->showSurcharge;
    }
	
	//IgnoreMultiplier
    public function setIgnoreMultiplier($ignoreMultiplier) {
        $this->ignoreMultiplier = $ignoreMultiplier;
    }
    
    public function getIgnoreMultiplier() {
        return $this->ignoreMultiplier;
    }
	
	//MinQuantity
    public function setMinQuantity($minQuantity) {
        $this->minQuantity = $minQuantity;
    }

    public function getMinQuantity() {
        return $this->minQuantity;
    }

    //MaxQuantity
    public function setMaxQuantity($maxQuantity) {
        $this->maxQuantity = $maxQuantity;
    }
    
    public function getMaxQuantity() {
        return $this->maxQuantity;
    }
	
	//InitialQuantity
    public function setInitialQuantity($initialQuantity) {
        $this->initialQuantity = $initialQuantity;
    }
    
    public function getInitialQuantity() {
        return $this->initialQuantity;
    }
	
	//Sort
    public function setSort($sort) {
        $this->sort = $sort;
    }
    
    public function getSort() {
        return $this->sort;
    }
}

