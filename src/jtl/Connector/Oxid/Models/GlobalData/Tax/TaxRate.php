<?php
namespace jtl\Connector\Oxid\Models\GlobalData\Tax;

class TaxRate
{

    private $id;
    private $taxZoneId;
    private $taxclassId;
    private $rate;
    private $priority;

    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //TaxZoneId
    public function setTaxZoneId($taxZoneId)
	{
        $this->taxZoneId = $taxZoneId;
    }

    public function getTaxZoneId()
	{
        return $this->taxZoneId;
    }

    //TaxclassId
    public function setTaxclassId($taxclassId)
	{
        $this->taxclassId = $taxclassId;
    }

    public function getTaxclassId()
	{
        return $this->taxclassId;
    }

    //Rate
    public function setRate($rate)
	{
        $this->rate = $rate;
    }

    public function getRate()
	{
        return $this->rate;
    }

    //Priority
    public function setPriority($priority)
	{
        $this->priority = $priority;
    }

    public function getPriority()
	{
        return $this->priority;
    }
}