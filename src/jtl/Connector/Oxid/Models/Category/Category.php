<?php

namespace jtl\Connector\Oxid\Models\Category;

class Category
{

    private $id;
    private $parentCategoryId;
    private $sort;
    private $level;


    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
    }

    //ParentCategoryId
    public function setParentCategoryId($parentCategoryId)
	{
        $this->parentCategoryId = $parentCategoryId;
    }

    public function getParentCategoryId()
	{
        return $this->parentCategoryId;
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

    //Level
    public function setLevel($level)
	{
        $this->level = $level;
    }

    public function getLevel()
	{
        return $this->level;
    }
}


