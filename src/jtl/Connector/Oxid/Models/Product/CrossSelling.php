<?php
namespace jtl\Connector\Oxid\Models\Product;

class CrossSelling
{

    private $id;
    private $crossSellingProductId;
    private $crossSellingGroupId;
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

    //CrossSellingProductId
    public function setCrossSellingProductId($crossSellingProductId)
	{
        $this->crossSellingProductId = $crossSellingProductId;
    }

    public function getCrossSellingProductId()
	{
        return $this->crossSellingProductId;
    }

    //CrossSellingGroupId
    public function setCrossSellingGroupId($crossSellingGroupId)
	{
        $this->crossSellingGroupId = $crossSellingGroupId;
    }

    public function getCrossSellingGroupId()
	{
        return $this->crossSellingGroupId;
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