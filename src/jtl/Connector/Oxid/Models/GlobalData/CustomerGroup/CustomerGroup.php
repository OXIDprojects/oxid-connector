<?php
namespace jtl\Connector\Oxid\Models\GlobalData\CustomerGroup;

class CustomerGroup
{

	private $id;
    private $discount;
    private $isDefault;
    private $applyNetPrice;


    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //Discount
    public function setDiscount($discount)
	{
        $this->discount = $discount;
    }

    public function getDiscount()
	{
        return $this->discount;
    }

	//IsDefault
    public function setIsDefault($isDefault)
	{
        $this->isDefault = $isDefault;
    }

    public function getIsDefault()
	{
        return $this->isDefault;
    }

    //ApplyNetPrice
    public function setApplyNetPrice($applyNetPrice)
	{
        $this->applyNetPrice = $applyNetPrice;
    }

    public function getApplyNetPrice()
	{
        return $this->applyNetPrice;
    }
}