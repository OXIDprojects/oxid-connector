<?php

namespace jtl\Connector\Oxid\Models\Manufacturer;

class Manufacturer
{

    private $id;
    private $name;
    private $www;
    private $sort;
    private $urlPath;

    //Id
    public function setId($id)
	{
        $this->id = $id;
    }

    public function getId()
	{
        return $this->id;
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

    //WWW
    public function setWWW($www)
	{
        $this->www = $www;
    }

    public function getWWW()
	{
        return $this->www;
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

    //UrlPath
    public function setUrlPath($urlPath)
	{
        $this->urlPath = $urlPath;
    }

    public function getUrlPath()
	{
        return $this->urlPath;
    }
}