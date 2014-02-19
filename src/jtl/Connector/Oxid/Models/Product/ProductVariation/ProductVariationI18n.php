<?php
namespace jtl\Connector\Oxid\Models\Product\ProductVariation;

class ProductVariationI18n
{

    private $localeName;
    private $productVariationId;
    private $name;


    //LocaleName
    public function setLocaleName($localeName)
	{
        $this->localeName = $localeName;
    }

    public function getLocaleName()
	{
        return $this->localeName;
    }

    //ProductVariationId
    public function setProductVariationId($productVariationId)
	{
        $this->productVariationId = $productVariationId;
    }

    public function getProductVariationId()
	{
        return $this->productVariationId;
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
}