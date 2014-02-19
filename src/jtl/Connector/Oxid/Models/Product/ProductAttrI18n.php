<?php
namespace jtl\Connector\Oxid\Models\Product;

class ProductAttrI18n
{

    private $localeName;
    private $productAttrId;
    private $key;
    private $value;

    //LocaleName
    public function setLocaleName($localeName)
	{
        $this->localeName = $localeName;
    }

    public function getLocaleName()
	{
        return $this->localeName;
    }

    //ProductAttrId
    public function setProductAttrId($productAttrId)
	{
        $this->productAttrId = $productAttrId;
    }

    public function getProductAttrId()
	{
        return $this->productAttrId;
    }

    //Key
    public function setKey($key)
	{
        $this->key = $key;
    }

    public function getKey()
	{
        return $this->key;
    }

    //Value
    public function setValue($value)
	{
        $this->value = $value;
    }

    public function getValue()
	{
        return $this->value;
    }
}