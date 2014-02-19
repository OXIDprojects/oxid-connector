<?php
namespace jtl\Connector\Oxid\Models\Product;

class Product2Category
{

    private $id;
    private $categoryId;
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

    //CategoryId
    public function setCategoryId($categoryId)
	{
        $this->categoryId = $categoryId;
    }

    public function getCategoryId()
	{
        return $this->categoryId;
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