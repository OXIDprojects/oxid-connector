<?php
namespace jtl\Connector\Oxid\Models\Product;

class ProductWarehouseInfo {

    private $productId;
    private $warehouseId;
    private $stockLevel;
    private $inflowQuantity;
    private $inflowDate;
    
    //ProductId
    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getProductId() {
        return $this->productId;
    }

    //WarehouseId
    public function setWarehouseId($warehouseId) {
        $this->warehouseId = $warehouseId;
    }

    public function getWarehouseId() {
        return $this->warehouseId;
    }

    //StockLevel
    public function setStockLevel($stockLevel) {
        $this->stockLevel = $stockLevel;
    }

    public function getStockLevel() {
        return $this->stockLevel;
    }

    //InflowQuantity
    public function setInflowQuantity($inflowQuantity) {
        $this->inflowQuantity = $inflowQuantity;
    }

    public function getInflowQuantity() {
        return $this->inflowQuantity;
    }

    //InflowDate
    public function setInflowDate($inflowDate) {
        $this->inflowDate = $inflowDate;
    }

    public function getInflowDate() {
        return $this->inflowDate;
    }
}


