<?php
namespace jtl\Connector\Oxid\Models\Product;

class ProductConfigGroup
{

    private $id;
    private $configGroupId;
    private $productId;
    private $sort;

    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //ConfigGroupId
    public function setIConfigGroupId($configGroupId)
	{
        $this->configGroupId = $configGroupId;
    }

    public function getConfigGroupId()
	{
        return $this->configGroupId;
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

    //Sort
    public function setSort($sort)
	{
        $this->sort = $sort;
    }

    public function getSort()
	{
        return $this->sort;
    }
}