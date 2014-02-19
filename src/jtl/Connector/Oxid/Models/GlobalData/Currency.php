<?php
namespace jtl\Connector\Oxid\Models\GlobalData;

class Currency
{

    private $id;
    private $name;
    private $iso;
    private $nameHtml;
    private $factor;
    private $isDefault;
    private $hasCurrencySignBeforeValue;
    private $delimiterCent;
    private $delimiterThousand;


    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //Name
    public function setName($name)
	{
        $this->name = $name;
    }

    public function getName()
	{
        return $this->name;
    }

    //ISO
    public function setISO($iso)
	{
        $this->iso = $iso;
    }

    public function getISO()
	{
        return $this->iso;
    }

    //NameHtml
    public function setNameHtml($nameHtml)
	{
        $this->nameHtml = $nameHtml;
    }

    public function getNameHtml()
	{
        return $this->nameHtml;
    }

    //Factor
    public function setFactor($factor)
	{
        $this->factor = $factor;
    }

    public function getFactor()
	{
        return $this->factor;
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

    //HasCurrencySignBeforeValue
    public function setHasCurrencySignBeforeValue($hasCurrencySignBeforeValue)
	{
        $this->hasCurrencySignBeforeValue = $hasCurrencySignBeforeValue;
    }

    public function getHasCurrencySignBeforeValue()
	{
        return $this->hasCurrencySignBeforeValue;
    }

    //DelimiterCent
    public function setDelimiterCent($delimiterCent)
	{
        $this->delimiterCent = $delimiterCent;
    }

    public function getDelimiterCent()
	{
        return $this->delimiterCent;
    }

	//DelimiterThousand
    public function setDelimiterThousand($delimiterThousand)
	{
        $this->delimiterThousand = $delimiterThousand;
    }

    public function getDelimiterThousand()
	{
        return $this->delimiterThousand;
    }
}