<?php
namespace jtl\Connector\Oxid\Models\Product;

class setArticle
{

    private $id;
    private $productId;
    private $quantity;


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

    //Quantity
    public function setQuantity($quantity)
	{
        $this->quantity = $quantity;
    }

    public function getQuantity()
	{
        return $this->quantity;
    }
}