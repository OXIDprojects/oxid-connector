<?php

namespace jtl\Connector\Oxid\Models\Specific;

class SpecificValue
{

    private $id;
    private $specificId;
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

    //SpecificId
    public function setSpecificId($specificId)
	{
        $this->specificId = $specificId;
    }

    public function getSpecificId()
	{
        return $this->specificId;
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