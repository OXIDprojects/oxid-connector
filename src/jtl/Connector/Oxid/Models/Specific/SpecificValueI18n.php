<?php

namespace jtl\Connector\Oxid\Models\Specific;

class SpecificValueI18n
{
    private $localeName;
    private $specificValueId;
    private $value;
    private $urlPath;
    private $description;
    private $metaDescription;
    private $metaKeywords;
    private $titleTag;

    //LocaleName
    public function setLocaleName($localeName)
	{
        $this->localeName = $localeName;
    }

    public function getLocaleName()
	{
        return $this->localeName;
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

    //Value
    public function setValue($value)
	{
        $this->value = $value;
    }

    public function getValue()
	{
        return $this->value;
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