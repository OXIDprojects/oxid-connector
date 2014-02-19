<?php

namespace jtl\Connector\Oxid\Models\Category;

class CategoryI18n
{

    private $localeName;
    private $categoryId;
    private $name;
    private $urlParth;
    private $description;
    private $metaDescription;
    private $metaKeywords;
    private $titleTag;


    //localeName
    public function setLocaleName($localeName)
	{
        $this->localeName = $localeName;
    }

    public function getLocaleName()
	{
        return $this->localeName;
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

    //UrlParth
    public function setUrlParth($urlParth)
	{
        $this->urlParth = $urlParth;
    }

    public function getUrlParth()
	{
        return $this->urlParth;
    }

    //Description
    public function setDescription($description)
	{
        $this->description = $description;
    }

    public function getDescription()
	{
        return $this->description;
    }

    //MetaDescription
    public function setMetaDescription($metaDescription)
	{
        $this->metaDescription = $metaDescription;
    }

    public function getMetaDescription()
	{
        return $this->metaDescription;
    }

    //MetaKeywords
    public function setMetaKeywords($metaKeywords)
	{
        $this->metaKeywords = $metaKeywords;
    }

    public function getMetaKeywords()
	{
        return $this->metaKeywords;
    }

    //TitleTag
    public function setTitleTag($titleTag)
	{
        $this->titleTag = $titleTag;
    }

    public function getTitleTag()
	{
        return $this->titleTag;
    }
}