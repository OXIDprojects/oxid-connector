<?php

namespace jtl\Connector\Oxid\Models\Product;

class ProductSpecialPrice
{

    private $id;
    private $productId;
    private $isActive;
    private $activeFrom;
    private $activeUntil;
    private $stockLimit;
    private $considerStockLimit;
    private $considerDateLimit;


    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //ProductId
    public function setProductId($productId)
	{
        $this->productId = $productId;
    }

    public function getProductId()
	{
        return $this->productId;
    }

    //IsActive
    public function setIsActive($isActive)
	{
        $this->isActive = $isActive;
    }

    public function getIsActive()
	{
        return $this->isActive;
    }

    //ActiveFrom
    public function setActiveFrom($activeFrom)
	{
        $this->activeFrom = $activeFrom;
    }

    public function getActiveFrom()
	{
        return $this->activeFrom;
    }

    //ActiveUntil
    public function setActiveUntil($activeUntil)
	{
        $this->activeUntil = $activeUntil;
    }

    public function getActiveUntil()
	{
        return $this->activeUntil;
    }

    //StockLimit
    public function setStockLimit($stockLimit)
	{
        $this->stockLimit = $stockLimit;
    }

    public function getStockLimit()
	{
        return $this->stockLimit;
    }

    //ConsiderStockLimit
    public function setConsiderStockLimit($considerStockLimit)
	{
        $this->considerStockLimit = $considerStockLimit;
    }

    public function getConsiderStockLimit()
	{
        return $this->considerStockLimit;
    }

    //ConsiderDateLimit
    public function setConsiderDateLimit($considerDateLimit)
	{
        $this->considerDateLimit = $considerDateLimit;
    }

    public function getConsiderDateLimit()
	{
        return $this->considerDateLimit;
    }
}