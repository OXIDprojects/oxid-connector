<?php

namespace jtl\Connector\Oxid\Models\Manufacturer;

class ManufacturerI18n
{

    private $manufacturerId;
    private $localeName;
    private $description;
    private $metaDescription;
    private $metaKeywords;
    private $titleTag;

    //ManufacturerId
    public function setManufacturerId($manufacturerId)
	{
        $this->manufacturerId = $manufacturerId;
    }

    public function getManufacturerId()
	{
        return $this->manufacturerId;
    }

    //LocaleName
    public function setLocaleName($localeName)
	{
        $this->localeName = $localeName;
    }

    public function getLocaleName()
	{
        return $this->localeName;
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