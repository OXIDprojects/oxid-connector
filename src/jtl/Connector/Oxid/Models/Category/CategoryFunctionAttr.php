<?php

namespace jtl\Connector\Oxid\Models\Category;

class CategoryFunctionAttr
{

    private $id;
    private $categoryId;
    private $name;
    private $value;


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

    //Name
    public function setName($name)
	{
        $this->name = $name;
    }

    public function getName()
	{
        return $this->name;
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