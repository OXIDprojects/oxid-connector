<?php
namespace jtl\Connector\Oxid\Models\Product;

class ProductSpecific
{

    private $id;
    private $specificValueId;
    private $productId;


    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //SpecificValueId
    public function setSpecificValueId($specificValueId)
	{
        $this->specificValueId = $specificValueId;
    }

    public function getSpecificValueId()
	{
        return $this->specificValueId;
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
}